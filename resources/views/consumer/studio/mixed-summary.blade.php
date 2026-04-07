@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-4">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Completed Mixed Summary</h1>
        </div>

        <x-studio-stepper :currentStep="5" />

        <p class="text-white/40 text-[17px] font-medium mb-12">
            Summary of your mixed tracks
        </p>

        <div class="space-y-4 mb-4 mt-6">
            <p class="text-white/30 text-[13px] font-bold uppercase tracking-widest">Track Name</p>
            <h2 class="text-white text-[28px] font-bold tracking-tight">Reflection</h2>
        </div>

        {{-- Main Result Card --}}
        <div class="bg-[#141414] rounded-[32px] p-8 border border-white/[0.03] space-y-10 mb-12 shadow-2xl">
            {{-- Playback Feedback --}}
            <div class="flex items-center gap-8">
                <button
                    class="w-14 h-14 bg-magenta rounded-full flex items-center justify-center shadow-xl group hover:scale-105 transition-transform">
                    <i class="fas fa-play text-white text-xl ml-1"></i>
                </button>
                <div class="flex-1 flex items-center gap-[4px] h-10 opacity-40">
                    @for($i = 0; $i < 45; $i++)
                        <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                    @endfor
                </div>
                <span class="text-white/30 text-[14px] font-bold">02:00</span>
            </div>

            <div class="h-[1px] bg-white/5 w-full"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                {{-- Left Details --}}
                <div class="space-y-8">
                    <div class="space-y-2">
                        <p class="text-white/20 text-[12px] font-bold uppercase tracking-widest">Tempo</p>
                        <p class="text-white text-[18px] font-bold">80 BPM</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-white/20 text-[12px] font-bold uppercase tracking-widest">Scale</p>
                        <p class="text-white text-[18px] font-bold">G Minor</p>
                    </div>
                </div>

                {{-- Right Details --}}
                <div class="space-y-8">
                    <div class="space-y-2">
                        <p class="text-white/20 text-[12px] font-bold uppercase tracking-widest">Duration</p>
                        <p class="text-white text-[18px] font-bold">02:00</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-white/20 text-[12px] font-bold uppercase tracking-widest">Mixed by</p>
                        <p class="text-white text-[18px] font-bold">AI mixing assistant</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-8">
            <button onclick="window.location.href='{{ route('consumer.forms.success.track-ready') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Generate Final Mix
            </button>
        </div>

    </div>
@endsection