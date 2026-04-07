@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto" x-data="{ license: 'personal' }">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-[#4D61FF] hover:text-[#4D61FF]/80 transition-colors">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-3xl font-bold text-[#4D61FF]">Select type of license</h1>
        </div>

        <div class="space-y-4 mb-12">
            {{-- Personal License --}}
            <div @click="license = 'personal'"
                :class="{ 'border-[#4D61FF] bg-[#1A1A1A]': license === 'personal', 'border-white/5 bg-[#1A1A1A]': license !== 'personal' }"
                class="p-6 rounded-2xl border cursor-pointer transition-all hover:border-white/20">
                <span class="text-white font-bold text-lg">Personal license</span>
            </div>

            {{-- Commercial License --}}
            <div @click="license = 'commercial'"
                :class="{ 'border-[#4D61FF] bg-[#1A1A1A]': license === 'commercial', 'border-white/5 bg-[#1A1A1A]': license !== 'commercial' }"
                class="p-6 rounded-2xl border cursor-pointer transition-all hover:border-white/20">
                <span class="text-white font-bold text-lg">Commercial license</span>
            </div>

            {{-- Sync License --}}
            <div @click="license = 'sync'"
                :class="{ 'border-[#4D61FF] bg-[#1A1A1A]': license === 'sync', 'border-white/5 bg-[#1A1A1A]': license !== 'sync' }"
                class="p-6 rounded-2xl border cursor-pointer transition-all hover:border-white/20">
                <span class="text-white font-bold text-lg">Sync license</span>
            </div>
        </div>

        <div class="space-y-4">
            <button onclick="window.location.href='{{ route('consumer.marketplace.buy-product') }}'"
                class="w-full py-5 bg-[#4D61FF] hover:bg-[#3D51EF] text-white font-bold rounded-2xl transition-all shadow-lg shadow-[#4D61FF]/10 active:scale-[0.98]">
                Proceed
            </button>
            <button onclick="window.history.back()"
                class="w-full py-5 bg-transparent border border-white/10 text-white font-bold rounded-2xl hover:bg-white/5 transition-all">
                Back to track
            </button>
        </div>
    </div>
@endsection