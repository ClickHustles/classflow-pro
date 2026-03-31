<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ClassFlow Pro | The Anti-Marketplace for Tutors</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Instrument Sans', 'sans-serif'],
                        },
                        colors: {
                            edu: {
                                50: '#f0fdf4',
                                100: '#dcfce7',
                                500: '#22c55e',
                                700: '#15803d',
                                800: '#166534',
                                900: '#14532d',
                            },
                            apple: {
                                100: '#fee2e2',
                                500: '#ef4444',
                                600: '#dc2626',
                                700: '#b91c1c',
                            }
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-edu-50 text-slate-800 antialiased min-h-screen flex flex-col selection:bg-apple-500 selection:text-white">
        
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center relative z-10">
            <div class="text-2xl font-bold tracking-tight text-edu-900 flex items-center gap-1">
                <svg class="w-8 h-8 text-edu-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-apple-600">Pro</span>
            </div>
            
            @if (Route::has('login'))
                <nav class="flex items-center gap-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-medium text-edu-800 hover:text-apple-600 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-edu-800 hover:text-apple-600 transition-colors">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-edu-800 text-white font-medium hover:bg-edu-900 transition-all shadow-sm">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-grow flex flex-col items-center justify-center px-6 py-12 lg:py-24 text-center relative z-10">
            
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-apple-100 text-apple-700 font-semibold text-sm mb-8 border border-apple-100 shadow-sm">
                <span>🍎</span> The Anti-Marketplace for Educators
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold text-edu-900 tracking-tight mb-6 max-w-4xl leading-tight">
                Keep what you earn. <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-edu-700 to-edu-500">Teach on your terms.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-slate-600 mb-10 max-w-2xl leading-relaxed">
                Stop losing 20-40% of your income to platform commissions. ClassFlow Pro charges a flat <strong class="text-edu-800">$5 per booking</strong>. Direct payouts, SEO-optimized profiles, and absolute freedom.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center max-w-md sm:max-w-none">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-apple-600 text-white font-bold rounded-xl shadow-lg shadow-apple-500/30 hover:bg-apple-700 hover:-translate-y-0.5 transition-all text-lg">
                    Apply to Teach
                </a>
                <a href="#directory" class="px-8 py-4 bg-white text-edu-900 font-bold rounded-xl shadow-sm border border-edu-200 hover:border-edu-400 hover:bg-edu-50 transition-all text-lg">
                    Find a Tutor
                </a>
            </div>
        </main>

        <section class="w-full max-w-7xl mx-auto px-6 pb-24 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-edu-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-edu-100 rounded-xl flex items-center justify-center text-edu-700 mb-6 text-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-edu-900 mb-3">Direct Stripe Payouts</h3>
                    <p class="text-slate-600 leading-relaxed">Parents pay upfront, and funds are routed directly to your connected Stripe account. We never hold your money.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-edu-100 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-apple-50 rounded-bl-full -z-10"></div>
                    <div class="w-14 h-14 bg-apple-100 rounded-xl flex items-center justify-center text-apple-600 mb-6 text-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-edu-900 mb-3">$5 Flat Booking Fee</h3>
                    <p class="text-slate-600 leading-relaxed">A simple $24.95 setup fee, then just $5 per paid session. No sliding scales or massive percentage cuts.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-edu-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-edu-100 rounded-xl flex items-center justify-center text-edu-700 mb-6 text-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-edu-900 mb-3">SEO Profile Directory</h3>
                    <p class="text-slate-600 leading-relaxed">Your tutor profile acts as your independent website. Rank locally and nationally without fighting an algorithm.</p>
                </div>

            </div>
        </section>

        <div class="absolute top-0 inset-x-0 h-[30rem] bg-gradient-to-b from-edu-100/50 to-transparent pointer-events-none -z-0"></div>
    </body>
</html>