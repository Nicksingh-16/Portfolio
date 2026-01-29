// Projects data
const projects = [
    {
        title: "Smart Water",
        category: "IoT / CMS",
        description: "IoT-based water management system with CodeIgniter CMS for monitoring valve status and usage analytics.",
        tech: "CodeIgniter",
        image: "https://images.unsplash.com/photo-1581092921461-eab62e97a782?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        stagger: "stagger-1"
    },
    {
        title: "Enopeck Seals",
        category: "Enterprise CMS",
        description: "Multi-role Content Management System built with Laravel for managing enterprise inventory and sales.",
        tech: "Laravel",
        image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        stagger: "stagger-2"
    },
    {
        title: "Octanet",
        category: "Full Stack",
        description: "Integrated Google Maps API with Laravel & Angular for location-based services and tracking.",
        tech: "Laravel + Angular",
        image: "https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        stagger: "stagger-3"
    },
    {
        title: "Benchmark IELTS",
        category: "EdTech",
        description: "AI-driven mock test platform built with Laravel and React to simulate real exam conditions.",
        tech: "Laravel + React",
        image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        stagger: "stagger-4"
    },
    {
        title: "Movie Recommender",
        category: "Academic",
        description: "Content-based filtering system using Python and Flask to suggest movies based on user preferences.",
        tech: "Python/Flask",
        image: "https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        stagger: "stagger-5"
    },
    {
        title: "Online Exam System",
        category: "Academic",
        description: "Comprehensive examination portal built with PHP for managing tests, students, and results.",
        tech: "PHP",
        image: "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        stagger: "stagger-6"
    }
];

// Render projects
const projectsGrid = document.getElementById('projectsGrid');
if (projectsGrid) {
    projectsGrid.innerHTML = projects.map(project => `
        <div class="glass-card rounded-xl overflow-hidden hover:-translate-y-2 transition-all duration-300 group card-3d bounce-in ${project.stagger}">
            <div class="h-48 bg-slate-800 relative overflow-hidden">
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors z-10"></div>
                <img src="${project.image}" alt="${project.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-4 left-4 z-20">
                    <span class="bg-[#0A2540] text-[#00D4AA] text-xs font-bold px-2 py-1 rounded glow-effect">${project.category}</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-[#00D4AA] transition-colors duration-300">${project.title}</h3>
                <p class="text-slate-400 text-sm mb-4 line-clamp-2">
                    ${project.description}
                </p>
                <div class="flex justify-between items-center border-t border-white/10 pt-4">
                    <div class="flex gap-2">
                        <i data-lucide="code" class="w-4 h-4 text-slate-500"></i>
                        <span class="text-xs text-slate-400">${project.tech}</span>
                    </div>
                    <a href="#" class="text-white hover:text-[#00D4AA] transition-all duration-300 magnetic hover:scale-125"><i data-lucide="arrow-up-right" class="w-5 h-5"></i></a>
                </div>
            </div>
        </div>
    `).join('');

    // Reinitialize Lucide icons for dynamically added content
    lucide.createIcons();
}

// Initialize Lucide Icons
lucide.createIcons();

// Initialize Chart.js for Skills Radar
const ctx = document.getElementById('skillsChart');
if (ctx) {
    new Chart(ctx.getContext('2d'), {
        type: 'radar',
        data: {
            labels: ['Laravel', 'PHP', 'SQL', 'React', 'Git', 'API'],
            datasets: [{
                label: 'Skill Level',
                data: [95, 90, 85, 75, 80, 85],
                fill: true,
                backgroundColor: 'rgba(0, 212, 170, 0.2)',
                borderColor: '#00D4AA',
                pointBackgroundColor: '#00D4AA',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#00D4AA'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    angleLines: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    pointLabels: {
                        color: '#cbd5e1',
                        font: {
                            size: 12,
                            family: "'Inter', sans-serif"
                        }
                    },
                    ticks: {
                        display: false,
                        backdropColor: 'transparent'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
}

// Mobile Menu Toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');

if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking on a link
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
}

// Navbar Scroll Effect
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) {
        nav.classList.add('shadow-lg');
    } else {
        nav.classList.remove('shadow-lg');
    }
});

// Cursor Trail Effect
const cursorTrail = document.getElementById('cursorTrail');
if (cursorTrail) {
    document.addEventListener('mousemove', (e) => {
        cursorTrail.style.left = e.clientX + 'px';
        cursorTrail.style.top = e.clientY + 'px';
    });
}

// Scroll Reveal Animation
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('reveal');
        }
    });
}, observerOptions);

// Observe all elements with opacity-0 class
document.querySelectorAll('.opacity-0').forEach(el => observer.observe(el));

// Parallax Effect on Scroll
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.parallax');

    parallaxElements.forEach(el => {
        const speed = el.dataset.speed || 0.5;
        el.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Magnetic Button Effect
document.querySelectorAll('.magnetic').forEach(button => {
    button.addEventListener('mousemove', (e) => {
        const rect = button.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        button.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
    });

    button.addEventListener('mouseleave', () => {
        button.style.transform = 'translate(0, 0)';
    });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
