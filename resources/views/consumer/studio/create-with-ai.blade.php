@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-4 pt-4 mb-2">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-opacity">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Describe your idea</h1>
        </div>

        {{-- Subtext & Divider --}}
        <p class="text-white/40 text-[18px] font-medium mb-10">
            Share detail, concepts to start creating
        </p>
        <div class="h-[1px] bg-white/5 w-full mb-12"></div>

        <div class="max-w-[900px] space-y-12">

            {{-- Record Reference Card --}}
            <div class="bg-[#141414] border border-white/[0.03] rounded-[32px] p-8 space-y-10">
                <div class="flex items-center gap-4 text-white">
                    <i class="fas fa-microphone text-[20px]"></i>
                    <h2 class="text-[18px] font-bold">Record Reference</h2>
                </div>
                <button onclick="window.location.href='{{ route('consumer.studio.record') }}'"
                    class="w-full py-5 bg-transparent border border-[#4D61FF]/30 text-[#4D61FF] font-bold text-[16px] rounded-2xl hover:bg-[#4D61FF]/5 transition-all">
                    Record now
                </button>
            </div>

            {{-- Upload Document Card --}}
            <div class="bg-[#141414] border border-white/[0.03] rounded-[32px] p-8 space-y-10">
                <div class="flex items-center gap-4 text-white">
                    <i class="far fa-file-alt text-[20px]"></i>
                    <h2 class="text-[18px] font-bold">Upload Document</h2>
                </div>
                <button
                    class="w-full py-5 bg-transparent border border-[#4D61FF]/30 text-[#4D61FF] font-bold text-[16px] rounded-2xl hover:bg-[#4D61FF]/5 transition-all">
                    Upload
                </button>
            </div>

            {{-- Write Description --}}
            <div class="space-y-6">
                <label class="text-white font-bold text-[18px] block">Write Description</label>
                <textarea placeholder="Write your idea" rows="8"
                    class="w-full bg-[#141414] border border-white/5 rounded-[32px] py-10 px-10 text-white text-[16px] focus:outline-none focus:border-[#4D61FF]/40 placeholder:text-white/10 transition-all resize-none"></textarea>
            </div>

            {{-- Final Continue Button --}}
            <div class="pt-6">
                <button onclick="window.location.href='{{ route('consumer.studio.timeline-mixing') }}'"
                    class="w-full py-6 bg-transparent border border-white/20 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all active:scale-[0.995]">
                    Continue
                </button>
            </div>

        </div>

    </div>
@endsection