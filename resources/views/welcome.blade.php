<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassFlow Pro | The Anti-Marketplace for Tutors</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            green: '#2F7A4D',
                            red: '#D64545',
                            cream: '#FAF9F6',
                            slate: '#1F1F1F',
                            lightgreen: '#EAF2ED',
                        }
                    }
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
                <svg class="w-8 h-8 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            
            <nav class="hidden md:flex items-center gap-8 relative z-10">
                <a href="{{ route('home') }}" class="font-bold text-gray-500 hover:text-brand-green transition-colors">For Parents</a>
                <a href="#features" class="font-bold text-gray-500 hover:text-brand-green transition-colors">Features</a>
                <a href="#pricing" class="font-bold text-gray-500 hover:text-brand-green transition-colors">Pricing</a>
                
                <div class="flex items-center gap-4 ml-4 pl-4 border-l border-gray-200">
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-bold text-brand-slate hover:text-brand-red transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold text-gray-500 hover:text-brand-red transition-colors">Log in</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-brand-green text-white font-bold hover:bg-opacity-90 transition-all shadow-md">
                            Start Free
                        </a>
                    @endauth
                </div>
            </nav>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-brand-slate focus:outline-none relative z-10">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden absolute top-20 inset-x-0 bg-white border-b border-gray-200 shadow-2xl">
            <div class="px-6 py-6 space-y-4 flex flex-col">
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}" class="font-bold text-brand-slate hover:text-brand-red transition-colors text-lg">For Parents</a>
                <a @click="mobileMenuOpen = false" href="#features" class="font-bold text-brand-slate hover:text-brand-red transition-colors text-lg">Features</a>
                <a @click="mobileMenuOpen = false" href="#pricing" class="font-bold text-brand-slate hover:text-brand-red transition-colors text-lg">Pricing</a>
                <hr class="border-gray-100 my-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="font-bold text-brand-slate hover:text-brand-red transition-colors text-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-bold text-brand-slate hover:text-brand-red transition-colors text-lg">Log in</a>
                    <a href="{{ route('register') }}" class="mt-4 w-full py-4 rounded-xl bg-brand-green text-white font-bold hover:bg-opacity-90 transition-all shadow-md text-center text-lg">
                        Start Free
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-lightgreen to-brand-cream -z-10"></div>
        <div class="max-w-7xl mx-auto px-6 text-center">
            
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-brand-slate font-semibold text-sm mb-8 border border-gray-200 shadow-sm animate-fade-in-up">
                <span class="text-brand-red">🍎</span> The Anti-Marketplace for Educators
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 max-w-4xl mx-auto leading-tight">
                Run Your Tutoring Business. Book Clients. Get Paid. <br/>
                <span class="text-brand-green">All for $5 Per Booking.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-3xl mx-auto leading-relaxed">
                A modern scheduling and payment platform built for tutors, teachers, and instructors who want simplicity, professionalism, and <strong class="text-brand-slate">zero monthly fees</strong>.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center max-w-md sm:max-w-none mx-auto mb-12">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-brand-red text-white font-bold rounded-full shadow-lg shadow-brand-red/30 hover:bg-opacity-90 hover:-translate-y-1 transition-all text-lg">
                    Start Free
                </a>
                <a href="#how-it-works" class="px-8 py-4 bg-white text-brand-slate font-bold rounded-full shadow-sm border border-gray-200 hover:border-brand-green hover:text-brand-green transition-all text-lg">
                    See How It Works
                </a>
            </div>

            <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm font-medium text-gray-500">
                <div class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> No subscriptions</div>
                <div class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> No commissions</div>
                <div class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> No contracts</div>
                <div class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> You only pay when you get paid</div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-3">Built for Real-World Educators & Service Pros</h2>
            <p class="text-gray-500 mb-12 max-w-2xl mx-auto">Choose your field and ClassFlow Pro adapts to your workflow. Your work isn’t generic. Your software shouldn’t be either.</p>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach(['Math & Reading', 'Test Prep', 'Music Teachers', 'Languages', 'Academic Coaches', 'Homeschool', 'Art & Skills', 'College Prep', 'Workshops', 'Special Ed'] as $industry)
                <div class="p-6 bg-white border border-brand-green/20 rounded-xl hover:border-brand-red hover:shadow-md transition-all cursor-pointer group">
                    <div class="w-10 h-10 bg-brand-lightgreen rounded-lg flex items-center justify-center text-brand-green group-hover:bg-brand-red/10 group-hover:text-brand-red mb-4 mx-auto transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <span class="font-semibold text-sm">{{ $industry }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="features" class="py-24 max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">Why Tutors Choose ClassFlow Pro</h2>
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="w-full lg:w-1/2 space-y-12">
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-full border border-gray-200 flex items-center justify-center text-brand-green shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">1. Bookings That Just Work</h3>
                        <p class="text-gray-600">A clean, mobile-first calendar that handles 1-on-1 sessions, online or in-person, recurring schedules, and automated reminders.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-full border border-gray-200 flex items-center justify-center text-brand-red shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">2. Payments Without the Pain</h3>
                        <p class="text-gray-600">Get paid instantly through Stripe Connect. No subscriptions, no 20% commissions. Just $5 per paid booking.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-full border border-gray-200 flex items-center justify-center text-brand-green shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">3. Professional Tutor Profiles</h3>
                        <p class="text-gray-600">SEO-optimized pages that help you get discovered locally. Showcase subjects, grades, reviews, and availability.</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2">
                <div class="bg-white p-2 rounded-2xl shadow-2xl border border-gray-200 transform rotate-1 hover:rotate-0 transition-transform duration-500">
                    <div class="bg-brand-cream rounded-xl overflow-hidden border border-gray-100">
                        <div class="h-8 bg-gray-100 border-b border-gray-200 flex items-center px-4 gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-6">
                                <div class="w-32 h-6 bg-gray-200 rounded"></div>
                                <div class="w-24 h-8 bg-brand-green rounded-md"></div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="h-24 bg-white border border-gray-200 rounded-lg p-4">
                                    <div class="w-16 h-4 bg-gray-200 rounded mb-3"></div>
                                    <div class="w-24 h-8 bg-brand-lightgreen rounded"></div>
                                </div>
                                <div class="h-24 bg-white border border-gray-200 rounded-lg p-4">
                                    <div class="w-16 h-4 bg-gray-200 rounded mb-3"></div>
                                    <div class="w-12 h-8 bg-gray-100 rounded"></div>
                                </div>
                                <div class="h-24 bg-white border border-gray-200 rounded-lg p-4">
                                    <div class="w-16 h-4 bg-gray-200 rounded mb-3"></div>
                                    <div class="w-12 h-8 bg-gray-100 rounded"></div>
                                </div>
                            </div>
                            <div class="h-40 bg-white border border-gray-200 rounded-lg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-24 bg-brand-slate text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">Simple, Honest Pricing</h2>
            <p class="text-gray-400 mb-12 text-lg">No monthly fees. No contracts. No hidden charges. No nonsense.</p>

            <div class="bg-white rounded-3xl p-8 md:p-12 text-brand-slate shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 inset-x-0 h-2 bg-brand-green"></div>
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="text-left">
                        <span class="inline-block px-3 py-1 bg-brand-lightgreen text-brand-green font-semibold rounded-full text-sm mb-4">Standard Plan</span>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-6xl font-extrabold text-brand-red">$5</span>
                            <span class="text-xl text-gray-500 font-medium">/ paid booking</span>
                        </div>
                        <p class="text-gray-500 font-medium">Plus a $24.95 one-time setup fee.</p>
                    </div>
                    <div class="w-full md:w-auto">
                        <ul class="space-y-3 mb-8 text-left text-gray-600 font-medium">
                            <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Keep 100% of your hourly rate</li>
                            <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Free public directory listing</li>
                            <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Instant Stripe payouts</li>
                        </ul>
                        <a href="{{ route('register') }}" class="block w-full text-center px-8 py-4 bg-brand-slate text-white font-bold rounded-full hover:bg-gray-800 transition-colors">
                            Start Free — Pay Only When Booked
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-24 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">How ClassFlow Pro Works</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-0.5 bg-gray-100 z-0"></div>

                <div class="relative z-10 text-center">
                    <div class="w-24 h-24 mx-auto bg-brand-cream rounded-full border-4 border-white shadow-md flex items-center justify-center text-3xl font-bold text-brand-green mb-6">1</div>
                    <h3 class="text-xl font-bold mb-3">Create Your Profile</h3>
                    <p class="text-gray-600">Set your subjects, grade levels, and weekly availability. Your personal booking link is ready instantly.</p>
                </div>

                <div class="relative z-10 text-center">
                    <div class="w-24 h-24 mx-auto bg-brand-cream rounded-full border-4 border-white shadow-md flex items-center justify-center text-3xl font-bold text-brand-red mb-6">2</div>
                    <h3 class="text-xl font-bold mb-3">Connect Stripe</h3>
                    <p class="text-gray-600">Link your bank account securely. Get paid directly by parents — we never hold or touch your money.</p>
                </div>

                <div class="relative z-10 text-center">
                    <div class="w-24 h-24 mx-auto bg-brand-cream rounded-full border-4 border-white shadow-md flex items-center justify-center text-3xl font-bold text-brand-green mb-6">3</div>
                    <h3 class="text-xl font-bold mb-3">Get Booked & Paid</h3>
                    <p class="text-gray-600">Parents book. You teach. Stripe routes the funds to you, and we automatically deduct a flat $5 fee.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-brand-lightgreen">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="order-2 lg:order-1 relative">
                <div class="absolute inset-0 bg-brand-green rounded-3xl transform -rotate-3 opacity-20"></div>
                <div class="bg-white rounded-3xl p-8 shadow-xl relative z-10">
                    <div class="flex items-center gap-4 border-b border-gray-100 pb-6 mb-6">
                        <div class="w-20 h-20 bg-gray-200 rounded-full flex-shrink-0"></div>
                        <div>
                            <h4 class="font-bold text-xl">Sarah Mitchell</h4>
                            <p class="text-brand-green font-medium">High School Math Specialist</p>
                            <div class="flex items-center gap-1 mt-1 text-amber-400">
                                ★★★★★ <span class="text-gray-400 text-sm ml-1">(42 reviews)</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 mb-8">
                        <div class="h-3 bg-gray-100 rounded w-full"></div>
                        <div class="h-3 bg-gray-100 rounded w-5/6"></div>
                        <div class="h-3 bg-gray-100 rounded w-4/6"></div>
                    </div>
                    <button class="w-full py-4 bg-brand-red text-white font-bold rounded-xl shadow-md">Book Session ($60/hr)</button>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-bold mb-6">Your Own Professional Tutor Page</h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Every tutor gets a beautiful, SEO-optimized profile that works like a standalone website.
                </p>
                <ul class="grid grid-cols-2 gap-4 text-gray-700 font-medium">
                    <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Subjects & Grades</li>
                    <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Parent Reviews</li>
                    <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Photos & Bio</li>
                    <li class="flex items-center gap-2"><svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Live Availability</li>
                </ul>
                <p class="mt-8 text-brand-slate font-bold text-lg border-l-4 border-brand-red pl-4">
                    Look professional. Get discovered. Get booked.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-brand-green text-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Trusted by Tutors Across the Country</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white text-brand-slate p-8 rounded-2xl shadow-lg relative">
                    <div class="text-amber-400 mb-4 text-xl">★★★★★</div>
                    <p class="text-gray-600 mb-6 italic">"ClassFlow Pro finally gave me a professional booking system without monthly fees. I was tired of paying $30/mo for software I barely used during slow months."</p>
                    <p class="font-bold">— Sarah M., Math Tutor</p>
                </div>
                
                <div class="bg-white text-brand-slate p-8 rounded-2xl shadow-lg relative md:-translate-y-4">
                    <div class="text-amber-400 mb-4 text-xl">★★★★★</div>
                    <p class="text-gray-600 mb-6 italic">"I doubled my weekly sessions because parents can book instantly. The Stripe integration took 2 minutes and payments hit my bank immediately."</p>
                    <p class="font-bold">— Daniel R., Reading Specialist</p>
                </div>

                <div class="bg-white text-brand-slate p-8 rounded-2xl shadow-lg relative">
                    <div class="text-amber-400 mb-4 text-xl">★★★★★</div>
                    <p class="text-gray-600 mb-6 italic">"The flat $5 fee is nothing compared to what I used to pay on Wyzant. I'm keeping 20% more of my own money every single week."</p>
                    <p class="font-bold">— Emily T., SAT Prep Coach</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-brand-red text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-6">Your Tutoring Business Deserves Better Software</h2>
            <p class="text-xl opacity-90 mb-10">Stop paying subscriptions. Stop losing money to commissions. Start running your business with a platform built for real educators.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-brand-red font-bold rounded-full shadow-lg hover:bg-gray-100 transition-colors text-lg">
                    Get Started Free
                </a>
                <a href="#how-it-works" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white/10 transition-colors text-lg">
                    See a Live Demo
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-brand-slate text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="text-2xl font-bold tracking-tight text-white flex items-center gap-1 mb-4">
                    ClassFlow<span class="text-brand-red">Pro</span>
                </div>
                <p class="max-w-xs text-sm">The simple, transparent, anti-marketplace booking platform for independent educators and tutors.</p>
            </div>
            
            <div>
                <h4 class="text-white font-bold mb-4">Platform</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#pricing" class="hover:text-white transition-colors">Pricing</a></li>
                    <li><a href="{{ route('search') }}" class="hover:text-white transition-colors">Tutor Directory</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Tutor Login</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Legal</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Support</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-gray-800 text-sm text-center md:text-left flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} ClassFlow Pro. All rights reserved.</p>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white">Facebook</a>
                <a href="#" class="hover:text-white">Instagram</a>
                <a href="#" class="hover:text-white">TikTok</a>
            </div>
        </div>
    </footer>

</body>
</html>