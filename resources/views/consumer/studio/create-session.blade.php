@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-6 pt-2 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Create your session</h1>
        </div>

        {{-- Subtext & Divider --}}
        <p class="text-white/40 text-[18px] font-medium mb-10">
            Start by adding a cover, title, and a quick overview to set the tone for your project.
        </p>
        <div class="h-[1px] bg-white/5 w-full mb-12"></div>

        <div class="max-w-[900px]">
            {{-- Upload Cover Art (Figma Match) --}}
            <div class="space-y-4 mb-12">
                <div
                    class="w-full h-[380px] rounded-[24px] border-2 border-dashed border-[#4D61FF]/20 bg-[#141414] flex flex-col items-center justify-center gap-5 hover:border-[#4D61FF]/40 transition-all cursor-pointer group">
                    <div
                        class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center text-white/30 group-hover:text-white transition-all">
                        <i class="far fa-image text-3xl"></i>
                    </div>
                    <p class="text-white/40 text-[17px] font-medium">Upload your cover art</p>
                </div>
            </div>

            {{-- Form Fields --}}
            <div class="space-y-10">
                <div class="space-y-4">
                    <label class="text-white font-bold text-[18px] block">Track Title</label>
                    <input type="text" placeholder="Enter your track title"
                        class="w-full bg-[#1A1A1A] border border-white/5 rounded-2xl py-6 px-8 text-white text-[16px] focus:outline-none focus:border-[#4D61FF]/40 placeholder:text-white/10 transition-all">
                </div>

                <div class="space-y-4">
                    <label class="text-white font-bold text-[18px] block">Title Description</label>
                    <textarea placeholder="Enter your track description" rows="5"
                        class="w-full bg-[#1A1A1A] border border-white/5 rounded-2xl py-6 px-8 text-white text-[16px] focus:outline-none focus:border-[#4D61FF]/40 placeholder:text-white/10 transition-all resize-none"></textarea>
                </div>

                {{-- Action Button --}}
                <div class="pt-6">
                    <button onclick="window.location.href='{{ route('consumer.studio.upload') }}'"
                        class="w-full py-6 bg-transparent border border-white/20 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                        Continue
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection