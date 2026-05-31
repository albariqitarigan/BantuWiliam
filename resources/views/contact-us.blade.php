<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <main class="flex min-h-screen items-center justify-center px-4 py-10">
        <div class="w-full max-w-xl rounded-lg bg-white p-8 shadow">
            <div class="mb-6">
                <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-700">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <h1 class="mt-4 text-2xl font-bold text-gray-900">Contact Us</h1>
                <p class="mt-2 text-sm text-gray-500">Kirim pertanyaan kamu melalui form di bawah ini.</p>
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

            <form action="{{ route('contact-us.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="mb-1 block font-semibold text-gray-700">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-blue-300" required autofocus>
                </div>
                <div>
                    <label for="email" class="mb-1 block font-semibold text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label for="question" class="mb-1 block font-semibold text-gray-700">Pertanyaan</label>
                    <textarea id="question" name="question" rows="5" class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-blue-300" required>{{ old('question') }}</textarea>
                </div>
                <button type="submit" class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white transition hover:bg-blue-700">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Pertanyaan
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
