@extends('layouts.app')

@section('content')

    {{-- Header with Back Button --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ url()->previous() }}" class="text-accent hover:text-accent/80">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-accent">Upload Content</h1>
    </div>

    {{-- Upload Dropzone --}}
    <div class="max-w-3xl mx-auto">
        <div
            class="p-12 border-2 border-dashed border-gray-700 rounded-2xl bg-[#252525] flex flex-col items-center justify-center text-center mb-8 hover:border-accent transition group">
            <div
                class="w-20 h-20 rounded-full bg-accent/10 flex items-center justify-center mb-6 group-hover:bg-accent/20 transition">
                <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
            </div>
            <h2 class="text-xl font-bold mb-2">Select your file to upload</h2>
            <p class="text-sm text-gray-500 mb-8 max-w-sm">Support for WAV, MP3, and AIFF. Maximum file size is 50MB.</p>

            <button
                class="px-8 py-3 rounded-lg bg-accent text-white text-sm font-medium hover:bg-accent/90 transition shadow-lg">
                Choose File
            </button>
        </div>

        {{-- Uploading State (List) --}}
        <div class="space-y-4">
            <h3 class="text-sm font-medium text-gray-400">Recently uploaded</h3>

            <div class="p-4 rounded-xl bg-[#252525] flex items-center justify-between border border-gray-700">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-lg bg-[#1A1A1A] flex items-center justify-center text-accent">
                        <i class="fas fa-file-audio"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium">Summer_Mix_V1.wav</h4>
                        <p class="text-[10px] text-gray-500">12.4 MB · Just now</p>
                    </div>
                </div>
                <div class="flex items-center gap-10">
                    <div class="w-48 h-1.5 bg-gray-700 rounded-full overflow-hidden">
                        <div class="h-full bg-accent w-3/4 rounded-full animate-pulse"></div>
                    </div>
                    <button class="text-gray-500 hover:text-white transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection