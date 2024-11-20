<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pemilihan')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Pastikan body dan html memiliki tinggi 100% */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Layout utama menggunakan flexbox */
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Membuat area konten utama mengisi ruang tersisa */
        main {
            flex-grow: 1;
        }

        /* Mengatur footer agar tetap di bawah dan lebih kecil */
        footer {
            padding: 5px; /* Menurunkan ukuran padding footer */
            background-color: #f8f9fa;
            font-size: 0.9rem; /* Mengurangi ukuran font jika diperlukan */
        }
    </style>
</head>
<body>

    <!-- Include Navbar -->
    @include('templates.header')

    <!-- Main Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
