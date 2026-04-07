@extends('layouts.app')

@section('content')
    <div class="space-y-12 pb-20">

        {{-- Header Section --}}
        <div class="flex flex-col lg:flex-row justify-between items-end gap-12 pt-6">
            <div class="space-y-1">
                <h1 class="text-[#4D61FF] text-[20px] font-black tracking-tight leading-none uppercase">Explore</h1>
                <h2 class="text-white text-[48px] font-bold tracking-tight leading-none mt-1">My Tracks</h2>
            </div>

            <div class="flex items-center gap-2 border-b border-white/5 w-full lg:w-auto">
                {{-- Active Tab --}}
                <a href="#"
                    class="px-6 py-4 text-white text-[14px] font-bold border-b-2 border-[#4D61FF] whitespace-nowrap transition-all uppercase tracking-widest">
                    My Published Tracks
                </a>
                {{-- Inactive Tab --}}
                <a href="#"
                    class="px-6 py-4 text-white/40 text-[14px] font-bold hover:text-white border-b-2 border-transparent hover:border-white/10 whitespace-nowrap transition-all uppercase tracking-widest">
                    Creations with AI
                </a>
            </div>
        </div>

        {{-- Track List --}}
        <div class="space-y-4 pt-4">
            @php
                $myTracks = [
                    ['title' => 'Family memories', 'genre' => 'Pop R&B', 'mood' => 'Warm happy', 'status' => 'Draft'],
                    ['title' => 'Midnight City', 'genre' => 'Synthwave', 'mood' => 'Retro night', 'status' => 'Completed'],
                    ['title' => 'Ocean Breeze', 'genre' => 'Acoustic', 'mood' => 'Calm sunny', 'status' => 'Completed'],
                ];
            @endphp

            @foreach ($myTracks as $track)
                <div class="bg-[#141414] rounded-[24px] p-6 flex flex-col md:flex-row items-center gap-8 border border-white/5 hover:border-[#4D61FF]/30 transition-all group">
                    {{-- Cover Art --}}
                    <div class="relative w-24 h-24 flex-shrink-0 rounded-[16px] overflow-hidden border border-white/5 bg-[#1A1A1A]">
                        <img src="https://picsum.photos/400/400?random={{ $loop->index + 700 }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <div class="w-10 h-10 bg-[#4D61FF] rounded-full flex items-center justify-center text-white shadow-lg cursor-pointer hover:bg-[#3D51EF] transition-colors">
                                <i class="fas fa-play text-xs ml-0.5"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Track Info --}}
                    <div class="flex-1 min-w-0 space-y-1 text-center md:text-left">
                        <h3 class="text-white text-[20px] font-bold tracking-tight leading-tight">{{ $track['title'] }}</h3>
                        <p class="text-white/40 text-[12px] font-medium uppercase tracking-wider">{{ $track['genre'] }} | {{ $track['mood'] }}</p>
                        
                        <div class="flex items-center justify-center md:justify-start gap-3 pt-2">
                            <span class="px-3 py-1 rounded-[8px] text-[10px] font-bold uppercase tracking-wider border {{ $track['status'] == 'Draft' ? 'bg-white/5 border-white/10 text-white/60' : 'bg-[#4D61FF]/10 border-[#4D61FF]/20 text-[#4D61FF]' }}">
                                {{ $track['status'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Waveform --}}
                    <div class="hidden xl:flex flex-1 items-center gap-[3px] h-8 opacity-30 group-hover:opacity-100 transition-opacity">
                        @for ($i = 0; $i < 40; $i++)
                            <div class="w-[2px] bg-[#4D61FF] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                        @endfor
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3">
                        @if($track['status'] == 'Completed')
                            <button class="w-10 h-10 rounded-[12px] bg-white/5 border border-white/5 flex items-center justify-center text-white/40 hover:text-white hover:border-white/20 transition-all">
                                <i class="fas fa-download text-sm"></i>
                            </button>
                        @endif
                        <button class="w-10 h-10 rounded-[12px] bg-white/5 border border-white/5 flex items-center justify-center text-white/40 hover:text-white hover:border-white/20 transition-all">
                            <i class="fas fa-gear text-sm"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Bottom Action --}}
        <div class="pt-8 max-w-[800px] mx-auto text-center">
            <button onclick="window.location.href='{{ route('consumer.forms.list-on-marketplace') }}'"
                class="w-full py-6 rounded-[24px] bg-transparent border border-dashed border-white/10 text-white/40 font-bold text-[16px] hover:border-[#4D61FF] hover:text-[#4D61FF] hover:bg-[#4D61FF]/5 transition-all uppercase tracking-widest group">
                <i class="fas fa-plus-circle mr-2 group-hover:scale-110 transition-transform"></i>
                List your track on QmeMarketplace
            </button>
        </div>

    </div>
@endsection
