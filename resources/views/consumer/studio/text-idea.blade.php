@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20">

        {{-- Header --}}
        <div class="flex items-center justify-between pt-4 mb-4">
            <h1 class="text-white text-3xl font-bold">Your text idea</h1>
            <button class="text-[#4D61FF] text-xl font-bold hover:opacity-80 transition-opacity">Edit</button>
        </div>

        <x-studio-stepper :currentStep="2" />

        {{-- Text Idea Box --}}
        <div class="bg-[#1A1A1A] rounded-[24px] p-8 mb-12">
            <p class="text-gray-400 text-lg leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
            </p>
        </div>

        {{-- Secondary Section --}}
        <div class="space-y-8">
            <div class="flex items-center justify-between">
                <h3 class="text-white text-2xl font-bold">Want to add more ideas?</h3>
            </div>
            <div class="h-px bg-white/5"></div>

            <div class="grid grid-cols-2 gap-4">
                <button
                    class="w-full py-4 bg-transparent border border-white/10 rounded-xl text-white font-bold text-sm hover:bg-white/5 transition-all">
                    Upload Document
                </button>
                <button onclick="window.location.href='{{ route('consumer.studio.record') }}'"
                    class="w-full py-4 bg-transparent border border-white/10 rounded-xl text-white font-bold text-sm hover:bg-white/5 transition-all">
                    Record Audio
                </button>
            </div>
        </div>

        {{-- Actions --}}
        <div class="pt-20 space-y-4">
            <button onclick="window.location.href='{{ route('consumer.studio.customize') }}'"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-xl rounded-2xl shadow-xl hover:bg-[#3D51EF] transition-all">
                Approve to continue
            </button>
            <button onclick="window.location.href='{{ url()->previous() }}'"
                class="w-full py-6 bg-transparent border-2 border-white/5 text-white font-bold text-xl rounded-2xl hover:bg-white/5 transition-all">
                Back
            </button>
        </div>

    </div>
@endsection