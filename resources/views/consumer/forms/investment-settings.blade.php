@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Investment Settings</h1>
    </div>

    <div class="max-w-4xl mx-auto grid grid-cols-12 gap-8">
        {{-- Left: Form --}}
        <div class="col-span-8 space-y-6">
            <div class="bg-[#252525] rounded-3xl p-8 shadow-2xl space-y-8">
                {{-- Ownership Percentage --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-4">Percentage of ownership to share</label>
                    <div class="flex items-center gap-6">
                        <input type="range" min="1" max="100" value="10" class="flex-1 accent-accent">
                        <div
                            class="w-16 h-10 rounded-lg bg-[#1A1A1A] border border-gray-700 flex items-center justify-center font-bold text-accent">
                            10%
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    {{-- Number of Blocks --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Number of Blocks</label>
                        <input type="number" value="100"
                            class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                        <p class="text-[10px] text-gray-500 mt-2">Each block represents a fraction of the shared ownership.
                        </p>
                    </div>

                    {{-- Price per Block --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Price per Block ($)</label>
                        <input type="number" value="5.00"
                            class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                    </div>
                </div>

                {{-- ROI Projection --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Projected ROI (%)</label>
                    <input type="text" placeholder="e.g. 5% - 15% annually"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                </div>
            </div>

            <button
                class="w-full py-5 rounded-2xl bg-accent text-white font-bold text-md hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
                Enable Investment
            </button>
        </div>

        {{-- Right: Preview/Summary --}}
        <div class="col-span-4 space-y-6">
            <div class="bg-accent/5 border border-accent/20 rounded-3xl p-6 text-center">
                <h3 class="text-sm font-bold text-accent mb-6">Investment Preview</h3>

                <div
                    class="w-32 h-32 mx-auto rounded-full border-4 border-accent border-t-transparent animate-[spin_10s_linear_infinite] mb-6 flex items-center justify-center">
                    <div class="text-2xl font-bold">10%</div>
                </div>

                <div class="space-y-4 text-left">
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Total Value</span>
                        <span class="font-bold text-white">$500.00</span>
                    </div>
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Block Count</span>
                        <span class="font-bold text-white">100</span>
                    </div>
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Available</span>
                        <span class="font-bold text-green-400">100%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection