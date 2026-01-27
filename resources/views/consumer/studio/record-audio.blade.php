@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-6 mb-16">
        <a href="{{ url()->previous() }}"
            class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 text-gray-400 hover:text-white hover:bg-white/10 transition-all border border-white/10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h2 class="text-accent text-sm font-bold uppercase tracking-widest mb-1">Studio Recorder</h2>
            <h1 class="text-5xl font-black text-white">Record Audio</h1>
        </div>
    </div>

    {{-- Recording Interface --}}
    <div class="flex flex-col items-center justify-center min-h-[500px]">
        {{-- Pulse Animation --}}
        <div class="relative mb-12">
            <div
                class="w-48 h-48 rounded-full border-2 border-accent/20 flex items-center justify-center animate-[ping_3s_infinite]">
            </div>
            <div
                class="absolute inset-0 w-48 h-48 rounded-full border-2 border-accent/40 flex items-center justify-center animate-[ping_2s_infinite]">
            </div>
            <div
                class="absolute inset-0 w-48 h-48 rounded-full bg-[#1A1A1A] border-4 border-accent flex items-center justify-center shadow-[0_0_30px_rgba(255,0,255,0.3)]">
                {{-- Level Bars --}}
                <div class="flex items-center gap-1.5 h-16">
                    @for($i = 0; $i < 12; $i++)
                        <div class="w-1.5 rounded-full bg-accent opacity-{{ 100 - ($i * 5) }}"
                            style="height: {{ rand(10, 60) }}px;"></div>
                    @endfor
                </div>
            </div>
        </div>

        {{-- Timer --}}
        <div class="text-4xl font-mono font-bold text-white mb-2">00:45:21</div>
        <p class="text-sm text-gray-500 mb-12">Recording in progress...</p>

        {{-- Control Buttons --}}
        <div class="flex items-center gap-8">
            {{-- Pause --}}
            <button
                class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center text-white hover:bg-gray-700 transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" />
                </svg>
            </button>

            {{-- Stop --}}
            <button
                class="w-20 h-20 rounded-full bg-accent flex items-center justify-center text-white shadow-lg hover:shadow-accent/40 transition">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 6h12v12H6z" />
                </svg>
            </button>

            {{-- Delete --}}
            <button
                class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center text-white hover:bg-red-500 transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                </svg>
            </button>
        </div>
    </div>

@endsection