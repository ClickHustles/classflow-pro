<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onboarding | ClassFlow Pro Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
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
<body class="bg-gray-50 text-brand-slate antialiased min-h-screen flex flex-col">

    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-5xl mx-auto px-6 h-16 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium text-gray-500">Welcome, Sarah</span>
                <div class="w-8 h-8 rounded-full bg-brand-lightgreen text-brand-green flex items-center justify-center font-bold text-sm">SM</div>
            </div>
        </div>
    </header>

    <main class="flex-1 py-12 px-6">
        <div class="max-w-3xl mx-auto">
            
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-extrabold mb-3">Let's get your tutoring business online.</h1>
                <p class="text-gray-500 text-lg">Complete these 4 steps to publish your profile and start accepting bookings.</p>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 mb-8">
                <div class="flex justify-between text-sm font-bold text-brand-slate mb-3">
                    <span>Profile Setup Progress</span>
                    <span class="text-brand-green">25%</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-brand-green rounded-full w-1/4 transition-all duration-1000 ease-out"></div>
                </div>
            </div>

            <div class="space-y-4">
                
                <div class="bg-white p-6 rounded-2xl border border-brand-green/30 shadow-sm flex items-start gap-5 opacity-70">
                    <div class="w-8 h-8 rounded-full bg-brand-green text-white flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-brand-slate line-through decoration-gray-300">Create your account</h3>
                        <p class="text-gray-500 text-sm mt-1">You successfully registered as an educator.</p>
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-2xl border-2 border-brand-green shadow-md flex flex-col md:flex-row md:items-center justify-between gap-6 transform transition-all hover:-translate-y-1 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-brand-green"></div>
                    <div class="flex items-start gap-5 flex-1">
                        <div class="w-8 h-8 rounded-full bg-brand-lightgreen border-2 border-brand-green text-brand-green flex items-center justify-center font-bold flex-shrink-0 mt-0.5">2</div>
                        <div>
                            <h3 class="font-bold text-xl text-brand-slate mb-2">Build your public profile</h3>
                            <p class="text-gray-600 text-sm mb-4">Add your subjects, a professional bio, your hourly rate, and a profile picture to help parents find you.</p>
                            <a href="{{ route('tutor.profile.edit') }}" class="inline-flex items-center px-6 py-3 bg-brand-slate text-white font-bold rounded-xl hover:bg-gray-800 transition-colors shadow-sm text-sm">
                                Edit Profile Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-start gap-5 flex-1">
                        <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-400 border border-gray-200 flex items-center justify-center font-bold flex-shrink-0 mt-0.5">3</div>
                        <div>
                            <h3 class="font-bold text-lg text-brand-slate mb-1">Connect your bank</h3>
                            <p class="text-gray-500 text-sm mb-3">Link your bank securely via Stripe Connect so you can receive direct payouts for your bookings.</p>
                            <a href="{{ route('tutor.stripe.connect') }}" class="inline-flex items-center text-brand-green font-bold text-sm hover:text-brand-red transition-colors">
                                Setup Payments <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block text-gray-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-start gap-5 flex-1">
                        <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-400 border border-gray-200 flex items-center justify-center font-bold flex-shrink-0 mt-0.5">4</div>
                        <div>
                            <h3 class="font-bold text-lg text-brand-slate mb-1">Set your availability</h3>
                            <p class="text-gray-500 text-sm mb-3">Define the days and times you are available to teach, and sync your external calendar to prevent double-bookings.</p>
                            <a href="{{ route('tutor.calendar') }}" class="inline-flex items-center text-brand-green font-bold text-sm hover:text-brand-red transition-colors">
                                Configure Calendar <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-12 text-center border-t border-gray-200 pt-8">
                <p class="text-sm text-gray-500">Need help setting up your business? <a href="#" class="font-bold text-brand-green hover:text-brand-red transition-colors">Read the onboarding guide.</a></p>
            </div>

        </div>
    </main>

</body>
</html>