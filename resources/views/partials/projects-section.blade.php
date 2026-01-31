<section class="scene flex flex-col items-center relative !h-auto !min-h-screen !overflow-visible !justify-start py-20 md:py-32" id="projects">
    <div class="content-layer max-w-7xl mx-auto w-full p-2 md:p-6">
        <h2 class="text-3xl md:text-5xl font-heading text-center mb-12"><span class="text-neon-pink">///</span> Project Archives</h2>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 w-full">
            @foreach($corporateProjects as $index => $project)
            <div class="project-card group {{ $index >= 3 ? 'hidden more-projects' : '' }}" 
                 onclick="openProjectModal('{{ json_encode($project) }}')">
                
                <div class="project-icon-wrapper group-hover:bg-neon-pink group-hover:text-black transition-colors">
                    @if(str_contains(strtolower($project['name']), 'water'))
                        <i data-lucide="droplets" class="w-8 h-8"></i>
                    @elseif(str_contains(strtolower($project['name']), 'cms'))
                        <i data-lucide="layout" class="w-8 h-8"></i>
                    @elseif(str_contains(strtolower($project['name']), 'isp'))
                        <i data-lucide="network" class="w-8 h-8"></i>
                    @elseif(str_contains(strtolower($project['name']), 'school'))
                        <i data-lucide="graduation-cap" class="w-8 h-8"></i>
                    @else
                        <i data-lucide="code-2" class="w-8 h-8"></i>
                    @endif
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="project-tag border-neon-pink text-neon-pink">{{ $project['category'] }}</span>
                    <span class="text-xs text-gray-400 border border-gray-700 rounded px-2 py-1">{{ $project['role'] }}</span>
                </div>

                <h3 class="project-title group-hover:text-neon-pink transition-colors">{{ $project['name'] }}</h3>
                <p class="project-desc line-clamp-3">{{ $project['description'] }}</p>

                <div class="mt-auto flex flex-wrap gap-2">
                    @foreach(array_slice($project['tech_stack'], 0, 3) as $tech)
                    <span class="text-[10px] text-gray-500 bg-white/5 px-2 py-1 rounded">{{ $tech }}</span>
                    @endforeach
                    @if(count($project['tech_stack']) > 3)
                    <span class="text-[10px] text-gray-500 px-1">+{{ count($project['tech_stack']) - 3 }}</span>
                    @endif
                </div>
                
                <div class="project-glow-pulse bg-neon-pink"></div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        @if(count($corporateProjects) > 3)
        <div class="mt-12 text-center w-full">
            <button id="load-more-btn" onclick="toggleMoreProjects()" 
                class="px-8 py-3 border border-neon-pink text-neon-pink font-heading tracking-widest hover:bg-neon-pink hover:text-black transition-all duration-300 rounded-sm uppercase text-sm">
                [ Load More Intel ]
            </button>
        </div>
        @endif

    </div>
</section>

<script>
    function toggleMoreProjects() {
        const hiddenProjects = document.querySelectorAll('.more-projects');
        const btn = document.getElementById('load-more-btn');
        
        hiddenProjects.forEach(el => {
            el.classList.toggle('hidden');
            // Add fade-in effect
            if(!el.classList.contains('hidden')) {
                el.animate([
                    { opacity: 0, transform: 'translateY(20px)' },
                    { opacity: 1, transform: 'translateY(0)' }
                ], { duration: 500, easing: 'ease-out' });
            }
        });

        if (btn.innerText.includes('LOAD MORE')) {
            btn.innerText = '[ COLLAPSE INTEL ]';
        } else {
            btn.innerText = '[ LOAD MORE INTEL ]';
            // Scroll back up to projects start if collapsing
            if(!document.querySelectorAll('.more-projects:not(.hidden)').length) {
                document.getElementById('projects').scrollIntoView({ behavior: 'smooth' });
            }
        }
    }
</script>
