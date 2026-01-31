<section class="scene flex flex-col items-center relative py-20 md:py-32 !h-auto !min-h-screen !overflow-visible !justify-start bg-black z-20" id="concepts">
    <div class="content-layer max-w-7xl mx-auto w-full p-6 !opacity-100 !visible">
        
        <!-- Section Title -->
        <h2 class="text-3xl md:text-5xl font-heading text-center mb-16">
            <span class="text-neon-purple">///</span> Conceptual Architecture
        </h2>

        <!-- Concepts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
            @foreach($conceptProjects as $project)
            <div class="group relative bg-[#0a0a0a] border border-white/10 rounded-xl overflow-hidden hover:border-neon-purple/50 transition-all duration-300">
                <!-- Hover Glow -->
                <div class="absolute inset-0 bg-neon-purple/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="p-8 relative z-10 flex flex-col h-full">
                    <!-- Icon -->
                    <div class="mb-6 text-neon-purple opacity-80 group-hover:scale-110 transition-transform duration-300">
                        @if(str_contains(strtolower($project['name']), 'health'))
                            <i data-lucide="heart-pulse" class="w-12 h-12"></i>
                        @elseif(str_contains(strtolower($project['name']), 'creator'))
                            <i data-lucide="users" class="w-12 h-12"></i>
                        @elseif(str_contains(strtolower($project['name']), 'railway'))
                            <i data-lucide="train" class="w-12 h-12"></i>
                        @else
                            <i data-lucide="file-code-2" class="w-12 h-12"></i>
                        @endif
                    </div>

                    <h3 class="text-xl font-heading text-white mb-2">{{ $project['name'] }}</h3>
                    <p class="text-gray-400 text-sm mb-6 flex-grow">{{ $project['description'] }}</p>

                    <button onclick="openConceptModal({{ $loop->index }})" 
                        class="w-full py-3 border border-neon-purple text-neon-purple font-bold tracking-wider hover:bg-neon-purple hover:text-white transition-all rounded uppercase text-xs">
                        View Blueprint
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <script>
            window.conceptProjects = @json($conceptProjects);
            
            function openConceptModal(index) {
                const project = window.conceptProjects[index];
                if(project) {
                    openProjectModal(project);
                }
            }
        </script>


        <!-- CONNECT / CONTRIBUTIONS SECTION -->
        <div class="border-t border-white/10 mt-32 pt-20 pb-32">
            <h3 class="text-2xl md:text-3xl font-heading text-center mb-16 text-gray-300">
                Network & Contributions
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                
                <!-- GitHub Card -->
                <a href="{{ $personalInfo['github'] }}" target="_blank" class="group relative bg-[#0d1117] border border-gray-700 rounded-xl p-8 hover:border-gray-500 transition-all">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <i data-lucide="github" class="w-10 h-10 text-white"></i>
                            <div>
                                <h4 class="text-white font-bold text-lg">GitHub Activity</h4>
                                <span class="text-green-400 text-xs font-mono">● System Online: 2,700+ Contributions</span>
                            </div>
                        </div>
                        <i data-lucide="arrow-up-right" class="w-6 h-6 text-gray-500 group-hover:text-white transition-colors"></i>
                    </div>
                    
                    <!-- Fake Contribution Graph -->
                    <div class="flex gap-1 items-end h-16 opacity-50 group-hover:opacity-100 transition-opacity">
                        @for($i = 0; $i < 20; $i++)
                            <div class="w-full bg-green-500/{{ rand(2,9) }}0 rounded-sm" style="height: {{ rand(20, 100) }}%"></div>
                        @endfor
                    </div>
                    <p class="mt-4 text-gray-400 text-sm">Explore open source contributions, repositories, and experimental labs.</p>
                </a>

                <!-- LinkedIn Card -->
                <a href="{{ $personalInfo['linkedin'] }}" target="_blank" class="group relative bg-[#0077b5]/10 border border-[#0077b5]/30 rounded-xl p-8 hover:border-[#0077b5] transition-all">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <i data-lucide="linkedin" class="w-10 h-10 text-[#0077b5]"></i>
                            <div>
                                <h4 class="text-white font-bold text-lg">Professional Network</h4>
                                <span class="text-blue-400 text-xs font-mono">● Connection Available</span>
                            </div>
                        </div>
                        <i data-lucide="arrow-up-right" class="w-6 h-6 text-gray-500 group-hover:text-white transition-colors"></i>
                    </div>
                    
                    <div class="space-y-3 opacity-60 group-hover:opacity-100 transition-opacity">
                        <div class="h-2 w-3/4 bg-[#0077b5]/30 rounded"></div>
                        <div class="h-2 w-1/2 bg-[#0077b5]/30 rounded"></div>
                        <div class="h-2 w-5/6 bg-[#0077b5]/30 rounded"></div>
                    </div>
                    <p class="mt-4 text-gray-400 text-sm">Connect for collaborations, detailed work history, and professional endorsements.</p>
                </a>

            </div>
        </div>

    </div>
</section>
