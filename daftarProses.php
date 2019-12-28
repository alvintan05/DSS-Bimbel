<?php  
include("koneksi.php");
// session_start();
$nama = $_POST["nama"];
$email = $_POST["email"];
$pw = $_POST["pw"];
$sekolah = $_POST["sekolah"];

// $_SESSION["nama"] = $nama;
// $_SESSION["email"] = $email;
// $_SESSION["uname"] = $uname;
// $_SESSION["pw"] = $pw;
// $_SESSION["noIdentitas"] = $noIdentitas;

$sql = "INSERT INTO table_member VALUES ('', '$nama', '$email', '$uname', '$pw', '$noIdentitas')";
$query = mysqli_query($koneksi, $sql);

?>