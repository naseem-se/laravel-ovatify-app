@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 pt-10 relative" x-data="{ state: 'default' }">

        {{-- Top Navigation --}}
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-10 mb-16">
            <div class="space-y-1">
                <h2 class="text-[#4D61FF] text-[24px] font-black tracking-tight leading-none uppercase">Rights</h2>
                <h1 class="text-white text-[64px] font-black tracking-tighter leading-tight mt-1">Management</h1>
            </div>
            <a href="{{ route('consumer.investments.index') }}"
                class="text-[#4D61FF] text-[15px] font-black hover:brightness-125 transition-all uppercase tracking-widest pb-2 border-b-2 border-[#4D61FF]/20">View
                investments</a>
        </div>

        <div class="space-y-20">
            {{-- Project Selector --}}
            <div class="space-y-8">
                <h3 class="text-white text-[28px] font-black tracking-tighter border-b border-white/5 pb-6">Select Project
                </h3>
                <div class="flex items-center gap-10 overflow-x-auto pb-6 scrollbar-none">
                    @foreach(['The Awakening', 'Neon Nights', 'Cloudside', 'Summer Vibes'] as $index => $label)
                        <label class="flex items-center gap-4 cursor-pointer group flex-shrink-0">
                            <div class="relative flex items-center justify-center">
                                <input type="radio" name="project" value="{{ $index }}" class="peer hidden" {{ $index === 0 ? 'checked' : '' }}>
                                <div
                                    class="w-8 h-8 border-2 border-white/10 rounded-full peer-checked:border-[#4D61FF] peer-checked:bg-[#4D61FF]/10 transition-all">
                                </div>
                                <div
                                    class="absolute w-3 h-3 bg-[#4D61FF] rounded-full opacity-0 peer-checked:opacity-100 transition-opacity">
                                </div>
                            </div>
                            <span
                                class="text-white text-[20px] font-black tracking-tight group-hover:text-[#4D61FF] transition-colors">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Collaborators --}}
            <div class="space-y-10">
                <h3 class="text-white text-[28px] font-black tracking-tighter border-b border-white/5 pb-6">Revenue Split
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $collabs = [
                            ['name' => 'John Smith', 'roles' => ['Producer', 'Writer'], 'share' => '50%'],
                            ['name' => 'Luna Beats', 'roles' => ['Artist', 'Producer'], 'share' => '30%'],
                            ['name' => 'Dev Studio', 'roles' => ['Engineer'], 'share' => '20%'],
                        ];
                    @endphp
                    @foreach($collabs as $c)
                        <div
                            class="bg-[#141414] border border-white/5 rounded-[40px] p-10 space-y-8 hover:border-[#4D61FF]/30 transition-all">
                            <div class="flex justify-between items-start">
                                <h4 class="text-white text-[22px] font-black tracking-tight leading-none">{{ $c['name'] }}</h4>
                                <span class="text-[#4D61FF] text-[20px] font-black">{{ $c['share'] }}</span>
                            </div>
                            <div class="flex flex-wrap gap-4">
                                @foreach($c['roles'] as $role)
                                    <span
                                        class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white/40 text-[12px] font-black uppercase tracking-widest">{{ $role }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Visualization --}}
            <div class="py-16 bg-[#141414] rounded-[64px] border border-white/5">
                <div class="flex flex-col items-center justify-center gap-16">
                    <h3 class="text-white text-[32px] font-black tracking-tighter uppercase">Distribution Overview</h3>

                    <div class="relative w-80 h-80 flex items-center justify-center">
                        {{-- Flat Pie Chart --}}
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="40" fill="transparent" stroke="#4D61FF" stroke-width="20"
                                stroke-dasharray="125.6 125.6" />
                            <circle cx="50" cy="50" r="40" fill="transparent" stroke="#3D51EF" stroke-width="20"
                                stroke-dasharray="75.3 251.2" stroke-dashoffset="-125.6" />
                            <circle cx="50" cy="50" r="40" fill="transparent" stroke="#FFFFFF" stroke-opacity="0.1"
                                stroke-width="20" stroke-dasharray="50.3 251.2" stroke-dashoffset="-200.9" />
                        </svg>
                        {{-- Center label --}}
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <span class="text-white/20 text-[12px] font-black uppercase tracking-widest">Master
                                Rights</span>
                            <span class="text-white text-[32px] font-black tracking-tighter leading-none">100%</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center gap-16">
                        <div class="flex items-center gap-4">
                            <div class="w-4 h-4 rounded-full bg-[#4D61FF]"></div>
                            <span class="text-white font-black text-[15px] uppercase tracking-widest">Main Royalties</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-4 h-4 rounded-full bg-[#3D51EF]"></div>
                            <span class="text-white font-black text-[15px] uppercase tracking-widest">Producer Pool</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-4 h-4 rounded-full bg-white/10"></div>
                            <span class="text-white font-black text-[15px] uppercase tracking-widest">Distro Fees</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Agreement Templates --}}
            <div class="space-y-10 pb-20">
                <h3 class="text-white text-[28px] font-black tracking-tighter border-b border-white/5 pb-6">Legal Framework
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach(['Standard Sync', 'Artist Master', 'Creative Commons'] as $t)
                        <div
                            class="bg-[#141414] border border-white/5 rounded-[48px] p-12 h-[340px] flex flex-col justify-between group hover:border-[#4D61FF]/40 transition-all relative overflow-hidden">

                            <span
                                class="text-white text-[32px] font-black leading-tight tracking-tighter uppercase">{{ $t }}<br>Agreement</span>

                            <div class="space-y-6 relative z-10">
                                <div class="flex gap-4">
                                    <div
                                        class="w-8 h-8 border-2 border-[#4D61FF] rounded-full flex items-center justify-center">
                                        <div class="w-4 h-4 bg-[#4D61FF] rounded-full"></div>
                                    </div>
                                    <div class="w-8 h-8 border-2 border-white/5 rounded-full"></div>
                                    <div class="w-8 h-8 border-2 border-white/5 rounded-full"></div>
                                </div>
                                <button
                                    class="w-full py-4 bg-white/5 border border-white/10 rounded-2xl text-white/40 text-[12px] font-black uppercase tracking-widest hover:bg-[#4D61FF] hover:text-white hover:border-[#4D61FF] transition-all">
                                    Sign Agreement
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection