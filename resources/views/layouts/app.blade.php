<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ovatify</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#1A1A1A] text-white font-inter">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 h-screen p-6 sticky top-0 flex-shrink-0 z-40 border-r border-gray-800 bg-[#1A1A1A]" style="background-color: #1A1A1A !important;">
            <h1 class="text-4xl font-black text-magenta mb-10 tracking-tighter">Ovatify</h1>

            <nav class="space-y-1 w-full px-2">
                <div class="relative group border-b border-gray-800/50">
                    <a href="{{ route('consumer.dashboard.index') }}"
                        class="flex items-center gap-4 py-4 px-4 transition-all duration-200
                        {{ Request::routeIs('consumer.dashboard.index') ? 'text-magenta' : 'text-gray-400 hover:text-white' }}">
                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.4498 10.275L11.9998 3.1875L2.5498 10.275L2.9998 11.625H3.7498V20.25H20.2498V11.625H20.9998L21.4498 10.275ZM5.2498 18.75V10.125L11.9998 5.0625L18.7498 10.125V18.75H14.9999V14.3333L14.2499 13.5833H9.74988L8.99988 14.3333V18.75H5.2498ZM10.4999 18.75H13.4999V15.0833H10.4999V18.75Z" />
                        </svg>
                        <span class="font-black text-sm uppercase tracking-widest">Home</span>
                    </a>
                </div>

                <div class="relative group border-b border-gray-800/50">
                    <a href="{{ route('consumer.my.tracks') }}"
                        class="flex items-center gap-4 py-4 px-4 transition-all duration-200
                        {{ Request::routeIs('consumer.my.*') ? 'text-magenta' : 'text-gray-400 hover:text-white' }}">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M9 19C9 20.1046 7.65685 21 6 21C4.34315 21 3 20.1046 3 19C3 17.8954 4.34315 17 6 17C7.65685 17 9 17.8954 9 19V5L21 3V17M21 17C21 18.1046 19.6569 19 18 19C16.3431 19 15 18.1046 15 17C15 15.8954 16.3431 15 18 15C19.6569 15 21 15.8954 21 17ZM9 9L21 7" />
                        </svg>
                        <span class="font-black text-sm uppercase tracking-widest">My Tracks</span>
                    </a>
                </div>

                <div class="relative group border-b border-gray-800/50">
                    <a href="{{ route('consumer.investments.index') }}"
                        class="flex items-center gap-4 py-4 px-4 transition-all duration-200
                        {{ Request::routeIs('consumer.investments.*') ? 'text-magenta' : 'text-gray-400 hover:text-white' }}">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" />
                            <path d="M2 17L12 22L22 17" />
                            <path d="M2 12L12 17L22 12" />
                        </svg>
                        <span class="font-black text-sm uppercase tracking-widest">Investments</span>
                    </a>
                </div>

                {{-- Rights --}}
                <div class="relative group border-b border-gray-800/50">
                    <a href="{{ route('consumer.rights.index') }}"
                        class="flex items-center gap-4 py-4 px-4 transition-all duration-200
                        {{ Request::routeIs('consumer.rights.*') ? 'text-magenta' : 'text-gray-400 hover:text-white' }}">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" />
                        </svg>
                        <span class="font-black text-sm uppercase tracking-widest">Rights</span>
                    </a>
                </div>

                {{-- Marketplace --}}
                <div class="relative group border-b border-gray-800/50">
                    <a href="{{ route('consumer.marketplace.index') }}"
                        class="flex items-center gap-4 py-4 px-4 transition-all duration-200
                        {{ Request::routeIs('consumer.marketplace.*') ? 'text-magenta' : 'text-gray-400 hover:text-white' }}">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" />
                            <path d="M9 22V12H15V22" />
                        </svg>
                        <span class="font-black text-sm uppercase tracking-widest">Marketplace</span>
                    </a>
                </div>

                {{-- Me / Profile --}}
                <div class="relative group border-b border-gray-800/50">
                    <a href="{{ route('consumer.profile.index') }}"
                        class="flex items-center gap-4 py-4 px-4 transition-all duration-200
                        {{ Request::routeIs('consumer.profile.*') ? 'text-magenta' : 'text-gray-400 hover:text-white' }}">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        <span class="font-black text-sm uppercase tracking-widest">Me</span>
                    </a>
                </div>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-8 min-h-screen relative overflow-hidden" style="background-color: #1A1A1A;">
            @yield('content')
        </main>

    </div>

    {{-- Global Modals --}}
    @include('components.modals.wallet-modal')
    @include('components.modals.success-modal')

    @stack('scripts')
</body>


</html>