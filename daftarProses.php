<?php  
	include 'koneksi.php';

	if (isset($_POST['daftar'])) {
		$nama = $_POST["nama"];
		$email = $_POST["email"];
		$pw = $_POST["pw"];
		$sekolah = $_POST["sekolah"];

		$query = "INSERT INTO tb_user(nama, email, password, sekolah) 
		VALUES ('$nama', '$email', '$pw', '$sekolah')";
		
		if (empty($nama)) {
			echo "<script>alert('nama belum diisi')</script>";
			echo "<meta http-equiv='refresh' content='1 url=register.php'>";
		}

		if (empty($email)) {
			echo "<script>alert('email belum diisi')</script>";
			echo "<meta http-equiv='refresh' content='1 url=register.php'>";
		}

		if (empty($pw)) {
			echo "<script>alert('password belum diisi')</script>";
			echo "<meta http-equiv='refresh' content='1 url=register.php'>";
		}

		if (empty($sekolah)) {
			echo "<script>alert('sekolah belum diisi')</script>";
			echo "<meta http-equiv='refresh' content='1 url=register.php'>";
		}

		if (!empty($nama) && !empty($email) && !empty($pw) && !empty($sekolah)) {
			$result = mysqli_query($koneksi, $query);
			header("location:success_register.php");
		}		

	}		
?>