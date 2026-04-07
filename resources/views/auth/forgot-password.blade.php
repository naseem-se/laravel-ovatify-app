<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Ovatify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            background-color: #0D0D0D;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            color: white;
        }

        .text-magenta {
            color: #FF00FF !important;
        }

        .text-purple {
            color: #8A3FFC !important;
        }

        .btn-blue {
            background-color: #4D61FF;
            transition: all 0.2s ease;
        }

        .btn-blue:hover {
            background-color: #3D51EF;
            box-shadow: 0 10px 40px rgba(77, 97, 255, 0.2);
        }

        .option-card {
            background-color: #1A1A1A;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .option-input:checked+.option-card {
            border-color: #4D61FF;
            background-color: #222222;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 bg-[#0D0D0D]">

    <div class="w-full max-w-[420px] text-center">

        {{-- Logo --}}
        <div class="mb-4">
            <h1 class="text-[20px] font-bold text-purple tracking-tight">Ovatify</h1>
        </div>

        {{-- Content --}}
        <div class="mb-12">
            <h2 class="text-[32px] font-bold text-magenta leading-tight tracking-tight mb-4">Forgot Password</h2>
            <p class="text-[14px] font-medium text-white/40 px-6">Select which contact details should we use to reset
                your password</p>
        </div>

        <form action="{{ route('forgot.password.send') }}" method="POST">
            @csrf
            <div class="space-y-4 text-left">
                <!-- SMS Option -->
                <label class="cursor-pointer">
                    <input type="radio" name="method" value="sms" class="hidden option-input" checked>
                    <div class="option-card p-5 rounded-2xl flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-[#4D61FF]">
                            <i class="fas fa-comment-dots text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-[#4D61FF] uppercase tracking-widest mb-0.5">via SMS:</p>
                            <p class="text-[15px] font-bold text-white tracking-tight">{{ $maskedPhone }}</p>
                        </div>
                    </div>
                </label>

                <!-- Email Option -->
                <label class="cursor-pointer">
                    <input type="radio" name="method" value="email" class="hidden option-input">
                    <div class="option-card p-5 rounded-2xl flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-[#4D61FF]">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-[#4D61FF] uppercase tracking-widest mb-0.5">via Email:</p>
                            <p class="text-[15px] font-bold text-white tracking-tight">{{ $maskedEmail }}</p>
                        </div>
                    </div>
                </label>
            </div>

            <div class="mt-16 space-y-4">
                <button type="submit"
                    class="w-full btn-blue py-4 rounded-xl font-bold text-[15px] text-white shadow-lg shadow-blue-500/10">
                    Continue
                </button>
                <button type="button" onclick="window.location.href='{{ route('login') }}'"
                    class="w-full bg-transparent border border-white/5 py-4 rounded-xl font-bold text-[15px] text-white/40 hover:bg-white/5 transition-all">
                    Back
                </button>
            </div>
        </form>

    </div>

</body>

</html>