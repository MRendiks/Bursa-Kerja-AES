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
        echo "
            <script>
                alert('FINAL ROUND.');
                document.location.href = 'final_round.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal');
                document.location.href = 'sembilan_round.php';
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
        <div class="panel-heading " style="background-color: #fff;">

          <h3 class="text-center">TAHAPAN PROSES ENKRIPSI ALGORITMA RIJNDAEL</h3>

                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal row">

                    <?php 
                    $text_hex = $_SESSION['text_hex'];
                    $kunci_hex = $_SESSION['kunci_hex'];
                    $state_1 = $hit->addRoundKey_str($text_hex, $kunci_hex);
                    $matrix  = $hit->addRoundKey($text_hex, $kunci_hex);
                    $state_cur = $hit->addRoundKey($text_hex, $kunci_hex);
                    for ($i=0; $i < 1; $i++) { 
                        if ($i == 0) {
                            
                            $state_2 = $hit->SubByte($matrix);
                            $state_2 = $hit->array_to_string($state_2);
                            
                            $state_3 = $hit->blockToMatrix($state_2);
                            $state_3_pre = $hit->shiftRows($state_3);
                            $state_3 = $hit->matrixToBlock($state_3_pre);
                            
                        
                            $state_4 = $hit->mixColumns($state_3_pre);
                            $state_4 = $hit->array_to_string2($state_4);

                            // $state_5_1 = $hit->addRoundKey($state_4, $kunci_hex);
                            $state_5 = $hit->addRoundKey_str_2($state_4, $kunci_hex);
                        }
                        elseif ($i >= 1 || $i <= 7) {
                            $state_2 = $hit->SubByte($matrix);
                            $state_2 = $hit->array_to_string($state_2);
                            
                            $state_3 = $hit->blockToMatrix($state_2);
                            $state_3_pre = $hit->shiftRows($state_3);
                            $state_3 = $hit->matrixToBlock($state_3_pre);
                            
                        
                            $state_4 = $hit->mixColumns($state_3_pre);
                            $state_4 = $hit->array_to_string2($state_4);

                            // $state_5_1 = $hit->addRoundKey($state_4, $kunci_hex);
                            $state_5 = $hit->addRoundKey_str_2($state_4, $kunci_hex);
                        }
                        elseif($i == 8) {
                            // $state_1 = $hit->addRoundKey_str($state_5_1, $kunci_hex);
                            // $matrix  = $hit->addRoundKey($state_5, $kunci_hex);
                            
                            $state_2 = $hit->SubByte($matrix);
                            $state_2 = $hit->array_to_string($state_2);
                            
                            $state_3 = $hit->blockToMatrix($state_2);
                            $state_3_pre = $hit->shiftRows($state_3);
                            $state_3 = $hit->matrixToBlock($state_3_pre);
                            
                        
                            $state_4 = $hit->mixColumns($state_3_pre);
                            $state_4 = $hit->array_to_string2($state_4);
                            
                            $state_5 = $hit->addRoundKey_str_2($state_4, $kunci_hex);
                        }
                        

                        $_SESSION['state_addroundkey_9'] = $state_5;
                        
                        
                        
                    ?>
                        <fieldset>
                            <legend class="text-center" style="color: #d6295d; "> ROUND <?=  $i+1; ?> </legend>
                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="subbytes" class="control-label col-sm-3"> SubBytes </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="subbytes" id="subbytes" class="form-control" value="<?= $state_2 ?>" readonly>
                                        </div>
                                        <div style="color: #d6295d;">
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($state_2);
                                        
                                        echo "<table>";
                                        for ($j = 0; $j < count($plaintext_matrix[0]); $j++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$j]} &nbsp;</td>";
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
                                    <label for="state" style="">Yang telah ditampilkan diatas adalah hasil dari tahapan SubBytes 
                                    round 1, proses ini melibatkan hasil dari AddRoundKey round 0 yang ditransformasikan 
                                    dengan tabel substitusi S-Box Rijndael.
                                    Cara pensubstitusiannya adalah dengan setiap digit heksadesimal pada AddRoundKey 0  di substitusi 
                                    dengan elemen dalam tabel S-Box yaitu merupakan hasil perpotongan sumbu X dan Y.</label>
                                </div>

                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="shiftrow" class="control-label col-sm-3"> ShiftRow </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="shiftrow" id="shiftrow" class="form-control" value="<?= $state_3 ?>" readonly>
                                        </div>
                                        <div style="color: #d6295d;">
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($state_3);
                                        
                                        echo "<table>";
                                        for ($j = 0; $j < count($plaintext_matrix[0]); $j++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$j]} &nbsp;</td>";
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
                                    <label for="state" style="">Yang telah ditampilkan diatas adalah hasil dari tahapan ShiftRow  
                                    round 1, proses ini melibatkan hasil dari SubBytes yang sudah dihasilkan pada tahap
                                    sebelumnya. Transformasi ShiftRows melakukan pergeseran secara wrapping pada 3 (tiga) baris terakhir dari array state.
                                    Jumlah pergeseran bergantung pada nilai baris r. Baris r=1 digeser sejauh 1 byte, baris r=2 digeser sejauh 2 byte,
                                    dan baris r=3 digeser sejauh 3 byte. Baris r=0 tidak digeser.</label>
                                </div>

                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="mixcolumns" class="control-label col-sm-3"> MixColumns </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="mixcolumns" id="mixcolumns" class="form-control" value="<?= print_r($state_4) ?>" readonly>
                                        </div>
                                        <div style="color: #d6295d;">
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($state_4);
                                        
                                        echo "<table>";
                                        for ($j = 0; $j < count($plaintext_matrix[0]); $j++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$j]} &nbsp;</td>";
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
                                    <label for="state" style="">Yang telah ditampilkan diatas adalah hasil dari tahapan MixColumns yaitu perkalian antara   
                                    matrix MixColumns dengan hasil dari ShiftRow. Transformasi MixColumns beroperasi pada state kolom perkolom dengan 
                                    memperlakukan setiap kolom sebagai 4 buah polinomial.</label>
                                </div>

                            <div class="panel-body">
                                <form action="" class="form-horizontal row">
                                    <div class="form-group">
                                        <label for="addroundkey" class="control-label col-sm-3"> Add RoundKey </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="addroundkey" id="addroundkey" class="form-control" value="<?= $state_5 ?>" readonly>
                                        </div>
                                        <div style="color: #d6295d;">
                                        <?php 
                                    
                                        $plaintext_matrix = $hit->blockToMatrix($state_5);
                                        
                                        echo "<table>";
                                        for ($j = 0; $j < count($plaintext_matrix[0]); $j++) {
                                            echo "<tr>";
                                            foreach ($plaintext_matrix as $row) {
                                                echo "<td>{$row[$j]} &nbsp;</td>";
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
                                    <label for="state" style="">Hasil dari Add RoundKey round 1 diatas diperoleh dari hasil XOR antara hasiil MixColumns
                                    pada proses sebelumnya dengan Round Key Schedule 1 yang sudah di hasilkan saat melakukan KeyExpansion Schedule.</label>
                                </div>

                        <?php }?>
                        </fieldset>
                     <ul>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <a href="inisialisasi_state.php" class="btn btn-color btn-lg btn-block"> < Sebelumnya </a>
                            </div>
                        </div>
                    </ul>

                    <ul>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <button type="submit" name="submit" class="btn btn-color btn-lg btn-block"> Selanjutnya > </button>
                            </div>
                        </div>
                    </ul>
                    </form>
</body>
</html>