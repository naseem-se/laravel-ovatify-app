@extends('layouts.app')

@section('content')
    <div class="max-w-[1000px] mx-auto space-y-16 pb-20 pt-10">

        {{-- Profile Header (Figma Match) --}}
        <div class="flex items-center gap-10">
            <div class="relative group">
                <div
                    class="w-32 h-32 rounded-full overflow-hidden border-4 border-white/5 ring-4 ring-magenta/20 shadow-2xl transition-transform group-hover:scale-105">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username ?? 'User') }}&background=FF00FF&color=fff&size=200"
                        class="w-full h-full object-cover">
                </div>
                <button
                    class="absolute bottom-0 right-0 w-10 h-10 bg-magenta rounded-full flex items-center justify-center border-4 border-[#0F0F0F] text-white shadow-lg hover:scale-110 transition-transform">
                    <i class="fas fa-camera text-[14px]"></i>
                </button>
            </div>

            <div class="space-y-2">
                <h2 class="text-white text-[42px] font-black tracking-tighter leading-tight">
                    {{ Auth::user()->username ?? 'User' }}</h2>
                <div class="flex items-center gap-3">
                    <span
                        class="px-4 py-1.5 bg-[#4D61FF]/10 text-[#4D61FF] border border-[#4D61FF]/20 rounded-full text-[12px] font-black uppercase tracking-widest">
                        {{ Auth::user() ? ucfirst(Auth::user()->role) : 'Member' }}
                    </span>
                    <span class="text-white/20 text-[14px] font-bold">Joined Nov 2025</span>
                </div>
            </div>
        </div>

        {{-- Profile Details Section (Figma Match) --}}
        <div class="space-y-10 pt-4">
            <div class="flex items-center justify-between border-b border-white/5 pb-6">
                <h3 class="text-white text-[28px] font-black tracking-tighter">Profile Details</h3>
                <button
                    class="text-magenta font-black text-[14px] uppercase tracking-widest hover:brightness-110 transition-all">
                    Edit Profile
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-[900px]">
                <div class="space-y-2">
                    <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Username</p>
                    <p class="text-white text-[18px] font-bold">{{ Auth::user()->username ?? 'User' }}</p>
                </div>

                <div class="space-y-2">
                    <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Email Address</p>
                    <p class="text-white text-[18px] font-bold">{{ Auth::user()->email }}</p>
                </div>

                <div class="space-y-2">
                    <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Phone Number</p>
                    <p class="text-white text-[18px] font-bold">{{ Auth::user()->phone ?? 'Not provided' }}</p>
                </div>

                <div class="space-y-2">
                    <p class="text-white/20 text-[12px] font-black uppercase tracking-widest">Account Type</p>
                    <p class="text-white text-[18px] font-bold">{{ ucfirst(Auth::user()->role) }}</p>
                </div>
            </div>

            {{-- Stats Card --}}
            <div class="pt-8">
                <div class="bg-[#141414] rounded-[32px] p-10 border border-white/5 shadow-2xl inline-block min-w-[320px]">
                    <p class="text-white/40 text-[14px] font-bold uppercase tracking-widest mb-2">Total Amount Invested</p>
                    <p class="text-white text-[48px] font-black tracking-tighter leading-none">$500.00</p>
                    <div class="mt-8">
                        <button
                            class="w-full py-4 bg-[#4D61FF] text-white font-black text-[16px] uppercase tracking-widest rounded-2xl hover:bg-[#3D51EF] transition-all active:scale-[0.98]">
                            View Portfolio
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection