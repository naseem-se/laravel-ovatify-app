@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-accent text-2xl font-semibold">Hey!</h2>
        <h1 class="text-3xl font-bold">Explore content</h1>
    </div>

    <a class="text-accent text-sm font-medium hover:underline">
        Become a creator
    </a>
</div>

{{-- Search --}}
<div class="mb-6" >
    <input
        type="text"
        placeholder="Search song"
        style="background: #252525"
        class="w-full bg-card  rounded-lg px-5 py-3 text-sm placeholder:text-textMuted focus:outline-none"
    >
</div>

{{-- Filters --}}
<div class="flex gap-3 mb-8">
    @foreach(['Beats','Vocals','Loops','Bundles','Bundles','Bundles','Bundles'] as $item)
        <button class="px-4 py-1 rounded-full border border-accent text-accent text-xs hover:bg-accent hover:text-white transition">
            {{ $item }}
        </button>
    @endforeach
</div>

{{-- Featured Drops --}}
<h3 class="text-lg font-semibold mb-4">Featured Drops</h3>

<div class="grid grid-cols-4 gap-6 mb-10">
    @for($i=0;$i<4;$i++)
        <div class="bg-card rounded-xl p-4">
            <div class="h-36 rounded-lg bg-gradient-to-br from-purple-500 to-pink-500 mb-4"></div>
            <h4 class="font-medium">Cloudside</h4>
            <p class="text-xs text-textMuted">Luna Beats</p>
            <span class="text-sm font-semibold mt-2 inline-block">$19</span>
        </div>
    @endfor
</div>

{{-- Invest in music --}}
<h3 class="text-lg font-semibold mb-4">Invest in music</h3>

<div class="grid grid-cols-2 gap-6">
    @for($i=0;$i<2;$i++)
        <div class="bg-card rounded-xl p-5 flex gap-4 items-center">
            <div class="w-20 h-20 rounded-lg bg-gradient-to-br from-purple-500 to-pink-500"></div>

            <div class="flex-1">
                <h4 class="font-medium">Family memories</h4>
                <p class="text-xs text-textMuted">100 Blocks · 75 Available</p>

                <div class="flex items-center gap-2 mt-2">
                    <span class="text-xs bg-green-500/20 text-green-400 px-2 py-0.5 rounded-full">
                        ROI 12%
                    </span>
                    <span class="text-xs text-textMuted">Kassandra Cabrera</span>
                </div>
            </div>
        </div>
    @endfor
</div>

@endsection
