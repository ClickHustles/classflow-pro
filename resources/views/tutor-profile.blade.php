<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sarah Mitchell | Math Tutor | ClassFlow Pro</title>
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
<body class="bg-brand-cream text-brand-slate antialiased">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            <a href="{{ route('search') }}" class="text-sm font-bold text-gray-500 hover:text-brand-green flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Search
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <div class="flex-1 space-y-12">
                
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-32 h-32 md:w-48 md:h-48 rounded-3xl bg-brand-lightgreen overflow-hidden flex-shrink-0 shadow-inner">
                        <svg class="w-full h-full text-brand-green p-8 opacity-40" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                    </div>
                    <div class="space-y-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-lightgreen text-brand-green text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></span> Verified Professional
                        </div>
                        <h1 class="text-4xl md:text-5xl font-black tracking-tight text-brand-slate">Sarah Mitchell, M.Ed</h1>
                        <p class="text-xl text-gray-500 font-medium leading-relaxed">High School Mathematics & SAT Prep Specialist with 12 years of classroom experience.</p>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-1 text-amber-400 font-bold">
                                ★★★★★ <span class="text-brand-slate ml-1">4.9</span> <span class="text-gray-400 font-medium">(42 Reviews)</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-500 font-medium">
                                <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                Austin, TX (Online & In-Person)
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                        <span class="w-8 h-1 bg-brand-green rounded-full"></span> Subjects
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['Algebra I & II', 'Geometry', 'Calculus AB/BC', 'SAT Math', 'ACT Science', 'AP Statistics'] as $tag)
                        <span class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-brand-slate font-bold shadow-sm">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="prose prose-lg text-gray-600 max-w-none">
                    <h2 class="text-2xl font-bold text-brand-slate mb-4">About Me</h2>
                    <p>I believe that every student has a "Math Brain"—they just haven't been shown how to use it yet. My teaching philosophy is built on breaking down complex, intimidating concepts into simple, repeatable patterns.</p>
                    <p>Whether we are tackling the SAT or preparing for an AP Calculus exam, my goal is to build the student's confidence alongside their skills. I provide custom worksheets, digital whiteboarding sessions, and progress reports after every meeting.</p>
                </div>

                <div class="pt-12 border-t border-gray-100">
                    <h2 class="text-2xl font-bold mb-8 text-brand-slate">What Parents Are Saying</h2>
                    <div class="space-y-8">
                        <div class="p-6 bg-white rounded-3xl border border-gray-100 shadow-sm">
                            <div class="flex justify-between mb-4">
                                <span class="font-bold">Michelle R. <span class="text-gray-400 font-normal">for Algebra II</span></span>
                                <span class="text-amber-400">★★★★★</span>
                            </div>
                            <p class="text-gray-600 italic">"Sarah is a miracle worker. My son went from a D+ to an A- in just three months. She makes the material so approachable."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-96">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 inset-x-0 h-2 bg-brand-red"></div>
                        
                        <div class="flex justify-between items-end mb-8">
                            <div>
                                <span class="text-4xl font-black text-brand-slate">$65</span>
                                <span class="text-gray-400 font-bold ml-1">/ hour</span>
                            </div>
                            <div class="text-right">
                                <span class="block text-xs font-bold text-brand-green uppercase tracking-widest">Available</span>
                                <span class="text-xs font-medium text-gray-500 italic">No hidden fees</span>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Select a Date</label>
                            <div class="grid grid-cols-7 gap-2 text-center text-xs font-bold">
                                <div class="text-gray-400">M</div><div class="text-gray-400">T</div><div class="text-gray-400">W</div><div class="text-gray-400">T</div><div class="text-gray-400">F</div><div class="text-gray-400">S</div><div class="text-gray-400">S</div>
                                @foreach(range(1, 14) as $day)
                                <button class="h-10 w-full flex items-center justify-center rounded-lg border border-gray-100 hover:border-brand-green hover:text-brand-green transition-all">{{ 10 + $day }}</button>
                                @endforeach
                            </div>
                        </div>

                        <button class="w-full py-5 bg-brand-red text-white font-black text-xl rounded-2xl shadow-lg shadow-brand-red/30 hover:bg-opacity-90 hover:-translate-y-1 transition-all active:scale-95 mb-4">
                            Book Session
                        </button>
                        
                        <p class="text-center text-xs text-gray-400 font-medium">You won't be charged until the session is confirmed.</p>
                    </div>

                    <div class="bg-brand-lightgreen rounded-2xl p-6 border border-brand-green/10">
                        <h4 class="font-bold text-brand-green mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            The ClassFlow Promise
                        </h4>
                        <p class="text-xs text-brand-slate/70 leading-relaxed">
                            By booking through ClassFlow Pro, you are supporting independent educators. Tutors keep 100% of their rate, ensuring you get the best educational value.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>