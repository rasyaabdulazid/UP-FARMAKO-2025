<?php
include "koneksi.php"; // Sudah include session_start() dari sini

$berhasil = false;

if (isset($_POST['submit'])) {
    $id_user = $_SESSION['user']['id_user'];
    $id_jadwal = $_POST['id_jadwal'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $total_bayar = $_POST['total_bayar'];
    $status_bayar = 'pending';
    $waktu_pemesanan = date('Y-m-d H:i:s');

    $query = mysqli_query($koneksi, "INSERT INTO pemesanan 
        (id_user, id_jadwal, jumlah_tiket, total_bayar, status_bayar, waktu_pemesanan) 
        VALUES ('$id_user','$id_jadwal','$jumlah_tiket','$total_bayar','$status_bayar','$waktu_pemesanan')");

    $last_id = mysqli_insert_id($koneksi);
    $_SESSION['last_pemesanan_id'] = $last_id;

    $berhasil = true; // Supaya nanti bisa munculkan alert tanpa pindah halaman
}
?>

<script>
    function hitungTotal() {
        const jumlah = document.getElementById('jumlah_tiket').value;
        const harga = 50000; // Harga per tiket
        document.getElementById('total_bayar').value = jumlah * harga;
    }
</script>

<div class="container mt-4">
    <h3>Form Pemesanan Tiket</h3>

    <?php if ($berhasil): ?>
        <div class="alert alert-success">Pemesanan berhasil! Silakan lanjut ke pembayaran.</div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= $_SESSION['user']['nama'] ?>" readonly>
        </div>

        <div class="mb-3">
            <label>Pilih Jadwal</label>
            <select name="id_jadwal" class="form-control" required>
                <option value="">-- Pilih Jadwal --</option>
                <?php
                $jadwal = mysqli_query($koneksi, "SELECT j.*, k.nama_kereta FROM jadwal j JOIN kereta k ON j.id_kereta = k.id_kereta");
                while ($r = mysqli_fetch_assoc($jadwal)) {
                    echo "<option value='{$r['id_jadwal']}'>{$r['nama_kereta']} | {$r['asal']} → {$r['tujuan']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Tiket</label>
            <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control" required oninput="hitungTotal()">
        </div>

        <div class="mb-3">
            <label>Total Bayar (Rp)</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" readonly>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>
