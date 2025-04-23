<h1 class="mt-4">Kereta</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=kereta_tambah" class="btn btn-primary">+Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                    <tr>
                        <th>No</th>
                        <th>Nama Kereta</th>
                        <th>Jenis</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM kereta");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama_kereta']; ?></td>
                            <td><?php echo $data['jenis']; ?></td>
                            <td><?php echo $data['kapasitas']; ?></td>
                            <td>
                                <a href="?page=kereta_ubah&&id=<?php echo $data['id_kereta']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('apakah anda yakin menghapus data ini?');" href="?page=kereta_hapus&&id=<?php echo $data['id_kereta']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
