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
                <a href="{{ route('consumer.dashboard.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
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

            <!-- ========== Description Section ========== -->
            <section class="space-y-2">
                <h3 class="text-lg font-semibold">Description</h3>
                <p class="text-sm text-mutedText leading-relaxed">
                    This AI-generated track blends smooth Lo-fi beats with modern pop textures.
                    Designed for relaxation, productivity, and ambient listening.
                </p>
            </section>

            <!-- ========== Metadata Section ========== -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-cardBg rounded-xl p-6 border border-gray-700/50">
                <div class="text-left">
                    <h4 class="text-2xl font-semibold">100</h4>
                    <p class="text-sm text-gray-300">Total Blocks</p>
                </div>
                <div class="text-left">
                    <h4 class="text-2xl font-semibold">20</h4>
                    <p class="text-sm text-gray-300">Remaining Blocks</p>
                </div>
                <div class="text-left">
                    <h4 class="text-2xl font-semibold">$120</h4>
                    <p class="text-sm text-gray-300">Price per Block</p>
                </div>
            </section>

            <!-- ========== Tags Section ========== -->
            <section class="flex flex-wrap gap-3">
                <span class="px-4 py-2 rounded-full text-sm bg-white/10 border border-white/10 hover:bg-white/20 transition">Genre - Lo-fi</span>
                <span class="px-4 py-2 rounded-full text-sm bg-white/10 border border-white/10 hover:bg-white/20 transition">BPM - 75</span>
            </section>

            <!-- ========== Investment Section ========== -->
            <section class="bg-cardBg rounded-xl p-6 border border-gray-700/50 space-y-5">
                <h3 class="text-lg font-semibold">Select Blocks to Invest</h3>

                <!-- Quantity Selector -->
                <div class="flex items-center gap-4">
                    <button id="decreaseBtn" class="control-btn w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 font-semibold text-lg">−</button>
                    <span id="quantityDisplay" class="text-2xl font-semibold w-12 text-center">01</span>
                    <button id="increaseBtn" class="control-btn w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 font-semibold text-lg">+</button>
                </div>
            </section>

        </div>
    </div>
@endsection
