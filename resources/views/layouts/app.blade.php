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

<body class="bg-bg text-white font-inter" style="background-color: #1A1A1A;">
    <div class="flex min-h-screen px-10">

        {{-- Sidebar --}}
        <aside class="w-80 bg-sidebar p-6" style="background-color: #252525">
            <h1 class="text-2xl font-semibold text-accent mb-10">Ovatify</h1>

            <nav class="space-y-5 text-sm w-full">
                <a href="{{ route('consumer.dashboard.index') }}"
                    class="flex items-center gap-3 pb-3 border-b border-gray-700 {{ Request::routeIs('consumer.dashboard.*') ? 'text-accent' : 'text-white' }} text-md">
                    <svg viewBox="0 0 24 24"
                        class="w-6 h-6 {{ Request::routeIs('consumer.dashboard.*') ? 'text-accent' : 'text-white' }}"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.4498 10.275L11.9998 3.1875L2.5498 10.275L2.9998 11.625H3.7498V20.25H20.2498V11.625H20.9998L21.4498 10.275ZM5.2498 18.75V10.125L11.9998 5.0625L18.7498 10.125V18.75H14.9999V14.3333L14.2499 13.5833H9.74988L8.99988 14.3333V18.75H5.2498ZM10.4999 18.75H13.4999V15.0833H10.4999V18.75Z" />
                    </svg>
                    Home
                </a>
                <a href="{{ route('consumer.my.tracks') }}"
                    class="flex items-center gap-3 pb-3 border-b border-gray-700 {{ Request::routeIs('consumer.my.*') ? 'text-accent' : 'text-white' }} hover:text-white text-md">
                    <svg class="w-6 h-6 {{ Request::routeIs('consumer.my.*') ? 'text-accent' : 'text-white' }}"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 19C9 20.1046 7.65685 21 6 21C4.34315 21 3 20.1046 3 19C3 17.8954 4.34315 17 6 17C7.65685 17 9 17.8954 9 19ZM9 19V5L21 3V17M21 17C21 18.1046 19.6569 19 18 19C16.3431 19 15 18.1046 15 17C15 15.8954 16.3431 15 18 15C19.6569 15 21 15.8954 21 17ZM9 9L21 7"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> My Tracks
                </a>
                <a href="{{ route('consumer.investments.index') }}"
                    class="flex items-center gap-3 pb-3 border-b border-gray-700 {{ Request::routeIs('consumer.investments.*') ? 'text-accent' : 'text-white' }} hover:text-white text-md ">
                    <svg class="w-6 h-6 {{ Request::routeIs('consumer.investments.*') ? 'text-accent' : 'text-white' }}"
                        viewBox="0 0 289.111 289.111" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <path d="M120.502,85.961c-10.341,0-18.75-8.409-18.75-18.75s8.409-18.75,18.75-18.75
             s18.75,8.409,18.75,18.75S130.842,85.961,120.502,85.961z" />

                        <path d="M172.064,67.211c-10.341,0-18.75-8.409-18.75-18.75s8.409-18.75,18.75-18.75
             s18.75,8.409,18.75,18.75S182.405,67.211,172.064,67.211z" />

                        <rect x="106.439" y="20.336" width="9.375" height="23.438" />
                        <rect x="125.189" y="15.648" width="9.375" height="28.125" />
                        <rect x="158.002" y="6.273" width="9.375" height="18.75" />
                        <rect x="176.752" y="1.586" width="9.375" height="23.438" />

                        <!-- Main icon body -->
                        <path d="M289.111,89.509l-5.573-22.298h-22.411v9.375h9.544l-29.198,40.148
             l-22.88-18.305l-23.269,23.269c-0.877-6.914-6.731-12.3-13.884-12.3h-1.298
             l18.75-32.813H93.413l17.686,29.077l-15.731,13.111H3.314v9.375h95.447
             l27.525-22.936l28.992,8.283l9.863,12.323c1.303,1.631,1.88,3.675,1.617,5.747
             c-0.267,2.072-1.331,3.905-3.005,5.161c-3.023,2.273-7.327,1.959-10.003-0.712
             l-9.459-9.459l-26.714,21.37l2.747,3.431c-0.886,11.864-6.244,23.405-15.408,32.827
             L0,270.148l6.628,6.628l62.311-62.311l19.172,19.172
             c3.487,29.03,28.359,52.641,57.998,53.836
             c15.82,0,30.717-5.977,42.178-16.988
             c12.08-11.597,18.731-27.206,18.731-43.95
             c0-15.155-5.559-29.409-15.609-40.598
             l25.195-25.195l23.995,19.195l34.481-47.414z" />
                    </svg>
                    Investments
                </a>
                <a href="{{ route('consumer.marketplace.index') }}"
                    class="flex items-center gap-3 pb-3 border-b border-gray-700 {{ Request::routeIs('consumer.marketplace.*') ? 'text-accent' : 'text-white' }} hover:text-white text-md ">
                    <svg class="w-6 h-6 {{ Request::routeIs('consumer.marketplace.*') ? 'text-accent' : 'text-white' }}"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 1C1.44772 1 1 1.44772 1 2C1 2.55228 1.44772 3 2 3H3.21922L6.78345 17.2569C5.73276 17.7236 5 18.7762 5 20C5 21.6569 6.34315 23 8 23C9.65685 23 11 21.6569 11 20C11 19.6494 10.9398 19.3128 10.8293 19H15.1707C15.0602 19.3128 15 19.6494 15 20C15 21.6569 16.3431 23 18 23C19.6569 23 21 21.6569 21 20C21 18.3431 19.6569 17 18 17H8.78078L8.28078 15H18C20.0642 15 21.3019 13.6959 21.9887 12.2559C22.6599 10.8487 22.8935 9.16692 22.975 7.94368C23.0884 6.24014 21.6803 5 20.1211 5H5.78078L5.15951 2.51493C4.93692 1.62459 4.13696 1 3.21922 1H2ZM18 13H7.78078L6.28078 7H20.1211C20.6742 7 21.0063 7.40675 20.9794 7.81078C20.9034 8.9522 20.6906 10.3318 20.1836 11.3949C19.6922 12.4251 19.0201 13 18 13ZM18 20.9938C17.4511 20.9938 17.0062 20.5489 17.0062 20C17.0062 19.4511 17.4511 19.0062 18 19.0062C18.5489 19.0062 18.9938 19.4511 18.9938 20C18.9938 20.5489 18.5489 20.9938 18 20.9938ZM7.00617 20C7.00617 20.5489 7.45112 20.9938 8 20.9938C8.54888 20.9938 8.99383 20.5489 8.99383 20C8.99383 19.4511 8.54888 19.0062 8 19.0062C7.45112 19.0062 7.00617 19.4511 7.00617 20Z" />
                    </svg>
                    Marketplace
                </a>
                <a href="{{ route('consumer.profile.index') }}"
                    class="flex items-center gap-3 pb-3 border-b border-gray-700 {{ Request::routeIs('consumer.profile.*') ? 'text-accent' : 'text-white' }} hover:text-white text-md ">
                    <svg class="w-6 h-6 {{ Request::routeIs('consumer.profile.*') ? 'text-accent' : 'text-white' }}"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="9" r="3" stroke="currentColor" stroke-width="1.5" />

                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />

                        <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    Me
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 ml-6 p-8 border border-gray-800" style="background-color: #1A1A1A;">
            @yield('content')
        </main>

    </div>

    @stack('scripts')
</body>

</html>
