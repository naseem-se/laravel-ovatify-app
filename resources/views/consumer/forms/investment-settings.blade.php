@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-2">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Set Investment Terms</h1>
        </div>

        <p class="text-white/40 text-[17px] font-medium mb-12">
            Define pricing, ownership blocks, and revenue share details
        </p>

        {{-- Form Content (Figma Match) --}}
        <div class="space-y-12 mb-16">
            {{-- Cover Art Upload --}}
            <div
                class="relative w-full aspect-[2/1] bg-[#141414] border-2 border-dashed border-[#4D61FF]/20 rounded-[48px] flex flex-col items-center justify-center gap-4 group cursor-pointer hover:border-[#4D61FF]/40 transition-all">
                <div
                    class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-image text-white/30 text-2xl"></i>
                </div>
                <p class="text-white/30 text-[17px] font-bold tracking-tight">Upload your cover art</p>
            </div>

            {{-- Investment Grid (Figma Match) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                <div class="space-y-4">
                    <label class="text-white text-[16px] font-bold opacity-90 block">Total Track Valuation</label>
                    <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-6">
                        <input type="text" placeholder="Enter track valuation"
                            class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="text-white text-[16px] font-bold opacity-90 block">Ownership block</label>
                    <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-6">
                        <input type="text" placeholder="e.g. 5%"
                            class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="text-white text-[16px] font-bold opacity-90 block">Price per block</label>
                    <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-6">
                        <input type="text" placeholder="e.g. $5"
                            class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="text-white text-[16px] font-bold opacity-90 block">Set max availability blocks</label>
                    <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-6">
                        <input type="text" placeholder="e.g. 20"
                            class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10">
            <button onclick="window.location.href='{{ route('consumer.forms.success.investment') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Publish for Investment
            </button>
        </div>

    </div>
@endsection