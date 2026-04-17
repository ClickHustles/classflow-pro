<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply to Teach | ClassFlow Pro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-brand-cream text-brand-slate antialiased min-h-screen flex">

    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 sm:px-16 lg:px-24 py-12 bg-white shadow-[10px_0_30px_rgba(0,0,0,0.03)] z-10 relative">
        
        <a href="/" class="absolute top-8 left-8 sm:left-16 lg:left-24 text-2xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
            <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            ClassFlow<span class="text-brand-red">Pro</span>
        </a>

        <div class="max-w-md w-full mx-auto mt-12">
            <h1 class="text-3xl font-bold mb-2">Create your tutor account</h1>
            <p class="text-gray-500 mb-8">Join the anti-marketplace. Keep 100% of your hourly rate.</p>

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all" placeholder="Sarah">
                        @error('first_name') <p class="text-brand-red text-xs font-bold mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all" placeholder="Mitchell">
                        @error('last_name') <p class="text-brand-red text-xs font-bold mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all" placeholder="sarah@example.com">
                    @error('email') <p class="text-brand-red text-xs font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all" placeholder="••••••••">
                    @error('password') <p class="text-brand-red text-xs font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Primary Teaching Subject</label>
                    <select name="subject" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all bg-white text-gray-600">
                        <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select primary subject...</option>
                        <option value="Math" {{ old('subject') == 'Math' ? 'selected' : '' }}>Math & Logic</option>
                        <option value="Science" {{ old('subject') == 'Science' ? 'selected' : '' }}>Science & Biology</option>
                        <option value="English" {{ old('subject') == 'English' ? 'selected' : '' }}>Reading & English</option>
                        <option value="Test Prep" {{ old('subject') == 'Test Prep' ? 'selected' : '' }}>Test Prep (SAT/ACT)</option>
                        <option value="Languages" {{ old('subject') == 'Languages' ? 'selected' : '' }}>Foreign Languages</option>
                        <option value="Special Ed" {{ old('subject') == 'Special Ed' ? 'selected' : '' }}>Special Education</option>
                        <option value="Music" {{ old('subject') == 'Music' ? 'selected' : '' }}>Music & Arts</option>
                        <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('subject') <p class="text-brand-red text-xs font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full py-4 bg-brand-green text-white font-bold rounded-xl hover:bg-opacity-90 transition-all shadow-md mt-4">
                    Create Account & Continue
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-8">
                Already have an account? <a href="{{ route('login') }}" class="text-brand-green font-bold hover:text-brand-red transition-colors">Log in here</a>
            </p>
        </div>
    </div>

    <div class="hidden lg:flex lg:w-1/2 bg-brand-lightgreen flex-col justify-center px-16 xl:px-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 bg-brand-green rounded-full blur-3xl opacity-10"></div>
        
        <div class="relative z-10 max-w-lg">
            <h2 class="text-4xl font-extrabold text-brand-slate mb-6 leading-tight">Your business.<br/>Your rules.<br/><span class="text-brand-green">Your money.</span></h2>
            
            <ul class="space-y-6">
                <li class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-brand-green shadow-sm flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">No Monthly Subscriptions</h4>
                        <p class="text-gray-600">Stop paying for software during your slow months. We only make money when you do.</p>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-brand-green shadow-sm flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Flat $5 Booking Fee</h4>
                        <p class="text-gray-600">Other platforms take 20-40% of every hour you teach. We take $5. Period.</p>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-brand-green shadow-sm flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Instant Payouts</h4>
                        <p class="text-gray-600">Powered by Stripe Connect. The money goes directly from the parent to your bank account.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>