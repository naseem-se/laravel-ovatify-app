@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ state: 'analyzing' }"
        x-init="setTimeout(() => state = 'results', 3000)">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Genre Matcher</h1>
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

        {{-- Analyzing State (Figma Match) --}}
        <template x-if="state === 'analyzing'">
            <div class="bg-[#141414] rounded-[32px] p-10 border border-white/[0.03] shadow-2xl space-y-8">
                <p class="text-white text-[18px] font-semibold opacity-90">Analyzing Your Track...</p>
                <div class="relative w-full h-[6px] bg-white/[0.05] rounded-full overflow-hidden">
                    <div
                        class="absolute left-0 top-0 h-full bg-[#4D61FF] rounded-full w-2/3 shadow-[0_0_15px_rgba(77,97,255,0.4)] animate-pulse">
                    </div>
                </div>
            </div>
        </template>

        {{-- Results Section (Figma Match) --}}
        <template x-if="state === 'results'">
            <div class="space-y-16">
                <div class="space-y-10">
                    <div class="space-y-3">
                        <h3 class="text-white text-[22px] font-bold">Analysis result</h3>
                        <p class="text-white/30 text-[16px] font-medium">Based on the analysis of your audio, here are the
                            top genre
                            matches</p>
                    </div>

                    <div class="space-y-4">
                        @php
                            $matches = [
                                ['name' => 'POP', 'val' => 85],
                                ['name' => 'RnB', 'val' => 50],
                                ['name' => 'Lo-Fi', 'val' => 10],
                            ];
                        @endphp
                        @foreach($matches as $m)
                            <div
                                class="bg-[#141414] rounded-2xl p-6 flex items-center justify-between border border-white/[0.03] group hover:border-white/10 transition-all">
                                <span
                                    class="text-white text-[18px] font-semibold opacity-90 uppercase tracking-wide">{{ $m['name'] }}</span>
                                <span class="text-white text-[18px] font-bold">{{ $m['val'] }}%</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-10">
                    <button onclick="window.location.href='{{ route('consumer.studio.customize') }}'"
                        class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                        Apply & Continue
                    </button>
                </div>
            </div>
        </template>

    </div>
@endsection