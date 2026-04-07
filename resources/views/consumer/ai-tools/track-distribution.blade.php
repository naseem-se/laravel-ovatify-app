@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20 relative" x-data="{ state: 'default' }">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-4 pt-4 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-opacity">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h1 class="text-[#4D61FF] text-3xl font-bold">Distribute Your Track</h1>
        </div>

        <div class="space-y-6">
            <h3 class="text-white text-xl font-bold">Choose Track</h3>
            <div class="flex items-center gap-8 overflow-x-auto pb-4">
                @foreach(['Lorem', 'Lorem', 'Ipsum', 'Ipsum', 'Ipsum'] as $index => $label)
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <div class="relative flex items-center justify-center">
                            <input type="radio" name="track" value="{{ $index }}" class="peer hidden" {{ $index === 0 ? 'checked' : '' }}>
                            <div
                                class="w-6 h-6 border-2 border-[#4D61FF] rounded-full peer-checked:bg-transparent transition-all">
                            </div>
                            <div
                                class="absolute w-3 h-3 bg-[#4D61FF] rounded-full opacity-0 peer-checked:opacity-100 transition-opacity">
                            </div>
                        </div>
                        <span
                            class="text-white text-lg font-medium group-hover:text-[#4D61FF] transition-colors">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="my-10">
            <div
                class="w-full aspect-[2/1] bg-[#1A1A1A] border-2 border-dashed border-[#4D61FF]/30 rounded-[32px] flex flex-col items-center justify-center gap-6 group cursor-pointer hover:bg-white/5 transition-all">
                <div
                    class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="far fa-image text-white/50 text-3xl"></i>
                </div>
                <span class="text-white/60 text-xl">Upload your audio track</span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-12">
            <input type="text" placeholder="Enter Release title"
                class="bg-[#1A1A1A]/80 border border-white/5 rounded-2xl py-6 px-8 text-white text-lg focus:outline-none focus:border-[#4D61FF] placeholder-white/20">
            <input type="text" placeholder="Enter Artist Name"
                class="bg-[#1A1A1A]/80 border border-white/5 rounded-2xl py-6 px-8 text-white text-lg focus:outline-none focus:border-[#4D61FF] placeholder-white/20">
            <input type="text" placeholder="Enter Release Date"
                class="bg-[#1A1A1A]/80 border border-white/5 rounded-2xl py-6 px-8 text-white text-lg focus:outline-none focus:border-[#4D61FF] placeholder-white/20">
            <input type="text" placeholder="Enter ISRC Code"
                class="bg-[#1A1A1A]/80 border border-white/5 rounded-2xl py-6 px-8 text-white text-lg focus:outline-none focus:border-[#4D61FF] placeholder-white/20">
        </div>

        <div class="pt-10">
            <button @click="state = 'success'"
                class="w-full py-6 bg-transparent border-2 border-white/10 text-white font-bold text-xl rounded-2xl hover:bg-white/5 transition-all">
                Distribute now
            </button>
        </div>

        {{-- SUCCESS MODAL --}}
        <template x-if="state === 'success'">
            <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>

                {{-- Modal --}}
                <div
                    class="relative bg-[#1A1A1A] border border-gray-800 rounded-[40px] w-full max-w-lg p-12 shadow-2xl text-center">
                    {{-- Decorative Circles --}}
                    <div class="absolute top-10 left-20 w-4 h-4 rounded-full bg-magenta"></div>
                    <div class="absolute top-40 right-10 w-3 h-3 rounded-full bg-blue-500 blur-[2px]"></div>

                    {{-- Icon Container --}}
                    <div class="relative inline-block mb-10">
                        <div
                            class="w-32 h-32 rounded-full bg-magenta flex items-center justify-center shadow-[0_0_50px_rgba(214,0,214,0.4)]">
                            <i class="fas fa-shield-alt text-white text-5xl"></i>
                        </div>
                    </div>

                    <h2 class="text-white text-4xl font-bold mb-4">Congratulations!</h2>
                    <p class="text-gray-500 text-xl font-medium mb-12">Your Track has been distributed!</p>

                    <div class="flex justify-center gap-2">
                        @for($i = 0; $i < 5; $i++)
                            <div class="w-3 h-3 rounded-full bg-magenta/{{ 100 - ($i * 20) }}"></div>
                        @endfor
                    </div>

                    <div class="mt-12">
                        <button onclick="window.location.href='{{ route('consumer.forms.success.track-ready') }}'"
                            class="w-full py-5 bg-[#4D61FF] text-white font-bold text-xl rounded-2xl shadow-lg hover:bg-[#3D51EF] transition-all">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </template>

    </div>
@endsection