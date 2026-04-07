@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-4">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Files Uploaded Successfully</h1>
        </div>

        <x-studio-stepper :currentStep="2" />

        <div class="space-y-12 mb-16">
            {{-- File Idea --}}
            <div class="space-y-6">
                <h3 class="text-white text-[19px] font-bold">Your file idea</h3>
                <div class="bg-[#141414] rounded-[24px] p-8 border border-white/[0.03] space-y-2">
                    <p class="text-white text-[17px] font-bold">My Music file</p>
                    <p class="text-white/30 text-[14px] font-medium">beat.wav • 120 BPM • 3.2 MB</p>
                </div>
            </div>

            {{-- Recorded Audio --}}
            <div class="space-y-6">
                <h3 class="text-white text-[19px] font-bold">Your recorded audio</h3>
                <div class="bg-[#141414] rounded-[24px] p-8 border border-white/[0.03] flex items-center gap-8">
                    <button class="w-14 h-14 bg-magenta rounded-full flex items-center justify-center shadow-xl">
                        <i class="fas fa-play text-white text-xl ml-1"></i>
                    </button>
                    <div class="flex-1 flex items-center gap-[4px] h-10 opacity-40">
                        @for($i = 0; $i < 50; $i++)
                            <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                        @endfor
                    </div>
                    <span class="text-white/30 text-[14px] font-bold">02:00</span>
                </div>
            </div>

            {{-- Text Idea --}}
            <div class="space-y-6">
                <h3 class="text-white text-[19px] font-bold">Your text idea</h3>
                <div
                    class="bg-[#141414] rounded-[24px] p-8 border border-white/[0.03] text-white/40 text-[15px] leading-relaxed italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                </div>
            </div>
        </div>

        <div class="pt-10">
            <button onclick="window.location.href='{{ route('consumer.studio.timeline-mixing') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Approve to continue
            </button>
        </div>

    </div>
@endsection