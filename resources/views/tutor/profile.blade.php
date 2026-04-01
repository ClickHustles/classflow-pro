<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile | ClassFlow Pro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
                    colors: { brand: { green: '#2F7A4D', red: '#D64545', cream: '#FAF9F6', slate: '#1F1F1F', blurple: '#635BFF', lightgreen: '#EAF2ED' } },
                    animation: { 'pulse-fast': 'pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite' }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-brand-slate antialiased min-h-screen flex flex-col">

    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('tutor.onboarding') }}" class="text-sm font-bold text-gray-500 hover:text-brand-slate transition-colors">Onboarding</a>
                <div class="flex items-center gap-3 border-l border-gray-200 pl-6">
                    <span class="text-sm font-medium text-gray-500 hidden sm:block">Welcome, Sarah</span>
                    <div class="w-8 h-8 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center font-bold text-sm cursor-pointer hover:bg-brand-green hover:text-white transition-colors">SM</div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-12" x-data="{ activeTab: 'basic' }">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <a href="{{ route('tutor.onboarding') }}" class="inline-flex items-center text-sm font-bold text-brand-green hover:text-brand-red transition-colors mb-4">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Onboarding
                </a>
                <h1 class="text-3xl font-extrabold text-brand-slate">Profile Editor</h1>
                <p class="text-gray-500 text-lg mt-1">This is what parents see when they find you in the directory.</p>
            </div>
            <button class="hidden sm:flex items-center px-6 py-3 bg-brand-green text-white font-bold rounded-xl hover:bg-opacity-90 transition-all shadow-md shadow-brand-green/20">
                Save & Publish Profile
            </button>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <aside class="w-full lg:w-64 flex-shrink-0">
                <nav class="flex flex-row lg:flex-col gap-2 overflow-x-auto pb-4 lg:pb-0">
                    <button @click="activeTab = 'basic'" :class="activeTab === 'basic' ? 'bg-white shadow-sm border-gray-200 text-brand-green' : 'border-transparent text-gray-500 hover:bg-gray-100'" class="flex-shrink-0 w-full text-left px-5 py-3 rounded-xl border font-bold text-sm transition-all flex items-center justify-between">
                        Basic Info
                        <svg x-show="activeTab === 'basic'" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    <button @click="activeTab = 'bio'" :class="activeTab === 'bio' ? 'bg-white shadow-sm border-gray-200 text-brand-green' : 'border-transparent text-gray-500 hover:bg-gray-100'" class="flex-shrink-0 w-full text-left px-5 py-3 rounded-xl border font-bold text-sm transition-all flex items-center justify-between">
                        About Me (AI)
                        <svg x-show="activeTab === 'bio'" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    <button @click="activeTab = 'subjects'" :class="activeTab === 'subjects' ? 'bg-white shadow-sm border-gray-200 text-brand-green' : 'border-transparent text-gray-500 hover:bg-gray-100'" class="flex-shrink-0 w-full text-left px-5 py-3 rounded-xl border font-bold text-sm transition-all flex items-center justify-between">
                        Subjects & Rates
                        <svg x-show="activeTab === 'subjects'" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </nav>
            </aside>

            <div class="flex-1">
                
                <div x-show="activeTab === 'basic'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-bold mb-6 border-b border-gray-100 pb-4">Personal Details</h2>
                    
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-24 h-24 rounded-full bg-brand-lightgreen flex items-center justify-center text-brand-green text-2xl font-bold border-2 border-brand-green border-dashed cursor-pointer hover:bg-brand-green hover:text-white transition-all">
                            SM
                        </div>
                        <div>
                            <h3 class="font-bold text-brand-slate">Profile Photo</h3>
                            <p class="text-xs text-gray-500 mb-2">A friendly headshot increases bookings by 40%.</p>
                            <button class="px-4 py-2 bg-gray-100 text-brand-slate text-xs font-bold rounded-lg hover:bg-gray-200 transition-colors">Upload Image</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">First Name</label>
                            <input type="text" value="Sarah" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all text-brand-slate font-medium">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Last Name</label>
                            <input type="text" value="Mitchell" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all text-brand-slate font-medium">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Professional Headline</label>
                        <input type="text" placeholder="e.g., High School Math Specialist & SAT Coach" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all text-brand-slate font-medium">
                        <p class="text-xs text-gray-400 mt-2">This appears right under your name in the search directory.</p>
                    </div>
                </div>

                <div x-show="activeTab === 'bio'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8" style="display: none;"
                     x-data="{ 
                        bioText: '', 
                        isGenerating: false,
                        generateAI() {
                            this.isGenerating = true;
                            this.bioText = '';
                            let text = 'I believe that every student has a unique learning style. With over 10 years of experience in the classroom, my teaching philosophy is built on breaking down complex, intimidating concepts into simple, repeatable patterns. Whether we are tackling basic Algebra or preparing for the SAT, my goal is to build the student\'s confidence alongside their skills. I provide custom worksheets, digital whiteboarding sessions, and progress reports after every meeting.';
                            let i = 0;
                            let speed = 20; // typing speed in ms
                            let typeWriter = () => {
                                if (i < text.length) {
                                    this.bioText += text.charAt(i);
                                    i++;
                                    setTimeout(typeWriter, speed);
                                } else {
                                    this.isGenerating = false;
                                }
                            };
                            setTimeout(typeWriter, 800); // initial delay for dramatic effect
                        }
                     }">
                    
                    <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                        <h2 class="text-xl font-bold">Teaching Philosophy</h2>
                        
                        <button @click="generateAI()" :disabled="isGenerating" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg x-show="!isGenerating" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            <svg x-show="isGenerating" class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            <span x-text="isGenerating ? 'Drafting bio...' : '✨ Write my bio with AI'"></span>
                        </button>
                    </div>

                    <div class="relative">
                        <textarea x-model="bioText" rows="8" placeholder="Tell parents about your experience, teaching style, and what makes your sessions unique..." class="w-full px-4 py-4 bg-gray-50 rounded-2xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all text-brand-slate leading-relaxed resize-none font-medium"></textarea>
                        
                        <div x-show="isGenerating" class="absolute inset-0 bg-white/50 rounded-2xl pointer-events-none flex items-center justify-center backdrop-blur-[1px]">
                            <div class="px-4 py-2 bg-white rounded-full shadow-lg border border-purple-100 text-purple-600 font-bold text-xs flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-purple-600 animate-pulse-fast"></span> AI is typing...
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-3 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Parents read bios to ensure your teaching style matches their child's needs.
                    </p>
                </div>

                <div x-show="activeTab === 'subjects'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8" style="display: none;">
                    <h2 class="text-xl font-bold mb-6 border-b border-gray-100 pb-4">Subjects & Pricing</h2>
                    
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Base Hourly Rate ($)</label>
                        <div class="relative max-w-xs">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 font-bold">$</span>
                            <input type="number" placeholder="60" class="w-full pl-8 pr-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all text-brand-slate font-black text-xl">
                        </div>
                        <p class="text-sm text-gray-500 mt-2">ClassFlow Pro will automatically add the flat $5 booking fee to this amount for the parent.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-4">Select your expertise (Max 5)</label>
                        <div class="flex flex-wrap gap-3">
                            <template x-for="subject in ['Algebra', 'Geometry', 'Calculus', 'SAT Prep', 'ACT Prep', 'Reading', 'Writing', 'Biology', 'Chemistry']">
                                <button x-data="{ selected: false }" @click="selected = !selected" 
                                        :class="selected ? 'bg-brand-green text-white border-brand-green' : 'bg-white text-gray-500 border-gray-200 hover:border-brand-green'"
                                        class="px-4 py-2 rounded-full border text-sm font-bold transition-all" x-text="subject">
                                </button>
                            </template>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="window.location.href='/tutor/onboarding'" class="mt-8 sm:hidden w-full py-4 bg-brand-green text-white font-bold rounded-xl hover:bg-opacity-90 transition-all shadow-md">
                    Save Profile
                </button>

            </div>
        </div>
    </main>

</body>
</html>