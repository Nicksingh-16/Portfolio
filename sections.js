// Load all sections dynamically
document.getElementById('sections-container').innerHTML = `
    <!-- About Section -->
    <section id="about" class="py-24 bg-[#0B2A49] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-5">
            <div class="absolute inset-0 bg-gradient-to-l from-[#00D4AA] to-transparent animate-pulse"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 fade-in-scale">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 slide-in-left">Driven by <span class="text-[#00D4AA] neon-glow">Innovation</span> & Code</h2>
                    <p class="text-slate-300 mb-6 leading-relaxed text-lg slide-in-left stagger-1">
                        I am a motivated Software Developer with a strong foundation in Computer Science and a passion for building dynamic, high-performance web applications. My journey involves solving complex problems and turning ideas into reality using the Laravel ecosystem.
                    </p>
                    <p class="text-slate-400 mb-8 leading-relaxed slide-in-left stagger-2">
                        Whether it's developing robust backend systems or crafting intuitive front-end interfaces, I thrive in collaborative environments where I can contribute to impactful projects. I'm constantly learning and adapting to new technologies to stay ahead in the ever-evolving tech landscape.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="glass-card p-4 rounded-lg text-center hover:bg-white/5 transition-all duration-300 cursor-default group card-3d bounce-in stagger-1">
                            <div class="bg-[#00D4AA]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-125 transition-transform duration-300 glow-effect">
                                <i data-lucide="book-open" class="text-[#00D4AA]"></i>
                            </div>
                            <h3 class="text-white font-medium">Reading</h3>
                        </div>
                        <div class="glass-card p-4 rounded-lg text-center hover:bg-white/5 transition-all duration-300 cursor-default group card-3d bounce-in stagger-2">
                            <div class="bg-[#00D4AA]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-125 transition-transform duration-300 glow-effect">
                                <i data-lucide="music" class="text-[#00D4AA]"></i>
                            </div>
                            <h3 class="text-white font-medium">Music</h3>
                        </div>
                        <div class="glass-card p-4 rounded-lg text-center hover:bg-white/5 transition-all duration-300 cursor-default group card-3d bounce-in stagger-3">
                            <div class="bg-[#00D4AA]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-125 transition-transform duration-300 glow-effect">
                                <i data-lucide="activity" class="text-[#00D4AA]"></i>
                            </div>
                            <h3 class="text-white font-medium">Sports</h3>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2 relative slide-in-right">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[#00D4AA] to-[#F59E0B] rounded-2xl opacity-20 blur-lg animate-pulse"></div>
                    <div class="relative glass-card p-8 rounded-2xl border border-white/10 hover:border-[#00D4AA]/30 transition-all duration-500 card-3d">
                        <div class="flex items-start gap-4 mb-6">
                            <i data-lucide="quote" class="text-[#00D4AA] w-8 h-8 fill-current opacity-50 glow-effect"></i>
                            <p class="text-xl text-white font-light italic text-reveal">
                                "My objective is to leverage my technical skills in a challenging role where I can contribute to the success of a dynamic team."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 border-t border-white/10 pt-6">
                            <div class="w-12 h-12 rounded-full bg-slate-700 overflow-hidden hover:scale-110 transition-transform duration-300 magnetic">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Nishant Shekhawat</h4>
                                <p class="text-[#00D4AA] text-sm glow-effect">Full Stack Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-24 bg-[#0A2540] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in-scale">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Professional <span class="text-[#00D4AA] neon-glow">Journey</span></h2>
                <div class="w-20 h-1 bg-[#00D4AA] mx-auto rounded-full glow-effect"></div>
            </div>

            <div class="relative">
                <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 top-0 bottom-0 w-1 bg-slate-800 glow-effect"></div>

                <!-- Timeline Item 1 -->
                <div class="relative z-10 mb-12 md:mb-24 slide-in-up stagger-1">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="glass-card p-6 rounded-xl hover:bg-white/5 transition-all duration-500 card-3d hover:shadow-lg hover:shadow-[#00D4AA]/20">
                                <h3 class="text-2xl font-bold text-white mb-2">Laravel Developer</h3>
                                <p class="text-[#00D4AA] font-medium mb-2 glow-effect">Webito Infotech</p>
                                <span class="inline-block px-3 py-1 bg-slate-800 rounded-full text-xs text-slate-400 mb-4">Jun 2024 - Present</span>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Developing and maintaining robust web applications using Laravel and CodeIgniter. Collaborating with cross-functional teams to deliver high-quality software solutions. Troubleshooting complex issues and optimizing application performance.
                                </p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 transform -translate-x-1/2 w-8 h-8 bg-[#00D4AA] rounded-full border-4 border-[#0A2540] shadow-[0_0_0_4px_rgba(0,212,170,0.2)] scale-pulse glow-effect"></div>
                        <div class="w-full md:w-1/2 md:pl-12 hidden md:block"></div>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="relative z-10 mb-12 md:mb-24 slide-in-up stagger-2">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 hidden md:block"></div>
                        <div class="absolute left-0 md:left-1/2 transform -translate-x-1/2 w-8 h-8 bg-[#F59E0B] rounded-full border-4 border-[#0A2540] shadow-[0_0_0_4px_rgba(245,158,11,0.2)] scale-pulse"></div>
                        <div class="w-full md:w-1/2 md:pl-12">
                            <div class="glass-card p-6 rounded-xl hover:bg-white/5 transition-all duration-500 card-3d hover:shadow-lg hover:shadow-[#F59E0B]/20">
                                <h3 class="text-2xl font-bold text-white mb-2">Software Developer</h3>
                                <p class="text-[#F59E0B] font-medium mb-2">Astronaut Creatives</p>
                                <span class="inline-block px-3 py-1 bg-slate-800 rounded-full text-xs text-slate-400 mb-4">Apr 2023 - Apr 2024</span>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Built high-performance applications focusing on fintech solutions. Utilized PHP and Angular to create responsive, secure, and user-friendly interfaces. Managed database architecture and API integrations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="relative z-10 slide-in-up stagger-3">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="glass-card p-6 rounded-xl hover:bg-white/5 transition-all duration-500 card-3d hover:shadow-lg hover:shadow-slate-600/20">
                                <h3 class="text-2xl font-bold text-white mb-2">BSc Computer Science</h3>
                                <p class="text-[#00D4AA] font-medium mb-2 glow-effect">University of Mumbai</p>
                                <span class="inline-block px-3 py-1 bg-slate-800 rounded-full text-xs text-slate-400 mb-4">2020 - 2023</span>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Graduated with distinction (9.43 CGPA). Focused on core computer science principles, algorithms, and software engineering methodologies.
                                </p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 transform -translate-x-1/2 w-8 h-8 bg-slate-600 rounded-full border-4 border-[#0A2540] scale-pulse"></div>
                        <div class="w-full md:w-1/2 md:pl-12 hidden md:block"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-24 bg-[#0B2A49] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-[#00D4AA]/5 to-transparent pointer-events-none animate-pulse"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 fade-in-scale">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Technical <span class="text-[#00D4AA] neon-glow">Arsenal</span></h2>
                <p class="text-slate-400 max-w-2xl mx-auto">A comprehensive toolkit for building modern web solutions.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center hover:bg-white/5 transition-all duration-300 hover:-translate-y-2 group border-l-4 border-[#00D4AA] card-3d bounce-in stagger-1">
                        <i data-lucide="code-2" class="w-8 h-8 text-[#00D4AA] mb-3 group-hover:scale-125 transition-transform duration-300 glow-effect"></i>
                        <span class="text-white font-medium">Laravel</span>
                        <div class="w-full h-1 bg-slate-700 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-[#00D4AA] loading-bar"></div>
                        </div>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center hover:bg-white/5 transition-all duration-300 hover:-translate-y-2 group border-l-4 border-[#F59E0B] card-3d bounce-in stagger-2">
                        <i data-lucide="database" class="w-8 h-8 text-[#F59E0B] mb-3 group-hover:scale-125 transition-transform duration-300"></i>
                        <span class="text-white font-medium">SQL/MySQL</span>
                        <div class="w-full h-1 bg-slate-700 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-[#F59E0B] loading-bar"></div>
                        </div>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center hover:bg-white/5 transition-all duration-300 hover:-translate-y-2 group border-l-4 border-[#00D4AA] card-3d bounce-in stagger-3">
                        <i data-lucide="server" class="w-8 h-8 text-[#00D4AA] mb-3 group-hover:scale-125 transition-transform duration-300 glow-effect"></i>
                        <span class="text-white font-medium">PHP</span>
                        <div class="w-full h-1 bg-slate-700 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-[#00D4AA] loading-bar"></div>
                        </div>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center hover:bg-white/5 transition-all duration-300 hover:-translate-y-2 group border-l-4 border-blue-500 card-3d bounce-in stagger-4">
                        <i data-lucide="layout" class="w-8 h-8 text-blue-500 mb-3 group-hover:scale-125 transition-transform duration-300"></i>
                        <span class="text-white font-medium">React/JS</span>
                        <div class="w-full h-1 bg-slate-700 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-blue-500 loading-bar"></div>
                        </div>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center hover:bg-white/5 transition-all duration-300 hover:-translate-y-2 group border-l-4 border-orange-500 card-3d bounce-in stagger-5">
                        <i data-lucide="git-branch" class="w-8 h-8 text-orange-500 mb-3 group-hover:scale-125 transition-transform duration-300"></i>
                        <span class="text-white font-medium">Git</span>
                        <div class="w-full h-1 bg-slate-700 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-orange-500 loading-bar"></div>
                        </div>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center hover:bg-white/5 transition-all duration-300 hover:-translate-y-2 group border-l-4 border-purple-500 card-3d bounce-in stagger-6">
                        <i data-lucide="globe" class="w-8 h-8 text-purple-500 mb-3 group-hover:scale-125 transition-transform duration-300"></i>
                        <span class="text-white font-medium">REST API</span>
                        <div class="w-full h-1 bg-slate-700 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-purple-500 loading-bar"></div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl hover:shadow-lg hover:shadow-[#00D4AA]/20 transition-all duration-500 card-3d fade-in-scale">
                    <h3 class="text-white font-bold mb-6 text-center">Proficiency Overview</h3>
                    <div class="h-80 w-full overflow-hidden">
                        <canvas id="skillsChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 flex flex-wrap justify-center gap-3 fade-in-scale">
                <span class="px-4 py-2 bg-slate-800 rounded-full text-slate-300 text-sm border border-slate-700 hover:border-[#00D4AA] transition-all duration-300 hover:scale-110 magnetic shimmer">HTML5 & CSS3</span>
                <span class="px-4 py-2 bg-slate-800 rounded-full text-slate-300 text-sm border border-slate-700 hover:border-[#00D4AA] transition-all duration-300 hover:scale-110 magnetic shimmer">Bootstrap & Tailwind</span>
                <span class="px-4 py-2 bg-slate-800 rounded-full text-slate-300 text-sm border border-slate-700 hover:border-[#00D4AA] transition-all duration-300 hover:scale-110 magnetic shimmer">CodeIgniter</span>
                <span class="px-4 py-2 bg-slate-800 rounded-full text-slate-300 text-sm border border-slate-700 hover:border-[#00D4AA] transition-all duration-300 hover:scale-110 magnetic shimmer">Third-Party APIs</span>
                <span class="px-4 py-2 bg-slate-800 rounded-full text-slate-300 text-sm border border-slate-700 hover:border-[#00D4AA] transition-all duration-300 hover:scale-110 magnetic shimmer">SDLC & Agile</span>
                <span class="px-4 py-2 bg-slate-800 rounded-full text-slate-300 text-sm border border-slate-700 hover:border-[#00D4AA] transition-all duration-300 hover:scale-110 magnetic shimmer">Frontend-Backend Integration</span>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-24 bg-[#0A2540]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 fade-in-scale">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Featured <span class="text-[#00D4AA] neon-glow">Projects</span></h2>
                    <p class="text-slate-400">Showcasing my best work in web development.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="https://github.com" target="_blank" class="text-[#00D4AA] hover:text-white flex items-center gap-2 transition-all duration-300 magnetic hover:scale-110">
                        View GitHub <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- AI Project Highlight -->
            <div class="mb-16 relative group slide-in-up">
                <div class="absolute -inset-1 bg-gradient-to-r from-[#00D4AA] to-[#F59E0B] rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200 animate-pulse"></div>
                <div class="relative glass-card rounded-2xl overflow-hidden md:flex card-3d">
                    <div class="md:w-1/2 bg-slate-800 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-[#00D4AA]/10 z-10"></div>
                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="AI Project" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 z-20 bg-[#F59E0B] text-[#0A2540] text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 scale-pulse">
                            <i data-lucide="sparkles" class="w-3 h-3 glow-effect"></i> AI Powered
                        </div>
                    </div>
                    <div class="md:w-1/2 p-8 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold text-white mb-2 text-reveal">IELTS Band AI</h3>
                        <p class="text-[#00D4AA] text-sm mb-4 glow-effect">ieltsbandai.onrender.com</p>
                        <p class="text-slate-300 mb-6 leading-relaxed">
                            An innovative AI-based platform for quick speaking and writing evaluations. Users receive instant feedback and band scores, helping them prepare effectively for their IELTS exams.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-3 py-1 bg-slate-700/50 rounded text-xs text-slate-300 hover:bg-slate-600 transition-colors duration-300 magnetic">Python</span>
                            <span class="px-3 py-1 bg-slate-700/50 rounded text-xs text-slate-300 hover:bg-slate-600 transition-colors duration-300 magnetic">Flask</span>
                            <span class="px-3 py-1 bg-slate-700/50 rounded text-xs text-slate-300 hover:bg-slate-600 transition-colors duration-300 magnetic">OpenAI API</span>
                            <span class="px-3 py-1 bg-slate-700/50 rounded text-xs text-slate-300 hover:bg-slate-600 transition-colors duration-300 magnetic">React</span>
                        </div>
                        <div class="flex gap-4">
                            <a href="#" class="px-6 py-3 bg-[#00D4AA] text-[#0A2540] font-bold rounded-lg hover:bg-white transition-all duration-300 flex items-center gap-2 magnetic hover:scale-110 hover-glow">
                                Live Demo <i data-lucide="play-circle" class="w-4 h-4"></i>
                            </a>
                            <a href="#" class="px-6 py-3 border border-slate-600 text-slate-300 font-medium rounded-lg hover:border-white hover:text-white transition-all duration-300 magnetic hover:scale-105">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projectsGrid"></div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-[#0B2A49] relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#00D4AA] rounded-full filter blur-3xl animate-float morphing-shape"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-[#F59E0B] rounded-full filter blur-3xl animate-float-delayed morphing-shape"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="fade-in-scale">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 slide-in-left">Let's Build <span class="text-[#00D4AA] neon-glow">Innovative</span> Web Solutions</h2>
                    <p class="text-slate-300 mb-8 leading-relaxed slide-in-left stagger-1">
                        I'm currently available for freelance work or full-time opportunities. If you have a project that needs some creative touch, or just want to say hi, feel free to drop a message.
                    </p>
                    
                    <div class="space-y-6 mb-12">
                        <div class="flex items-start gap-4 slide-in-left stagger-2 hover:translate-x-2 transition-transform duration-300">
                            <div class="bg-[#00D4AA]/10 p-3 rounded-lg glow-effect">
                                <i data-lucide="map-pin" class="w-6 h-6 text-[#00D4AA]"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Location</h4>
                                <p class="text-slate-400">A-10 Kanchan Pushp, Mahim Road, Palghar - 401404</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 slide-in-left stagger-3 hover:translate-x-2 transition-transform duration-300">
                            <div class="bg-[#00D4AA]/10 p-3 rounded-lg glow-effect">
                                <i data-lucide="phone" class="w-6 h-6 text-[#00D4AA]"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Phone</h4>
                                <p class="text-slate-400">8329387047</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 slide-in-left stagger-4 hover:translate-x-2 transition-transform duration-300">
                            <div class="bg-[#00D4AA]/10 p-3 rounded-lg glow-effect">
                                <i data-lucide="mail" class="w-6 h-6 text-[#00D4AA]"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Email</h4>
                                <p class="text-slate-400">nishantshekhawat2001@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4 slide-in-left stagger-5">
                        <a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#00D4AA] hover:text-[#0A2540] transition-all duration-300 hover:-translate-y-1 magnetic hover-glow">
                            <i data-lucide="linkedin" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#00D4AA] hover:text-[#0A2540] transition-all duration-300 hover:-translate-y-1 magnetic hover-glow">
                            <i data-lucide="github" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#00D4AA] hover:text-[#0A2540] transition-all duration-300 hover:-translate-y-1 magnetic hover-glow">
                            <i data-lucide="twitter" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>

                <div class="glass-card p-8 rounded-2xl border border-white/10 hover:border-[#00D4AA]/30 transition-all duration-500 card-3d slide-in-right">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="fade-in-scale stagger-1">
                                <label class="block text-sm font-medium text-slate-400 mb-2">Name</label>
                                <input type="text" class="w-full bg-slate-800/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#00D4AA] focus:ring-1 focus:ring-[#00D4AA] transition-all duration-300 hover:border-slate-600" placeholder="John Doe">
                            </div>
                            <div class="fade-in-scale stagger-2">
                                <label class="block text-sm font-medium text-slate-400 mb-2">Email</label>
                                <input type="email" class="w-full bg-slate-800/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#00D4AA] focus:ring-1 focus:ring-[#00D4AA] transition-all duration-300 hover:border-slate-600" placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="fade-in-scale stagger-3">
                            <label class="block text-sm font-medium text-slate-400 mb-2">Subject</label>
                            <input type="text" class="w-full bg-slate-800/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#00D4AA] focus:ring-1 focus:ring-[#00D4AA] transition-all duration-300 hover:border-slate-600" placeholder="Project Inquiry">
                        </div>
                        <div class="fade-in-scale stagger-4">
                            <label class="block text-sm font-medium text-slate-400 mb-2">Message</label>
                            <textarea rows="4" class="w-full bg-slate-800/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#00D4AA] focus:ring-1 focus:ring-[#00D4AA] transition-all duration-300 hover:border-slate-600" placeholder="Tell me about your project..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-[#00D4AA] text-[#0A2540] font-bold py-4 rounded-lg hover:bg-white transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-[#00D4AA]/20 hover:shadow-[#00D4AA]/40 magnetic hover-glow fade-in-scale stagger-5">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
`;
