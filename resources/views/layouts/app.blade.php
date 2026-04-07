<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ovatify</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            background-color: #0D0D0D;
            font-family: 'Inter', sans-serif;
            color: white;
            -webkit-font-smoothing: antialiased;
        }

        .text-magenta {
            color: #FF00FF;
            /* Reverted to Magenta for Consumer */
        }

        ::-webkit-scrollbar {
            display: none;
        }

        * {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 0;
            color: #888888;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }

        .sidebar-link:hover {
            color: white;
            transform: translateX(4px);
        }

        /* Default (Consumer) Active State - Magenta */
        .sidebar-link.active {
            color: #FF00FF;
        }

        .sidebar-link.active i {
            color: #FF00FF;
        }

        /* Creator Mode Active State - Blue */
        body.creator-mode .sidebar-link.active {
            color: #4D61FF;
        }

        body.creator-mode .sidebar-link.active i {
            color: #4D61FF;
        }

        .sidebar-link i {
            width: 24px;
            text-align: center;
            font-size: 19px;
            opacity: 0.8;
        }

        .sidebar-link.active i {
            opacity: 1;
        }
    </style>
</head>

@php
    $isCreatorMode = Request::is('consumer/creator*') ||
        Request::is('consumer/studio*') ||
        Request::is('consumer/rights*') ||
        Request::is('consumer/ai-tools*');
@endphp

<body class="bg-[#0F0F0F] text-white {{ $isCreatorMode ? 'creator-mode' : '' }}">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 h-screen p-8 sticky top-0 flex-shrink-0 z-40 bg-[#0F0F0F]">
            {{-- Logo --}}
            <h1
                class="text-3xl font-bold {{ $isCreatorMode ? 'text-[#4D61FF]' : 'text-magenta' }} mb-12 tracking-tight">
                Ovatify</h1>

            <nav class="space-y-6">

                @if($isCreatorMode)
                    {{-- CREATOR SIDEBAR --}}
                    <a href="{{ route('consumer.creator.dashboard') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.creator.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>

                    <a href="{{ route('consumer.my.tracks') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.my.*') ? 'active' : '' }}">
                        <i class="fas fa-music"></i>
                        <span>My Tracks</span>
                    </a>

                    <a href="{{ route('consumer.rights.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.rights.*') ? 'active' : '' }}">
                        <i class="fas fa-gavel"></i>
                        <span>Rights</span>
                    </a>

                    <a href="{{ route('consumer.marketplace.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.marketplace.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Marketplace</span>
                    </a>

                    <a href="{{ route('consumer.profile.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.profile.index') ? 'active' : '' }}">
                        <i class="fas fa-user-circle"></i>
                        <span>Me</span>
                    </a>
                @else
                    {{-- CONSUMER SIDEBAR --}}
                    <a href="{{ route('consumer.dashboard.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.dashboard.index') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>

                    <a href="{{ route('consumer.my.tracks') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.my.*') ? 'active' : '' }}">
                        <i class="fas fa-music"></i>
                        <span>My Tracks</span>
                    </a>

                    <a href="{{ route('consumer.investments.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.investments.*') ? 'active' : '' }}">
                        <i class="fas fa-layer-group"></i>
                        <span>Investments</span>
                    </a>

                    <a href="{{ route('consumer.marketplace.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.marketplace.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Marketplace</span>
                    </a>

                    <a href="{{ route('consumer.profile.index') }}"
                        class="sidebar-link {{ Request::routeIs('consumer.profile.index') ? 'active' : '' }}">
                        <i class="fas fa-user-circle"></i>
                        <span>Me</span>
                    </a>
                @endif

                {{-- Shared Actions --}}
                <div class="pt-10 border-t border-white/5 space-y-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="sidebar-link w-full text-left hover:text-red-500 transition-colors">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        {{-- Main Page Logic --}}
        <main class="flex-1 p-6 lg:p-10 min-h-screen relative overflow-y-auto bg-[#0F0F0F]">
            @if($isCreatorMode)
                <div
                    class="h-full border border-white/[0.04] rounded-[28px] bg-[#141414]/10 p-6 lg:p-10 min-h-[calc(100vh-80px)] shadow-2xl">
                    @yield('content')
                </div>
            @else
                @yield('content')
            @endif
        </main>

    </div>

    {{-- Global Modals --}}
    @include('components.modals.wallet-modal')
    @include('components.modals.success-modal')

    @stack('scripts')
</body>

</html>