<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$id'");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kereta = $_POST['id_kereta'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $waktu_berangkat = str_replace('T', ' ', $_POST['waktu_berangkat']);
    $waktu_tiba = str_replace('T', ' ', $_POST['waktu_tiba']);
    $harga = $_POST['harga'];

    $update = mysqli_query($koneksi, "UPDATE jadwal SET 
        id_kereta='$id_kereta',
        asal='$asal',
        tujuan='$tujuan',
        waktu_berangkat='$waktu_berangkat',
        waktu_tiba='$waktu_tiba',
        harga='$harga' 
        WHERE id_jadwal='$id'");

    if ($update) {
        echo "<script>alert('Berhasil diupdate'); location.href='?page=jadwal';</script>";
    } else {
        echo "<script>alert('Gagal update');</script>";
    }
}
?>

<h1 class="mt-4">Edit Jadwal</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Kereta</label>
                <select name="id_kereta" class="form-control" required>
                    <?php
                    $kereta = mysqli_query($koneksi, "SELECT * FROM kereta");
                    while($k = mysqli_fetch_assoc($kereta)){
                        $selected = ($k['id_kereta'] == $data['id_kereta']) ? 'selected' : '';
                        echo "<option value='".$k['id_kereta']."' $selected>".$k['nama_kereta']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Asal</label>
                <input type="text" name="asal" class="form-control" value="<?= $data['asal'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" value="<?= $data['tujuan'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Waktu Berangkat</label>
                <input type="datetime-local" name="waktu_berangkat" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($data['waktu_berangkat'])) ?>" required>
            </div>
            <div class="mb-3">
                <label>Waktu Tiba</label>
                <input type="datetime-local" name="waktu_tiba" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($data['waktu_tiba'])) ?>" required>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
</div>
