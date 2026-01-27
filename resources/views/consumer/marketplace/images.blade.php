@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-accent text-xl font-medium">Explore</h2>
            <h1 class="text-3xl font-bold">Your Marketplace</h1>
        </div>
    </div>

    {{-- Search --}}
    <div class="mb-6">
        <div class="relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" placeholder="Search images"
                class="w-full bg-[#252525] rounded-lg pl-12 pr-5 py-3 text-sm placeholder:text-gray-500 focus:outline-none focus:ring-1 focus:ring-accent">
        </div>
    </div>

    {{-- Tabs --}}
    <div class="grid grid-cols-2 mb-8 border-b border-gray-700">
        <a href="{{ route('consumer.marketplace.index') }}"
            class="p-4 flex justify-center items-center gap-2 text-sm transition border-b-2 cursor-pointer
                {{ Request::routeIs('consumer.marketplace.index') ? 'border-purple-500 bg-purple-500/10 text-white' : 'border-transparent text-gray-400 hover:text-gray-300' }}">
            Tracks / Audios
        </a>
        <a href="{{ route('consumer.marketplace.images') }}"
            class="p-4 flex justify-center items-center gap-2 text-sm transition border-b-2 cursor-pointer
                {{ Request::routeIs('consumer.marketplace.images') ? 'border-purple-500 bg-purple-500/10 text-white' : 'border-transparent text-gray-400 hover:text-gray-300' }}">
            Images / Illustrations
        </a>
    </div>

    {{-- Category Filters --}}
    <div class="flex gap-3 mb-8 flex-wrap">
        @foreach(['Logos', 'Album Art', 'Social Media', 'Marketing', 'Illustrations', 'Backgrounds'] as $i => $item)
            <button
                class="px-5 py-2 rounded-full text-xs font-medium transition
                            {{ $i === 0 ? 'bg-[#4D61FF] text-white' : 'border border-gray-600 text-gray-400 hover:border-accent hover:text-accent' }}">
                {{ $item }}
            </button>
        @endforeach
    </div>

    {{-- Images Grid --}}
    <div class="grid grid-cols-4 gap-6">
        @for($i = 0; $i < 8; $i++)
            <div
                class="rounded-2xl overflow-hidden bg-[#252525] group border border-gray-800 hover:border-accent/40 transition shadow-lg">
                <div class="aspect-square relative overflow-hidden">
                    <img src="https://picsum.photos/400/400?random={{ $i + 100 }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-3">
                        <a href="{{ route('consumer.marketplace.image.details') }}"
                            class="w-10 h-10 rounded-full bg-accent text-white flex items-center justify-center hover:scale-110 transition shadow-lg">
                            <i class="fas fa-eye text-sm"></i>
                        </a>
                        <button
                            class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center hover:scale-110 transition">
                            <i class="fas fa-shopping-cart text-sm"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="text-sm font-bold truncate pr-4 text-white">Neon Dream #{{ $i + 1 }}</h4>
                        <span class="text-accent font-bold text-sm">$25</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="https://i.pravatar.cc/24?img={{ $i + 20 }}"
                            class="w-5 h-5 rounded-full border border-gray-700">
                        <span class="text-[10px] text-gray-400">Designer {{ $i + 1 }}</span>
                    </div>
                </div>
            </div>
        @endfor
    </div>

@endsection