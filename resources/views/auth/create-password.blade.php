<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create New Password | Ovatify</title>
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 bg-[#0D0D0D]">

    <div class="w-full max-w-[1200px] grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">

        {{-- Left Section: Create Password --}}
        <div class="max-w-[420px] w-full mx-auto lg:ml-0" x-data="{ showPass: false }">
            <div class="mb-10 text-left">
                <h1 class="text-[18px] font-semibold text-purple mb-2 tracking-tight">Ovatify</h1>
                <h2 class="text-[32px] font-bold text-magenta leading-tight tracking-tight">Create new password</h2>
            </div>

            <div id="error-message" class="bg-red-500/10 border border-red-500/20 text-red-500 px-6 py-4 rounded-xl text-[12px] font-bold mb-6 hidden"></div>

            <form id="reset-form" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-[13px] font-semibold text-white/90">Create Your New Password</label>
                    <div class="relative">
                        <input :type="showPass ? 'text' : 'password'" id="password" name="password" placeholder="********"
                            class="w-full input-dark rounded-xl px-5 py-4 text-[13px] font-medium pr-12" required minlength="8">
                        <button type="button" @click="showPass = !showPass"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-white/20 hover:text-white transition-colors">
                            <i class="fas" :class="showPass ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" checked
                        class="w-4 h-4 rounded border-white/10 bg-[#1A1A1A] text-[#4D61FF] focus:ring-[#4D61FF] focus:ring-offset-0">
                    <label class="text-[12px] font-semibold text-white/40">Remember me</label>
                </div>

                <div class="pt-4 space-y-4">
                    <button type="submit" id="submit-btn"
                        class="w-full btn-blue py-4 rounded-xl font-bold text-[15px] text-white shadow-lg shadow-blue-500/10">
                        Create
                    </button>
                    <button type="button" onclick="window.location.href='{{ route('login') }}'"
                        class="w-full bg-transparent border border-white/5 py-4 rounded-xl font-bold text-[15px] text-white/40 hover:bg-white/5 transition-all">
                        Back
                    </button>
                </div>
            </form>
        </div>

        {{-- Right Section: Illustration --}}
        <div class="hidden lg:flex items-center justify-center relative">
            <img src="{{ asset('images/createpass.PNG') }}" alt="Illustration"
                class="w-full max-w-[550px] h-auto drop-shadow-[0_0_50px_rgba(255,0,255,0.1)]">
        </div>

    </div>

    {{-- SUCCESS MODAL (Figma Match) --}}
    <div id="successModal"
        class="fixed inset-0 bg-black/80 backdrop-blur-md hidden items-center justify-center z-50 p-6">
        <div
            class="bg-[#141414] rounded-[40px] p-12 text-center max-w-[480px] w-full border border-white/5 animate-fadeIn relative overflow-hidden">

            {{-- Magenta Background Glow/Circle --}}
            <div class="relative mx-auto mb-10 w-32 h-32 flex items-center justify-center">
                <div class="absolute inset-0 bg-magenta rounded-full shadow-[0_0_60px_rgba(255,0,255,0.4)]"></div>

                {{-- Floating Dots (Animated) --}}
                <div class="absolute inset-[-20px] animate-dot-spin pointer-events-none">
                    <div
                        class="absolute top-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-magenta rounded-full shadow-[0_0_10px_#FF00FF]">
                    </div>
                    <div class="absolute bottom-4 left-4 w-1.5 h-1.5 bg-magenta/60 rounded-full"></div>
                    <div
                        class="absolute top-1/4 right-0 w-2.5 h-2.5 bg-magenta/80 rounded-full shadow-[0_0_8px_#FF00FF]">
                    </div>
                    <div class="absolute bottom-0 right-1/4 w-1.5 h-1.5 bg-magenta/40 rounded-full"></div>
                </div>

                {{-- Shield Icon --}}
                <div class="relative z-10 text-white text-4xl">
                    <i class="fas fa-shield-halved"></i>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i class="fas fa-check text-[14px] mt-1 text-magenta"></i>
                    </div>
                </div>
            </div>

            <div class="space-y-4 mb-12">
                <h2 class="text-[32px] font-black tracking-tighter text-white">Congratulations!</h2>
                <p class="text-[14px] text-white/40 font-medium leading-relaxed px-6">
                    Your account is ready to use. You will be redirected to the Home page in a few seconds..
                </p>
            </div>

            {{-- Custom Magenta Spinner --}}
            <div class="flex justify-center">
                <div class="w-10 h-10 border-[3px] border-magenta/10 border-t-magenta rounded-full animate-spin"></div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('reset-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('submit-btn');
            const errorDiv = document.getElementById('error-message');
            const password = document.getElementById('password').value;
            const token = document.querySelector('input[name="_token"]').value;

            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating...';
            errorDiv.classList.add('hidden');

            try {
                const response = await fetch("{{ route('reset.password.post') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ password })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    showSuccessModal();
                } else {
                    btn.disabled = false;
                    btn.innerHTML = 'Create';
                    errorDiv.textContent = data.message || 'An error occurred. Please try again.';
                    errorDiv.classList.remove('hidden');
                }
            } catch (err) {
                btn.disabled = false;
                btn.innerHTML = 'Create';
                errorDiv.textContent = 'A network error occurred.';
                errorDiv.classList.remove('hidden');
            }
        });

        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                window.location.href = "{{ route('consumer.dashboard.index') }}";
            }, 3000);
        }
    </script>

</body>

</html>