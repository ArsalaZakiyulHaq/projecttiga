<?php
	session_start();
	if (isset($_SESSION['login'])) {
		
		// $connect mysqli_connect("localhost", "root", "", "pondok_tiga");
		include 'koneksi.php';
		
		$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? md5($_POST['password']) : '';
		
		if (!empty($nama) && !empty($email) && !empty($password)) {
			
			mysqli_query($connect, "INSERT INTO user VALUES (null, '$nama', '$email', '$password')");
			
			header("location:../user.php");
			
		} else {
			echo "Silahkan Lengkapi Data <a href='../user_tambah.php'>User</a>";
		}
	} else {
		echo "Please <a href='../index.php'>Login</a> First.";
	}
?>