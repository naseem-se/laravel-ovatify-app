<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Ovatify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#0f0f0f] min-h-screen flex flex-col gap-4 items-center justify-center text-white">
    <h1>Testing auto deployment</h1>

    <button onclick="window.location.href='{{ route('login') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to Login Page
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>
    <button onclick="window.location.href='{{ route('register') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to register Page
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>
    <button onclick="window.location.href='{{ route('verification') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to verification Page
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>
    <button onclick="window.location.href='{{ route('forgot.password') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to forgot password Page
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>
    <button onclick="window.location.href='{{ route('forgot.verification') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to forgot verification Page
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>
    <button onclick="window.location.href='{{ route('reset.password') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to reset password Page
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>

    <button onclick="window.location.href='{{ route('consumer.dashboard.index') }}'" class=" rounded-lg cursor-pointer hover:text-white">
        Go to Consumer dashboard
        <i class="fas fa-arrow-right fa-lg"></i>
    </button>
</body>

</html>
