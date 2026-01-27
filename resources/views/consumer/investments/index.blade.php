@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-center mb-16">
        <div>
            <h2 class="text-accent text-sm font-bold uppercase tracking-widest mb-2">Portfolio</h2>
            <h1 class="text-5xl font-black">Your Investments</h1>
        </div>
    </div>

    {{-- Category Filters --}}
    <div class="flex gap-3 mb-10 flex-wrap">
        @foreach(['Beats', 'Vocals', 'Loops', 'Bundles', 'Presets', 'Samples'] as $item)
            <button
                class="px-6 py-2.5 rounded-full text-xs font-bold transition
                            {{ $loop->first ? 'bg-[#4D61FF] text-white' : 'bg-[#252525] border border-gray-700 text-gray-400 hover:border-accent hover:text-accent' }}">
                {{ $item }}
            </button>
        @endforeach
    </div>

    {{-- Investment Summary --}}
    <div class="flex justify-between items-center mb-8 pb-4 border-b border-gray-700">
        <div>
            <p class="text-xs text-gray-400 mb-1">Total Investment value</p>
            <p class="text-2xl font-bold">$120.00</p>
        </div>
        <div class="text-right">
            <p class="text-xs text-gray-400 mb-1">Total Earnings</p>
            <p class="text-2xl font-bold">$10.00</p>
        </div>
    </div>

    {{-- Section Title --}}
    <h3 class="text-lg font-semibold mb-4">Investments</h3>

    {{-- Investment Cards --}}
    <div class="space-y-4">
        @for($i = 0; $i < 4; $i++)
            <div class="p-4 rounded-xl bg-[#252525] border border-purple-600/50">
                <h4 class="font-medium text-sm">Summer Vibes - By Luna beats</h4>
                <p class="text-xs text-gray-500 mb-3">Summer Vibes - By Luna beats</p>

                <div class="flex justify-between items-center mb-1">
                    <span class="text-sm text-gray-400">Smart Contract</span>
                    <span class="text-sm"><span class="text-accent">05%</span> Ownership</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-sm">ROI: <span class="text-accent">50%+</span></span>
                    <span class="text-sm">Total Invest: <span class="text-accent">$500</span></span>
                </div>
            </div>
        @endfor
    </div>

@endsection