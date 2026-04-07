@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto space-y-12 pb-20">

        {{-- Header & Back --}}
        <div class="flex items-center justify-between pt-6">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 text-[#4D61FF] hover:text-white transition-colors text-sm font-bold uppercase tracking-wider">
                <i class="fas fa-arrow-left"></i> Portfolio Hub
            </a>
            <h1 class="text-white text-4xl font-black tracking-tighter uppercase italic">My Holdings</h1>
        </div>

        {{-- Stats Row --}}
        <div class="grid grid-cols-2 gap-8 px-4">
            <div>
                <p class="text-gray-600 font-black text-[10px] uppercase tracking-[0.3em] mb-1">Active Exposure</p>
                <p class="text-white text-4xl font-black italic">$1,240.00</p>
            </div>
            <div class="text-right">
                <p class="text-gray-600 font-black text-[10px] uppercase tracking-[0.3em] mb-1">Total Yield</p>
                <p class="text-magenta text-4xl font-black italic">$10.00</p>
            </div>
        </div>

        {{-- Investments List --}}
        <div class="space-y-6">
            <h3 class="text-white text-[10px] font-black uppercase tracking-[0.4em] mb-6">Asset Inventory</h3>

            <div class="space-y-4">
                @foreach(range(1, 4) as $i)
                    <div onclick="window.location.href='{{ route('consumer.investments.track.details') }}'"
                        class="bg-[#1A1A1A] border-2 border-white/5 hover:border-[#4D61FF]/30 rounded-[40px] p-8 cursor-pointer transition-all group relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-[#4D61FF]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>

                        <div class="relative z-10 flex justify-between items-center">
                            <div class="space-y-2">
                                <h3
                                    class="text-white font-black text-xl uppercase italic tracking-tight mb-1 group-hover:text-[#4D61FF] transition-colors">
                                    Summer Vibes</h3>
                                <p class="text-gray-500 text-[9px] font-bold uppercase tracking-widest">Master Protocol • Luna
                                    Beats</p>

                                <div class="flex gap-3 pt-4">
                                    <div
                                        class="px-4 py-2 bg-white/5 rounded-full border border-white/10 uppercase tracking-widest text-[8px] font-black text-gray-400">
                                        ROI: <span class="text-magenta">50%+</span>
                                    </div>
                                    <div
                                        class="px-4 py-2 bg-white/5 rounded-full border border-white/10 uppercase tracking-widest text-[8px] font-black text-gray-400">
                                        Ownership: <span class="text-white">05%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <p class="text-gray-600 text-[8px] font-black uppercase tracking-widest mb-1">Capital Invested
                                </p>
                                <p
                                    class="text-white text-2xl font-black italic tracking-tighter group-hover:text-magenta transition-colors">
                                    $500</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection