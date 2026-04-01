<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tutor->name }} | {{ $tutor->profile->role_title ?? 'Expert Tutor' }} | ClassFlow Pro</title>
    
    <script type="application/ld+json">
        {!! $schema !!}
    </script>

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
                        <img src="{{ $tutor->getFirstMediaUrl('avatar') }}" alt="{{ $tutor->name }}" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="space-y-4">
                        @if($tutor->profile->is_verified)
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-lightgreen text-brand-green text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></span> Verified Professional
                        </div>
                        @endif
                        
                        <h1 class="text-4xl md:text-5xl font-black tracking-tight text-brand-slate">{{ $tutor->name }}</h1>
                        <p class="text-xl text-gray-500 font-medium leading-relaxed">{{ $tutor->profile->value_prop }}</p>
                        
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 text-gray-500 font-medium">
                                <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                {{ $tutor->profile->primary_city }}, {{ $tutor->profile->primary_state }}
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                        <span class="w-8 h-1 bg-brand-green rounded-full"></span> Subjects
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach($tutor->profile->subjects_primary ?? [] as $tag)
                        <span class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-brand-slate font-bold shadow-sm">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="prose prose-lg text-gray-600 max-w-none">
                    <h2 class="text-2xl font-bold text-brand-slate mb-4">About Me</h2>
                    <div class="whitespace-pre-line">{{ $tutor->profile->bio_pro }}</div>
                    
                    <h2 class="text-2xl font-bold text-brand-slate mt-8 mb-4">Teaching Philosophy</h2>
                    <p>{{ $tutor->profile->philosophy }}</p>
                </div>

            </div>

            <div class="w-full lg:w-96">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 inset-x-0 h-2 bg-brand-red"></div>
                        
                        <div class="flex justify-between items-end mb-8">
                            <div>
                                <span class="text-4xl font-black text-brand-slate">${{ $tutor->profile->rate_online }}</span>
                                <span class="text-gray-400 font-bold ml-1">/ hour</span>
                            </div>
                            <div class="text-right">
                                <span class="block text-xs font-bold text-brand-green uppercase tracking-widest">Available</span>
                                <span class="text-xs font-medium text-gray-500 italic">No middleman fees</span>
                            </div>
                        </div>

                        <a href="{{ route('booking.flow', ['tutor' => $tutor->slug, 'slot' => 'initial-consult']) }}" class="block text-center w-full py-5 bg-brand-red text-white font-black text-xl rounded-2xl shadow-lg shadow-brand-red/30 hover:bg-opacity-90 hover:-translate-y-1 transition-all active:scale-95 mb-4">
                            Book Session
                        </a>
                        
                        <p class="text-center text-xs text-gray-400 font-medium">Supporting Independent Educators</p>
                    </div>

                    <div class="bg-brand-lightgreen rounded-2xl p-6 border border-brand-green/10">
                        <h4 class="font-bold text-brand-green mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            The ClassFlow Promise
                        </h4>
                        <p class="text-xs text-brand-slate/70 leading-relaxed">
                            {{ $tutor->name }} keeps 100% of the session rate. We don't take a cut of their hard work, and you don't pay "service fees" just for booking.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>