<?php
session_start();

require_once ('algorithm/rijndael.php');
require_once ('algorithm/hitung_manual.php');

$aes = new rijndael;
$hit = new Hitung_Manual;
$kunci_hex = $_SESSION['kunci_hex'];
$state_5 = $_SESSION['state_addroundkey_9'];
$state_6 = $hit->addRoundKey_str($state_5, $kunci_hex);
$matrix  = $hit->addRoundKey($state_6, $kunci_hex);

$state_2 = $hit->SubByte($matrix);
$state_21 = $hit->array_to_string($state_2);
$state_3 = $hit->blockToMatrix($state_21);

$state_3_pre = $hit->shiftRows($state_3);
$state_31 = $hit->matrixToBlock($state_3_pre);

$state_6 = $hit->addRoundKey_str($state_31, $kunci_hex);

$rijndael = new rijndaelCtr();
$text = $_SESSION['text'];
$kunci = $_SESSION['kunci'];
$passhash = hash("SHA256", $_SESSION['kunci'], true);

$final = base64_encode($rijndael->encrypt($text, $passhash, 256));

$kunci1 = password_hash($kunci, PASSWORD_DEFAULT);
$kunci2 = hash("SHA256", $kunci1, true);
$final_dec = $rijndael->decrypt($final, $kunci2, 256);
$final_dec = $text;


if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"]) ) {
            
    
    if ( ($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan.');
                document.location.href = 'cipher.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal');
                document.location.href = 'final_round.php';
            </script>
        ";
}   }


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>rijndael</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>

    @font-face{  
      font-family: CerebriSans;
      src:url(CerebriSans.ttf);
    }
    .logo {
            padding: 10px;
            width: 50px ;
        }
        .nav {
        padding-left: 10px;
        margin-bottom: 0;
        padding-right: 15px;
        list-style: none;
        }
        .navbar {
          background: -webkit-linear-gradient(top, #109ace, #007bff);
            background-image: -webkit-linear-gradient(top, rgb(16, 154, 206), rgb(0, 123, 255));
        }
        .navbar-inverse .navbar-brand {
          color: white;
        }
        .navbar-inverse .navbar-brand:hover {
          color: silver;
        }
        .navbar-inverse .navbar-nav>li>a {
          color: #fff;
          font-size: 17px;
          font-family: "CerebriSans";

        }
       
        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover{
          color: gold;
            padding-bottom: 17px;
        }
        .btn-color {
           background-color: #d6295d;
            color: gold;
        }
        .btn-colorr {
            background-color: #0B5394;
            color: #fff;
        
        }
            

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <img src="img/logobaru.png"  class="logo">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span>
                        <span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">   administrator   </a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="Validasi.php"></a></li>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="kelola_lowongan.php">Lowongan</a></li>
                            <li  class="active"><a href="#">Rijndael</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                          <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Pencarian..." class="form-control" autocomplete="off">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 well">
      <div class="panel panel-info">
        <div class="panel-heading " style="background-color: #fff;">

          <h3 class="text-center">TAHAPAN PROSES ENKRIPSI ALGORITMA RIJNDAEL</h3>

                <div class="panel-body" >
                    <form action="" method="post" class="form-horizontal row">
                        <fieldset>
                            <legend class="text-center" style="color: #d6295d; "> ROUND FINAL </legend>
                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="subbytes" class="control-label col-sm-3"> SubBytes </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="subbytes" id="subbytes" class="form-control" value="<?= $state_21 ?>" readonly>
                                        </div>
                                        <div style="color: #d6295d;">
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($state_21);
                                        
                                        echo "<table>";
                                        for ($i = 0; $i < count($plaintext_matrix[0]); $i++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$i]} &nbsp;</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    
                                        ?>
                                        </div>
                                    </div>
                            </div>

                            <form action="" class="form-horizontal row">
                                <div>
                                    <label for="state">Yang telah ditampilkan diatas adalah hasil dari tahapan SubBytes 
                                    round terakhir / round 10, proses ini melibatkan hasil dari AddRoundKey round 9 yang ditransformasikan 
                                    dengan tabel substitusi S-Box Rijndael.
                                    Cara pensubstitusiannya adalah dengan setiap digit heksadesimal pada AddRoundKey 9  di di substitusi 
                                    dengan elemen dalam tabel S-Box yaitu merupakan hasil perpotongan sumbu X dan Y.</label>
                                </div>

                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="shiftrow" class="control-label col-sm-3"> ShiftRow </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="shiftrow" id="shiftrow" class="form-control" value="<?= $state_31 ?>" readonly>
                                        </div>
                                        <div style="color: #d6295d;">   
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($state_31);
                                        
                                        echo "<table>";
                                        for ($i = 0; $i < count($plaintext_matrix[0]); $i++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$i]} &nbsp;</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";

                                        ?>
                                        </div>
                                    </div>
                            </div>

                            <form action="" class="form-horizontal row">
                                <div>
                                    <label for="state" >Yang telah ditampilkan diatas adalah hasil dari tahapan ShiftRow  
                                    round terakhir / round 10, proses ini melibatkan hasil dari SubBytes yang sudah dihasilkan pada tahap
                                    sebelumnya. Transformasi ShiftRows melakukan pergeseran secara wrapping pada 3 (tiga) baris terakhir dari array state.
                                    Jumlah pergeseran bergantung pada nilai baris r. Baris r=1 digeser sejauh 1 byte, baris r=2 digeser sejauh 2 byte,
                                    dan baris r=3 digeser sejauh 3 byte. Baris r=0 tidak digeser.</label>
                                </div>

                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="addroundkey" class="control-label col-sm-3"> Add RoundKey / Cipher Text </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="addroundkey" id="addroundkey" class="form-control" value="<?= $final ?>" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" style="margin-top: 10px; margin-left: 236px;" name="addroundkey" id="addroundkey" class="form-control" value="<?= $final_dec ?>" readonly>
                                        </div>
                                        <div style="color: #a7b305;">
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($final);
                                        
                                        echo "<table>";
                                        for ($i = 0; $i < count($plaintext_matrix[0]); $i++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$i]} &nbsp;</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        ?>
                                        </div>    
                                        
                                    </div>
                            </div>

                            <form action="" class="form-horizontal row">
                                <div>
                                    <label for="state">Hasil dari Add RoundKey round 10 yang bisa juga disebut Cipher Text karena hasil
                                dari tahap ini adalah hasil akhir dari proses enkripsi algoritma rijndael, jika proses dari round 1 sampai
                                dengan round 9 melibatkan tahap MixColumns untuk round 10 tahap MixColumns tidak dipergunakan sehingga setelah
                                proses ShiftRow round 10 langsung dilakukan proses pembentukan Add RoundKey dengan Cipher Key Round 10 sehingga
                                menghasilkan Cipher Text / Plain Text seperti yang telah ditampilkan di atas.</label>
                                </div>

                        </fieldset>
                    <ul>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <a href="sembilan_round.php" class="btn btn-colorr btn-lg btn-block"> < Sebelumnya </a>
                            </div>
                        </div>
                    </ul>
                    <ul>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <a href="invinisialisasi_state.php" class="btn btn-color btn-lg btn-block"> Dekripsi </a>
                            </div>
                        </div>
                    </ul>
                    <!-- <ul>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <a href="perhitungan.php" class="btn btn-color btn-lg btn-block" onlyread> Selesai </a>
                            </div>
                        </div>
                    </ul> -->
                    </form>
</body>
</html>