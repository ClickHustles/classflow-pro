<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Control Center | ClassFlow Pro</title>
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
<body class="bg-gray-100 text-brand-slate antialiased min-h-screen flex flex-col">

    <header class="bg-brand-slate text-white border-b border-gray-800 sticky top-0 z-40 shadow-md" x-data="{ profileOpen: false, mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            
            <div class="flex items-center gap-8">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-tight flex items-center gap-2">
                    <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    ClassFlow<span class="text-brand-red">Admin</span>
                </a>
                
                <nav class="hidden md:flex gap-6 text-sm font-bold text-gray-400">
                    <a href="{{ route('admin.dashboard') }}" class="text-white">Overview</a>
                    <a href="{{ route('admin.tutors') }}" class="hover:text-white transition-colors">Tutors</a>
                    <a href="#" class="hover:text-white transition-colors">Bookings</a>
                    <a href="#" class="hover:text-white transition-colors">Finance</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <span class="hidden sm:inline-flex text-[10px] font-bold uppercase tracking-widest text-brand-green bg-brand-green/10 px-3 py-1 rounded-full border border-brand-green/20">System Healthy</span>
                
                <div class="relative">
                    <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="w-8 h-8 rounded-full bg-gray-800 text-white flex items-center justify-center font-bold text-sm border border-gray-700 hover:bg-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-green">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </button>

                    <div x-show="profileOpen" x-cloak
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 text-brand-slate overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                            <p class="text-sm font-bold leading-tight truncate">{{ auth()->user()->name ?? 'Admin User' }}</p>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest truncate">{{ auth()->user()->email ?? 'admin@classflow.com' }}</p>
                        </div>
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-bold text-gray-600 hover:bg-gray-50 hover:text-brand-green">View Live Site</a>
                        <form method="POST" action="{{ route('logout') ?? '#' }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm font-bold text-brand-red hover:bg-red-50">Log Out</button>
                        </form>
                    </div>
                </div>

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-400 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-brand-slate border-t border-gray-800 px-6 py-4 space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block text-white font-bold">Overview</a>
            <a href="{{ route('admin.tutors') }}" class="block text-gray-400 font-bold hover:text-white">Tutors</a>
            <a href="#" class="block text-gray-400 font-bold hover:text-white">Bookings</a>
            <a href="#" class="block text-gray-400 font-bold hover:text-white">Finance</a>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-10">
        
        <div class="mb-8 animate-fade-in-up">
            <h1 class="text-3xl font-extrabold text-brand-slate">Platform Overview</h1>
            <p class="text-gray-500 mt-1 font-medium">Here is what is happening across ClassFlow Pro today.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black tracking-widest text-brand-green bg-brand-lightgreen px-2 py-1 rounded-lg">+12%</span>
                </div>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Platform Fees (30d)</p>
                <p class="text-3xl font-black text-brand-slate">$1,245.00</p>
                <p class="text-xs text-gray-500 font-medium mt-2">249 total bookings completed</p>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black tracking-widest text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">+4</span>
                </div>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Active Tutors</p>
                <p class="text-3xl font-black text-brand-slate">42</p>
                <p class="text-xs text-gray-500 font-medium mt-2">3 pending Stripe verification</p>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                </div>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Sessions Today</p>
                <p class="text-3xl font-black text-brand-slate">18</p>
                <p class="text-xs text-gray-500 font-medium mt-2">$90 in daily fee revenue</p>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200 relative overflow-hidden hover:shadow-md transition-shadow">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-brand-blurple opacity-5 rounded-full blur-xl"></div>
                <div class="flex justify-between items-start mb-4 relative z-10">
                    <div class="w-10 h-10 rounded-full bg-brand-blurple/10 text-brand-blurple flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M13.976 9.15c-2.172-.806-3.356-1.143-3.356-2.077 0-.64.67-1.168 1.83-1.168 1.848 0 3.313.738 4.39 1.488l1.378-3.415C16.892 3.016 14.852 2.4 12.604 2.4 8.243 2.4 5.3 4.965 5.3 8.766c0 4.887 6.138 5.485 8.164 6.302 2.37.95 3.12 1.637 3.12 2.656 0 .977-.96 1.684-2.5 1.684-2.128 0-4.14-.94-5.513-2.008L6.89 20.843C8.583 22.19 10.975 22.8 13.31 22.8c4.66 0 7.746-2.483 7.746-6.425-.002-4.11-4.908-5.464-7.08-6.225z"/></svg>
                    </div>
                </div>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1 relative z-10">Stripe Connect</p>
                <div class="flex items-center gap-2 relative z-10">
                    <span class="w-2.5 h-2.5 rounded-full bg-brand-green animate-pulse"></span>
                    <p class="text-xl font-black text-brand-slate">Operational</p>
                </div>
                <p class="text-xs text-gray-500 font-medium mt-3 relative z-10">0 failed webhooks</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h2 class="text-lg font-bold text-brand-slate">Recent Bookings (Money Flow)</h2>
                    <button class="text-xs font-black uppercase tracking-widest text-brand-green hover:text-brand-red transition-colors">View All Logs</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-[10px] font-black uppercase tracking-widest border-b border-gray-100">
                                <th class="p-4">Tutor</th>
                                <th class="p-4">Student</th>
                                <th class="p-4">Total Paid</th>
                                <th class="p-4 text-right">Platform Fee</th>
                                <th class="p-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium">
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center font-bold text-xs">SM</div>
                                        <span class="font-bold text-brand-slate">Sarah Mitchell</span>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500">Jackson M.</td>
                                <td class="p-4 font-bold text-brand-slate">$70.00</td>
                                <td class="p-4 text-right font-black text-brand-green">+$5.00</td>
                                <td class="p-4 text-center">
                                    <span class="px-2 py-1 bg-green-50 text-brand-green text-[10px] font-black uppercase tracking-widest rounded-lg border border-green-100">Confirmed</span>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xs">DR</div>
                                        <span class="font-bold text-brand-slate">Daniel Rivera</span>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500">Sophia L.</td>
                                <td class="p-4 font-bold text-brand-slate">$50.00</td>
                                <td class="p-4 text-right font-black text-brand-green">+$5.00</td>
                                <td class="p-4 text-center">
                                    <span class="px-2 py-1 bg-green-50 text-brand-green text-[10px] font-black uppercase tracking-widest rounded-lg border border-green-100">Confirmed</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-xs">ET</div>
                                        <span class="font-bold text-brand-slate">Emily Tan</span>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500">Noah W.</td>
                                <td class="p-4 font-bold text-brand-slate">$90.00</td>
                                <td class="p-4 text-right font-black text-gray-400">Pending</td>
                                <td class="p-4 text-center">
                                    <span class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] font-black uppercase tracking-widest rounded-lg border border-gray-200">Processing</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                    <h3 class="font-bold text-lg mb-4 flex items-center justify-between text-brand-slate">
                        Pending Approvals
                        <span class="w-6 h-6 rounded-full bg-brand-red text-white flex items-center justify-center text-xs font-bold">1</span>
                    </h3>
                    
                    <div class="p-5 rounded-2xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-bold text-brand-slate text-sm">Marcus Chen</h4>
                                <p class="text-xs text-gray-500 font-medium mt-0.5">Music & Arts • Joined 2h ago</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mt-3 bg-white px-3 py-2 rounded-xl border border-gray-100 w-max">
                            <span class="w-2 h-2 rounded-full bg-brand-green"></span>
                            <span class="text-xs text-gray-600 font-bold">Stripe Connected</span>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <button class="flex-1 py-2.5 bg-brand-green text-white text-xs font-black uppercase tracking-wider rounded-xl hover:bg-opacity-90 transition-all shadow-sm">Approve</button>
                            <button class="flex-1 py-2.5 bg-white border border-gray-200 text-brand-slate text-xs font-black uppercase tracking-wider rounded-xl hover:bg-gray-100 transition-all">Review</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>