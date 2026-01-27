@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Track mixing</h1>
    </div>

    {{-- Track Info --}}
    <div class="mb-6">
        <p class="text-xs text-gray-400 mb-1">Track Name</p>
        <h2 class="text-lg font-semibold">Reflection</h2>
    </div>

    {{-- Main Audio Player --}}
    <div class="p-4 rounded-xl bg-[#252525] mb-8">
        <div class="flex items-center gap-4">
            {{-- Play Button --}}
            <button class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-accent text-accent">
                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </button>

            {{-- Full Track Waveform --}}
            <div class="flex-1 flex items-center justify-center gap-0.5 h-10 px-2 opacity-60">
                @for($i = 0; $i < 60; $i++)
                    <div class="w-1 rounded-full bg-[#4D61FF]" style="height: {{ rand(10, 35) }}px;"></div>
                @endfor
            </div>

            <span class="text-xs text-gray-500">02:00</span>
        </div>
    </div>

    {{-- Timeline Editor --}}
    <div class="bg-[#252525] rounded-xl overflow-hidden mb-8">
        {{-- Timeline Header --}}
        <div class="flex border-b border-gray-700">
            <div class="w-24 p-3 border-r border-gray-700"></div>
            <div class="flex-1 flex py-2 px-4 justify-between items-center text-[10px] text-gray-500">
                <span>0</span>
                <span>5</span>
                <span>10</span>
                <div class="flex-1 mx-4 h-px bg-gray-700"></div>
            </div>
        </div>

        {{-- Timeline Tracks --}}
        <div class="relative">
            {{-- Playhead --}}
            <div class="absolute left-36 top-0 bottom-0 w-px bg-white z-10 shadow-[0_0_8px_white]"></div>

            {{-- Tempo Track --}}
            <div class="flex border-b border-gray-700 h-16">
                <div class="w-24 flex flex-col items-center justify-center border-r border-gray-700 bg-[#1A1A1A]">
                    <svg class="w-4 h-4 text-[#4D61FF] mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="text-[10px] text-gray-400">Tempo</span>
                </div>
                <div class="flex-1 p-2 bg-[#252525]">
                    <div
                        class="h-10 w-3/4 rounded-md bg-[#4D61FF] bg-opacity-80 flex items-center px-4 overflow-hidden relative">
                        <div class="flex items-center gap-0.5 opacity-50">
                            @for($i = 0; $i < 40; $i++)
                            <div class="w-1 bg-white" style="height: {{ rand(10, 20) }}px;"></div> @endfor
                        </div>
                    </div>
                </div>
            </div>

            {{-- Beat Track --}}
            <div class="flex border-b border-gray-700 h-16">
                <div class="w-24 flex flex-col items-center justify-center border-r border-gray-700 bg-[#1A1A1A]">
                    <svg class="w-4 h-4 text-[#7B61FF] mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                    <span class="text-[10px] text-gray-400">Beat</span>
                </div>
                <div class="flex-1 p-2 bg-[#252525]">
                    <div
                        class="h-10 w-1/2 rounded-md bg-[#7B61FF] bg-opacity-80 flex items-center px-4 overflow-hidden relative">
                        <div class="flex items-center gap-0.5 opacity-50">
                            @for($i = 0; $i < 30; $i++)
                            <div class="w-1 bg-white" style="height: {{ rand(10, 20) }}px;"></div> @endfor
                        </div>
                    </div>
                </div>
            </div>

            {{-- Vocals Track --}}
            <div class="flex h-16">
                <div class="w-24 flex flex-col items-center justify-center border-r border-gray-700 bg-[#1A1A1A]">
                    <svg class="w-4 h-4 text-[#4D61FF] mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                    <span class="text-[10px] text-gray-400">Vocals</span>
                </div>
                <div class="flex-1 p-2 bg-[#252525]">
                    <div
                        class="h-10 w-1/3 rounded-md bg-[#4D61FF] bg-opacity-80 flex items-center px-4 overflow-hidden relative">
                        <div class="flex items-center gap-0.5 opacity-50">
                            @for($i = 0; $i < 20; $i++)
                            <div class="w-1 bg-white" style="height: {{ rand(10, 20) }}px;"></div> @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="space-y-3">
        <button class="w-full py-4 rounded-lg bg-[#4D61FF] text-white text-sm font-medium hover:bg-[#5a6dff] transition">
            Approve mix & generate
        </button>
        <button
            class="w-full py-4 rounded-lg bg-transparent border border-gray-600 text-white text-sm font-medium hover:bg-[#303030] transition">
            Back
        </button>
    </div>

@endsection