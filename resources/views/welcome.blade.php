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
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
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
</head>
<body class="bg-brand-cream text-brand-slate antialiased selection:bg-brand-red selection:text-white overflow-x-hidden" x-data="{ mobileMenu: false }">

    <header class="fixed top-0 inset-x-0 w-full bg-white/80 backdrop-blur-md border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-8 h-8 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('search') }}" class="font-bold text-gray-600 hover:text-brand-green transition-colors">Find a Tutor</a>
                <a href="#pricing" class="font-bold text-gray-600 hover:text-brand-green transition-colors">Pricing</a>
                
                <div class="flex items-center gap-4 ml-4 pl-4 border-l border-gray-200">
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-bold text-brand-slate hover:text-brand-red transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold text-gray-600 hover:text-brand-red transition-colors">Log in</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-brand-green text-white font-bold hover:bg-opacity-90 transition-all shadow-md">
                            Start Free
                        </a>
                    @endauth
                </div>
            </nav>

            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 text-brand-slate">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </header>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-lightgreen to-brand-cream -z-10"></div>
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-brand-slate font-bold text-sm mb-8 border border-gray-200 shadow-sm">
                <span class="text-brand-red">🍎</span> The Anti-Marketplace for Educators
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 max-w-4xl mx-auto leading-tight">
                Run Your Tutoring Business. Book Clients. Get Paid. <br/>
                <span class="text-brand-green">All for $5 Per Booking.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-3xl mx-auto leading-relaxed">
                A modern scheduling and payment platform built for tutors who want simplicity, professionalism, and <strong class="text-brand-slate">zero monthly fees</strong>.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center max-w-md sm:max-w-none mx-auto mb-12">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-brand-red text-white font-black rounded-full shadow-lg shadow-brand-red/30 hover:bg-opacity-90 hover:-translate-y-1 transition-all text-lg">
                    Start Free
                </a>
                <a href="{{ route('search') }}" class="px-8 py-4 bg-white text-brand-slate font-black rounded-full shadow-sm border border-gray-200 hover:border-brand-green hover:text-brand-green transition-all text-lg">
                    Find a Tutor
                </a>
            </div>

            <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm font-bold text-gray-400">
                <div class="flex items-center gap-2">✓ No subscriptions</div>
                <div class="flex items-center gap-2">✓ No commissions</div>
                <div class="flex items-center gap-2">✓ No contracts</div>
                <div class="flex items-center gap-2 text-brand-red">✓ Pay only when you get paid</div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-24 bg-brand-slate text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-black mb-4">Simple, Honest Pricing</h2>
            <p class="text-gray-400 mb-12 text-lg font-medium">No monthly fees. No nonsense.</p>

            <div class="bg-white rounded-3xl p-8 md:p-12 text-brand-slate shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 inset-x-0 h-2 bg-brand-green"></div>
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="text-left">
                        <span class="inline-block px-3 py-1 bg-brand-lightgreen text-brand-green font-bold rounded-full text-xs mb-4">Marketplace Standard</span>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-6xl font-black text-brand-red">$5</span>
                            <span class="text-xl text-gray-500 font-bold">/ paid booking</span>
                        </div>
                        <p class="text-gray-500 font-bold text-sm">Plus a $24.95 one-time setup fee.</p>
                    </div>
                    <div class="w-full md:w-auto">
                        <ul class="space-y-3 mb-8 text-left text-gray-600 font-bold text-sm">
                            <li class="flex items-center gap-2">✓ Keep 100% of your hourly rate</li>
                            <li class="flex items-center gap-2">✓ Free public directory listing</li>
                            <li class="flex items-center gap-2">✓ Instant Stripe payouts</li>
                        </ul>
                        <a href="{{ route('register') }}" class="block w-full text-center px-8 py-4 bg-brand-slate text-white font-black rounded-full hover:bg-gray-800 transition-colors">
                            Start Free Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-brand-cream border-t border-gray-200 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-8">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-brand-slate mb-4 inline-block">
                    ClassFlow<span class="text-brand-red">Pro</span>
                </a>
                <p class="text-sm text-gray-400 font-medium max-w-xs">&copy; {{ date('Y') }} ClassFlow Pro. Empowering independent educators everywhere.</p>
            </div>
            <div class="flex gap-8 text-sm font-bold text-gray-500">
                <a href="{{ route('terms') }}" class="hover:text-brand-green">Terms</a>
                <a href="{{ route('privacy') }}" class="hover:text-brand-green">Privacy</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-green">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>