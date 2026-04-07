<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Ovatify</title>
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

        .input-dark {
            background-color: #1A1A1A;
            border: 1px solid transparent;
            color: #FFFFFF;
            transition: all 0.2s ease;
        }

        .input-dark:focus {
            border-color: rgba(255, 0, 255, 0.4);
            outline: none;
            background-color: #222222;
        }

        .input-dark::placeholder {
            color: #444444;
            font-weight: 500;
        }

        .btn-blue {
            background-color: #4D61FF;
            transition: all 0.2s ease;
        }

        .btn-blue:hover {
            background-color: #3D51EF;
            box-shadow: 0 10px 40px rgba(77, 97, 255, 0.2);
        }

        .social-btn {
            background-color: #1A1A1A;
            color: #FFFFFF;
            transition: all 0.2s ease;
            border: 1px solid rgba(255, 255, 255, 0.03);
        }

        .social-btn:hover {
            background-color: #222222;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .or-line {
            display: flex;
            align-items: center;
            text-align: center;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 700;
        }

        .or-line::before,
        .or-line::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .or-line:not(:empty)::before {
            margin-right: 1.5rem;
        }

        .or-line:not(:empty)::after {
            margin-left: 1.5rem;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 bg-[#0D0D0D]">

    <div class="w-full max-w-[1200px] grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">

        {{-- Left Section: Login Form --}}
        <div class="max-w-[420px] w-full mx-auto lg:ml-0">
            <div class="mb-10 text-left">
                <h1 class="text-[18px] font-semibold text-purple mb-2 tracking-tight">Ovatify</h1>
                <h2 class="text-[32px] font-bold text-magenta leading-tight tracking-tight">Login to get started</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                @if($errors->any())
                    <div
                        class="bg-red-500/10 border border-red-500/20 text-red-500 px-6 py-4 rounded-xl text-xs font-bold mb-6">
                        <ul class="space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-2">
                    <label class="text-[13px] font-semibold text-white/90">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Lorem Ipsum"
                        class="w-full input-dark rounded-xl px-5 py-4 text-[13px] font-medium" required />
                </div>

                <div class="space-y-2">
                    <label class="text-[13px] font-semibold text-white/90">Password</label>
                    <input type="password" name="password" placeholder="Lorem Ipsum"
                        class="w-full input-dark rounded-xl px-5 py-4 text-[13px] font-medium" required />
                    <div class="text-right pt-2">
                        <button type="submit" formaction="{{ route('forgot.password.init') }}" formnovalidate
                            class="text-[13px] font-bold text-[#4D61FF] hover:text-white transition-colors bg-transparent border-0 cursor-pointer p-0">Forgot
                            password?</button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full btn-blue py-4 rounded-xl font-bold text-[15px] text-white shadow-lg shadow-blue-500/10 mt-4">
                    Login
                </button>

                <div class="py-6">
                    <div class="or-line uppercase">OR</div>
                </div>

                <div class="space-y-3">
                    <button type="button"
                        class="w-full social-btn py-4 rounded-full flex items-center justify-center gap-3 text-[12px] font-bold">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-4 h-4">
                        Sign up with Google
                    </button>
                    <button type="button"
                        class="w-full social-btn py-4 rounded-full flex items-center justify-center gap-3 text-[12px] font-bold">
                        <div class="w-5 h-5 bg-[#4D61FF] rounded-full flex items-center justify-center">
                            <i class="fab fa-facebook-f text-[10px] text-white"></i>
                        </div>
                        Sign up with Facebook
                    </button>
                </div>

                <p class="text-center text-[12px] font-medium text-white/50 pt-10">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                        class="text-[#4D61FF] font-extrabold hover:text-white transition-colors ml-1">Sign up</a>
                </p>
            </form>
        </div>

        {{-- Right Section: Actual Illustration --}}
        <div class="hidden lg:flex items-center justify-center relative">
            <img src="{{ asset('images/login.png') }}" alt="Login Illustration"
                class="w-full max-w-[550px] h-auto drop-shadow-[0_0_50px_rgba(255,0,255,0.1)]">
        </div>

    </div>

</body>

</html>