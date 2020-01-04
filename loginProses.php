<?php
include "koneksi.php";

session_start();

if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$pw = $_POST['pw'];

	if (empty($email)){
		echo "<script>alert('email belum diisi')</script>";
		echo "<meta http-equiv='refresh' content='1 url=login.php'>";
	} else if (empty($pw)){
		echo "<script>alert('Password belum diisi')</script>";
		echo "<meta http-equiv='refresh' content='1 url=login.php'>";
	}

	if (!empty($email) && !empty($pw)){	
		$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email' AND password='$pw'");

		$result = mysqli_num_rows($login);

		if ($result > 0){
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $pw;

			$row = mysqli_fetch_array($login);

			$_SESSION['user_id'] = $row['id_user'];
			
			//header("location:home.php");
			echo "<script>window.location.assign(\"home.php\");</script>";			
		}else{
			echo "<script>alert('Username atau Password salah')</script>";
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
		}
	}
}	
?>
