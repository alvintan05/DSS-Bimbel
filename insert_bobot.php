<?php  

	include 'koneksi.php';

	if (isset($_POST['submit'])) {
		$biaya = $_POST['biaya'];
		$fasilitas = $_POST['fasilitas'];
		$pertemuan = $_POST['pertemuan'];
		$kapasitas = $_POST['kapasitas'];

		$bobot = array($biaya, $fasilitas, $pertemuan, $kapasitas);	

		$query = "SELECT * FROM tb_bimbel";

		$result = mysqli_query($koneksi, $query);

		$alternatif=array();
		//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
		foreach ($result as $row) {
			$alternatif[$row['id_bimbel']]=$row['nama'];
		}

		header("location:main.php");
	}

?>