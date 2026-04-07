@extends('layouts.app')

@section('content')
    <div x-data="{ showSuccess: false }" class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-16">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">List on QmeMarketplace</h1>
        </div>

        {{-- Form Content (Figma Match) --}}
        <div class="space-y-12 mb-16">
            {{-- Track Name --}}
            <div class="space-y-6">
                <label class="text-white text-[22px] font-bold opacity-90 block">Track Name</label>
                <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-8 flex items-center">
                    <input type="text" placeholder="Lorem Ipsum"
                        class="bg-transparent border-none text-white/30 text-[17px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                </div>
            </div>

            {{-- Price --}}
            <div class="space-y-6">
                <label class="text-white text-[22px] font-bold opacity-90 block">Price</label>
                <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-8 flex items-center">
                    <input type="text" placeholder="$ Price"
                        class="bg-transparent border-none text-white/30 text-[17px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10">
                </div>
            </div>

            {{-- Short Description --}}
            <div class="space-y-6">
                <label class="text-white text-[22px] font-bold opacity-90 block">Short Description</label>
                <div class="bg-[#141414] rounded-2xl border border-white/[0.03] p-8 min-h-[220px]">
                    <textarea placeholder="Write your description"
                        class="bg-transparent border-none text-white/30 text-[17px] font-medium p-0 focus:ring-0 w-full placeholder:text-white/10 resize-none h-40"></textarea>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <button @click="showSuccess = true"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                List Now
            </button>
            <button onclick="window.location.href='{{ route('consumer.my.tracks') }}'"
                class="w-full py-5 bg-transparent border-[1.5px] border-white/10 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all">
                Back to my Tracks
            </button>
        </div>

        {{-- Success Modal (Literal Figma Match) --}}
        <template x-if="showSuccess">
            <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
                <div class="absolute inset-0 bg-black/90 backdrop-blur-md"></div>

                <div
                    class="relative bg-[#0F0F0F] border border-white/[0.05] rounded-[48px] w-full max-w-lg p-12 shadow-3xl text-center overflow-hidden">
                    {{-- Decorative Dots --}}
                    <div class="absolute top-20 left-20 w-3 h-3 rounded-full bg-magenta/60"></div>
                    <div class="absolute top-40 right-10 w-2 h-2 rounded-full bg-magenta/40"></div>
                    <div class="absolute bottom-40 left-10 w-2 h-2 rounded-full bg-magenta/40"></div>
                    <div class="absolute top-10 right-40 w-3 h-3 rounded-full bg-magenta/60"></div>

                    {{-- Success Icon (Figma Match) --}}
                    <div class="relative inline-block mb-10">
                        <div
                            class="w-32 h-32 rounded-full bg-magenta flex items-center justify-center shadow-[0_0_50px_rgba(255,0,255,0.4)]">
                            <i class="fas fa-check text-white text-5xl"></i>
                        </div>
                    </div>

                    <h2 class="text-white text-[32px] font-bold mb-3 tracking-tight">Your Track Is Live!</h2>
                    <p class="text-white/30 text-[17px] font-medium mb-12">Your track has been successfully listed on
                        QmeMarketplace!</p>

                    <div class="space-y-4">
                        <button onclick="window.location.href='{{ route('consumer.forms.success.sale') }}'"
                            class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[18px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all">
                            View on Marketplace
                        </button>
                        <button onclick="window.location.href='{{ route('consumer.my.tracks') }}'"
                            class="w-full py-5 bg-transparent border-[1.5px] border-white/10 text-white font-bold text-[18px] rounded-2xl hover:bg-white/5 transition-all">
                            Back to My Tracks
                        </button>
                    </div>
                </div>
            </div>
        </template>

    </div>
@endsection