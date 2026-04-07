@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-4 pt-4 mb-2">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-opacity">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h1 class="text-[#4D61FF] text-3xl font-bold">Select your tempo</h1>
        </div>

        <x-studio-stepper :currentStep="2" />
        <p class="text-gray-400 text-lg font-medium mb-12">Choose your creative pace</p>

        {{-- Tempo Options Grid --}}
        <div class="space-y-6 mb-16" x-data="{ selected: 0 }">
            @php
                $tempos = [
                    ['title' => 'Very slow', 'range' => '20-60 BPM', 'desc' => 'Or select manually from 20-16 BPM', 'min' => 20, 'max' => 60, 'val' => 30],
                    ['title' => 'Slow to moderate', 'range' => '60-90 BPM', 'desc' => 'Or select manually from 60-90 BPM', 'min' => 60, 'max' => 90, 'val' => 75],
                    ['title' => 'Moderate (Middle range)', 'range' => '90-120 BPM', 'desc' => 'Or select manually from 90-120 BPM', 'min' => 90, 'max' => 120, 'val' => 105],
                ];
            @endphp

            @foreach($tempos as $i => $t)
                <div @click="selected = {{ $i }}" :class="selected === {{ $i }} ? 'border-[#4D61FF]' : 'border-white/5'"
                    class="bg-[#141414] rounded-3xl p-8 border-2 transition-all cursor-pointer group">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-14 h-14 bg-[#4D61FF]/10 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-music text-[#4D61FF] text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white text-xl font-bold">{{ $t['title'] }}</h3>
                            <p class="text-gray-500 font-bold">{{ $t['range'] }}</p>
                        </div>
                    </div>

                    <p class="text-white/20 text-xs font-bold uppercase tracking-wider mb-6">{{ $t['desc'] }}</p>

                    {{-- Slider Simulation --}}
                    <div class="relative pt-4 pb-2">
                        <div class="h-2 bg-[#444444] rounded-full w-full"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 left-0 h-2 bg-[#4D61FF] rounded-full" style="width: 20%">
                        </div>
                        <div
                            class="absolute top-1/2 -translate-y-1/2 left-[20%] w-6 h-6 bg-[#4D61FF] rounded-full border-4 border-[#141414] shadow-lg">
                        </div>
                        <div class="flex justify-between mt-4">
                            <span class="text-white/20 text-[10px] font-bold">30 BPM</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Action --}}
        <div class="pt-8">
            <button onclick="window.location.href='{{ route('consumer.studio.customize') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl hover:bg-[#3D51EF] transition-all shadow-xl">
                Create
            </button>
        </div>

    </div>
@endsection