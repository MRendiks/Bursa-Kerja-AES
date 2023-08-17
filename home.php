<?php 
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id_user  = $_SESSION['id_user'];
$username = $_SESSION['username'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lowongan.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Portal Lowongan Masa Depan Anak Bangsa">
    <meta name="csrf-token" content="0GYgeYUWDxDEhhvtGEvesVrHoTTw179pSWPC7laT">
    <meta name="google-site-verification" content="">

  <style>
      @font-face {
      
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

        }
        .navbar-inverse .navbar-nav>li>a:hover {
          color: gold;
        }
        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover{
          color: gold;
            padding-bottom: 17px;
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
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">   BKK   </a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li  class="active"><a href="#">Home</a></li>
                            <li><a href="lowongan.php">Lowongan</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Agenda <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php">LOG OUT</a></li>
                                    <li><a href="#">About Two</a></li>
                                    <li><a href="#">About Three</a></li>
                                    <li><a href="#">About Four</a></li>
                                    <li><a href="#">About Five</a></li>
                                    <li><a href="#">About Six</a></li>
                                </ul>
                            </li>
                            <li><a href="lowongan.php">Pendaftaran</a></li>
                            <li><a href="validasi.php">Validasi</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                        	<ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Pencarian..." class="form-control">
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

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 well">
      <div class="panel panel-info">
        <div class="panel-heading ">
          <h3 class="text-center">Selamat Datang Pencari Kerja, <?= $username ?></h4>
    

			<div class="col-lg-2 col-lg-offset-5">
            	<img src="img/backgroud.png" width="300">
            </div>
       

</body>
</html>