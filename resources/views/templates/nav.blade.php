<!-- resources/views/templates/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Tautan Admin yang mengarah ke halaman Dashboard -->
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard</a>
        
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
                <!-- Dropdown untuk User Profile dan Logout -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                       
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
