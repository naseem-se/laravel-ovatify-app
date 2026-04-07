@extends('layouts.app')

@section('content')
    <div class="max-w-[600px] mx-auto pt-4">

        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="#" class="text-[#4D61FF] text-xl">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-[#4D61FF] text-xl font-medium">Invest in Track</h1>
        </div>

        {{-- Order Summary --}}
        <div class="space-y-6">
            <h2 class="text-white text-lg font-medium">Order Summary</h2>

            {{-- Item Row --}}
            <div class="flex justify-between items-center p-4 border border-[#4D61FF] rounded-xl bg-[#121212]">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-900 to-blue-900 rounded-lg"></div>
                    <div>
                        <h3 class="text-white font-bold text-sm">Night Vibes</h3>
                        <p class="text-gray-400 text-[10px]">By Alex M.</p>
                    </div>
                </div>
                <span class="text-white font-bold text-sm">$29.00</span>
            </div>

            {{-- Subtotal --}}
            <div class="flex justify-between items-center pt-2">
                <span class="text-white font-medium text-sm">Subtotal</span>
                <span class="text-white font-bold text-sm">$29.00</span>
            </div>

            {{-- Form --}}
            <form class="space-y-4 pt-4">
                <input type="text" placeholder="Name"
                    class="w-full bg-[#1A1A1A] border border-white/5 rounded-lg px-4 py-3 text-white text-sm focus:border-[#4D61FF] focus:ring-0 placeholder-gray-500">

                <input type="text" placeholder="Credit Card No"
                    class="w-full bg-[#1A1A1A] border border-white/5 rounded-lg px-4 py-3 text-white text-sm focus:border-[#4D61FF] focus:ring-0 placeholder-gray-500">

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Expiry"
                        class="w-full bg-[#1A1A1A] border border-white/5 rounded-lg px-4 py-3 text-white text-sm focus:border-[#4D61FF] focus:ring-0 placeholder-gray-500">
                    <input type="text" placeholder="CVV"
                        class="w-full bg-[#1A1A1A] border border-white/5 rounded-lg px-4 py-3 text-white text-sm focus:border-[#4D61FF] focus:ring-0 placeholder-gray-500">
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <div class="w-4 h-4 rounded bg-[#4D61FF] flex items-center justify-center text-white text-xs">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="text-gray-400 text-xs">Save card for future purchases</span>
                </div>

                {{-- Buttons --}}
                <div class="space-y-3 pt-6">
                    <button type="button"
                        class="w-full py-3.5 bg-[#4D61FF] text-white font-bold rounded-xl hover:bg-[#3D51EF] transition-colors">
                        Confirm & Pay
                    </button>
                    <button type="button"
                        class="w-full py-3.5 bg-transparent border border-white/10 text-white font-medium rounded-xl hover:border-white hover:bg-white/5 transition-colors">
                        Back to track
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection