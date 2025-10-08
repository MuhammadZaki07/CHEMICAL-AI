<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 | Terjadi Kesalahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-slate-950  text-gray-100">
    <div class="text-center p-6">
        <h1
            class="text-8xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-500 animate-pulse">
            500</h1>
        <h2 class="text-2xl font-semibold mt-4">Terjadi Kesalahan</h2>
        <p class="text-gray-400 max-w-md mx-auto mt-3">
            Maaf, server mengalami masalah. Silakan coba lagi nanti.
        </p>

        <a href="{{ url('/') }}"
            class="inline-block mt-8 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition transform hover:scale-105">
            Kembali ke Beranda
        </a>
    </div>

</body>

</html>
