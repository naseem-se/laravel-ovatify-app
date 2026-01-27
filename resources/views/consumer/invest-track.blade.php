@extends('layouts.app')

@section('content')

    {{-- Header with Track Summary --}}
    <div class="bg-[#252525] rounded-3xl p-8 mb-8 flex items-center gap-8 border border-gray-800 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-accent/5 rounded-full blur-3xl -mr-32 -mt-32"></div>

        <div class="w-24 h-24 rounded-2xl overflow-hidden shadow-xl relative z-10">
            <img src="https://picsum.photos/200/200?random=15" class="w-full h-full object-cover">
        </div>

        <div class="relative z-10 flex-1">
            <h2 class="text-2xl font-black mb-1">Invest in "Summer Melodies"</h2>
            <p class="text-sm text-gray-500 mb-4 flex items-center gap-3">
                <img src="https://i.pravatar.cc/24?img=12" class="w-5 h-5 rounded-full">
                Luna Beats · Pop · 120 BPM
            </p>
            <div class="flex gap-10">
                <div>
                    <span class="text-[10px] text-gray-500 uppercase block mb-1">Price per share</span>
                    <span class="text-xl font-bold text-accent">$5.00</span>
                </div>
                <div>
                    <span class="text-[10px] text-gray-500 uppercase block mb-1">Available Shares</span>
                    <span class="text-xl font-bold text-white">75 <span class="text-xs text-gray-500">/ 100</span></span>
                </div>
                <div>
                    <span class="text-[10px] text-gray-500 uppercase block mb-1">Projected ROI</span>
                    <span class="text-xl font-bold text-green-400">12.5%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-8">
        {{-- Left: Selection --}}
        <div class="col-span-8">
            <h3 class="text-lg font-bold mb-6">Select Investment Blocks</h3>

            {{-- Blocks Grid --}}
            <div class="grid grid-cols-10 gap-2 mb-10">
                @for($i = 1; $i <= 100; $i++)
                    @php $isAvailable = $i > 25; @endphp
                    <button
                        class="aspect-square rounded-md flex items-center justify-center text-[8px] font-bold transition
                            {{ $isAvailable ? 'bg-gray-800 border border-gray-700 text-gray-500 hover:border-accent hover:text-white' : 'bg-accent/20 border border-accent/40 text-accent cursor-not-allowed opacity-40' }}"
                        {{ !$isAvailable ? 'disabled' : '' }}>
                        {{ $i }}
                    </button>
                @endfor
            </div>

            {{-- Accordion Sections --}}
            <div class="space-y-4">
                <div class="p-6 rounded-2xl bg-[#252525] border border-gray-700">
                    <button class="w-full flex justify-between items-center text-left">
                        <span class="font-bold">Smart Contract Details</span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>
                    <div class="mt-4 text-xs text-gray-400 leading-relaxed pr-10">
                        Your investment is secured via a decentralized smart contract on the blockchain. Revenue
                        distribution is automated and transparent.
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-[#252525] border border-gray-700 opacity-60">
                    <button class="w-full flex justify-between items-center text-left">
                        <span class="font-bold">Historical Performance</span>
                        <i class="fas fa-chevron-right text-gray-500 text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Right: Checkout --}}
        <div class="col-span-4">
            <div class="bg-[#252525] border border-accent/30 rounded-3xl p-8 shadow-2xl sticky top-8">
                <h3 class="text-lg font-bold mb-8">Investment Summary</h3>

                <div class="space-y-4 mb-8">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Selected Blocks</span>
                        <span class="text-sm font-bold">10</span>
                    </div>
                    <div class="flex justify-between items-center text-accent">
                        <span class="text-sm">Total Ownership</span>
                        <span class="text-sm font-bold">1.0%</span>
                    </div>
                    <div class="border-t border-gray-700 pt-4 flex justify-between items-center">
                        <span class="text-lg font-bold">Total Amount</span>
                        <span class="text-2xl font-black text-white">$50.00</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <button
                        class="w-full py-5 rounded-2xl bg-accent text-white font-bold text-md hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
                        Invest Now
                    </button>
                    <p class="text-[10px] text-center text-gray-500 px-4">
                        By clicking "Invest Now", you confirm you have read and approved the <a href="#"
                            class="text-accent underline">Investment Agreement</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection