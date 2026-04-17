<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | ClassFlow Pro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
                    colors: { brand: { green: '#2F7A4D', red: '#D64545', cream: '#FAF9F6', slate: '#1F1F1F', lightgreen: '#EAF2ED', blurple: '#635BFF' } }
                }
            }
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-gray-50 text-brand-slate antialiased min-h-screen flex flex-col">

    <header class="bg-white border-b border-gray-200 sticky top-0 z-40" x-data="{ profileOpen: false }">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            
            <div class="flex items-center gap-8">
                <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                    <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    ClassFlow<span class="text-brand-red">Pro</span>
                </a>
                
                <nav class="hidden md:flex gap-6 text-sm font-bold text-gray-500">
                    <a href="{{ route('tutor.dashboard') }}" class="text-brand-slate border-b-2 border-brand-slate pb-1">Overview</a>
                    <a href="{{ route('tutor.calendar') }}" class="hover:text-brand-slate transition-colors">Calendar</a>
                    <a href="{{ route('tutor.earnings') }}" class="hover:text-brand-slate transition-colors">Earnings</a>
                    <a href="{{ route('tutor.profile.edit') }}" class="hover:text-brand-slate transition-colors">Profile</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('tutor.profile.public', auth()->user()->slug ?? 'preview') }}" target="_blank" class="hidden sm:flex items-center text-xs font-bold text-brand-green hover:text-brand-red transition-colors bg-brand-lightgreen px-3 py-1.5 rounded-full">
                    View Public Page <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
                
                <div class="relative">
                    <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="w-8 h-8 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center font-bold text-sm cursor-pointer border border-brand-green/20 focus:outline-none hover:bg-brand-green hover:text-white transition-colors">
                        {{ substr(auth()->user()->name ?? 'T', 0, 1) }}
                    </button>

                    <div x-show="profileOpen" x-cloak
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 text-brand-slate overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-50 bg-gray-50">
                            <p class="text-sm font-bold leading-tight truncate">{{ auth()->user()->name ?? 'Tutor' }}</p>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest truncate">{{ auth()->user()->email ?? 'tutor@classflow.com' }}</p>
                        </div>
                        
                        <a href="{{ route('tutor.profile.edit') }}" class="block px-4 py-2 text-sm font-bold text-gray-600 hover:bg-brand-lightgreen hover:text-brand-green transition-colors">Edit Profile</a>
                        
                        <div class="h-px bg-gray-100 my-1"></div>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm font-bold text-brand-red hover:bg-red-50 transition-colors">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-10">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-brand-slate">Welcome back, {{ explode(' ', trim(auth()->user()->name ?? 'Educator'))[0] }}</h1>
                <p class="text-gray-500 mt-1">You have <strong class="text-brand-green">2 sessions</strong> scheduled for today.</p>
            </div>
            <button class="px-5 py-2.5 bg-brand-slate text-white text-sm font-bold rounded-xl shadow-sm hover:bg-gray-800 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Manual Booking
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Upcoming Sessions</p>
                    <p class="text-2xl font-black text-brand-slate">12</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Available Payout</p>
                    <p class="text-2xl font-black text-brand-slate">$450.00</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Profile Views (7d)</p>
                    <p class="text-2xl font-black text-brand-slate">84</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <h2 class="text-xl font-bold text-brand-slate flex items-center gap-2 border-b border-gray-200 pb-4">
                    Today's Schedule
                </h2>
                
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex flex-col sm:flex-row justify-between gap-6 hover:shadow-md transition-shadow">
                    <div class="flex gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex flex-col items-center justify-center flex-shrink-0 border border-amber-100">
                            <span class="text-xs font-bold uppercase tracking-widest">PM</span>
                            <span class="text-xl font-black leading-none">3:00</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-bold text-lg">Algebra I Tutoring</h3>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-[10px] font-bold uppercase rounded">Online</span>
                            </div>
                            <p class="text-sm font-medium text-gray-500 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Student: Jackson M.
                            </p>
                        </div>
                    </div>
                    <div class="flex sm:flex-col justify-end gap-2">
                        <button class="px-4 py-2 bg-brand-green text-white text-sm font-bold rounded-xl shadow-sm shadow-brand-green/20 hover:bg-opacity-90 transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            Start Meeting
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-200 text-brand-slate text-sm font-bold rounded-xl hover:bg-gray-50 transition-all">
                            Message
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex flex-col sm:flex-row justify-between gap-6 hover:shadow-md transition-shadow">
                    <div class="flex gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-brand-lightgreen text-brand-green flex flex-col items-center justify-center flex-shrink-0 border border-brand-green/20">
                            <span class="text-xs font-bold uppercase tracking-widest">PM</span>
                            <span class="text-xl font-black leading-none">5:30</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-bold text-lg">SAT Math Prep</h3>
                                <span class="px-2 py-0.5 bg-brand-red/10 text-brand-red text-[10px] font-bold uppercase rounded">In-Person</span>
                            </div>
                            <p class="text-sm font-medium text-gray-500 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Student: Emily T.
                            </p>
                        </div>
                    </div>
                    <div class="flex sm:flex-col justify-end gap-2">
                        <button class="px-4 py-2 bg-brand-slate text-white text-sm font-bold rounded-xl shadow-sm hover:bg-gray-800 transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            View Location
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-200 text-brand-slate text-sm font-bold rounded-xl hover:bg-gray-50 transition-all">
                            Message
                        </button>
                    </div>
                </div>
                
                <a href="{{ route('tutor.sessions') }}" class="block text-center text-sm font-bold text-brand-green hover:text-brand-red transition-colors pt-2">
                    View all upcoming sessions &rarr;
                </a>
            </div>

            <div class="space-y-6">
                
                <div class="bg-brand-slate text-white rounded-3xl p-6 shadow-xl relative overflow-hidden" 
                     x-data="{ 
                        link: 'classflowpro.com/tutors/{{ auth()->user()->slug ?? 'your-profile' }}', 
                        copied: false,
                        copyToClipboard() {
                            navigator.clipboard.writeText('https://' + this.link);
                            this.copied = true;
                            setTimeout(() => this.copied = false, 2000);
                        }
                     }">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-3xl opacity-10 pointer-events-none"></div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">Get Booked</h3>
                    <p class="text-sm text-gray-400 mb-4 relative z-10">Share this link with parents or on social media to accept bookings instantly.</p>
                    
                    <div class="bg-gray-800 rounded-xl p-1 flex items-center relative z-10">
                        <input type="text" readonly x-model="link" class="bg-transparent text-sm text-gray-300 px-3 w-full outline-none select-all">
                        <button @click="copyToClipboard()" class="px-4 py-2 bg-brand-green text-white text-xs font-bold rounded-lg hover:bg-opacity-90 transition-all whitespace-nowrap">
                            <span x-show="!copied">Copy</span>
                            <span x-show="copied" x-cloak>Copied!</span>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-lg">Stripe Connection</h3>
                        <div class="w-8 h-8 rounded-full bg-brand-blurple/10 text-brand-blurple flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M13.976 9.15c-2.172-.806-3.356-1.143-3.356-2.077 0-.64.67-1.168 1.83-1.168 1.848 0 3.313.738 4.39 1.488l1.378-3.415C16.892 3.016 14.852 2.4 12.604 2.4 8.243 2.4 5.3 4.965 5.3 8.766c0 4.887 6.138 5.485 8.164 6.302 2.37.95 3.12 1.637 3.12 2.656 0 .977-.96 1.684-2.5 1.684-2.128 0-4.14-.94-5.513-2.008L6.89 20.843C8.583 22.19 10.975 22.8 13.31 22.8c4.66 0 7.746-2.483 7.746-6.425-.002-4.11-4.908-5.464-7.08-6.225z"/></svg>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 mb-4">
                        <span class="relative flex h-3 w-3">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-brand-green"></span>
                        </span>
                        <span class="text-sm font-bold text-brand-slate">Active & Receiving Payouts</span>
                    </div>
                    <p class="text-xs text-gray-500 mb-4">Next payout of $150.00 is scheduled for tomorrow.</p>
                    
                    <a href="{{ route('tutor.earnings') }}" class="block text-center px-4 py-2 bg-gray-50 text-brand-slate text-sm font-bold rounded-xl border border-gray-200 hover:bg-gray-100 transition-all">
                        View Payout History
                    </a>
                </div>

            </div>
        </div>
    </main>

</body>
</html>