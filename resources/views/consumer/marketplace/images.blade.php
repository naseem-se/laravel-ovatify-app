@extends('layouts.app')

@section('content')
    <div class="max-w-[1200px] mx-auto pb-20">
        <div class="space-y-12">
            {{-- Header Section (Figma Flat Match) --}}
            <div class="space-y-0 pl-4">
                <h1 class="text-magenta text-[32px] font-black uppercase tracking-tight leading-none">EXPLORE</h1>
                <h2 class="text-white text-[64px] font-black tracking-tighter leading-tight mt-1">Your Marketplace</h2>
            </div>

            {{-- Search Bar (Figma Flat Match) --}}
            <div class="relative max-w-[800px] pl-4">
                <div class="absolute inset-y-0 left-10 flex items-center pointer-events-none">
                    <i class="fas fa-search text-[#4D61FF] text-xl"></i>
                </div>
                <input type="text" placeholder="Search song"
                    class="w-full bg-[#141414] border border-white/5 rounded-2xl py-6 pl-16 pr-8 text-white text-[18px] font-medium focus:outline-none focus:border-[#4D61FF]/40 transition-all placeholder:text-white/20">
            </div>

            {{-- Tab Navigation (Figma Flat Match) --}}
            <div class="flex gap-12 border-b border-white/5 pb-0 pl-4">
                <a href="{{ route('consumer.marketplace.index') }}"
                    class="pb-5 text-[18px] font-black uppercase tracking-widest transition-all {{ Route::is('consumer.marketplace.index') ? 'text-white border-b-4 border-magenta' : 'text-white/20 border-b-4 border-transparent hover:text-white/40' }}">
                    Tracks/Audios
                </a>
                <a href="{{ route('consumer.marketplace.images') }}"
                    class="pb-5 text-[18px] font-black uppercase tracking-widest transition-all {{ Route::is('consumer.marketplace.images') ? 'text-white border-b-4 border-magenta' : 'text-white/20 border-b-4 border-transparent hover:text-white/40' }}">
                    Images/Illustrations
                </a>
            </div>
        </div>

        {{-- Trending now --}}
        <div class="space-y-10 mb-20">
            <div class="flex justify-between items-center">
                <h3 class="text-white text-[28px] font-bold">Trending now</h3>
                <a href="#" class="text-[#4D61FF] text-sm font-bold hover:underline">View all</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i = 0; $i < 4; $i++)
                    <div onclick="window.location.href='{{ route('consumer.marketplace.image.details') }}'"
                        class="bg-[#141414] p-4 rounded-[32px] space-y-4 hover:bg-[#1A1A1A] transition-all group cursor-pointer border border-white/[0.03] shadow-xl">
                        <div class="relative aspect-square rounded-[24px] overflow-hidden">
                            <img src="https://picsum.photos/400/400?random={{ $i + 600 }}" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-4 px-2 pb-2">
                            <div class="flex justify-between items-start">
                                <h4 class="text-white text-[17px] font-bold tracking-tight">Lorem Ipsum</h4>
                                <span class="text-white font-bold text-[16px]">$20</span>
                            </div>
                            <div class="text-[11px] text-white/30 font-medium space-y-1">
                                <p>1600x1600</p>
                                <p>Standard License</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Recommended for you --}}
        <div class="space-y-10">
            <div class="flex justify-between items-center">
                <h3 class="text-white text-[28px] font-bold">Recommended for you</h3>
                <a href="#" class="text-[#4D61FF] text-sm font-bold hover:underline">View all</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i = 0; $i < 4; $i++)
                    <div onclick="window.location.href='{{ route('consumer.marketplace.image.details') }}'"
                        class="bg-[#141414] p-4 rounded-[32px] space-y-4 hover:bg-[#1A1A1A] transition-all group cursor-pointer border border-white/[0.03] shadow-xl">
                        <div class="relative aspect-square rounded-[24px] overflow-hidden">
                            <img src="https://picsum.photos/400/400?random={{ $i + 700 }}" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-4 px-2 pb-2">
                            <div class="flex justify-between items-start">
                                <h4 class="text-white text-[17px] font-bold tracking-tight">Lorem Ipsum</h4>
                                <span class="text-white font-bold text-[16px]">$20</span>
                            </div>
                            <div class="text-[11px] text-white/30 font-medium space-y-1">
                                <p>1600x1600</p>
                                <p>Standard License</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
@endsection