@extends('layouts.app')

@section('content')
    {{-- <style>
        .card-glow {
            background: radial-gradient(120% 120% at top left, rgba(168, 85, 247, 0.25), transparent 60%);
        }
    </style> --}}

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-accent text-2xl font-semibold">Explore</h2>
            <h1 class="text-3xl font-bold">Your Marketplace</h1>
        </div>
    </div>

    {{-- Search --}}
    <div class="mb-6">
        <input type="text" placeholder="Search song" style="background: #252525"
            class="w-full bg-card  rounded-lg px-5 py-3 text-sm placeholder:text-textMuted focus:outline-none">
    </div>


    <div class="grid grid-cols-2 mb-10 border-b border-gray-700">
        <!-- Tab 1 -->
        <button onclick="window.location='{{ route('consumer.marketplace.index') }}'"
            class="p-4 flex justify-center items-center gap-2 text-sm transition
        border-b-2 cursor-pointer
        {{ Request::routeIs('consumer.marketplace.index') ? 'border-purple-500 bg-purple-500/10' : 'border-transparent hover:text-gray-300' }}">
            Tracks / Audios
        </button>

        <!-- Tab 2 -->
        <button onclick="window.location='{{ route('consumer.marketplace.images') }}'"
            class="p-4 flex justify-center items-center gap-2 text-sm transition
        border-b-2 cursor-pointer
        {{ Request::routeIs('consumer.marketplace.images') ? 'border-purple-500 bg-purple-500/10 ' : 'border-transparent hover:text-gray-300' }}">
            Images / Illustrations
        </button>
    </div>



    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 ">
        @for ($i = 0; $i < 8; $i++)
            <div
                class="relative w-full bg-from max-w-[214px] h-[214px] mx-auto overflow-hidden rounded-lg flex flex-col justify-end p-8 shadow-2xl">
                <div class="absolute inset-0 z-10 w-full p-2">

                    <div class="flex justify-center mt-6">
                        <button
                            class="flex h-4 w-4 items-center justify-center rounded-full bg-[#1a1a1e]/80 backdrop-blur-sm">
                            <div
                                class="ml-1.5 h-0 w-0 border-y-[12px] border-l-[22px] border-y-transparent border-l-[#ff00ff] drop-shadow-[0_0_8px_#ff00ff]">
                            </div>
                        </button>
                    </div>

                    <div class="mb-6 flex items-end justify-center space-x-[2px] mt-4 px-2 opacity-80">
                        @foreach ([30, 45, 35, 55, 30, 42, 50, 38, 48, 30, 40, 52, 35, 45, 38, 50, 32, 44, 48, 30] as $h)
                            <div class="w-1.5 rounded-full bg-[#4155b1]" style="height: {{ $h / 2 }}px;"></div>
                        @endforeach
                    </div>

                    <div class="flex items-center   justify-between mb-4">
                        <div>
                            <h2 class="text-sm leading-tight tracking-tight text-white">Cloudside</h2>
                            <p class="text-xs text-gray-300">By Luna Beats</p>
                        </div>
                        <div
                            class=" text-sm  text-white">
                            $19
                        </div>
                    </div>

                    <button
                        class="w-full rounded-md bg-[#4d61ff] py-2 text-md text-white transition-all hover:bg-[#5a6dff] active:scale-[0.98]">
                        View details
                    </button>
                </div>
            </div>
        @endfor
    </div>

@endsection
