<?php 
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$lowongan = query("SELECT * FROM lowongan ");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Lowongan Tersedia</title>
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
                            <li><a href="home.php">Home</a></li>
                            <li  class="active"><a href="#">Lowongan</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Agenda <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="login.php">LOG OUT</a></li>
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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
              <!-- start: .main -->
        
          <div class="container">
            <div class="row">
              <div class="col-lg-9 main-content">

                <form action="#" method="get" id="company-action">
                    <input type="hidden" name="filter" value="" id="filter-input">
                  <div class="card card-tabs">
                    <ul class="tabs">
                      <a href="#">Bursa Kerja Khusus (BKK)</a>
                    </ul>
                      <div class="filter"></div>
                  </div>
                </form>

                <div class="card card-lists">

                  <?php foreach ($lowongan as $wgn) : ?>

                  <div class="list">
                    <div class="list-inner">
                      <div class="thumb">
                        <img src="img/<?= $wgn["gambar"]; ?>" width="">
                      </div>

                      <div class="content">
                        <div class="content-inner">
                          <div class="content-badge">
                            
                          </div>

                          <div class="company-desc">
                            <a href="https://bkksmakadano.or.id/perusahaan/pthitachi-astemo-bekasi-manufacturing">
                              <h2><?= $wgn["perusahaan"]; ?></h2>
                            </a>
                              <ul class="desc-list">
                                <li>
                                  <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="bdang-perusahaan" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" class="svg replaced-svg">
                                      <path id="Path_95" class="st0" d="M12,11.8l-1.9-5.7l1.2-1.7c0.1-0.2,0.1-0.5,0-0.7l-1.3-2C9.8,1.4,9.6,1.3,9.3,1.3H6.7  c-0.2,0-0.4,0.1-0.6,0.3l-1.3,2c-0.1,0.2-0.1,0.5,0,0.7l1.2,1.7L4,11.8c-0.1,0.3,0,0.6,0.3,0.8l3.3,2c0.2,0.1,0.5,0.1,0.7,0l3.3-2  C11.9,12.4,12.1,12.1,12,11.8L12,11.8z M7,2.7H9L9.9,4L9,5.3H7L6.1,4L7,2.7z M8,13.2l-2.5-1.5l1.7-5h1.7l1.7,5L8,13.2z"></path>
                                    </svg>
                                  </div>
                                      <p><?= $wgn["lowongan"]; ?></p>
                                </li>

                                <li>
                                  <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="location" x="0px" y="0px" viewBox="0 0 16 16" xml:space="preserve" class="svg replaced-svg">
                                      <path id="Path_67" class="st0" d="M8,8.7c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S9.1,8.7,8,8.7z M8,6C7.6,6,7.3,6.3,7.3,6.7  S7.6,7.3,8,7.3S8.7,7,8.7,6.7l0,0C8.7,6.3,8.4,6,8,6z"></path><path id="Path_68" class="st0" d="M8,14.7c-0.1,0-0.2,0-0.3-0.1c-0.2-0.1-5-2.9-5-7.9c0-2.9,2.4-5.3,5.3-5.3s5.3,2.4,5.3,5.3  c0,5-4.8,7.8-5,7.9C8.2,14.6,8.1,14.7,8,14.7z M8,2.7c-2.2,0-4,1.8-4,4c0,3.5,3,5.9,4,6.5c1-0.7,4-3,4-6.5C12,4.5,10.2,2.7,8,2.7z"></path>
                                    </svg>
                                  </div>
                                     <p><?= $wgn["lokasi"]; ?></p>
                                </li>

                                <li>
                                  <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="web" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" class="svg replaced-svg">
                                      <path id="Path_94" class="st0" d="M14.7,8c0-3.7-3-6.7-6.7-6.7S1.3,4.3,1.3,8c0,3.5,2.7,6.4,6.2,6.6h0.8C11.9,14.5,14.7,11.5,14.7,8  z M13.3,7.3h-2c-0.1-1.6-0.8-3.2-1.8-4.5C11.5,3.5,13,5.2,13.3,7.3z M8,12.8c-1.1-1.1-1.8-2.5-2-4.1H10C9.8,10.2,9.1,11.7,8,12.8z   M6,7.3c0.2-1.5,0.8-3,2-4.1c1.1,1.1,1.8,2.5,2,4.1H6z M6.5,2.9C5.5,4.1,4.8,5.7,4.7,7.3h-2C3,5.2,4.5,3.5,6.5,2.9z M2.7,8.7h2  c0.1,1.6,0.8,3.2,1.8,4.5C4.5,12.5,3,10.8,2.7,8.7z M9.5,13.1c1.1-1.3,1.7-2.8,1.8-4.5h2C13,10.8,11.5,12.5,9.5,13.1z"></path>
                                    </svg>
                                  </div>
                                      <a href="<?= $wgn["web"]; ?>" target="blank" style=""><?= $wgn["web"]; ?></a>
                              </li>
                            </ul>
                          </div>
                        </div>

                        <div class="company-profile">
                          <div class="title">Profil Perusahaan</div>
                            <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; line-height: 16px; max-height: 64px; -webkit-box-orient: vertical"><?= $wgn["deskripsi"]; ?></p>
                              <!-- di limit maks 4 baris -->
                        </div>
                      </div>
                    </div>

                      <div class="list-bottom">
                        <div class="list-inner">
                          <div class="list-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" class="svg replaced-svg">
                              <g id="round-business_center-24px">
                                <path id="Path_4030" class="st0" d="M17.3,21.3h-2.7c-0.7,0-1.3-0.6-1.3-1.3H4v5.3C4,26.8,5.2,28,6.7,28h18.7   c1.5,0,2.7-1.2,2.7-2.7V20h-9.3C18.7,20.7,18.1,21.3,17.3,21.3z M26.7,9.3h-5.3C21.3,6.4,18.9,4,16,4s-5.3,2.4-5.3,5.3H5.3   c-1.5,0-2.7,1.2-2.7,2.7v4c0,1.5,1.2,2.7,2.6,2.7c0,0,0,0,0,0h8v-1.3c0-0.7,0.6-1.3,1.3-1.3h2.7c0.7,0,1.3,0.6,1.3,1.3v1.3h8   c1.5,0,2.7-1.2,2.7-2.7v-4C29.3,10.5,28.1,9.3,26.7,9.3z M13.3,9.3c0-1.5,1.2-2.6,2.7-2.6c1.4,0,2.6,1.2,2.6,2.6H13.3z"></path>
                              </g>
                            </svg>
                              <p>Lowongan terakhir 1 bulan yang lalu</p>
                          </div>
                        </div>
                          <a href="detail.php?id_lowongan=<?= $wgn["id_lowongan"]; ?>" class="edit">Lihat Detail &gt;&gt;</a>
                      </div>         
                    </div>
                    <?php endforeach; ?>
              </div>

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

            </div>

                    <!-- BISMILLAH -->

            <div class="col-lg-3 sidebar">
                <div class="sidebar-inner">
                  <div class="card card-filter card-fixed"><h4 style="font-style: italic;">Bursa Kerja Khusus (BKK)</h4>adalah sebuah lembaga yang dibentuk di Sekolah Menengah Kejuruan Negeri dan Swasta, sebagai unit pelaksana yang memberikan pelayanan dan informasi lowongan kerja, pelaksana pemasaran, penyaluran dan penempatan tenaga kerja, merupakan mitra Dinas Tenaga Kerja dan Transmigrasi.</div>

            <div class="card card-vacancies d-none d-lg-block">
                <div class="title">Lowongan Spesifik</div>
                <div class="category-vacancies">
                    <form action="https://bkksmakadano.or.id/lowongan" method="get" id="segmented-action">
                        <input type="hidden" name="segmented" value="" id="segmented-input">
                        <a href="" data-value="luar-negeri" class="segmented-jobs">Lowongan Luar Negeri</a>
                        <a href="" data-value="indonesia" class="segmented-jobs">Lowongan Dalam Negeri</a>
                        <hr>
                        <a href="" data-value="bumn" class="segmented-jobs">Lowongan BUMN</a>
                        <a href="" data-value="swasta" class="segmented-jobs">Lowongan Swasta</a>
                        <a href="" data-value="difabel" class="segmented-jobs">Berkebutuhan Khusus</a>
                    </form>
                </div>
            </div>

            <div class="card card-event d-none d-lg-block">
              <div class="title">Agenda</div>
                <div class="no-event">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="date" x="0px" y="0px" viewBox="0 0 120 120" style="enable-background:new 0 0 120 120;" xml:space="preserve" class="svg replaced-svg">
                        <path id="Path_96" class="st0" d="M95,20H85v-5c0-2.8-2.2-5-5-5s-5,2.2-5,5v5H45v-5c0-2.8-2.2-5-5-5c-2.8,0-5,2.2-5,5v5H25  c-8.3,0-15,6.7-15,15v60c0,8.3,6.7,15,15,15l0,0h70c8.3,0,15-6.7,15-15l0,0V35C110,26.7,103.3,20,95,20z M25,30h70c2.8,0,5,2.2,5,5  v5H20v-5C20,32.2,22.2,30,25,30z M95,100H25c-2.8,0-5-2.2-5-5V50h80v45C100,97.8,97.8,100,95,100z"></path>
                        <path id="Path_97" class="st0" d="M40,60H30c-2.8,0-5,2.2-5,5s2.2,5,5,5h10c2.8,0,5-2.2,5-5S42.8,60,40,60z"></path>
                        <path id="Path_98" class="st0" d="M65,60H55c-2.8,0-5,2.2-5,5s2.2,5,5,5h10c2.8,0,5-2.2,5-5S67.8,60,65,60z"></path>
                        <path id="Path_99" class="st0" d="M90,60H80c-2.8,0-5,2.2-5,5s2.2,5,5,5h10c2.8,0,5-2.2,5-5S92.8,60,90,60z"></path>
                        <path id="Path_100" class="st0" d="M40,75H30c-2.8,0-5,2.2-5,5s2.2,5,5,5h10c2.8,0,5-2.2,5-5S42.8,75,40,75z"></path>
                    </svg>
                        <p>Belum ada agenda terdekat</p>
                </div>
            </div>                  

        <!-- and jobs.date_end >= '$today' -->
            <div class="card card-company d-none d-lg-block">
              <div class="title">Top Company</div>
                <div class="company-wrapper">
                    <div class="company-thumb">
                        <a href="https://bkksmakadano.or.id/perusahaan/pthitachi-astemo-bekasi-manufacturing" target="_blank">
                            <img src="https://bkksmakadano.or.id/assets/images/company/logo/defaultlogo.png" alt="">
                        </a>
                    </div>

                    <div class="company-thumb">
                        <a href="https://bkksmakadano.or.id/perusahaan/pt-united-can-company" target="_blank">
                            <img src="https://bkksmakadano.or.id/images/company/logos/pt-united-can-company1645685653.jpg" alt="">
                        </a>
                    </div>

                    <div class="company-thumb">
                        <a href="https://bkksmakadano.or.id/perusahaan/pt-akashi-wahana-indonesia" target="_blank">
                            <img src="https://bkksmakadano.or.id/images/company/logos/pt-akashi-wahana-indonesia1579857935.jpg" alt="">
                        </a>
                    </div>

                    <div class="company-thumb">
                        <a href="https://bkksmakadano.or.id/perusahaan/pt-denso-indonesia" target="_blank">
                            <img src="https://bkksmakadano.or.id/images/company/logos/pt-denso-indonesia1569915268.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>   

          </div>
        </div>
      </div>
    </div>
  </div>
</main>

        <!-- start: .footer -->
     <!--  <footer class="footer">
        <div class="footer-inner">
          <div class="brand-developers">
           <div class="container">
            <div class="title">
              BKK SMK NEGERI 1 TEPUS
            </div> 
            <div class="copyright">
              <div class="container">
                <p>©rezhawahyupradana | KERJA PRAKTIK 2022</p>
              </div>
            </div>
          </div>
      </footer> -->

</body>
</html>