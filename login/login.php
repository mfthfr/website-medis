<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Login Form</h2>
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" placeholder="Masukan username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Masukan password" required>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>

<?php
// Koneksi ke database
include "../koneksi/koneksi.php";

	if(isset($_POST['username']) && isset($_POST['password'])){
		// Mendapatkan data dari form login
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Melakukan query untuk mencari user dengan username dan password yang sesuai
		$query_user = "SELECT * FROM tb_users WHERE username='$username' AND password='$password'";
		$result_user = mysqli_query($conn, $query_user);
		
		// Melakukan query untuk mencari admin dengan username dan password yang sesuai
		$query_admin = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
		$result_admin = mysqli_query($conn, $query_admin);
		
		// Memeriksa apakah login sebagai user
		if (mysqli_num_rows($result_user) > 0) {
			echo "
				<script>
				alert('Login Berhasil');
				window.location = '../user/dashboard.php';
				</script>
				";
				die;
			// Lakukan tindakan khusus untuk user
		} 
		// Memeriksa apakah login sebagai admin
		else if (mysqli_num_rows($result_admin) > 0) {
			echo "
				<script>
				alert('Login Berhasil');
				window.location = '../admin/dashboard.php';
				</script>
				";
				die;
			// Lakukan tindakan khusus untuk admin
		} 
		// Jika tidak ditemukan user atau admin dengan kombinasi username dan password yang benar
		else {
			echo "
				<script>
				alert('Username atau password salah!!!');
				window.location = 'login.php';
				</script>
				";
				die;
		}
	}
?>

