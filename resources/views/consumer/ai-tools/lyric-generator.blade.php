@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ state: 'results' }">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Finalize Lyric</h1>
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

        {{-- Lyrics Preview (Figma Match) --}}
        <div class="space-y-8 mb-16">
            <div class="flex justify-between items-center">
                <h3 class="text-white text-[22px] font-bold">Your Generated Lyrics</h3>
                <button class="text-[#4D61FF] text-[18px] font-bold hover:text-white transition-colors">Edit</button>
            </div>
            <div class="h-[1px] bg-white/5 w-full"></div>

            <div class="space-y-8 text-white/50 text-[18px] font-medium leading-relaxed max-w-[800px]">
                <div class="space-y-1">
                    <p class="text-white/30 mb-2 uppercase tracking-widest text-[11px] font-black">[Verse 1]</p>
                    <p>Woke up to a sky painted gold</p>
                    <p>Chasing dreams that I've been told</p>
                    <p>Fears behind and hopes ahead</p>
                    <p>Running free with no regret</p>
                </div>

                <div class="space-y-1">
                    <p class="text-white/30 mb-2 uppercase tracking-widest text-[11px] font-black">[Chorus]</p>
                    <p>Light it up, let the fire fly</p>
                    <p>We're the stars in the midnight sky</p>
                    <p>Hearts beat loud like a battle cry</p>
                    <p>Tonight's the night we learn to fly</p>
                </div>
            </div>
        </div>

        <div class="space-y-6 pt-10">
            <button onclick="window.location.href='{{ route('consumer.forms.success.track-ready') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Save & Continue
            </button>

            <button onclick="window.location.reload()"
                class="w-full py-5 bg-transparent border-[1.5px] border-white/20 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                Generate again
            </button>
        </div>

    </div>
@endsection