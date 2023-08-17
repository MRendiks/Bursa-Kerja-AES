<?php
session_start();
require 'functions.php';
//cek cookie
// if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
//       $id = $_COOKIE['id'];
//       $key = $_COOKIE['key'];


//       //ambil username berdasar id
//       $result = mysqli_query($conn, "SELECT username FROM user WHERE id_user = $id");
//       $row = mysqli_fetch_assoc($result);

//       //cek cookie dan username
//       if ($key) {
//         // code...
//       }
// }

if ( isset($_SESSION["login"])) {
      header("Location: home.php");
      exit;
}

if (isset($_POST["login"])) {
  
    $username  = $_POST["username"];
    $password  = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    //cek username
    if(mysqli_num_rows($result) === 1) {

      //cek password
      $row = mysqli_fetch_assoc ($result);
      if (password_verify($password, $row["password"])) {
          //set session
          $_SESSION["login"]    = true;
          $_SESSION['id_user']  = $row ['id_user'];
          $_SESSION['username'] = $username;
          $_SESSION['namadepan']= $row ['namadepan'];
 
          //cek remember
          // if ( isset($_POST['remember'])) {
          //   // buat cookie
          //   setcookie('id', $row['id_user'], time()+60);
          //   setcookie('key', hash('sha256', $row['username']), time()+60);
          // }


          header("Location: home.php");
          exit;
      }
    }

    $error = true;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-registration-form-1.jpg');">
			<div class="wrap-login100">

				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i><img src="img/logo.png"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Bursa Kerja Khusus (BKK)
					</span>

					<?php if (isset($error)) : ?>
					<p style="color: #ff0391; font-family: Poppins-Regular; font-style: italic;">username atau password salah, coba lagi!</p>
					<?php endif; ?>
					<br>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input id="password" class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a style="color: #fff;">
							Belum punya Akun? 
						</a>
						<a class="txt2" href="registrasi.php">
							Registrasi.
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>