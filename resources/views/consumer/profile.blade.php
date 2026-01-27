@extends('layouts.app')

@section('content')

    {{-- Profile Card --}}
    <div class="bg-[#252525] rounded-xl p-6 max-w-2xl">
        {{-- Profile Header --}}
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-gray-700">
            <img src="https://i.pravatar.cc/100" alt="Profile Avatar"
                class="w-16 h-16 rounded-full border-2 border-gray-600">
            <div>
                <h2 class="text-lg font-semibold">John Smith</h2>
                <p class="text-sm text-accent">Consumer</p>
            </div>
        </div>

        {{-- Profile Details Section --}}
        <div>
            <h3 class="text-lg font-bold mb-6">Profile Details</h3>

            <div class="space-y-5">
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Name</span>
                    <span class="text-gray-300 text-sm">User 1234</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Email</span>
                    <span class="text-gray-300 text-sm">abc123@gmail.com</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Phone No</span>
                    <span class="text-gray-300 text-sm">+01 000 0000 00</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Status</span>
                    <span class="text-gray-300 text-sm">Consumer</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Total Amount Invested</span>
                    <span class="text-gray-300 text-sm">$500.00</span>
                </div>
            </div>
        </div>
    </div>

@endsection