@extends('layouts.app')

@section('content')
    <div class="space-y-12">

        {{-- Top Section: Greeting & Search (Figma Flat Match) --}}
        <div class="flex flex-col lg:flex-row justify-between items-start gap-8 pl-0">
            <div class="space-y-0">
                <h1 class="text-magenta text-[48px] font-black tracking-tight leading-tight">Hey!</h1>
                <h2 class="text-white text-[48px] font-black tracking-tight leading-tight">Explore content</h2>
            </div>
            <a href="{{ route('consumer.creator.dashboard') }}"
                class="text-magenta font-black text-[16px] hover:underline transition-all">
                Become a creator
            </a>
        </div>

        {{-- Search & Filters --}}
        <div class="space-y-10">
            <div class="relative max-w-[800px]">
                <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none">
                    <i class="fas fa-search text-[#4D61FF] text-xl"></i>
                </div>
                <input type="text" placeholder="Search song"
                    class="w-full bg-[#141414] border border-white/5 rounded-2xl py-5 pl-16 pr-6 text-white text-[16px] font-medium focus:outline-none focus:border-[#4D61FF]/40 transition-all placeholder:text-white/20">
            </div>

            <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-none">
                @php
                    $categories = [
                        ['name' => 'Beats', 'active' => true],
                        ['name' => 'Vocals', 'active' => false],
                        ['name' => 'Loops', 'active' => false],
                        ['name' => 'Bundles', 'active' => false],
                        ['name' => 'Bundles', 'active' => false],
                        ['name' => 'Bundles', 'active' => false],
                        ['name' => 'Bundles', 'active' => false],
                    ];
                @endphp

                @foreach ($categories as $cat)
                    <button
                        class="px-8 py-3 rounded-full text-[13px] font-black transition-all border {{ $cat['active'] ? 'bg-[#4D61FF] border-[#4D61FF] text-white' : 'bg-transparent border-white/10 text-white/40 hover:border-white/20' }}">
                        {{ $cat['name'] }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Featured Drops --}}
        <div class="space-y-8">
            <h3 class="text-white text-[28px] font-black tracking-tighter">Featured Drops</h3>

            <div class="flex gap-6 overflow-x-auto pb-4 -mx-2 px-2 scrollbar-none">
                @for ($i = 0; $i < 4; $i++)
                    <div onclick="window.location.href='{{ route('consumer.marketplace.track.details') }}'"
                        class="flex-shrink-0 w-[240px] bg-[#141414] rounded-[32px] p-4 border border-white/5 hover:border-white/10 transition-all group cursor-pointer">
                        <div class="relative aspect-square rounded-[24px] overflow-hidden mb-5">
                            <img src="{{ asset('images/login.png') }}"
                                class="w-full h-full object-cover opacity-60"
                                alt="Track Art">
                            
                            {{-- Play Button (Figma Flat Position) --}}
                            <div class="absolute bottom-4 right-4">
                                <div class="w-10 h-10 bg-magenta rounded-full flex items-center justify-center text-white shadow-lg">
                                    <i class="fas fa-play ml-0.5 text-[10px]"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-start mb-4">
                            <div class="space-y-1">
                                <h4 class="text-white font-bold text-[16px] leading-tight">Cloudside</h4>
                                <p class="text-white/20 text-[10px] uppercase font-bold tracking-widest leading-none">R&B | Melancholic</p>
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

        {{-- Invest in music (Figma Flat Match) --}}
        <div class="space-y-8 pb-12">
            <h3 class="text-white text-[28px] font-black tracking-tighter">Invest in music</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @for ($i = 0; $i < 4; $i++)
                    <div onclick="window.location.href='{{ route('consumer.investments.track.details') }}'"
                        class="bg-[#141414] rounded-[32px] p-6 flex items-center gap-6 border border-white/5 hover:border-white/10 transition-all group cursor-pointer">
                        <div class="relative w-32 h-32 flex-shrink-0 rounded-[24px] overflow-hidden">
                            <img src="{{ asset('images/login.png') }}" class="w-full h-full object-cover opacity-60"
                                alt="Cover">
                            <div class="absolute bottom-3 right-3">
                                <div class="w-8 h-8 bg-magenta rounded-full flex items-center justify-center text-white shadow-lg">
                                    <i class="fas fa-play ml-0.5 text-[8px]"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 space-y-4">
                            <div class="space-y-1">
                                <h4 class="text-white text-[18px] font-black leading-tight">Family memories</h4>
                                <p class="text-white/20 text-[11px] font-bold uppercase tracking-widest leading-none">100 Blocks | 75 Available</p>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="bg-[#22C55E]/10 border border-[#22C55E]/20 px-4 py-1.5 rounded-full">
                                    <span class="text-[#22C55E] text-[10px] font-black uppercase tracking-widest">ROI: 12%</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Kasandra+Cabrera&background=4D61FF&color=fff"
                                    class="w-6 h-6 rounded-full" alt="Artist">
                                <span class="text-white/40 text-[12px] font-bold">Kasandra Cabrera</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
@endsection