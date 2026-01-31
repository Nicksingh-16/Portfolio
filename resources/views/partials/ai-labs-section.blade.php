<section class="scene flex flex-col items-center justify-center relative !h-auto !min-h-screen py-20 !overflow-visible" id="ai-labs">
    <div class="content-layer min-w-full lg:min-w-[1200px] grid grid-cols-1 lg:grid-cols-2 gap-16 items-center pb-32">
        <!-- Glowing AI Core -->
        <div class="relative flex justify-center items-center order-2 lg:order-1">
            <div class="w-80 h-80 relative group cursor-pointer">
                <div
                    class="absolute inset-0 bg-neon-purple rounded-full blur-[100px] opacity-50 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="absolute inset-0 border-4 border-white/10 rounded-full animate-[spin_8s_linear_infinite]">
                </div>
                <div
                    class="absolute inset-4 border-2 border-neon-purple rounded-full animate-[spin_12s_linear_infinite_reverse]">
                </div>

                <div
                    class="absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                    <i data-lucide="cpu" class="w-32 h-32 text-white drop-shadow-[0_0_20px_rgba(188,19,254,1)]"></i>
                </div>
            </div>
        </div>

        <div
            class="holo-card p-12 rounded-3xl border border-neon-purple/30 bg-black/60 backdrop-blur-xl order-1 lg:order-2">
            <div class="flex items-center gap-4 mb-6">
                <i data-lucide="flask-conical" class="text-neon-purple w-8 h-8"></i>
                <span class="text-neon-purple font-heading tracking-[0.3em] text-sm">EXPERIMENTAL DIVISION</span>
            </div>
            <h2 class="text-4xl md:text-5xl text-white font-heading mb-4">
                {{ $projects['personal'][0]['name'] ?? 'IELTSBandAI' }}
            </h2>
            <h3 class="text-xl text-gray-400 mb-8 border-b border-gray-800 pb-4">
                {{ $projects['personal'][0]['description'] ?? 'Advanced Neural Network for Language Assessment' }}
            </h3>

            <ul class="space-y-6 mb-10 text-gray-300">
                @if(isset($projects['personal'][0]['features']))
                    @foreach(array_slice($projects['personal'][0]['features'], 0, 3) as $feature)
                    <li class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-neon-purple rounded-full shadow-[0_0_10px_#bc13fe]"></div>
                        <span class="font-body text-lg">{{ $feature }}</span>
                    </li>
                    @endforeach
                @endif
            </ul>

            @if(isset($projects['personal'][0]['url']))
            <a href="{{ $projects['personal'][0]['url'] }}" target="_blank"
                class="w-full py-5 bg-neon-purple text-white font-heading text-lg tracking-wider rounded border border-neon-purple hover:bg-transparent hover:shadow-[0_0_30px_rgba(188,19,254,0.4)] transition-all block text-center">
                ACCESS SYSTEM
            </a>
            @else
            <button
                class="w-full py-5 bg-neon-purple text-white font-heading text-lg tracking-wider rounded border border-neon-purple hover:bg-transparent hover:shadow-[0_0_30px_rgba(188,19,254,0.4)] transition-all">
                ACCESS SYSTEM
            </button>
            @endif
        </div>
    </div>

    <!-- Storyline Navigation: Finale -->
    <div class="absolute bottom-6 left-0 w-full text-center z-20">
        <button onclick="engageWarp('concepts')"
            class="group flex flex-col items-center gap-2 text-gray-500 hover:text-white transition-colors mx-auto">
            <span class="text-xs font-heading tracking-[0.5em] uppercase">Establish Connection</span>
            <i data-lucide="chevrons-down" class="w-6 h-6 animate-bounce text-neon-blue"></i>
        </button>
    </div>
</section>
