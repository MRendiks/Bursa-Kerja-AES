<?php
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id_user  = $_SESSION['id_user'];
$username = $_SESSION['username'];

$pendaftaran = query("SELECT * FROM pendaftaran WHERE id_user = '$id_user' ORDER BY id_pendaftaran DESC");

// while( $daftar = mysqly_fetch_assoc($result) ) {
//   var_dump($daftar);
// }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Validasi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/validasi.css">
  <link rel="stylesheet" href="css/lowongan.css">
  <!-- <link rel="stylesheet" href="css/detail.css"> -->

  
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
        .heading-section {
          text-align: center;
        }
    </style>

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
                        <a href="#" class="navbar-brand">   BKK   </a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="beranda.php">Home</a></li>
                            <li><a href="lowongan.php">Lowongan</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Agenda <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">About One</a></li>
                                    <li><a href="#">About Two</a></li>
                                    <li><a href="#">About Three</a></li>
                                    <li><a href="#">About Four</a></li>
                                    <li><a href="#">About Five</a></li>
                                    <li><a href="#">About Six</a></li>
                                </ul>
                            </li>
                            <li><a href="lowongan.php">Pendaftaran</a></li>
                            <li  class="active"><a href="#">Validasi</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="logout.php">FAQ</a></li>
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
                            <!-- <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Sign Up <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Sign Up</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>  

</head>
<body>
      <div class="panel panel-info">
        <div class="panel-heading ">
          <h3 class="text-center">Halaman Validasi</h4>
                  
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
                    <th>Username</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Tahun Lulus</th>
                    <th>Status Pendaftaran</th>
                </tr>
              </thead>
              <?php 
                // get status dan password
                $sql_enc = mysqli_query($conn, "SELECT * FROM user");
                $enc = $sql_enc->fetch_assoc();
                
  
                // rijndael proses
                include "algorithm/rijndael.php";
                $rijndael = new rijndaelCtr();
                $password = $enc['key'];
                $passhash = hash("SHA256", $password, true);
              ?>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach  ( $pendaftaran as $row ) : 

                $jurusan          = $rijndael->decrypt(base64_decode($row["jurusan"]), $passhash, 256);
                $status_pendaftar = $rijndael->decrypt(base64_decode($row["status_pendaftar"]), $passhash, 256);
                $tahun_lulus      = $rijndael->decrypt(base64_decode($row["tahun_lulus"]), $passhash, 256);

                ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["tanggal_daftar"]; ?></td>
                  <td><?= $row["id_lowongan"]; ?></td>
                  <td><?= $_SESSION['username']; ?></td>
                  <td><?= $jurusan; ?></td>
                  <td><?= $status_pendaftar; ?></td>
                  <td><?= $tahun_lulus; ?></td>
                  <td></td>
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
</body>
              <footer>
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
              </footer>
</html>