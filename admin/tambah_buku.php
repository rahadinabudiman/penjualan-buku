<h2>Ini tambah buku.</h2>

<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label>Judul Buku</label>
    <input type="text" class="form-control" name="judul">
</div>
<div class="form-group">
    <label>Penulis</label>
    <input type="text" class="form-control" name="penulis">
</div>
<div class="form-group">
    <label>Penerbit</label>
    <input type="text" class="form-control" name="penerbit">
</div>
<div class="form-group">
    <label>Genre</label>
    <input type="text" class="form-control" name="genre">
</div>
<div class="form-group">
    <label>Sinopsis</label>
    <input type="text" class="form-control" name="sinopsis">
</div>
<div class="form-group">
    <label>Harga Buku</label>
    <input type="number" class="form-control" name="harga">
</div>
<div class="form-group">
    <label>Tahun Buku</label>
    <input type="date" class="form-control" name="tahun">
</div>
<div class="form-group">
    <label>Foto Buku</label>
    <input type="file" class="form-control" name="foto">
</div>
<button class="btn btn-primary" name="simpan">Save</button>
</form>
<?php
 if(isset($_POST['simpan'])){
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi,"foto_buku/".$nama);
    $koneksi->query("INSERT INTO buku
        (judul_buku,penulis_buku,penerbit_buku,genre,foto_buku,harga_buku,sinopsis_buku,tahun) VALUES ('$_POST[judul]','$_POST[penulis]','$_POST[penerbit]','$_POST[genre]','$nama','$_POST[harga]','$_POST[sinopsis]','$_POST[tahun]')");
    
    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=buku'>";
}
    
?>