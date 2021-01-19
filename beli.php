<?php
    session_start();
    $id_buku = $_GET['id'];
    if(isset($_SESSION['keranjang'][$id_buku])){
        $_SESSION['keranjang'][$id_buku] +=1;
    }
    else{
        $_SESSION['keranjang'][$id_buku] = 1;
    }
    echo "<script>location='keranjang.php'</script>";
?>