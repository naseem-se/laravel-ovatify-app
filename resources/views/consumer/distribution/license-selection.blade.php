@extends('layouts.app')

@section('content')
    <div class="max-w-[1100px] mx-auto space-y-12 pb-20">

        {{-- Header --}}
        <div class="space-y-2 pt-6">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 text-[#4D61FF] hover:text-white transition-colors mb-2 text-sm font-bold uppercase tracking-wider">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <h1 class="text-white text-5xl font-black tracking-tight uppercase italic">Select Terms</h1>
            <p class="text-gray-500 text-lg">Choose the licensing Tier for your masterpiece.</p>
        </div>

        {{-- License Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-4">

            {{-- Basic License --}}
            <div
                class="bg-[#1A1A1A] rounded-[48px] p-10 border-2 border-white/5 hover:border-white/10 transition-all group relative overflow-hidden flex flex-col justify-between">
                <div class="space-y-8">
                    <div
                        class="w-16 h-16 rounded-2xl bg-[#0F0F0F] border border-white/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-file-invoice text-gray-500 text-2xl group-hover:text-white transition-colors"></i>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-white text-2xl font-black tracking-tight">Standard</h3>
                        <p class="text-4xl font-black text-[#4D61FF] italic">$29<span
                                class="text-sm opacity-50 ml-1">.99</span></p>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-500 font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-check text-[#4D61FF]"></i> MP3/WAV Master
                        </li>
                        <li class="flex items-center gap-3 text-gray-500 font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-check text-[#4D61FF]"></i> 10k Streams
                        </li>
                        <li
                            class="flex items-center gap-3 text-gray-400 font-bold text-xs uppercase tracking-widest opacity-30">
                            <i class="fas fa-times"></i> Track Stems
                        </li>
                    </ul>
                </div>
                <div class="pt-10">
                    <button
                        class="w-full py-4 rounded-3xl border-2 border-white/10 text-white font-black text-[10px] uppercase tracking-[0.2em] hover:bg-white hover:text-black transition-all">
                        Assign Standard
                    </button>
                </div>
            </div>

            {{-- Premium License --}}
            <div
                class="bg-[#1A1A1A] rounded-[48px] p-10 border-2 border-[#4D61FF] transform scale-105 shadow-[0_40px_80px_rgba(77,97,255,0.2)] relative overflow-hidden flex flex-col justify-between z-10 group">
                <div
                    class="absolute top-0 right-0 bg-[#4D61FF] text-white text-[10px] font-black px-6 py-2 rounded-bl-[24px] uppercase tracking-widest">
                    Recommended</div>

                <div class="space-y-8">
                    <div
                        class="w-16 h-16 rounded-2xl bg-[#0F0F0F] border border-[#4D61FF]/30 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-star text-[#4D61FF] text-2xl group-hover:text-white transition-colors"></i>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-white text-2xl font-black tracking-tight">Pro License</h3>
                        <p class="text-4xl font-black text-magenta italic">$89<span
                                class="text-sm opacity-50 ml-1">.99</span></p>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-white font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-check-double text-magenta"></i> All Audio Formats
                        </li>
                        <li class="flex items-center gap-3 text-white font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-check-double text-magenta"></i> 100k Streams
                        </li>
                        <li class="flex items-center gap-3 text-white font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-check-double text-magenta"></i> Includes Stems
                        </li>
                    </ul>
                </div>
                <div class="pt-10">
                    <button
                        class="w-full py-5 rounded-3xl bg-[#4D61FF] text-white font-black text-[10px] uppercase tracking-[0.2em] hover:bg-[#3D51EF] transition-all shadow-xl active:scale-95">
                        Assign Pro Tier
                    </button>
                </div>
            </div>

            {{-- Unlimited License --}}
            <div
                class="bg-[#1A1A1A] rounded-[48px] p-10 border-2 border-white/5 hover:border-white/10 transition-all group relative overflow-hidden flex flex-col justify-between">
                <div class="space-y-8">
                    <div
                        class="w-16 h-16 rounded-2xl bg-[#0F0F0F] border border-white/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-crown text-yellow-500 text-2xl group-hover:text-white transition-colors"></i>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-white text-2xl font-black tracking-tight">Full Buyout</h3>
                        <p class="text-4xl font-black text-white italic">$249<span
                                class="text-sm opacity-50 ml-1">.00</span></p>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-500 font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-infinity text-yellow-500"></i> Unlimited Streams
                        </li>
                        <li class="flex items-center gap-3 text-gray-500 font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-infinity text-yellow-500"></i> Full Ownership
                        </li>
                        <li class="flex items-center gap-3 text-gray-500 font-bold text-xs uppercase tracking-widest">
                            <i class="fas fa-infinity text-yellow-500"></i> Commercial Rights
                        </li>
                    </ul>
                </div>
                <div class="pt-10">
                    <button
                        class="w-full py-4 rounded-3xl border-2 border-white/10 text-white font-black text-[10px] uppercase tracking-[0.2em] hover:bg-white hover:text-black transition-all">
                        Assign Unlimited
                    </button>
                </div>
            </div>

        </div>

        {{-- Help Note --}}
        <div class="pt-10 text-center">
            <p class="text-gray-600 text-[10px] font-black uppercase tracking-[0.3em] leading-relaxed">
                Need a custom contract? <a href="#" class="text-[#4D61FF] hover:text-white transition-colors">Contact Legal
                    Support</a>
            </p>
        </div>

    </div>
@endsection