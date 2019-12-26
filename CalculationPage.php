<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proses Perhitungan</title>
</head>
<body>
	<div>
		<h3>Tabel Bobot</h3>

		<table border="1px">
			<tr>
				<th>Biaya</th>
				<th>Fasilitas</th>
				<th>Pertemuan</th>			
				<th>Kapasitas</th>
			</tr>
		
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
		
		<h3>Tabel Alternatif</h3>

		<table border="1px">
			
			<tr>
				<th>Id Alternatif</th>
				<th>Nama Alternatif</th>
			</tr>

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
		
		<h3>Matriks Keputusan</h3>

		<table border="2">	

			<tr>
				<th>Id</th>
				<th>Nama</th>
				<th colspan="4">Matriks</th>
			</tr>

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
		<h3>Xn</h3>
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

			echo "<table border=1>";
			echo "<tr>";
			echo "<th>X1</th>";
			echo "<th>X2</th>";
			echo "<th>X3</th>";
			echo "<th>X4</th>";
			echo "</tr>";
			echo "<tr>";				
			foreach ($Xn as $id_kriteria => $nilai) {				
				echo "<td>{$nilai}</td>";								
			}
			echo "</tr>";
			echo "</table>";					
		?>

		<h3>Matriks Normalisasi</h3>

		<?php  

			$mtx_norm = array();

			foreach ($konversi as $id_bimbel => $v_kriteria) {

				foreach ($v_kriteria as $id_kriteria => $nilai) {
					$mtx_norm[$id_bimbel][$id_kriteria] = $nilai/$Xn[$id_kriteria];
				}

			}	

			echo "<table border=2>";
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
		<h3>Matriks Terbobot Y</h3>
		<table border="2">			

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
		<h3>Solusi Ideal Positif (A+)</h3>		
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
		<table border="1">
			<tr>
				<th>Biaya</th>
				<th>Fasilitas</th>
				<th>Pertemuan</th>
				<th>Kapasitas</th>
			</tr>			
			
			<?php 
				echo "<tr>";
				foreach ($A_max as $id => $value) {
					echo "<td>{$value}</td>";
				}
				echo "</tr>";
			 ?>

		</table>

		<h3>Solusi Ideal Negatif A-</h3>

		<table border="1">
			<tr>
				<th>Biaya</th>
				<th>Fasilitas</th>
				<th>Pertemuan</th>
				<th>Kapasitas</th>
			</tr>			
			
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
		
		<h3>Jarak Solusi Ideal Positif D+</h3>		

		<table border="1">					

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

		<h3>Jarak Solusi Ideal Negatif D-</h3>

		<table border="1">
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
		<h3>Nilai Preferensi</h3>

		<table border="2">
			<tr>
				<th>Id</th>
				<th>Nama Bimbel</th>
				<th>Nilai</th>
				<th>Rank</th>
			</tr>

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

			?>

		</table>

	</div>

</body>
</html>