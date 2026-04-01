<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In | ClassFlow Pro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Instrument Sans', 'sans-serif'] }, colors: { brand: { green: '#2F7A4D', red: '#D64545', cream: '#FAF9F6', slate: '#1F1F1F' } } } } }
    </script>
</head>
<body class="bg-brand-cream text-brand-slate antialiased min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-green rounded-full blur-3xl opacity-10 pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-brand-red rounded-full blur-3xl opacity-5 pointer-events-none"></div>

    <div class="w-full max-w-md">
        <div class="flex justify-center mb-8">
            <a href="/" class="text-3xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-8 h-8 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10 relative z-10">
            <h1 class="text-2xl font-bold mb-1 text-center">Welcome back</h1>
            <p class="text-gray-500 mb-8 text-center">Log in to manage your tutoring business.</p>

            <form action="#" method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all" placeholder="you@example.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-brand-green hover:text-brand-red transition-colors">Forgot password?</a>
                    </div>
                    <input type="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-green focus:ring-2 focus:ring-brand-green/20 outline-none transition-all" placeholder="••••••••">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-brand-green border-gray-300 rounded focus:ring-brand-green">
                    <label class="ml-2 block text-sm text-gray-600">Remember me for 30 days</label>
                </div>

                <button type="button" onclick="window.location.href='/tutor/dashboard'" class="w-full py-4 bg-brand-slate text-white font-bold rounded-xl hover:bg-gray-800 transition-all shadow-md mt-2">
                    Sign In
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-gray-500 mt-8">
            Don't have an account? <a href="{{ route('register') }}" class="text-brand-green font-bold hover:text-brand-red transition-colors">Apply to teach here</a>
        </p>
    </div>

</body>
</html>