# Nishant Shekhawat - Cinematic Portfolio with AI Chatbot

A stunning, cinematic Laravel-powered portfolio website featuring:
- 🎬 Cinematic intro sequence with smooth animations
- 🤖 AI-powered chatbot using Google Gemini API
- 📱 Fully mobile responsive design
- 💼 Comprehensive work experience showcase
- 🚀 Dynamic project displays
- ⚡ Modern tech stack visualization

## Features

### 1. **Cinematic Experience**
- Movie-style intro sequence
- Smooth scroll animations
- Interactive 3D elements
- Orbital tech visualization

### 2. **AI Chatbot Integration**
- Powered by Google Gemini API
- Context-aware responses about your portfolio
- Real-time chat interface
- Mobile-optimized chat window

### 3. **Dynamic Content**
- All resume data loaded from `resume_data.json`
- Easy to update without touching code
- Comprehensive work experience details
- Project showcases with tech stacks

### 4. **Mobile Responsive**
- Optimized for all screen sizes
- Touch-friendly interactions
- Adaptive layouts
- Performance optimized

## Tech Stack

- **Backend**: Laravel 11.x
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling**: Tailwind CSS
- **Icons**: Lucide Icons
- **3D Graphics**: Three.js
- **AI**: Google Gemini API
- **Database**: SQLite (default)

## Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- XAMPP (or any PHP development environment)

### Step 1: Install Dependencies (if needed)
```bash
composer install
```

### Step 2: Configure Environment
1. The `.env` file is already created
2. **IMPORTANT**: Add your Gemini API key:
   ```env
   GEMINI_API_KEY=your_actual_gemini_api_key_here
   ```

### Step 3: Get Your Gemini API Key
1. Visit [Google AI Studio](https://makersuite.google.com/app/apikey)
2. Sign in with your Google account
3. Click "Create API Key"
4. Copy the key and paste it in `.env` file

### Step 4: Start the Development Server
```bash
php artisan serve
```

Your portfolio will be available at: `http://localhost:8000`

## Project Structure

```
portfolio/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── PortfolioController.php  # Main portfolio controller
│           └── ChatbotController.php    # AI chatbot controller
├── public/
│   ├── css/
│   │   └── cinematic.css               # Cinematic animations & styles
│   ├── js/
│   │   └── cinematic.js                # Interactive animations
│   ├── media-profile.png               # Your profile image
│   └── index.php                       # Laravel entry point
├── resources/
│   └── views/
│       ├── portfolio.blade.php         # Main portfolio view
│       └── partials/
│           ├── chatbot.blade.php       # AI chatbot component
│           ├── tech-rings.blade.php    # Orbital tech visualization
│           ├── skills-section.blade.php
│           ├── projects-section.blade.php
│           └── ai-labs-section.blade.php
├── routes/
│   └── web.php                         # Application routes
├── resume_data.json                    # Your resume data (EDIT THIS!)
└── .env                                # Environment configuration

```

## Updating Your Information

### Edit Resume Data
All your personal information, work experience, skills, and projects are stored in `resume_data.json`. Simply edit this file to update your portfolio:

```json
{
  "personal_info": {
    "name": "Your Name",
    "title": "Your Title",
    "email": "your@email.com",
    ...
  },
  "work_experience": [...],
  "skills": {...},
  "projects": {...}
}
```

### Update Profile Image
Replace `public/media-profile.png` with your own image.

## AI Chatbot Configuration

The chatbot is configured in `app/Http/Controllers/ChatbotController.php`:

- **Context Building**: Automatically reads from `resume_data.json`
- **Response Caching**: Caches portfolio context for 1 hour
- **Rate Limiting**: Built-in error handling
- **Mobile Optimized**: Responsive chat window

### Customizing AI Responses
Edit the `buildPrompt()` method in `ChatbotController.php` to customize how the AI responds.

## Mobile Responsiveness

The portfolio is fully responsive with breakpoints for:
- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

All animations and interactions are optimized for touch devices.

## Deployment

### For Production:
1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Deploy to your hosting platform

### Recommended Platforms:
- **Railway**: Easy Laravel deployment
- **Heroku**: Free tier available
- **DigitalOcean**: VPS hosting
- **Vercel**: With serverless PHP

## API Routes

- `GET /` - Main portfolio page
- `POST /api/chatbot` - AI chatbot endpoint

## Customization

### Colors
Edit Tailwind config in `resources/views/portfolio.blade.php`:
```javascript
colors: {
    space: '#020204',
    neon: {
        blue: '#00f3ff',
        purple: '#bc13fe',
        pink: '#ff0055',
    }
}
```

### Animations
Modify `public/css/cinematic.css` for custom animations.

### Cinematic Sequence
Edit `public/js/cinematic.js` to customize the intro sequence.

## Performance Optimization

- **Lazy Loading**: Images load on demand
- **CSS Minification**: Use `npm run build` for production
- **Caching**: Portfolio context cached for 1 hour
- **CDN**: External libraries loaded from CDN

## Troubleshooting

### Chatbot Not Working
1. Check if `GEMINI_API_KEY` is set in `.env`
2. Verify API key is valid
3. Check browser console for errors
4. Ensure `resume_data.json` exists

### Styles Not Loading
1. Clear browser cache
2. Run `php artisan cache:clear`
3. Check if CSS files exist in `public/css/`

### Database Errors
1. Run `php artisan migrate`
2. Check SQLite database permissions

## Contact & Support

- **Email**: nishantshekhawat2001@gmail.com
- **Phone**: 8329387047
- **Portfolio**: https://portfolio-production-6eb0.up.railway.app

## License

This portfolio is open-source and available for personal use.

## Credits

- **Design**: Custom cinematic theme
- **Icons**: Lucide Icons
- **Fonts**: Orbitron, Rajdhani (Google Fonts)
- **AI**: Google Gemini API
- **Framework**: Laravel

---

**Built with ❤️ by Nishant Shekhawat**
