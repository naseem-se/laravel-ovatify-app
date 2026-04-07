@extends('layouts.app')

@section('content')
    <div class="max-w-[1100px] mx-auto">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url()->previous() }}" class="text-magenta hover:text-magenta/80 transition-colors">
                <i class="fas fa-arrow-left text-2xl"></i>
            </a>
            <h1 class="text-3xl font-bold text-white">View <span class="text-magenta">Trending</span></h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 0; $i < 12; $i++)
                <div
                    class="bg-[#1A1A1A] p-4 rounded-2xl space-y-4 hover:bg-[#222] transition-colors group cursor-pointer border border-white/5">
                    <div class="relative aspect-square rounded-xl overflow-hidden">
                        <img src="https://picsum.photos/400/400?random={{ $i + 800 }}" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h4 class="text-white font-bold text-sm">Lorem Ipsum</h4>
                            <span class="text-white text-sm font-bold">$20</span>
                        </div>
                        <div class="text-[10px] text-gray-500 space-y-0.5">
                            <p>1600x1600</p>
                            <p>Standard License</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection