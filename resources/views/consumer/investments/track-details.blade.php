@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pt-6 pb-20">

        {{-- Header --}}
        <div class="flex items-center gap-6 mb-12 border-b border-white/5 pb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-white transition-colors">
                <i class="fas fa-arrow-left text-2xl"></i>
            </a>
            <h1 class="text-[#4D61FF] text-3xl font-bold tracking-tight">View Track Details</h1>
        </div>

        {{-- Artist Info --}}
        <div class="flex items-center gap-6 mb-12">
            <div class="relative w-20 h-20 rounded-full overflow-hidden border-2 border-white/10">
                <img src="https://ui-avatars.com/api/?name=John+Smith&background=4D61FF&color=fff"
                    class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-white font-bold text-2xl leading-none mb-2">John Smith</h2>
                <p class="text-white/40 text-base font-medium">POP Music Expert</p>
            </div>
        </div>

        {{-- Player / Visual --}}
        <div
            class="relative w-full aspect-[2.8/1] bg-[#141414] rounded-[32px] overflow-hidden mb-12 border border-white/5 group shadow-2xl">
            {{-- Background Waveform Effect --}}
            <div class="absolute inset-0 bg-gradient-to-br from-[#141414] via-[#2A1A3A] to-[#141414] opacity-80"></div>

            {{-- Waveform Bars (Refinement) --}}
            <div class="absolute inset-x-12 inset-y-16 flex items-center justify-center gap-[4px] opacity-60">
                @for($i = 0; $i < 60; $i++)
                    <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(15, 100) }}%"></div>
                @endfor
            </div>

            {{-- Play Button --}}
            <button
                class="absolute left-10 bottom-10 w-14 h-14 bg-magenta rounded-full flex items-center justify-center text-white shadow-[0_0_30px_rgba(214,0,214,0.4)] hover:scale-110 active:scale-95 transition-all z-10">
                <i class="fas fa-play ml-1 text-xl"></i>
            </button>

            {{-- Time --}}
            <span class="absolute right-10 bottom-12 text-white font-bold tracking-widest text-2xl z-10">02:00</span>
        </div>

        {{-- Investment Details --}}
        <div class="space-y-12">
            <div class="border-b border-white/5 pb-10">
                <h3 class="text-white font-bold text-xl mb-8">Investment Details</h3>
                <div class="space-y-6">
                    <div class="flex justify-between items-center text-base">
                        <span class="text-white font-bold">Smart Contract ID</span>
                        <span class="text-white/40 font-medium">#025645687</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-white font-bold">License Type</span>
                        <span class="text-white/40 font-medium">Personal</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-white font-bold">Date Licensed</span>
                        <span class="text-white/40 font-medium">April 12, 2025</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-white font-bold">Price Paid</span>
                        <span class="text-white/40 font-medium">$120</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-white font-bold">Ownership</span>
                        <span class="text-white/40 font-medium">05% of track revenue</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-white font-bold">Investment Status</span>
                        <span class="text-[#22C55E] font-bold">Active</span>
                    </div>
                </div>
            </div>

            {{-- Licensing --}}
            <div>
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-white font-bold text-xl">Licensing</h3>
                    <div class="bg-[#1A1A1A] px-5 py-2 rounded-lg border border-white/5">
                        <span class="text-white font-bold text-lg leading-none tracking-tight">$19</span>
                    </div>
                </div>

                <div
                    class="bg-[#1A1A1A] rounded-[24px] px-8 py-6 flex items-center justify-between border border-white/5 hover:border-white/10 transition-colors group cursor-pointer">
                    <div class="flex items-center gap-4">
                        <i class="far fa-file-pdf text-[#4D61FF] text-xl"></i>
                        <span class="text-white font-medium text-lg">Standard Agreement.pdf</span>
                    </div>
                    <button class="text-[#4D61FF] font-bold text-lg group-hover:underline">View</button>
                </div>
            </div>
        </div>
    </div>
@endsection