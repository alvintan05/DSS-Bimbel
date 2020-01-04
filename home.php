<?php  

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Homepage DSS BIMBLE 12 SMA-</title>

	<link rel="icon" href="favicon.png" type="image/png">
	<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">		

	<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/magnific-popup.js"></script>
	<script src="contactform/contactform.js"></script>

</head>
<body>
	<header class="header" id="header">
		<!--header-start-->
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src="img/logo.png" alt=""></a>
			</figure>
			<h1 class="animated fadeInDown delay-07s">Selamat Datang di Sistem Pendukung Keputusan Bimbingan Belajar Kelas 12 SMA</h1>
			<ul class="we-create animated fadeInUp delay-1s">
				<li>Tentukan masa depanmu dari sekarang</li>
			</ul>
			<a class="link animated fadeInUp delay-1s servicelink" href="#service">Get Started</a>
		</div>
	</header>
	<!--header-end-->


	<nav class="main-nav-outer" id="test">
		<!--main-nav-start-->
		<div class="container">
			<ul class="main-nav">
				<li class="small-logo"><a href="#header"><img src="img/smallicon.png" alt=""></a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="#Portfolio">Histori</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>
	<!--main-nav-end-->


	<section class="main-section" id="service">
		<!--main-section-start-->
		<div class="container">
			<h2>Bobot</h2>
			<h6>Silakan masukan bobot dari setiap kriteria</h6>			
			<form method="POST" action="CalculationPage.php">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-3 wow fadeInLeft delay-05s">
						<div class="service-list">
							<div class="service-list-col1">								
							</div>
							<div class="service-list-col2">

								<div class="form-group">
									<label for="inputBiaya">Bobot Biaya</label>								
									<select class="form-control" id="biaya" name="biaya">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>

								<div class="form-group">
									<label for="inputFasilitas">Bobot Fasilitas</label>								
									<select class="form-control" id="fasilitas" name="fasilitas">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>

								<div class="form-group">
									<label for="inputPertemuan">Bobot Jumlah Pertemuan</label>						
									<select class="form-control" id="pertemuan" name="pertemuan">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>

								<div class="form-group">
									<label for="inputKapasitas">Bobot Kapasitas</label>								
									<select class="form-control" id="kapasitas" name="kapasitas">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>

								<br>
								
								<div class="form-group">
									<button type="submit" class="input-btn" name="submit">Hitung</button>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-5 wow fadeInLeft delay-05s"> 

						<table>
							<tr align="left">
								<td>Keterangan Bobot</td>
							</tr>
							<tr align="left">
								<td>1 : Sangat Tidak Penting</td>
							</tr>							
							<tr align="left">
								<td>2 : Tidak Penting</td>
							</tr>								
							<tr align="left">
								<td>3 : Penting</td>
							</tr>							
							<tr align="left">
								<td>4 : Sangat Penting</td>
							</tr>									
						</table>											

					</div>
				</div>
				<div class="col-md-2"></div>
			</form>
		</div>
	</section>
	<!--main-section-end-->


	<section class="main-section alabaster" id="Portfolio">
		<!--main-section alabaster-start-->
		<div class="container">
			<h2>Table Histori</h2>
			<div class="row">
				<figure class="col-lg-5 col-sm-4 wow fadeInLeft">
				</figure>

				<table class="table">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Tanggal Dan Waktu</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							    
							    <?php  

							    	include 'koneksi.php';							    

							    	$id_user = $_SESSION['user_id'];

							    	$query = "SELECT * FROM tb_history WHERE id_user='$id_user'";
							    	$result = mysqli_query($koneksi, $query);

							    	$index = 1;

							    	while ($d = mysqli_fetch_array($result)) {

										?>
										<tr>
											<td><?php echo $index ?></td>					
											<td><?php echo $d['tgl_jam'] ?></td>									
											<td>
												<a href="history_detail.php?id=<?php echo $d['id_history']; ?>" class="btn btn-success" role="button">DETAIL</a>						
											</td>
										</tr>
										<?php  
										$index++;
									}
									?>							   

							  </tbody>
							</table>
						</div>
					</div>
					<a class="Learn-More" href="#">Learn More</a>
				</div>
			</div>
		</div>													
	</section>
	

	<footer class="footer">
		<div class="container">
			<div class="footer-logo"><a href="#"><img src="img" alt=""></a></div>
			<span class="copyright">&copy; Sistem Pendukung Keputusan Bimbingan Belajar Kelas 12 SMA</span>			
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(e) {

			$('#test').scrollToFixed();
			$('.res-nav_click').click(function() {
				$('.main-nav').slideToggle();
				return false

			});

      $('.Portfolio-box').magnificPopup({
        delegate: 'a',
        type: 'image'
      });

		});
	</script>

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
	</script>


	<script type="text/javascript">
		$(window).load(function() {

			$('.main-nav li a, .servicelink').bind('click', function(event) {
				var $anchor = $(this);

				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 102
				}, 1500, 'easeInOutExpo');
				/*
				if you don't want to use the easing effects:
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1000);
				*/
				if ($(window).width() < 768) {
					$('.main-nav').hide();
				}
				event.preventDefault();
			});
		})
	</script>

	<script type="text/javascript">
		$(window).load(function() {


			var $container = $('.portfolioContainer'),
				$body = $('body'),
				colW = 375,
				columns = null;


			$container.isotope({
				// disable window resizing
				resizable: true,
				masonry: {
					columnWidth: colW
				}
			});

			$(window).smartresize(function() {
				// check if columns has changed
				var currentColumns = Math.floor(($body.width() - 30) / colW);
				if (currentColumns !== columns) {
					// set new column count
					columns = currentColumns;
					// apply width to container manually, then trigger relayout
					$container.width(columns * colW)
						.isotope('reLayout');
				}

			}).smartresize(); // trigger resize to set container width
			$('.portfolioFilter a').click(function() {
				$('.portfolioFilter .current').removeClass('current');
				$(this).addClass('current');

				var selector = $(this).attr('data-filter');
				$container.isotope({

					filter: selector,
				});
				return false;
			});

		});
	</script>


</body>
</html>
