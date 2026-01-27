@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-end mb-16">
        <div>
            <h2 class="text-magenta text-sm font-black uppercase tracking-widest mb-1">HEY!</h2>
            <h1 class="text-4xl font-black text-white leading-tight">Ready to create?</h1>
        </div>

        {{-- Stats --}}
        <div class="flex gap-10 mb-1">
            <div class="flex flex-col items-center">
                <span class="text-xs font-black text-white">03</span>
                <p class="text-[9px] font-bold text-gray-500 uppercase tracking-widest">Publishes</p>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-xs font-black text-white">02</span>
                <p class="text-[9px] font-bold text-gray-500 uppercase tracking-widest">Drafts</p>
            </div>
            <div class="flex flex-col items-end">
                <span class="text-xs font-black text-white">$00,000</span>
                <p class="text-[9px] font-bold text-gray-500 uppercase tracking-widest">Earnings</p>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="space-y-4 mb-16">
        <a href="{{ route('consumer.ai-tools.track-mixing') }}"
            class="block w-full py-4 rounded-xl bg-[#4D61FF] text-white text-center text-xs font-black uppercase tracking-widest hover:brightness-110 transition shadow-xl">
            Create a new track with AI
        </a>
        <a href="{{ route('consumer.studio.upload') }}"
            class="block w-full py-4 rounded-xl bg-transparent border border-gray-800 text-white text-center text-xs font-black uppercase tracking-widest hover:bg-white/5 transition">
            Upload your own content
        </a>
    </div>

    {{-- New Releases --}}
    <h3 class="text-xl font-black mb-8">New Relaeses</h3>

    <div class="grid grid-cols-4 gap-6 mb-16">
        @for($i = 0; $i < 4; $i++)
            <div class="rounded-2xl overflow-hidden group">
                {{-- Track Image --}}
                <div class="relative h-40 p-4 flex flex-col justify-between track-card-bg">
                    {{-- Play Button --}}
                    <div class="flex justify-center flex-1 items-center">
                        <button
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-black/50 hover:bg-black/70 transition-all transform group-hover:scale-110">
                            <svg class="w-5 h-5 text-magenta ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>

                    {{-- Waveform --}}
                    <div class="flex items-end justify-center gap-0.5 h-6">
                        @foreach([30, 45, 35, 55, 30, 42, 50, 38, 48, 30, 40, 52, 35, 45, 38, 50, 32, 44, 48, 30] as $h)
                            <div class="w-1 rounded-full bg-[#4155B1]" style="height: {{ $h / 2.5 }}px;"></div>
                        @endforeach
                    </div>
                </div>

                {{-- Track Info --}}
                <div class="p-4 bg-[#252525]">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h4 class="font-medium text-sm">Cloudside</h4>
                            <p class="text-xs text-gray-500">R&B | Melancholic</p>
                        </div>
                        <span class="text-sm font-semibold">$19</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="https://i.pravatar.cc/24?img={{ $i }}" alt="Artist" class="w-5 h-5 rounded-full">
                        <span class="text-xs text-gray-400">Luna Beats</span>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    {{-- Creative Workspace --}}
    <h3 class="text-xl font-black mb-8">Creative Workspace</h3>

    <div class="grid grid-cols-5 gap-4 mb-16">
        @php
            $tools = [
                ['name' => 'Vocal Enhancer', 'route' => 'consumer.ai-tools.mixing-assistant'],
                ['name' => 'Lyric Assistance', 'route' => 'consumer.ai-tools.hook-generator'],
                ['name' => 'Melody Generator', 'route' => 'consumer.ai-tools.melody-generator'],
                ['name' => 'Hook Generator', 'route' => 'consumer.ai-tools.hook-generator'],
                ['name' => 'Genre Matcher', 'route' => 'consumer.ai-tools.genre-matcher'],
            ];
        @endphp

        @foreach($tools as $tool)
            <div
                class="p-5 rounded-2xl bg-[#1A1A1A] border border-gray-800 hover:border-gray-700 transition flex flex-col justify-between h-40">
                <h4 class="text-sm font-bold mb-4">{{ $tool['name'] }}</h4>
                <a href="{{ route($tool['route']) }}"
                    class="block w-full py-2.5 rounded-xl border border-primary-blue/50 text-[11px] font-bold text-white text-center hover:bg-primary-blue/10 transition">
                    Use it
                </a>
            </div>
        @endforeach
    </div>

    {{-- Collab Requests --}}
    <h3 class="text-xl font-black mb-8">Collab Requests</h3>

    <div class="grid grid-cols-3 gap-6 mb-16">
        @for($i = 0; $i < 3; $i++)
            <div class="p-5 rounded-2xl bg-[#1A1A1A] border border-gray-800">
                <div class="flex items-center gap-4 mb-4">
                    <img src="https://i.pravatar.cc/48?img={{ $i + 20 }}" alt="User"
                        class="w-12 h-12 rounded-full border-2 border-magenta/20">
                    <div>
                        <h4 class="text-sm font-bold">Artist Name</h4>
                        <p class="text-[11px] text-gray-500 font-medium font-inter">Wants to collaborate</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button
                        class="flex-1 py-2.5 rounded-xl bg-primary-blue text-[11px] font-bold text-white hover:brightness-110 transition">
                        Accept
                    </button>
                    <button
                        class="flex-1 py-2.5 rounded-xl bg-gray-800 text-[11px] font-bold text-gray-400 hover:text-white transition">
                        Decline
                    </button>
                </div>
            </div>
        @endfor
    </div>

@endsection