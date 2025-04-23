<?php
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['user']['id_user'];

// Ambil daftar tiket pemesanan
$tiket = mysqli_query($koneksi, "
    SELECT p.*, j.asal, j.tujuan, k.nama_kereta 
    FROM pemesanan p 
    JOIN jadwal j ON p.id_jadwal = j.id_jadwal 
    JOIN kereta k ON j.id_kereta = k.id_kereta 
    WHERE p.id_user = '$id_user'
    ORDER BY p.id_pemesanan DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan - Ticketing Kereta Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #1c1c1c;
        }

        .navbar-brand {
            color: #2196f3 !important;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            color: #fff !important;
            padding: 10px 16px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #2196f3 !important;
            background-color: #2b2b2b;
            border-radius: 8px;
        }

        .container {
            max-width: 1200px;
            padding: 20px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #1c1c1c, #6a6a6a);
            color: #fff;
            font-size: 1.6rem;
            font-weight: 600;
            text-align: center;
            padding: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
            font-size: 1rem;
            padding: 1.2rem;
        }

        .badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
        }

        .badge.bg-success {
            background-color: #28a745 !important;
        }

        .badge.bg-warning {
            background-color: #ffc107 !important;
        }

        .table-row:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .lead {
            font-size: 1.3rem;
            font-weight: 300;
        }

        .text-muted {
            font-style: italic;
        }

        .fas {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }

            .card-header {
                font-size: 1.3rem;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>


</nav>

<!-- Main Content -->
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="display-3 text-primary font-weight-bold">Selamat Datang, <?= $_SESSION['user']['nama']; ?>!</h2>
        <p class="lead text-muted">Lihat riwayat pemesanan tiket kereta api Anda dengan mudah dan jelas.</p>
    </div>

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header">
            Riwayat Pemesanan Tiket
        </div>
        <div class="card-body p-4 table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Kereta</th>
                        <th>Rute</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($tiket) > 0): 
                        $no = 1;
                        while($row = mysqli_fetch_assoc($tiket)): ?>
                        <tr class="table-row">
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_kereta']; ?></td>
                            <td><?= $row['asal']; ?> → <?= $row['tujuan']; ?></td>
                            <td><?= $row['jumlah_tiket']; ?></td>
                            <td>Rp <?= number_format($row['total_bayar']); ?></td>
                            <td>
                                <?php if($row['status_bayar'] == 'berhasil'): ?>
                                    <span class="badge bg-success"><i class="fas fa-check-circle"></i> Sudah Dibayar</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark"><i class="fas fa-clock"></i> Pending</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada tiket yang dipesan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
