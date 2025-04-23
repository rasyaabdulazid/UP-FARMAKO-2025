<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kereta = $_POST['id_kereta'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $waktu_berangkat = date('Y-m-d H:i:s', strtotime($_POST['waktu_berangkat']));
    $waktu_tiba = date('Y-m-d H:i:s', strtotime($_POST['waktu_tiba']));
    $harga = $_POST['harga'];

    $simpan = mysqli_query($koneksi, "INSERT INTO jadwal (id_kereta, asal, tujuan, waktu_berangkat, waktu_tiba, harga) 
                                      VALUES ('$id_kereta', '$asal', '$tujuan', '$waktu_berangkat', '$waktu_tiba', '$harga')");


    if ($simpan) {
        echo "<script>alert('Jadwal berhasil ditambahkan'); location.href='?page=jadwal';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan jadwal');</script>";
    }
}
?>

<h1 class="mt-4">Tambah Jadwal</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post">
        <div class="mb-3">
    <label>Kereta</label>
    <select name="id_kereta" class="form-control" required>
        <option value="">-- Pilih Kereta --</option>
        <?php
        $kereta = mysqli_query($koneksi, "SELECT * FROM kereta");
        while($k = mysqli_fetch_assoc($kereta)){
            echo "<option value='".$k['id_kereta']."'>".$k['nama_kereta']."</option>";
        }
        ?>
    </select>
</div>

            <div class="mb-3">
                <label>Asal</label>
                <input type="text" name="asal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Waktu Berangkat</label>
                <input type="datetime-local" name="waktu_berangkat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Waktu Tiba</label>
                <input type="datetime-local" name="waktu_tiba" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
