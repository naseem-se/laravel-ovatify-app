@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-accent text-2xl font-semibold">Hey!</h2>
        <h1 class="text-3xl font-bold">Your Tracks</h1>
    </div>
</div>


{{-- Filters --}}
<div class="flex gap-3 mb-8">
    @foreach(['Beats','Vocals','Loops','Bundles','Bundles','Bundles','Bundles'] as $item)
        <button class="px-4 py-1 rounded-full border border-accent text-accent text-xs hover:bg-accent hover:text-white transition">
            {{ $item }}
        </button>
    @endforeach
</div>

<div class="grid grid-cols-3 gap-6 mb-10">
    @for($i=0;$i<4;$i++)
        <div class="bg-card rounded-xl p-4">
            <div class="h-36 rounded-lg bg-gradient-to-br from-purple-500 to-pink-500 mb-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex">
                    <img src="https://i.pravatar.cc/300" alt="Creator Avatar" class="w-6 h-6 rounded-full mr-2">
                    <span class="text-xs text-gray-400 self-center">Casendra Cobrera</span>
                </div>
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7L12 14M12 14L15 11M12 14L9 11" stroke="#FF00FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 17H12H8" stroke="#FF00FF" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#FF00FF" stroke-width="1.5"></path> </g></svg>
            </div>
            <h4 class="font-medium mt-2">Family memeries</h4>
            <p class="text-xs text-gray-400 mt-2">Expires on Dec 15 26026</p>
            <p class="text-xs text-gray-400 mb-2">invested: $5000</p>
            <badge class=" bg-green-700 text-white text-xs font-semibold py-1.5 px-2.5 rounded-full">Licensed</badge>
        </div>
    @endfor
</div>


@endsection
