@extends('layouts.app')

@section('content')

    <div class="max-w-[1140px] mx-auto pb-20 relative" x-data="{ tab: 'Standard' }">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 pt-10">
            {{-- Left: Image (Figma Match) --}}
            <div class="space-y-12">
                <div
                    class="aspect-square rounded-[32px] overflow-hidden bg-[#141414] border border-white/5 shadow-3xl hover:border-white/10 transition-colors">
                    <img src="https://picsum.photos/800/800?random=1" alt="Marketplace Image"
                        class="w-full h-full object-cover">
                </div>

                {{-- Tags (Figma Match) --}}
                <div class="space-y-6">
                    <h3 class="text-[#4D61FF] text-[24px] font-black flex items-center gap-2">
                        <span class="opacity-40">#</span> Tags
                    </h3>
                    <div class="flex gap-3 overflow-x-auto pb-6 scrollbar-none">
                        @php
                            $categories = [['name' => 'Beats', 'active' => true], ['name' => 'Vocals', 'active' => false], ['name' => 'Loops', 'active' => false], ['name' => 'Bundles', 'active' => false]];
                        @endphp
                        @foreach ($categories as $cat)
                            <button
                                class="px-8 py-3 rounded-full text-[13px] font-black transition-all border {{ $cat['active'] ? 'bg-magenta border-magenta text-white shadow-xl shadow-magenta/20' : 'bg-transparent border-white/10 text-white/40 hover:border-white/20' }}">
                                {{ $cat['name'] }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right: Content (Refined) --}}
            <div class="space-y-12">
                <div class="space-y-6">
                    <h1 class="text-white text-[56px] font-black tracking-tighter leading-tight">Title of the image</h1>
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Johna+Smith&background=4D61FF&color=fff"
                            class="w-14 h-14 rounded-full border-2 border-white/10">
                        <div>
                            <p class="text-white text-[20px] font-bold">Johna Smith</p>
                            <a href="#"
                                class="text-white/30 text-[14px] font-medium hover:text-[#4D61FF] transition-colors">View
                                Artist Profile</a>
                        </div>
                    </div>
                </div>

                <div class="border-t border-white/5 pt-10">
                    {{-- Metadata Grid --}}
                    <div class="grid grid-cols-2 gap-10">
                        <div class="space-y-2">
                            <span
                                class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Resolution</span>
                            <p class="text-white text-[18px] font-bold">1600x1600</p>
                        </div>
                        <div class="space-y-2">
                            <span class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Format
                                & Size</span>
                            <p class="text-white text-[18px] font-bold">PNG - 10 MB</p>
                        </div>
                        <div class="space-y-2">
                            <span class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Upload
                                date</span>
                            <p class="text-white text-[18px] font-bold">November 8, 2025</p>
                        </div>
                        <div class="space-y-2">
                            <span
                                class="text-[#4D61FF] text-[12px] font-black uppercase tracking-widest opacity-60">Details</span>
                            <div class="flex flex-col gap-1">
                                <p class="text-white/40 text-[14px] font-bold uppercase">Type: <span
                                        class="text-white ml-2">Photo</span></p>
                                <p class="text-white/40 text-[14px] font-bold uppercase">Orientation: <span
                                        class="text-white ml-2">Square</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#141414] rounded-[48px] border border-white/5 p-12 space-y-10 shadow-3xl">
                    <div class="border-b border-white/5 pb-8">
                        <h3 class="text-white text-[32px] font-black tracking-tighter mb-8">License & Pricing</h3>

                        {{-- Tabs (Flat style) --}}
                        <div class="flex gap-12 pr-4">
                            <button @click="tab = 'Standard'"
                                :class="tab === 'Standard' ? 'text-white border-b-4 border-magenta' : 'text-white/20 border-b-4 border-transparent'"
                                class="pb-5 text-[18px] font-black transition-all uppercase tracking-widest">
                                Standard
                            </button>
                            <button @click="tab = 'Extended'"
                                :class="tab === 'Extended' ? 'text-white border-b-4 border-magenta' : 'text-white/20 border-b-4 border-transparent'"
                                class="pb-5 text-[18px] font-black transition-all uppercase tracking-widest">
                                Extended
                            </button>
                        </div>
                    </div>

                    <div class="space-y-12">
                        <div
                            class="flex justify-between items-center bg-white/[0.03] rounded-[32px] p-10 border border-white/10 shadow-inner">
                            <div>
                                <span class="text-white text-[24px] font-black uppercase tracking-tight"
                                    x-show="tab === 'Standard'">Standard License</span>
                                <span class="text-white text-[24px] font-black uppercase tracking-tight"
                                    x-show="tab === 'Extended'" style="display: none;">Extended License</span>
                            </div>
                            <span class="text-magenta text-[36px] font-black tracking-tighter"
                                x-text="tab === 'Standard' ? '$19' : '$99'">$19</span>
                        </div>

                        <ul class="space-y-6 px-4">
                            <li class="flex items-center gap-5 text-white/60 font-bold text-[17px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> Digital & Print use
                            </li>
                            <li class="flex items-center gap-5 text-white/60 font-bold text-[17px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> Up to 5M Impressions
                            </li>
                            <li class="flex items-center gap-5 text-white/60 font-bold text-[17px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> Unlimited Projects
                            </li>
                            <li class="flex items-center gap-5 text-white/60 font-bold text-[17px]">
                                <i class="fas fa-check text-magenta text-[12px]"></i> Royalty Free
                            </li>
                        </ul>

                        <div class="space-y-4">
                            <button onclick="window.location.href='{{ route('consumer.marketplace.checkout') }}'"
                                class="w-full py-6 bg-magenta text-white font-black text-[20px] uppercase tracking-widest rounded-2xl shadow-2xl shadow-magenta/20 hover:bg-magenta/90 transition-all active:scale-[0.99]">
                                Buy now
                            </button>
                            <button onclick="window.location.href='{{ route('consumer.marketplace.buy-product') }}'"
                                class="w-full py-5 bg-transparent border border-white/10 rounded-2xl text-white/40 font-bold text-[17px] hover:bg-white/5 transition-all">
                                More Options
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Back Button --}}
        <div class="pt-20">
            <a href="{{ route('consumer.marketplace.images') }}"
                class="flex items-center gap-3 text-white/40 hover:text-white transition-all font-bold group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                <span>Back to Image Marketplace</span>
            </a>
        </div>
    </div>

@endsection