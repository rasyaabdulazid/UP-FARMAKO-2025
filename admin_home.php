<?php
// Cegah akses jika bukan admin
if($_SESSION['user']['role'] != 'admin'){
    echo "<script>alert('Akses ditolak. Halaman ini hanya untuk admin.'); window.location='index.php';</script>";
    exit;
}

// Ambil data statistik
$jumlah_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM user WHERE role='user'"))['total'];
$jumlah_kereta = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kereta"))['total'];
$jumlah_jadwal = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM jadwal"))['total'];
$jumlah_pemesanan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pemesanan"))['total'];
?>

<!-- Gaya background hijau -->
<style>
    body {
        background-color: #d4edda;
    }

    .hover-zoom:hover {
        transform: scale(1.03);
        transition: 0.3s ease-in-out;
    }
</style>

<!-- Konten Dashboard -->
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Dashboard Admin</h2>
        <p class="text-muted">Selamat datang, <strong><?= $_SESSION['user']['nama']; ?></strong>. Diaplikasi Ticketing Kereta Api</p>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom bg-primary text-white">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill fs-1 mb-3"></i>
                    <h5 class="card-title">User Terdaftar</h5>
                    <p class="fs-4"><?= $jumlah_user; ?> orang</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom bg-success text-white">
                <div class="card-body text-center">
                    <i class="bi bi-train-front fs-1 mb-3"></i>
                    <h5 class="card-title">Kereta</h5>
                    <p class="fs-4"><?= $jumlah_kereta; ?> kereta</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom bg-warning text-dark">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check fs-1 mb-3"></i>
                    <h5 class="card-title">Jadwal</h5>
                    <p class="fs-4"><?= $jumlah_jadwal; ?> jadwal</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 hover-zoom bg-danger text-white">
                <div class="card-body text-center">
                    <i class="bi bi-ticket-perforated-fill fs-1 mb-3"></i>
                    <h5 class="card-title">Total Pemesanan</h5>
                    <p class="fs-4"><?= $jumlah_pemesanan; ?> tiket</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN (pastikan ini ada di layout utama Anda atau di bagian bawah halaman) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
