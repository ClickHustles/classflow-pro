<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Session | ClassFlow Pro</title>
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
<body class="bg-brand-cream text-brand-slate antialiased min-h-screen py-12 px-6">

    <div class="max-w-xl mx-auto" x-data="{ step: 1 }">
        
        <div class="flex justify-between items-center mb-12">
            <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            <button @click="if(step > 1) step--" x-show="step < 4" class="text-sm font-bold text-gray-400 hover:text-brand-slate transition-colors" :class="step === 1 ? 'opacity-0 pointer-events-none' : ''">
                &larr; Back
            </button>
        </div>

        <div class="flex items-center justify-between mb-12 px-4" x-show="step < 4">
            <div class="flex flex-col items-center gap-2">
                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs transition-colors" :class="step >= 1 ? 'bg-brand-green text-white' : 'bg-gray-200 text-gray-400'">1</div>
                <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Time</span>
            </div>
            <div class="flex-1 h-px bg-gray-200 mx-4 mt-[-18px]"></div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs transition-colors" :class="step >= 2 ? 'bg-brand-green text-white' : 'bg-gray-200 text-gray-400'">2</div>
                <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Details</span>
            </div>
            <div class="flex-1 h-px bg-gray-200 mx-4 mt-[-18px]"></div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs transition-colors" :class="step >= 3 ? 'bg-brand-green text-white' : 'bg-gray-200 text-gray-400'">3</div>
                <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Payment</span>
            </div>
        </div>

        <div x-show="step === 1" x-transition class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 rounded-xl bg-brand-lightgreen flex-shrink-0"></div>
                <div>
                    <h2 class="font-bold text-lg">Booking Sarah Mitchell</h2>
                    <p class="text-sm text-gray-500">Algebra I • $65/hr</p>
                </div>
            </div>
            <h3 class="font-bold mb-4">Choose an available time:</h3>
            <div class="space-y-3">
                @foreach(['Mon, April 6 at 4:00 PM', 'Tue, April 7 at 3:30 PM', 'Wed, April 8 at 5:00 PM'] as $time)
                <button @click="step = 2" class="w-full p-4 rounded-2xl border border-gray-100 text-left font-bold hover:border-brand-green hover:bg-brand-lightgreen transition-all flex justify-between items-center group">
                    {{ $time }}
                    <svg class="w-5 h-5 text-brand-green opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
                @endforeach
            </div>
        </div>

        <div x-show="step === 2" x-transition class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100" style="display: none;">
            <h2 class="text-2xl font-bold mb-6">Who is learning?</h2>
            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Student Name</label>
                    <input type="text" placeholder="e.g. Jackson Mitchell" class="w-full p-4 rounded-xl bg-gray-50 border-none focus:ring-2 focus:ring-brand-green/20 outline-none font-medium">
                </div>
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">What should we focus on?</label>
                    <textarea rows="3" placeholder="e.g. Pre-Calculus review for Friday's test..." class="w-full p-4 rounded-xl bg-gray-50 border-none focus:ring-2 focus:ring-brand-green/20 outline-none font-medium resize-none"></textarea>
                </div>
                <button @click="step = 3" class="w-full py-4 bg-brand-slate text-white font-bold rounded-xl hover:bg-gray-800 transition-all shadow-md">
                    Continue to Payment
                </button>
            </div>
        </div>

        <div x-show="step === 3" x-transition class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100" style="display: none;">
            <h2 class="text-2xl font-bold mb-8">Summary & Payment</h2>
            
            <div class="bg-gray-50 rounded-2xl p-6 mb-8 space-y-4">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500 font-medium">Algebra I (1 Hour)</span>
                    <span class="font-bold">$65.00</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500 font-medium">Platform Booking Fee</span>
                    <span class="font-bold">$5.00</span>
                </div>
                <div class="pt-4 border-t border-gray-200 flex justify-between items-end">
                    <span class="font-black text-brand-slate">Total Due</span>
                    <span class="text-3xl font-black text-brand-red">$70.00</span>
                </div>
            </div>

            <div class="space-y-4">
                <div class="p-4 rounded-xl border border-gray-200 bg-white flex items-center gap-3">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    <input type="text" placeholder="Card number" class="w-full border-none focus:ring-0 outline-none font-medium">
                </div>
                <button @click="step = 4" class="w-full py-5 bg-brand-red text-white font-black text-xl rounded-2xl shadow-lg shadow-brand-red/30 hover:bg-opacity-90 hover:-translate-y-1 transition-all active:scale-95">
                    Confirm & Pay $70
                </button>
                <p class="text-center text-xs text-gray-400 font-medium italic">Payments are processed securely via Stripe.</p>
            </div>
        </div>

        <div x-show="step === 4" x-transition class="text-center py-12" style="display: none;">
            <div class="w-24 h-24 bg-brand-green text-white rounded-full flex items-center justify-center mx-auto mb-8 shadow-xl shadow-brand-green/20">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h1 class="text-4xl font-black mb-4">You're all set!</h1>
            <p class="text-lg text-gray-500 mb-12">Sarah Mitchell has been notified and you'll receive a confirmation email shortly.</p>
            <a href="/" class="px-8 py-4 bg-brand-slate text-white font-bold rounded-xl hover:bg-gray-800 transition-all">
                Return Home
            </a>
        </div>

    </div>

</body>
</html>