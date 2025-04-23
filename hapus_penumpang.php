<?php
include "koneksi.php";
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM penumpang WHERE id_penumpang = $id");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus'); location.href='?page=penumpang';</script>";
} else {
    echo "<script>alert('Gagal menghapus data');</script>";
}
?>
