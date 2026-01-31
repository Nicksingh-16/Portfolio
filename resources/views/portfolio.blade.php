<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $personalInfo['name'] ?? 'Nishant Shekhawat' }} | Cinematic Portfolio</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Portfolio of {{ $personalInfo['name'] ?? 'Nishant Shekhawat' }} - {{ $personalInfo['title'] ?? 'Software Developer | PHP | Laravel Specialist' }}">
    <meta name="keywords" content="Laravel Developer, PHP Developer, Full Stack Developer, Web Development, Software Engineer">
    <meta name="author" content="{{ $personalInfo['name'] ?? 'Nishant Shekhawat' }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        space: '#020204',
                        neon: {
                            blue: '#00f3ff',
                            purple: '#bc13fe',
                            pink: '#ff0055',
                        }
                    },
                    fontFamily: {
                        heading: ['Orbitron', 'sans-serif'],
                        body: ['Rajdhani', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Three.js for 3D Earth -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

    <!-- Cinematic Engine Styles -->
    <link rel="stylesheet" href="{{ asset('css/cinematic.css') }}">
</head>

<body class="bg-space text-white overflow-x-hidden">

<!-- Glass Navbar (Hidden during Intro) -->
<nav id="main-nav"
    class="fixed top-6 left-1/2 -translate-x-1/2 z-[5000] w-[90%] max-w-4xl md:bg-black/40 md:backdrop-blur-xl md:border md:border-white/10 md:rounded-full py-3 px-4 md:px-8 flex items-center justify-end md:justify-between opacity-0 translate-y-[-100px] transition-all duration-1000 pointer-events-none">
    <div class="hidden md:flex items-center gap-3">
        <div
            class="w-8 h-8 rounded-full bg-neon-blue flex items-center justify-center font-heading text-black font-black text-xs">
            NS</div>
        <span id="director-toggle" onclick="toggleDirectorMode()"
            class="font-heading text-xs tracking-widest hidden sm:block cursor-pointer hover:text-white transition-colors"
            title="Toggle Cinematic Mode">Director Mode: <span class="text-neon-blue">OFF</span></span>
    </div>
    <div class="hidden md:flex gap-4 md:gap-10">
        <a href="#experience"
            class="text-xs font-heading tracking-widest text-gray-400 hover:text-neon-blue transition-colors">EXPERIENCE</a>
        <a href="#skills"
            class="text-xs font-heading tracking-widest text-gray-400 hover:text-neon-purple transition-colors">SKILLS</a>
        <a href="#projects"
            class="text-xs font-heading tracking-widest text-gray-400 hover:text-neon-pink transition-colors">PROJECTS</a>
        <a href="#contact"
            class="text-xs font-heading tracking-widest text-gray-400 hover:text-white transition-colors border border-white/20 px-3 py-1 rounded-full hover:border-white">SIGNAL</a>
    </div>

    <!-- Mobile Menu Button -->
    <button onclick="toggleMobileMenu()" class="md:hidden text-white p-2">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
</nav>

<!-- Mobile Menu Drawer -->
<!-- Backdrop -->
<div id="mobile-menu-backdrop" onclick="toggleMobileMenu()" 
     class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[90] opacity-0 pointer-events-none transition-opacity duration-500">
</div>

<!-- Drawer -->
<div id="mobile-menu-drawer" 
     class="fixed top-0 right-0 w-24 h-full bg-black/80 backdrop-blur-md border-l border-white/10 z-[100] transform translate-x-full transition-transform duration-500 cubic-bezier(0.4, 0, 0.2, 1) flex flex-col items-center py-8 gap-8">
    
    <!-- Close Button -->
    <button onclick="toggleMobileMenu()" class="text-gray-400 hover:text-white transition-colors p-2 mb-4">
        <i data-lucide="x" class="w-8 h-8"></i>
    </button>

    <!-- Links Container -->
    <div class="flex-1 flex flex-col items-center gap-8 w-full">
        <a href="#" onclick="engageWarp('hero'); toggleMobileMenu()" title="Home"
           class="mobile-link group p-3 rounded-xl hover:bg-white/10 transition-all opacity-0 translate-x-10">
            <i data-lucide="home" class="w-6 h-6 text-gray-400 group-hover:text-neon-blue group-hover:scale-110 transition-all"></i>
        </a>
        
        <a href="#experience" onclick="engageWarp('experience'); toggleMobileMenu()" title="Experience"
           class="mobile-link group p-3 rounded-xl hover:bg-white/10 transition-all opacity-0 translate-x-10">
            <i data-lucide="briefcase" class="w-6 h-6 text-gray-400 group-hover:text-neon-blue group-hover:scale-110 transition-all"></i>
        </a>
        
        <a href="#skills" onclick="engageWarp('skills'); toggleMobileMenu()" title="Skills"
           class="mobile-link group p-3 rounded-xl hover:bg-white/10 transition-all opacity-0 translate-x-10">
            <i data-lucide="zap" class="w-6 h-6 text-gray-400 group-hover:text-neon-purple group-hover:scale-110 transition-all"></i>
        </a>
        
        <a href="#projects" onclick="engageWarp('projects'); toggleMobileMenu()" title="Projects"
           class="mobile-link group p-3 rounded-xl hover:bg-white/10 transition-all opacity-0 translate-x-10">
            <i data-lucide="folder-git-2" class="w-6 h-6 text-gray-400 group-hover:text-neon-pink group-hover:scale-110 transition-all"></i>
        </a>
        
        <a href="#concepts" onclick="engageWarp('concepts'); toggleMobileMenu()" title="Concepts"
           class="mobile-link group p-3 rounded-xl hover:bg-white/10 transition-all opacity-0 translate-x-10">
            <i data-lucide="brain-circuit" class="w-6 h-6 text-gray-400 group-hover:text-neon-blue group-hover:scale-110 transition-all"></i>
        </a>
        
        <a href="#contact" onclick="engageWarp('contact'); toggleMobileMenu()" title="Contact"
           class="mobile-link group p-3 rounded-xl hover:bg-white/10 transition-all opacity-0 translate-x-10">
            <i data-lucide="send" class="w-6 h-6 text-gray-400 group-hover:text-white group-hover:scale-110 transition-all"></i>
        </a>
    </div>

    <!-- Director Mode Toggle (Icon Only) -->
    <button onclick="toggleDirectorMode()" title="Director Mode"
            class="mt-auto w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-white/5 transition-colors relative">
        <i data-lucide="camera" class="w-5 h-5 text-gray-400"></i>
        <div id="mobile-director-indicator" class="absolute top-2 right-2 w-2 h-2 rounded-full bg-red-500 shadow-[0_0_50px_red]"></div>
    </button>
</div>

<!-- SECTION 1: HERO -->
<div class="cinematic-wrapper">
<section class="scene flex flex-col items-center justify-center relative select-none" id="hero">
    <div class="content-layer text-center z-10 p-4">
        <h1 class="text-4xl md:text-7xl font-heading mb-6 tracking-wider leading-tight">
            In a universe of <br>
            <span class="text-neon-blue text-glow">infinite developers</span>...
        </h1>
        <p class="text-xl md:text-3xl text-gray-400 font-light reveal mt-8 tracking-[0.2em]">
            one stands out.
        </p>

        <a href="#search"
            class="mt-16 animate-bounce text-neon-blue opacity-50 hover:opacity-100 cursor-pointer transition-opacity duration-300 block group">
            <i data-lucide="chevron-down"
                class="w-10 h-10 mx-auto group-hover:drop-shadow-[0_0_10px_rgba(0,243,255,0.8)]"></i>
            <span class="text-xs uppercase tracking-widest group-hover:text-glow">Engage Thrusters</span>
        </a>

        <!-- Skip Button -->
        <button onclick="switchToSPAMode()"
            class="mt-8 text-[10px] uppercase tracking-[0.4em] text-gray-500 hover:text-white transition-colors">
            [ Skip Cinematic Intro ]
        </button>
    </div>
</section>

<!-- SECTION 2: GALAXY SEARCH -->
<section class="scene relative w-full h-screen overflow-hidden flex items-center justify-center bg-space intro-section"
    id="search">
    <!-- Map & Heat Wrapper -->
    <div id="map-world"
        class="absolute inset-0 w-full h-full transition-transform duration-[2500ms] cubic-bezier(0.1, 0, 0.1, 1)">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/World_map_blank_without_borders.svg/2000px-World_map_blank_without_borders.svg.png"
            class="absolute inset-0 w-full h-full object-contain opacity-40"
            style="filter: invert(1) sepia(1) saturate(5) hue-rotate(180deg) drop-shadow(0 0 2px #00f3ff);"
            alt="World Map Outlines">

        <!-- Heatmap Overlay -->
        <div id="heat-layer" class="absolute inset-0 w-full h-full mix-blend-screen pointer-events-none opacity-30">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,243,255,0.1)_0%,transparent_70%)] animate-pulse"
                style="animation-duration: 4s;"></div>
        </div>

        <!-- Location Pin (Mumbai/Palghar) -->
        <div id="palghar-container"
            class="absolute top-[39.5%] left-[69.5%] w-0 h-0 flex items-center justify-center opacity-0 transition-opacity duration-500 z-10">
            <div class="content w-4 h-4 bg-white rounded-full shadow-[0_0_30px_#fff] animate-ping"></div>
            <div class="absolute w-2 h-2 bg-neon-pink rounded-full border border-white"></div>
            <div
                class="absolute -top-10 left-1/2 -translate-x-1/2 text-neon-blue font-heading text-sm tracking-widest whitespace-nowrap bg-black/90 px-3 py-1 border border-neon-blue rounded shadow-[0_0_20px_rgba(0,243,255,0.3)]">
                PALGHAR, IN</div>
        </div>
    </div>

    <!-- Foreground UI -->
    <div id="search-ui-layer"
        class="absolute inset-0 z-20 flex flex-col items-center justify-center pointer-events-none">
        <div class="w-[80vw] h-[60vh] border border-white/10 relative overflow-hidden rounded-lg">
            <div
                class="absolute top-0 left-0 w-full h-1 bg-neon-blue/40 shadow-[0_0_20px_#00f3ff] animate-[scanVertical_3s_linear_infinite]">
            </div>
        </div>
        <div class="mt-8 text-center bg-black/80 backdrop-blur-xl p-6 rounded border border-white/10">
            <h2 class="text-3xl font-heading text-white type-writer typing-cursor"></h2>
        </div>
    </div>
</section>

<!-- SECTION 3: TARGET FOUND -->
<section class="scene flex items-center justify-center relative !h-auto !min-h-screen py-10" id="target">
    <div class="content-layer grid grid-cols-1 md:grid-cols-2 gap-12 max-w-7xl mx-auto items-center p-6 w-full">
        <div class="order-2 md:order-1 text-left space-y-6">
            <div
                class="inline-flex items-center gap-2 border border-green-500 text-green-500 px-4 py-1 rounded-full text-xs font-bold tracking-widest animate-pulse">
                <i data-lucide="crosshair" class="w-4 h-4"></i> TARGET LOCKED
            </div>

            <h2 class="text-5xl md:text-7xl font-heading text-white text-glow leading-tight break-words">
                {{ $personalInfo['name'] ?? 'Nishant Shekhawat' }}
            </h2>

            <h3
                class="text-2xl md:text-3xl text-transparent bg-clip-text bg-gradient-to-r from-neon-blue to-neon-purple font-medium">
                {{ $personalInfo['title'] ?? 'Software Developer | PHP | Laravel' }}
            </h3>

            <div class="flex gap-6 pt-8">
                <button id="mission-button" onclick="engageWarp('experience')"
                    class="bg-black border border-neon-blue text-white px-6 md:px-10 py-4 font-bold font-heading hover:bg-neon-blue hover:text-black transition-all shadow-[0_0_20px_rgba(0,243,255,0.4)] tracking-wider rounded-sm text-sm md:text-base">
                    [ ACCESS PAST MISSIONS ]
                </button>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-4 text-gray-400 font-body text-sm opacity-0 reveal-delay">
                <div>> EXPERIENCE: LOADED</div>
                <div>> TECH STACK: ONLINE</div>
            </div>
        </div>

        <div class="order-1 md:order-2 relative perspective-1000 flex justify-center items-center">
            <!-- Solar System Profile Container -->
            <div class="relative w-[300px] h-[300px] md:w-[500px] md:h-[500px] flex items-center justify-center">

                <!-- Core: Profile Image -->
                <div id="profile-launcher"
                    class="relative z-20 w-48 h-48 md:w-64 md:h-64 rounded-full p-2 border-2 border-neon-blue/50 bg-black/50 backdrop-blur-md shadow-[0_0_50px_rgba(0,243,255,0.2)] group overflow-hidden">
                    <img src="{{ asset('media-profile.png') }}"
                        class="w-full h-full object-cover rounded-full transition-transform duration-500 group-hover:scale-95 group-hover:brightness-125"
                        alt="{{ $personalInfo['name'] ?? 'Nishant Shekhawat' }}">

                    <!-- Holographic Scan Beam -->
                    <div class="scanning-beam"></div>

                    <!-- Floating Verification Badge -->
                    <div
                        class="absolute -bottom-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-black border border-green-500 rounded-full flex items-center gap-2 shadow-[0_0_20px_rgba(34,197,94,0.4)] transition-opacity">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span
                            class="text-[10px] md:text-xs font-heading text-green-500 tracking-widest uppercase whitespace-nowrap">Identity
                            Verified</span>
                    </div>
                </div>

                <!-- Orbiting Tech Icons (Rings) -->
                @include('partials.tech-rings')

            </div>
        </div>
    </div>
</section>

<!-- SECTION 4: EXPERIENCE - MISSION LOG -->
<section class="scene flex flex-col items-center justify-center relative !h-auto !min-h-screen py-20" id="experience">
    <div class="content-layer max-w-6xl mx-auto w-full p-6">
        <h2
            class="text-5xl md:text-8xl font-heading text-center mb-20 text-white/10 absolute top-10 left-0 w-full select-none">
            MISSION LOG</h2>
        <h2 class="text-3xl md:text-5xl font-heading text-center mb-16 relative z-10"><span
                class="text-neon-blue">///</span> Experience Timeline</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
            @foreach($workExperience as $index => $job)
            <div class="holo-card p-8 rounded-xl border-l-4 @if($index % 2 == 0) border-neon-blue @else border-neon-purple @endif hover:translate-x-2 transition-transform">
                <div class="flex flex-col md:flex-row justify-between items-start mb-4 gap-2">
                    <h3 class="text-2xl text-white font-bold">{{ $job['company'] }}</h3>
                    <span class="@if($index % 2 == 0) text-neon-blue border-neon-blue @else text-neon-purple border-neon-purple @endif font-heading text-sm px-2 py-1 border rounded whitespace-nowrap">
                        {{ $job['duration'] }}
                    </span>
                </div>
                <h4 class="text-xl text-gray-300 mb-4">{{ $job['position'] }}</h4>
                <ul class="text-gray-400 space-y-2 list-disc list-inside text-sm">
                    @foreach(array_slice($job['achievements'], 0, 3) as $achievement)
                    <li>{{ $achievement }}</li>
                    @endforeach
                </ul>
                <div class="mt-4 flex flex-wrap gap-2">
                    @foreach(array_slice($job['technologies'], 0, 5) as $tech)
                    <span class="text-xs px-2 py-1 bg-gray-800 border border-gray-700 rounded text-gray-400">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>


    </div>
</section>

<!-- SECTION 5: SKILLS - NEURAL CONSTELLATION -->
@include('partials.skills-section')

<!-- SECTION 6: PROJECT WORLDS -->
@include('partials.projects-section')

<!-- SECTION 7: PERSONAL AI LABS -->
@include('partials.ai-labs-section')

<!-- SECTION 7.1: CONCEPTS & ARCHITECTURE -->
@include('partials.concepts-section')

<!-- SECTION 7.5: CINEMATIC MESSAGE -->
<section class="scene flex flex-col items-center justify-center relative select-none bg-black" id="movie-msg">
    <div class="content-layer text-center z-10 p-4 flex flex-col items-center">
        <!-- Bat Signal Container -->
        <div id="bat-signal-container" class="mb-8 opacity-0 scale-50 transition-all duration-1000 ease-out">
            <div
                class="relative w-48 h-32 md:w-64 md:h-40 bg-[#fff700] rounded-[50%] shadow-[0_0_50px_rgba(255,247,0,0.6)] flex items-center justify-center overflow-hidden border-4 border-[#fff700]">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black/10"></div>
                <svg viewBox="0 0 100 60" class="w-[90%] h-[90%] drop-shadow-md z-10">
                    <path fill="#020204"
                        d="M10,25 Q30,15 40,30 Q45,10 50,20 Q55,10 60,30 Q70,15 90,25 Q100,50 50,55 Q0,50 10,25 Z" />
                </svg>
            </div>
        </div>

        <h2 class="text-3xl md:text-5xl font-heading text-white type-writer" data-text="Yes, I am Batman."></h2>
    </div>
</section>

<!-- SECTION 8: FINAL CTA -->
<section class="scene relative flex flex-col items-center justify-center text-center p-6 bg-black/80" id="contact">
    <div class="content-layer z-10 max-w-4xl">
        <h2 class="text-5xl md:text-8xl font-heading text-white mb-10 leading-tight">
            Not just code. <br>
            I build <span class="text-neon-blue text-glow">intelligence</span>.
        </h2>

        <div class="flex flex-col md:flex-row gap-8 justify-center items-center mt-12">
            <a href="mailto:{{ $personalInfo['email'] ?? 'nishantshekhawat2001@gmail.com' }}"
                class="group relative inline-flex items-center justify-center w-64 h-16 bg-white text-black font-heading text-xl font-bold tracking-wider hover:bg-neon-blue transition-all duration-300 overflow-hidden rounded-sm">
                <span class="relative z-10 flex items-center gap-2">
                    CONTACT ME <i data-lucide="arrow-right"
                        class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>

            <a href="{{ $personalInfo['github'] ?? '#' }}" target="_blank"
                class="group relative inline-flex items-center justify-center w-64 h-16 border-2 border-white text-white font-heading text-xl font-bold tracking-wider hover:border-neon-purple hover:text-neon-purple transition-all duration-300 rounded-sm">
                VIEW GITHUB
            </a>
        </div>

        <p class="mt-20 text-gray-600 font-heading text-sm tracking-widest">
            © {{ date('Y') }} {{ strtoupper($personalInfo['name'] ?? 'NISHANT SHEKHAWAT') }} // SYSTEM OPERATIONAL
        </p>

        <!-- Mission Extraction Rocket -->
        <div class="extraction-rocket" onclick="switchToSPAMode()" title="Return to Hangar (Reset Portfolio)">
            <i data-lucide="rocket" class="w-8 h-8"></i>
            <div class="rocket-trail"></div>
        </div>
    </div>
</section>
</div>

<!-- Scroll to Top Button -->
@include('partials.scroll-top')

<!-- AI Chatbot Component -->
@include('partials.chatbot')

<!-- Project Modal -->
@include('partials.project-modal')

<!-- Script Init -->
<script src="{{ asset('js/cinematic.js') }}"></script>
<script>
    lucide.createIcons();
</script>
</body>

</html>
