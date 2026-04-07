@extends('layouts.app')

@section('content')
    <div class="max-w-[700px] mx-auto py-10" x-data="{ showSuccess: false }">
        {{-- Header Section (Figma Match) --}}
        <div class="space-y-1 mb-12 pl-4">
            <h1 class="text-magenta text-[24px] font-black tracking-tight leading-none uppercase">Checkout</h1>
            <h2 class="text-white text-[48px] font-black tracking-tighter leading-tight">Order Summary</h2>
        </div>

        <div class="bg-[#141414] rounded-[40px] p-10 border border-white/5 space-y-10 shadow-3xl">
            {{-- Order Summary Item --}}
            <div class="space-y-6">
                <div
                    class="p-6 rounded-[24px] border border-magenta/30 bg-[#1A1B23] flex justify-between items-center shadow-lg">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-16 rounded-[16px] overflow-hidden border border-white/10">
                            <img src="{{ asset('images/login.png') }}" class="w-full h-full object-cover opacity-60">
                        </div>
                        <div>
                            <h3 class="text-white font-black text-[18px]">Cloudside</h3>
                            <p class="text-[12px] text-white/20 font-bold uppercase tracking-widest">By Luna Beats</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Price Breakdown --}}
            <div class="space-y-6 border-t border-white/5 pt-10">
                <div class="flex justify-between items-center px-4">
                    <h3 class="text-white/40 font-bold text-[18px] uppercase tracking-widest">Subtotal</h3>
                    <span class="text-white font-black text-[24px] tracking-tight">$19.00</span>
                </div>
                <div class="flex justify-between items-center px-4 bg-white/5 py-4 rounded-xl">
                    <h3 class="text-magenta font-black text-[20px] uppercase tracking-widest">Total</h3>
                    <span class="text-magenta font-black text-[32px] tracking-tight">$19.00</span>
                </div>
            </div>

            {{-- Form Fields --}}
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-white/30 text-[12px] font-black uppercase tracking-widest ml-4">Cardholder
                        Name</label>
                    <input type="text" placeholder="Full Name"
                        class="w-full bg-[#0A0A0A] border border-white/5 rounded-2xl px-6 py-5 text-white placeholder:text-white/10 text-[16px] font-medium focus:outline-none focus:border-magenta/40 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-white/30 text-[12px] font-black uppercase tracking-widest ml-4">Card
                        Information</label>
                    <div class="relative">
                        <input type="text" placeholder="0000 0000 0000 0000"
                            class="w-full bg-[#0A0A0A] border border-white/5 rounded-2xl px-6 py-5 text-white placeholder:text-white/10 text-[16px] font-medium focus:outline-none focus:border-magenta/40 transition-all">
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 flex gap-2">
                            <i class="fab fa-cc-visa text-white/20 text-xl"></i>
                            <i class="fab fa-cc-mastercard text-white/20 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <input type="text" placeholder="MM/YY"
                        class="w-full bg-[#0A0A0A] border border-white/5 rounded-2xl px-6 py-5 text-white placeholder:text-white/10 text-[16px] font-medium focus:outline-none focus:border-magenta/40 transition-all">
                    <input type="text" placeholder="CVV"
                        class="w-full bg-[#0A0A0A] border border-white/5 rounded-2xl px-6 py-5 text-white placeholder:text-white/10 text-[16px] font-medium focus:outline-none focus:border-magenta/40 transition-all">
                </div>
            </div>

            <div class="pt-6">
                <button @click="showSuccess = true"
                    class="w-full py-6 bg-magenta text-white font-black text-[20px] uppercase tracking-widest rounded-3xl shadow-2xl shadow-magenta/20 hover:scale-[1.02] transition-all active:scale-[0.98]">
                    Confirm Payment
                </button>
            </div>
        </div>

        {{-- Success Modal (Figma Match) --}}
        <div x-show="showSuccess" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 backdrop-blur-xl transition-opacity"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <div class="bg-[#141414] rounded-[48px] p-12 w-full max-w-md text-center shadow-3xl relative border border-white/5"
                @click.away="showSuccess = false">

                {{-- Success Icon (Figma Match - Solid Magenta with White Check) --}}
                <div class="mx-auto w-32 h-32 relative mb-10 mt-4">
                    {{-- Decorative dots --}}
                    <div class="absolute -top-2 -right-2 w-3 h-3 bg-magenta rounded-full"></div>
                    <div class="absolute bottom-4 -left-3 w-2.5 h-2.5 bg-magenta rounded-full opacity-60"></div>
                    <div class="absolute top-1/2 -right-8 w-2 h-2 bg-magenta rounded-full opacity-40"></div>
                    <div class="absolute top-4 left-4 w-2 h-2 bg-magenta rounded-full opacity-20"></div>

                    <div
                        class="absolute inset-0 bg-magenta rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(255,0,255,0.3)]">
                        <i class="fas fa-check text-[48px] text-white"></i>
                    </div>
                </div>

                <h2 class="text-[32px] font-black text-white mb-3 tracking-tighter">Payment Successful</h2>
                <p class="text-white/40 text-[16px] font-bold mb-12">Your Track is now available in your library</p>

                <div class="space-y-4 px-4 pb-4">
                    <button onclick="window.location.href='{{ route('consumer.marketplace.index') }}'"
                        class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[16px] rounded-full hover:bg-[#3D51EF] transition-all shadow-lg shadow-blue-500/10">
                        Explore more tracks
                    </button>
                    <button @click="showSuccess = false"
                        class="w-full py-5 bg-transparent border border-white/20 text-white font-bold text-[16px] rounded-full hover:bg-white/5 transition-all">
                        Back to home
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection