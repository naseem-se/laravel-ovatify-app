@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-start mb-10">
        <div>
            <h2 class="text-magenta text-5xl font-black mb-1">Hey!</h2>
            <h1 class="text-6xl font-black text-white leading-tight">Explore content</h1>
        </div>

        <a href="{{ route('consumer.creator.dashboard') }}"
            class="text-magenta text-sm font-black uppercase tracking-widest hover:brightness-110 transition-all mt-4">
            Become a creator
        </a>
    </div>

    {{-- Search --}}
    <div class="mb-10">
        <div class="relative max-w-2xl group">
            <div class="absolute left-6 top-1/2 -translate-y-1/2 flex items-center justify-center pointer-events-none z-20">
                <svg class="w-5 h-5 text-magenta group-focus-within:text-magenta transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" placeholder="Search song"
                class="w-full bg-[#1A1A1A] border border-gray-800/50 rounded-xl pr-6 py-3.5 text-sm text-white placeholder:text-gray-600 focus:outline-none focus:ring-1 focus:ring-magenta/20 focus:border-magenta/40 transition-all shadow-2xl"
                style="padding-left: 70px !important;">
        </div>
    </div>

    {{-- Category Filters --}}
    <div class="flex gap-3 mb-10 flex-wrap">
        @foreach(['Beats', 'Vocals', 'Loops', 'Bundles', 'Presets', 'Samples'] as $item)
            <button
                class="px-6 py-2.5 rounded-full text-xs font-bold transition
                                                                    {{ $loop->first ? 'category-pill-magenta shadow-lg shadow-magenta/20' : 'bg-[#252525] border border-gray-700 text-gray-400 hover:border-magenta hover:text-magenta' }}">
                {{ $item }}
            </button>
        @endforeach
    </div>

    {{-- Featured Drops --}}
    <h3 class="text-lg font-semibold mb-4">Featured Drops</h3>

    <div class="grid grid-cols-4 gap-5 mb-10">
        @for($i = 0; $i < 4; $i++)
            <div class="rounded-xl overflow-hidden"
                style="background: linear-gradient(135deg, rgba(30, 20, 50, 0.9) 0%, rgba(20, 10, 40, 0.95) 100%);">
                {{-- Track Image with Waveform --}}
                <div class="relative h-44 p-4 flex flex-col justify-between track-card-bg group">
                    {{-- Play Button --}}
                    <div class="flex justify-center flex-1 items-center">
                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-magenta/20 border border-magenta/40 shadow-magenta backdrop-blur-sm hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>

                    {{-- Waveform Visualization --}}
                    <div class="flex items-end justify-center gap-0.5 h-8">
                        @foreach([30, 45, 35, 55, 30, 42, 50, 38, 48, 30, 40, 52, 35, 45, 38, 50, 32, 44, 48, 30] as $h)
                            <div class="w-1 rounded-full bg-[#4155B1]" style="height: {{ $h / 2 }}px;"></div>
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

    {{-- Invest in Music Section --}}
    <h3 class="text-xl font-black mb-8">Invest in music</h3>

    <div class="grid grid-cols-2 gap-6">
        @for($i = 0; $i < 4; $i++)
            <div
                class="rounded-2xl overflow-hidden flex bg-[#16161C] border border-gray-800/50 hover:border-magenta/20 transition-all duration-300 group">
                {{-- Track Image --}}
                <div class="w-40 h-40 flex-shrink-0 relative track-card-bg">
                    {{-- Play Button --}}
                    <button
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex h-10 w-10 items-center justify-center rounded-full bg-magenta border border-white/20 shadow-magenta shadow-lg group-hover:scale-110 transition-all duration-300">
                        <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>

                {{-- Track Info --}}
                <div class="flex-1 p-6 flex flex-col justify-center">
                    <h4 class="text-xl font-black text-white mb-1">Family memories</h4>
                    <p class="text-[11px] text-gray-500 font-bold mb-4 uppercase tracking-widest">100 Blocks | <span
                            class="text-gray-400">75 Available</span></p>

                    <div class="flex items-center gap-3 mb-5">
                        <span
                            class="text-[10px] font-black bg-[#22C55E]/10 text-[#22C55E] border border-[#22C55E]/20 px-3 py-1.5 rounded-full uppercase tracking-tighter shadow-[0_0_10px_rgba(34,197,94,0.1)]">
                            ROI 12%
                        </span>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <img src="https://i.pravatar.cc/32?img={{ $i + 15 }}" alt="Artist"
                            class="w-6 h-6 rounded-full border border-magenta/20 shadow-magenta/10 shadow-sm">
                        <span class="text-[11px] font-bold text-gray-400 group-hover:text-white transition-colors">Kasandra
                            Cabrera</span>
                    </div>
                </div>
            </div>
        @endfor
    </div>

@endsection