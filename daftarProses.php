<?php  
include("koneksi.php");
session_start();
$nama = $_POST["nama"];
$email = $_POST["email"];
$pw = $_POST["pw"];
$sekolah = $_POST["sekolah"];

$_SESSION["nama"] = $nama;
$_SESSION["email"] = $email;
$_SESSION["pw"] = $pw;
$_SESSION["sekolah"] = $sekolah;

$sql = "INSERT INTO tb_user VALUES ('', '$nama', '$email', '$pw', '$sekolah')";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Berhasil Daftar</title>

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


	<div class="container">
		<div class="card text-center w-75">
			<div class="card-body">
			  	<p></p>
			  	<p></p>
			    <h1 class="card-title"><b>Pendaftaran Berhasil</b></h1>
			    <p></p>
			    <h4 class="card-text">Silahkan melakukan Login !</h4>
			    <p> </p>
			    <a href="login.php" class="btn btn-primary">Login</a>
			</div>
		</div>
	</div>

	
</body>
</html>