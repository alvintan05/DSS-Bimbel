<?php 
	include 'koneksi.php'; 
	session_start();

	$id_user = $_SESSION['user_id'];
	ini_set("precision", "4");
	date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Proses Perhitungan</title>
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
			<h2>Proses dan Hasil DSS Pendukung Keputusan Bimbel 12 SMA </h2>
			<h6></h6>
			<div class="row">
				<div class="wow fadeInLeft delay-05s">
					<div>
						<h3 class="font-weight-bold">Tabel Bobot</h3>

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

								$bobot = array();
								$biaya = $_POST['biaya'];
								$fasilitas = $_POST['fasilitas'];
								$pertemuan = $_POST['pertemuan'];
								$kapasitas = $_POST['kapasitas'];								

								$bobot = array("1"=>$biaya, 
									"2"=>$fasilitas, 
									"3"=>$pertemuan, 
									"4"=>$kapasitas);

								$timestamp = date("Y-m-d H:i:s");

								$query = "INSERT INTO tb_history(id_user, biaya, fasilitas, jml_pertemuan, kapasitas, tgl_jam)
								VALUES('$id_user','$biaya', '$fasilitas', '$pertemuan', '$kapasitas', '$timestamp')";

								$result = mysqli_query($koneksi, $query);						

								$id_history = mysqli_insert_id($koneksi);								

							?>

							<tr>
								<td><?php echo $biaya ?></td>					
								<td><?php echo $fasilitas ?></td>
								<td><?php echo $pertemuan ?></td>
								<td><?php echo $kapasitas ?></td>
							</tr>		

						</table>
					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Tabel Alternatif</h3>

						<table class="table table-sm table-hover" border="1px">
							<thead class="thead-dark">										
								<tr>
									<th>Id Alternatif</th>
									<th>Nama Alternatif</th>
								</tr>
							</thead>

							<?php  

								include 'koneksi.php';

								$query = "SELECT * FROM tb_bimbel";

								$result = mysqli_query($koneksi, $query);	

								$alternatif=array();
								//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
								foreach ($result as $row) {																	
									$alternatif[$row['id_bimbel']] = $row['nama'];
								}		
								
								foreach ($alternatif as $id=>$nama) {			
									echo "<tr>";										
										echo "<td>{$id}</td>";
										echo "<td>{$nama}</td>";					
									echo "</tr>";
								}
							?>

						</table>

					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Matriks Keputusan</h3>

						<table class="table table-sm table-hover" border="1">	
							<thead class="thead-dark">
								
								<tr>
									<th>Id</th>
									<th>Nama</th>
									<th colspan="4">Matriks</th>
								</tr>

							</thead>

							<?php 

								include 'koneksi.php';

								$query = "SELECT * FROM tb_konversi";

								$result = mysqli_query($koneksi, $query);

								$konversi=array();
								$normalisasi = array();
								//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
								foreach ($result as $row) {																	
									$konversi[$row['id_bimbel']][$row['id_kriteria']] = $row['nilai'];						
									$normalisasi[$row['id_kriteria']][$row['id_bimbel']] = $row['nilai'];
								}			
								
								foreach ($konversi as $id_bimbel=>$a_kriteria) {
								
									echo "<tr>";	
									echo "<td>{$id_bimbel}</td>";				
									echo "<td>{$alternatif[$id_bimbel]}</td>";
									foreach($a_kriteria as $id_kriteria=>$nilai){
										echo "<td>{$nilai}</td>";
									}
									echo "</tr>";
								}						

							 ?>			

						</table>

					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Xn</h3>
						<?php
							//-- inisialisasi array pembagi
							$kuadrat = array();
							$Xn = array();
							
							//kuadrat setiap elemen kriteria
							foreach ($normalisasi as $id_kriteria => $v_bimbel) {
								
								foreach ($v_bimbel as $id_bimbel => $nilai) {
									$kuadrat[$id_kriteria][$id_bimbel] = pow($nilai,2);
								}

							}

							// menjumlahkan hasil kuadrat
							foreach ($kuadrat as $id_kriteria => $v_bimbel) {

								$Xn[$id_kriteria] = 0;

								foreach ($v_bimbel as $id_bimbel => $nilai) {
									$Xn[$id_kriteria] += $nilai;
								}
							}

							// akar dari xn
							foreach ($Xn as $row => $nilai) {
								$Xn[$row] = sqrt($nilai);
							}

							echo "<table class=\"table table-sm table-hover\" border=1>";
							echo "<thead class=\"thead-dark\">";
							echo "<tr>";
							echo "<th>X1</th>";
							echo "<th>X2</th>";
							echo "<th>X3</th>";
							echo "<th>X4</th>";
							echo "</tr>";
							echo "</thead>";
							echo "<tr>";				
							foreach ($Xn as $id_kriteria => $nilai) {				
								echo "<td>{$nilai}</td>";								
							}
							echo "</tr>";
							echo "</table>";						
						?>

						<br>
						<h3 class="font-weight-bold">Matriks Normalisasi</h3>

						<?php  

							$mtx_norm = array();

							foreach ($konversi as $id_bimbel => $v_kriteria) {

								foreach ($v_kriteria as $id_kriteria => $nilai) {
									$mtx_norm[$id_bimbel][$id_kriteria] = $nilai/$Xn[$id_kriteria];
								}

							}	

							echo "<table class=\"table table-sm table-hover\" border=2>";
							foreach ($mtx_norm as $id_bimbel => $v_kriteria) {
								echo "<tr>";
								foreach ($v_kriteria as $id_kriteria => $nilai) {
									echo "<td>{$nilai}</td>";
								}
								echo "</tr>";
							}
							echo "</table>";

						?>

					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Matriks Terbobot Y</h3>
						<table class="table table-sm table-hover" border="2">			

							<?php  

								$mat_bobot = array();

								foreach ($mtx_norm as $id_bimbel => $v_kriteria) {
									
									foreach ($v_kriteria as $id_kriteria => $nilai) {
										$mat_bobot[$id_bimbel][$id_kriteria] = $nilai * $bobot[$id_kriteria];
									}

								}

								foreach ($mat_bobot as $id_bimbel => $v_kriteria) {
									echo "<tr>";
									foreach ($v_kriteria as $id_kriteria => $nilai) {
										echo "<td>{$nilai}</td>";
									}
									echo "</tr>";
								}


							?>

						</table>	
					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Solusi Ideal Positif (A+)</h3>		
						<?php  

							$A_max=$A_min=array();
							//-- melakukan iterasi utk setiap kriteria
							foreach($bobot as $id_kriteria=>$a_kriteria) {
								$A_max[$id_kriteria]=0;
								$A_min[$id_kriteria]=100;
								//-- melakukan iterasi utk setiap alternatif
								foreach($alternatif as $id_alternatif=>$nilai){
									if($A_max[$id_kriteria]<$mat_bobot[$id_alternatif][$id_kriteria]){
										$A_max[$id_kriteria] = $mat_bobot[$id_alternatif][$id_kriteria];
									}
									if($A_min[$id_kriteria]>$mat_bobot[$id_alternatif][$id_kriteria]){
										$A_min[$id_kriteria] = $mat_bobot[$id_alternatif][$id_kriteria];
									}
								}
							}

							// swap result for biaya dan kapasitas
							list($A_max[1], $A_min[1]) = array($A_min[1], $A_max[1]);
							list($A_max[4], $A_min[4]) = array($A_min[4], $A_max[4]);
						?>		
						<table class="table table-sm table-hover" border="1">
							<thead class="thead-dark">
								<tr>
									<th>Biaya</th>
									<th>Fasilitas</th>
									<th>Pertemuan</th>
									<th>Kapasitas</th>
								</tr>			
							</thead>
							
							<?php 
								echo "<tr>";
								foreach ($A_max as $id => $value) {
									echo "<td>{$value}</td>";
								}
								echo "</tr>";
							 ?>

						</table>

						<br>
						<h3 class="font-weight-bold">Solusi Ideal Negatif A-</h3>

						<table class="table table-sm table-hover" border="1">
							<thead class="thead-dark">
								<tr>
									<th>Biaya</th>
									<th>Fasilitas</th>
									<th>Pertemuan</th>
									<th>Kapasitas</th>
								</tr>			
							</thead>
							
							<?php 
								echo "<tr>";
								foreach ($A_min as $id => $value) {
									echo "<td>{$value}</td>";
								}
								echo "</tr>";
							 ?>

						</table>

					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Jarak Solusi Ideal Positif D+</h3>		

						<table class="table table-sm table-hover" border="2">	
							<thead class="thead-dark">
								<tr>
									<th>#</th>
									<th>D+</th>
								</tr>
							</thead>				

						<?php  

							$D_plus=$D_min=array();

							foreach ($mat_bobot as $id_bimbel => $v_kriteria) {

								$D_plus[$id_bimbel] = 0;
								$D_min[$id_bimbel] = 0;
								
								foreach ($v_kriteria as $id_kriteria => $value) {
									$D_plus[$id_bimbel]+=pow($mat_bobot[$id_bimbel][$id_kriteria]-$A_max[$id_kriteria], 2);
									$D_min[$id_bimbel]+=pow($mat_bobot[$id_bimbel][$id_kriteria]-$A_min[$id_kriteria], 2);
								}

								$D_plus[$id_bimbel] = sqrt($D_plus[$id_bimbel]);
								$D_min[$id_bimbel] = sqrt($D_min[$id_bimbel]);

							}

							foreach ($D_plus as $id_bimbel => $value) {
								echo "<tr>";
								echo "<td>{$id_bimbel}</td>";				
								echo "<td>{$value}</td>";
								echo "</tr>";
							}

						?>

						</table>

						<br>
						<h3 class="font-weight-bold">Jarak Solusi Ideal Negatif D-</h3>

						<table class="table table-sm table-hover" border="2">
							<thead class="thead-dark">
								<tr>
									<th>#</th>
									<th>D-</th>
								</tr>
							</thead>
							<?php 

								foreach ($D_min as $id_bimbel => $value) {
									echo "<tr>";
									echo "<td>{$id_bimbel}</td>";				
									echo "<td>{$value}</td>";
									echo "</tr>";
								}

							?>			
						</table>

					</div>

					<div>
						<br>
						<h3 class="font-weight-bold">Nilai Preferensi</h3>

						<table class="table table-sm table-hover" border="2">
							<thead class="thead-dark">
								<tr>
									<th>Id</th>
									<th>Nama Bimbel</th>
									<th>Nilai</th>
									<th>Rank</th>									
								</tr>
							</thead>

							<?php 

								$V = array();

								foreach ($D_min as $id => $value) {
									$V[$id] = $D_min[$id] / ($D_min[$id] + $D_plus[$id]);
								}

								arsort($V);

								$a = 1;

								foreach ($V as $id => $indeks) {										
									echo "<tr>";
									echo "<td>{$id}</td>";			
									echo "<td>{$alternatif[$id]}</td>";
									echo "<td>{$indeks}</td>";					
									echo "<td>{$a}</td>";									
									echo "</tr>";
									$a++;
								}
					
								foreach ($V as $id => $indeks) {
									$query = "INSERT INTO tb_value(id_history, id_bimbel, value)
									VALUES('$id_history','$id','$indeks')";	
									$result = mysqli_query($koneksi, $query);
								}								

							?>

						</table>
					</div>					

					<div>
						<h3>Lihat Hasil lebih lengkap pada tabel history</h3>							
						<a href="home.php" class="btn btn-success" role="button">HOME</a>
					</div>

				</div>
			</div>
		</div>	
</section>

</body>
</html>