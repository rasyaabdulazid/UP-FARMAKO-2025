<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari tabel kereta
    $query = mysqli_query($koneksi, "DELETE FROM kereta WHERE id_kereta='$id'");

    if ($query) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='?page=kereta';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location.href='?page=kereta';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='?page=kereta';</script>";
}
?>
