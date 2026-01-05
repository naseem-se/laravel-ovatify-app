@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-accent text-2xl font-semibold">Explore</h2>
        <h1 class="text-3xl font-bold">Your Images</h1>
    </div>
</div>

{{-- Search --}}
<div class="mb-6" >
    <input
        type="text"
        placeholder="Search song"
        style="background: #252525"
        class="w-full bg-card  rounded-lg px-5 py-3 text-sm placeholder:text-textMuted focus:outline-none"
    >
</div>


<div class="grid grid-cols-2 mb-10 border-b border-gray-700">
    <!-- Tab 1 -->
    <button
        onclick="window.location='{{ route('consumer.marketplace.index') }}'"
        class="p-4 flex justify-center items-center gap-2 text-sm transition
        border-b-2 cursor-pointer
        {{ Request::routeIs('consumer.marketplace.index') ? 'border-purple-500 bg-purple-500/10' : 'border-transparent hover:text-gray-300' }}">
        Tracks / Audios
    </button>

    <!-- Tab 2 -->
    <button
        onclick="window.location='{{ route('consumer.marketplace.images') }}'"
        class="p-4 flex justify-center items-center gap-2 text-sm transition
        border-b-2 cursor-pointer
        {{ Request::routeIs('consumer.marketplace.images') ? 'border-purple-500 bg-purple-500/10 ' : 'border-transparent hover:text-gray-300' }}">
        Images / Illustrations
    </button>
</div>





@endsection
