/**
 * ANTI-GRAVITY PORTFOLIO: CINEMATIC ENGINE
 * 
 * CORE ARCHITECTURE:
 * 1. Global State Management
 * 2. Mission Restoration (Bulletproof Return)
 * 3. Warp Drive (Stars & Motion)
 * 4. Scene Management (Search & Discovery)
 * 5. Mission Uplink (Target Acquisition)
 */

// --- 1. GLOBAL STATE ---
// We keep these top-level to ensure they are available to inline HTML events (like the rocket button)
let isMovieMode = !localStorage.getItem('sawIntro');
let movieScrollTimer = null;
let targetSpeed = 2;

/**
 * MISSION EXTRACTION: The Core Reset Function
 * Forcefully returns the site to a professional state.
 */
window.switchToSPAMode = function () {
    console.log("Mission Extraction: Initiating Safe Return...");
    console.log("isMovieMode:", isMovieMode);

    // Set Persistence
    isMovieMode = false;
    localStorage.setItem('sawIntro', 'true');

    // Add CSS Purge Class
    document.body.classList.add('mission-complete');

    // 1. Permanently Hide Intro Sections
    const introIds = ['hero', 'search', 'movie-msg'];
    introIds.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.add('section-hidden');
    });

    // 2. Clear Any Lingering Timer/Animation Artifacts
    if (movieScrollTimer) clearTimeout(movieScrollTimer);

    // 3. Forcefully Restore All Professional Sections
    const spaIds = ['target', 'experience', 'skills', 'projects', 'ai-labs', 'concepts', 'contact'];
    spaIds.forEach(id => {
        const section = document.getElementById(id);
        if (section) {
            section.classList.remove('section-hidden', 'opacity-0');
            section.style.cssText = "opacity: 1; visibility: visible; display: flex;";

            // Wipe specific cinematic classes from all descendants
            section.querySelectorAll('*').forEach(el => {
                el.classList.remove('subtle-uplink', 'resonance-active', 'button-engaged', 'scanning-active');
            });

            // Explicitly reset spinning rings to their original state
            section.querySelectorAll('[class*="animate-[spin_"]').forEach(ring => {
                ring.classList.remove('resonance-active');
                ring.style.borderColor = '';
                ring.style.boxShadow = '';
            });
        }
    });

    // 3.5. Clear Action Transition Classes
    document.body.classList.remove('slide-transition', 'zoom-transition', 'glitch-transition', 'reveal-transition');

    // 4. Force Reveal Navigation
    const nav = document.getElementById('main-nav');
    if (nav) {
        // Remove ALL hiding classes
        nav.classList.remove('opacity-0', 'translate-y-[-100px]', 'pointer-events-none', 'transition-all', 'duration-1000');
        // Force visible with aggressive inline styles
        nav.style.cssText = "opacity: 1 !important; visibility: visible !important; pointer-events: auto !important; transform: translate(-50%, 0) !important; display: flex !important; position: fixed !important; top: 1.5rem !important; left: 50% !important; z-index: 5000 !important;";
        console.log("Navbar revealed:", nav);
    } else {
        console.error("Navbar element not found!");
    }

    // 5. Restore Scrolling & Force Return to Top
    document.body.style.scrollSnapType = 'none';
    document.documentElement.style.scrollSnapType = 'none';
    document.body.style.overflow = 'visible';
    document.body.style.overflowY = 'auto';
    document.documentElement.style.overflow = 'visible';
    document.documentElement.style.overflowY = 'auto';

    // 6. Cleanup Mission Button Inline
    const missionBtn = document.getElementById('mission-button');
    if (missionBtn) missionBtn.classList.remove('button-engaged');

    // 7. Immediate Teleport + Smooth Scroll to Top
    window.scrollTo(0, 0);
    const topAnchor = document.getElementById('target');
    if (topAnchor) {
        topAnchor.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // 8. Hide extraction rocket AFTER scroll completes
    const rocket = document.querySelector('.extraction-rocket');
    setTimeout(() => {
        if (rocket) rocket.style.display = 'none';
    }, 1000);

    // 9. Re-enable snap after transition
    setTimeout(() => {
        // Disabled scroll snap for better dynamic height support
        document.body.style.scrollSnapType = 'none';
        document.documentElement.style.scrollSnapType = 'none';
        console.log("Restoration Complete: Native Scroll Engaged.");
    }, 1500);

    targetSpeed = 2;
};

// --- START ENGINE ---
document.addEventListener('DOMContentLoaded', () => {

    // --- 2. WARP DRIVE (CANVAS) ---
    const canvas = document.createElement('canvas');
    canvas.id = 'warp-canvas';
    document.body.appendChild(canvas);
    const ctx = canvas.getContext('2d');
    let width, height, stars = [];

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width;
        canvas.height = height;
    }
    window.addEventListener('resize', resize);
    resize();

    class Star {
        constructor() { this.init(); }
        init() {
            this.x = Math.random() * width - width / 2;
            this.y = Math.random() * height - height / 2;
            this.z = Math.random() * width;
            this.color = Math.random() > 0.8 ? '#00f3ff' : '#ffffff';
        }
        update(speed) {
            this.z -= speed;
            if (this.z < 1) { this.init(); this.z = width; }
        }
        draw(speed) {
            let x = (this.x / this.z) * width + width / 2;
            let y = (this.y / this.z) * height + height / 2;
            let px = (this.x / (this.z + speed * 2)) * width + width / 2;
            let py = (this.y / (this.z + speed * 2)) * height + height / 2;

            ctx.beginPath();
            ctx.moveTo(px, py);
            ctx.lineTo(x, y);
            ctx.strokeStyle = this.color;
            ctx.lineWidth = Math.min(3, (width / this.z));
            ctx.globalAlpha = Math.min(1, (width - this.z) / width);
            ctx.stroke();
            ctx.globalAlpha = 1;
        }
    }

    const isMobile = window.innerWidth < 768;
    const starCount = isMobile ? 60 : 150;
    for (let i = 0; i < starCount; i++) stars.push(new Star());

    let currentSpeed = 2;
    function animate() {
        currentSpeed += (targetSpeed - currentSpeed) * 0.1;
        ctx.fillStyle = 'rgba(2, 2, 4, 0.4)';
        ctx.fillRect(0, 0, width, height);
        stars.forEach(star => { star.update(currentSpeed); star.draw(currentSpeed); });
        requestAnimationFrame(animate);
    }
    animate();

    // --- 3. SCENE OBSERVER ---
    const sceneObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('scene-active');
                if (entry.target.id === 'search') handleSearchSequence(entry.target);
                else if (entry.target.id === 'movie-msg') handleBatmanSequence(entry.target); // [NEW] Batman Handler
                else {
                    entry.target.querySelectorAll('.type-writer').forEach(tw => {
                        if (!tw.dataset.typed) {
                            setTimeout(() => typeCustom(tw, tw.dataset.text), 500);
                            tw.dataset.typed = "true";
                        }
                    });
                }
            }
        });
    }, { threshold: isMobile ? 0.2 : 0.4 });

    document.querySelectorAll('.scene').forEach(s => sceneObserver.observe(s));

    // --- 4. SEARCH SEQUENCE ---
    function handleSearchSequence(section) {
        if (section.dataset.run === "true") return;
        section.dataset.run = "true";
        const textEl = section.querySelector('.type-writer');

        typeCustom(textEl, "Finding the dev hero...", () => {
            movieScrollTimer = setTimeout(() => {
                textEl.textContent = "";
                typeCustom(textEl, "oh found , the myth , the man , the legend - he is in palghar right now !", () => {
                    const pin = document.getElementById('palghar-container');
                    const map = document.getElementById('map-world');
                    if (pin) pin.style.opacity = '1';
                    movieScrollTimer = setTimeout(() => {
                        if (map) {
                            map.style.transformOrigin = "69% 42%";
                            map.style.transform = "scale(4)";
                        }
                        movieScrollTimer = setTimeout(() => {
                            textEl.textContent = "";
                            textEl.classList.add('text-neon-blue');
                            typeCustom(textEl, "Target Found.", () => {
                                movieScrollTimer = setTimeout(() => {
                                    engageWarp('target');
                                    if (isMovieMode) {
                                        movieScrollTimer = setTimeout(() => {
                                            launchProfile(document.getElementById('profile-launcher'));
                                        }, 4000);
                                    }
                                }, 1000);
                            });
                        }, 2500);
                    }, 500);
                });
            }, 2000);
        });
    }

    // --- 4.5 BATMAN SEQUENCE ---
    function handleBatmanSequence(section) {
        if (section.dataset.run === "true") return;
        section.dataset.run = "true";

        const textEl = section.querySelector('.type-writer');
        const signal = document.getElementById('bat-signal-container');

        // 1. Type the text
        typeCustom(textEl, "Yes, I am Batman.", () => {
            // 2. Reveal Bat Signal with drama
            if (signal) {
                signal.classList.remove('opacity-0', 'scale-50');
                signal.classList.add('opacity-100', 'scale-100', 'signal-active');
            }
        });
    }

    // --- 5. INTERACTIVE FUNCTIONS ---
    // --- 5. INTERACTIVE FUNCTIONS ---

    // Core Navigation Logic: Focus Button -> Smooth Scroll
    // Core Navigation Logic: Focus Button -> Smooth Scroll
    function focusAndScroll(targetId) {
        const target = document.getElementById(targetId);
        if (!target) return;

        // 1. If NOT movie mode, just jump there
        if (!isMovieMode) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        // 2. MOVIE MODE: Premium Cinematic Transition

        // Define Animation Mappings
        const animMap = {
            'experience': { scene: 'focus-slide-active', btn: 'btn-slide-active' },
            'skills': { scene: 'focus-zoom-active', btn: 'btn-zoom-active' },
            'projects': { scene: 'focus-warp-active', btn: 'btn-warp-active' },
            'ai-labs': { scene: 'focus-glitch-active', btn: 'btn-glitch-active' },
            'concepts': { scene: 'focus-slide-active', btn: 'btn-slide-active' },
            'contact': { scene: 'focus-reveal-active', btn: 'btn-reveal-active' }
        };

        const config = animMap[targetId] || { scene: 'focus-zoom-active', btn: 'warp-charge-active' };

        // Find the button (Interaction Point)
        const btn = document.querySelector(`button[onclick*="'${targetId}'"]`);
        let currentSection = null;

        if (btn) {
            // Apply Unique Button Animation
            btn.classList.add(config.btn);

            // Find Current Section to Apply Scene Focus
            currentSection = btn.closest('.scene');
            if (currentSection) {
                currentSection.classList.add(config.scene);
            }

            // Cleanup after transition
            setTimeout(() => {
                btn.classList.remove(config.btn);
                if (currentSection) currentSection.classList.remove(config.scene);
            }, 2000);
        }

        // Warp Drive Surge
        targetSpeed = 80;
        setTimeout(() => targetSpeed = 2, 1200);

        // Smooth Scroll (Delayed for Animation Effect)
        setTimeout(() => {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 1200);
    }

    window.engageWarp = function (targetId) {
        focusAndScroll(targetId);
    };




    // Toggle Director Mode (Cinematic vs SPA)
    window.toggleDirectorMode = function () {
        if (isMovieMode) {
            // If currently in movie mode (unlikely to be clicked as navbar is hidden, but for safety)
            // Turn OFF -> Go to SPA
            localStorage.setItem('sawIntro', 'true');
            location.reload();
        } else {
            // If currently in SPA mode
            // Turn ON -> Play Movie
            localStorage.removeItem('sawIntro');
            location.reload();
        }
    };



    // --- Launch Profile Sequence ---
    window.launchProfile = function (element) {
        if (!element) return;
        element.classList.add('scanning-active');
        const section = element.closest('.scene');
        if (section) section.querySelectorAll('[class*="animate-[spin_"]').forEach(r => r.classList.add('resonance-active'));

        setTimeout(() => {
            element.classList.remove('scanning-active');
            const btn = document.getElementById('mission-button');
            if (btn) {
                // Pulse the button to show it's the next step
                btn.classList.add('button-engaged');

                setTimeout(() => {
                    if (isMovieMode) {
                        // Sequence 1: Experience
                        movieScrollTimer = setTimeout(() => {
                            if (!isMovieMode) return;
                            focusAndScroll('experience');

                            // Sequence 2: Skills
                            movieScrollTimer = setTimeout(() => {
                                if (!isMovieMode) return;
                                focusAndScroll('skills');

                                // Sequence 3: Projects
                                movieScrollTimer = setTimeout(() => {
                                    if (!isMovieMode) return;
                                    focusAndScroll('projects');

                                    // Sequence 4: AI Labs
                                    movieScrollTimer = setTimeout(() => {
                                        if (!isMovieMode) return;
                                        focusAndScroll('ai-labs');

                                        // Sequence 4.5: Concepts
                                        movieScrollTimer = setTimeout(() => {
                                            if (!isMovieMode) return;
                                            focusAndScroll('concepts');

                                            // Sequence 5: Batman Message (Movie Msg)
                                            movieScrollTimer = setTimeout(() => {
                                                if (!isMovieMode) return;
                                                focusAndScroll('movie-msg');

                                                // Sequence 6: Contact + Finish
                                                movieScrollTimer = setTimeout(() => {
                                                    if (!isMovieMode) return;
                                                    focusAndScroll('contact');

                                                    // Final Reset
                                                    movieScrollTimer = setTimeout(() => {
                                                        if (isMovieMode) {
                                                            localStorage.setItem('sawIntro', 'true');
                                                            location.reload();
                                                        }
                                                    }, 4000);
                                                }, 5000); // 5 sec for Batman to display
                                            }, 5000); // 5 sec for AI Labs
                                        }, 5000);
                                    }, 5000);
                                }, 5000);
                            }, 5000);
                        }, 1000);
                    } else focusAndScroll('experience');
                }, 1000);
            }
        }, 2500);
    };

    // --- 6. UTILS ---
    function typeCustom(element, text, callback) {
        if (!element || !text) { if (callback) callback(); return; }
        element.textContent = '';
        let i = 0;
        const interval = setInterval(() => {
            element.textContent += text.charAt(i);
            i++;
            if (i >= text.length) { clearInterval(interval); if (callback) callback(); }
        }, 40);
    }

    // --- 7. PROJECT CARD EFFECTS ---
    document.addEventListener('mousemove', (e) => {
        document.querySelectorAll('.project-card').forEach(card => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // BOOT
    console.log("=== CINEMATIC ENGINE BOOT ===");
    console.log("isMovieMode:", isMovieMode);
    console.log("localStorage.sawIntro:", localStorage.getItem('sawIntro'));

    if (isMovieMode) {
        console.log("Starting movie mode...");
        // Safety Fallback: Force Hero to be active to ensure "Skip" button is visible
        const hero = document.getElementById('hero');
        if (hero) hero.classList.add('scene-active');

        movieScrollTimer = setTimeout(() => engageWarp('search'), 3000);
    } else {
        console.log("Starting SPA mode...");
        switchToSPAMode();
    }
});

// Mobile Menu Toggle (Premium Drawer)
function toggleMobileMenu() {
    const backdrop = document.getElementById('mobile-menu-backdrop');
    const drawer = document.getElementById('mobile-menu-drawer');
    const body = document.body;

    if (!backdrop || !drawer) return;

    // Toggle Backdrop
    backdrop.classList.toggle('opacity-0');
    backdrop.classList.toggle('pointer-events-none');

    // Toggle Drawer
    drawer.classList.toggle('translate-x-full');

    // Body Scroll
    if (!drawer.classList.contains('translate-x-full')) {
        body.style.overflow = 'hidden';
    } else {
        body.style.overflow = '';
    }

    // Link Animations
    const links = document.querySelectorAll('.mobile-link');
    links.forEach((link, index) => {
        if (!drawer.classList.contains('translate-x-full')) {
            // Opening
            setTimeout(() => {
                link.classList.remove('translate-x-10', 'opacity-0');
            }, 100 + (index * 50));
        } else {
            // Closing
            link.classList.add('translate-x-10', 'opacity-0');
        }
    });
}

