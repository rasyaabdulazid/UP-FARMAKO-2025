<h1 class="mt-4">Data Jadwal</h1>
<a href="?page=tambah_jadwal" class="btn btn-primary mb-3">Tambah Jadwal</a>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kereta</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Waktu Berangkat</th>
                    <th>Waktu Tiba</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "
                    SELECT jadwal.*, kereta.nama_kereta 
                    FROM jadwal 
                    JOIN kereta ON kereta.id_kereta = jadwal.id_kereta
                ");
                while($data = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama_kereta']; ?></td>
                    <td><?= $data['asal']; ?></td>
                    <td><?= $data['tujuan']; ?></td>
                    <td><?= $data['waktu_berangkat']; ?></td>
                    <td><?= $data['waktu_tiba']; ?></td>
                    <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="?page=edit_jadwal&id=<?= $data['id_jadwal']; ?>" class="btn btn-info">Edit</a>
                        <a href="?page=hapus_jadwal&id=<?= $data['id_jadwal']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
