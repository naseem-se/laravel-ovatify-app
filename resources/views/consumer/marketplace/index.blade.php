@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-center mb-16">
        <div>
            <h2 class="text-accent text-sm font-bold uppercase tracking-widest mb-2">Marketplace</h2>
            <h1 class="text-5xl font-black">Discover Artists</h1>
        </div>
    </div>

    {{-- Search --}}
    <div class="mb-12">
        <div class="relative max-w-2xl group">
            <div class="absolute left-6 top-1/2 -translate-y-1/2 flex items-center justify-center pointer-events-none z-20">
                <svg class="w-6 h-6 text-gray-500 group-focus-within:text-accent transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" placeholder="Search for tracks, artists, or genres..."
                class="w-full bg-[#252525] border border-gray-700/50 rounded-2xl pr-6 py-4 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-accent/30 focus:border-accent transition-all shadow-xl shadow-black/20"
                style="padding-left: 80px !important;">
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

    {{-- Featured Drops --}}
    <h3 class="text-lg font-semibold mb-4">Featured Drops</h3>

    <div class="grid grid-cols-4 gap-5 mb-10">
        @for($i = 0; $i < 4; $i++)
            <div class="rounded-xl overflow-hidden bg-[#252525]">
                {{-- Track Image with Waveform --}}
                <div class="relative h-32 p-4 flex flex-col justify-between"
                    style="background: linear-gradient(135deg, rgba(138, 43, 226, 0.2) 0%, rgba(75, 0, 130, 0.3) 50%, rgba(25, 25, 112, 0.2) 100%);">
                    {{-- Play Button --}}
                    <div class="flex justify-center">
                        <button class="flex h-8 w-8 items-center justify-center rounded-full bg-black/50">
                            <svg class="w-4 h-4 text-accent ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>

                    {{-- Waveform Visualization --}}
                    <div class="flex items-end justify-center gap-0.5 h-6">
                        @foreach([30, 45, 35, 55, 30, 42, 50, 38, 48, 30, 40, 52, 35, 45, 38, 50, 32, 44, 48, 30] as $h)
                            <div class="w-1 rounded-full bg-[#4155B1]" style="height: {{ $h / 2.5 }}px;"></div>
                        @endforeach
                    </div>
                </div>

                {{-- Track Info --}}
                <div class="p-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h4 class="font-medium text-sm">Cloudside</h4>
                            <p class="text-xs text-gray-500">By Luna Beats</p>
                        </div>
                        <span class="text-sm font-semibold">$19</span>
                    </div>

                    <button class="w-full py-2 rounded-md bg-[#4D61FF] text-sm text-white hover:bg-[#5a6dff] transition">
                        View details
                    </button>
                </div>
            </div>
        @endfor
    </div>

    {{-- Trending Now --}}
    <h3 class="text-lg font-semibold mb-4">Trending Now</h3>

    <div class="grid grid-cols-4 gap-5">
        @for($i = 0; $i < 4; $i++)
            <div class="rounded-xl overflow-hidden"
                style="background: linear-gradient(135deg, rgba(30, 20, 50, 0.9) 0%, rgba(20, 10, 40, 0.95) 100%);">
                {{-- Track Image with Waveform --}}
                <div class="relative h-32 p-4 flex flex-col justify-between"
                    style="background: linear-gradient(135deg, rgba(138, 43, 226, 0.2) 0%, rgba(75, 0, 130, 0.3) 50%, rgba(25, 25, 112, 0.2) 100%);">
                    {{-- Play Button --}}
                    <div class="flex justify-center">
                        <button class="flex h-8 w-8 items-center justify-center rounded-full bg-black/50">
                            <svg class="w-4 h-4 text-accent ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>

                    {{-- Waveform --}}
                    <div class="flex items-end justify-center gap-0.5 h-6">
                        @foreach([25, 40, 30, 50, 25, 38, 45, 33, 43, 25, 35, 47, 30, 40, 33, 45, 27, 39, 43, 25] as $h)
                            <div class="w-1 rounded-full bg-[#4155B1]" style="height: {{ $h / 2.5 }}px;"></div>
                        @endforeach
                    </div>
                </div>

                {{-- Track Info --}}
                <div class="p-4 bg-[#252525]">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h4 class="font-medium text-sm">Cloudside</h4>
                            <p class="text-xs text-gray-500">R&B | Melancholic</p>
                        </div>
                        <span class="text-sm font-semibold">$19</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="https://i.pravatar.cc/24?img={{ $i }}" alt="Artist" class="w-5 h-5 rounded-full">
                        <span class="text-xs text-gray-400">Luna Beats</span>
                    </div>
                </div>
            </div>
        @endfor
    </div>

@endsection