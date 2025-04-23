<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM kereta WHERE id_kereta='$id'");
    $data = mysqli_fetch_array($query);
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='?page=kereta';</script>";
}
?>

<h1 class="mt-4">Ubah Data Kereta</h1>
<div class="card">
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Nama Kereta</label>
                <input type="text" name="nama_kereta" class="form-control" value="<?= $data['nama_kereta']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select name="jenis" class="form-control" required>
                    <option value="Eksekutif" <?= $data['jenis'] == 'Eksekutif' ? 'selected' : '' ?>>Eksekutif</option>
                    <option value="Bisnis" <?= $data['jenis'] == 'Bisnis' ? 'selected' : '' ?>>Bisnis</option>
                    <option value="Ekonomi" <?= $data['jenis'] == 'Ekonomi' ? 'selected' : '' ?>>Ekonomi</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" value="<?= $data['kapasitas']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="?page=kereta" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $nama_kereta = $_POST['nama_kereta'];
    $jenis = $_POST['jenis'];
    $kapasitas = $_POST['kapasitas'];

    $query_update = mysqli_query($koneksi, "UPDATE kereta SET nama_kereta='$nama_kereta', jenis='$jenis', kapasitas='$kapasitas' WHERE id_kereta='$id'");

    if ($query_update) {
        echo "<script>alert('Data berhasil diubah!'); window.location.href='?page=kereta';</script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah data.</div>";
    }
}
?>
