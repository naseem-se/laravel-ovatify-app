@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8 pb-4 border-b border-gray-700">
        <div>
            <h2 class="text-accent text-sm font-bold uppercase tracking-widest mb-1">Legal Document</h2>
            <h1 class="text-3xl font-black">Standard Artist Agreement</h1>
        </div>
        <button
            class="flex items-center gap-2 px-6 py-3 rounded-xl bg-[#252525] border border-gray-700 hover:border-accent/40 transition">
            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            <span class="text-sm font-bold">Download PDF</span>
        </button>
    </div>

    {{-- Agreement Content --}}
    <div class="max-w-4xl mx-auto bg-white text-gray-900 rounded-3xl p-16 shadow-2xl space-y-12 font-serif leading-relaxed">
        <div class="text-center space-y-4">
            <h2 class="text-2xl font-black uppercase tracking-widest border-b-2 border-gray-900 pb-4 inline-block">Artist
                Service Agreement</h2>
            <p class="text-sm italic">Effective Date: January 18, 2026</p>
        </div>

        <div class="space-y-8 text-sm">
            <section>
                <h3 class="font-black uppercase mb-4 text-xs tracking-wider">1. Grant of Rights</h3>
                <p>
                    The Artist hereby grants to the Platform a non-exclusive, worldwide, royalty-bearing license to
                    reproduce, distribute, publicly perform, and digitally transmit the recorded musical compositions and
                    sound recordings (the "Tracks") for the purposes of marketplace listing and consumer investment.
                </p>
            </section>

            <section>
                <h3 class="font-black uppercase mb-4 text-xs tracking-wider">2. Compensation & Royalties</h3>
                <p>
                    The Artist shall receive 90% of all primary license sales on the Marketplace. For investment-based
                    revenue, royalties shall be distributed according to the Ownership Distribution chart approved in the
                    Rights Management Dashboard.
                </p>
            </section>

            <section>
                <h3 class="font-black uppercase mb-4 text-xs tracking-wider">3. Representations & Warranties</h3>
                <p>
                    The Artist represents and warrants that they are the sole owner of all rights in the Tracks and that the
                    Tracks do not infringe upon the intellectual property rights of any third party.
                </p>
            </section>

            <section>
                <h3 class="font-black uppercase mb-4 text-xs tracking-wider">4. Termination</h3>
                <p>
                    This agreement may be terminated by either party upon thirty (30) days written notice. In the event of
                    termination, existing investment obligations and license rights granted to prior purchasers shall remain
                    in full force and effect.
                </p>
            </section>
        </div>

        <div class="pt-16 border-t border-gray-200 grid grid-cols-2 gap-20">
            <div>
                <div class="h-24 border-b border-gray-900 mb-4 flex items-end">
                    <span class="text-2xl font-bold font-sans italic text-accent opacity-60">Luna Beats</span>
                </div>
                <p class="text-[10px] font-bold uppercase tracking-widest">Artist Signature</p>
            </div>
            <div>
                <div class="h-24 border-b border-gray-900 mb-4 flex items-end">
                    <span class="text-2xl font-bold font-sans tracking-tighter">Ovatify Platform</span>
                </div>
                <p class="text-[10px] font-bold uppercase tracking-widest">Platform Representative</p>
            </div>
        </div>
    </div>

    {{-- Confirm Action --}}
    <div class="mt-12 flex justify-center gap-4">
        <button class="px-10 py-4 rounded-xl bg-accent text-white font-bold text-sm hover:scale-105 transition shadow-lg">
            Accept Agreement
        </button>
        <button
            class="px-10 py-4 rounded-xl bg-[#252525] border border-gray-700 text-white font-bold text-sm hover:bg-[#333] transition">
            Edit Terms
        </button>
    </div>

@endsection