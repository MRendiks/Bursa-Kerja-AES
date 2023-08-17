<?php
session_start();
require_once ('algorithm/rijndael.php');
require_once ('algorithm/hitung_manual.php');

$aes = new rijndael;
$hit = new Hitung_Manual;

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"]) ) {
            
    
    if ( ($_POST) > 0 ) {
        $text = $_POST['text'];
        $kunci = $_POST['kunci'];
        $text_awal = $text;
        $n1 = strlen($text_awal);
        $kunci_awal = $kunci;
        $n2 = strlen($kunci_awal);
        

        // if ($n1 < 16) {
        //     for ($i=0; $i < (16 - $n1) ; $i++) { 
        //         $text .= $text_awal[$i];  
        //     }
        // }

        if ($n1 < 16) {
            $paddingLength = 16 - $n1;
            for ($i = 0; $i < $paddingLength; $i++) {
                $text .= $text_awal[$i % $n1];
            }
        }elseif ($n1 > 16) {
            $text = '';
            for ($i=0; $i < 16; $i++) { 
                $text .= $text_awal[$i];
            }
        }

        // if (strlen($kunci_awal) < 16) {
        //     for ($i=0; $i < (16 - $n2) ; $i++) { 
        //         $kunci .= $kunci_awal[$i];  
        //     }
        // }

        if (strlen($kunci_awal) < 16) {
            $paddingLength = 16 - strlen($kunci_awal);
            for ($i = 0; $i < $paddingLength; $i++) {
                $kunci .= $kunci_awal[$i % strlen($kunci_awal)];
            }
        }elseif (strlen($kunci_awal) > 16) {
            $kunci = '';
            for ($i=0; $i < 16; $i++) { 
                $kunci .= $kunci_awal[$i];
            }
        }

        
        $text_hex = bin2hex($text);
        $kunci_hex = bin2hex($kunci);


        $_SESSION['text_hex'] = $text_hex; 
        $_SESSION['kunci_hex'] = $kunci_hex;
        $_SESSION['kunci'] = $kunci;
        $_SESSION['text'] = $text;

        $state_1 = $hit->addRoundKey_str($text_hex, $kunci_hex);
        $matrix = $hit->addRoundKey($text_hex, $kunci_hex);
        
        $state_2 = $hit->SubByte($matrix);
        $state_2_final = $hit->array_to_string($state_2);
        
        $state_3 = $hit->shiftRows($state_2);
    
        // $state_4 = $hit->mixColumns($state_3);
        // $state_5 = $hit->addRoundKey_str($state_4, $kunci_hex);
        

    

        $_SESSION['state_addroundkey_1'] = $state_1;
        $_SESSION['state_subbytes_1'] = $state_2;
        $_SESSION['state_shiftrows_1'] = $state_3;
        // $_SESSION['state_mixcolumns_1'] = $state_4;
        // $_SESSION['state_addroundkey_2'] = $state_5;
        

        echo "
            <script>
                alert('data berhasil ditambahkan.');
                document.location.href = 'inisialisasi_state.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal');
                document.location.href = 'perhitungan.php';
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
        .navbar-inverse .navbar-nav>li>a:hover {
          color: gold;
        }
        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover{
          color: gold;
            padding-bottom: 17px;
        }
        .btn-color {
            background-color: #0B5394;
            color: #fff;
        }
        .btn-color:hover {
            background-color: #d6295d;
            color: #C0AA1A;
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
        <div class="panel-heading ">

          <h3 class="text-center">TAHAPAN PROSES ENKRIPSI ALGORITMA RIJNDAEL</h4>

                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal row">
                        <fieldset>
                            <legend class="text-center">Input Text dan Kunci</legend>
                            <div class="panel-body">
                                    <form action="" class="form-horizontal row">
                                <div class="form-group">
                                    <label for="text" class="control-label col-sm-3">Text :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="text" id="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body">
                                    <form action="" class="form-horizontal row">
                                <div class="form-group">
                                    <label for="kunci" class="control-label col-sm-3">Kunci :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="kunci" id="kunci" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <button type="submit" name="submit" class="btn btn-color btn-lg btn-block"> Submit </button>
                            </div>
                        </div>
                    </form>
</body>
</html>