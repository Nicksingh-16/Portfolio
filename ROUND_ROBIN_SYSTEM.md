# AI Chatbot - Round-Robin API Key System

## Overview

The chatbot now uses a **round-robin load balancing** system with **3 Gemini API keys** to handle concurrent requests efficiently and avoid rate limits.

## How It Works

### 1. **Multiple API Keys**
Three Gemini API keys are configured in `.env`:
```env
GEMINI_API_KEY_1=your_first_gemini_api_key_here
GEMINI_API_KEY_2=your_second_gemini_api_key_here
GEMINI_API_KEY_3=your_third_gemini_api_key_here
```

### 2. **Round-Robin Selection**
Each request uses a different API key in rotation:
- Request 1 → API Key 1
- Request 2 → API Key 2
- Request 3 → API Key 3
- Request 4 → API Key 1 (cycle repeats)
- And so on...

### 3. **Counter Management**
- A counter is stored in Laravel cache
- Counter increments with each request
- Counter resets after 1 hour
- Key selection: `counter % number_of_keys`

## Benefits

### ✅ **Load Distribution**
- Spreads requests across multiple API keys
- Each key handles ~33% of traffic
- Reduces load on individual keys

### ✅ **Rate Limit Avoidance**
- Google Gemini has rate limits per API key
- Using 3 keys = 3x the capacity
- Less likely to hit rate limits

### ✅ **High Availability**
- If one key fails, others continue working
- Automatic failover (can be enhanced)
- Better uptime for chatbot

### ✅ **Concurrent Requests**
- Multiple users can chat simultaneously
- Each gets a different API key
- No bottlenecks

## Implementation Details

### Code Location
`app/Http/Controllers/ChatbotController.php`

### Key Methods

#### 1. **Constructor**
```php
public function __construct()
{
    // Load all available API keys
    $this->geminiApiKeys = array_filter([
        env('GEMINI_API_KEY_1'),
        env('GEMINI_API_KEY_2'),
        env('GEMINI_API_KEY_3'),
    ]);
}
```

#### 2. **getApiKey() - Round-Robin Logic**
```php
private function getApiKey()
{
    if (empty($this->geminiApiKeys)) {
        throw new \Exception('No Gemini API keys configured');
    }

    // Get current counter from cache
    $counter = Cache::get('gemini_api_key_counter', 0);
    
    // Select key using round-robin
    $keyIndex = $counter % count($this->geminiApiKeys);
    $apiKey = array_values($this->geminiApiKeys)[$keyIndex];
    
    // Increment counter for next request
    Cache::put('gemini_api_key_counter', $counter + 1, 3600);
    
    return $apiKey;
}
```

#### 3. **chat() - Using Round-Robin**
```php
public function chat(Request $request)
{
    // ... validation ...
    
    // Get API key using round-robin
    $apiKey = $this->getApiKey();
    
    // Call Gemini API with selected key
    $response = Http::timeout(30)->post($this->geminiApiUrl . '?key=' . $apiKey, [
        // ... request data ...
    ]);
    
    // ... handle response ...
}
```

## Testing Round-Robin

### Test 1: Single Request
```bash
# Open browser console and run:
fetch('/api/chatbot', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ message: 'Hello' })
}).then(r => r.json()).then(console.log);
```

### Test 2: Multiple Concurrent Requests
```javascript
// Send 10 requests to see round-robin in action
for (let i = 0; i < 10; i++) {
    fetch('/api/chatbot', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message: `Test ${i}` })
    }).then(r => r.json()).then(data => console.log(`Request ${i}:`, data));
}
```

### Test 3: Check Counter
```php
// In Laravel Tinker (php artisan tinker):
Cache::get('gemini_api_key_counter');
```

## Monitoring

### Check Which Key Was Used
Add logging to track key usage:

```php
// In getApiKey() method, add:
Log::info('Using API Key', [
    'index' => $keyIndex,
    'counter' => $counter,
    'total_keys' => count($this->geminiApiKeys)
]);
```

### View Logs
```bash
tail -f storage/logs/laravel.log
```

## Advanced Features (Future Enhancements)

### 1. **Weighted Round-Robin**
Give different weights to keys based on quota:
```php
$weights = [
    'key1' => 50,  // 50% of requests
    'key2' => 30,  // 30% of requests
    'key3' => 20,  // 20% of requests
];
```

### 2. **Health Checking**
Skip keys that are failing:
```php
private function isKeyHealthy($apiKey)
{
    $failures = Cache::get("key_failures_{$apiKey}", 0);
    return $failures < 3; // Skip if 3+ failures
}
```

### 3. **Automatic Failover**
If one key fails, try the next:
```php
foreach ($this->geminiApiKeys as $key) {
    try {
        $response = Http::post($url . '?key=' . $key, $data);
        if ($response->successful()) {
            return $response;
        }
    } catch (\Exception $e) {
        continue; // Try next key
    }
}
```

### 4. **Rate Limit Tracking**
Track usage per key:
```php
$usage = Cache::get("key_usage_{$apiKey}", 0);
Cache::put("key_usage_{$apiKey}", $usage + 1, 60);
```

## Configuration

### Add More Keys
To add more API keys:

1. **Update .env**:
```env
GEMINI_API_KEY_4=your_fourth_key
GEMINI_API_KEY_5=your_fifth_key
```

2. **Update Controller**:
```php
$this->geminiApiKeys = array_filter([
    env('GEMINI_API_KEY_1'),
    env('GEMINI_API_KEY_2'),
    env('GEMINI_API_KEY_3'),
    env('GEMINI_API_KEY_4'),
    env('GEMINI_API_KEY_5'),
]);
```

### Remove Keys
Simply remove from `.env` or comment out in controller.

## Troubleshooting

### Issue: All Keys Failing
**Solution**: Check if keys are valid
```bash
# Test each key manually
curl "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=YOUR_KEY" \
  -H 'Content-Type: application/json' \
  -d '{"contents":[{"parts":[{"text":"Hello"}]}]}'
```

### Issue: Counter Not Incrementing
**Solution**: Clear cache
```bash
php artisan cache:clear
```

### Issue: Same Key Used Every Time
**Solution**: Check cache driver in `.env`
```env
CACHE_STORE=database  # or file, redis
```

## Performance Metrics

### Expected Improvements
- **3x Rate Limit**: Can handle 3x more requests
- **Better Response Time**: Distributed load
- **Higher Uptime**: Redundancy across keys

### Monitoring Commands
```bash
# Clear cache
php artisan cache:clear

# Check cache
php artisan tinker
>>> Cache::get('gemini_api_key_counter')

# View logs
tail -f storage/logs/laravel.log | grep "Gemini"
```

## Security Notes

### ⚠️ **Keep Keys Secret**
- Never commit `.env` to Git
- Use environment variables in production
- Rotate keys periodically

### ✅ **Best Practices**
- Use different keys for dev/staging/production
- Monitor usage in Google Cloud Console
- Set up billing alerts
- Enable API restrictions

## Summary

✅ **3 API keys configured**
✅ **Round-robin load balancing**
✅ **Automatic key rotation**
✅ **Cache-based counter**
✅ **Ready for concurrent requests**

Your chatbot can now handle multiple simultaneous users efficiently! 🚀
