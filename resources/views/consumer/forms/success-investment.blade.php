@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto pb-20 relative" x-data="{ selected: 'license' }">

        {{-- Top Navigation --}}
        <div class="flex items-center gap-4 pt-4 mb-10">
            <a href="{{ route('consumer.creator.dashboard') }}" class="text-[#4D61FF] hover:opacity-80 transition-opacity">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h1 class="text-[#4D61FF] text-3xl font-bold">Congratulations, Your track is open for investment</h1>
        </div>

        <div class="mb-12">
            <p class="text-white text-2xl font-bold">What would you like to do now?</p>
        </div>

        <div class="space-y-4">
            {{-- OPTION 1: LICENSING --}}
            <div @click="selected = 'license'"
                :class="selected === 'license' ? 'border-[#4D61FF] bg-[#4D61FF]/5' : 'border-white/5 bg-[#1A1A1A]'"
                class="rounded-[16px] p-8 border-2 cursor-pointer transition-all hover:border-[#4D61FF]/50 flex items-start gap-6 group">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="far fa-copyright text-white text-xl"></i>
                </div>
                <div>
                    <span class="text-white text-lg font-medium group-hover:text-[#4D61FF] transition-colors">Let brands and
                        creators use legally</span>
                </div>
            </div>

            {{-- OPTION 2: SALE --}}
            <div @click="selected = 'sale'"
                :class="selected === 'sale' ? 'border-[#4D61FF] bg-[#4D61FF]/5' : 'border-white/5 bg-[#1A1A1A]'"
                class="rounded-[16px] p-8 border-2 cursor-pointer transition-all hover:border-[#4D61FF]/50 flex items-start gap-6 group">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fas fa-university text-white text-xl"></i>
                </div>
                <div>
                    <span class="text-white text-lg font-medium group-hover:text-[#4D61FF] transition-colors">Start earning
                        right away</span>
                </div>
            </div>
        </div>

        <div class="pt-20 space-y-4">
            <button @click="if(selected === 'license') window.location.href='{{ route('consumer.forms.licensing-settings') }}';
                            if(selected === 'sale') window.location.href='{{ route('consumer.forms.set-for-sale') }}';"
                class="w-full py-6 bg-[#4D61FF] text-white font-bold text-xl rounded-2xl shadow-xl hover:bg-[#3D51EF] transition-all">
                Continue
            </button>
            <button onclick="window.location.href='{{ route('consumer.creator.dashboard') }}'"
                class="w-full py-6 bg-transparent border-2 border-white/5 text-white font-bold text-xl rounded-2xl hover:bg-white/5 transition-all">
                Save, Back to home
            </button>
        </div>

    </div>
@endsection