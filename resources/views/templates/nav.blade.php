<!-- resources/views/templates/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Tautan Admin yang mengarah ke halaman Dashboard -->
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a> <!-- Perhatikan penggunaan route() -->
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/setting') }}">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/kandidat') }}">Kandidat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/token') }}">Token</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pemilihan') }}">Pemilihan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/hasil') }}">Hasil Pemilihan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
