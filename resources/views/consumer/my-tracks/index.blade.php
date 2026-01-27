@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-center mb-16">
        <div>
            <h2 class="text-accent text-sm font-bold uppercase tracking-widest mb-2">My Library</h2>
            <h1 class="text-5xl font-black">Your Tracks</h1>
        </div>
    </div>

    {{-- Tabs --}}
    <div class="flex gap-8 mb-8 border-b border-gray-700">
        <button class="pb-3 text-sm font-medium border-b-2 border-accent text-accent">
            My Published Tracks
        </button>
        <button class="pb-3 text-sm font-medium text-gray-400 hover:text-white">
            My Creations with AI
        </button>
    </div>

    {{-- Tracks List --}}
    <div class="space-y-4 mb-8">
        @for($i = 0; $i < 3; $i++)
            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#252525]">
                {{-- Track Image --}}
                <div class="w-20 h-20 rounded-lg flex-shrink-0 relative"
                    style="background: linear-gradient(135deg, rgba(138, 43, 226, 0.3) 0%, rgba(75, 0, 130, 0.4) 50%, rgba(25, 25, 112, 0.3) 100%);">
                    {{-- Play Button --}}
                    <button
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex h-6 w-6 items-center justify-center rounded-full bg-black/50">
                        <svg class="w-3 h-3 text-accent ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>

                {{-- Track Info --}}
                <div class="flex-1">
                    <h4 class="font-medium text-sm">Family memories</h4>
                    <p class="text-xs text-gray-500">Pop R&B | Warm happy</p>
                    <span class="inline-block mt-2 text-xs bg-accent/20 text-accent px-2 py-0.5 rounded">
                        Draft
                    </span>
                </div>

                {{-- Waveform --}}
                <div class="flex-1 flex items-center justify-center gap-0.5 h-8">
                    @foreach([20, 35, 25, 45, 20, 32, 40, 28, 38, 20, 30, 42, 25, 35, 28, 40, 22, 34, 38, 20, 35, 25, 45, 20, 32, 40, 28, 38] as $h)
                        <div class="w-1 rounded-full bg-gray-600" style="height: {{ $h }}px;"></div>
                    @endforeach
                </div>
            </div>
        @endfor
    </div>

    {{-- List on Marketplace Button --}}
    <button class="w-full py-4 rounded-lg bg-[#252525] text-white text-sm font-medium hover:bg-[#303030] transition">
        List your track on QmeMarketplace
    </button>

@endsection