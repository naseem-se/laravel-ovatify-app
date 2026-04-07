@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-6 pt-2 mb-4">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[24px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[36px] font-bold tracking-tight">Track mixing</h1>
        </div>

        <x-studio-stepper :currentStep="4" />

        <div class="space-y-2 mb-10 pl-2">
            <p class="text-white/30 text-[12px] font-bold uppercase tracking-widest">Track Name</p>
            <h2 class="text-white text-[32px] font-bold tracking-tight">Reflection</h2>
        </div>

        {{-- Main Content Card --}}
        <div class="bg-[#141414] rounded-[32px] border border-white/[0.03] p-10 space-y-12">

            {{-- Master Waveform --}}
            <div class="bg-[#0D0D0D] rounded-[24px] p-8 flex items-center gap-8 border border-white/[0.03]">
                <button
                    class="w-14 h-14 bg-magenta rounded-full flex items-center justify-center shadow-xl group hover:scale-105 transition-transform">
                    <i class="fas fa-play text-white text-xl ml-1"></i>
                </button>
                <div class="flex-1 flex items-center gap-[4px] h-12 opacity-40">
                    @for($i = 0; $i < 65; $i++)
                        <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                    @endfor
                </div>
                <span class="text-white/30 text-[14px] font-bold">02:00</span>
            </div>

            {{-- Timeline Area --}}
            <div class="relative pt-6">
                {{-- Time Markers --}}
                <div class="flex ml-[120px] mb-6 text-white/20 text-[14px] font-bold">
                    <span class="w-[150px]">0</span>
                    <span class="w-[150px]">5</span>
                    <span class="w-[150px]">10</span>
                </div>

                <div class="space-y-4">
                    {{-- Tempo Track --}}
                    <div class="flex items-center gap-6">
                        <div
                            class="w-24 bg-[#0D0D0D] rounded-2xl py-4 flex flex-col items-center gap-2 border border-white/[0.03]">
                            <i class="fas fa-wave-square text-[#4D61FF] text-xl"></i>
                            <span class="text-[11px] font-bold text-white/30 uppercase tracking-widest">Tempo</span>
                        </div>
                        <div
                            class="flex-1 h-20 bg-[#4D61FF]/10 rounded-2xl border border-[#4D61FF]/20 relative overflow-hidden">
                            {{-- Blue Waveform --}}
                            <div class="absolute inset-0 flex items-center gap-[3px] px-8 opacity-90">
                                @for($i = 0; $i < 45; $i++)
                                    <div class="w-[4px] bg-[#4D61FF] rounded-full" style="height: {{ rand(30, 80) }}%"></div>
                                @endfor
                            </div>
                            <div class="absolute inset-y-0 left-0 bg-[#4D61FF]/10 w-3/4"></div>
                        </div>
                    </div>

                    {{-- Beat Track --}}
                    <div class="flex items-center gap-6">
                        <div
                            class="w-24 bg-[#0D0D0D] rounded-2xl py-4 flex flex-col items-center gap-2 border border-white/[0.03]">
                            <i class="fas fa-heartbeat text-purple-500 text-xl"></i>
                            <span class="text-[11px] font-bold text-white/30 uppercase tracking-widest">Beat</span>
                        </div>
                        <div
                            class="flex-1 h-20 bg-purple-500/10 rounded-2xl border border-purple-500/20 relative overflow-hidden">
                            {{-- Purple Waveform --}}
                            <div class="absolute inset-0 flex items-center gap-[3px] px-8 opacity-90">
                                @for($i = 0; $i < 30; $i++)
                                    <div class="w-[4px] bg-purple-500 rounded-full" style="height: {{ rand(30, 80) }}%"></div>
                                @endfor
                            </div>
                            <div class="absolute inset-y-0 left-0 bg-purple-500/10 w-1/2"></div>
                        </div>
                    </div>

                    {{-- Vocals Track --}}
                    <div class="flex items-center gap-6">
                        <div
                            class="w-24 bg-[#0D0D0D] rounded-2xl py-4 flex flex-col items-center gap-2 border border-white/[0.03]">
                            <i class="fas fa-microphone text-[#4D61FF] text-xl"></i>
                            <span class="text-[11px] font-bold text-white/30 uppercase tracking-widest">Vocals</span>
                        </div>
                        <div
                            class="flex-1 h-14 bg-[#4D61FF]/10 rounded-2xl border border-[#4D61FF]/20 relative overflow-hidden">
                            {{-- Blue Waveform --}}
                            <div class="absolute inset-0 flex items-center gap-[3px] px-8 opacity-90">
                                @for($i = 0; $i < 20; $i++)
                                    <div class="w-[4px] bg-[#4D61FF] rounded-full" style="height: {{ rand(30, 80) }}%"></div>
                                @endfor
                            </div>
                            <div class="absolute inset-y-0 left-0 bg-[#4D61FF]/10 w-1/4"></div>
                        </div>
                    </div>
                </div>

                {{-- Playhead line --}}
                <div
                    class="absolute left-[300px] top-10 bottom-0 w-[2px] bg-white shadow-[0_0_15px_white] z-10 before:content-[''] before:absolute before:top-0 before:left-1/2 before:-translate-x-1/2 before:w-4 before:h-4 before:bg-white before:rounded-full before:-mt-2">
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="pt-10 space-y-4">
                <button onclick="window.location.href='{{ route('consumer.studio.mixed-summary') }}'"
                    class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[18px] rounded-2xl hover:bg-[#3D51EF] transition-all transform active:scale-[0.995]">
                    Approve mix & generate
                </button>
                <button onclick="window.history.back()"
                    class="w-full py-5 bg-transparent border border-white/10 text-white font-bold text-[16px] rounded-2xl hover:bg-white/5 transition-all transform active:scale-[0.995]">
                    Back
                </button>
            </div>
        </div>

    </div>
@endsection