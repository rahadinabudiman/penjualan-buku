<h2>Ini Pembelian</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <?php
        $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
        $no = 1;
        while($pecah = $ambil->fetch_assoc()){
    ?>
    <tbody>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['tanggal_pembelian']; ?></td>
            <td><?php echo $pecah['total_pembelian']; ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">DETAIL</a>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>

</table>