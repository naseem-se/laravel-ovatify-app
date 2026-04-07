@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">AI Mixing Assistant</h1>
        </div>

        <div class="space-y-4 mb-10">
            <h2 class="text-white text-[28px] font-bold">Lorem Ipsum</h2>
            <p class="text-white/30 text-[16px] font-medium">beat.wav - 120 BPM - 2.3 MB</p>
        </div>

        {{-- Playback Feedback (Figma Match) --}}
        <div
            class="bg-[#141414] rounded-[32px] p-8 border border-white/[0.03] flex items-center gap-8 mb-16 shadow-2xl relative overflow-hidden">
            <button
                class="w-14 h-14 bg-magenta rounded-full flex items-center justify-center shadow-xl group hover:scale-105 transition-transform relative z-10">
                <i class="fas fa-play text-white text-xl ml-1"></i>
            </button>
            <div class="flex-1 flex items-center gap-[4px] h-10 opacity-40 relative z-10">
                @for($i = 0; $i < 65; $i++)
                    <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                @endfor
            </div>
            <span class="text-white/30 text-[14px] font-bold relative z-10">02:00</span>
        </div>

        {{-- Analyzing State (Figma Match) --}}
        <div class="bg-[#141414] rounded-[32px] p-10 border border-white/[0.03] shadow-2xl space-y-8">
            <p class="text-white text-[18px] font-semibold opacity-90">Analyzing Your Track...</p>

            <div class="relative w-full h-[6px] bg-white/[0.05] rounded-full overflow-hidden">
                <div
                    class="absolute left-0 top-0 h-full bg-[#4D61FF] rounded-full w-2/3 shadow-[0_0_15px_rgba(77,97,255,0.4)] animate-pulse">
                </div>
            </div>
        </div>

    </div>

    <script>
        // Auto-redirect to next step for demo purposes after 3 seconds
        setTimeout(() => {
            window.location.href = "{{ route('consumer.studio.track-mixing') }}";
        }, 3000);
    </script>
@endsection