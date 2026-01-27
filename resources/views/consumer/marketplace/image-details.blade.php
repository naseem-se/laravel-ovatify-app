@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Image Details</h1>
    </div>

    <div class="grid grid-cols-12 gap-8">
        {{-- Left: Image Preview --}}
        <div class="col-span-7">
            <div class="aspect-square rounded-2xl overflow-hidden bg-[#252525] relative group">
                <img src="https://picsum.photos/800/800?random=1" alt="Marketplace Image"
                    class="w-full h-full object-cover">

                {{-- Zoom/Expand Overlay --}}
                <div
                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <button
                        class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Metadata Row --}}
            <div class="mt-4 flex gap-6 text-xs text-gray-500">
                <span>Dimensions: 4000 x 4000</span>
                <span>Format: PNG</span>
                <span>Size: 12.4 MB</span>
            </div>
        </div>

        {{-- Right: Details & Purchase --}}
        <div class="col-span-5 space-y-8">
            <div>
                <h2 class="text-2xl font-bold mb-2">Neon Abstract Flow</h2>
                <div class="flex items-center gap-2 mb-4">
                    <img src="https://i.pravatar.cc/32?img=8" class="w-6 h-6 rounded-full">
                    <span class="text-sm text-gray-400">Created by <strong class="text-white">Designer X</strong></span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    A high-resolution abstract piece featuring neon colors and fluid motion, perfect for album artwork or
                    digital marketing.
                </p>
            </div>

            {{-- Tags --}}
            <div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(['Abstract', 'Neon', 'Album Art', 'Purple', 'Fluid', 'Cyberpunk'] as $tag)
                        <span class="px-3 py-1 rounded-full bg-[#252525] border border-gray-700 text-[10px] text-gray-300">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Licensing & Pricing --}}
            <div class="p-6 rounded-2xl bg-[#252525] border border-gray-700">
                <div class="flex justify-between items-end mb-6">
                    <div>
                        <span class="text-xs text-gray-500 block mb-1">Standard License</span>
                        <span class="text-3xl font-bold text-white">$49</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] text-green-400 font-medium bg-green-400/10 px-2 py-0.5 rounded">Commercial
                            Ready</span>
                    </div>
                </div>

                <div class="space-y-3 mb-6">
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 14.14L10 16.14l-6.707-6.707a1 1 0 011.414-1.414L10 13.31l5.293-5.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        High resolution source file
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 14.14L10 16.14l-6.707-6.707a1 1 0 011.414-1.414L10 13.31l5.293-5.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Full commercial rights
                    </div>
                </div>

                <button
                    class="w-full py-4 rounded-xl bg-accent text-white font-bold text-sm hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
                    Buy Now
                </button>
            </div>
        </div>
    </div>

@endsection