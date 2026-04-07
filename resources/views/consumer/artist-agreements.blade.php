@extends('layouts.app')

@section('content')

    <div class="max-w-[900px] mx-auto space-y-12 pb-20">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between items-end gap-6 pt-6">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center">
                        <i class="fas fa-file-signature text-magenta"></i>
                    </div>
                    <span class="text-gray-500 font-black text-[10px] uppercase tracking-[0.3em]">Legal Framework</span>
                </div>
                <h1 class="text-white text-5xl font-black tracking-tighter uppercase italic">Artist Agreement</h1>
            </div>
            <button
                class="bg-[#1A1A1A] border border-white/5 text-gray-500 px-8 py-5 rounded-[28px] font-black text-[10px] uppercase tracking-widest hover:text-white hover:bg-white/5 transition-all flex items-center gap-3 shadow-xl group">
                <i class="fas fa-download opacity-50 group-hover:translate-y-1 transition-transform"></i> Archive PDF
            </button>
        </div>

        {{-- Agreement Document --}}
        <div class="relative group">
            <div
                class="absolute -inset-1 bg-gradient-to-b from-white/10 to-transparent blur-2xl opacity-50 pointer-events-none">
            </div>
            <div
                class="bg-white text-[#0F0F0F] rounded-[56px] p-16 md:p-24 shadow-[0_50px_100px_rgba(0,0,0,0.8)] space-y-16 font-serif relative overflow-hidden">
                {{-- Decorative Watermark --}}
                <div class="absolute top-10 right-10 opacity-[0.03] pointer-events-none rotate-12">
                    <i class="fas fa-certificate text-[120px]"></i>
                </div>

                <div class="text-center space-y-6">
                    <h2
                        class="text-4xl font-black uppercase tracking-tighter border-b-4 border-[#0F0F0F] pb-4 inline-block">
                        Artist Service Charter</h2>
                    <p class="text-xs font-bold uppercase tracking-[0.4em] opacity-40">Effective: May 12, 2026 • Ref:
                        OV-992-LX</p>
                </div>

                <div class="space-y-12 text-lg leading-relaxed max-w-[650px] mx-auto">
                    <section class="space-y-4">
                        <h3 class="font-black uppercase text-xs tracking-[0.2em] opacity-60">01. Intellectual Property &
                            Rights</h3>
                        <p class="text-[#222]">
                            The Creator hereby grants <span class="font-bold underline decoration-magenta/30">Ovatify
                                Ecosystem</span> a worldwide, royalty-bearing, exclusive license to host, distribute, and
                            monetize the submitted digital assets ("The Work"). This includes right of reproduction for
                            NFTs, streaming, and investment blocking.
                        </p>
                    </section>

                    <section class="space-y-4">
                        <h3 class="font-black uppercase text-xs tracking-[0.2em] opacity-60">02. Economic Settlement</h3>
                        <p class="text-[#222]">
                            Settlement shall follow the <span class="font-bold italic">Smart Split Distribution</span>
                            model. The Creator is entitled to 92.5% of net primary sales. Secondary market royalties (5%)
                            are hard-coded into the underlying smart contract and non-negotiable.
                        </p>
                    </section>

                    <section class="space-y-4">
                        <h3 class="font-black uppercase text-xs tracking-[0.2em] opacity-60">03. Verification of Identity
                        </h3>
                        <p class="text-[#222]">
                            By initiating this signature, the Creator confirms they are the <span class="italic">Original
                                Source</span> of the uploaded stems and melodies. Ovatify reserves the right to terminate
                            usage if plagiarism is detected via the Ovatify Audio Fingerprinting system.
                        </p>
                    </section>
                </div>

                <div class="pt-20 border-t border-gray-100 flex flex-col md:flex-row gap-12 justify-between px-4">
                    <div class="space-y-6">
                        <div class="h-20 border-b-2 border-[#0F0F0F] flex items-end pb-2 group/sig cursor-pointer">
                            <span
                                class="text-4xl font-black italic tracking-tighter font-sans opacity-20 group-hover:opacity-100 transition-opacity">Luna
                                Beats</span>
                        </div>
                        <p class="text-[9px] font-black uppercase tracking-[0.3em] opacity-30 text-center md:text-left">
                            Creator Digital Signature</p>
                    </div>
                    <div class="space-y-6">
                        <div class="h-20 border-b-2 border-magenta flex items-end pb-2">
                            <i class="fas fa-shield-alt text-2xl text-magenta mb-2 mr-3 opacity-40"></i>
                            <span class="text-2xl font-black tracking-tighter font-sans">Ovatify Verified</span>
                        </div>
                        <p class="text-[9px] font-black uppercase tracking-[0.3em] opacity-30 text-center md:text-left">
                            Automated Protocol Verification</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action HUD --}}
        <div class="pt-10 flex flex-col items-center gap-8">
            <button onclick="window.history.back()"
                class="w-full max-w-sm py-8 rounded-[40px] bg-magenta text-white font-black text-2xl uppercase tracking-[0.2em] hover:bg-[#D600D6] transition-all shadow-[0_20px_60px_rgba(214,0,214,0.4)] hover:scale-[1.02] active:scale-95 group">
                Confirm & Seal <i class="fas fa-lock ml-4 text-white/50 group-hover:rotate-12 transition-transform"></i>
            </button>
            <div class="flex items-center gap-6">
                <button
                    class="text-gray-500 text-[10px] font-black uppercase tracking-widest hover:text-white transition-colors border-b border-white/10 pb-1">Negotiate
                    Terms</button>
                <div class="w-1 h-1 rounded-full bg-gray-800"></div>
                <button
                    class="text-gray-500 text-[10px] font-black uppercase tracking-widest hover:text-white transition-colors border-b border-white/10 pb-1">Legal
                    Council</button>
            </div>
        </div>

    </div>

@endsection