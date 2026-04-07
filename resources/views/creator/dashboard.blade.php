@extends('layouts.app')

@section('content')
    <div class="space-y-12 pb-20">

        {{-- Top Section: Greeting & Stats --}}
        <div class="flex flex-col lg:flex-row justify-between items-end gap-12 pt-6">
            <div class="space-y-1">
                <h1 class="text-[#4D61FF] text-[32px] font-black tracking-tight leading-none">Hey!</h1>
                <h2 class="text-white text-[48px] font-bold tracking-tight leading-none">Ready to create?</h2>
            </div>

            <div class="flex items-center gap-12 pb-2">
                <div class="text-right">
                    <p class="text-white text-[20px] font-bold tracking-tight">03 <span
                            class="text-white/40 text-[14px] font-medium ml-1">Publishes</span></p>
                </div>
                <div class="text-right">
                    <p class="text-white text-[20px] font-bold tracking-tight">02 <span
                            class="text-white/40 text-[14px] font-medium ml-1">Drafts</span></p>
                </div>
                <div class="text-right">
                    <p class="text-white text-[20px] font-bold tracking-tight">$00,000 <span
                            class="text-white/40 text-[14px] font-medium ml-1">Earnings</span></p>
                </div>
            </div>
        </div>

        {{-- Primary Actions --}}
        <div class="space-y-4 max-w-[800px]">
            <a href="{{ route('consumer.studio.create-session') }}"
                class="block w-full py-4 bg-[#4D61FF] hover:bg-[#3D51EF] rounded-[16px] text-center text-white text-[16px] font-medium transition-all active:scale-[0.99]">
                Create a new track with AI
            </a>
            <a href="{{ route('consumer.studio.upload') }}"
                class="block w-full py-4 bg-transparent border border-white/20 hover:border-white/40 rounded-[16px] text-center text-white text-[16px] font-medium transition-all active:scale-[0.99]">
                Upload your own content
            </a>
        </div>

        {{-- New Releases --}}
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <h3 class="text-white text-[20px] font-bold tracking-tight">New Releases</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                    <div
                        class="bg-[#141414] rounded-[24px] p-4 border border-white/5 hover:border-white/10 transition-all group cursor-pointer">
                        <div
                            class="relative aspect-[4/3] rounded-[16px] overflow-hidden mb-4 bg-gradient-to-br from-purple-900 to-black">
                            {{-- Placeholder Gradient/Image --}}
                            <div class="absolute inset-0 opacity-60 mix-blend-overlay"
                                style="background-image: url('https://picsum.photos/400/300?random={{ $i + 10 }}'); background-size: cover;">
                            </div>

                            <div
                                class="absolute top-3 right-3 bg-black/40 backdrop-blur-md px-3 py-1 rounded-full border border-white/10">
                                <span class="text-white text-[12px] font-bold">$19</span>
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <div
                                    class="w-10 h-10 bg-[#4D61FF] rounded-full flex items-center justify-center text-white shadow-lg">
                                    <i class="fas fa-play text-xs ml-0.5"></i>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <h4 class="text-white font-bold text-[16px] leading-tight">Cloudside</h4>
                            <p class="text-white/40 text-[11px] font-medium">R&B | Melancholic</p>
                            <div class="flex items-center gap-2 pt-2">
                                <img src="https://ui-avatars.com/api/?name=LB&background=random" class="w-5 h-5 rounded-full">
                                <span class="text-white/40 text-[11px]">Luna Beats</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Creative Workspace --}}
        <div class="space-y-6">
            <h3 class="text-white text-[20px] font-bold tracking-tight">Creative Workspace</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                @php
                    $tools = [
                        ['name' => 'Vocal Enhancer', 'route' => 'consumer.ai-tools.vocal-enhancer'],
                        ['name' => 'Lyric Assistance', 'route' => 'consumer.ai-tools.lyric-generator'],
                        ['name' => 'Melody Generator', 'route' => 'consumer.ai-tools.melody-generator'],
                        ['name' => 'Hook Generator', 'route' => 'consumer.ai-tools.hook-generator'],
                        ['name' => 'Genre Matcher', 'route' => 'consumer.ai-tools.genre-matcher'],
                    ];
                @endphp

                @foreach ($tools as $tool)
                    <div
                        class="bg-[#141414] border border-white/5 rounded-[20px] p-5 space-y-8 hover:border-[#4D61FF]/30 transition-all group">
                        <p class="text-white/60 font-medium text-[13px]">{{ $tool['name'] }}</p>
                        <a href="{{ route($tool['route']) }}"
                            class="block w-full text-center py-2.5 rounded-[10px] border border-[#4D61FF]/30 text-[#4D61FF] text-[12px] font-bold hover:bg-[#4D61FF] hover:text-white transition-all">
                            Use it
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Collab Requests --}}
        <div class="space-y-6 pb-10">
            <h3 class="text-white text-[20px] font-bold tracking-tight">Collab Requests</h3>
            <div class="bg-[#141414] border border-white/5 rounded-[24px] p-10 text-center">
                <p class="text-white/20 font-medium text-[14px]">No new requests</p>
            </div>
        </div>

    </div>
@endsection