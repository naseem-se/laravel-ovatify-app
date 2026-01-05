@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-accent text-2xl font-semibold">Explore</h2>
        <h1 class="text-3xl font-bold">Your Investments</h1>
    </div>
</div>


{{-- Filters --}}
<div class="flex gap-3 mb-8">
    @foreach(['Beats','Vocals','Loops','Bundles','Bundles','Bundles','Bundles'] as $item)
        <button class="px-4 py-1 rounded-full border border-accent text-accent text-xs hover:bg-accent hover:text-white transition">
            {{ $item }}
        </button>
    @endforeach
</div>

<div class="flex justify-between gap-4 mt-2">
    <p class="text-sm text-gray-400">Total Investment value</p>
    <p class="text-sm text-gray-400">Total Earnings</p>
</div>
<div class="flex justify-between gap-4 mb-10 mt-1 border-b border-gray-700 pb-2">
    <p class="text-lg">$120.00</p>
    <p class="text-lg">$10.00</p>
</div>

<div class="grid grid-cols-1 gap-6 mb-10">
    @for($i=0;$i<8;$i++)
        <div class="bg-card rounded-xl p-4 border border-purple-600">
            <h4 class="font-medium mt-2">Summer Vibes - By Luna beats</h4>
            <p class="text-xs text-gray-400">Summer Vibes - By Luna beats</p>
            <div class="flex justify-between gap-4 mt-2">
                <p class="text-sm">Smart Contract</p>
                <p class="text-sm"><span class="text-accent">05%</span> Ownership</p>
            </div>
            <div class="flex justify-between gap-4">
                <p class="text-sm">ROI: <span class="text-accent">50%+</span></p>
                <p class="text-sm">Total invest: <span class="text-accent">$500</span></p>
            </div>
        </div>
    @endfor
</div>


@endsection
