<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(to bottom right, #0f172a, #0fd2c2);
        }

        .background-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 25s infinite alternate ease-in-out;
        }

        .particle:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
        .particle:nth-child(2) { top: 70%; left: 80%; animation-delay: 4s; }
        .particle:nth-child(3) { top: 40%; left: 30%; animation-delay: 2s; }

        @keyframes float {
            0% { transform: translateY(0) translateX(0) scale(1); }
            100% { transform: translateY(-50px) translateX(50px) scale(1.2); }
        }
    </style>
</head>
<body class="font-[Poppins] h-screen overflow-auto text-white flex flex-col items-center justify-center px-4 py-6 space-y-6">

    <!-- Background Particles -->
    <div class="background-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Icon -->
    <img src="{{ asset('image/WhatsApp_Image_2025-04-10_at_15.11.09-removebg-preview.png') }}" alt="Dosen Icon" class="h-24 object-contain drop-shadow-lg">

    <!-- Forgot Password Card -->
    <div class="w-full max-w-xs bg-white/10 backdrop-blur-md text-white p-6 rounded-2xl border border-white/20 shadow-lg space-y-4">
        <h2 class="text-xl font-semibold text-center">Lupa Password</h2>

        @if (session('status'))
            <div class="text-sm text-green-400 text-center">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M16 12H8m0 0l4-4m-4 4l4 4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="email" name="email" placeholder="Masukkan Email"
                    class="pl-10 w-full py-2 rounded-full bg-[#002366] text-white placeholder-white focus:outline-none"
                    required>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-white text-[#002366] font-bold py-2 rounded-full hover:bg-gray-200 transition">
                Kirim Link Reset
            </button>

            <div class="text-center text-sm">
                <!-- Tombol Kembali -->
<a href="{{ url()->previous() === url('/forgot-password') ? route('login.mahasiswa') : url()->previous() }}"
    class="text-blue-400 hover:underline">
     ← Kembali
 </a>
            </div>
        </form>
    </div>

</body>
</html>
