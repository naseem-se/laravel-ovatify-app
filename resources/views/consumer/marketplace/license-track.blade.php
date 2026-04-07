@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto" x-data="{ showSuccess: false }">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-[#4D61FF]/80">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-3xl font-bold text-[#4D61FF]">License Track</h1>
        </div>

        <div class="bg-[#252525] rounded-xl p-8 border border-gray-800">
            {{-- Order Summary --}}
            <h2 class="text-xl font-bold text-white mb-6">Order summary</h2>

            <div class="flex gap-6 mb-8 border-b border-gray-700 pb-8">
                {{-- Image --}}
                <div class="w-32 h-32 rounded-lg overflow-hidden flex-shrink-0">
                    <img src="https://picsum.photos/400/400?random=50" class="w-full h-full object-cover">
                </div>

                {{-- Details --}}
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-white mb-2">Title of the image</h3>

                    <div class="flex items-center gap-2 mb-6">
                        <img src="https://i.pravatar.cc/32?img=8" class="w-6 h-6 rounded-full">
                        <div>
                            <p class="text-sm font-bold text-white">Johna Smith</p>
                            <p class="text-[10px] text-gray-500 line-through">View profile</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4 text-[10px] text-gray-400">
                        <div>
                            <span class="block text-[#4D61FF] mb-1"><i class="fas fa-expand"></i> Resolution</span>
                            <span class="font-bold text-white">1600x1600</span>
                        </div>
                        <div>
                            <span class="block text-[#4D61FF] mb-1"><i class="fas fa-file-image"></i> Format & Size</span>
                            <span class="font-bold text-white">PNG - 10 MB</span>
                        </div>
                        <div>
                            <span class="block text-[#4D61FF] mb-1"><i class="far fa-calendar"></i> Upload date</span>
                            <span class="font-bold text-white">November 8, 2025</span>
                        </div>
                        <div>
                            <span class="block text-white mb-1">Type:</span>
                            <span class="block text-white mb-1">Photo</span>
                            <span class="block text-white">Orientation:</span>
                            <span class="block text-white">Square</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Credit Card Form --}}
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-medium text-white">Enter your credit card</h3>
                <span class="text-xl font-bold text-white">$29.00</span>
            </div>

            <div class="space-y-4 mb-6">
                <div>
                    <input type="text" placeholder="Name"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
                <div>
                    <input type="text" placeholder="Credit Card No"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Expiry"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:border-[#4D61FF]">
                    <input type="text" placeholder="CVV"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:border-[#4D61FF]">
                </div>
            </div>

            <label class="flex items-center gap-3 cursor-pointer mb-8">
                <input type="checkbox" checked
                    class="w-5 h-5 rounded border-gray-600 bg-[#4D61FF] text-[#4D61FF] focus:ring-[#4D61FF]">
                <span class="text-sm text-gray-300">Save card for future purchases</span>
            </label>

            <div class="space-y-4">
                <button @click="showSuccess = true"
                    class="w-full py-4 bg-[#4D61FF] hover:bg-[#5a6dff] text-white font-bold rounded-lg transition shadow-lg shadow-[#4D61FF]/20">
                    Confirm & Pay
                </button>
                <button
                    class="w-full py-4 bg-transparent border border-gray-700 text-white font-bold rounded-lg hover:bg-gray-800 transition">
                    Back to track
                </button>
            </div>
        </div>

        {{-- Success Modal Overlay --}}
        <div x-show="showSuccess" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm transition-opacity">
            <div
                class="bg-[#2a2a2a] rounded-3xl p-8 w-full max-w-md text-center shadow-2xl relative border border-gray-700">

                {{-- Decorative circles --}}
                <div class="mx-auto w-24 h-24 relative mb-6">
                    <div class="absolute inset-0 bg-magenta rounded-full animate-pulse opacity-20"></div>
                    <div
                        class="absolute inset-2 bg-magenta rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(255,0,255,0.4)]">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    {{-- Confetti dots --}}
                    <div class="absolute top-0 right-0 w-2 h-2 bg-magenta rounded-full"></div>
                    <div class="absolute bottom-2 left-0 w-1.5 h-1.5 bg-magenta rounded-full"></div>
                    <div class="absolute top-1/2 -left-4 w-2 h-2 bg-magenta rounded-full"></div>
                </div>

                <h2 class="text-2xl font-bold text-white mb-2">License Successful</h2>
                <p class="text-gray-400 text-sm mb-8">Your asset is now available in your library!</p>

                <div class="space-y-3">
                    <button
                        class="w-full py-3.5 bg-[#4D61FF] hover:bg-[#5a6dff] text-white font-bold rounded-full transition shadow-lg shadow-[#4D61FF]/20 text-sm">
                        Explore more images
                    </button>
                    <button @click="showSuccess = false"
                        class="w-full py-3.5 bg-transparent border border-gray-600 hover:border-gray-500 text-white font-bold rounded-full transition text-sm">
                        Back to home
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection