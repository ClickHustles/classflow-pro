<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | ClassFlow Pro</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
                    colors: {
                        edu: { 50: '#f0fdf4', 100: '#dcfce7', 500: '#22c55e', 700: '#15803d', 800: '#166534', 900: '#14532d' },
                        apple: { 100: '#fee2e2', 500: '#ef4444', 600: '#dc2626', 700: '#b91c1c' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-edu-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <nav class="bg-white border-b border-edu-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold tracking-tight text-edu-900 flex items-center gap-1">
                        <svg class="w-6 h-6 text-edu-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        ClassFlow<span class="text-apple-600">Pro</span>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-slate-500">Demo User</span>
                    <div class="w-8 h-8 rounded-full bg-edu-200 flex items-center justify-center text-edu-800 font-bold">
                        D
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

</body>
</html>