<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Started | Ovatify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #0F0F0F;
            /* Updated to match app theme */
            font-family: 'Inter', sans-serif;
            color: white;
            -webkit-font-smoothing: antialiased;
        }

        .text-magenta {
            color: #FF00FF;
        }

        .bg-magenta {
            background-color: #FF00FF;
        }

        .border-magenta {
            border-color: #FF00FF !important;
        }

        .btn-blue {
            background-color: #4D61FF;
            transition: all 0.2s ease;
        }

        .btn-blue:hover {
            background-color: #3D51EF;
            box-shadow: 0 10px 40px rgba(77, 97, 255, 0.2);
        }

        .card-dark {
            background-color: #1A1A1A;
            /* Slightly lighter than bg */
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .card-dark:hover {
            border-color: rgba(77, 97, 255, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .icon-box {
            background-color: rgba(77, 97, 255, 0.05);
            border: 1px solid rgba(77, 97, 255, 0.1);
            color: #4D61FF;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center p-6 bg-[#0F0F0F] text-white font-sans">

    <div class="flex flex-col items-center gap-6 text-[18px] font-medium">

        <a href="{{ route('login') }}" class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to Login Page <i class="fas fa-arrow-right"></i>
        </a>

        <a href="{{ route('register') }}" class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to register Page <i class="fas fa-arrow-right"></i>
        </a>

        <a href="{{ route('verification') }}" class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to verification Page <i class="fas fa-arrow-right"></i>
        </a>

        <a href="{{ route('forgot.password') }}" class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to forgot password Page <i class="fas fa-arrow-right"></i>
        </a>

        <a href="{{ route('forgot.verification') }}"
            class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to forgot verification Page <i class="fas fa-arrow-right"></i>
        </a>

        <a href="{{ route('reset.password') }}" class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to reset password Page <i class="fas fa-arrow-right"></i>
        </a>

        <a href="{{ route('consumer.dashboard.index') }}"
            class="hover:text-blue-500 transition-colors flex items-center gap-2">
            Go to Consumer dashboard <i class="fas fa-arrow-right"></i>
        </a>

    </div>

</body>

</html>