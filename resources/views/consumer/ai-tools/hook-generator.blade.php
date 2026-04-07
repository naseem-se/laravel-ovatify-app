@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ state: 'results' }">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Hook Generator</h1>
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

        {{-- Results Section (Figma Match) --}}
        <div class="space-y-8 mb-16">
            <p class="text-white text-[18px] font-semibold opacity-90">Hooks added to your project successfully</p>

            <div
                class="bg-[#141414] rounded-2xl p-6 border border-white/[0.03] flex items-center justify-between group cursor-pointer hover:border-[#4D61FF]/40 transition-all">
                <span class="text-white/50 text-[16px] font-medium">Your Generated hooks</span>
                <i class="fas fa-chevron-down text-[#4D61FF] text-sm"></i>
            </div>
        </div>

        <div class="pt-10">
            <button @click="state = 'saved'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Save to my projects
            </button>
        </div>

        {{-- SUCCESS MODAL STATE --}}
        <template x-if="state === 'saved'">
            <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-black/90 backdrop-blur-md"></div>

                {{-- Modal --}}
                <div
                    class="relative bg-[#0F0F0F] border border-white/[0.05] rounded-[48px] w-full max-w-lg p-12 shadow-3xl text-center overflow-hidden">
                    {{-- Decorative Circles --}}
                    <div class="absolute top-10 left-20 w-4 h-4 rounded-full bg-magenta/50"></div>
                    <div class="absolute top-40 right-10 w-3 h-3 rounded-full bg-[#4D61FF]/50 blur-[1px]"></div>
                    <div class="absolute bottom-20 left-10 w-2 h-2 rounded-full bg-magenta/30"></div>

                    {{-- Success Icon --}}
                    <div class="relative inline-block mb-10">
                        <div
                            class="w-24 h-24 rounded-full bg-magenta flex items-center justify-center shadow-[0_0_40px_rgba(255,0,255,0.3)]">
                            <i class="fas fa-check text-white text-4xl"></i>
                        </div>
                    </div>

                    <h2 class="text-white text-[32px] font-bold mb-3 tracking-tight">Your Track has been saved!</h2>
                    <p class="text-white/30 text-[17px] font-medium mb-12">You can access it in your projects</p>

                    <div class="space-y-4">
                        <button onclick="window.location.reload()"
                            class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[18px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all">
                            Upload another track
                        </button>
                        <button onclick="window.location.href='{{ route('consumer.creator.dashboard') }}'"
                            class="w-full py-5 bg-transparent border-[1.5px] border-white/10 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all">
                            Back to home
                        </button>
                    </div>
                </div>
            </div>
        </template>

    </div>
@endsection