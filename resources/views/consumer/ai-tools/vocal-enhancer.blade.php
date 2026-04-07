@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ state: 'input' }">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Vocal Enhancer</h1>
        </div>

        <div class="space-y-4 mb-10">
            <h2 class="text-white text-[28px] font-bold">Lorem Ipsum</h2>
            <p class="text-white/30 text-[16px] font-medium">beat.wav - 120 BPM - 2.3 MB</p>
        </div>

        {{-- Playback Feedback (Figma Match) --}}
        <div class="bg-[#141414] rounded-[32px] p-8 border border-white/[0.03] flex items-center gap-8 mb-16 shadow-2xl">
            <button
                class="w-14 h-14 bg-[#4D61FF] rounded-full flex items-center justify-center shadow-xl group hover:scale-105 transition-transform">
                <i class="fas fa-play text-white text-xl ml-1"></i>
            </button>
            <div class="flex-1 flex items-center gap-[4px] h-10 opacity-40">
                @for($i = 0; $i < 65; $i++)
                    <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                @endfor
            </div>
            <span class="text-white/30 text-[14px] font-bold">02:00</span>
        </div>

        {{-- STATE: INPUT FORM (Figma Creator/Vocal Enhancer.png) --}}
        <div x-show="state === 'input'" class="space-y-12">
            <div class="space-y-6">
                <label class="text-white text-[18px] font-bold opacity-90 block">Do you want to generate new vocals or
                    enhance existing ones?</label>
                <div class="relative">
                    <select
                        class="w-full bg-[#141414] border border-white/[0.03] rounded-2xl py-5 px-8 text-white/50 text-[17px] focus:border-[#4D61FF]/40 focus:ring-0 appearance-none transition-all">
                        <option>Generate new vocals</option>
                        <option>Enhance existing vocals</option>
                    </select>
                    <div class="absolute right-8 top-1/2 -translate-y-1/2 pointer-events-none">
                        <i class="fas fa-chevron-down text-white/20"></i>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-[#141414] rounded-[32px] border border-white/[0.03] p-8 min-h-[300px] h-auto flex flex-col">
                    <textarea placeholder="Describe your vocal style (e.g. soulful, robotic, airy)"
                        class="bg-transparent border-none text-white/40 text-[17px] font-medium placeholder:text-white/10 focus:ring-0 resize-none w-full h-full min-h-[220px]"></textarea>
                </div>
            </div>

            <div class="space-y-6">
                <label class="text-white text-[18px] font-bold opacity-90 block">Select Vocal type</label>
                <div class="h-[1px] bg-white/5 w-full"></div>
            </div>

            <div class="pt-4">
                <button @click="state = 'results'"
                    class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                    Run Vocal Enhancer
                </button>
            </div>
        </div>

        {{-- STATE: RESULTS (Existing Design) --}}
        <div x-show="state === 'results'" x-cloak class="space-y-12">
            <div class="space-y-8 mb-16">
                <h3 class="text-white text-[22px] font-bold">What changes were made?</h3>
                <ul class="space-y-4">
                    <li class="flex items-center gap-4 text-white/50 text-[17px] font-medium group">
                        <span
                            class="w-2 h-2 rounded-full bg-[#4D61FF]/40 group-hover:bg-[#4D61FF] transition-colors"></span>
                        Applied R&B Female Vocal with Energetic Mood.
                    </li>
                </ul>
            </div>

            <div class="space-y-6">
                <button @click="state = 'input'"
                    class="w-full py-5 bg-transparent border-[1.5px] border-white/20 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                    Re-run with different settings
                </button>

                <button @click="state = 'success'"
                    class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                    Save my track
                </button>
            </div>
        </div>

        {{-- STATE: SUCCESS MODAL --}}
        <template x-if="state === 'success'">
            <div class="fixed inset-0 z-[100] flex items-center justify-center p-6">
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black/90" @click="state = 'default'"></div>

                <!-- Modal Content -->
                <div class="relative bg-[#0D0D0D] border border-white/5 rounded-[64px] max-w-[600px] w-full p-16 text-center overflow-hidden"
                    x-show="state === 'success'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

                    <!-- Success Icon Wrapper -->
                    <div class="relative mb-12 flex justify-center">
                        <div class="w-32 h-32 bg-[#4D61FF] rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-4xl text-white"></i>
                        </div>
                    </div>

                    <div class="space-y-4 mb-16">
                        <h2 class="text-white text-[48px] font-black tracking-tighter leading-none uppercase">
                            Success!</h2>
                        <p class="text-white/20 text-[18px] font-bold tracking-tight">Your tracks have been
                            enhanced and added to your collection.</p>
                    </div>

                    <div class="space-y-6">
                        <button onclick="window.location.href='{{ route('consumer.studio.upload') }}'"
                            class="w-full py-6 bg-[#4D61FF] text-white font-black text-[18px] rounded-[24px] hover:bg-[#3D51EF] transition-all uppercase tracking-widest active:scale-[0.98]">
                            Upload Another
                        </button>
                        <button onclick="window.location.href='{{ route('consumer.creator.dashboard') }}'"
                            class="w-full py-6 bg-transparent border-2 border-white/10 text-white/40 font-black text-[18px] rounded-[24px] hover:text-white hover:border-white/20 transition-all uppercase tracking-widest">
                            Back to Dashboard
                        </button>
                    </div>
                </div>
            </div>
        </template>
@endsection