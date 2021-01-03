<h2>Ini Buku.</h2>
<a href="index.php?halaman=tambahbuku" class="btn btn-info">Tambah Buku</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Sinopsis</th>
            <th>Foto Buku</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <?php
        $ambil=$koneksi->query("SELECT * FROM buku");
        $no = 1;
        while($pecah = $ambil->fetch_assoc()){
    ?>
    <tbody>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $pecah['judul_buku']; ?></td>
            <td><?php echo $pecah['penulis_buku']; ?></td>
            <td><?php echo $pecah['penerbit_buku']; ?></td>
            <td><?php echo $pecah['genre']; ?></td>
            <td><?php echo $pecah['tahun']; ?></td>
            <td><?php echo $pecah['sinopsis_buku'];?></td>
            <td><?php echo $pecah['foto_buku']; ?></td>
            <td>
                <a href="" class="btn btn-danger">HAPUS</a>
                <a href="" class="btn btn-warning">EDIT</a>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>

</table>