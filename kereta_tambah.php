<h1 class="mt-4">Tambah Data Kereta</h1>
<div class="card">
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Nama Kereta</label>
                <input type="text" name="nama_kereta" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select name="jenis" class="form-control" required>
                    <option value="" disabled selected>Pilih Jenis</option>
                    <option value="Eksekutif">Eksekutif</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Ekonomi">Ekonomi</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="?page=kereta" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama_kereta = $_POST['nama_kereta'];
    $jenis = $_POST['jenis'];
    $kapasitas = $_POST['kapasitas'];

    $valid_jenis = ['Eksekutif', 'Bisnis', 'Ekonomi'];

    if (in_array($jenis, $valid_jenis)) {
        $stmt = $koneksi->prepare("INSERT INTO kereta (nama_kereta, jenis, kapasitas) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nama_kereta, $jenis, $kapasitas);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil disimpan!'); window.location.href='?page=kereta';</script>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data. Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-warning'>Jenis kereta tidak valid.</div>";
    }
}
?>
