@extends('layouts.app')

@section('content')
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-black/60 backdrop-blur-sm">

        {{-- Modal Container (Figma Match) --}}
        <div
            class="w-full max-w-[560px] bg-[#1A1A1A] rounded-[48px] p-12 flex flex-col items-center text-center shadow-[0_0_100px_rgba(0,0,0,0.5)] border border-white/[0.03]">

            {{-- Success Icon (Figma Magenta Circle) --}}
            <div class="relative w-36 h-36 mb-10 flex items-center justify-center">
                {{-- Decorative dots from Figma --}}
                <div class="absolute -top-2 -right-2 w-3 h-3 bg-magenta/60 rounded-full"></div>
                <div class="absolute top-1/2 -translate-y-1/2 -left-4 w-2 h-2 bg-magenta/40 rounded-full"></div>
                <div class="absolute bottom-4 -right-6 w-1.5 h-1.5 bg-white/20 rounded-full"></div>

                <div
                    class="w-full h-full bg-magenta rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(255,0,255,0.2)]">
                    <div class="w-14 h-10 border-b-[6px] border-r-[6px] border-white rounded-sm rotate-45 -mt-2"></div>
                </div>
            </div>

            <h1 class="text-white text-[28px] font-bold mb-3 tracking-tight">Purchase Successful</h1>
            <p class="text-white/40 text-[16px] font-medium mb-12">Your asset is now available in your library!</p>

            {{-- Action Buttons --}}
            <div class="w-full space-y-4">
                <button onclick="window.location.href='{{ route('consumer.marketplace.index') }}'"
                    class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[17px] rounded-2xl hover:bg-[#3D51EF] transition-all active:scale-[0.995] shadow-lg shadow-[#4D61FF]/10">
                    Explore more tracks
                </button>
                <button onclick="window.location.href='{{ route('consumer.dashboard.index') }}'"
                    class="w-full py-5 bg-transparent border-[1.5px] border-white/10 text-white font-bold text-[17px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                    Back to home
                </button>
            </div>
        </div>

    </div>
@endsection