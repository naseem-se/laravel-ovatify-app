@extends('layouts.app')

@section('content')
<div class="max-w-[1000px] mx-auto pb-20" x-data="{ showSuccess: false }">

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-10 pt-4">
        <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-white transition-colors">
            <i class="fas fa-arrow-left text-2xl"></i>
        </a>
        <h1 class="text-[#4D61FF] text-3xl font-bold">License Track</h1>
    </div>

    {{-- Main Content --}}
    <div class="space-y-12">
        
        {{-- Order Summary --}}
        <section class="space-y-6">
            <h2 class="text-white text-xl font-bold">Order summary</h2>
            
            <div class="flex flex-col md:flex-row gap-10 items-start">
                <div class="w-64 h-64 rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1614613535308-eb5fbd3d2c17?w=600&h=600&fit=crop" 
                         class="w-full h-full object-cover">
                </div>

                <div class="flex-1 space-y-8">
                    <div class="space-y-4">
                        <h3 class="text-white text-2xl font-bold">Reflector (Vocal Mix)</h3>
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Alice+Smith&background=D600D6&color=fff" 
                                 class="w-8 h-8 rounded-full">
                            <div>
                                <p class="text-white font-medium text-sm">Alice Smith</p>
                                <p class="text-[10px] text-gray-500 hover:text-[#4D61FF] cursor-pointer transition-colors">View profile</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 lg:grid-cols-5 gap-6 pt-6 border-t border-white/5">
                        <div class="space-y-2">
                            <p class="text-gray-500 text-[10px] uppercase tracking-wider flex items-center gap-2">
                                <i class="fas fa-expand text-[#4D61FF]"></i> Resolution
                            </p>
                            <p class="text-white text-sm font-bold">48kHz / 24-bit</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-500 text-[10px] uppercase tracking-wider flex items-center gap-2">
                                <i class="far fa-image text-[#4D61FF]"></i> Format & Size
                            </p>
                            <p class="text-white text-sm font-bold">WAV - 45 MB</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-500 text-[10px] uppercase tracking-wider flex items-center gap-2">
                                <i class="far fa-calendar text-[#4D61FF]"></i> Upload date
                            </p>
                            <p class="text-white text-sm font-bold">Feb 7, 2026</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-500 text-[10px] uppercase tracking-wider">Type:</p>
                            <p class="text-white text-sm font-bold">Master</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-500 text-[10px] uppercase tracking-wider">Orientation:</p>
                            <p class="text-white text-sm font-bold">Stereo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Payment Section --}}
        <section class="space-y-8">
            <div class="flex justify-between items-center px-1">
                <h2 class="text-white text-xl font-bold">Enter your credit card</h2>
                <div class="text-white text-2xl font-bold">$89.99</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 col-span-2">
                    <input type="text" placeholder="Name" 
                           class="w-full bg-[#1A1A1A] border border-white/5 rounded-xl px-6 py-4 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#4D61FF]/50 transition-all">
                </div>
                <div class="space-y-2 col-span-2">
                    <input type="text" placeholder="Credit Card No" 
                           class="w-full bg-[#1A1A1A] border border-white/5 rounded-xl px-6 py-4 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#4D61FF]/50 transition-all">
                </div>
                <div class="space-y-2">
                    <input type="text" placeholder="Expiry" 
                           class="w-full bg-[#1A1A1A] border border-white/5 rounded-xl px-6 py-4 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#4D61FF]/50 transition-all">
                </div>
                <div class="space-y-2">
                    <input type="text" placeholder="CVV" 
                           class="w-full bg-[#1A1A1A] border border-white/5 rounded-xl px-6 py-4 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#4D61FF]/50 transition-all">
                </div>
            </div>

            <label class="flex items-center gap-3 cursor-pointer group">
                <div class="relative">
                    <input type="checkbox" checked class="peer sr-only">
                    <div class="w-5 h-5 border border-white/20 rounded-md bg-[#1A1A1A] peer-checked:bg-[#4D61FF] peer-checked:border-[#4D61FF] transition-all"></div>
                    <i class="fas fa-check absolute inset-0 flex items-center justify-center text-[10px] text-white opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                </div>
                <span class="text-sm text-gray-400 group-hover:text-white transition-colors">Save card for future purchases</span>
            </label>

            <div class="space-y-4 pt-6">
                <button @click="showSuccess = true"
                        class="w-full py-5 bg-[#4D61FF] text-white font-bold text-lg rounded-xl hover:bg-[#3D51EF] transition-all shadow-lg active:scale-95">
                    Confirm & Pay
                </button>
                <button onclick="window.history.back()"
                        class="w-full py-5 bg-transparent border border-white/10 text-white font-bold text-lg rounded-xl hover:bg-white/5 transition-all outline-none">
                    Back to track
                </button>
            </div>
        </section>
    </div>

    {{-- License Successful Modal (Matches Licensing Summary (1).png / Confirmation.png) --}}
    <div x-show="showSuccess" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-black/90 backdrop-blur-sm"
         style="display: none;"
         @keydown.escape.window="showSuccess = false">
        
        {{-- Modal Container --}}
        <div @click.away="showSuccess = false"
             class="bg-[#1A1A1A] rounded-[48px] px-8 py-16 w-full max-w-[480px] text-center relative border border-white/5 shadow-22xl">
            
            {{-- Decorative Blubs --}}
            <div class="absolute top-12 left-12 w-3 h-3 bg-magenta rounded-full opacity-60"></div>
            <div class="absolute top-24 right-12 w-2 h-2 bg-magenta rounded-full opacity-40"></div>
            <div class="absolute bottom-24 left-16 w-2 h-2 bg-magenta rounded-full opacity-30"></div>
            <div class="absolute bottom-12 right-20 w-3 h-3 bg-magenta rounded-full opacity-50"></div>

            {{-- Success Icon Circle --}}
            <div class="relative w-36 h-36 mx-auto mb-12">
                <div class="w-full h-full bg-magenta rounded-full flex items-center justify-center shadow-[0_0_60px_rgba(214,0,214,0.5)] relative z-10 transition-transform hover:scale-110 duration-500">
                    <i class="fas fa-check text-white text-5xl"></i>
                </div>
                <div class="absolute inset-0 bg-magenta/20 rounded-full animate-ping"></div>
            </div>

            <div class="space-y-4 mb-12 px-4">
                <h2 class="text-white text-3xl font-bold tracking-tight">License Successful</h2>
                <p class="text-gray-400 text-base font-medium">Your asset is now available in your library!</p>
            </div>

            <div class="space-y-4">
                <button onclick="window.location.href='{{ route('consumer.marketplace.index') }}'"
                        class="w-full py-5 bg-[#4D61FF] text-white font-bold text-base rounded-full hover:bg-[#3D51EF] transition-all shadow-xl active:scale-95">
                    Explore more tracks
                </button>
                <button onclick="window.location.href='{{ route('consumer.dashboard.index') }}'"
                        class="w-full py-5 bg-transparent border-2 border-white/10 text-white font-bold text-base rounded-full hover:bg-white/5 transition-all active:scale-95">
                    Back to home
                </button>
            </div>
        </div>
    </div>

</div>
@endsection