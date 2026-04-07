@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10">

        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-[#4D61FF]/80">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-2xl font-bold text-[#4D61FF]">Select your Wallet to connect</h1>
        </div>

        <div class="space-y-4">
            {{-- MetaMask --}}
            <button onclick="window.location.href='{{ route('consumer.investments.invest-product') }}'"
                class="w-full p-6 bg-[#1A1A1A] border border-[#4D61FF] rounded-xl text-left hover:bg-[#252525] transition flex items-center justify-between group">
                <span class="font-medium text-white">Connect with MetaMask</span>
            </button>

            {{-- WalletConnect --}}
            <button
                class="w-full p-6 bg-[#1A1A1A] border border-gray-700 rounded-xl text-left hover:bg-[#252525] hover:border-gray-600 transition flex items-center justify-between">
                <span class="font-medium text-white">Connect with WalletConnect</span>
            </button>
        </div>

        <div class="mt-20 space-y-4">
            <button onclick="window.location.href='{{ route('consumer.marketplace.buy-product') }}'"
                class="w-full py-4 bg-[#4D61FF] hover:bg-[#3D51EF] text-white font-bold rounded-xl transition shadow-lg shadow-[#4D61FF]/10 text-[18px]">
                Buy now
            </button>

            <button onclick="window.location.href='{{ route('consumer.marketplace.license') }}'"
                class="w-full py-4 bg-transparent border border-white/10 text-white font-bold rounded-xl hover:bg-white/5 transition text-[18px]">
                License Track
            </button>
        </div>

    </div>
@endsection