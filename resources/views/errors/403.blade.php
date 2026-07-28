<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-forest">
    <div class="min-h-screen flex flex-col items-center justify-center text-center px-6">
        <p class="font-display text-7xl lg:text-9xl font-bold text-gold">403</p>
        <h1 class="mt-4 text-2xl lg:text-3xl font-display font-semibold text-forest">
            Akses Ditolak
        </h1>
        <p class="mt-3 text-stone-600 max-w-md">
            Kamu tidak memiliki izin untuk mengakses halaman ini.
        </p>
        <a href="{{ url('/') }}"
            class="mt-8 inline-flex items-center px-7 py-3 bg-gold text-forest rounded-lg text-sm tracking-wide hover:bg-gold-light transition-colors">
            Kembali ke Beranda
        </a>
    </div>
</body>

</html>
