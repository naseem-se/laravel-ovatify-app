@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-[#4D61FF]/80">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-3xl font-bold text-[#4D61FF]">View Track Details</h1>
        </div>

        {{-- Visual Waveform Player --}}
        <div class="relative w-full h-48 rounded-2xl overflow-hidden mb-8 group bg-black">
            <div
                class="absolute inset-0 bg-[url('https://picsum.photos/800/200?random=wave2')] bg-cover bg-center opacity-30">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black via-transparent to-black"></div>

            <div class="relative z-10 h-full flex items-center px-8 gap-6">
                <button
                    class="w-14 h-14 rounded-full bg-magenta flex items-center justify-center hover:scale-105 transition shadow-[0_0_20px_rgba(255,0,255,0.5)]">
                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </button>
                <div class="flex-1 flex items-center gap-1 h-12">
                    @foreach(range(1, 60) as $i)
                        <div class="w-1 bg-[#4D61FF]"
                            style="height: {{ rand(30, 100) }}%; opacity: {{ $i < 20 ? '100%' : '40%' }}"></div>
                    @endforeach
                </div>
                <span class="text-xl font-bold text-white">02:00</span>
            </div>
        </div>

        {{-- Description --}}
        <div class="mb-8">
            <h3 class="text-xl font-bold text-white mb-2">Description</h3>
            <p class="text-xs text-gray-400 leading-relaxed">
                Lorem ipsum dolor sit amet consectetur. Gravida morbi cras scelerisque tortor etiam dignissim tincidunt
                pharetra consequat. Diam ac blandit a in pellentesque egestas. Vel consequat sed id eget semper neque risus
                neque odio. In morbi nisi facilisi faucibus cursus felis faucibus nisi. Odio lectus at dictum ullamcorper
                sodales semper fames venenatis arcu. Ultricies molestie placerat scelerisque id mattis hendrerit odio et.
                Porttitor penatibus rhoncus sit odio at eu magna. Dui lectus aenean viverra molestie etiam lacus
                ullamcorper.
            </p>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-3 gap-12 mb-8">
            <div>
                <h4 class="font-bold text-white mb-1">Total blocks</h4>
                <p class="text-xs text-gray-400">100</p>
            </div>
            <div>
                <h4 class="font-bold text-white mb-1">Remaining Blocks</h4>
                <p class="text-xs text-gray-400">75</p>
            </div>
            <div>
                <h4 class="font-bold text-white mb-1">Price per block</h4>
                <p class="text-xs text-gray-400">$120</p>
            </div>
        </div>

        {{-- Tools Used & Genre --}}
        <div class="flex gap-4 mb-4">
            <span class="px-4 py-1.5 rounded-full border border-[#4D61FF] text-[#4D61FF] text-xs">Genre - Lo-fi</span>
            <span class="px-4 py-1.5 rounded-full border border-[#4D61FF] text-[#4D61FF] text-xs">BPM - 75</span>
        </div>
        <div class="mb-12">
            <h4 class="font-bold text-white mb-1">Tools Used</h4>
            <p class="text-xs text-gray-400">Lorem Ipsum</p>
        </div>


        <hr class="border-gray-800 mb-12">


        {{-- Track Meta Data --}}
        <div class="mb-8">
            <h3 class="text-xl font-bold text-white mb-6">Track Meta Data</h3>
            <div class="grid grid-cols-3 gap-12">
                <div>
                    <h4 class="font-bold text-white mb-1">BPM</h4>
                    <p class="text-xs text-gray-400">120</p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-1">Mood</h4>
                    <p class="text-xs text-gray-400">Uplifting</p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-1">Instrument</h4>
                    <p class="text-xs text-gray-400">Bass</p>
                </div>
            </div>
        </div>

        {{-- Collaborators --}}
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-white">Collaborators</h3>
                <button class="text-[#4D61FF] text-sm hover:underline">Manage</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @for($i = 0; $i < 6; $i++)
                    <div class="bg-[#1A1A1A] rounded-lg p-3 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/150?img={{ 10 + $i }}" class="w-8 h-8 rounded-full">
                            <span class="text-xs text-white">Alice</span>
                        </div>
                        <span class="text-xs font-bold text-white">50%</span>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Attached Agreement --}}
        <div class="mb-12">
            <h3 class="text-xl font-bold text-white mb-4">Attached Agreement & License</h3>
            <div class="bg-[#1A1A1A] rounded-lg p-4 flex justify-between items-center">
                <span class="text-white text-sm font-medium">Standard Agreement.pdf</span>
                <button class="text-[#4D61FF] text-sm hover:underline">View</button>
            </div>
        </div>

        {{-- Actions --}}
        <div class="space-y-4">
            <button
                class="w-full py-4 bg-[#4D61FF] hover:bg-[#5a6dff] text-white font-bold rounded-lg transition shadow-lg shadow-[#4D61FF]/20">
                List track
            </button>
            <button
                class="w-full py-4 bg-transparent border border-gray-600 text-white font-bold rounded-lg hover:bg-gray-800 transition">
                Distribute to DSPs
            </button>
        </div>

    </div>
@endsection