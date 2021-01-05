<?php
    session_start();
    $id_buku =  $_GET['id'];    
    unset($_SESSION['keranjang'][$id_buku]);
    echo"<script>location='keranjang.php';</script>";
?>