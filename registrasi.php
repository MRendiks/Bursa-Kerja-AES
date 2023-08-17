<?php
require 'functions.php';

if( isset($_POST["register"])){


   


	if ( registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan');
				document.location.href = 'login.php';
			</script>";


	} else {
		echo mysqli_error($conn);
	}


}

// header("Location: login.php");
//           exit;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrasi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" type="text/css" href="css/registrasi.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('img/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="img/registrasibanner.png" alt="">
				</div>
				<form action="" method="post">
					<h3>Registrasi Akun</h3>
					
					<div class="form-wrapper">
						<input type="number" name="nisn" id="nisn" placeholder="Nomor Induk Siswa Nasional" class="form-control" maxlength="10" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-group">
						<input type="text" name="namadepan" id="namadepan" placeholder="Nama Depan" class="form-control" required>
						<input type="text" name="namabelakang" id="namabelakang"placeholder="Nama Belakang" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" id="email" placeholder="Email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" id="pembayaran" placeholder="Password" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password2" id="password2" placeholder="Ulangi Password" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="Key" name="key" id="key" placeholder="Kunci Keamanan Data" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit" name="register">Registrasi
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body>
</html>