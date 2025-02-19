<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Login DSS BIMBEL 12 SMA-</title>
	
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
	<nav class="main-nav-outer" id="test">
		<!--main-nav-start-->
		<div class="container">
			<ul class="main-nav">
				<li class="small-logo"><a href="index.php"><img src="img/smallicon.png" alt=""></a></li>
				<li><a href="">Masuk</a></li>
				<li><a href="register.php">Daftar</a></li>
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>
	<!--main-nav-end-->

	<section class="main-section" id="service">
		<!--main-section-start-->
		<div class="container">
			<h2>Login</h2>
			<h6></h6>
			<div class="row">
				<div class="wow fadeInLeft delay-05s">
					<form method="post" action="loginProses.php">
						<div class="form-row">
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-4">
							    <label for="inputEmail">Email</label>
							    <input type="text" class="form-control" name="email" id="inputEmail" placeholder="ex : namaemail@gmail.com">
							</div>
							<div class="form-group col-md-4"></div>
						</div>
						<div class="form-group col-sm-12"></div>
						<div class="form-row">
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-4">
						    	<label for="inputPw">Password</label>
						    	<input type="Password" class="form-control" name="pw" id="inputPw" placeholder="">
							</div>	
							<div class="form-group col-md-4"></div>
						</div>
						<div class="form-group col-sm-12"></div>
						<div class="form-row">
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-4">
								<button type="submit" name="login" class="btn btn-primary">Masuk</button>
							</div>	
							<div class="form-group col-md-4"></div>
						</div>		
						<div class="form-group col-sm-12"></div>
						<p></p>
						<div class="form-row">
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-4">
								<h5>Belum punya akun ? <a class="nav-link active" href="register.php">Daftar disini</a></h5>
							</div>	
							<div class="form-group col-md-4"></div>
						</div>			
					</form>
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