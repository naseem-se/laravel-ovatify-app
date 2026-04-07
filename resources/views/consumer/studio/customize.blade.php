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
        {{-- Minimal Step Indicator --}}
        <x-studio-stepper :currentStep="3" />
        <p class="text-white/40 text-[17px] font-medium max-w-[800px] text-center mx-auto mb-12">
            Review all the details for your track before you publish it to the Ovatify platform.
        </p>

        {{-- Preview Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            {{-- Visual Summary --}}
            <div class="bg-[#1A1B23] rounded-[40px] p-10 border border-white/5 space-y-8">
                <div class="aspect-square w-full rounded-[32px] overflow-hidden bg-black/40 relative">
                    {{-- Placeholder image since we don't have the uploaded one --}}
                    <img src="{{ asset('images/login.png') }}" class="w-full h-full object-cover opacity-80"
                        alt="Cover Art Preview">
                    <div class="absolute bottom-6 left-6 right-6">
                        <div
                            class="bg-black/60 backdrop-blur-xl p-6 rounded-2xl border border-white/5 flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-magenta rounded-full flex items-center justify-center text-white shadow-xl">
                                <i class="fas fa-play ml-1"></i>
                            </div>
                            <div class="space-y-1">
                                <p class="text-white font-black text-[15px]">Cloudside</p>
                                <p class="text-white/40 text-[11px] font-bold tracking-widest uppercase">beat.wav • 02:00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Text Summary & Metadata --}}
            <div class="space-y-12">
                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p class="text-white/20 text-[12px] font-black uppercase tracking-widest mb-2">Track Title</p>
                            <p class="text-white text-[20px] font-black">Cloudside</p>
                        </div>
                        <div>
                            <p class="text-white/20 text-[12px] font-black uppercase tracking-widest mb-2">Price</p>
                            <p class="text-magenta text-[20px] font-black">$19.00</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-white/20 text-[12px] font-black uppercase tracking-widest mb-2">Description</p>
                        <p class="text-white/60 text-[15px] leading-relaxed font-medium">
                            A melancholic R&B track with smooth vocal layers and a deep atmospheric bass. Perfect for
                            late-night listening and creative sessions.
                        </p>
                    </div>

                    <div>
                        <p class="text-white/20 text-[12px] font-black uppercase tracking-widest mb-2">Genre / Style</p>
                        <div class="flex gap-3">
                            <span
                                class="bg-[#4D61FF]/10 text-[#4D61FF] border border-[#4D61FF]/20 px-4 py-1.5 rounded-full text-[12px] font-black uppercase tracking-wider">Pop
                                R&B</span>
                            <span
                                class="bg-white/5 text-white/40 border border-white/10 px-4 py-1.5 rounded-full text-[12px] font-black uppercase tracking-wider">Melancholic</span>
                        </div>
                    </div>
                </div>

                {{-- Waveform Summary --}}
                <div class="space-y-4">
                    <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Audio Profile</p>
                    <div class="h-16 flex items-center gap-[4px] opacity-20">
                        @for($i = 0; $i < 50; $i++)
                            <div class="w-[3px] bg-[#4D61FF] rounded-full" style="height: {{ rand(30, 100) }}%"></div>
                        @endfor
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="grid grid-cols-2 gap-6 pt-4">
                    <button onclick="window.history.back()"
                        class="w-full py-5 bg-transparent border-2 border-white/5 text-white/40 font-bold text-[18px] rounded-2xl hover:bg-white/5 hover:text-white transition-all">
                        Edit Data
                    </button>
                    <button onclick="window.location.href='{{ route('consumer.studio.review.video') }}'"
                        class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[18px] rounded-2xl hover:bg-[#3D51EF] transition-all shadow-xl shadow-blue-500/10 active:scale-[0.995]">
                        Publish Now
                    </button>
                </div>
            </div>

        </div>

    </div>
@endsection