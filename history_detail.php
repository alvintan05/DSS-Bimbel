<?php  
	ini_set("precision", "4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Detail History</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
				<li class="small-logo"><a href="#header"><img src="img/smallicon.png" alt=""></a></li>
				<li><a href="home.php">Home</a></li>				
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>
	<!--main-nav-end-->


<section class="main-section" id="service">
	<!--main-section-start-->	
		<div class="container">
			<h2>Detail History</h2>
			<h6></h6>
			<div class="row">
				<div class="wow fadeInLeft delay-05s">
					<div>
						<h3 class="font-weight-bold">Tabel Bobot yang digunakan</h3>

						<table class="table table-sm table-hover" border="1px">
							<thead class="thead-dark">
								<tr>
									<th>Biaya</th>
									<th>Fasilitas</th>
									<th>Pertemuan</th>			
									<th>Kapasitas</th>
								</tr>
							</thead>
						
							<?php  			

								include 'koneksi.php';		

								$bobot = array();								
								$id_history = $_GET['id'];

								$query = "SELECT * FROM tb_history WHERE id_history = '$id_history'";

								$result = mysqli_query($koneksi, $query);	

								while ($d = mysqli_fetch_array($result)) {
									$biaya = $d['biaya'];
									$fasilitas = $d['fasilitas'];
									$pertemuan = $d['jml_pertemuan'];
									$kapasitas = $d['kapasitas'];		
								}					

								$bobot = array("1"=>$biaya, 
									"2"=>$fasilitas, 
									"3"=>$pertemuan, 
									"4"=>$kapasitas);

							?>

							<tr>
								<td><?php echo $biaya ?></td>					
								<td><?php echo $fasilitas ?></td>
								<td><?php echo $pertemuan ?></td>
								<td><?php echo $kapasitas ?></td>
							</tr>		

						</table>

						<h4>1 : Sangat Tidak Penting</h4>
						<h4>2 : Tidak Penting</h4>
						<h4>3 : Penting</h4>
						<h4>4 : Sangat Penting</h4>

					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Hasil Perhitungan</h3>

						<table class="table table-sm table-hover" border="2">
							<thead class="thead-dark">
								<tr>
									<th>Rank</th>
									<th>Nama Bimbel</th>
									<th>Nilai</th>	
									<th>Biaya</th>								
									<th>Fasilitas</th>
									<th>Jumlah Pertemuan</th>
									<th>Kapasitas</th>
									<th>Alamat</th>
								</tr>
							</thead>

							<?php 

								$query = "SELECT bi.nama, bi.biaya, bi.fasilitas, bi.jml_pertemuan, bi.kapasitas, bi.alamat, va.value FROM `tb_history` hi JOIN tb_value va ON hi.id_history = va.id_history JOIN tb_bimbel bi ON va.id_bimbel = bi.id_bimbel WHERE hi.id_history =10 ORDER BY va.value DESC";
								
								$result = mysqli_query($koneksi, $query);
						
								$a = 1;

								while ($d = mysqli_fetch_array($result)) {										
									echo "<tr>";
									echo "<td>{$a}</td>";
									echo "<td>{$d['nama']}</td>";	
									echo "<td>{$d['value']}</td>";
									echo "<td>{$d['biaya']}</td>";
									echo "<td>{$d['fasilitas']}</td>";
									echo "<td>{$d['jml_pertemuan']}</td>";
									echo "<td>{$d['kapasitas']}</td>";
									echo "<td>{$d['alamat']}</td>";
									echo "</tr>";
									$a++;
								}

							?>

						</table>

					</div>					
				</div>
			</div>
		</div>	
</section>

</body>
</html>