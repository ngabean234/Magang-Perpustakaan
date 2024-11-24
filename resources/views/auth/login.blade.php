<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHAZANAH KOTA MAGELANG - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/1.png') }}" alt="Logo">
                KHAZANAH KOTA MAGELANG
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#buku">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fasilitas">Fasilitas</a></li>
                    <li class="nav-item"><a class="btn btn-primary" href="{{ route('login') }}">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="container">
            <h1 class="display-4 mb-4">Selamat Datang Di Perpustakaan</h1>
            <h2 class="mb-4">KHAZANAH KOTA MAGELANG</h2>
            <p class="lead mb-4">
                Jelajahi Dunia Dengan Membaca <br>
                <span>Buku Di Perpustakaan</span>
            </p>
            
            <a href="#buku" class="btn btn-primary btn-lg">Baca Buku</a>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="tentang" id="tentang">
        <div class="container">
            <h2 class="text-center mb-5">Tentang Perpustakaan</h2>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p>Perpustakaan sebagai wahana belajar sepanjang hayat dalam mengembangkan potensi masyarakat agar menjadi manusia yang beriman dan bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, sehat, berilmu, cakap, kreatif, mandiri dan menjadi warga negara yang demokratis serta bertanggung jawab dalam mendukung penyelenggaraan pendidikan nasional.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/3.png') }}" alt="Perpustakaan" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Buku Terpopuler -->
    <section class="buku-populer" id="buku">
        <div class="container">
            <h2 class="text-center mb-3">Buku Terpopuler</h2>
            <p class="text-center mb-5">Jelajahi Buku-buku Terpopuler Kami</p>
            <div class="row g-4">
                @for ($i = 1; $i <= 3; $i++)
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('images/perahu-kertas.jpg') }}" class="card-img-top" alt="Perahu Kertas">
                        <div class="card-body text-center">
                            <h5 class="card-title">Perahu Kertas</h5>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section class="fasilitas" id="fasilitas">
        <div class="container">
            <h2 class="text-center mb-5">Fasilitas</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="fasilitas-card">
                        <div class="fasilitas-icon">📶</div>
                        <h4>Akses Internet</h4>
                        <p>Diperpustakaan juga terdapat akses internet yang tersedia</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fasilitas-card">
                        <div class="fasilitas-icon">📚</div>
                        <h4>Membaca Tenang</h4>
                        <p>Disediakan ruangan khusus untuk membaca buku</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fasilitas-card">
                        <div class="fasilitas-icon">❄️</div>
                        <h4>Ruangan Ber-AC</h4>
                        <p>Perpustakaan dilengkapi dengan fasilitas AC</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fasilitas-card">
                        <div class="fasilitas-icon">📖</div>
                        <h4>Koleksi Buku Lengkap</h4>
                        <p>Memiliki banyak jenis koleksi buku untuk dibaca</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('assets/1.png') }}" alt="Logo" height="40">
                    <h4 class="mt-3">KHAZANAH KOTA MAGELANG</h4>
                    <p>Gedung Kyai Sepanjang, Jl. Kartini No.4, Magelang</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Kontak</h4>
                    <p>📞 (0293) 360188</p>
                    <p>✉️ perpuskotamagelang@gmail.com</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Layanan</h4>
                    <ul class="list-unstyled">
                        <li>Akses internet</li>
                        <li>Ruang ber-AC</li>
                        <li>Koleksi buku lengkap</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    :root {
        --primary-color: #0066cc;
        --secondary-color: #ffffff;
        --text-color: #333333;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }

    /* Header */
    .navbar {
        padding: 1rem 5%;
        background-color: var(--secondary-color);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }

    /* Hero Section */
    .hero {
    height: 80vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("images/library-bg.jpg") }}');
    background-size: cover;
    background-position: center;
    color: var(--secondary-color);
    text-align: center;
    display: flex;
    align-items: center; /* Vertikal tengah */
    justify-content: center; /* Horizontal tengah */
    flex-direction: column; /* Atur elemen dalam kolom */
    padding: 0 2rem;
}


    /* Tentang Section */
    .tentang {
        padding: 5rem 10%;
    }

    /* Buku Section */
    .buku-populer {
        padding: 5rem 10%;
        background-color: #f8f9fa;
    }

    .book-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    .book-card:hover {
        transform: translateY(-5px);
    }

    /* Fasilitas Section */
    .fasilitas {
        padding: 5rem 10%;
    }

    .fasilitas-card {
        text-align: center;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        height: 100%;
    }

    .fasilitas-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    /* Footer */
    footer {
        background-color: var(--primary-color);
        color: var(--secondary-color);
        padding: 3rem 0;
    }
</style>