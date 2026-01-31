<section class="scene flex flex-col items-center justify-center relative !h-auto !min-h-screen py-20" id="skills">

    <!-- Constellation Connection SVG -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-40">
        <svg width="100%" height="100%" class="w-full h-full">
            <path d="M 100,200 L 400,100 L 800,300" class="constellation-line" stroke="#00f3ff" stroke-width="1"
                fill="none" />
            <path d="M 200,500 L 500,400 L 900,600" class="constellation-line" stroke="#bc13fe" stroke-width="1"
                fill="none" style="animation-delay: -2s;" />
            <path d="M 300,100 L 600,300 L 200,600" class="constellation-line" stroke="#ff0055" stroke-width="1"
                fill="none" style="animation-delay: -4s;" />
            <path d="M 800,100 L 1000,400" class="constellation-line" stroke="#00f3ff" stroke-width="1" fill="none" />
        </svg>
    </div>

    <div class="content-layer w-full max-w-7xl text-center z-10">
        <h2 class="text-4xl md:text-6xl font-heading mb-20 text-glow-purple reveal">Neural Constellation</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 md:gap-8 relative">
            @php
            $skillCategories = [
                ['name' => 'Laravel', 'icon' => 'code-2', 'color' => 'blue'],
                ['name' => 'CodeIgniter', 'icon' => 'flame', 'color' => 'purple'],
                ['name' => 'MySQL', 'icon' => 'database', 'color' => 'pink'],
                ['name' => 'Git', 'icon' => 'git-branch', 'color' => 'white'],
                ['name' => 'Angular', 'icon' => 'layers', 'color' => 'blue'],
                ['name' => 'APIs', 'icon' => 'box', 'color' => 'teal'],
                ['name' => 'PHP', 'icon' => 'code', 'color' => 'purple'],
                ['name' => 'Docker', 'icon' => 'container', 'color' => 'blue'],
                ['name' => 'JavaScript', 'icon' => 'file-code', 'color' => 'pink'],
                ['name' => 'Bootstrap', 'icon' => 'layout', 'color' => 'purple'],
                ['name' => 'AI Integration', 'icon' => 'brain', 'color' => 'pink'],
                ['name' => 'CI/CD', 'icon' => 'workflow', 'color' => 'teal'],
            ];
            @endphp

            @foreach($skillCategories as $index => $skill)
            <div class="group flex flex-col items-center gap-4 skill-orb-float reveal" style="transition-delay: {{ $index * 50 }}ms;">
                <div
                    class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-black/50 border border-neon-{{ $skill['color'] }} flex items-center justify-center shadow-[0_0_30px_rgba(0,243,255,0.1)] group-hover:shadow-[0_0_50px_rgba(0,243,255,0.6)] group-hover:scale-110 transition-all duration-300 relative">
                    <div
                        class="absolute inset-0 rounded-full border border-neon-{{ $skill['color'] }}/20 animate-ping opacity-0 group-hover:opacity-100">
                    </div>
                    <i data-lucide="{{ $skill['icon'] }}" class="w-8 h-8 md:w-10 md:h-10 text-neon-{{ $skill['color'] }}"></i>
                </div>
                <span class="font-heading tracking-widest text-xs md:text-sm text-neon-{{ $skill['color'] }}">{{ $skill['name'] }}</span>
            </div>
            @endforeach
        </div>


    </div>
</section>
