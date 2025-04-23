<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TiketKereta | Pesan Tiket Kereta Api Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .hero-section {
            background: url('https://via.placeholder.com/1500x900') center center/cover no-repeat;
            height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .hero-content {
            position: relative;
            z-index: 10;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 15px 30px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .feature-card {
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .testimonial {
            background-color: #ffffff;
            padding: 40px 0;
        }

        .testimonial h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
        }

        .testimonial-card {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card p {
            font-size: 1.1rem;
            color: #555;
        }

        .testimonial-card .quote {
            font-size: 2rem;
            color: #ff9800;
        }

        .footer {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .navbar {
            z-index: 999;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">TiketKereta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonials">Testimoni</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>TICKETING KERETA API</h1>
        <p>Nikmati perjalanan nyaman, aman, dan cepat ke berbagai destinasi di Indonesia</p>
        <a href="login.php" class="btn btn-primary">Mulai</a>
    </div>
</section>

<!-- Fitur Utama -->
<section id="features" class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Kenapa Pilih Tiket Kereta?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card p-4">
                    <i class="fas fa-train feature-icon text-primary"></i>
                    <h5>Banyak Rute</h5>
                    <p>Menjangkau berbagai kota besar dan kecil di Indonesia.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4">
                    <i class="fas fa-mobile-alt feature-icon text-success"></i>
                    <h5>Pemesanan Mudah</h5>
                    <p>Langsung dari perangkat Anda tanpa antre di stasiun.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4">
                    <i class="fas fa-lock feature-icon text-danger"></i>
                    <h5>Transaksi Aman</h5>
                    <p>Privasi dan keamanan data pengguna adalah prioritas kami.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section id="testimonials" class="testimonial">
    <div class="container">
        <h2 class="text-center">Apa Kata Pengguna Kami?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left quote"></i>
                    <p>"Layanan TiketKereta sangat memudahkan saya dalam merencanakan perjalanan. Proses pemesanan yang cepat dan mudah."</p>
                    <h5>Andi, Jakarta</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left quote"></i>
                    <p>"TiketKereta selalu memastikan saya mendapatkan harga terbaik. Sistem yang aman dan mudah digunakan."</p>
                    <h5>Rina, Surabaya</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left quote"></i>
                    <p>"Pengalaman terbaik menggunakan layanan TiketKereta. Tiket datang langsung ke aplikasi saya tanpa ribet!"</p>
                    <h5>Budi, Yogyakarta</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; <?= date("Y") ?> TiketKereta. Semua Hak Dilindungi.</p>
        <p><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat & Ketentuan</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
