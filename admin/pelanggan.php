<h2>Ini Pelanggan</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <?php
        $ambil=$koneksi->query("SELECT * FROM pelanggan");
        $no = 1;
        while($pecah = $ambil->fetch_assoc()){
    ?>
    <tbody>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td>
                <a href="" class="btn btn-danger">DETAIL</a>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>

</table>