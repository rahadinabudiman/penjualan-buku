<?php

$ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['foto_buku'];
if(file_exists("foto_buku/$foto")){
    unlink("foto_buku/$foto");
}

$koneksi->query("DELETE FROM buku WHERE id_buku='$_GET[id]'");

echo "<script>alert('Data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=buku';</script>";


?>