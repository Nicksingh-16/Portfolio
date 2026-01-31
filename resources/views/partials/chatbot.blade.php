<!-- AI Chatbot Component -->
<div id="ai-chatbot" class="fixed bottom-6 right-6 z-[99999]">
    <!-- Chat Toggle Button -->
    <button id="chatbot-toggle" 
            class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-to-br from-neon-purple to-neon-pink shadow-[0_0_30px_rgba(188,19,254,0.6)] flex items-center justify-center hover:scale-110 transition-all duration-300 group">
        <i data-lucide="bot" class="w-6 h-6 md:w-8 md:h-8 text-white group-hover:animate-pulse"></i>
        <div class="absolute -top-1 -right-1 w-3 h-3 md:w-4 md:h-4 bg-green-500 rounded-full border-2 border-black animate-pulse"></div>
    </button>

    <!-- Chat Window -->
    <div id="chatbot-window" 
         class="absolute bottom-20 right-0 w-[calc(100vw-2rem)] md:w-96 h-[calc(100vh-10rem)] md:h-[600px] bg-black/95 backdrop-blur-xl border border-neon-purple/30 rounded-2xl shadow-[0_0_50px_rgba(188,19,254,0.3)] hidden flex-col overflow-hidden">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-neon-purple to-neon-pink p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-black/50 flex items-center justify-center">
                    <i data-lucide="brain" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h3 class="font-heading text-white font-bold">Portfolio AI</h3>
                    <p class="text-xs text-white/70">Powered by Gemini</p>
                </div>
            </div>
            <button id="chatbot-close" class="text-white hover:text-black transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 scrollbar-thin scrollbar-thumb-neon-purple scrollbar-track-gray-900">
            <!-- Welcome Message -->
            <div class="flex gap-3 items-start">
                <div class="w-8 h-8 rounded-full bg-neon-purple flex items-center justify-center flex-shrink-0">
                    <i data-lucide="bot" class="w-4 h-4 text-white"></i>
                </div>
                <div class="bg-gray-900 border border-neon-purple/20 rounded-2xl rounded-tl-none p-4 max-w-[80%]">
                    <p class="text-gray-300 text-sm">
                        👋 Hi! I'm Nishant's AI assistant. I can help you learn about his:
                    </p>
                    <ul class="mt-2 space-y-1 text-xs text-gray-400">
                        <li>• Work Experience & Projects</li>
                        <li>• Technical Skills & Expertise</li>
                        <li>• Education & Achievements</li>
                        <li>• Contact Information</li>
                    </ul>
                    <p class="text-gray-300 text-sm mt-3">
                        Ask me anything!
                    </p>
                </div>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="typing-indicator" class="px-4 pb-2 hidden">
            <div class="flex gap-3 items-start">
                <div class="w-8 h-8 rounded-full bg-neon-purple flex items-center justify-center flex-shrink-0">
                    <i data-lucide="bot" class="w-4 h-4 text-white"></i>
                </div>
                <div class="bg-gray-900 border border-neon-purple/20 rounded-2xl rounded-tl-none p-4">
                    <div class="flex gap-1">
                        <div class="w-2 h-2 bg-neon-purple rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                        <div class="w-2 h-2 bg-neon-purple rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                        <div class="w-2 h-2 bg-neon-purple rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-4 border-t border-gray-800">
            <form id="chat-form" class="flex gap-2">
                <input type="text" 
                       id="chat-input" 
                       placeholder="Ask about Nishant's experience..."
                       class="flex-1 bg-gray-900 border border-gray-700 rounded-full px-4 py-3 text-white text-sm focus:outline-none focus:border-neon-purple transition-colors"
                       autocomplete="off">
                <button type="submit" 
                        class="w-12 h-12 rounded-full bg-neon-purple hover:bg-neon-pink transition-all flex items-center justify-center group">
                    <i data-lucide="send" class="w-5 h-5 text-white group-hover:translate-x-0.5 transition-transform"></i>
                </button>
            </form>
            <p class="text-xs text-gray-600 mt-2 text-center">
                AI responses may vary. Verify important details.
            </p>
        </div>
    </div>
</div>

<style>
/* Custom Scrollbar */
.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #1a1a1a;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #bc13fe;
    border-radius: 3px;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #ff0055;
}
</style>

<script>
// Chatbot Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('chatbot-toggle');
    const closeBtn = document.getElementById('chatbot-close');
    const chatWindow = document.getElementById('chatbot-window');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');
    const typingIndicator = document.getElementById('typing-indicator');

    // Toggle chat window
    toggleBtn.addEventListener('click', () => {
        chatWindow.classList.toggle('hidden');
        chatWindow.classList.toggle('flex');
        if (!chatWindow.classList.contains('hidden')) {
            chatInput.focus();
        }
    });

    // Close chat window
    closeBtn.addEventListener('click', () => {
        chatWindow.classList.add('hidden');
        chatWindow.classList.remove('flex');
    });

    // Handle form submission
    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const message = chatInput.value.trim();
        
        if (!message) return;

        // Add user message to chat
        addMessage(message, 'user');
        chatInput.value = '';

        // Show typing indicator
        typingIndicator.classList.remove('hidden');
        chatMessages.scrollTop = chatMessages.scrollHeight;

        try {
            // Send message to backend
            const response = await fetch('/api/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message })
            });

            const data = await response.json();

            // Hide typing indicator
            typingIndicator.classList.add('hidden');

            // Add AI response to chat
            if (data.success) {
                addMessage(data.response, 'ai');
            } else {
                addMessage('Sorry, I encountered an error. Please try again.', 'ai');
            }
        } catch (error) {
            console.error('Chat error:', error);
            typingIndicator.classList.add('hidden');
            addMessage('Sorry, I\'m having trouble connecting. Please try again later.', 'ai');
        }
    });

    // Add message to chat
    function addMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex gap-3 items-start';
        
        if (sender === 'user') {
            messageDiv.classList.add('flex-row-reverse');
            messageDiv.innerHTML = `
                <div class="w-8 h-8 rounded-full bg-neon-blue flex items-center justify-center flex-shrink-0">
                    <i data-lucide="user" class="w-4 h-4 text-white"></i>
                </div>
                <div class="bg-neon-blue/20 border border-neon-blue/30 rounded-2xl rounded-tr-none p-4 max-w-[80%]">
                    <p class="text-white text-sm">${escapeHtml(text)}</p>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="w-8 h-8 rounded-full bg-neon-purple flex items-center justify-center flex-shrink-0">
                    <i data-lucide="bot" class="w-4 h-4 text-white"></i>
                </div>
                <div class="bg-gray-900 border border-neon-purple/20 rounded-2xl rounded-tl-none p-4 max-w-[80%]">
                    <p class="text-gray-300 text-sm">${formatAIResponse(text)}</p>
                </div>
            `;
        }

        chatMessages.appendChild(messageDiv);
        lucide.createIcons();
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Format AI response (convert markdown-like syntax to HTML)
    function formatAIResponse(text) {
        // Convert **bold** to <strong>
        text = text.replace(/\*\*(.*?)\*\*/g, '<strong class="text-white">$1</strong>');
        
        // Convert bullet points
        text = text.replace(/• /g, '<br>• ');
        
        // Convert line breaks
        text = text.replace(/\n/g, '<br>');
        
        return text;
    }
});
</script>
