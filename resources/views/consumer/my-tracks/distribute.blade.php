@extends('layouts.app')

@section('content')
    <div x-data="{ showSuccess: false }" class="max-w-3xl mx-auto relative">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-[#4D61FF]/80">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-3xl font-bold text-[#4D61FF]">Distribute Your Track</h1>
        </div>

        {{-- Form Content --}}
        <div class="space-y-8">
            {{-- Choose Track --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-4">Choose Track</label>
                <div class="flex flex-wrap gap-6">
                    @foreach(['Lorem', 'Lorem', 'Ipsum', 'Ipsum', 'Ipsum'] as $i => $track)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="track" class="w-4 h-4 accent-[#4D61FF]" {{ $i === 0 ? 'checked' : '' }}>
                            <span class="text-sm text-gray-300">{{ $track }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Upload Area --}}
            <div
                class="border-2 border-dashed border-[#4D61FF]/30 rounded-lg h-64 flex flex-col items-center justify-center bg-[#1A1A1A] hover:bg-[#252525] transition cursor-pointer group">
                <div class="w-12 h-12 mb-4 border-2 border-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <p class="text-gray-300 font-medium">Upload your audio track</p>
            </div>

            {{-- Input Fields --}}
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <input type="text" placeholder="Enter Release title"
                        class="w-full bg-[#1A1A1A]/50 border border-gray-800 rounded-lg px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
                <div>
                    <input type="text" placeholder="Enter Artist Name"
                        class="w-full bg-[#1A1A1A]/50 border border-gray-800 rounded-lg px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
                <div>
                    <input type="text" placeholder="Enter Release Date"
                        class="w-full bg-[#1A1A1A]/50 border border-gray-800 rounded-lg px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
                <div>
                    <input type="text" placeholder="Enter ISRC Code"
                        class="w-full bg-[#1A1A1A]/50 border border-gray-800 rounded-lg px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
            </div>

            {{-- Distribute Button --}}
            <button @click="showSuccess = true"
                class="w-full py-4 rounded-lg border border-gray-600 text-white font-medium hover:bg-gray-800 transition">
                Distribute now
            </button>
        </div>

        {{-- Success Modal --}}
        <div x-show="showSuccess" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm">

            <div @click.away="showSuccess = false"
                x-init="$watch('showSuccess', value => { if (value) setTimeout(() => window.location.href = '{{ route('consumer.forms.success.track-ready') }}', 2000) })"
                class="bg-[#252525] rounded-3xl p-12 text-center max-w-sm w-full shadow-2xl relative overflow-hidden">

                {{-- Confetti Effects (Simulated with dots) --}}
                <div class="absolute top-10 left-10 w-2 h-2 rounded-full bg-magenta animate-ping"></div>
                <div class="absolute top-20 right-10 w-3 h-3 rounded-full bg-[#4D61FF] animate-bounce"></div>
                <div class="absolute bottom-10 left-20 w-2 h-2 rounded-full bg-white opacity-50"></div>

                {{-- Shield Icon --}}
                <div
                    class="w-24 h-24 rounded-full bg-magenta mx-auto mb-6 flex items-center justify-center shadow-[0_0_30px_rgba(255,0,255,0.4)]">
                    <div class="w-10 h-12 bg-white rounded-b-lg relative flex items-center justify-center">
                        <svg class="w-6 h-6 text-magenta" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <h2 class="text-xl font-bold text-white mb-2">Congratulations!</h2>
                <p class="text-sm text-gray-400 mb-8">Your Track has been distributed!</p>

                {{-- Loading Spinner --}}
                <div class="flex justify-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-magenta animate-bounce" style="animation-delay: 0s"></span>
                    <span class="w-2 h-2 rounded-full bg-magenta animate-bounce" style="animation-delay: 0.1s"></span>
                    <span class="w-2 h-2 rounded-full bg-magenta animate-bounce" style="animation-delay: 0.2s"></span>
                    <span class="w-2 h-2 rounded-full bg-magenta animate-bounce" style="animation-delay: 0.3s"></span>
                    <span class="w-2 h-2 rounded-full bg-magenta animate-bounce" style="animation-delay: 0.4s"></span>
                </div>
            </div>
        </div>

    </div>
@endsection