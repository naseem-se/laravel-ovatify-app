@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-2">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Set up License</h1>
        </div>

        <p class="text-white/40 text-[17px] font-medium mb-12">
            Define how others can legally use your track
        </p>

        {{-- Form Content (Figma Match) --}}
        <div class="space-y-12 mb-16">
            {{-- License Title --}}
            <div class="space-y-4">
                <label class="text-white text-[16px] font-bold opacity-90 block">License Title</label>
                <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-6 flex items-center">
                    <input type="text" placeholder="Enter license title"
                        class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                </div>
            </div>

            {{-- License Types --}}
            <div class="space-y-6">
                <label class="text-white text-[16px] font-bold opacity-90 block">License Types</label>
                <div class="flex flex-wrap gap-8 items-center">
                    @foreach(['Personal Use', 'Commercial Use', 'YouTube Monetization', 'Sync Licensing (for ads, TV, etc.)'] as $type)
                        <label class="flex items-center gap-4 cursor-pointer group">
                            <input type="checkbox"
                                class="w-6 h-6 rounded border-none bg-blue-500/10 text-[#4D61FF] focus:ring-0" {{ $loop->first ? 'checked' : '' }}>
                            <span
                                class="text-white/40 text-[15px] font-semibold group-hover:text-white transition-colors">{{ $type }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Price & Duration --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="space-y-4">
                    <label class="text-white text-[16px] font-bold opacity-90 block">Set Price per License</label>
                    <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-6">
                        <input type="text" placeholder="e.g. $5"
                            class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="text-white text-[16px] font-bold opacity-90 block">License Duration</label>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach(['1 Year', '5 Years', '8 Years', 'Lifetime'] as $d)
                            <button
                                class="py-4 rounded-xl border border-white/5 bg-[#141414] text-white/40 text-[13px] font-bold hover:border-[#4D61FF]/40 hover:text-white transition-all {{ $loop->last ? 'bg-[#141414]/50' : '' }}">
                                {{ $d }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Smart Contract Editor --}}
            <div class="space-y-6">
                <label class="text-white text-[16px] font-bold opacity-90 block">Write smart contract</label>
                <div class="bg-[#141414] rounded-[32px] border border-white/[0.03] overflow-hidden shadow-2xl">
                    {{-- Toolbar --}}
                    <div class="px-8 py-5 border-b border-white/[0.03] flex items-center gap-24">
                        <div class="flex items-center gap-32">
                            <i class="fas fa-bold text-white text-[18px] cursor-pointer hover:opacity-70"></i>
                            <i class="fas fa-italic text-white text-[18px] cursor-pointer hover:opacity-70"></i>
                        </div>
                        <div class="flex items-center gap-32">
                            <i class="fas fa-list-ul text-white text-[20px] cursor-pointer hover:opacity-70"></i>
                            <i class="fas fa-list-ol text-white text-[20px] cursor-pointer hover:opacity-70"></i>
                        </div>
                    </div>
                    {{-- Content --}}
                    <div class="p-10 min-h-[240px]">
                        <p class="text-white text-[16px] font-bold mb-4">1. Grant of Rights</p>
                        <div class="h-40 w-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10">
            <button onclick="window.location.href='{{ route('consumer.agreements.preview') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Generate, Preview License
            </button>
        </div>

    </div>
@endsection