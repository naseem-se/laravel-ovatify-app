<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verification | Ovatify</title>
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
            color: white;
            -webkit-font-smoothing: antialiased;
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

        .input-code {
            background-color: #1A1A1A;
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: #FFFFFF;
            transition: all 0.2s ease;
        }

        .input-code:focus {
            border-color: #4D61FF;
            outline: none;
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
            <h2 class="text-[32px] font-bold text-magenta leading-tight tracking-tight mb-4">Verification</h2>
            <p class="text-[14px] font-medium text-white/40">Code has been sent to your email.</p>
        </div>

        @if ($errors->any())
            <div
                class="bg-red-500/10 border border-red-500/20 text-red-500 px-6 py-4 rounded-xl text-[12px] font-bold mb-8">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('verification') }}" method="POST" id="verification-form">
            @csrf

            {{-- OTP Inputs (Figma Match) --}}
            <div class="flex justify-center gap-4 mb-16">
                @for ($i = 0; $i < 4; $i++)
                    <input type="text" name="code[]" maxlength="1" inputmode="numeric" required
                        class="w-14 h-14 text-center text-[20px] font-bold input-code rounded-xl code-input"
                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length === 1) { focusNext(this) }"
                        onkeydown="handleBackspace(event, this)" />
                @endfor
            </div>

            <div class="space-y-4">
                <button type="submit"
                    class="w-full btn-blue py-4 rounded-xl font-bold text-[15px] text-white shadow-lg shadow-blue-500/10">
                    Verify
                </button>
                <button type="button" onclick="window.location.href='{{ route('register') }}'"
                    class="w-full bg-transparent border border-white/5 py-4 rounded-xl font-bold text-[15px] text-white/40 hover:bg-white/5 transition-all">
                    Back
                </button>
            </div>
        </form>

    </div>

    <script>
        function focusNext(element) {
            const inputs = document.querySelectorAll('.code-input');
            const index = Array.from(inputs).indexOf(element);
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        }

        function handleBackspace(event, element) {
            if (event.key === 'Backspace' && element.value.length === 0) {
                const inputs = document.querySelectorAll('.code-input');
                const index = Array.from(inputs).indexOf(element);
                if (index > 0) {
                    inputs[index - 1].focus();
                }
            }
        }
    </script>

</body>

</html>