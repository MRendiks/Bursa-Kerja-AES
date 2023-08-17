<?php 
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$lowongan = query("SELECT * FROM lowongan");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - Lowongan</title>
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
            width: 50px ;
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
<!-- endbuild -->
<meta name="csrf-token" content="0GYgeYUWDxDEhhvtGEvesVrHoTTw179pSWPC7laT">
<meta name="google-site-verification" content="">

<!-- header -->
<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <img src="img/logofix.png"  class="logo">
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
                                    <li><a href="kelola_lowongan.php">Lowongan</a></li>
                                    <li><a href="kelola_detail.php">Detail Lowongan</a></li>
                                    <li><a href="kelola_validasi.php">Validasi Pendaftaran</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Alumni</a></li>
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
          <h3 class="text-center">Kelola Daftar Lowongan Pekerjaan</h4>
            <tr>
                <th><a href="input_lowongan.php" class="add" title="Tambah Data Disini!" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a></th>
                <p style="font-size: 12px; font-style: italic; color: red;">TAMBAH DATA LOWONGAN PEKERJAAN!</p>
            </tr>
      <div class="row">
        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                  <tr>
                    <th>No.</th>
                    <th>Logo</th>
                    <th>Nama Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Lokasi</th>
                    <th>Website</th>
                    <th>Deskripsi</th>
                    <th>    KELOLA    </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach  ( $lowongan as $row) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["gambar"]; ?></td>
                  <td><?= $row["perusahaan"]; ?></td>
                  <td><?= $row["lowongan"]; ?></td>
                  <td><?= $row["lokasi"]; ?></td>
                  <td><?= $row["web"]; ?></td>
                  <td><?= $row["deskripsi"]; ?></td>
                  <td>
                    <a href="edit_lowongan.php?id_lowongan=<?= $row["id_lowongan"]; ?>" class="edit" title="Edit Data Lowongan" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <a href="hapus.php?id_lowongan=<?= $row["id_lowongan"]; ?>" class="delete" title="Hapus Data Lowongan" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                  </td>
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
                            <p><!-- ©rezhawahyupradana --> | KERJA PRAKTIK 2022</p>
                          </div>
                        </div>
                      </div>
                  </footer>
            </div>

</body>
</html>