<?php
include 'algoritma/Crypt/Rijndael.php';
$conn = mysqli_connect("localhost", "root", "", "bursakerja");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}



function registrasi($data) {
	global $conn;

	$nisn = $_POST["nisn"];
	$namadepan = ($data["namadepan"]);
	$namabelakang = ($data["namabelakang"]);
	$email = ($data["email"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$key = strtolower(stripslashes($data["key"]));

	$resultt = mysqli_query($conn, "SELECT * FROM nisn WHERE nisn = '$nisn'");

	if(mysqli_num_rows($resultt) === 1) {

	//cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!')
			</script>";
			return false;
	}


	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!')
			</script>";
			return false;
	}
	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan userbaru ke database

	$key = 'nindynbbn';
	$rijndael = new Crypt_Rijndael();
	$rijndael->setKey($key);

	
	$chipper_email = $rijndael->encrypt($email);

	mysqli_query($conn, "INSERT INTO user 
		VALUES 
		('', '$namadepan', '$namabelakang', '$chipper_email', '$username', '$password', '$key', '$nisn' )");

	return mysqli_affected_rows($conn);

}

 echo "<script>
				alert('nisn tidak terdaftar, silahkan hubungi pihak sekolah!');
			</script>";

}


function input_lowongan($data) {
	global $conn;

	$gambar = $data["gambar"];
	$perusahaan = $data["perusahaan"];
	$lowongan = $data["lowongan"];
	$lokasi = $data["lokasi"];
	$web = $data["web"];
	$deskripsi = $data["deskripsi"];
	
	

	$query = "INSERT INTO lowongan
				VALUES 
				('', '$gambar', '$perusahaan', '$lowongan', '$lokasi', '$web', '$deskripsi')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function edit_lowongan($data) {
	global $conn;

	$id = $data["id"];
	// $gambar = $data["gambar"];
	$perusahaan = $data["perusahaan"];
	$lowongan = $data["lowongan"];
	$lokasi = $data["lokasi"];
	$web = $data["web"];
	$deskripsi = $data["deskripsi"];
	
	// '$gambar',

	$query = "UPDATE lowongan SET
				perusahaan	= '$perusahaan', 
				lowongan 	= '$lowongan',
				lokasi 		= '$lokasi',
				web 		= '$web',
				deskripsi 	= '$deskripsi'
		 WHERE id_lowongan	=  $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM lowongan WHERE id_lowongan = $id");
	return mysqli_affected_rows($conn);
}

function hapuspendaftar($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pendaftaran WHERE id_pendaftaran = $id");
	return mysqli_affected_rows($conn);
}

function pendaftaran($data) {
	global $conn;

	// get status dan password
	$sql_enc = mysqli_query($conn, "SELECT * FROM user");
	$enc = $sql_enc->fetch_assoc();
	$status = $enc['enc'];
	
	// rijndael proses
	include "algorithm/rijndael.php";
	$rijndael = new rijndaelCtr();
	$password = $enc['key'];
	$passhash = hash("SHA256", $password, true);


	$id_user  = $_SESSION['id_user'];
	$lowongan = $data["lowongan"];
	$status_pendaftar 	= base64_encode($rijndael->encrypt($data["status_pendaftar"], $passhash, 256));
	$jurusan 			= base64_encode($rijndael->encrypt($data["jurusan"], $passhash, 256));
	$tempat_lahir		= base64_encode($rijndael->encrypt($data["tempat_lahir"], $passhash, 256));
	$hari 				= base64_encode($rijndael->encrypt($data["hari"], $passhash, 256));
	$bulan 				= base64_encode($rijndael->encrypt($data["bulan"], $passhash, 256));
	$tahun 				= base64_encode($rijndael->encrypt($data["tahun"], $passhash, 256));
	$jk 				= base64_encode($rijndael->encrypt($data["jk"], $passhash, 256));
	$tb 				= base64_encode($rijndael->encrypt($data["tb"], $passhash, 256));
	$bb 				= base64_encode($rijndael->encrypt($data["bb"], $passhash, 256));
	$alamat 			= base64_encode($rijndael->encrypt($data["alamat"], $passhash, 256));
	$no_telp 			= base64_encode($rijndael->encrypt($data["no_telp"], $passhash, 256));
	$tahun_lulus 		= base64_encode($rijndael->encrypt($data["tahun_lulus"], $passhash, 256));
	$nilai_ratarata 	= $data["nilai_ratarata"];
	$tgl_daftar 		= $data["tgl_daftar"];


	

	$query = "INSERT INTO pendaftaran
				VALUES 
				('', '$id_user', '$lowongan', '$status_pendaftar', '$jurusan', '$tempat_lahir', 
					'$hari', '$bulan', '$tahun' , '$jk', '$tb', '$bb', '$alamat',
					'$no_telp', '$tahun_lulus', '$nilai_ratarata',  NOW() )
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


?>