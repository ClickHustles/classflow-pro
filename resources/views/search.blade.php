<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find a Tutor | ClassFlow Pro</title>
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
<body class="bg-brand-cream text-brand-slate antialiased" x-data="{ mobileFilters: false }">

    <header class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight text-brand-slate flex items-center gap-2">
                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                ClassFlow<span class="text-brand-red">Pro</span>
            </a>
            <div class="flex items-center gap-4">
                <a href="{{ route('teach') }}" class="text-sm font-bold text-brand-green">Apply to Teach</a>
                <button @click="mobileFilters = !mobileFilters" class="md:hidden p-2 text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            
            <aside :class="mobileFilters ? 'block' : 'hidden'" class="md:block w-full md:w-64 flex-shrink-0 space-y-8 bg-white md:bg-transparent p-6 md:p-0 rounded-3xl md:rounded-none">
                <form action="{{ route('search') }}" method="GET" class="space-y-8">
                    <div>
                        <h3 class="font-bold text-lg mb-4">Subject</h3>
                        <div class="space-y-3">
                            @foreach(['Math', 'Reading', 'SAT/ACT', 'Science', 'Music'] as $sub)
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" name="subject" value="{{ $sub }}" {{ request('subject') == $sub ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-brand-green focus:ring-brand-green">
                                <span class="text-gray-600 group-hover:text-brand-slate transition-colors">{{ $sub }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-4">Max Price: $<span x-data="{ val: {{ request('max_rate', 200) }} }" x-text="val"></span>/hr</h3>
                        <input type="range" name="max_rate" class="w-full accent-brand-green" min="20" max="200" step="10" value="{{ request('max_rate', 200) }}" @input="val = $el.value">
                        <div class="flex justify-between text-xs font-bold text-gray-400 mt-2">
                            <span>$20/hr</span>
                            <span>$200/hr</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-brand-slate text-white font-bold rounded-xl hover:bg-black transition-all">Apply Filters</button>
                </form>
            </aside>

            <div class="flex-1">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold">
                            @if(request('subject'))
                                Tutors for <span class="text-brand-green">"{{ request('subject') }}"</span>
                            @else
                                All <span class="text-brand-green">Available</span> Tutors
                            @endif
                        </h1>
                        <p class="text-gray-500 text-sm">Showing {{ $tutors->total() }} tutors found</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @forelse($tutors as $tutor)
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="flex gap-4">
                            <div class="w-20 h-20 rounded-2xl bg-brand-lightgreen flex-shrink-0 overflow-hidden relative">
                                <img src="{{ $tutor->getFirstMediaUrl('avatar') }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-tr from-brand-green/20 to-transparent"></div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg group-hover:text-brand-green transition-colors">{{ $tutor->name }}</h3>
                                        <div class="flex items-center gap-1 text-sm font-bold text-amber-400">
                                            <span>★★★★★</span>
                                            <span class="text-gray-400 ml-1">4.9 (42 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="block text-xl font-black text-brand-slate">${{ number_format($tutor->profile->rate_online) }}</span>
                                        <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">per hour</span>
                                    </div>
                                </div>
                                
                                <p class="text-sm text-gray-600 mt-3 line-clamp-2">
                                    {{ $tutor->profile->value_prop }}
                                </p>

                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach(array_slice($tutor->profile->subjects_primary ?? [], 0, 3) as $subject)
                                        <span class="px-2 py-1 bg-brand-lightgreen text-brand-green text-[10px] font-bold rounded uppercase">{{ $subject }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-50 flex items-center justify-between">
                            <span class="text-xs font-bold text-brand-green flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></span>
                                Online & In-Person
                            </span>
                            <a href="{{ route('tutor.profile.public', $tutor->slug) }}" class="px-5 py-2 bg-brand-slate text-white text-sm font-bold rounded-xl hover:bg-brand-red transition-all">
                                View Profile
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                        <p class="text-gray-500 font-bold">No tutors found matching your criteria.</p>
                        <a href="{{ route('search') }}" class="text-brand-green font-bold underline">Clear all filters</a>
                    </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $tutors->links() }}
                </div>
            </div>
        </div>
    </main>

</body>
</html>