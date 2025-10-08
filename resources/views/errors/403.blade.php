<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 | Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body
    class="min-h-screen flex items-center justify-center bg-gradient-to-b from-black via-slate-900 to-blue-900 text-gray-100">
    <div class="text-center px-6">
        <h1 class="text-8xl font-extrabold text-white mb-6">403</h1>
        <h2 class="text-3xl font-bold mb-2">Akses Dilarang</h2>
        <p class="text-gray-400 mb-8">Kamu tidak memiliki izin untuk mengakses halaman ini.</p>
        <a href="{{ url('/') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
