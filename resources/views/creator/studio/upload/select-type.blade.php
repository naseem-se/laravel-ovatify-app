@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20 pt-10">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-6 mb-4">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[24px]"></i>
            </a>
            <h1 class="text-white text-[48px] font-bold tracking-tight uppercase leading-none">Upload Content</h1>
        </div>

        <p class="text-white/20 text-[18px] font-bold mb-16 tracking-tight">
            Select the type of creative work you wish to share with the world.
        </p>

        {{-- Type Selection Container --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- Video Upload Card --}}
            <div
                class="bg-[#141414] rounded-[48px] border border-white/5 p-12 flex flex-col gap-10 hover:border-[#4D61FF]/30 transition-all group">
                <div class="flex items-center gap-6 text-white">
                    <div
                        class="w-16 h-16 bg-white/5 rounded-3xl flex items-center justify-center group-hover:bg-[#4D61FF]/10 group-hover:text-[#4D61FF] transition-all">
                        <i class="fas fa-video text-[24px]"></i>
                    </div>
                    <span class="text-[24px] font-black tracking-tighter">Video<br>Content</span>
                </div>
                <button onclick="window.location.href='{{ route('consumer.creator.studio.upload.dropzone') }}'"
                    class="w-full py-6 bg-transparent border border-white/20 rounded-[24px] text-white font-bold text-[14px] uppercase tracking-widest hover:border-[#4D61FF] hover:bg-[#4D61FF] transition-all active:scale-[0.98]">
                    Select Video
                </button>
            </div>

            {{-- Image/Illustration Upload Card --}}
            <div
                class="bg-[#141414] rounded-[48px] border border-white/5 p-12 flex flex-col gap-10 hover:border-[#4D61FF]/30 transition-all group">
                <div class="flex items-center gap-6 text-white">
                    <div
                        class="w-16 h-16 bg-white/5 rounded-3xl flex items-center justify-center group-hover:bg-[#4D61FF]/10 group-hover:text-[#4D61FF] transition-all">
                        <i class="fas fa-palette text-[24px]"></i>
                    </div>
                    <span class="text-[24px] font-black tracking-tighter">Images &<br>Art</span>
                </div>
                <button onclick="window.location.href='{{ route('consumer.creator.studio.upload.dropzone') }}'"
                    class="w-full py-6 bg-transparent border border-white/20 rounded-[24px] text-white font-bold text-[14px] uppercase tracking-widest hover:border-[#4D61FF] hover:bg-[#4D61FF] transition-all active:scale-[0.98]">
                    Select Art
                </button>
            </div>

        </div>

    </div>
@endsection