<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css') }}">
</head>

<body>
    @if(Request::segment(1) == 'login' || Request::segment(1) == 'logout')
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SPP-Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}" aria-current="page" href="{{ url('/dashboard') }}">Dashboard</a>
                    <a class="nav-link {{ Request::segment(1) == 'user' ? 'active' : '' }}" href="{{ url('user/tampil') }}">User</a>
                    <a class="nav-link {{ Request::segment(1) == 'spp' ? 'active' : '' }}" href="{{ url('spp/tampil') }}">SPP</a>
                    <a class="nav-link {{ Request::segment(1) == 'kelas' ? 'active' : '' }}" href="{{ url('kelas/tampil') }}">Kelas</a>
                    <a class="nav-link {{ Request::segment(1) == 'siswa' ? 'active' : '' }}" href="{{ url('siswa/tampil') }}">Siswa</a>
                    <a class="nav-link {{ Request::segment(1) == 'pembayaran' ? 'active' : '' }}" href="{{ url('pembayaran/tampil') }}">Pembayaran</a>
                    
                </div>
            </div>
        </div>
    </nav>
    @endif
    @yield('content')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
