@extends('layouts.app')

@section('content')
    <div class="max-w-[800px] mx-auto space-y-12 pb-20">

        {{-- Header --}}
        <div class="space-y-2 pt-6">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 text-[#4D61FF] hover:text-white transition-colors mb-2 text-sm font-bold uppercase tracking-wider">
                <i class="fas fa-arrow-left"></i> Vault
            </a>
            <h1 class="text-white text-5xl font-black tracking-tight uppercase italic">Modify Protocol</h1>
            <p class="text-gray-500 text-lg">Update the legal parameters for this asset group.</p>
        </div>

        {{-- Edit Form --}}
        <div
            class="bg-[#1A1A1A] rounded-[48px] p-12 border-2 border-white/5 shadow-2xl space-y-10 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-magenta/5 to-transparent"></div>

            <div class="relative z-10 space-y-8">
                <div class="space-y-3">
                    <label class="block text-[10px] font-black uppercase tracking-[0.3em] text-gray-600 ml-4">Agreement
                        Identity</label>
                    <input type="text" value="Standard Artist Service Agreement"
                        class="w-full bg-[#0F0F0F] border-2 border-white/5 rounded-3xl px-8 py-5 text-white placeholder:text-gray-800 font-bold focus:outline-none focus:border-magenta/50 transition-all uppercase tracking-widest text-xs">
                </div>

                <div class="space-y-3">
                    <label class="block text-[10px] font-black uppercase tracking-[0.3em] text-gray-600 ml-4">Rights
                        Provision Clause</label>
                    <textarea rows="6"
                        class="w-full bg-[#0F0F0F] border-2 border-white/5 rounded-[32px] px-8 py-6 text-white placeholder:text-gray-800 font-bold focus:outline-none focus:border-magenta/50 transition-all leading-relaxed text-sm">The Artist hereby grants to the Platform a non-exclusive, worldwide, royalty-bearing license to reproduce, distribute, publicly perform, and digitally transmit the recorded musical compositions and sound recordings.</textarea>
                </div>

                <div class="space-y-3">
                    <label class="block text-[10px] font-black uppercase tracking-[0.3em] text-gray-600 ml-4">Royalty Yield
                        (%)</label>
                    <div class="relative">
                        <input type="number" value="90"
                            class="w-full bg-[#0F0F0F] border-2 border-white/5 rounded-3xl px-8 py-5 text-white placeholder:text-gray-800 font-black focus:outline-none focus:border-magenta/50 transition-all text-2xl italic tracking-tighter">
                        <span class="absolute right-8 top-1/2 -translate-y-1/2 text-magenta font-black text-2xl">%</span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-6">
                    <button onclick="window.history.back()"
                        class="flex-1 py-5 rounded-3xl border-2 border-white/5 text-gray-700 font-black text-[10px] uppercase tracking-widest hover:text-white hover:bg-white/5 transition-all">
                        Discard Changes
                    </button>
                    <button
                        class="flex-1 py-5 rounded-3xl bg-magenta text-white font-black text-[10px] uppercase tracking-widest hover:bg-[#D600D6] transition-all shadow-[0_20px_40px_rgba(214,0,214,0.3)] active:scale-95">
                        Authorize Update
                    </button>
                </div>
            </div>
        </div>

        {{-- Footer Note --}}
        <div class="text-center">
            <p class="text-gray-600 text-[8px] font-black uppercase tracking-[0.4em]">
                All modifications are timestamped and logged in the immutable audit trail.
            </p>
        </div>

    </div>
@endsection