@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ state: 'results' }">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Mood Analyzer</h1>
        </div>

        <div class="space-y-4 mb-10">
            <h2 class="text-white text-[28px] font-bold">Lorem Ipsum</h2>
            <p class="text-white/30 text-[16px] font-medium">beat.wav - 120 BPM - 2.3 MB</p>
        </div>

        {{-- Playback Feedback (Figma Match) --}}
        <div class="bg-[#141414] rounded-[32px] p-8 border border-white/[0.03] flex items-center gap-8 mb-16 shadow-2xl">
            <button
                class="w-14 h-14 bg-magenta rounded-full flex items-center justify-center shadow-xl group hover:scale-105 transition-transform">
                <i class="fas fa-play text-white text-xl ml-1"></i>
            </button>
            <div class="flex-1 flex items-center gap-[4px] h-10 opacity-40">
                @for($i = 0; $i < 65; $i++)
                    <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                @endfor
            </div>
            <span class="text-white/30 text-[14px] font-bold">02:00</span>
        </div>

        {{-- Analysis Results (Figma Match) --}}
        <div class="space-y-12 mb-16">
            <div class="space-y-3">
                <h3 class="text-white text-[22px] font-bold">Analysis result</h3>
                <p class="text-white/30 text-[16px] font-medium">Based on the analysis of your audio, here are Mood matches
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="space-y-6">
                    <h4 class="text-white text-[20px] font-bold">Primary Mood</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-white/50 text-[17px] font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-magenta/40"></span>
                            Energetic
                        </li>
                        <li class="flex items-center gap-3 text-white/50 text-[17px] font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-magenta/40"></span>
                            Uplifting
                        </li>
                    </ul>
                </div>

                <div class="space-y-6">
                    <h4 class="text-white text-[20px] font-bold">Secondary Mood</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-white/50 text-[17px] font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#4D61FF]/40"></span>
                            Energetic
                        </li>
                        <li class="flex items-center gap-3 text-white/50 text-[17px] font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#4D61FF]/40"></span>
                            Uplifting
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="pt-10">
            <button onclick="window.location.href='{{ route('consumer.forms.success.track-ready') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Apply & Continue
            </button>
        </div>

    </div>
@endsection