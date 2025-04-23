<?php
// Cek apakah user yang login adalah admin
if ($_SESSION['user']['role'] != 'admin') {
    echo "<script>alert('Akses ditolak!');window.location='index.php';</script>";
    exit;
}

// Ambil semua pemesanan
$data = mysqli_query($koneksi, "
    SELECT p.*, u.nama, j.asal, j.tujuan, k.nama_kereta 
    FROM pemesanan p
    JOIN user u ON p.id_user = u.id_user
    JOIN jadwal j ON p.id_jadwal = j.id_jadwal
    JOIN kereta k ON j.id_kereta = k.id_kereta
    ORDER BY p.status_bayar DESC, p.id_pemesanan DESC
");

// Jika ada aksi verifikasi
if (isset($_GET['verifikasi_id'])) {
    $id = $_GET['verifikasi_id'];
    mysqli_query($koneksi, "UPDATE pemesanan SET status_bayar = 'berhasil' WHERE id_pemesanan = '$id'");
    echo "<script>alert('Pembayaran telah diverifikasi.');window.location='?page=verifikasi';</script>";
    exit;
}
?>

<div class="container mt-4">
    <h2>Verifikasi & Validasi Pembayaran</h2>

    <div class="card mt-3 shadow-sm">
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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while($row = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nama_kereta']; ?></td>
                            <td><?= $row['asal']; ?> → <?= $row['tujuan']; ?></td>
                            <td><?= $row['jumlah_tiket']; ?></td>
                            <td>Rp <?= number_format($row['total_bayar']); ?></td>
                            <td>
                                <?php if($row['status_bayar'] == 'berhasil'): ?>
                                    <span class="badge bg-success">Sudah Diverifikasi</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Belum</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($row['status_bayar'] != 'berhasil'): ?>
                                    <a href="?page=verifikasi&verifikasi_id=<?= $row['id_pemesanan']; ?>" class="btn btn-sm btn-success" onclick="return confirm('Yakin ingin verifikasi?')">
                                        Verifikasi
                                    </a>
                                <?php else: ?>
                                    <i class="text-muted">✔</i>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
