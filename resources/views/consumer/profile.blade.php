@extends('layouts.app')


@section('content')
    {{-- Header --}}
    <div class="card rounded-lg p-6 h-full">
        <div class="card-header flex items-center mb-8 border-b border-gray-800 pb-4">
            <img src="https://i.pravatar.cc/100" alt="Consumer Avatar" class="w-16 h-16 rounded-full border border-white/10" />
            <div class="ml-4">
                <h4 class="text-lg font-semibold">John Doe</h4>
                <p class="text-gray-400">Consumer</p>
            </div>

        </div>

        <div class="card-body space-y-6">

            <div class="mb-12">
                <h1 class="text-xl font-bold mb-8 border-b border-gray-800 pb-4">Profile Details</h1>

                <div class="space-y-6">

                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Name</span>
                        <span class="text-gray-400 text-md">User 123</span>
                    </div>
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Email</span>
                        <span class="text-gray-400 text-md">user@example.com</span>
                    </div>
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Phone No</span>
                        <span class="text-gray-400 text-md">+92333331111</span>
                    </div>
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Status</span>
                        <span class="text-gray-400 text-md">Consumber</span>
                    </div>
                    <div class="flex justify-between items-center ">
                        <span class="text-gray-300 text-md">Total Amount Invested</span>
                        <span class="text-gray-400 text-md">$5000.00</span>
                    </div>

                   
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
@endpush
