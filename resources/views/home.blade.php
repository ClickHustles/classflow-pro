<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassFlow Pro | Find the Perfect Tutor</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
                    colors: { brand: { green: '#2F7A4D', red: '#D64545', cream: '#FAF9F6', slate: '#1F1F1F', lightgreen: '#EAF2ED' } }
                }
            }
        }
    </script>
</head>
<body class="bg-brand-cream text-brand-slate antialiased selection:bg-brand-red selection:text-white overflow-x-hidden">

    <header x-data="{ mobileMenuOpen: false }" class="fixed top-0 inset-x-0 w-full bg-white/90 backdrop-blur-md border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold tracking-tight text-brand-slate flex items-center gap-2 relative z-10">
                <svg class="w-8 h-8 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            
            <nav class="hidden md:flex items-center gap-8 relative z-10">
                <a href="#parents" class="font-medium hover:text-brand-red transition-colors">For Parents</a>
                <a href="#tutors" class="font-medium hover:text-brand-red transition-colors">For Tutors</a>
                <a href="{{ route('teach') }}" class="font-bold text-brand-green hover:text-brand-red transition-colors">Apply to Teach</a>
                
                <div class="flex items-center gap-4 ml-4 pl-4 border-l border-gray-200">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-bold hover:text-brand-red transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold hover:text-brand-red transition-colors">Log in</a>
                        <a href="{{ route('search') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-brand-slate text-white font-bold hover:bg-gray-800 transition-all shadow-md">
                            Find a Tutor
                        </a>
                    @endauth
                </div>
            </nav>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-brand-slate focus:outline-none relative z-10">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-show="mobileMenuOpen" style="display:none;" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen" style="display: none;" class="md:hidden absolute top-20 inset-x-0 bg-white border-b border-gray-200 shadow-2xl px-6 py-8 flex flex-col gap-4">
            <a href="#parents" @click="mobileMenuOpen = false" class="font-bold text-lg text-brand-slate">For Parents</a>
            <a href="#tutors" @click="mobileMenuOpen = false" class="font-bold text-lg text-brand-slate">For Tutors</a>
            <a href="{{ route('teach') }}" class="font-bold text-lg text-brand-green">Apply to Teach</a>
            <hr class="border-gray-100">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-bold text-lg">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-bold text-lg">Log in</a>
                <a href="{{ route('search') }}" class="w-full py-4 rounded-xl bg-brand-slate text-white font-black text-center text-lg">Find a Tutor</a>
            @endauth
        </div>
    </header>

    <section class="relative pt-32 pb-24 lg:pt-48 lg:pb-32 overflow-visible">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-lightgreen to-brand-cream -z-10"></div>
        <div class="max-w-5xl mx-auto px-6 text-center">
            
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 leading-tight">
                Find the Perfect Tutor. <br/>
                <span class="text-brand-green">Book Directly.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed font-medium">
                Connect with professional educators and specialists. <strong class="text-brand-slate">No agency markups</strong> — just great teaching.
            </p>

            <form action="{{ route('search') }}" method="GET" 
                x-data="{ 
                    subjectMenuOpen: false, 
                    searchTerm: '',
                    subjects: ['Algebra', 'Geometry', 'Calculus', 'Statistics', 'SAT Prep', 'ACT Prep', 'Physics', 'Chemistry', 'Biology', 'Spanish', 'French', 'Reading', 'Phonics', 'Special Education', 'ADHD Coaching'],
                    get filteredSubjects() {
                        return this.subjects.filter(s => s.toLowerCase().includes(this.searchTerm.toLowerCase()))
                    }
                }" 
                class="bg-white p-3 rounded-2xl md:rounded-full shadow-2xl border border-gray-200 max-w-5xl mx-auto flex flex-col md:flex-row gap-3 relative z-40">
                
                <div class="flex-[1.5] relative">
                    <div class="flex items-center px-4 py-3 md:border-r border-gray-100 group">
                        <div class="w-10 h-10 bg-brand-lightgreen rounded-full flex items-center justify-center text-brand-green mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <div class="flex-1 text-left">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">Subject</label>
                            <input 
                                type="text" 
                                name="subject" 
                                x-model="searchTerm"
                                @focus="subjectMenuOpen = true"
                                @click.away="subjectMenuOpen = false"
                                placeholder="What do you want to learn?" 
                                class="w-full bg-transparent border-none focus:ring-0 text-brand-slate font-bold placeholder-gray-400 outline-none text-lg"
                                autocomplete="off"
                            >
                        </div>
                    </div>

                    <div x-show="subjectMenuOpen" 
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute top-full left-0 mt-4 w-full md:w-[640px] bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.2)] border border-gray-100 overflow-hidden text-left z-50" 
                        style="display: none;">
                        
                        <template x-if="searchTerm.length > 0">
                            <div class="p-4">
                                <h3 class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Suggestions</h3>
                                <div class="grid grid-cols-1 gap-1">
                                    <template x-for="result in filteredSubjects" :key="result">
                                        <button type="button" @click="searchTerm = result; subjectMenuOpen = false" class="px-4 py-3 hover:bg-brand-lightgreen rounded-xl text-left font-bold text-brand-slate transition-colors flex justify-between items-center group">
                                            <span x-text="result"></span>
                                            <svg class="w-4 h-4 text-brand-green opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 12h14m-7-7l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <template x-if="searchTerm.length === 0">
                            <div>
                                <div class="p-5 bg-brand-lightgreen border-b border-gray-100 flex justify-between items-center">
                                    <h3 class="font-black text-brand-slate uppercase text-xs tracking-widest">Popular Categories</h3>
                                </div>
                                <div class="p-8 grid grid-cols-2 gap-10">
                                    <div>
                                        <h4 class="text-[10px] font-black text-blue-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> Math & Science
                                        </h4>
                                        <ul class="space-y-3">
                                            <li><button type="button" @click="searchTerm = 'Algebra'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">Algebra & Geometry</button></li>
                                            <li><button type="button" @click="searchTerm = 'Calculus'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">Calculus & Stats</button></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="text-[10px] font-black text-brand-red uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-brand-red"></span> Test Prep
                                        </h4>
                                        <ul class="space-y-3">
                                            <li><button type="button" @click="searchTerm = 'SAT Prep'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">SAT / ACT Prep</button></li>
                                            <li><button type="button" @click="searchTerm = 'AP Exams'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">AP Exam Mastery</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex-1 flex items-center px-4 py-3">
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">Location</span>
                        <input type="text" name="location" placeholder="Zip code or 'Online'" class="w-full bg-transparent border-none focus:ring-0 text-brand-slate font-bold placeholder-gray-400 outline-none text-lg">
                    </div>
                </div>

                <button type="submit" class="bg-brand-red text-white font-black text-lg rounded-xl md:rounded-full px-12 py-4 hover:bg-opacity-90 transition-all shadow-md flex items-center justify-center whitespace-nowrap hover:shadow-xl hover:-translate-y-0.5">
                    Search Tutors
                </button>
            </form>
        </div>
    </section>

    <section id="parents" class="py-24 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-brand-lightgreen text-brand-green font-bold text-xs uppercase tracking-widest rounded-full mb-6">For Parents & Students</span>
                <h2 class="text-4xl md:text-5xl font-black mb-8 leading-tight">Elite Education without the <span class="text-brand-red underline">Marketplace Tax.</span></h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed font-medium">Big tutoring platforms hide their fees by inflating tutor rates. We do the opposite. You connect directly with professional educators and pay them their full rate.</p>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-brand-green text-white rounded-full flex items-center justify-center shrink-0 mt-1">✓</div>
                        <p class="font-bold">100% of your payment goes to the tutor.</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-brand-green text-white rounded-full flex items-center justify-center shrink-0 mt-1">✓</div>
                        <p class="font-bold">Verified teacher credentials and background checks.</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-brand-green text-white rounded-full flex items-center justify-center shrink-0 mt-1">✓</div>
                        <p class="font-bold">Transparent pricing with no hidden service fees.</p>
                    </div>
                </div>
            </div>
            <div class="bg-brand-cream rounded-3xl p-12 border border-gray-200 shadow-inner">
                <h3 class="text-2xl font-black mb-6 italic text-brand-slate">"I found a math specialist who was $30/hr cheaper than on Wyzant because ClassFlow doesn't take a massive cut from her."</h3>
                <p class="font-bold text-brand-green">— Michelle R., Parent</p>
            </div>
        </div>
    </section>

    <section id="tutors" class="py-24 bg-brand-slate text-white overflow-hidden relative">
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-brand-green opacity-10 blur-3xl"></div>
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span class="inline-block px-4 py-2 bg-white/10 border border-white/20 text-white font-bold text-xs uppercase tracking-widest rounded-full mb-6">For Professional Tutors</span>
            <h2 class="text-4xl md:text-5xl font-black mb-8">Keep Your Money. <span class="text-brand-green">Own Your Brand.</span></h2>
            <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto font-medium">Stop giving 25% of your income to a middleman. ClassFlow Pro is the software engine for independent educators who want a professional storefront without the corporate greed.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="p-8 bg-white/5 border border-white/10 rounded-2xl">
                    <h3 class="text-3xl font-black text-brand-green mb-2">$5</h3>
                    <p class="font-bold uppercase tracking-widest text-xs opacity-50 mb-4">Flat Booking Fee</p>
                    <p class="text-sm text-gray-400 leading-relaxed">Pay a simple $5 fee per booking. That's it. No percentages. No monthly SaaS fees.</p>
                </div>
                <div class="p-8 bg-white/5 border border-white/10 rounded-2xl">
                    <h3 class="text-3xl font-black text-brand-green mb-2">Instant</h3>
                    <p class="font-bold uppercase tracking-widest text-xs opacity-50 mb-4">Payouts</p>
                    <p class="text-sm text-gray-400 leading-relaxed">Payments hit your bank account immediately through our Stripe Connect integration.</p>
                </div>
                <div class="p-8 bg-white/5 border border-white/10 rounded-2xl">
                    <h3 class="text-3xl font-black text-brand-green mb-2">SEO</h3>
                    <p class="font-bold uppercase tracking-widest text-xs opacity-50 mb-4">Optimization</p>
                    <p class="text-sm text-gray-400 leading-relaxed">Your profile is a standalone storefront optimized to rank on Google locally.</p>
                </div>
            </div>
            
            <a href="{{ route('teach') }}" class="px-12 py-5 bg-brand-red text-white font-black rounded-full shadow-2xl hover:scale-105 transition-all text-xl">
                See the $5 Difference
            </a>
        </div>
    </section>

    <footer class="bg-white text-gray-400 py-16 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-12">
            <div>
                <div class="text-2xl font-black text-brand-slate mb-4">ClassFlow<span class="text-brand-red">Pro</span></div>
                <p class="text-sm font-bold uppercase tracking-widest mb-2 text-brand-green">Independent Education. Simplified.</p>
                <p class="text-xs max-w-xs leading-relaxed font-medium">Built for the instructors who care. Powered by technology that respects the educator.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-8 text-sm font-bold text-brand-slate">
                <a href="{{ route('terms') }}" class="hover:text-brand-green transition-colors">Terms</a>
                <a href="{{ route('privacy') }}" class="hover:text-brand-green transition-colors">Privacy</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-green transition-colors">Contact</a>
                <a href="{{ route('search') }}" class="hover:text-brand-green transition-colors">Directory</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-gray-50 text-center">
            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-300">© {{ date('Y') }} ClassFlow Pro — A Professional Development Group Project</p>
        </div>
    </footer>

</body>
</html>