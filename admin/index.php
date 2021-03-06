<?php
    session_start();
    include 'koneksi/koneksi.php'; // KONEKSI DATABASE

    if(!isset($_SESSION['admin'])){
        header('location:login.php');
        exit();
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Page - Penjualan Buku Sederhana</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
        Tip 3: Thankyou!

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.keyzex.com" class="simple-text">
                    R4HA BOOK
                </a>
            </div>

            <ul class="nav">
                <li><a href="index.php"><i class="pe-7s-graph"></i><p>Dashboard</p></a></li>
                <li><a href="index.php?halaman=buku"><i class="pe-7s-graph"></i><p>Daftar Buku</p></a></li>
                <li><a href="index.php?halaman=pembelian"><i class="pe-7s-graph"></i><p>Pembelian</p></a></li>
                <li><a href="index.php?halaman=pelanggan"><i class="pe-7s-graph"></i><p>Pelanggan</p></a></li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?halaman=logout"><p>Log out</p></a></li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                    <?php 
                        if(isset($_GET['halaman'])){
                            // KATEGORI
                            if($_GET['halaman']=='buku'){
                                include 'buku.php';
                            }
                            elseif($_GET['halaman']=='pembelian'){
                                include 'pembelian.php';
                            }
                            elseif($_GET['halaman']=='pelanggan'){
                                include 'pelanggan.php';
                            }
                            // AKSI
                            elseif($_GET['halaman']=='tambahbuku'){
                                include 'tambah_buku.php';
                            }
                            elseif($_GET['halaman']=='detail'){
                                include 'detail.php';
                            }
                            elseif($_GET['halaman']=='hapusbuku'){
                                include 'hapus_buku.php';
                            }
                            elseif($_GET['halaman']=='ubahbuku'){
                                include 'ubah_buku.php';
                            }
                            elseif($_GET['halaman']=='logout'){
                                include 'logout.php';
                            }
                        }
                        else{
                            include 'greetings.php';
                        }

                    ?>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

    	});
    </script>

</html>
