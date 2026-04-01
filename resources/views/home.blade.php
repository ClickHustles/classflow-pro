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
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-brand-cream text-brand-slate antialiased selection:bg-brand-red selection:text-white overflow-x-hidden">

    <header x-data="{ mobileMenuOpen: false }" class="fixed top-0 inset-x-0 w-full bg-white/90 backdrop-blur-md border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight text-brand-slate flex items-center gap-2 relative z-10">
                <svg class="w-8 h-8 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            
            <nav class="hidden md:flex items-center gap-8 relative z-10">
                <a href="#how-it-works" class="font-medium hover:text-brand-red transition-colors">How it Works</a>
                <a href="#subjects" class="font-medium hover:text-brand-red transition-colors">Subjects</a>
                <a href="{{ route('teach') }}" class="font-medium text-brand-green hover:text-brand-red transition-colors">Apply to Teach</a>
                
                <div class="flex items-center gap-4 ml-4 pl-4 border-l border-gray-200">
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-medium hover:text-brand-red transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-medium hover:text-brand-red transition-colors">Log in</a>
                        <a href="{{ route('search') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-brand-slate text-white font-medium hover:bg-gray-800 transition-all shadow-md">
                            Find a Tutor
                        </a>
                    @endauth
                </div>
            </nav>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-brand-slate focus:outline-none relative z-10">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen" x-cloak class="md:hidden absolute top-20 inset-x-0 bg-white border-b border-gray-200 shadow-2xl px-6 py-8 flex flex-col gap-4">
            <a href="#how-it-works" @click="mobileMenuOpen = false" class="font-bold text-lg text-brand-slate hover:text-brand-red">How it Works</a>
            <a href="#subjects" @click="mobileMenuOpen = false" class="font-bold text-lg text-brand-slate hover:text-brand-red">Subjects</a>
            <a href="{{ route('teach') }}" class="font-bold text-lg text-brand-green hover:text-brand-red">Apply to Teach</a>
            <hr class="border-gray-100">
            @auth
                <a href="{{ route('dashboard') }}" class="font-bold text-lg">Dashboard</a>
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
            
            <p class="text-lg md:text-xl text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed">
                Connect with professional educators, test prep coaches, and specialists. <strong class="text-brand-slate">No agency markups</strong>—just great teaching.
            </p>

            <form action="{{ route('search') }}" method="GET" 
                x-data="{ 
                    subjectMenuOpen: false, 
                    searchTerm: '',
                    subjects: [
                        'Algebra', 'Geometry', 'Calculus', 'Statistics', 'Trigonometry', 'Physics', 'Chemistry', 'Biology', 
                        'SAT Prep', 'ACT Prep', 'LSAT Prep', 'GRE Prep', 'English', 'Reading', 'Writing', 'Literature', 
                        'Spanish', 'French', 'German', 'Chinese', 'Japanese', 'Music Theory', 'Piano', 'Guitar',
                        'Computer Science', 'Python', 'Web Development', 'Special Education', 'ADHD Coaching', 'Dyslexia Support'
                    ],
                    get filteredSubjects() {
                        if (this.searchTerm === '') return [];
                        return this.subjects.filter(s => s.toLowerCase().includes(this.searchTerm.toLowerCase())).slice(0, 5);
                    }
                }" 
                class="bg-white p-3 rounded-2xl md:rounded-full shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-gray-200 max-w-5xl mx-auto flex flex-col md:flex-row gap-3 relative z-40">
                
                <div class="flex-[1.5] relative">
                    <div @click="subjectMenuOpen = !subjectMenuOpen" @click.away="subjectMenuOpen = false" class="flex items-center px-4 py-3 md:border-r border-gray-100 cursor-pointer group">
                        <div class="w-10 h-10 bg-brand-lightgreen rounded-full flex items-center justify-center text-brand-green mr-3 group-hover:bg-brand-green group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div class="flex-1 text-left">
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-0.5">Subject</span>
                            <input 
                                type="text" 
                                name="subject"
                                x-model="searchTerm"
                                @focus="subjectMenuOpen = true"
                                placeholder="What do you want to learn?" 
                                class="w-full bg-transparent border-none focus:ring-0 text-brand-slate font-medium placeholder-gray-400 outline-none text-lg cursor-pointer truncate"
                                autocomplete="off"
                            >
                        </div>
                    </div>

                    <div x-show="subjectMenuOpen" x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute top-full left-0 mt-4 w-full md:w-[640px] bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.2)] border border-gray-100 overflow-hidden text-left z-50">
                        
                        <template x-if="searchTerm.length > 0">
                            <div class="p-4">
                                <h3 class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Matches</h3>
                                <template x-for="result in filteredSubjects" :key="result">
                                    <button type="button" @click="searchTerm = result; subjectMenuOpen = false" class="w-full px-4 py-3 hover:bg-brand-lightgreen rounded-xl text-left font-bold text-brand-slate flex justify-between items-center group transition-colors">
                                        <span x-text="result"></span>
                                        <svg class="w-4 h-4 text-brand-green opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 12h14m-7-7l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    </button>
                                </template>
                            </div>
                        </template>

                        <template x-if="searchTerm.length === 0">
                            <div>
                                <div class="p-4 bg-brand-lightgreen border-b border-gray-100">
                                    <h3 class="font-black text-brand-slate uppercase text-xs tracking-widest">Popular Categories</h3>
                                </div>
                                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-8">
                                    <div>
                                        <h4 class="text-[10px] font-black text-blue-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> Math & Science
                                       </h4>
                                        <ul class="space-y-3 font-bold text-sm">
                                            <li><button type="button" @click="searchTerm = 'Algebra'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Algebra & Geometry</button></li>
                                            <li><button type="button" @click="searchTerm = 'Calculus'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Calculus & Stats</button></li>
                                            <li><button type="button" @click="searchTerm = 'Chemistry'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Chemistry & Physics</button></li>
                                        </ul>
                                    </div>
                                    
                                    <div>
                                        <h4 class="text-[10px] font-black text-brand-red uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-brand-red"></span> Test Prep
                                        </h4>
                                        <ul class="space-y-3 font-bold text-sm">
                                            <li><button type="button" @click="searchTerm = 'SAT Prep'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">SAT / ACT Prep</button></li>
                                            <li><button type="button" @click="searchTerm = 'AP Exams'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">AP Exams</button></li>
                                            <li><button type="button" @click="searchTerm = 'College Admissions'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">College Admissions</button></li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="text-[10px] font-black text-amber-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-amber-500"></span> Language & Arts
                                        </h4>
                                        <ul class="space-y-3 font-bold text-sm">
                                            <li><button type="button" @click="searchTerm = 'Spanish'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Spanish & French</button></li>
                                            <li><button type="button" @click="searchTerm = 'English'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">ESL / English</button></li>
                                            <li><button type="button" @click="searchTerm = 'Music Theory'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Piano & Music Theory</button></li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="text-[10px] font-black text-purple-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-purple-500"></span> Special Focus
                                        </h4>
                                        <ul class="space-y-3 font-bold text-sm">
                                            <li><button type="button" @click="searchTerm = 'Special Education'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Special Education</button></li>
                                            <li><button type="button" @click="searchTerm = 'Dyslexia Support'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">Dyslexia Support</button></li>
                                            <li><button type="button" @click="searchTerm = 'ADHD Coaching'; subjectMenuOpen = false" class="text-brand-slate hover:text-brand-green transition-colors w-full text-left">ADHD & Study Skills</button></li>
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
                        <input type="text" name="location" placeholder="Zip code or 'Online'" class="w-full bg-transparent border-none focus:ring-0 text-brand-slate font-medium placeholder-gray-400 outline-none text-lg">
                    </div>
                </div>

                <button type="submit" class="bg-brand-red text-white font-black text-lg rounded-xl md:rounded-full px-12 py-4 hover:bg-opacity-90 transition-all shadow-md flex items-center justify-center whitespace-nowrap hover:shadow-xl hover:-translate-y-0.5">
                    Search Tutors
                </button>
            </form>
        </div>
    </section>

    <section class="py-16 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
            <div class="p-4">
                <div class="w-12 h-12 bg-brand-lightgreen text-brand-green rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Verified Educators</h3>
                <p class="text-gray-500 text-sm">Every tutor profile includes real reviews, verified credentials, and complete transparency.</p>
            </div>
            <div class="p-4">
                <div class="w-12 h-12 bg-brand-lightgreen text-brand-green rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-2">No Agency Markups</h3>
                <p class="text-gray-500 text-sm">You pay the tutor directly. No hidden subscription fees or inflated hourly platform rates.</p>
            </div>
            <div class="p-4">
                <div class="w-12 h-12 bg-brand-lightgreen text-brand-green rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Secure Booking</h3>
                <p class="text-gray-500 text-sm">See live availability, book instantly, and pay securely via our Stripe integration.</p>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-24 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">The Easiest Way to Learn</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-brand-slate text-white rounded-full flex items-center justify-center font-bold text-xl border-4 border-brand-cream">1</div>
                    <h3 class="text-xl font-bold mt-4 mb-3">Search & Compare</h3>
                    <p class="text-gray-600">Browse detailed profiles, read genuine parent reviews, and filter by subject, grade level, or price to find the perfect match.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-brand-slate text-white rounded-full flex items-center justify-center font-bold text-xl border-4 border-brand-cream">2</div>
                    <h3 class="text-xl font-bold mt-4 mb-3">Book Instantly</h3>
                    <p class="text-gray-600">Say goodbye to back-and-forth emails. View your tutor's live calendar and lock in a session time that works for your schedule.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-brand-slate text-white rounded-full flex items-center justify-center font-bold text-xl border-4 border-brand-cream">3</div>
                    <h3 class="text-xl font-bold mt-4 mb-3">Learn & Grow</h3>
                    <p class="text-gray-600">Meet online or in-person. Payments are handled automatically and securely, so you can focus 100% on the learning experience.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="subjects" class="py-24 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Find Help in Any Subject</h2>
                    <p class="text-gray-500 text-lg">From elementary phonics to college-level physics.</p>
                </div>
                <a href="{{ route('search') }}" class="hidden md:flex text-brand-green font-bold items-center hover:text-brand-red transition-colors">
                    View All Tutors <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach(['K-12 Math', 'Reading & Phonics', 'SAT / ACT Prep', 'Foreign Languages', 'Science & Biology', 'Special Education', 'Music & Arts', 'College Admissions'] as $subject)
                <a href="{{ route('search', ['subject' => $subject]) }}" class="group block p-6 bg-brand-lightgreen rounded-2xl hover:bg-brand-green transition-colors duration-300">
                    <h3 class="font-bold text-brand-slate group-hover:text-white transition-colors mb-2">{{ $subject }}</h3>
                    <span class="text-sm text-brand-green group-hover:text-brand-lightgreen flex items-center">
                        Find Tutors <svg class="w-4 h-4 ml-1 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </a>
                @endforeach
            </div>
            
            <a href="{{ route('search') }}" class="mt-8 flex md:hidden text-brand-green font-bold items-center justify-center hover:text-brand-red transition-colors w-full p-4 bg-brand-lightgreen rounded-xl">
                View All Tutors <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </section>

    <section class="py-24 bg-brand-slate text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-brand-green rounded-full blur-3xl opacity-20"></div>
        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white font-semibold text-sm mb-8">
                For Teachers & Instructors
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Are you an educator?</h2>
            <p class="text-xl text-gray-300 mb-10 leading-relaxed max-w-2xl mx-auto">
                Stop losing 20-40% of your income to marketplace commissions. Run your tutoring business for a flat <strong class="text-white">$5 per booking</strong> with zero monthly fees.
            </p>
            <a href="{{ route('teach') }}" class="inline-flex items-center justify-center px-8 py-4 bg-brand-red text-white font-bold rounded-full shadow-lg hover:bg-opacity-90 transition-all text-lg">
                See How It Works for Tutors
            </a>
        </div>
    </section>

    <footer class="bg-white text-gray-500 py-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="text-2xl font-bold tracking-tight text-brand-slate flex items-center gap-1 mb-4">
                    ClassFlow<span class="text-brand-red">Pro</span>
                </div>
                <p class="max-w-xs text-sm">The transparent, anti-marketplace booking platform connecting parents with professional educators.</p>
            </div>
            
            <div>
                <h4 class="text-brand-slate font-bold mb-4">Platform</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('search') }}" class="hover:text-brand-green transition-colors">Find a Tutor</a></li>
                    <li><a href="{{ route('teach') }}" class="hover:text-brand-green transition-colors">Apply to Teach</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-brand-green transition-colors">Tutor Login</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-brand-slate font-bold mb-4">Legal</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('terms') }}" class="hover:text-brand-green transition-colors">Terms of Service</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-brand-green transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand-green transition-colors">Contact Support</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-gray-100 text-sm text-center md:text-left flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} ClassFlow Pro. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>