<!-- Project Modal (Moved to Body Root) -->
<div id="project-modal" class="fixed inset-0 z-[10000] hidden items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/95 backdrop-blur-xl cursor-not-allowed" onclick="closeProjectModal()"></div>
    
    <!-- Modal Content -->
    <div class="relative bg-[#050510] border border-neon-pink/50 rounded-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto shadow-[0_0_50px_rgba(255,0,85,0.2)] transform scale-95 opacity-0 transition-all duration-300 z-10" id="modal-content">
        
        <!-- Header -->
        <div class="sticky top-0 bg-[#050510]/95 backdrop-blur border-b border-white/10 p-6 flex justify-between items-start z-20">
            <div>
                <span id="modal-category" class="text-xs font-bold text-neon-pink tracking-widest uppercase mb-2 block">CATEGORY</span>
                <h3 id="modal-title" class="text-2xl md:text-3xl font-heading text-white">Project Title</h3>
            </div>
            <button onclick="closeProjectModal()" class="text-gray-400 hover:text-white p-2 hover:bg-white/10 rounded-full transition-colors">
                <i data-lucide="x" class="w-8 h-8"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 md:p-8 space-y-8">
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white/5 p-4 rounded-lg border border-white/5">
                <div>
                    <span class="text-gray-500 text-[10px] uppercase tracking-wider block">Role</span>
                    <span id="modal-role" class="text-white font-bold">Developer</span>
                </div>
                <div>
                    <span class="text-gray-500 text-[10px] uppercase tracking-wider block">Year</span>
                    <span id="modal-year" class="text-white font-bold">2024</span>
                </div>
                <div>
                    <span class="text-gray-500 text-[10px] uppercase tracking-wider block">Status</span>
                    <span id="modal-status" class="text-green-400 font-bold">Live</span>
                </div>
            </div>

            <!-- Description Area -->
            <div id="modal-desc-container">
                <h4 class="text-lg font-heading text-gray-300 mb-2">Mission Briefing</h4>
                <div id="modal-desc" class="text-gray-400 leading-relaxed space-y-4"></div>
            </div>

            <!-- Key Features -->
            <div>
                <h4 class="text-lg font-heading text-gray-300 mb-3">Key Contributions & Features</h4>
                <ul id="modal-features" class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <!-- Features injected here -->
                </ul>
            </div>

            <!-- Tech Stack -->
            <div>
                <h4 class="text-lg font-heading text-gray-300 mb-3">Technologies Deployed</h4>
                <div id="modal-tech" class="flex flex-wrap gap-2">
                    <!-- Tags injected here -->
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="sticky bottom-0 bg-[#050510] border-t border-white/10 p-6 flex justify-end z-20">
            <a id="modal-link" href="#" target="_blank" class="hidden inline-flex items-center gap-2 bg-neon-pink text-black px-6 py-3 font-heading font-bold rounded hover:brightness-110 transition-all">
                LAUNCH PROJECT
                <i data-lucide="external-link" class="w-5 h-5"></i>
            </a>
            <span id="modal-no-link" class="hidden text-gray-500 text-sm italic py-3">
                [ RESTRICTED ACCESS ]
            </span>
        </div>
    </div>
</div>

<script>
    console.log("Project Modal Script Loaded");

    function openProjectModal(projectJson) {
        try {
            console.log("Opening modal...", projectJson);
            
            // Parse data if it's a string
            let project = typeof projectJson === 'string' ? JSON.parse(projectJson) : projectJson;
            
            if (!project) {
                console.error("No project data provided");
                return;
            }

            // Populate Header
            document.getElementById('modal-title').innerText = project.name || 'Untitled';
            document.getElementById('modal-category').innerText = project.category || 'PROJECT';
            document.getElementById('modal-role').innerText = project.role || 'Developer';
            document.getElementById('modal-year').innerText = project.year || 'N/A';
            document.getElementById('modal-status').innerText = project.status || 'Archived';

            // Reset Content Areas
            const featuresList = document.getElementById('modal-features');
            const descArea = document.getElementById('modal-desc');
            const techList = document.getElementById('modal-tech');
            
            featuresList.innerHTML = '';
            descArea.innerHTML = '';
            techList.innerHTML = '';

            // ---------------------------------------------------------
            // 1. CONCEPTUAL DOCUMENTATION MODE
            // ---------------------------------------------------------
            if (project.documentation) {
                console.log("Rendering Documentation Mode");
                
                // Build HTML for Documentation
                // Using .replace(/\n/g, '<br>') to handle newlines if overview is plain text
                let overviewHtml = project.documentation.overview ? project.documentation.overview.replace(/\n/g, '<br>') : '';
                
                let docHtml = `
                    <div class="space-y-6">
                        <div>
                            <h5 class="text-neon-pink font-bold uppercase text-xs tracking-wider mb-2">Overview</h5>
                            <p class="text-gray-300 leading-relaxed">${overviewHtml}</p>
                        </div>
                `;

                if (project.documentation.problem || project.documentation.vision) {
                    docHtml += `<div class="grid grid-cols-1 md:grid-cols-2 gap-6">`;
                    if (project.documentation.problem) {
                        docHtml += `
                            <div class="bg-red-500/5 border border-red-500/20 p-4 rounded-lg">
                                <h5 class="text-red-400 font-bold uppercase text-xs tracking-wider mb-2">The Problem</h5>
                                <p class="text-gray-400 text-sm">${project.documentation.problem}</p>
                            </div>`;
                    }
                    if (project.documentation.vision) {
                        docHtml += `
                            <div class="bg-green-500/5 border border-green-500/20 p-4 rounded-lg">
                                <h5 class="text-green-400 font-bold uppercase text-xs tracking-wider mb-2">The Vision</h5>
                                <p class="text-gray-400 text-sm">${project.documentation.vision}</p>
                            </div>`;
                    }
                    docHtml += `</div>`;
                }
                
                docHtml += `</div>`;
                descArea.innerHTML = docHtml;

                // Features from Doc
                if (project.documentation.features && Array.isArray(project.documentation.features)) {
                    project.documentation.features.forEach(feature => {
                        const li = document.createElement('li');
                        li.className = 'flex items-start gap-2 text-sm text-gray-400';
                        li.innerHTML = `<i data-lucide="check-circle-2" class="w-4 h-4 text-neon-pink mt-0.5 shrink-0"></i> ${feature}`;
                        featuresList.appendChild(li);
                    });
                }
                
                // Tech Stack from Doc
                if (project.documentation.tech_stack && Array.isArray(project.documentation.tech_stack)) {
                    project.documentation.tech_stack.forEach(tech => {
                        const span = document.createElement('span');
                        span.className = 'px-3 py-1 bg-white/10 text-gray-300 text-xs rounded border border-white/10';
                        span.innerText = tech;
                        techList.appendChild(span);
                    });
                }
            } 
            // ---------------------------------------------------------
            // 2. STANDARD PROJECT MODE
            // ---------------------------------------------------------
            else {
                console.log("Rendering Standard Mode");
                descArea.innerText = project.description || '';

                // Features
                if (project.features && Array.isArray(project.features)) {
                    project.features.forEach(feature => {
                        const li = document.createElement('li');
                        li.className = 'flex items-start gap-2 text-sm text-gray-400';
                        li.innerHTML = `<i data-lucide="check-circle-2" class="w-4 h-4 text-neon-pink mt-0.5 shrink-0"></i> ${feature}`;
                        featuresList.appendChild(li);
                    });
                }

                // Tech
                if (project.tech_stack && Array.isArray(project.tech_stack)) {
                    project.tech_stack.forEach(tech => {
                        const span = document.createElement('span');
                        span.className = 'px-3 py-1 bg-white/10 text-gray-300 text-xs rounded border border-white/10';
                        span.innerText = tech;
                        techList.appendChild(span);
                    });
                }
            }
            
            // Link Handling
            const linkBtn = document.getElementById('modal-link');
            const noLinkMsg = document.getElementById('modal-no-link');
            
            if (project.link) {
                linkBtn.href = project.link;
                linkBtn.classList.remove('hidden');
                linkBtn.innerHTML = 'LAUNCH PROJECT <i data-lucide="external-link" class="w-5 h-5"></i>';
                noLinkMsg.classList.add('hidden');
            } else if (project.documentation) {
                 linkBtn.classList.add('hidden');
                 noLinkMsg.classList.remove('hidden');
                 noLinkMsg.innerText = '[ CONCEPTUAL ARCHITECTURE - NO LIVE DEPLOYMENT ]';
            } else {
                linkBtn.classList.add('hidden');
                noLinkMsg.classList.remove('hidden');
                noLinkMsg.innerText = '[ Restricted Access: Government/Internal Project ]';
            }

            // Show Modal
            const modal = document.getElementById('project-modal');
            const content = document.getElementById('modal-content');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Disable body scroll
            document.body.style.overflow = 'hidden';

            // Animate
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
                if(window.lucide) lucide.createIcons();
            }, 10);
            
        } catch (e) {
            console.error("Error opening project modal:", e);
        }
    }

    function closeProjectModal() {
        const modal = document.getElementById('project-modal');
        const content = document.getElementById('modal-content');

        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = ''; // Restore scroll
        }, 300);
    }
</script>
