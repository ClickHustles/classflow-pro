<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutor Onboarding | ClassFlow Pro</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
                    colors: { brand: { green: '#2F7A4D', red: '#D64545', slate: '#1F1F1F', lightgreen: '#EAF2ED' } }
                }
            }
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-gray-50 text-brand-slate antialiased min-h-screen">

    <div class="max-w-4xl mx-auto px-6 py-12" x-data="{ step: 1 }" x-cloak>
        
        <div class="mb-12">
            <div class="flex justify-between mb-2">
                <span class="text-sm font-bold text-brand-green" x-text="'Step ' + step + ' of 5'"></span>
                <span class="text-sm font-medium text-gray-400" x-text="Math.round((step/5)*100) + '% Complete'"></span>
            </div>
            <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                <div class="bg-brand-green h-full transition-all duration-500" :style="'width: ' + (step/5)*100 + '%'"></div>
            </div>
        </div>

        <form action="{{ route('tutor.onboarding.save') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div x-show="step === 1" class="space-y-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-extrabold mb-2">Let's build your Hero Section</h2>
                    <p class="text-gray-500 mb-8">This is the first thing parents see. Make it count.</p>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold mb-2">Profile Photo</label>
                            <input type="file" name="avatar" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-lightgreen file:text-brand-green hover:file:bg-green-100">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold mb-2">Professional Role</label>
                                <input type="text" name="role_title" value="{{ $profile->role_title }}" placeholder="e.g. Algebra Specialist" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Years of Experience</label>
                                <select name="years_experience" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 outline-none">
                                    @foreach([1,2,3,4,'5+','10+'] as $yr)
                                        <option value="{{ $yr }}" {{ $profile->years_experience == $yr ? 'selected' : '' }}>{{ $yr }} years</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold mb-2">Value Proposition (Max 120 chars)</label>
                            <textarea name="value_prop" maxlength="120" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green outline-none">{{ $profile->value_prop }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="step === 2" class="space-y-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100" x-data="{ 
                    bioText: @json($profile->bio_pro ?? ''),
                    isGenerating: false,
                    generate() {
                        this.isGenerating = true;
                        this.bioText = 'Drafting your elite tutor bio...';
                        setTimeout(() => { 
                            this.bioText = 'I specialize in helping students overcome academic anxiety through a Socratic approach. By breaking complex concepts into relatable chunks, I ensure my students build confidence alongside their grades.';
                            this.isGenerating = false;
                        }, 1500);
                    }
                }">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-extrabold">About the Tutor</h2>
                        <button type="button" @click="generate()" class="text-xs font-bold bg-brand-lightgreen text-brand-green px-4 py-2 rounded-full hover:bg-brand-green hover:text-white transition-all">✨ AI Writer</button>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold mb-2">Professional Bio</label>
                            <textarea name="bio_pro" x-model="bioText" rows="6" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green outline-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Teaching Philosophy</label>
                            <textarea name="philosophy" rows="3" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-brand-green outline-none">{{ $profile->philosophy }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="step === 3" class="space-y-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-extrabold mb-8">Subjects & Skills</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold mb-4 text-brand-green">Primary Subjects</label>
                            @foreach(['Math', 'English', 'Science', 'SAT Prep'] as $sub)
                                <label class="flex items-center gap-3 mb-3 cursor-pointer">
                                    <input type="checkbox" name="subjects_primary[]" value="{{ $sub }}" class="w-5 h-5 rounded border-gray-300 text-brand-green focus:ring-brand-green">
                                    <span class="text-sm font-medium">{{ $sub }}</span>
                                </label>
                            @endforeach
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-4 text-brand-red">Academic Skills</label>
                            @foreach(['Study Skills', 'Time Management', 'Organization'] as $skill)
                                <label class="flex items-center gap-3 mb-3 cursor-pointer">
                                    <input type="checkbox" name="academic_skills[]" value="{{ $skill }}" class="w-5 h-5 rounded border-gray-300 text-brand-red focus:ring-brand-red">
                                    <span class="text-sm font-medium">{{ $skill }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="step === 4" class="space-y-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-extrabold mb-8">Rates & Location</h2>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-bold mb-2">Hourly Rate (Online)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">$</span>
                                <input type="number" name="rate_online" value="{{ $profile->rate_online }}" class="w-full pl-8 pr-4 py-3 bg-gray-50 rounded-xl border border-gray-200 outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Primary City</label>
                            <input type="text" name="primary_city" value="{{ $profile->primary_city }}" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2">Zip Codes Served (Comma separated)</label>
                        <input type="text" name="zip_codes[]" value="{{ is_array($profile->zip_codes) ? implode(',', $profile->zip_codes) : '' }}" placeholder="47905, 47901" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 outline-none">
                    </div>
                </div>
            </div>

            <div x-show="step === 5" class="text-center space-y-8 py-12">
                <div class="w-24 h-24 bg-brand-lightgreen rounded-full flex items-center justify-center mx-auto mb-6 text-brand-green">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-4xl font-extrabold">Ready to Launch?</h2>
                <p class="text-gray-500 max-w-md mx-auto">Click below to publish your profile to the ClassFlow Pro directory. You can edit this anytime from your dashboard.</p>
                <input type="hidden" name="complete_onboarding" value="1">
            </div>

            <div class="mt-12 flex justify-between">
                <button type="button" x-show="step > 1" @click="step--" class="px-8 py-4 bg-white border border-gray-200 text-brand-slate font-bold rounded-2xl hover:bg-gray-50 transition-all">Previous</button>
                <div class="flex-1"></div>
                <button type="button" x-show="step < 5" @click="step++" class="px-8 py-4 bg-brand-slate text-white font-bold rounded-2xl hover:bg-black transition-all">Next Step</button>
                <button type="submit" x-show="step === 5" class="px-12 py-4 bg-brand-green text-white font-bold rounded-2xl shadow-xl shadow-brand-green/20 hover:scale-105 transition-all">Publish Profile 🚀</button>
            </div>
        </form>
    </div>

</body>
</html>