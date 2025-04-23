<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM penumpang WHERE id_penumpang = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pemesanan = $_POST['id_pemesanan'];
    $nama = $_POST['nama_penumpang'];
    $no_kursi = $_POST['no_kursi'];

    $update = mysqli_query($koneksi, "UPDATE penumpang SET 
        id_pemesanan='$id_pemesanan', 
        nama_penumpang='$nama', 
        no_kursi='$no_kursi' 
        WHERE id_penumpang=$id");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); location.href='?page=penumpang';</script>";
    } else {
        echo "<script>alert('Gagal update');</script>";
    }
}
?>

<h1 class="mt-4">Edit Penumpang</h1>
<div class="card mb-4">
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>ID Pemesanan</label>
                <input type="number" name="id_pemesanan" class="form-control" value="<?= $data['id_pemesanan']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Nama Penumpang</label>
                <input type="text" name="nama_penumpang" class="form-control" value="<?= $data['nama_penumpang']; ?>" required>
            </div>
            <div class="mb-3">
                <label>No Kursi</label>
                <input type="text" name="no_kursi" class="form-control" value="<?= $data['no_kursi']; ?>" required>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
