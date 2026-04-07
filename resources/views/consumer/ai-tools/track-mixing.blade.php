@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20 relative">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-4 pt-4 mb-2">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-opacity">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h1 class="text-[#4D61FF] text-3xl font-bold italic">Track mixing</h1>
        </div>
        <p class="text-gray-400 text-lg font-medium mb-12">Tell us more about your style so we can shape your idea better.
        </p>

        <div class="space-y-2 mb-10">
            <p class="text-white/30 text-xs font-bold uppercase tracking-widest">Track Name</p>
            <h2 class="text-white text-3xl font-bold">Reflection</h2>
        </div>

        {{-- Playback Waveform Box --}}
        <div class="bg-[#141414] rounded-[32px] p-8 border border-white/[0.03] space-y-6 mb-16">
            <div class="flex items-center gap-6">
                <button
                    class="w-12 h-12 border-2 border-magenta rounded-full flex items-center justify-center group hover:scale-105 transition-transform">
                    <i class="fas fa-play text-magenta text-xs ml-0.5"></i>
                </button>
                <div class="flex-1 h-12 flex items-center gap-[3px] opacity-40">
                    @for($i = 0; $i < 50; $i++)
                        <div class="flex-1 bg-blue-600 rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                    @endfor
                </div>
                <span class="text-white/30 text-xs font-bold">02:00</span>
            </div>
        </div>

        {{-- Tempo Slider --}}
        <div class="space-y-8 mb-16">
            <h3 class="text-white text-xl font-bold">Adjust you track Tempo</h3>
            <div class="relative pt-4 pb-2">
                <div class="h-2 bg-[#444444] rounded-full w-full"></div>
                <div class="absolute top-1/2 -translate-y-1/2 left-0 h-2 bg-[#4D61FF] rounded-full" style="width: 5%"></div>
                <div
                    class="absolute top-1/2 -translate-y-1/2 left-[5%] w-6 h-6 bg-[#4D61FF] rounded-full border-4 border-[#141414] shadow-lg">
                </div>
                <div class="flex justify-end mt-4">
                    <span class="text-white/20 text-[10px] font-bold">30 BPM</span>
                </div>
            </div>
        </div>

        {{-- Equalizer --}}
        <div class="space-y-8 mb-16">
            <h3 class="text-white text-xl font-bold">Equalizer</h3>
            <div class="bg-[#141414] rounded-[24px] p-10 h-64 flex items-end justify-between border border-white/[0.03]">
                @for($i = 0; $i < 6; $i++)
                    <div class="flex flex-col items-center gap-4 h-full">
                        <div class="flex-1 w-[2px] bg-white/10 relative">
                            @php $pos = [80, 70, 60, 50, 40, 30][$i]; @endphp
                            <div class="absolute w-5 h-5 bg-[#4D61FF] rounded-full left-1/2 -translate-x-1/2 border-4 border-[#141414]"
                                style="bottom: {{ $pos }}%"></div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="pt-10">
            <button onclick="window.location.href='{{ route('consumer.studio.timeline-mixing') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Continue to arrange
            </button>
        </div>

        {{-- SUCCESS MODAL --}}
        <template x-if="state === 'applied'">
            <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>

                {{-- Modal --}}
                <div
                    class="relative bg-[#1A1A1A] border border-gray-800 rounded-[40px] w-full max-w-lg p-12 shadow-2xl text-center">
                    {{-- Decorative Circles --}}
                    <div class="absolute top-10 left-20 w-4 h-4 rounded-full bg-magenta"></div>
                    <div class="absolute top-40 right-10 w-3 h-3 rounded-full bg-blue-500 blur-[2px]"></div>

                    {{-- Icon Container --}}
                    <div class="relative inline-block mb-10">
                        <div
                            class="w-28 h-28 rounded-full bg-magenta flex items-center justify-center shadow-[0_0_50px_rgba(214,0,214,0.4)]">
                            <i class="fas fa-check text-white text-5xl"></i>
                        </div>
                    </div>

                    <h2 class="text-white text-3xl font-bold mb-4">Suggestions applied to your track!</h2>
                    <p class="text-gray-500 text-lg mb-12">You can access it in your projects</p>

                    <div class="space-y-4">
                        <button onclick="window.location.reload()"
                            class="w-full py-5 bg-[#4D61FF] text-white font-bold text-xl rounded-2xl shadow-lg hover:bg-[#3D51EF] transition-all">
                            Upload another track
                        </button>
                        <button onclick="window.location.href='{{ route('consumer.creator.dashboard') }}'"
                            class="w-full py-5 bg-transparent border-2 border-white/5 text-white font-bold text-xl rounded-2xl hover:bg-white/5 transition-all">
                            Back to home
                        </button>
                    </div>
                </div>
            </div>
        </template>

    </div>
@endsection