<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <main class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-md rounded-lg bg-white p-8 shadow">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-900">Praktikum PWL</h1>
                <p class="mt-2 text-sm text-gray-500">Login sesuai role untuk masuk ke dashboard.</p>
            </div>

            @if (session('success'))
                <div class="success-alert mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700 transition-opacity duration-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="mb-1 block font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-blue-300" required autofocus>
                </div>
                <div class="mb-6">
                    <label class="mb-1 block font-semibold text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-blue-300" required>
                </div>
                <button type="submit" class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                    <i class="fas fa-right-to-bracket mr-2"></i> Login
                </button>
            </form>
        </div>
    </main>

    <script>
        setTimeout(() => {
            document.querySelectorAll('.success-alert').forEach((alert) => {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 700);
            });
        }, 5000);
    </script>
</body>
</html>
