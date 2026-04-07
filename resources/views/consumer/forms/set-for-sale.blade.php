@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-2">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Set up for digital purchase</h1>
        </div>

        <p class="text-white/40 text-[17px] font-medium mb-12">
            Add details to make your track available for sale
        </p>

        {{-- Form Content (Figma Match) --}}
        <div class="space-y-12">
            {{-- Cover Art Upload --}}
            <div
                class="relative w-full aspect-[2/1] bg-[#141414] border-2 border-dashed border-[#4D61FF]/20 rounded-[48px] flex flex-col items-center justify-center gap-4 group cursor-pointer hover:border-[#4D61FF]/40 transition-all">
                <div
                    class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-image text-white/30 text-2xl"></i>
                </div>
                <p class="text-white/30 text-[17px] font-bold tracking-tight">Upload your cover art</p>
            </div>

            {{-- Price Details --}}
            <div class="space-y-6">
                <label class="text-white text-[18px] font-bold opacity-90 block">Track Price</label>
                <div class="flex gap-4">
                    <div class="flex-1 bg-[#141414] rounded-2xl border border-white/[0.03] p-6 flex items-center">
                        <input type="text" placeholder="Price your Track"
                            class="bg-transparent border-none text-white text-[16px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                    </div>
                    <button
                        class="px-8 bg-[#4D61FF] text-white font-bold text-[15px] rounded-2xl hover:bg-[#3D51EF] transition-all">
                        Set
                    </button>
                </div>
            </div>

            {{-- Preview Duration --}}
            <div class="space-y-6">
                <label class="text-white text-[18px] font-bold opacity-90 block">Preview Duration</label>
                <div class="grid grid-cols-4 gap-6">
                    @for($i = 0; $i < 4; $i++)
                        <div class="h-8 bg-[#141414] border border-white/[0.03] rounded-full"></div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="pt-20">
            <button onclick="window.location.href='{{ route('consumer.forms.success.sale') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Publish for sale
            </button>
        </div>

    </div>
@endsection