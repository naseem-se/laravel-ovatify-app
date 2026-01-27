@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Licensing Settings</h1>
    </div>

    <div class="max-w-3xl mx-auto space-y-8">
        {{-- License Type Selection --}}
        <div class="grid grid-cols-2 gap-6">
            <div class="p-6 rounded-2xl bg-[#252525] border-2 border-accent shadow-lg relative overflow-hidden">
                <div class="absolute top-2 right-2 text-accent">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-1">Standard License</h3>
                <p class="text-[10px] text-gray-500 mb-6">Non-exclusive rights for creator use.</p>
                <div class="text-2xl font-black text-white">$29.00</div>
            </div>

            <div
                class="p-6 rounded-2xl bg-[#252525] border border-gray-700 hover:border-gray-500 transition cursor-pointer">
                <h3 class="text-lg font-bold mb-1">Exclusive License</h3>
                <p class="text-[10px] text-gray-500 mb-6">Full transfer of rights to the buyer.</p>
                <div class="text-2xl font-black text-white">$499.00</div>
            </div>
        </div>

        {{-- Detailed Settings --}}
        <div class="bg-[#252525] rounded-3xl p-8 shadow-2xl space-y-8">
            <h2 class="text-lg font-bold border-b border-gray-700 pb-4">Standard License Terms</h2>

            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-medium">Allow Commercial Use</h4>
                        <p class="text-[10px] text-gray-500">Buyer can use content for profit-making projects.</p>
                    </div>
                    <button class="w-12 h-6 rounded-full bg-accent relative transition">
                        <div class="absolute right-1 top-1 w-4 h-4 rounded-full bg-white"></div>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-medium">Attribution Requirement</h4>
                        <p class="text-[10px] text-gray-500">Buyer must credit Luna Beats when using content.</p>
                    </div>
                    <button class="w-12 h-6 rounded-full bg-gray-700 relative transition">
                        <div class="absolute left-1 top-1 w-4 h-4 rounded-full bg-white"></div>
                    </button>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Usage Limit</label>
                    <select
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                        <option>Unlimited usage</option>
                        <option>Single project only</option>
                        <option>Up to 10 projects</option>
                    </select>
                </div>
            </div>
        </div>

        <button
            class="w-full py-5 rounded-2xl bg-accent text-white font-bold text-md hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
            Save Licensing Terms
        </button>
    </div>

@endsection