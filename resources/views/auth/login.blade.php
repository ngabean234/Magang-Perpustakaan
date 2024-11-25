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
                <img src="{{ asset('assets/1.png') }}" alt="Logo" class="logo">
                <div class="brand-text">
                    <span class="brand-title">KHAZANAH KOTA MAGELANG</span>
                    <span class="brand-subtitle">Perpustakaan</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#buku">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fasilitas">Fasilitas</a></li>
                    <li class="nav-item"><a class="btn btn-primary" href="{{ url('/login') }}">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="container">
            <h1>Selamat Datang Di Perpustakaan</h1>
            <h2>KHAZANAH KOTA MAGELANG</h2>
            <p>
                Jelajahi Dunia Dengan Membaca<br>
                Buku Di Perpustakaan
            </p>
            <a  class="btn btn-primary">Baca Buku</a>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="tentang" id="tentang">
        <div class="container">
            <h2>Tentang Perpustakaan</h2>
            <div class="tentang-content">
                <p>Perpustakaan sebagai wahana belajar sepanjang hayat dalam mengembangkan potensi masyarakat agar menjadi manusia yang beriman dan bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, sehat, berilmu,cakap, kreatif, mandiri dan menjadi warga negara yang demokratis serta bertanggung jawab dalam mendukung penyelenggaraan pendidikan nasional. Keberadaan perpustakaan untuk meningkatkan kecerdasan dan keberdayaan bangsa serta sebagai sarana pembelajaran masyarakat sepanjang hayat.</p>
                <div class="tentang-image">
                    <img src="{{ asset('assets/3.png') }}" alt="Perpustakaan" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Buku Section -->
    <section class="buku-populer" id="buku">
        <div class="container">
            <h2 class="text-center">Buku Terpopuler</h2>
            <p class="text-center mb-5">Jelajahi Buku-buku Terpopuler Kami</p>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                @for ($i = 1; $i <= 3; $i++)
                <div class="col">
                    <div class="book-card h-100">
                        <div class="book-image">
                            <img src="{{ asset('images/perahu-kertas.jpg') }}" alt="Perahu Kertas">
                        </div>
                        <div class="book-title">
                            <h5>Perahu Kertas</h5>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="fasilitas" id="fasilitas">
        <div class="container">
            <h2>Fasilitas</h2>
            <div class="row">
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
                        <p>Didalam Perpustakaan seseorong dapat membaca buku dengan tenang tanpa gangguan dari luar</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fasilitas-card">
                        <div class="fasilitas-icon">❄️</div>
                        <h4>Ruangan Ber-AC</h4>
                        <p>Diperpustakaan juga dilengkapi dengan fasilitas ac yang nyaman</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fasilitas-card">
                        <div class="fasilitas-icon">📖</div>
                        <h4>Koleksi Buku Lengkap</h4>
                        <p>Diperpustakaan Memiliki banyak jenis koleksi buku untuk siapa saja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <!-- Main Footer Content -->
            <div class="row g-4">
                <!-- Brand & Address -->
                <div class="col-md-4">
                    <div class="footer-brand">
                        <img src="{{ asset('assets/1.png') }}" alt="Logo" class="footer-logo">
                        <span class="brand-name">KHAZANAH KOTA MAGELANG</span>
                    </div>
                    <p class="address">
                        Gedung Kyai Sepanjang, Jl. Kartini No.4, Magelang,<br>
                        Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56121
                    </p>
                </div>

                <!-- Contact Info -->
                <div class="col-md-4 offset-md-1">
                    <h4>Kontak</h4>
                    <div class="contact-info">
                        <p>📞 (0293) 360188</p>
                        <p>✉️ kpadkotamagelang@gmail.com</p>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-md-3">
                    <h4>Layanan</h4>
                    <ul class="service-list">
                        <li>Akses internet</li>
                        <li>Membaca tenang</li>
                        <li>Ruang Ber-AC</li>
                        <li>Koleksi buku lengkap</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <p> &copy; 2024 Universitas Muhammadiyah Magelang<br>
                    All rights reserved</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ambil semua link navigasi
        const navLinks = document.querySelectorAll('.nav-link:not(.btn)'); // Exclude tombol Masuk
        
        // Tambahkan event listener untuk setiap link
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Hapus class active dari semua link
                navLinks.forEach(l => {
                    l.classList.remove('active');
                    l.style.color = '#333'; // Reset warna ke default
                });
                
                // Tambah class active ke link yang diklik
                this.classList.add('active');
                this.style.color = '#0066cc'; // Set warna biru untuk yang aktif
            });
        });

        // Set active berdasarkan section yang sedang dilihat
        window.addEventListener('scroll', function() {
            let current = '';
            
            document.querySelectorAll('section').forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (pageYOffset >= (sectionTop - 300)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                link.style.color = '#333'; // Reset warna ke default
                
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('active');
                    link.style.color = '#0066cc'; // Set warna biru untuk yang aktif
                }
            });
        });
    </script>
</body>
</html>

<style>
    /* Style halaman Login */

    :root {
        --primary-color: #0066cc;
        --secondary-color: #ffffff;
        --text-color: #333333;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }

    /* Navbar */
    .navbar {
        padding: 1rem 5%;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .navbar-brand img.logo {
        height: 40px;
    }

    .brand-text {
        display: flex;
        flex-direction: column;
    }

    .brand-title {
        color: #0066cc;
        font-weight: bold;
        font-size: 1.2rem;
        line-height: 1.2;
    }

    .brand-subtitle {
        color: #666;
        font-size: 0.9rem;
    }

    .navbar-nav .btn-primary {
        background-color: #0066cc;
        border-color: #0066cc;
        padding: 0.5rem 1.5rem;
    }

    .nav-link {
        color: #333 !important; /* Warna default */
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #0066cc !important;
    }

    .nav-link.active {
        color: #0066cc !important;
        font-weight: 600;
    }

    /* Hero Section */
    .hero {
        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset("assets/2.png") }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        text-align: center;
        color: white;
        position: relative;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .hero .container {
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .hero h2 {
        font-size: 2rem;
        margin-bottom: 2rem;
    }

    /* Tentang Section */
    .tentang {
        padding: 5rem 0;
        background-color: #fff;
    }

    .tentang h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 2rem;
    }

    .tentang-content {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .tentang p {
        color: #666;
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .tentang-image {
        width: 100%;
        height: 500px; /* Sesuaikan tinggi gambar */
        overflow: hidden;
        border-radius: 8px;
    }

    .tentang-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .tentang-image {
            height: 300px;
        }
        
        .tentang p {
            font-size: 1rem;
        }
    }

    /* Buku Section Styles */
    .buku-populer {
        padding: 5rem 0;
        background-color: #fff;
    }

    .buku-populer h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .buku-populer p {
        color: #666;
    }

    .book-card {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .book-image {
        width: 80%;
        margin-bottom: 15px;
        display: flex;
        justify-content: center;
    }

    .book-image img {
        width: 100%;
        height: auto;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .book-title {
        text-align: center;
        margin-top: auto;
    }

    .book-title h5 {
        font-size: 1.25rem;
        font-weight: bold;
        margin: 0;
        color: #333;
    }

    /* Row adjustments */
    .row {
        --bs-gutter-x: 2rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .book-image {
            width: 60%;
        }
    }

    /* Fasilitas Section */
    .fasilitas {
        padding: 5rem 0;
    }

    .fasilitas-card {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        height: 100%;
    }

    .fasilitas-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    /* Footer Styles */
    footer {
        padding: 60px 0 30px;
        background-color: #fff;
        border-top: 1px solid #eee;
    }

    /* Brand & Logo */
    .footer-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .footer-logo { height: 40px; }

    .brand-name {
        color: #0066cc;
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Common Text Styles */
    .address, 
    .contact-info p, 
    .service-list li,
    .copyright p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .address { line-height: 1.6; }

    /* Section Headers */
    footer h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }

    /* Lists */
    .service-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* Copyright */
    .copyright {
        margin-top: 60px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .copyright p {
        text-align: center;
        margin: 0;
    }

    /* Column Layout */
    .col-md-4:first-child { width: 35%; }
    .col-md-4.offset-md-1 { width: 30%; }
    .col-md-3 { width: 25%; }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-brand { flex-direction: column; }
        
        .col-md-4:first-child,
        .col-md-4.offset-md-1,
        .col-md-3 {
            width: 100%;
            margin-left: 0;
            margin-bottom: 30px;
        }

        .copyright { margin-top: 40px; }
    }
</style>