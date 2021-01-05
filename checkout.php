<?php
    session_start();
    include 'admin/koneksi/koneksi.php';

    if(!isset($_SESSION['pelanggan'])){
        header('location:index.php');
        exit();
    }

    echo "<pre>";
    echo print_r($_SESSION['pelanggan']);
    echo "</pre>";
?>