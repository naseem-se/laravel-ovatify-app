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

        {{-- Minimal Step Indicator --}}
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-4">
                <span class="text-magenta font-black text-[14px] uppercase tracking-widest">Step 02</span>
                <div class="h-[2px] w-24 bg-white/10 rounded-full relative overflow-hidden">
                    <div class="absolute inset-0 bg-magenta w-2/4"></div>
                </div>
                <span class="text-white/40 font-bold text-[14px]">Cover Art</span>
            </div>
            <p class="text-white/40 text-[17px] font-medium max-w-[800px]">
                Make your track stand out with a high-quality cover image. Recommended size: 1600x1600.
            </p>
        </div>

        {{-- Upload Container --}}
        <div class="space-y-12 max-w-[800px]">
            <div
                class="relative w-full aspect-square md:aspect-video rounded-[32px] border-2 border-dashed border-white/5 bg-[#141414] flex flex-col items-center justify-center gap-6 hover:border-[#4D61FF]/40 transition-all cursor-pointer group shadow-inner overflow-hidden">

                <div
                    class="w-20 h-20 bg-white/5 rounded-3xl flex items-center justify-center text-white/30 group-hover:text-white group-hover:bg-[#4D61FF]/20 transition-all">
                    <i class="far fa-image text-4xl"></i>
                </div>

                <div class="text-center space-y-2">
                    <p class="text-white text-[20px] font-bold">Upload your cover art</p>
                    <p class="text-white/20 text-[14px] font-medium">Drag & drop or browse from your device</p>
                </div>

                {{-- Preview Backdrop Placeholder --}}
                <div
                    class="absolute inset-0 bg-[#4D61FF]/5 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                </div>
            </div>

            {{-- Actions --}}
            <div class="grid grid-cols-2 gap-6">
                <button onclick="window.history.back()"
                    class="w-full py-5 bg-transparent border-2 border-white/5 text-white/40 font-bold text-[18px] rounded-2xl hover:bg-white/5 hover:text-white transition-all">
                    Back
                </button>
                {{-- Skipping actual next route for now, assuming Step 3 is preview --}}
                <button onclick="window.location.href='{{ route('consumer.studio.customize') }}'"
                    class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[18px] rounded-2xl hover:bg-[#3D51EF] transition-all shadow-xl shadow-blue-500/10 active:scale-[0.995]">
                    Continue to Preview
                </button>
            </div>
        </div>

    </div>
@endsection