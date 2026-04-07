@extends('layouts.app')

@section('content')
    <div class="max-w-[1140px] mx-auto pb-20 relative">

        {{-- Top Navigation (Figma Match) --}}
        <div class="flex items-center gap-6 pt-2 mb-12">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:opacity-80 transition-all">
                <i class="fas fa-arrow-left text-[22px]"></i>
            </a>
            <h1 class="text-[#4D61FF] text-[34px] font-bold tracking-tight">Standard Artist Agreement</h1>
        </div>

        {{-- Agreement Card (Figma Match) --}}
        <div class="bg-[#141414] rounded-[32px] p-12 border border-white/[0.03] relative shadow-2xl">

            {{-- Download Button (Figma Match) --}}
            <button
                class="absolute top-12 right-12 w-14 h-14 bg-magenta rounded-full flex items-center justify-center shadow-xl shadow-magenta/20 group hover:scale-105 transition-all">
                <i class="fas fa-download text-white text-[20px]"></i>
            </button>

            <div class="mb-12">
                <h2 class="text-white text-[32px] font-bold mb-2">Standard Artist Agreement</h2>
                <p class="text-white/30 text-[14px] font-medium tracking-wide">Category: Artist - Type: Legal Agreement</p>
            </div>

            <div class="space-y-12 text-white/60 text-[16px] leading-[1.8]">
                <div class="space-y-4">
                    <h3 class="text-white font-bold">1. Grant of Rights</h3>
                    <p>The Artist grants the Producer/Label the non-exclusive right to record, distribute, and promote the
                        musical works created under this agreement.</p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-white font-bold">2. Compensation & Royalties</h3>
                    <p>Royalties shall be split as follows:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Artist: [Insert %]</li>
                        <li>Producer/Label: [Insert %]</li>
                    </ul>
                    <p class="text-[14px] opacity-70 italic mt-4">Payments will be made quarterly via [Preferred Payment
                        Method].</p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-white font-bold">3. Ownership & Copyright</h3>
                    <p>The copyright of the composition and master recording will be shared equally unless otherwise stated
                        in writing.</p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-white font-bold">4. Creative Control</h3>
                    <p>Both parties agree to maintain open communication regarding changes, releases, or public
                        performances.</p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-white font-bold">5. Term & Termination</h3>
                    <p>This agreement is valid for [Insert Duration], and either party may terminate it with a 30-day
                        written notice.</p>
                </div>

                <div class="space-y-8 pt-6">
                    <h3 class="text-white font-bold">6. Signatures</h3>
                    <p>By signing below, both parties agree to the terms outlined above.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-10">
                        <div class="space-y-2">
                            <div class="h-[1px] bg-white/20 w-full mb-2"></div>
                            <p class="text-[14px] font-bold">Artist Signature: _________________</p>
                        </div>
                        <div class="space-y-2">
                            <div class="h-[1px] bg-white/20 w-full mb-2"></div>
                            <p class="text-[14px] font-bold">Producer/Label Signature: _______________</p>
                        </div>
                    </div>
                    <p class="text-[14px] font-bold">Date: _______________</p>
                </div>
            </div>
        </div>

        {{-- Footer Actions (Matching Previous Standard) --}}
        <div class="pt-16">
            <button onclick="window.location.href='{{ route('consumer.distribution.review-license') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-[20px] rounded-2xl shadow-xl shadow-[#4D61FF]/10 hover:bg-[#3D51EF] transition-all active:scale-[0.995]">
                Confirm & Proceed
            </button>
        </div>

    </div>
@endsection