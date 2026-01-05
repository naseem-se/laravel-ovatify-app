@extends('layouts.app')


@section('content')
    {{-- Header --}}
    <div class="card border border-gray-700 rounded-lg p-6">
        <div class="card-header flex justify-between items-center mb-8">
            <p class="text-accent text-xl font-medium">
                <a href="{{ route('consumer.my.tracks') }}"><i class="fa-solid fa-arrow-left"></i></a>
                Standard Artist Agreements
            </p>
        </div>

        <div class="card-body space-y-6">

            {{-- Artist Agreements --}}
            <div class="space-y-4">
                <h2 class="text-xl font-semibold border-t border-gray-700 pt-4">Standard Artist Agreements</h2>
                <p class="text-gray-300 text-md">Category: Artist - Type: Legal Agreement</p>

                <div class="space-y-6">
                    {{-- Agreement 1 --}}
                    <div class="border-t border-gray-700 p-4">
                        <h3 class="text-xl font-semibold mb-2">Agreement 1: Music Licensing Terms</h3>
                        <p class="text-gray-300 mb-4 text-md">
                            By accepting this agreement, you acknowledge that you have the rights to distribute the music
                            and agree to our licensing terms.
                        </p>
                       
                    </div>

                   
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    
@endpush