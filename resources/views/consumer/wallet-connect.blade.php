@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative min-h-[80vh] flex flex-col">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-16">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Select your Wallet to connect</h1>
        </div>

        {{-- Wallet Options (Figma Match) --}}
        <div class="space-y-6 flex-1">
            <button
                class="w-full bg-[#141414] border border-[#4D61FF]/30 rounded-2xl py-8 px-10 text-white text-[18px] font-semibold text-left hover:border-[#4D61FF]/60 transition-all active:scale-[0.995]">
                Connect with MetaMask
            </button>
            <button
                class="w-full bg-[#141414] border border-[#4D61FF]/30 rounded-2xl py-8 px-10 text-white text-[18px] font-semibold text-left hover:border-[#4D61FF]/60 transition-all active:scale-[0.995]">
                Connect with WalletConnect
            </button>
        </div>

        {{-- Footer Actions (Figma Match) --}}
        <div class="pt-20 space-y-6">
            <button onclick="window.location.href='{{ route('consumer.marketplace.checkout') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Buy now
            </button>
            <button onclick="window.location.href='{{ route('consumer.marketplace.license') }}'"
                class="w-full py-5 bg-transparent border-[1.5px] border-white/10 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                License Track
            </button>
        </div>

    </div>
@endsection