@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Create Session</h1>
    </div>

    {{-- Session Form --}}
    <div class="max-w-2xl mx-auto bg-[#252525] rounded-2xl p-8 shadow-2xl">
        <div class="space-y-6">
            {{-- Session Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Session Name</label>
                <input type="text" placeholder="e.g. Midnight Melodies"
                    class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
            </div>

            {{-- Collaborators invite --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Invite Collaborators (Optional)</label>
                <div class="flex gap-2">
                    <input type="email" placeholder="Enter email address"
                        class="flex-1 bg-[#1A1A1A] border border-gray-700 rounded-xl px-5 py-4 text-sm text-white focus:outline-none focus:border-accent transition">
                    <button class="px-6 rounded-xl bg-[#333] text-white text-sm font-medium hover:bg-[#444] transition">
                        Add
                    </button>
                </div>
            </div>

            {{-- Template Selection --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-4">Choose Template</label>
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['Empty Studio', 'Vocal Mastering', 'Melody Layout', 'Beat Production'] as $template)
                        <button
                            class="p-6 rounded-2xl bg-[#1A1A1A] border border-gray-700 text-left hover:border-accent/40 hover:bg-accent/5 transition group">
                            <div
                                class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center mb-4 group-hover:bg-accent/20 transition">
                                <i class="fas fa-layer-group text-gray-400 group-hover:text-accent"></i>
                            </div>
                            <h4 class="text-sm font-bold text-white mb-1">{{ $template }}</h4>
                            <p class="text-[10px] text-gray-500 leading-relaxed">Preset tracks and AI assistants optimized for
                                this workflow.</p>
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <button
                class="w-full py-5 rounded-xl bg-accent text-white font-bold text-md hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
                Start Session
            </button>
        </div>
    </div>

@endsection