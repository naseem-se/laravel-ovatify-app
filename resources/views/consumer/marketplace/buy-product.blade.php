@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-10">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[24px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[36px] font-bold tracking-tight">Buy product</h1>
        </div>

        {{-- Main Container Card --}}
        <div class="bg-[#141414] rounded-[32px] border border-white/[0.03] p-10 space-y-12">

            {{-- Order Summary --}}
            <div class="space-y-8">
                <h2 class="text-white text-[22px] font-bold">Order summary</h2>

                <div class="flex flex-col md:flex-row gap-8 items-start pb-10 border-b border-white/[0.05]">
                    <div class="w-[180px] aspect-square rounded-[24px] overflow-hidden border border-white/[0.05]">
                        <img src="https://images.unsplash.com/photo-1620641788421-7a1c342ea42e?q=80&w=1974&auto=format&fit=crop"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1 space-y-6">
                        <div class="space-y-4">
                            <h3 class="text-white text-[24px] font-bold tracking-tight">Title of the image</h3>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/100?u=johna" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="text-white text-[14px] font-bold">Johna Smith</p>
                                    <a href="#"
                                        class="text-white/30 text-[11px] hover:text-[#4D61FF] transition-colors">View
                                        profile</a>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-2">
                            <div class="space-y-1">
                                <span
                                    class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Resolution</span>
                                <p class="text-white text-[14px] font-bold">1600x1600</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Format &
                                    Size</span>
                                <p class="text-white text-[14px] font-bold">PNG - 10 MB</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Upload
                                    date</span>
                                <p class="text-white text-[14px] font-bold">November 8, 2025</p>
                            </div>
                            <div class="space-y-1">
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Type:</span>
                                    <span class="text-white text-[12px] font-bold">Photo</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span
                                        class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Orientation:</span>
                                    <span class="text-white text-[12px] font-bold">Square</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment Form --}}
            <div class="space-y-10">
                <div class="flex justify-between items-center text-white">
                    <h2 class="text-[24px] font-bold">Subtotal</h2>
                    <span class="text-[28px] font-bold">$29.00</span>
                </div>

                <form class="space-y-6">
                    <input type="text" placeholder="Name"
                        class="w-full bg-[#0D0D0D] border border-white/[0.03] rounded-2xl py-5 px-8 text-white text-[16px] focus:border-[#4D61FF]/40 focus:ring-0 transition-all placeholder:text-white/10 italic">
                    <input type="text" placeholder="Credit Card No"
                        class="w-full bg-[#0D0D0D] border border-white/[0.03] rounded-2xl py-5 px-8 text-white text-[16px] focus:border-[#4D61FF]/40 focus:ring-0 transition-all placeholder:text-white/10 italic">

                    <div class="grid grid-cols-2 gap-6">
                        <input type="text" placeholder="Expiry"
                            class="bg-[#0D0D0D] border border-white/[0.03] rounded-2xl py-5 px-8 text-white text-[16px] focus:border-[#4D61FF]/40 focus:ring-0 transition-all placeholder:text-white/10 italic">
                        <input type="text" placeholder="CVV"
                            class="bg-[#0D0D0D] border border-white/[0.03] rounded-2xl py-5 px-8 text-white text-[16px] focus:border-[#4D61FF]/40 focus:ring-0 transition-all placeholder:text-white/10 italic">
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <input type="checkbox" id="save-card"
                            class="rounded-[4px] border-white/10 bg-transparent text-[#4D61FF] focus:ring-0 w-5 h-5">
                        <label for="save-card" class="text-white/40 text-[15px] font-medium">Save card for future
                            purchases</label>
                    </div>
                </form>
            </div>

            {{-- Action Buttons --}}
            <div class="pt-10 space-y-4">
                <button onclick="window.location.href='{{ route('consumer.marketplace.order.success') }}'"
                    class="w-full py-5 bg-[#4D61FF] text-white font-bold text-[18px] rounded-2xl hover:bg-[#3D51EF] transition-all transform active:scale-[0.995]">
                    Confirm & Pay
                </button>
                <button onclick="window.history.back()"
                    class="w-full py-5 bg-transparent border border-white/10 text-white font-bold text-[16px] rounded-2xl hover:bg-white/5 transition-all transform active:scale-[0.995]">
                    Back to image
                </button>
            </div>
        </div>

    </div>
@endsection