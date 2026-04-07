@extends('layouts.app')

@section('content')
    <div class="h-full flex flex-col" x-data="{ state: 'entry' }">

        {{-- ENTRY STATE --}}
        <template x-if="state === 'entry'">
            <div class="flex-1 flex flex-col pt-8 px-8">
                {{-- Top Navigation --}}
                <div class="flex items-center gap-4 mb-2">
                    <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-opacity">
                        <i class="fas fa-arrow-left text-2xl"></i>
                    </a>
                    <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Record Audio</h1>
                </div>
                <div class="h-[1.5px] bg-white/5 w-full mb-20"></div>

                {{-- Record Button (Figma Match) --}}
                <div class="flex-1 flex items-center justify-center -mt-20">
                    <div class="relative w-56 h-56 group cursor-pointer" @click="state = 'review'">
                        {{-- Outer Glow/Gradient border - SPECIFIC FIGMA GRADIENT --}}
                        <div
                            class="absolute inset-0 rounded-full bg-gradient-to-b from-[#4d61ff] via-[#4d61ff] to-[#ff00ff] p-[4px] shadow-[0_0_50px_rgba(77,97,255,0.1)] group-hover:shadow-[0_0_70px_rgba(77,97,255,0.2)] transition-all">
                            <div class="w-full h-full bg-[#111111] rounded-full flex items-center justify-center">
                                <span class="text-white text-[16px] font-bold opacity-90">Start Recording</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Waveform (Thin Figma Style - ADJUSTED THICKNESS) --}}
                <div class="flex items-end justify-between gap-[4px] h-56 w-full opacity-60 mt-auto pb-4">
                    @for($i = 0; $i < 100; $i++)
                        @php $h = rand(10, 85); @endphp
                        <div class="w-[3px] bg-gradient-to-t from-[#4D61FF] to-[#4D61FF]/40 transition-all duration-300 rounded-full"
                            style="height: {{ $h }}%"></div>
                    @endfor
                </div>
            </div>
        </template>

        {{-- REVIEW STATE (Matching consistency) --}}
        <template x-if="state === 'review'">
            <div class="flex-1 flex flex-col pt-8 px-8">
                <h1 class="text-white text-[42px] font-bold mb-12 tracking-tight">Your recorded audio</h1>

                {{-- Horizontal Waveform Row --}}
                <div
                    class="bg-white/[0.03] rounded-[28px] p-8 border border-white/5 flex items-center gap-10 mb-16 shadow-xl">
                    <button
                        class="w-16 h-16 bg-magenta rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(255,0,255,0.3)] hover:scale-105 transition-transform">
                        <i class="fas fa-play text-white text-2xl ml-1"></i>
                    </button>
                    <div class="flex-1 h-12 flex items-center gap-[3px] opacity-40">
                        @for($i = 0; $i < 90; $i++)
                            <div class="flex-1 bg-[#4D61FF] rounded-full" style="height: {{ rand(30, 100) }}%"></div>
                        @endfor
                    </div>
                    <span class="text-white/40 text-[18px] font-bold">02:00</span>
                </div>

                {{-- Actions --}}
                <div class="mt-auto pb-8 space-y-5">
                    <button onclick="window.location.href='{{ route('consumer.studio.tempo') }}'"
                        class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                        Approve to continue
                    </button>
                    <button @click="state = 'entry'"
                        class="w-full py-5 bg-transparent border-[1.5px] border-white/10 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                        Record again
                    </button>
                </div>
            </div>
        </template>
    </div>

    </div>
@endsection