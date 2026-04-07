@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Section (Figma Match for Audio) --}}
        <div class="flex flex-col md:flex-row gap-12 items-start mb-16 pt-4">
            {{-- Image Thumbnail --}}
            <div
                class="w-full md:w-[400px] aspect-square rounded-[32px] overflow-hidden shadow-2xl border border-white/5 relative group">
                <img src="{{ asset('images/login.png') }}"
                    class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 flex items-center justify-center">
                    <button
                        class="w-20 h-20 bg-magenta rounded-full flex items-center justify-center text-white shadow-3xl hover:scale-110 transition-transform">
                        <i class="fas fa-play text-2xl ml-1"></i>
                    </button>
                </div>
            </div>

            <div class="flex-1 space-y-10">
                <div class="space-y-4">
                    <h1 class="text-white text-[56px] font-black tracking-tighter leading-tight">Summer Vibes</h1>
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Luna+Beats&background=4D61FF&color=fff"
                            class="w-14 h-14 rounded-full border-2 border-white/10">
                        <div>
                            <p class="text-white text-[20px] font-bold">Luna Beats</p>
                            <a href="#"
                                class="text-white/30 text-[14px] font-medium hover:text-[#4D61FF] transition-colors">View
                                Artist Profile</a>
                        </div>
                    </div>
                </div>

                {{-- Waveform (Figma Match) --}}
                <div class="space-y-4">
                    <div class="flex items-end gap-[4px] h-16 opacity-60">
                        @for($i = 0; $i < 60; $i++)
                            <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                        @endfor
                    </div>
                    <div class="flex justify-between text-white/30 font-bold text-[14px] tracking-widest">
                        <span>00:00</span>
                        <span>03:45</span>
                    </div>
                </div>

                {{-- Metadata Grid (Figma Match for Audio) --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 border-t border-white/5 pt-8">
                    <div class="space-y-2">
                        <span
                            class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Genre</span>
                        <p class="text-white text-[18px] font-bold">R&B | Soul</p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">BPM</span>
                        <p class="text-white text-[18px] font-bold">95</p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Key</span>
                        <p class="text-white text-[18px] font-bold">C Minor</p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Vibe</span>
                        <p class="text-white text-[18px] font-bold">Melancholic</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Investment Control (Figma Style) --}}
        <div class="bg-[#141414] rounded-[48px] border border-white/5 p-12 space-y-12 shadow-3xl">
            <div class="flex justify-between items-center border-b border-white/5 pb-8">
                <h3 class="text-white text-[32px] font-black tracking-tighter">Invest in Blocks</h3>
                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Available Blocks</p>
                        <p class="text-white text-[18px] font-bold">75 / 100</p>
                    </div>
                    <div class="w-px h-10 bg-white/5 mx-2"></div>
                    <div class="text-right">
                        <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Price per Block</p>
                        <p class="text-magenta text-[20px] font-black">$120</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <p class="text-white/40 font-bold text-[16px] leading-relaxed">
                        Select the number of blocks you wish to invest in. Each block represents a 0.5% ownership stake in
                        the master rights of this track.
                    </p>

                    <div class="flex items-center gap-8 bg-white/5 rounded-[32px] p-6 border border-white/10 w-fit">
                        <button
                            class="w-14 h-14 rounded-2xl bg-[#1A1A1A] text-white/40 flex items-center justify-center border border-white/5 hover:bg-white/10 hover:text-white transition-all">
                            <i class="fas fa-minus text-base"></i>
                        </button>
                        <span class="text-white font-black text-[42px] min-w-[80px] text-center tracking-tighter">01</span>
                        <button
                            class="w-14 h-14 rounded-2xl bg-[#4D61FF] text-white flex items-center justify-center hover:bg-[#3D51EF] transition-all shadow-xl shadow-[#4D61FF]/20 active:scale-95">
                            <i class="fas fa-plus text-base"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white/5 rounded-[32px] p-8 border border-white/10 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-white/40 font-bold uppercase tracking-widest text-[13px]">Total
                                Ownership</span>
                            <span class="text-white font-black text-[20px]">0.5%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-white/40 font-bold uppercase tracking-widest text-[13px]">Total
                                Investment</span>
                            <span class="text-magenta font-black text-[28px]">$120</span>
                        </div>
                    </div>
                    <button onclick="window.location.href='{{ route('consumer.investments.checkout') }}'"
                        class="w-full py-6 bg-magenta text-white font-black text-[20px] uppercase tracking-widest rounded-2xl shadow-xl shadow-magenta/20 hover:bg-magenta/90 transition-all active:scale-[0.99]">
                        Invest Now
                    </button>
                </div>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="pt-12">
            <a href="{{ route('consumer.dashboard.index') }}"
                class="flex items-center gap-3 text-white/40 hover:text-white transition-all font-bold group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                <span>Back to Dashboard</span>
            </a>
        </div>

    </div>
@endsection