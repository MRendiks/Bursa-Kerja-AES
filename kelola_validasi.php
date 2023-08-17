<?php 
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$pendaftaran = query("SELECT * FROM user, pendaftaran 
                        WHERE user.id_user = pendaftaran.id_user 
                        ORDER BY id_pendaftaran DESC");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - Validasi</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="css/validasi.css">
      <link rel="stylesheet" href="css/detail.css">
  
    <style>
      @font-face{
      
      font-family: CerebriSans;
      src:url(CerebriSans.ttf);
    }
    .logo {
            padding: 10px;
            width: 250px ;
        }
        .nav {
        padding-left: 10px;
        margin-bottom: 0;
        padding-right: 15px;
        list-style: none;
        }
        .navbar {
            background: -webkit-linear-gradient(top, #f2ff00, #007bff);
            background-image: -webkit-linear-gradient(top, rgb(247 188 47), rgb(104 103 173));
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
        .button {
            background-color: #007bff;
            border: 0px;
            text-align: center;
            text-decoration-style: solid;
        }
        .options {
            margin: 100px 750px;
            padding: 20px;
        }
        .btn-color {
            background-color: #d6295d;
            color: #fff;
        }
        .btn-colorr {
            background-color: #d6295d;
            color: #fff;
            text-align: center;
        }

    </style>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="keywords" content="Portal Lowongan Masa Depan Anak Bangsa">

<!-- build:css -->
<meta name="csrf-token" content="0GYgeYUWDxDEhhvtGEvesVrHoTTw179pSWPC7laT">
<meta name="google-site-verification" content="">

<!-- header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <img src="img/logobaru.png"  class="logo">
                   <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">   ADMIN   </a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Kelola Data <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="kelola_identitas.php">Identitas</a></li>
                                    <li><a href="kelola_lowongan">Lowongan</a></li>
                                    <li><a href="kelola_detail">Detail Lowongan</a></li>
                                    <li><a href="kelola_validasi">Validasi Pendaftaran</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Secure <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="kelola_identitas.php">Enkripsi</a></li>
                                    <li><a href="kelola_lowongan">Dekripsi</a></li>
                                </ul>
                            </li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                        

                        <ul class="nav navbar-nav navbar-right">
                          <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <li><a href="logout.php" class="btnn btn-colorr btn-lg btn-block">LOG OUT</a></li>
                                        <!-- <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Pencarian..." class="form-control" autocomplete="off">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div> -->
                                    </div>
                                </form>
                            </li>
                        </ul>                            
                                <!-- <ul class="dropdown-menu">
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Sign Up</a></li>
                                </ul> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="panel panel-info">
        <div class="panel-heading ">
          <h3 class="text-center">Kelola Validasi</h4>
    
      <div class="row">
        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                <tr>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Lowongan di Daftar</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Tahun Lulus</th>
                    <th>Nilai UAN</th>
                    <th> Status Pendaftaran </th>
                    <th> KELOLA </th>
                </tr>
              </thead>

              <?php 
                // get status dan password
                $sql_enc = mysqli_query($conn, "SELECT * FROM user");
                $enc = $sql_enc->fetch_assoc();
                $status = $enc['enc'];
  
                // rijndael proses
                include "algorithm/rijndael.php";
                $rijndael = new rijndaelCtr();
                $password = $enc['password'];
                $passhash = hash("SHA256", $password, true);
              ?>

              <tbody>
                <?php $i = 1; ?>
                <?php foreach  ( $pendaftaran as $row) :

                $jurusan          = $rijndael->decrypt(base64_decode($row["jurusan"]), $passhash, 256);
                $tempat_lahir     = $rijndael->decrypt(base64_decode($row["tempat_lahir"]), $passhash, 256);
                $tgl_lahir        = $rijndael->decrypt(base64_decode($row["tgl_lahir"]), $passhash, 256);
                $bulan_lahir      = $rijndael->decrypt(base64_decode($row["bulan_lahir"]), $passhash, 256);
                $tahun_lahir      = $rijndael->decrypt(base64_decode($row["tahun_lahir"]), $passhash, 256);
                $jk               = $rijndael->decrypt(base64_decode($row["jk"]), $passhash, 256);
                $tb               = $rijndael->decrypt(base64_decode($row["tb"]), $passhash, 256);
                $bb               = $rijndael->decrypt(base64_decode($row["bb"]), $passhash, 256);
                $alamat           = $rijndael->decrypt(base64_decode($row["alamat"]), $passhash, 256);
                $no_telp          = $rijndael->decrypt(base64_decode($row["no_telp"]), $passhash, 256);
                $status_pendaftar = $rijndael->decrypt(base64_decode($row["status_pendaftar"]), $passhash, 256);
                $tahun_lulus      = $rijndael->decrypt(base64_decode($row["tahun_lulus"]), $passhash, 256);

                ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["tanggal_daftar"]; ?></td>
                  <td><?= $row["id_lowongan"]; ?></td>
                  <td><?= $row["namadepan"]; ?></td>
                  <td><?= $row["email"]; ?></td>
                  <td><?= $jurusan;?></td>
                  <td><?= $tempat_lahir ; ?></td>
                  <td><?= $tgl_lahir, $bulan_lahir, $tahun_lahir ; ?></td>
                  <td><?= $jk ; ?></td>
                  <td><?= $tb ; ?> CM</td>
                  <td><?= $bb ; ?> KG</td>
                  <td><?= $alamat ; ?></td>
                  <td>0<?= $no_telp ; ?></td>
                  <td><?= $status_pendaftar ; ?></td>
                  <td><?= $tahun_lulus ; ?></td>
                  <td><?= $row["nilai_ratarata"]; ?></td>
                  <td></td>
                  <td><a href="hapus_pendaftar.php?id_pendaftaran=
                    <?php echo $row["id_pendaftaran"]; ?>" 
                    class="delete" title="Hapus Data Pendaftar" data-toggle="tooltip">
                    <i class="material-icons">&#xE872;</i></a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

                <div class="pagination-wrapper">
                    <ul class="pagination">
                      <ul class="pagination">   
                            <li class="page-item active"><span class="page-link">1</span></li>

                                <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                                <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
                                <li class="page-item"><a class="page-link" href="?page=4">4</a></li>
                                <li class="page-item"><a class="page-link" href="?page=5">5</a></li>
                                                                                                    
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item"><a class="page-link" href="?page=23">18</a></li>
                            <li class="page-item"><a class="page-link" href="?page=2" rel="next">Next</a></li>
                      </ul>
                    </ul>
                </div>
            
            <div class="col-lg-2 col-lg-offset-5">
                  <footer class="footer">
                    <div class="footer-inner">
                      <div class="brand-developers">
                       <div class="container">
                        <img src="img/backgroud.png" width="300">
                        <div class="title">
                          BKK SMK NEGERI 1 TEPUS
                        </div> 
                        <div class="copyright">
                          <div class="container">
                            <p><!-- ©rezhawahyupradana -->   TUGAS AKHIR INFORMATIKA UTY 2023</p>
                          </div>
                        </div>
                      </div>
                  </footer>
            </div>
</body>
</html>