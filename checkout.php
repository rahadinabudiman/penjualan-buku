<?php
    session_start();
    include 'admin/koneksi/koneksi.php';

    if(!isset($_SESSION['pelanggan'])){
        header('location:index.php');
        exit();
    }

    // echo "<pre>";
    // echo print_r($_SESSION['pelanggan']);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
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

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		
		<!-- Header -->
		<header class="header shop">
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" alt="logo"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Search here..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
									<select>
										<option selected="selected">All Category</option>
										<option>watch</option>
										<option>mobile</option>
										<option>kid’s item</option>
									</select>
									<form>
										<input name="search" placeholder="Search Products Here....." type="search">
										<button class="btnn"><i class="ti-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
                                <?php if(isset($_SESSION['pelanggan'])): ?>
                                <div class="sinlge-bar">
								<a href="logout.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true">Logout</i></a>
							</div>
                            <?php else: ?>
                                <div class="sinlge-bar">
								<a href="login.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true">Login</i></a>
							</div>
                            <?php endif ?>
							<div class="sinlge-bar shopping">
								<a href="keranjang.php" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
                                <!-- Shopping Item -->
                              
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>List Items</span>
										<a href="keranjang.php">View Cart</a>
                                    </div>
                                    <?php
                                        if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])):
                                    ?>
                                    <ul class="shopping-list">
										<li>
											<h2>Jajan Dulu bos</h2>
                                        </li>
                                    </ul>
                                    <?php
                                    else:
                                        $totalbelanja = 0;
                                        foreach ($_SESSION['keranjang'] as $id_buku => $jumlah):
                            
                                            $data = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id_buku'");
                                            $databuku = $data->fetch_assoc();
                                            $totalharga = $databuku['harga_buku']*$jumlah;
                                    ?>
									<ul class="shopping-list">
										<li>
											<a href="hapus_keranjang.php?id=<?php echo $id_buku; ?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="admin/foto_buku/<?php echo $databuku['foto_buku']; ?>" alt="#"></a>
											<h4><a href="#"><?php echo $databuku['judul_buku']; ?></a></h4>
											<p class="quantity"><?php echo $jumlah ?>x - <span class="amount"><?php echo number_format($totalharga); ?></span></p>
                                        </li>
                                        <?php $totalbelanja+=$totalharga; ?>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                    </ul>
									<div class="bottom">
										<div class="total">
                                            <span>Total</span>
                                            <?php if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])): ?>
                                            <span class="total-amount">Rp X</span>
                                            <?php else: ?>
                                            <span class="total-amount">Rp <?php echo number_format($totalbelanja); ?></span>
                                            <?php endif ?>
                                        </div>
										<a href="checkout.html" class="btn animate">Checkout</a>
									</div>
                                </div>
									<!--/ End Shopping Item -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="#">Home</a></li>
													<li><a href="#">Product</a></li>												
													<li><a href="#">Service</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="shop-grid.html">Shop Grid</a></li>
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li>
													<li><a href="#">Pages</a></li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
        
        <!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>BUKU</th>
								<th>JUDUL BUKU</th>
								<th class="text-center">HARGA</th>
								<th class="text-center">JUMLAH</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
                        </thead>
                        <?php $totalbelanja = 0; ?>
                        <?php
                            foreach ($_SESSION['keranjang'] as $id_buku => $jumlah):
                            
                            $data = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id_buku'");
                            $databuku = $data->fetch_assoc();
                            $totalharga = $databuku['harga_buku']*$jumlah;
                        ?>
                        
						<tbody>
							<tr>
								<td class="image" data-title="No"><img src="admin/foto_buku/<?php echo $databuku['foto_buku']; ?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><b><?php echo $databuku['judul_buku']; ?></b></p>
									<p class="product-des"><?php  echo $databuku['sinopsis_buku'];?></p>
								</td>
								<td class="price" data-title="Price"><span>Rp <?php echo number_format($databuku['harga_buku']); ?> </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="<?php echo $jumlah ?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>Rp <?php echo number_format($totalharga) ?></span></td>
								<td class="action" data-title="Remove"><a href="hapus_keranjang.php?id=<?php echo $id_buku; ?>"><i class="ti-trash remove-icon"></i></a></td>
                            </tr>
                            <?php $totalbelanja+=$totalharga; ?>
                            <?php endforeach ?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
        <!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Ayo dibaca dulu Identitasnya takut salah kan repot hehe</p>
							<!-- Form -->
							<form class="form" method="POST">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nama Pembeli<span>*</span></label>
											<input type="text" name="name" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" value="<?php echo $_SESSION['pelanggan']['email_pelanggan']; ?>" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="number" value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" required="required">
										</div>
									</div>
								</div>
								<hr>
								<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Jasa Pengiriman<span>*</span></label>
											<select id="ongkir" name="ongkir" OnChange="myFunction()">
											<option value="">Pilih Jasa Pengiriman</option>
											<?php 
												$data = $koneksi->query("SELECT * FROM ongkir");
												while($ongkir = $data->fetch_assoc()){
											?>
												<option value="<?php echo $ongkir['id_ongkir']; ?>">Ke <?php echo $ongkir['kota']; ?> - Rp. <?php echo number_format($ongkir['tarif']); ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
							
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Total Harga<span>Rp <?php echo number_format($totalbelanja); ?></span></li>
										<li>(+) Ongkir<span id="harga-ongkir"></span></li>
										<li class="last">Total Belanja<span>Rp <?php echo number_format($totalbelanja); ?></span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
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
										<button class="btn" name="checkout">proceed to checkout</button>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
			</form>
		</section>
		<!--/ End Checkout -->
		<?php
			if(isset($_POST['checkout'])){
				$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
				$id_ongkir = $_POST['ongkir'];
				date_default_timezone_set('Asia/Jakarta');
				$tanggal_pembelian = date("Y-m-d");

				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
				$pecah =  $ambil->fetch_assoc();
				$tarif = $pecah['tarif'];

				$total_pembelian = $totalbelanja + $tarif;

				// Add ke Pembelian Database

				$koneksi->query("INSERT INTO pembelian
				(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,tarif) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$tarif')");

				// Ngambil id_pembelian
				 $id_pembelian = $koneksi->insert_id;

				 // Seleksi mau nyimpen ke pembelian_buku

				 foreach($_SESSION['keranjang'] as $id_buku => $jumlah){
					 $koneksi->query("INSERT INTO pembelian_buku (id_pembelian,id_buku,jumlah_pembelian) VALUES ('$id_pembelian','$id_buku','$jumlah')");
				 }
				// Clear Keranjang
					unset($_SESSION['keranjang']);

				 echo"<script>location='nota.php?id=$id_pembelian';</script>";
			}
		?>
		<pre><?php echo print_r($_SESSION['pelanggan']);?></pre>
		<pre><?php echo print_r($_SESSION['keranjang']);?></pre>
		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over $100</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Peice</h4>
							<p>Guaranteed price</p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Services -->
		
		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->
			
		<!-- Start Footer Area -->
		<footer class="footer">
			<!-- Footer Top -->
			<div class="footer-top section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer about">
								<div class="logo">
									<a href="index.html"><img src="images/logo2.png" alt="#"></a>
								</div>
								<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
								<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Information</h4>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Faq</a></li>
									<li><a href="#">Terms & Conditions</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Customer Service</h4>
								<ul>
									<li><a href="#">Payment Methods</a></li>
									<li><a href="#">Money-back</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer social">
								<h4>Get In Tuch</h4>
								<!-- Single Widget -->
								<div class="contact">
									<ul>
										<li>NO. 342 - London Oxford Street.</li>
										<li>012 United Kingdom.</li>
										<li>info@eshop.com</li>
										<li>+032 3456 7890</li>
									</ul>
								</div>
								<!-- End Single Widget -->
								<ul>
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-flickr"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<div class="copyright">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="left">
									<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="right">
									<img src="images/payments.png" alt="#">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /End Footer Area -->
	<script>
		function myFunction() {
		var x = document.getElementById("ongkir").value;
		document.getElementById("harga-ongkir").innerHTML = x;
		}
	</script>
	<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
</script>											 
	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>
</html>