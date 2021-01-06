<?php
  $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
?>
<h2>Ini Detail</h2>
<pre><?php print_r($pecah); ?></pre>

<strong><?php echo $pecah['nama_pelanggan']; ?></strong><br>
<p>
    <?php echo $pecah['telepon_pelanggan'];?><br>
    <?php echo $pecah['email_pelanggan']; ?>
</p>
<p>
    Tanggal : <?php echo $pecah['tanggal_pembelian']; ?><br>
    Total : <?php echo $pecah['total_pembelian']; ?>
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Foto Buku</th>
        </tr>
    </thead>
    <?php
        $ambil = $koneksi->query("SELECT * FROM pembelian_buku JOIN buku ON pembelian_buku.id_buku=buku.id_buku WHERE pembelian_buku.id_pembelian='$_GET[id]'");
        $no = 1;
        while($data = $ambil->fetch_assoc()){
    ?>
    <tbody>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['judul_buku']; ?></td>
            <td><?php echo $data['penulis_buku']; ?></td>
            <td><?php echo $data['penerbit_buku']; ?></td>
            <td><?php echo $data['harga_buku']; ?></td>
            <td><?php echo $data['jumlah_pembelian']; ?></td>
            <td><?php echo $data['harga_buku']*$data['jumlah_pembelian']; ?></td>
            <td><img src="foto_buku/<?php echo $data['foto_buku']; ?>" width="100"></td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>

</table>