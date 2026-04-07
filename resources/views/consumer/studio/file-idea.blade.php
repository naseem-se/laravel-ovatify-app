@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20">

        {{-- Header --}}
        <h1 class="text-[#4D61FF] text-3xl font-bold pt-4 mb-4">File Uploaded Successfully</h1>

        <x-studio-stepper :currentStep="2" />

        {{-- File Info Box --}}
        <div class="bg-[#1A1A1A] rounded-[24px] p-8 mb-12">
            <h3 class="text-white text-xl font-bold mb-2">My Music file</h3>
            <p class="text-gray-500 font-medium text-lg">beat.wav • 120 BPM • 3.2 MB</p>
        </div>

        {{-- Secondary Section --}}
        <div class="space-y-8">
            <h3 class="text-white text-2xl font-bold">Want to add more ideas?</h3>
            <div class="h-px bg-white/5"></div>

            <div class="grid grid-cols-2 gap-4">
                <button onclick="window.location.href='{{ route('consumer.studio.idea.text') }}'"
                    class="w-full py-4 bg-transparent border border-white/10 rounded-xl text-white font-bold text-sm hover:bg-white/5 transition-all">
                    Write Idea
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
            <button onclick="window.location.href='{{ route('consumer.studio.upload') }}'"
                class="w-full py-6 bg-transparent border-2 border-white/5 text-white font-bold text-xl rounded-2xl hover:bg-white/5 transition-all">
                Upload again
            </button>
        </div>

    </div>
@endsection