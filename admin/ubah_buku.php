<?php
    $data = $koneksi->query("SELECT * FROM buku WHERE id_buku='$_GET[id]'");
    $pecah = $data->fetch_assoc();
?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" name="judul" class="form-control" value="<?php echo $pecah['judul_buku']; ?>">
    </div>
    <div class="form-group">
        <label>Penulis Buku</label>
        <input type="text" name="penulis" class="form-control" value="<?php echo $pecah['penulis_buku']; ?>">
    </div>
    <div class="form-group">
        <label>Penerbit Buku</label>
        <input type="text" name="penerbit" class="form-control" value="<?php echo $pecah['penerbit_buku']; ?>">
    </div>
    <div class="form-group">
        <label>Tahun Buku</label>
        <input type="date" name="tahun" class="form-control" value="<?php echo $pecah['tahun']; ?>">
    </div>
    <div class="form-group">
        <label>Genre Buku</label>
        <input type="text" name="genre" class="form-control" value="<?php echo $pecah['genre']; ?>">
    </div>
    <div class="form-group">
        <label>Harga Buku</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_buku']; ?>">
    </div>
    <div class="form-group">
        <label>Sinopsis Buku</label>
        <input type="text" name="sinopsis" class="form-control" value="<?php echo $pecah['sinopsis_buku']; ?>">
    </div>
    <div class="form-group">
        <img src="foto_buku/<?php echo $pecah['foto_buku'];?>" width="300px">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-primary" name="save">Ubah Data</button>
</form>
<?php
    if(isset($_POST['save'])){
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
            if(!empty($lokasi)){   
                move_uploaded_file($lokasi, "foto_buku/$nama");
                $koneksi->query("UPDATE buku SET judul_buku='$_POST[judul]', penulis_buku='$_POST[penulis]', penerbit_buku='$_POST[penerbit]', tahun='$_POST[tahun]', genre='$_POST[genre]', harga_buku='$_POST[harga]', sinopsis_buku='$_POST[sinopsis]', foto_buku='$nama' WHERE id_buku='$_GET[id]'");

            }
            else{
                $koneksi->query("UPDATE buku SET judul_buku='$_POST[judul]', penulis_buku='$_POST[penulis]', penerbit_buku='$_POST[penerbit]', tahun='$_POST[tahun]', genre='$_POST[genre]', harga_buku='$_POST[harga]', sinopsis_buku='$_POST[sinopsis]' WHERE id_buku='$_GET[id]'");
            }

            echo "<div class='alert alert-info'>Data Berhasil Di Ubah</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=buku'>";
    }

?>