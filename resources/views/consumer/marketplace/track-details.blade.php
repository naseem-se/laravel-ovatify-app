@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ tab: 'standard' }">

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
                    <h1 class="text-white text-[56px] font-black tracking-tighter leading-tight">Cloudside</h1>
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Luna+Beats&background=FF00FF&color=fff"
                            class="w-14 h-14 rounded-full border-2 border-white/10">
                        <div>
                            <p class="text-white text-[20px] font-bold">Luna Beats</p>
                            <a href="#"
                                class="text-white/30 text-[14px] font-medium hover:text-magenta transition-colors">View
                                Artist Profile</a>
                        </div>
                    </div>
                </div>

                {{-- Waveform (Figma Match) --}}
                <div class="space-y-4">
                    <div class="flex items-end gap-[4px] h-16 opacity-60">
                        @for($i = 0; $i < 60; $i++)
                            <div class="w-[3px] bg-magenta rounded-full" style="height: {{ rand(20, 100) }}%"></div>
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
                        <span class="text-magenta text-[12px] font-black uppercase tracking-widest opacity-60">Genre</span>
                        <p class="text-white text-[18px] font-bold">R&B | Soul</p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-magenta text-[12px] font-black uppercase tracking-widest opacity-60">BPM</span>
                        <p class="text-white text-[18px] font-bold">95</p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-magenta text-[12px] font-black uppercase tracking-widest opacity-60">Key</span>
                        <p class="text-white text-[18px] font-bold">C Minor</p>
                    </div>
                    <div class="space-y-2">
                        <span class="text-magenta text-[12px] font-black uppercase tracking-widest opacity-60">Vibe</span>
                        <p class="text-white text-[18px] font-bold">Melancholic</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- License & Pricing (Figma Match) --}}
        <div class="bg-[#141414] rounded-[40px] border border-white/5 p-12 space-y-12 shadow-3xl">
            <div class="flex justify-between items-center border-b border-white/5 pb-8">
                <h3 class="text-white text-[32px] font-black tracking-tighter">License & Pricing</h3>
                <div class="flex gap-16 pr-4">
                    <button @click="tab = 'standard'"
                        :class="tab === 'standard' ? 'text-white border-b-2 border-magenta' : 'text-white/30 border-b-2 border-transparent'"
                        class="pb-4 text-[18px] font-bold transition-all uppercase tracking-widest">Standard</button>
                    <button @click="tab = 'extended'"
                        :class="tab === 'extended' ? 'text-white border-b-2 border-magenta' : 'text-white/30 border-b-2 border-transparent'"
                        class="pb-4 text-[18px] font-bold transition-all uppercase tracking-widest">Extended</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- License List --}}
                <div class="space-y-8">
                    <div class="bg-white/5 rounded-[32px] p-8 border border-white/10">
                        <div class="flex justify-between items-center mb-8">
                            <h4 class="text-white text-[24px] font-black uppercase tracking-tight">Standard License</h4>
                            <span class="text-magenta text-[28px] font-black tracking-tight">$19</span>
                        </div>
                        <ul class="space-y-5">
                            <li class="flex items-center gap-4 text-white/60 font-bold text-[16px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> Digital Streaming (Spotify, Apple
                                Music)
                            </li>
                            <li class="flex items-center gap-4 text-white/60 font-bold text-[16px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> YouTube Monetization
                            </li>
                            <li class="flex items-center gap-4 text-white/60 font-bold text-[16px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> Up to 500k Streams
                            </li>
                        </ul>
                    </div>
                    <button onclick="window.location.href='{{ route('consumer.marketplace.checkout') }}'"
                        class="w-full py-6 bg-magenta text-white font-black text-[20px] uppercase tracking-widest rounded-2xl shadow-xl shadow-magenta/10 hover:bg-magenta/90 transition-all active:scale-[0.99]">
                        License Track
                    </button>
                </div>

                {{-- FAQ/Legal Note (Figma Style) --}}
                <div class="space-y-6 pt-2">
                    <h4 class="text-white font-black text-[18px] uppercase tracking-widest opacity-60">Legal Information
                    </h4>
                    <p class="text-white/30 text-[15px] leading-relaxed font-bold">
                        By licensing this track, you agree to the terms of the Ovatifiy Licensing Agreement.
                        Ownership of the master remains with the creator, while you are granted use rights based on the
                        selected license tier.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <span
                            class="px-6 py-2 bg-white/5 border border-white/10 rounded-full text-white/40 text-[12px] font-bold uppercase tracking-widest">Royalty-Free</span>
                        <span
                            class="px-6 py-2 bg-white/5 border border-white/10 rounded-full text-white/40 text-[12px] font-bold uppercase tracking-widest">Master
                            Rights</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="pt-12">
            <a href="{{ route('consumer.marketplace.index') }}"
                class="flex items-center gap-3 text-white/40 hover:text-white transition-all font-bold group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                <span>Back to Marketplace</span>
            </a>
        </div>

    </div>
@endsection