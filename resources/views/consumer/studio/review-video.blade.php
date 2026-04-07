@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20">
        <div class="pt-8 mb-4">
            <x-studio-stepper :currentStep="5" />
        </div>

        <div class="min-h-[60vh] flex flex-col items-center justify-center">

            {{-- Success Illustration & Info --}}
            <div class="text-center space-y-10 max-w-[600px]">

                {{-- Success Icon --}}
                <div class="relative w-40 h-40 mx-auto">
                    <div class="absolute inset-0 bg-magenta/20 blur-[60px] rounded-full"></div>
                    <div
                        class="relative w-full h-full bg-[#1A1B23] border-4 border-magenta rounded-full flex items-center justify-center text-magenta shadow-2xl">
                        <i class="fas fa-check text-[60px]"></i>
                    </div>
                </div>

                {{-- Text --}}
                <div class="space-y-4">
                    <h1 class="text-white text-[48px] font-black tracking-tighter leading-tight">Congratulations!</h1>
                    <p class="text-white/30 text-[18px] font-medium leading-relaxed">
                        Your track <span class="text-magenta font-bold">"Cloudside"</span> has been successfully published
                        and
                        is now live on the Ovatify marketplace.
                    </p>
                </div>

                {{-- Stats Update Info (Matching User Workflow) --}}
                <div class="bg-white/5 border border-white/5 rounded-3xl p-6 flex items-center justify-around gap-8">
                    <div class="text-center">
                        <p class="text-white font-black text-[22px]">04</p>
                        <p class="text-white/20 text-[10px] uppercase font-bold tracking-widest">Total Publishes</p>
                    </div>
                    <div class="h-10 w-px bg-white/5"></div>
                    <div class="text-center">
                        <p class="text-white font-black text-[22px]">+1</p>
                        <p class="text-white/20 text-[10px] uppercase font-bold tracking-widest">Recent Activity</p>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="pt-10 flex flex-col gap-4">
                    <button onclick="window.location.href='{{ route('consumer.creator.dashboard') }}'"
                        class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl hover:bg-[#3D51EF] transition-all shadow-xl shadow-blue-500/10 active:scale-[0.995]">
                        Go to Dashboard
                    </button>
                    <button onclick="window.location.href='{{ route('consumer.my.tracks') }}'"
                        class="w-full py-5 bg-transparent text-white/40 font-bold text-[16px] hover:text-white transition-all">
                        View My Tracks
                    </button>
                </div>

            </div>

        </div>
@endsection