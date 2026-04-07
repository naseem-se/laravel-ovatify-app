@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('consumer.profile.index') }}" class="text-accent hover:text-accent/80">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-white">Customization & Settings</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Navigation --}}
            <div class="space-y-2">
                <button class="w-full text-left p-4 rounded-xl bg-accent/10 border border-accent text-accent font-bold">
                    Profile Information
                </button>
                <button
                    class="w-full text-left p-4 rounded-xl bg-[#252525] hover:bg-[#333] text-gray-400 font-medium transition">
                    Notifications
                </button>
                <button
                    class="w-full text-left p-4 rounded-xl bg-[#252525] hover:bg-[#333] text-gray-400 font-medium transition">
                    Security
                </button>
                <button
                    class="w-full text-left p-4 rounded-xl bg-[#252525] hover:bg-[#333] text-gray-400 font-medium transition">
                    Billing
                </button>
            </div>

            {{-- Form Area --}}
            <div class="md:col-span-2 bg-[#252525] rounded-3xl p-8 shadow-2xl space-y-6">
                <div class="flex items-center gap-6 mb-6">
                    <div class="relative">
                        <img src="https://i.pravatar.cc/150" class="w-24 h-24 rounded-full border-2 border-gray-600">
                        <button
                            class="absolute bottom-0 right-0 w-8 h-8 bg-accent rounded-full flex items-center justify-center text-white border-2 border-[#252525]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Profile Photo</h3>
                        <p class="text-xs text-gray-500">Min 400x400px, PNG or JPG</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">First Name</label>
                        <input type="text" value="John"
                            class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-accent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Last Name</label>
                        <input type="text" value="Smith"
                            class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-accent">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Display Name</label>
                    <input type="text" value="User 1234"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-accent">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Email Address</label>
                    <input type="email" value="abc123@gmail.com"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-accent">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Bio</label>
                    <textarea rows="4"
                        class="w-full bg-[#1A1A1A] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-accent">Music producer and sound designer based in NY.</textarea>
                </div>

                <div class="pt-4 border-t border-gray-700 flex justify-end gap-3">
                    <button class="px-6 py-3 rounded-xl border border-gray-600 hover:bg-gray-700 transition">Cancel</button>
                    <button
                        class="px-6 py-3 rounded-xl bg-accent text-white font-bold hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection