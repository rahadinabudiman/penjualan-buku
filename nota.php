<?php
    include 'admin/koneksi/koneksi.php';
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
?>
<html>
    <head>
        <title>Nota Euy</title>
    </head>
    <!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <body>
    <div class="container">
  <div class="card">
<div class="card-header">
Invoice
<?php date_default_timezone_set('Asia/Jakarta');?>
<strong><?php echo date("d-m-Y") ?></strong> 
  <span class="float-right"> <strong>Status:</strong> Pending</span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">From:</h6>
<div>
<strong>Admin Buku PTI</strong>
</div>
<div>Jalan Jalan weh pengen dimana</div>
<div>Ish gimana sih</div>
<div>Email : admin@bukupti.com</div>
<div>Phone : berapacik</div>
</div>

<div class="col-sm-6">
<h6 class="mb-3">To:</h6>
<div>
<strong><?php echo $pecah['nama_pelanggan']; ?></strong>
</div>
<div>ALAMAT SOON</div>
<div>ALAMAT SOON</div>
<div>Email: <?php echo $pecah['email_pelanggan']; ?></div>
<div>Phone: <?php echo $pecah['telepon_pelanggan'];?></div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Judul Buku</th>
<th>Penerbit</th>

<th class="right">Harga</th>
  <th class="center">Banyak</th>
<th class="right">Jumlah</th>
</tr>
</thead>
<?php
        $no = 1;
        $ambil = $koneksi->query("SELECT * FROM pembelian_buku JOIN buku ON pembelian_buku.id_buku=buku.id_buku WHERE pembelian_buku.id_pembelian='$_GET[id]'");
        $no = 1;
        while($data = $ambil->fetch_assoc()){
        $hargabelanja = $data['harga_buku']*$data['jumlah_pembelian'];
        $hargatotbuku = $pecah['total_pembelian'] - $pecah['tarif'];
?>
<tbody>
<tr>
<td class="center"><?php echo $no; ?></td>
<td class="left strong"><?php echo $data['judul_buku']; ?></td>
<td class="left"><?php echo $data['penerbit_buku']; ?></td>

<td class="right">Rp <?php echo number_format($data['harga_buku']); ?></td>
  <td class="center"><?php echo $data['jumlah_pembelian']; ?></td>
  
<td class="right">Rp <?php echo number_format($hargabelanja); ?></td>
</tr>
</tbody>
<?php } ?>
</table>							
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">
<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<ul>
										<li>Transfer ke Bank RAHACOY</li>
										<li>Nomor Rekening : 111111111111111111</li>
										<li>Atas Nama WASSAP MA FREND</li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="index.php"><button class="btn" name="checkout">Jajan lagi mamen</button></a>
									</div>
								</div>
							</div>
</div>
<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>
<td class="left">
<strong>Harga Buku</strong>
</td>
<td class="right">Rp <?php echo number_format($hargatotbuku); ?></td>
</tr>
<tr>
<td class="left">
<strong>Ongkos Kirim</strong>
</td>
<td class="right">Rp <?php echo number_format($pecah['tarif']); ?></td>
</tr>
<tr>
<!--<td class="left">
 <strong>VAT (10%)</strong>
</td>
<td class="right">$679,76</td> -->
</tr>
<tr>
<td class="left">
<strong>Total </strong>
</td>
<td class="right">
<strong>Rp <?php echo number_format($pecah['total_pembelian']); ?></strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>
    </body>
</html>