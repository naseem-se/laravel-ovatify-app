@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Set for Sale</h1>
    </div>

    {{-- Form Container --}}
    <div class="max-w-3xl mx-auto bg-[#252525] rounded-3xl p-10 shadow-2xl">
        <div class="space-y-8">
            {{-- Track Selection --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-3">Target Content</label>
                <div class="p-4 rounded-xl bg-[#1A1A1A] border border-gray-700 flex items-center gap-4">
                    <img src="https://picsum.photos/64/64" class="w-12 h-12 rounded-lg">
                    <div>
                        <h4 class="text-sm font-bold">Midnight Reflection</h4>
                        <p class="text-[10px] text-gray-500">Draft · 02:45</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                {{-- Price --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Sale Price ($)</label>
                    <input type="number" placeholder="e.g. 19.99"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                </div>

                {{-- Category --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Category</label>
                    <select
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                        <option>Beat</option>
                        <option>Vocal</option>
                        <option>Loop</option>
                        <option>Bundle</option>
                    </select>
                </div>
            </div>

            {{-- Tags --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Tags (comma separated)</label>
                <input type="text" placeholder="e.g. summer, hiphop, chill"
                    class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
            </div>

            {{-- Visibility --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-3">Marketplace Visibility</label>
                <div class="flex gap-4">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="visibility" class="hidden peer" checked>
                        <div
                            class="p-4 rounded-xl border border-gray-700 bg-[#1A1A1A] text-center peer-checked:border-accent peer-checked:bg-accent/5 transition">
                            <span class="text-xs font-medium">Public</span>
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="visibility" class="hidden peer">
                        <div
                            class="p-4 rounded-xl border border-gray-700 bg-[#1A1A1A] text-center peer-checked:border-accent peer-checked:bg-accent/5 transition">
                            <span class="text-xs font-medium">Draft</span>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Agreements --}}
            <div class="flex items-center gap-3 p-4 rounded-xl bg-accent/5 border border-accent/20">
                <input type="checkbox" class="w-4 h-4 rounded accent-accent">
                <span class="text-xs text-gray-400 leading-relaxed">I agree to the <a href="#"
                        class="text-accent hover:underline">Marketplace Terms & Conditions</a> and confirm I own the rights
                    to this content.</span>
            </div>

            {{-- Submit --}}
            <button
                class="w-full py-5 rounded-2xl bg-accent text-white font-bold text-md hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
                Finalize Listing
            </button>
        </div>
    </div>

@endsection