@extends('layouts.app')

@section('content')
    <div class="space-y-12">

        {{-- Header Section --}}
        <div class="space-y-1">
            <h1 class="text-magenta text-[24px] font-black tracking-tight leading-none uppercase">Explore</h1>
            <h2 class="text-white text-[64px] font-black tracking-tighter leading-tight mt-1">Your Investments</h2>
        </div>

        {{-- Filter Chips --}}
        <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-none">
            @php
                $categories = [['name' => 'Beats', 'active' => true], ['name' => 'Vocals', 'active' => false], ['name' => 'Loops', 'active' => false], ['name' => 'Bundles', 'active' => false], ['name' => 'Bundles', 'active' => false]];
            @endphp
            @foreach ($categories as $cat)
                <button
                    class="px-8 py-3 rounded-full text-[13px] font-black transition-all border {{ $cat['active'] ? 'bg-[#4D61FF] border-[#4D61FF] text-white shadow-xl shadow-blue-500/20' : 'bg-transparent border-white/10 text-white/40 hover:border-white/20' }}">
                    {{ $cat['name'] }}
                </button>
            @endforeach
        </div>

        {{-- Stats High-Fidelity --}}
        <div
            class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 py-4 border-b border-white/5 pb-8">
            <div class="space-y-2">
                <p class="text-white/40 text-[14px] font-bold uppercase tracking-widest">Total Investment value</p>
                <p class="text-white text-[42px] font-black tracking-tight leading-none">$120.00</p>
            </div>
            <div class="text-right space-y-2">
                <p class="text-white/40 text-[14px] font-bold uppercase tracking-widest">Total Earnings</p>
                <p class="text-white text-[42px] font-black tracking-tight leading-none">$10.00</p>
            </div>
        </div>

        {{-- Investments List --}}
        <div class="space-y-8">
            <h3 class="text-white text-[24px] font-black tracking-tighter">Investments</h3>

            <div class="space-y-6">
                @for ($i = 0; $i < 3; $i++)
                    <div
                        class="bg-[#1A1B23] border border-[#4D61FF]/30 rounded-[28px] p-8 hover:bg-[#1E1F29] transition-all cursor-pointer group">
                        <div class="flex flex-col md:flex-row justify-between gap-8">
                            <div class="space-y-6">
                                <div class="space-y-1">
                                    <h4 class="text-white text-[20px] font-black leading-tight">Summer Vibes - By Luna beats
                                    </h4>
                                    <p class="text-white/20 text-[12px] font-bold uppercase tracking-widest">Summer Vibes - By
                                        Luna beats</p>
                                </div>

                                <div class="space-y-1">
                                    <p class="text-white/40 text-[11px] font-bold uppercase tracking-widest">Smart Contract</p>
                                    <p class="text-magenta text-[16px] font-black">ROI: 50%+</p>
                                </div>
                            </div>

                            <div class="flex flex-col justify-between items-end">
                                <div class="text-right">
                                    <p class="text-magenta text-[16px] font-black tracking-tight">05% <span
                                            class="text-white/40 text-[13px] font-bold ml-1 uppercase">Ownership</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-white/40 text-[13px] font-bold uppercase">Total Invest: <span
                                            class="text-magenta font-black ml-1">$500</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Empty State Placeholder --}}
        <div class="pt-8 pb-12">
            <div class="bg-[#141414] border border-white/5 rounded-[32px] p-12 text-center">
                <p class="text-white/10 font-bold italic">No more investments to show.</p>
            </div>
        </div>

    </div>
@endsection