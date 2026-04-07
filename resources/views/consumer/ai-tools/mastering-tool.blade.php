@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ state: 'results' }">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Mastering Tool</h1>
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

        {{-- Mastering Suggestions (Figma Match) --}}
        <div class="space-y-10 mb-16">
            <div class="space-y-2">
                <h3 class="text-white text-[22px] font-bold">Mastering Suggestions</h3>
                <p class="text-white/30 text-[16px] font-medium">Here's how we can enhance your track for a professional,
                    release-ready sound.</p>
            </div>

            <div class="space-y-6">
                @foreach (['Increase Overall Loudness', 'Enhance Clarity', 'Balance Low-End', 'Stereo Enhancement'] as $suggestion)
                    <label class="flex items-center gap-5 cursor-pointer group">
                        <div class="relative flex items-center justify-center">
                            <input type="checkbox" class="peer hidden" {{ $loop->first ? 'checked' : '' }}>
                            <div
                                class="w-6 h-6 border-2 border-white/10 rounded-md peer-checked:bg-[#4D61FF] peer-checked:border-[#4D61FF] transition-all flex items-center justify-center">
                                <i
                                    class="fas fa-check text-white text-[10px] scale-0 peer-checked:scale-100 transition-transform"></i>
                            </div>
                        </div>
                        <span
                            class="text-white text-[18px] font-semibold opacity-90 group-hover:text-white transition-opacity">{{ $suggestion }}</span>
                    </label>
                @endforeach
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