<?php
session_start();
require_once ('algorithm/hitung_manual.php');

// $aes = new rijndael;
$hit = new Hitung_Manual;

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"]) ) {
            
    
    if ( ($_POST) > 0 ) {

        

        echo "
            <script>
                document.location.href = 'sembilan_round.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal');
                document.location.href = 'inisialisasi_state.php';
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
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse">
                            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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

          <h3 class="text-center">TAHAPAN PROSES ENKRIPSI ALGORITMA RIJNDAEL</h4>

                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal row">
                        <fieldset>
                            <legend class="text-center" style="color: #d6295d; "> State dan Inisialisasi </legend>
                            <div class="panel-body">
                                    <form action="" class="form-horizontal row">
                                <div class="form-group">
                                    <label for="state" class="control-label col-sm-3">Plaintext / State </label>
                                    
                                    <div class="col-sm-5">
                                        <input type="text" name="state" id="state" class="form-control" value="<?= $_SESSION['text_hex'] ?>" readonly>
                                    </div>
                                    <div style="color: #d6295d;">
                                    <?php 

                                    $plaintext_matrix = $hit->blockToMatrix($_SESSION['text_hex']);

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

                            <div class="panel-body">
                                    <form action="" class="form-horizontal row">
                                <div class="form-group">
                                    <label for="inisialisasi" class="control-label col-sm-3">Inisialisasi / Round 0</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="inisialisasi" id="inisialisasi" class="form-control" value="<?= $_SESSION['kunci_hex'] ?>" readonly>
                                    </div>
                                    <div style="color: #d6295d;">
                                    <?php 

                                    $plaintext_matrix = $hit->blockToMatrix($_SESSION['kunci_hex']);

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

                                <form action="" class="form-horizontal row">
                                <div>
                                    <label for="state" style="">Langkah pertama yang dilakukan adalah mengubah Plaintext dan Kunci yang sudah di inputkan di halaman 
                                    sebelumnya di proses / diubah bentuknya ke dalam bilangan Heksadesimal seperti yang tertampil di atas.</label>
                                </div>

                            <div class="panel-body">
                                    <form action="" class="form-horizontal row">
                                <div class="form-group">
                                    <label for="roundkey" class="control-label col-sm-3"> Add RoundKey 0 </label>
                                    <div class="col-sm-5">
                                    <input type="text" name="roundkey" id="roundkey" class="form-control" value="<?= $_SESSION['state_addroundkey_1'] ?>" readonly>
                                    
                                    </div>
                                    <div style="color: #d6295d;">
                                    <?php 

                                    $plaintext_matrix = $hit->blockToMatrix($_SESSION['state_addroundkey_1']);
                                    
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
                                    <label for="state" style="">Tampilan di atas adalah hasil Transformasi operasi XOR terhadap round key / round 0 dengan 
                                    array state, dan hasilnya disimpan di array state.</label>
                                </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <button type="submit" name="submit" class="btn btn-color btn-lg btn-block"> Selanjutnya </button>
                            </div>
                        </div>
                    </form>
</body>
</html>