<?php
include "koneksi.php";

$data = null;
$pembayaran_berhasil = false;

// Cek jika ada ID pemesanan terakhir di session
if (isset($_SESSION['last_pemesanan_id'])) {
    $id = $_SESSION['last_pemesanan_id'];
    $query = mysqli_query($koneksi, "
        SELECT p.*, u.nama, j.asal, j.tujuan, k.nama_kereta 
        FROM pemesanan p 
        JOIN user u ON p.id_user = u.id_user 
        JOIN jadwal j ON p.id_jadwal = j.id_jadwal
        JOIN kereta k ON j.id_kereta = k.id_kereta
        WHERE p.id_pemesanan = '$id'
    ");
    $data = mysqli_fetch_assoc($query);
}

// Jika tombol bayar ditekan
if (isset($_POST['bayar']) && $data && $data['status_bayar'] !== 'berhasil') {
    // Lakukan update
    mysqli_query($koneksi, "UPDATE pemesanan SET status_bayar = 'berhasil' WHERE id_pemesanan = '{$data['id_pemesanan']}'");
    $data['status_bayar'] = 'berhasil';
    $pembayaran_berhasil = true;
}
?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><b>Pembayaran Tiket</b></h4>
        </div>
        <div class="card-body">
            <?php if (!$data): ?>
                <div class="alert alert-info text-center" role="alert">
                    Belum ada pemesanan yang dilakukan.
                </div>
            <?php else: ?>
                <?php if ($pembayaran_berhasil): ?>
                    <div class="alert alert-success text-center">
                        ✅ Pembayaran berhasil!
                    </div>
                <?php endif; ?>

                <p><strong>Nama Lengkap:</strong> <?= $data['nama']; ?></p>
                <p><strong>Jadwal:</strong> <?= $data['nama_kereta']; ?> | <?= $data['asal']; ?> → <?= $data['tujuan']; ?></p>
                <p><strong>Jumlah Tiket:</strong> <?= $data['jumlah_tiket']; ?> tiket</p>
                <p><strong>Total Bayar:</strong> <span class="text-success fw-bold">Rp <?= number_format($data['total_bayar']); ?></span></p>
                <p><strong>Status:</strong> 
                    <?php if ($data['status_bayar'] === 'berhasil'): ?>
                        <span class="badge bg-success">Sudah Dibayar</span>
                    <?php else: ?>
                        <span class="badge bg-warning text-dark">Pending</span>
                    <?php endif; ?>
                </p>

                <?php if ($data['status_bayar'] != 'berhasil'): ?>
    <form method="POST" class="mt-3">
        <button type="submit" name="bayar" class="btn btn-success w-100">
            <i class="bi bi-cash-coin me-1"></i> Bayar Sekarang
        </button>
    </form>
<?php else: ?>
    <div class="alert alert-success mt-4 text-center" role="alert">
        ✅ Tiket sudah dibayar. Terima kasih!
    </div>
    <button class="btn btn-outline-primary w-100 mt-3" onclick="printTiket()">
        🖨️ Cetak Tiket
    </button>
<?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
</div>


<script>
    function printTiket() {
        const printArea = document.querySelector('.card-body').innerHTML;
        const original = document.body.innerHTML;

        document.body.innerHTML = `<div class='container mt-5'>${printArea}</div>`;
        window.print();
        document.body.innerHTML = original;
        location.reload(); // supaya balik ke normal setelah cetak
    }
</script>
