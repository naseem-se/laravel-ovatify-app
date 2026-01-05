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

<body class="bg-[#0f0f0f] min-h-screen flex items-center justify-center text-white">

    <div class="w-full max-w-7xl grid grid-cols-1 md:grid-cols-2 gap-12 px-8 py-8 lg:py-12 lg:px-16">

        <!-- LEFT SIDE (FORM) -->
        <div class="flex flex-col justify-center max-w-md">

            <!-- Logo -->
            <h1 class="text-purple-500 text-xl font-semibold mb-2">
                Ovatify
            </h1>

            <h2 class="text-3xl text-purple-400 font-bold mb-8">
                Sign up to get started
            </h2>

            <!-- Form -->
            <form method="POST" action="" class="space-y-6">
                @csrf

                <!-- Phone no -->
                <div>
                    <label class="block text-sm mb-2 text-gray-300">Phone No</label>
                    <input type="phone" placeholder="Phone number"
                        class="w-full bg-[#1c1c1c] border border-[#2a2a2a] rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm mb-2 text-gray-300">Email</label>
                    <input type="email" placeholder="Email address"
                        class="w-full bg-[#1c1c1c] border border-[#2a2a2a] rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm mb-2 text-gray-300">Password</label>
                    <input type="password" placeholder="Password"
                        class="w-full bg-[#1c1c1c] border border-[#2a2a2a] rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Forgot -->
                <div class="text-right">
                    <a href="#" class="text-sm text-indigo-400 hover:underline">
                        Forgot password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-indigo-500 hover:bg-indigo-600 transition rounded-lg py-3 font-medium">
                    Sign up
                </button>
            </form>

            <!-- OR -->
            <div class="flex items-center my-6">
                <div class="flex-1 h-px bg-gray-700"></div>
                <span class="px-4 text-gray-400 text-sm font-bold">OR</span>
                <div class="flex-1 h-px bg-gray-700"></div>
            </div>

            <!-- Social Login -->
            <div class="space-y-3">

                <!-- Google -->
                <button
                    class="w-full flex items-center justify-center gap-3 bg-[#1c1c1c] border border-[#2a2a2a] rounded-full py-3 text-sm hover:bg-[#262626] transition">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5">
                    Sign up with Google
                </button>

                <!-- Facebook -->
                <button
                    class="w-full flex items-center justify-center gap-3 bg-[#1c1c1c] border border-[#2a2a2a] rounded-full py-3 text-sm hover:bg-[#262626] transition">
                    <img src="https://www.svgrepo.com/show/448224/facebook.svg" class="w-7 h-7">
                    Sign up with Facebook
                </button>

            </div>

            <!-- Signup -->
            <p class="mt-6 text-center text-sm text-gray-400">
                Already have an account?
                <a href="#" class="text-indigo-400 hover:underline">Login</a>
            </p>

        </div>

        <!-- RIGHT SIDE (ILLUSTRATION) -->
        <div class="hidden lg:flex items-center justify-center relative">

            <!-- Illustration -->
            <img src="{{ asset('images/login.PNG') }}" alt="Login Illustration"
                class="relative z-10 max-w-md" />

        </div>

    </div>

</body>

</html>
