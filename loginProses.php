<?php
include "koneksi.php";

$email = $_POST['email'];
$pw = $_POST['pw'];

if (empty($email)){
	echo "<script>alert('email belum diisi')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
} else if (empty($pw)){
	echo "<script>alert('Password belum diisi')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}else{
	session_start();
	$login = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email' AND password='$pw'");
	if (mysqli_num_rows($login) > 0){
		$_SESSION['email'] = $email;
		header("location:home.php");
	}else{
		echo "<script>alert('Username atau Password salah')</script>";
		echo "<meta http-equiv='refresh' content='1 url=login.php'>";
	}
}
?>
