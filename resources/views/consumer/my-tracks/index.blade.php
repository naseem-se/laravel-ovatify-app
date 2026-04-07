@extends('layouts.app')

@section('content')
    <div class="space-y-12 pb-20">
        {{-- Header Section (Figma Flat Match) --}}
        <div class="space-y-0">
            <h1 class="text-magenta text-[32px] font-black uppercase tracking-tight leading-none">EXPLORE</h1>
            <h2 class="text-white text-[64px] font-black tracking-tighter leading-tight mt-1">Your Tracks</h2>
        </div>

        {{-- Tab Navigation (Figma Flat Match) --}}
        <div class="flex gap-12 border-b border-white/5 pb-0">
            <button
                class="pb-5 text-[18px] font-black uppercase tracking-widest transition-all text-white border-b-4 border-magenta">
                My Published Tracks
            </button>
            <button
                class="pb-5 text-[18px] font-black uppercase tracking-widest transition-all text-white/20 border-b-4 border-transparent hover:text-white/40">
                My Creations with AI
            </button>
        </div>

        {{-- Tracks List (Figma Flat Match) --}}
        <div class="space-y-6">
            @for ($i = 0; $i < 3; $i++)
                <div
                    class="bg-[#141414] border border-white/5 rounded-[32px] p-4 flex items-center gap-6 hover:bg-[#1A1A1A] transition-all group cursor-pointer">
                    {{-- Track Art --}}
                    <div class="relative w-32 h-32 rounded-[24px] overflow-hidden flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover opacity-60" alt="Cover">
                        <div class="absolute bottom-3 right-3">
                            <div class="w-8 h-8 bg-magenta rounded-full flex items-center justify-center text-white shadow-lg">
                                <i class="fas fa-play text-[8px] ml-0.5"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Track Info --}}
                    <div class="flex-1 space-y-1">
                        <h4 class="text-white text-[18px] font-black leading-tight">Family memories</h4>
                        <p class="text-white/20 text-[11px] font-bold uppercase tracking-widest leading-none">Pop R&B | Warm
                            happy</p>
                        <div class="pt-3">
                            <span
                                class="text-magenta text-[10px] font-black uppercase tracking-widest px-3 py-1 bg-magenta/10 rounded-lg border border-magenta/20">Draft</span>
                        </div>
                    </div>

                    {{-- Waveform Visualizer (Standardized) --}}
                    <div class="hidden md:flex flex-1 justify-end pr-10">
                        <div class="flex items-end gap-[3px] h-10 opacity-20 w-48">
                            @for($j = 0; $j < 30; $j++)
                                <div class="w-[2px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        {{-- Bottom Action (Figma Match) --}}
        <div class="pt-6">
            <button
                class="w-full py-5 bg-transparent border border-white/10 text-white/60 font-black text-[16px] uppercase tracking-widest rounded-2xl hover:bg-white/5 transition-all outline-none">
                List your track on QmeMarketplace
            </button>
        </div>
    </div>

    </div>
@endsection