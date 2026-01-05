@extends('layouts.app')

<style>
    .wave-bar {
        width: 3px;
        background: rgba(139, 92, 246, 0.25);
        border-radius: 2px;
        transition: height 0.1s ease, background-color 0.1s ease;
        pointer-events: none;
        min-height: 4px;
    }

    .wave-bar.active {
        background: linear-gradient(to top, #8B5CF6, #22D3EE);
    }

    .progress-slider {
        appearance: none;
        width: 100%;
        height: 4px;
        background: rgba(139, 92, 246, 0.2);
        border-radius: 2px;
        cursor: pointer;
        outline: none;
    }

    .progress-slider::-webkit-slider-thumb {
        appearance: none;
        width: 12px;
        height: 12px;
        background: #8B5CF6;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 0 8px rgba(139, 92, 246, 0.5);
    }

    .progress-slider::-moz-range-thumb {
        width: 12px;
        height: 12px;
        background: #8B5CF6;
        border-radius: 50%;
        cursor: pointer;
        border: none;
        box-shadow: 0 0 8px rgba(139, 92, 246, 0.5);
    }

    .progress-slider::-moz-range-track {
        background: none;
        border: none;
    }

    .volume-slider {
        appearance: none;
        width: 100px;
        height: 4px;
        background: rgba(139, 92, 246, 0.2);
        border-radius: 2px;
        cursor: pointer;
        outline: none;
    }

    .volume-slider::-webkit-slider-thumb {
        appearance: none;
        width: 10px;
        height: 10px;
        background: #8B5CF6;
        border-radius: 50%;
        cursor: pointer;
    }

    .volume-slider::-moz-range-thumb {
        width: 10px;
        height: 10px;
        background: #8B5CF6;
        border-radius: 50%;
        cursor: pointer;
        border: none;
    }

    .control-btn {
        transition: all 0.2s ease;
    }

    .control-btn:hover {
        transform: scale(1.05);
    }

    .control-btn:active {
        transform: scale(0.95);
    }
</style>

@section('content')
    {{-- Header --}}
    <div class="card border border-gray-700 rounded-lg p-6">
        <div class="card-header flex justify-between items-center mb-8">
            <p class="text-accent text-xl font-medium">
                <a href="{{ route('consumer.my.tracks') }}"><i class="fa-solid fa-arrow-left"></i></a>
                View Track Details
            </p>
        </div>

        <div class="card-body space-y-6 border-t border-gray-700 p-4">

            <!-- ========== Creator Section ========== -->
            <section class="flex items-center gap-4">
                <img src="https://i.pravatar.cc/100" alt="Creator Avatar"
                    class="w-14 h-14 rounded-full border border-white/10" />
                <div>
                    <h2 class="text-lg font-semibold">John Smith</h2>
                    <p class="text-sm text-mutedText">POP Music Expert</p>
                </div>
            </section>

            <!-- ================= Audio Player ================= -->
           <x-audio link="{{ asset('images/audio.mp3') }}" />

   
            <div class="mb-12">
                <h1 class="text-xl font-bold mb-8 border-b border-gray-800 pb-4">Investment Details</h1>
                
                <div class="space-y-6">
                    <!-- Smart Contract ID -->
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Smart Contract ID</span>
                        <span class="text-gray-400 text-md">#025645687</span>
                    </div>

                    <!-- License Type -->
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 ftext-md">License Type</span>
                        <span class="text-gray-400 text-md">Personal</span>
                    </div>

                    <!-- Date Licensed -->
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Date Licensed</span>
                        <span class="text-gray-400 text-md">April 12, 2025</span>
                    </div>

                    <!-- Price Paid -->
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Price Paid</span>
                        <span class="text-gray-400 text-md">$120</span>
                    </div>

                    <!-- Ownership -->
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300 text-md">Ownership</span>
                        <span class="text-gray-400 text-md">05% of track revenue</span>
                    </div>

                    <!-- Investment Status -->
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300 text-md">Investment Status</span>
                        <span class="text-green-500 text-md">Active</span>
                    </div>
                </div>
            </div>

            <!-- Licensing Section -->
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Licensing</h2>
                    <div class="border border-purple-600 rounded px-3 py-1">
                        <span class="text-gray-300">$19</span>
                    </div>
                </div>

                <!-- Document -->
                <div style="background: #252525" class="rounded-lg p-4 flex justify-between items-center">
                    <span class="text-gray-300">Standard Agreement.pdf</span>
                    <a href="#" class="text-blue-500 hover:text-blue-400 transition font-medium">View</a>
                </div>
            </div>


        </div>
    </div>
@endsection

