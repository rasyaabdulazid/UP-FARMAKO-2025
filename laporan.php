<?php
if ($_SESSION['user']['role'] != 'admin') {
    echo "<script>alert('Akses ditolak!');window.location='index.php';</script>";
    exit;
}

include "koneksi.php";

// Ambil semua data pemesanan yang sudah diverifikasi
$query = mysqli_query($koneksi, "
    SELECT p.*, u.nama, j.asal, j.tujuan, k.nama_kereta 
    FROM pemesanan p
    JOIN user u ON p.id_user = u.id_user
    JOIN jadwal j ON p.id_jadwal = j.id_jadwal
    JOIN kereta k ON j.id_kereta = k.id_kereta
    WHERE p.status_bayar = 'berhasil'
    ORDER BY p.id_pemesanan DESC
");

// Hitung total tiket dan pendapatan
$total_penumpang = 0;
$total_pendapatan = 0;
$pemesanan = [];

while($row = mysqli_fetch_assoc($query)) {
    $total_penumpang += $row['jumlah_tiket'];
    $total_pendapatan += $row['total_bayar'];
    $pemesanan[] = $row;
}
?>

<div class="container mt-4" id="laporan-area">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Laporan Pemesanan</h3>
    <!-- <button class="btn btn-primary" onclick="window.print()">
        🖨️ Cetak Laporan
    </button> -->
</div>

    <div class="card shadow-sm mb-4">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Kereta</th>
                        <th>Rute</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pemesanan)): ?>
                        <?php $no = 1; foreach($pemesanan as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nama_kereta']; ?></td>
                            <td><?= $row['asal']; ?> → <?= $row['tujuan']; ?></td>
                            <td><?= $row['jumlah_tiket']; ?></td>
                            <td>Rp <?= number_format($row['total_bayar']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-6">
            <div class="alert alert-info">
                <h5>Total Penumpang</h5>
                <h3><?= $total_penumpang; ?> Orang</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="alert alert-success">
                <h5>Total Pendapatan</h5>
                <h3>Rp <?= number_format($total_pendapatan); ?></h3>
            </div>
        </div>
    </div>
</div>
