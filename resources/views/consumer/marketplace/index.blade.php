@extends('layouts.app')

@section('content')
    <div class="space-y-12">
        {{-- Header Section (Figma Flat Match) --}}
        <div class="space-y-0">
            <h1 class="text-magenta text-[24px] font-black uppercase tracking-tight leading-none">EXPLORE</h1>
            <h2 class="text-white text-[64px] font-black tracking-tighter leading-tight mt-1">Your Marketplace</h2>
        </div>

        {{-- Search Bar (Figma Flat Match) --}}
        <div class="relative max-w-[800px]">
            <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none">
                <i class="fas fa-search text-magenta text-xl"></i>
            </div>
            <input type="text" placeholder="Search song"
                class="w-full bg-[#141414] border border-white/5 rounded-2xl py-6 pl-16 pr-8 text-white text-[18px] font-medium focus:outline-none focus:border-[#4D61FF]/40 transition-all placeholder:text-white/20">
        </div>

        {{-- Tab Navigation (Figma Flat Match) --}}
        <div class="flex gap-12 border-b border-white/5 pb-0">
            <a href="{{ route('consumer.marketplace.index') }}"
                class="pb-5 text-[18px] font-black uppercase tracking-widest transition-all {{ Route::is('consumer.marketplace.index') ? 'text-white border-b-4 border-magenta' : 'text-white/20 border-b-4 border-transparent hover:text-white/40' }}">
                Tracks/Audios
            </a>
            <a href="{{ route('consumer.marketplace.images') }}"
                class="pb-5 text-[18px] font-black uppercase tracking-widest transition-all {{ Route::is('consumer.marketplace.images') ? 'text-white border-b-4 border-magenta' : 'text-white/20 border-b-4 border-transparent hover:text-white/40' }}">
                Images/Illustrations
            </a>
        </div>

        {{-- Featured Drops (Figma Flat Match) --}}
        <div class="space-y-8">
            <h3 class="text-white text-[28px] font-black tracking-tighter">Featured Drops</h3>

            <div class="flex gap-6 overflow-x-auto pb-8 -mx-2 px-2 scrollbar-none">
                @for ($i = 0; $i < 4; $i++)
                    <div onclick="window.location.href='{{ route('consumer.marketplace.track.details') }}'"
                        class="flex-shrink-0 w-[240px] bg-[#141414] rounded-[32px] p-4 border border-white/5 hover:border-white/10 transition-all group cursor-pointer">
                        <div class="relative aspect-square rounded-[24px] overflow-hidden mb-5">
                            <img src="{{ asset('images/login.png') }}" class="w-full h-full object-cover opacity-60"
                                alt="Track Art">

                            {{-- Play Button (Figma Flat Position) --}}
                            <div class="absolute bottom-4 right-4">
                                <div
                                    class="w-10 h-10 bg-magenta rounded-full flex items-center justify-center text-white shadow-lg">
                                    <i class="fas fa-play ml-0.5 text-[10px]"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between items-start mb-4">
                            <div class="space-y-1">
                                <h4 class="text-white font-bold text-[16px] leading-tight">Cloudside</h4>
                                <p class="text-white/20 text-[10px] uppercase font-bold tracking-widest leading-none">R&B |
                                    Melancholic</p>
                            </div>
                            <div class="bg-[#1A1A1A] px-3 py-1.5 rounded-lg border border-white/5">
                                <span class="text-magenta font-black text-[12px] tracking-tight">$19</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Luna+Beats&background=4D61FF&color=fff"
                                class="w-5 h-5 rounded-full" alt="Artist">
                            <span class="text-white/40 text-[11px] font-bold">Luna Beats</span>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Trending Now (Figma Flat Match) --}}
        <div class="space-y-8 pb-12">
            <h3 class="text-white text-[28px] font-black tracking-tighter">Trending Now</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @for ($i = 0; $i < 4; $i++)
                    <div onclick="window.location.href='{{ route('consumer.marketplace.track.details') }}'"
                        class="bg-[#141414] rounded-[32px] p-4 flex items-center gap-6 border border-white/5 hover:border-white/10 transition-all group cursor-pointer">
                        <div class="relative w-32 h-32 flex-shrink-0 rounded-[24px] overflow-hidden">
                            <img src="{{ asset('images/login.png') }}" class="w-full h-full object-cover opacity-60"
                                alt="Track Art">
                            <div class="absolute bottom-3 right-3">
                                <div
                                    class="w-8 h-8 bg-magenta rounded-full flex items-center justify-center text-white shadow-lg">
                                    <i class="fas fa-play ml-0.5 text-[8px]"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 flex justify-between items-center pr-4">
                            <div class="space-y-1">
                                <h4 class="text-white font-bold text-[18px]">Cloudside</h4>
                                <p class="text-white/20 text-[11px] font-bold uppercase tracking-widest leading-none">R&B |
                                    Melancholic</p>
                                <div class="flex items-center gap-2 pt-2">
                                    <img src="https://ui-avatars.com/api/?name=Luna+Beats&background=4D61FF&color=fff"
                                        class="w-5 h-5 rounded-full" alt="Artist">
                                    <span class="text-white/40 text-[11px] font-bold">Luna Beats</span>
                                </div>
                            </div>
                            <div class="bg-[#1A1A1A] px-3 py-1.5 rounded-lg border border-white/5">
                                <span class="text-magenta font-black text-[12px] tracking-tight">$19</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
@endsection