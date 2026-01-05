@extends('layouts.app')


@section('content')
    {{-- Header --}}
    <div class="card border border-gray-700 rounded-lg p-6">
        <div class="card-header flex justify-between items-center mb-8">
            <p class="text-accent text-xl font-medium">
                <a href="{{ route('consumer.dashboard.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                Invest In Track
            </p>
        </div>

        <div class="card-body space-y-6">

            <!-- Product Card -->
            <div class="border border-purple-500 rounded-lg p-4 mb-8 hover:border-purple-400 transition">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
                            <span class="text-lg">🎵</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Night Vibes</h3>
                            <p class="text-sm text-gray-400">By Alex M.</p>
                        </div>
                    </div>
                    <span class="text-xl font-semibold text-white">$29.00</span>
                </div>
            </div>

            <!-- Subtotal -->
            <div class="flex justify-between mb-8 pb-4 border-b border-gray-700">
                <span class="text-gray-400">Subtotal</span>
                <span class="text-white font-semibold">$29.00</span>
            </div>

            <!-- Form Fields -->
            <form class="space-y-4 mb-8">
                <!-- Name -->
                <input type="text" placeholder="Name"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 transition">

                <!-- Credit Card -->
                <input type="text" placeholder="Credit Card No"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 transition">

                <!-- Expiry and CVV -->
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" placeholder="Expiry"
                        class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 transition">
                    <input type="text" placeholder="CVV"
                        class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 transition">
                </div>

                <!-- Checkbox -->
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" checked
                        class="w-5 h-5 bg-blue-600 border border-blue-600 rounded cursor-pointer accent-blue-600">
                    <span class="text-gray-300 text-sm">Save card for future purchases</span>
                </label>
            </form>

            <!-- Buttons -->
            <div class="space-y-3">
                <button onclick="showSuccessModal()"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                    Confirm & Pay
                </button>
                <button
                    class="w-full border border-gray-600 hover:border-gray-400 text-white font-semibold py-3 rounded-lg transition">
                    Back to track
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    {{-- <div id="successModal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center p-4 z-50"></div> --}}
    <div id="successModal" class="hidden bg-black/70 fixed inset-0 bg-opacity-90 flex items-center justify-center p-4 z-50">
        <div class="rounded-lg max-w-md w-full p-8 text-center" style="background-color: #252525">
            <!-- Animated Circle with Checkmark -->
            <div class="mb-8 flex justify-center">
                <div class="relative w-32 h-32">
                    <!-- Main Circle -->
                    <div class="absolute inset-0 bg-gradient-to-br from-pink-500 to-magenta-600 rounded-full flex items-center justify-center animate-pulse"
                        style="background: linear-gradient(135deg, rgb(236, 72, 153) 0%, rgb(236, 72, 153) 100%);">
                        <!-- Checkmark -->
                        <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center">
                            <svg class="w-10 h-10 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <!-- Floating Dots -->
                    <div class="absolute w-4 h-4 bg-pink-500 rounded-full top-0 left-8 animate-bounce"></div>
                    <div class="absolute w-3 h-3 bg-pink-400 rounded-full top-2 right-6 animate-bounce"
                        style="animation-delay: 0.2s;"></div>
                    <div class="absolute w-3 h-3 bg-pink-500 rounded-full bottom-8 left-2 animate-bounce"
                        style="animation-delay: 0.4s;"></div>
                    <div class="absolute w-2 h-2 bg-pink-400 rounded-full bottom-4 right-4 animate-bounce"
                        style="animation-delay: 0.6s;"></div>
                    <div class="absolute w-2 h-2 bg-pink-500 rounded-full top-16 right-0 animate-bounce"
                        style="animation-delay: 0.3s;"></div>
                </div>
            </div>

            <!-- Text Content -->
            <h2 class="text-3xl font-bold mb-3 text-white">Payment Successful</h2>
            <p class="text-gray-400 mb-8">Your Track is now available in your library</p>

            <!-- Buttons -->
            <div class="space-y-3">
                <button onclick="closeSuccessModal()"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                    Go to My Track
                </button>
                <button onclick="closeSuccessModal()"
                    class="w-full border border-gray-600 hover:border-gray-400 text-white font-semibold py-3 rounded-lg transition">
                    Explore more music
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSuccessModal();
            }
        });
    </script>
@endpush
