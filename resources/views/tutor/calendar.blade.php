<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Availability | ClassFlow Pro</title>
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
<body class="bg-gray-50 text-brand-slate antialiased min-h-screen flex flex-col">

    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('tutor.dashboard') }}" class="text-sm font-bold text-gray-500 hover:text-brand-slate transition-colors">Dashboard</a>
                <div class="flex items-center gap-3 border-l border-gray-200 pl-6">
                    <span class="text-sm font-medium text-gray-500 hidden sm:block">Welcome, Sarah</span>
                    <div class="w-8 h-8 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center font-bold text-sm cursor-pointer hover:bg-brand-green hover:text-white transition-colors">SM</div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-12">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <a href="{{ route('tutor.onboarding') }}" class="inline-flex items-center text-sm font-bold text-brand-green hover:text-brand-red transition-colors mb-4">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Onboarding
                </a>
                <h1 class="text-3xl font-extrabold text-brand-slate">Availability</h1>
                <p class="text-gray-500 text-lg mt-1">Set your standard weekly hours for tutoring sessions.</p>
            </div>
            <button class="hidden sm:flex items-center px-6 py-3 bg-brand-slate text-white font-bold rounded-xl hover:bg-gray-800 transition-colors shadow-sm">
                Save Schedule
            </button>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="flex-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-8"
                 x-data="{
                    schedule: [
                        { day: 'Monday', active: true, slots: [{start: '15:00', end: '19:00'}] },
                        { day: 'Tuesday', active: true, slots: [{start: '15:00', end: '19:00'}] },
                        { day: 'Wednesday', active: true, slots: [{start: '15:00', end: '17:00'}, {start: '18:00', end: '20:00'}] },
                        { day: 'Thursday', active: true, slots: [{start: '15:00', end: '19:00'}] },
                        { day: 'Friday', active: false, slots: [{start: '09:00', end: '17:00'}] },
                        { day: 'Saturday', active: true, slots: [{start: '10:00', end: '14:00'}] },
                        { day: 'Sunday', active: false, slots: [{start: '09:00', end: '17:00'}] }
                    ]
                 }">
                
                <h2 class="text-xl font-bold mb-6 border-b border-gray-100 pb-4">Standard Hours</h2>

                <div class="space-y-6">
                    <template x-for="(dayData, index) in schedule" :key="dayData.day">
                        <div class="flex flex-col sm:flex-row sm:items-start gap-4 py-3 border-b border-gray-50 last:border-0">
                            
                            <div class="w-40 flex items-center gap-4 mt-2 sm:mt-0">
                                <button @click="dayData.active = !dayData.active" 
                                        :class="dayData.active ? 'bg-brand-green' : 'bg-gray-200'" 
                                        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none">
                                    <span aria-hidden="true" 
                                          :class="dayData.active ? 'translate-x-5' : 'translate-x-0'" 
                                          class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                </button>
                                <span class="font-bold w-24" :class="dayData.active ? 'text-brand-slate' : 'text-gray-400'" x-text="dayData.day"></span>
                            </div>

                            <div class="flex-1 space-y-3">
                                <template x-if="dayData.active">
                                    <div>
                                        <template x-for="(slot, slotIndex) in dayData.slots" :key="slotIndex">
                                            <div class="flex items-center gap-3 mb-3">
                                                <select class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm font-medium text-brand-slate focus:border-brand-green focus:ring-1 focus:ring-brand-green outline-none" x-model="slot.start">
                                                    <option value="09:00">9:00 AM</option>
                                                    <option value="10:00">10:00 AM</option>
                                                    <option value="15:00">3:00 PM</option>
                                                    <option value="16:00">4:00 PM</option>
                                                    <option value="18:00">6:00 PM</option>
                                                </select>
                                                <span class="text-gray-400 font-bold">-</span>
                                                <select class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm font-medium text-brand-slate focus:border-brand-green focus:ring-1 focus:ring-brand-green outline-none" x-model="slot.end">
                                                    <option value="14:00">2:00 PM</option>
                                                    <option value="17:00">5:00 PM</option>
                                                    <option value="19:00">7:00 PM</option>
                                                    <option value="20:00">8:00 PM</option>
                                                    <option value="21:00">9:00 PM</option>
                                                </select>
                                                
                                                <button x-show="dayData.slots.length > 1" @click="dayData.slots.splice(slotIndex, 1)" class="p-2 text-gray-400 hover:text-brand-red transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                                
                                                <button x-show="slotIndex === dayData.slots.length - 1" @click="dayData.slots.push({start: '15:00', end: '17:00'})" class="p-2 text-gray-400 hover:text-brand-green transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </template>

                                <template x-if="!dayData.active">
                                    <div class="py-2 text-sm text-gray-400 font-medium italic">Unavailable</div>
                                </template>
                            </div>

                        </div>
                    </template>
                </div>
                
                <button type="button" onclick="window.location.href='/tutor/onboarding'" class="mt-8 sm:hidden w-full py-4 bg-brand-slate text-white font-bold rounded-xl hover:bg-gray-800 transition-colors shadow-sm">
                    Save Schedule
                </button>
            </div>

            <div class="w-full lg:w-96 space-y-6">
                
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                    <h3 class="font-bold text-lg mb-2">Date Overrides</h3>
                    <p class="text-sm text-gray-500 mb-6">Add dates when your availability changes from your standard hours (e.g., vacations).</p>
                    
                    <button class="w-full py-3 bg-brand-lightgreen text-brand-green font-bold text-sm rounded-xl border border-brand-green/20 hover:bg-brand-green hover:text-white transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add a date override
                    </button>
                </div>

                <div class="bg-gray-800 text-white rounded-3xl shadow-lg p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-32 h-32 bg-white rounded-full blur-3xl opacity-10"></div>
                    <div class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center text-brand-green mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Your Booking Link</h3>
                    <p class="text-sm text-gray-400 mb-6 leading-relaxed">Parents will see these exact available times when they visit your public profile.</p>
                    <a href="{{ route('tutor.profile.public', 'sarah-mitchell') }}" target="_blank" class="inline-flex items-center text-sm font-bold text-brand-green hover:text-white transition-colors">
                        Preview my profile <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </main>

</body>
</html>