@extends('layouts.app')

@section('content')
    <div class="max-w-[1200px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Invest in product</h1>
        </div>

        {{-- Order Summary Section (Figma Match) --}}
        <div class="space-y-8 mb-12">
            <h2 class="text-white text-[20px] font-bold">Order summary</h2>

            <div class="flex flex-col md:flex-row gap-10 items-start pb-10 border-b border-white/5">
                <div
                    class="w-full md:w-[320px] aspect-square rounded-[32px] overflow-hidden shadow-2xl border border-white/5">
                    <img src="https://images.unsplash.com/photo-1620641788421-7a1c342ea42e?q=80&w=1974&auto=format&fit=crop"
                        class="w-full h-full object-cover">
                </div>

                <div class="flex-1 space-y-8">
                    <div class="space-y-4">
                        <h3 class="text-white text-[28px] font-bold tracking-tight">Title of the image</h3>
                        <div class="flex items-center gap-4">
                            <img src="https://i.pravatar.cc/100?u=johna"
                                class="w-10 h-10 rounded-full border border-white/10">
                            <div>
                                <p class="text-white text-[16px] font-bold">Johna Smith</p>
                                <a href="#"
                                    class="text-white/30 text-[12px] font-medium hover:text-[#4D61FF] transition-colors">View
                                    profile</a>
                            </div>
                        </div>
                    </div>

                    {{-- Technical Metadata Table (Figma Match) --}}
                    <div class="grid grid-cols-2 lg:grid-cols-5 gap-8">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-white/30">
                                <i class="fas fa-expand text-[10px]"></i>
                                <span class="text-[11px] font-bold uppercase tracking-widest">Resolution</span>
                            </div>
                            <p class="text-white text-[14px] font-bold">1600x1600</p>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-white/30">
                                <i class="fas fa-file-image text-[10px]"></i>
                                <span class="text-[11px] font-bold uppercase tracking-widest">Format & Size</span>
                            </div>
                            <p class="text-white text-[14px] font-bold">PNG - 10 MB</p>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-white/30">
                                <i class="fas fa-calendar-alt text-[10px]"></i>
                                <span class="text-[11px] font-bold uppercase tracking-widest">Upload date</span>
                            </div>
                            <p class="text-white text-[14px] font-bold">November 8, 2025</p>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-white/30">
                                <span class="text-[11px] font-bold uppercase tracking-widest">Type:</span>
                            </div>
                            <p class="text-white text-[14px] font-bold">Photo</p>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-white/30">
                                <span class="text-[11px] font-bold uppercase tracking-widest">Orientation:</span>
                            </div>
                            <p class="text-white text-[14px] font-bold">Square</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Investment Summary (Figma Match) --}}
        <div class="bg-[#141414] rounded-[24px] p-10 border border-white/[0.03] mb-12 shadow-2xl">
            <h3 class="text-white text-[22px] font-bold mb-8">Investment Summary</h3>

            <div class="space-y-6">
                <div class="flex justify-between items-center text-[16px] font-bold">
                    <span class="text-white opacity-80">Track Valuation</span>
                    <span class="text-white">$10,000</span>
                </div>

                <div class="relative pt-2">
                    <div class="h-[6px] w-full bg-white/[0.05] rounded-full overflow-hidden">
                        <div class="h-full bg-white/20 rounded-full w-1/2"></div>
                    </div>
                </div>

                <div class="flex justify-between items-center text-[14px] font-bold">
                    <span class="text-white opacity-40">50% Already Sold</span>
                    <span class="text-white opacity-40">50 out of 100 left</span>
                </div>
            </div>
        </div>

        {{-- Participation Options (Figma Match) --}}
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 mb-16">
            @foreach([10, 20, 30, 40, 40, 40, 40] as $percent)
                <div
                    class="bg-[#141414] border border-white/5 rounded-[16px] p-6 text-center hover:border-[#4D61FF]/40 transition-all cursor-pointer group">
                    <p class="text-white text-[14px] font-bold mb-1">{{ $percent }}% <span
                            class="text-[10px] opacity-40">for</span></p>
                    <p class="text-white text-[16px] font-bold mb-2">$000</p>
                    <p class="text-[#4D61FF] text-[9px] font-bold uppercase tracking-widest opacity-60">Est. ROI</p>
                </div>
            @endforeach
        </div>

        {{-- Smart Contact Summary (Figma Match) --}}
        <div
            class="bg-[#141414] rounded-[20px] p-6 border border-white/[0.03] flex justify-between items-center mb-10 group cursor-pointer hover:bg-white/[0.02] transition-all">
            <span class="text-white text-[17px] font-bold opacity-80">Smart contact summary</span>
            <i class="fas fa-chevron-right text-[#4D61FF] group-hover:translate-x-1 transition-transform"></i>
        </div>

        <p class="text-white/40 text-[14px] font-medium mb-12">
            By continuing, you agree to our <a href="#" class="text-[#4D61FF] underline underline-offset-4">Terms &
                Conditions</a>
        </p>

        <div class="pt-6">
            <button onclick="window.location.href='{{ route('consumer.investments.checkout') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Proceed to checkout
            </button>
        </div>

    </div>
@endsection