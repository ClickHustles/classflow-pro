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
                <a href="#how-it-works" class="font-medium hover:text-brand-red transition-colors">How it Works</a>
                <a href="#subjects" class="font-medium hover:text-brand-red transition-colors">Subjects</a>
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
            <a href="#how-it-works" @click="mobileMenuOpen = false" class="font-bold text-lg text-brand-slate">How it Works</a>
            <a href="#subjects" @click="mobileMenuOpen = false" class="font-bold text-lg text-brand-slate">Subjects</a>
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

    <section class="relative pt-32 pb-24 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-lightgreen to-brand-cream -z-10"></div>
        <div class="max-w-5xl mx-auto px-6 text-center">
            
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 leading-tight">
                Find the Perfect Tutor. <br/>
                <span class="text-brand-green">Book Directly.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed font-medium">
                Connect with professional educators and specialists. <strong class="text-brand-slate">No agency markups</strong> — just great teaching.
            </p>

            <form action="{{ route('search') }}" method="GET" x-data="{ subjectMenuOpen: false, selectedSubject: '' }" class="bg-white p-3 rounded-2xl md:rounded-full shadow-xl border border-gray-200 max-w-5xl mx-auto flex flex-col md:flex-row gap-3 relative z-40">
                
                <div class="flex-1 relative">
                    <div @click="subjectMenuOpen = !subjectMenuOpen" @click.away="subjectMenuOpen = false" class="flex items-center px-4 py-3 md:border-r border-gray-100 cursor-pointer group">
                        <div class="w-10 h-10 bg-brand-lightgreen rounded-full flex items-center justify-center text-brand-green mr-3 group-hover:bg-brand-green group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div class="flex-1 text-left">
                            <span class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">Subject</span>
                            <input x-model="selectedSubject" name="subject" readonly type="text" placeholder="What do you want to learn?" class="w-full bg-transparent border-none focus:ring-0 text-brand-slate font-bold placeholder-gray-400 outline-none text-lg cursor-pointer truncate">
                        </div>
                    </div>

                    <div x-show="subjectMenuOpen" style="display: none;" class="absolute top-full left-0 mt-4 w-full md:w-[600px] bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden text-left">
                        <div class="p-4 bg-brand-lightgreen border-b border-gray-100"><h3 class="font-black text-brand-slate uppercase text-xs tracking-widest">Popular Categories</h3></div>
                        <div class="p-6 grid grid-cols-2 gap-8">
                            <div>
                                <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Math & Science</h4>
                                <ul class="space-y-2">
                                    <li><button type="button" @click="selectedSubject = 'Algebra'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">Algebra & Geometry</button></li>
                                    <li><button type="button" @click="selectedSubject = 'Calculus'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">Calculus & Stats</button></li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Test Prep</h4>
                                <ul class="space-y-2">
                                    <li><button type="button" @click="selectedSubject = 'SAT / ACT'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">SAT / ACT Prep</button></li>
                                    <li><button type="button" @click="selectedSubject = 'AP Exams'; subjectMenuOpen = false" class="hover:text-brand-green font-bold transition-colors">AP Exams</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 flex items-center px-4 py-3">
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mr-3"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg></div>
                    <div class="flex-1 text-left">
                        <span class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">Location</span>
                        <input type="text" name="location" placeholder="Zip code or 'Online'" class="w-full bg-transparent border-none focus:ring-0 text-brand-slate font-bold placeholder-gray-400 outline-none text-lg">
                    </div>
                </div>

                <button type="submit" class="bg-brand-red text-white font-black text-lg rounded-xl md:rounded-full px-10 py-4 hover:bg-opacity-90 transition-all shadow-md flex items-center justify-center whitespace-nowrap hover:shadow-xl hover:-translate-y-0.5">
                    Search
                </button>
            </form>
        </div>
    </section>

    <section class="py-16 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-4">
                <div class="w-12 h-12 bg-brand-lightgreen text-brand-green rounded-full flex items-center justify-center mx-auto mb-4 font-bold italic">✓</div>
                <h3 class="font-bold text-lg mb-2">Verified Educators</h3>
                <p class="text-gray-500 text-sm">Every profile includes real reviews and verified credentials.</p>
            </div>
            <div class="p-4">
                <div class="w-12 h-12 bg-brand-lightgreen text-brand-green rounded-full flex items-center justify-center mx-auto mb-4 font-bold italic">$</div>
                <h3 class="font-bold text-lg mb-2">No Agency Markups</h3>
                <p class="text-gray-500 text-sm">Pay the tutor directly. No hidden subscription fees.</p>
            </div>
            <div class="p-4">
                <div class="w-12 h-12 bg-brand-lightgreen text-brand-green rounded-full flex items-center justify-center mx-auto mb-4 font-bold italic">📅</div>
                <h3 class="font-bold text-lg mb-2">Secure Booking</h3>
                <p class="text-gray-500 text-sm">See live availability and book instantly via Stripe.</p>
            </div>
        </div>
    </section>

    <footer class="bg-white text-gray-400 py-12 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div>
                <div class="text-2xl font-black text-brand-slate mb-2">ClassFlow<span class="text-brand-red">Pro</span></div>
                <p class="text-xs font-bold uppercase tracking-widest">Built for Independent Educators</p>
            </div>
            <div class="flex gap-8 text-sm font-bold">
                <a href="{{ route('terms') }}" class="hover:text-brand-green">Terms</a>
                <a href="{{ route('privacy') }}" class="hover:text-brand-green">Privacy</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-green">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>