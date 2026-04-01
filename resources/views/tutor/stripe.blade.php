<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connect Bank | ClassFlow Pro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Instrument Sans', 'sans-serif'] },
                    colors: { brand: { green: '#2F7A4D', red: '#D64545', cream: '#FAF9F6', slate: '#1F1F1F', blurple: '#635BFF' } }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-brand-slate antialiased min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">

    <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-brand-blurple rounded-full blur-[120px] opacity-10 pointer-events-none"></div>

    <div class="w-full max-w-2xl z-10">
        
        <a href="{{ route('tutor.onboarding') }}" class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-brand-slate transition-colors mb-8">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Onboarding
        </a>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
            
            <div class="p-8 md:p-12 text-center border-b border-gray-100 relative">
                <div class="w-20 h-20 mx-auto bg-brand-lightgreen rounded-2xl flex items-center justify-center text-brand-green mb-6 shadow-sm border border-brand-green/20 transform -rotate-3">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h1 class="text-3xl font-extrabold mb-3">Secure your payments</h1>
                <p class="text-gray-500 text-lg max-w-md mx-auto">We partner with Stripe so you can receive your earnings directly to your bank account.</p>
            </div>

            <div class="p-8 md:p-12 bg-gray-50/50">
                <ul class="space-y-6 mb-10">
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-gray-200 flex items-center justify-center flex-shrink-0 text-brand-slate">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Direct & Instant Payouts</h3>
                            <p class="text-gray-600 text-sm">When a parent pays, the funds route directly to you. We never hold your money in an intermediary account.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-gray-200 flex items-center justify-center flex-shrink-0 text-brand-slate">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">The Flat $5 Fee</h3>
                            <p class="text-gray-600 text-sm">Our $5 platform fee is automatically deducted at the moment of transaction. There are no invoices to pay later.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-gray-200 flex items-center justify-center flex-shrink-0 text-brand-slate">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Bank-Level Security</h3>
                            <p class="text-gray-600 text-sm">ClassFlow Pro never sees or stores your Social Security Number or banking details. It is handled entirely by Stripe's encrypted servers.</p>
                        </div>
                    </li>
                </ul>

                <button type="button" onclick="window.location.href='/tutor/onboarding'" class="w-full py-4 bg-brand-blurple text-white font-bold text-lg rounded-xl shadow-lg shadow-brand-blurple/30 hover:bg-opacity-90 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-3">
                    Set up payouts with Stripe
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
                <p class="text-center text-xs text-gray-400 mt-4">You will be securely redirected to Stripe.com to verify your identity.</p>
            </div>
        </div>
    </div>

</body>
</html>