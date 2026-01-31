<button id="scroll-to-top" 
    class="fixed bottom-24 right-6 z-[9990] opacity-0 translate-y-20 pointer-events-none transition-all duration-500"
    onclick="launchRocket()"
    aria-label="Scroll to Top - Launch Rocket">
    
    <div id="rocket-container" class="relative group cursor-pointer p-4">
        <!-- Rocket Icon (Rotated to point UP) -->
        <i data-lucide="rocket" class="w-8 h-8 md:w-10 md:h-10 text-gray-400 group-hover:text-neon-blue transition-colors duration-300 transform -rotate-45"></i>
        
        <!-- Engine Glow -->
        <div class="absolute inset-0 bg-neon-blue/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        
        <!-- Flame Trail (Visible on launch) -->
        <div class="rocket-flame absolute top-full left-1/2 -translate-x-1/2 w-4 h-0 bg-gradient-to-t from-transparent via-orange-500 to-yellow-300 rounded-full blur-[2px] transition-all duration-300"></div>
        
        <!-- Smoke Particles Container -->
        <div id="smoke-container" class="absolute top-[80%] left-1/2 -translate-x-1/2 w-2 h-2 pointer-events-none"></div>
    </div>
</button>

<style>
    /* Wavy Flight Animation */
    @keyframes flyWavy {
        0% { transform: translate(0, 0) scale(1); opacity: 1; }
        10% { transform: translate(-5px, -50px) scale(1.1); }
        25% { transform: translate(10px, -200px) scale(1.1); }
        40% { transform: translate(-10px, -400px) scale(1.1); }
        60% { transform: translate(5px, -700px) scale(0.9); }
        100% { transform: translate(0, -150vh) scale(0.5); opacity: 0; }
    }

    .rocket-launching {
        animation: flyWavy 1.5s cubic-bezier(0.45, 0, 0.55, 1) forwards !important;
    }

    .rocket-launching .rocket-flame {
        height: 60px !important;
        width: 12px !important;
        opacity: 1 !important;
        animation: flameFlicker 0.1s infinite alternate;
    }

    @keyframes flameFlicker {
        from { height: 60px; filter: blur(2px); }
        to { height: 70px; filter: blur(4px); }
    }

    .rocket-launching i {
        color: #fff !important;
        filter: drop-shadow(0 0 10px #00f3ff);
    }
    
    /* Smoke Particle */
    .smoke-particle {
        position: absolute;
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        animation: fadeSmoke 0.8s ease-out forwards;
    }
    
    @keyframes fadeSmoke {
        0% { transform: scale(1) translate(0,0); opacity: 0.8; }
        100% { transform: scale(3) translate(var(--dx), 50px); opacity: 0; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const scrollBtn = document.getElementById('scroll-to-top');
    
    // Visibility Logic
    function handleScroll() {
        if (scrollBtn.classList.contains('rocket-launching')) return;

        const scrollTop = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;
        
        if (scrollTop > 500) {
            scrollBtn.classList.remove('opacity-0', 'translate-y-20', 'pointer-events-none');
            scrollBtn.classList.add('opacity-100', 'translate-y-0');
        } else {
            scrollBtn.classList.add('opacity-0', 'translate-y-20', 'pointer-events-none');
            scrollBtn.classList.remove('opacity-100', 'translate-y-0');
        }
    }

    window.addEventListener('scroll', handleScroll);
    document.body.addEventListener('scroll', handleScroll);
});

// Launch Function
function launchRocket() {
    const btn = document.getElementById('scroll-to-top');
    const smokeContainer = document.getElementById('smoke-container');
    
    // Add animation class
    btn.classList.add('rocket-launching');
    
    // Create smoke effect loop
    let smokeInterval = setInterval(() => {
        const particle = document.createElement('div');
        particle.classList.add('smoke-particle');
        // Random spread
        const dx = (Math.random() - 0.5) * 40 + 'px';
        particle.style.setProperty('--dx', dx);
        smokeContainer.appendChild(particle);
        
        // Remove individual particle after animation
        setTimeout(() => particle.remove(), 800);
    }, 50);

    // Perform smooth scroll
    window.scrollTo({top: 0, behavior: 'smooth'});
    document.documentElement.scrollTo({top: 0, behavior: 'smooth'});
    document.body.scrollTo({top: 0, behavior: 'smooth'});

    // Reset after animation matches scroll duration approx
    setTimeout(() => {
        clearInterval(smokeInterval);
        btn.classList.remove('rocket-launching');
        // Force hide as we should be at top now
        btn.classList.add('opacity-0', 'translate-y-20', 'pointer-events-none');
        btn.classList.remove('opacity-100', 'translate-y-0');
        smokeContainer.innerHTML = ''; // Clear any remaining smoke
    }, 1500);
}
</script>
