@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20 pt-10">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 mb-4">
            <a href="{{ route('consumer.creator.studio.upload.select-type') }}"
                class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[24px]"></i>
            </a>
            <h1 class="text-white text-[48px] font-black tracking-tighter uppercase leading-none">Upload File</h1>
        </div>

        <p class="text-white/20 text-[18px] font-bold mb-16 tracking-tight">
            Drag and drop your creative masterwork.
        </p>

        {{-- Upload Container --}}
        <div class="space-y-12">
            <div
                class="relative w-full h-[520px] rounded-[64px] border-4 border-dashed border-white/5 bg-[#141414] flex flex-col items-center justify-center gap-10 hover:border-[#4D61FF] transition-all cursor-pointer group">
                <div
                    class="w-24 h-24 bg-white/5 rounded-[32px] flex items-center justify-center text-white/20 group-hover:text-[#4D61FF] group-hover:bg-[#4D61FF]/10 transition-all">
                    <i class="fas fa-cloud-arrow-up text-4xl"></i>
                </div>
                <div class="text-center space-y-3 px-10">
                    <p class="text-white text-[28px] font-black tracking-tighter">Drop your files here</p>
                    <p class="text-white/20 text-[16px] font-bold tracking-tight">Support for high-fidelity WAV, MP4, and
                        RAW formats</p>
                </div>
            </div>

            {{-- Action --}}
            <div class="pt-4 max-w-[600px] mx-auto">
                <button onclick="window.location.href='{{ route('consumer.studio.files-uploaded-success') }}'"
                    class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[18px] rounded-[24px] hover:bg-[#3D51EF] transition-all active:scale-[0.99] uppercase tracking-widest">
                    Continue to Studio
                </button>
            </div>
        </div>

    </div>
@endsection