@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-[#4D61FF]/80">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-2xl font-bold text-[#4D61FF]">Standard Artist Agreement</h1>
        </div>

        <div class="space-y-8">
            <div>
                <h2 class="text-2xl font-bold text-white mb-2">Standard Artist Agreement</h2>
                <div class="flex justify-between items-start">
                    <p class="text-sm text-gray-400">Category: Artist - Type: Legal Agreement</p>
                    <button class="text-[#4D61FF] hover:text-white transition">
                        <i class="fas fa-download text-xl border rounded-full p-2 border-[#4D61FF]"></i>
                    </button>
                </div>
            </div>

            <div class="text-sm text-gray-300 space-y-6 leading-relaxed">
                <div>
                    <h3 class="font-bold text-white mb-2">1. Grant of Rights</h3>
                    <p>The Artist grants the Producer/Label the non-exclusive right to record, distribute, and promote the
                        musical works created under this agreement.</p>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-2">2. Compensation & Royalties</h3>
                    <p class="mb-2">Royalties shall be split as follows:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Artist: [Insert %]</li>
                        <li>Producer/Label: [Insert %]</li>
                        <li>Payments will be made quarterly via [Preferred Payment Method].</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-2">3. Ownership & Copyright</h3>
                    <p>The copyright of the composition and master recording will be shared equally unless otherwise stated
                        in writing.</p>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-2">4. Creative Control</h3>
                    <p>Both parties agree to maintain open communication regarding changes, releases, or public
                        performances.</p>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-2">5. Term & Termination</h3>
                    <p class="truncate">This agreement is valid for [Insert Duration], and either party may terminate it
                        with a 30-day written notice.</p>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-4">6. Signatures</h3>
                    <p class="mb-8">By signing below, both parties agree to the terms outlined above.</p>

                    <div class="space-y-6">
                        <div>
                            <p class="mb-2 text-white">Artist Signature: <span
                                    class="inline-block w-64 border-b border-gray-500"></span></p>
                        </div>
                        <div>
                            <p class="mb-2 text-white">Producer/Label Signature: <span
                                    class="inline-block w-64 border-b border-gray-500"></span></p>
                        </div>
                        <div>
                            <p class="mb-2 text-white">Date: <span
                                    class="inline-block w-40 border-b border-gray-500"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 space-y-4">
                <button onclick="window.location.href='{{ route('investments.checkout') }}'"
                    class="w-full py-4 bg-[#4D61FF] hover:bg-[#5a6dff] text-white font-bold rounded-lg transition shadow-lg shadow-[#4D61FF]/20">
                    Proceed
                </button>
                <button onclick="history.back()"
                    class="w-full py-4 bg-transparent border border-gray-700 text-white font-bold rounded-lg hover:bg-gray-800 transition">
                    Back to track
                </button>
            </div>
        </div>
    </div>
@endsection