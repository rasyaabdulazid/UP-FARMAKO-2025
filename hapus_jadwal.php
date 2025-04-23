<?php
include "koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id'");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus'); location.href='?page=jadwal';</script>";
} else {
    echo "<script>alert('Gagal menghapus'); location.href='?page=jadwal';</script>";
}
?>
