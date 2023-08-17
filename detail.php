<?php 
require 'functions.php';

// ambil data id di URL
$id = $_GET["id_lowongan"];

// query data berdasar id
$lowongan = query("SELECT * FROM lowongan WHERE id_lowongan = $id")[0];

$detail = query("SELECT * FROM lowongan ");

?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Lowongan</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/detail.css">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="keywords" content="Portal Lowongan Masa Depan Anak Bangsa">
<meta name="csrf-token" content="0GYgeYUWDxDEhhvtGEvesVrHoTTw179pSWPC7laT">
<meta name="google-site-verification" content="">

<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <img src="img/log.png" class="logo">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">   BKK   </a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="home.php">Home</a></li>
                            <li  class="active"><a href="lowongan.php">Lowongan</a></li>
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
                            <li><a href="">Pendaftaran</a></li>
                            <li><a href="">Validasi</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                        

                        <ul class="nav navbar-nav navbar-right">
                          <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                       <!--  <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Pencarian..." class="form-control">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div> -->
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

<body> 

      <main class="main">
        <div class="main-inner detail">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 sidebar">
                <div class="sidebar-inner">
                  <div class="card card-event d-none d-lg-block">
                    <div class="title">Alumni Bekerja</div>
                      <div class="no-event">
                        <p>-----------------</p>
                        <svg ><img src="img/logobaru.png"></svg>
                      </div>
                  </div>

                  <div class="card card-related-company card-fixed d-none d-lg-block" style="">
                    <div class="title">Perusahaan Sejenis</div>
                      <div class="no-event">
                        <p>-----------------</p>
                      <svg ><img src="img/backgroud.png"></svg>
                    </div>                        
                  </div>
                </div>
              </div>
  
              <div class="col-lg-9 main-content">
                <div class="card card-detail">

                  

                  <div class="detail-banner">
                    <div class="banner-cover">
                          <img src="img/backgroud.png" width="200">                     
                    </div>
                   
                  </div>
                  <div class="detail-inner">
                    <div class="thumb">
                        <div class="vrt-job-cmp-logo ">
                      <img src="img/<?= $lowongan["gambar"]; ?>" width="">
                        </div>
                    </div>


                    <div class="content">
                      <input type="hidden" name="id" value="<?= $lowongan["id_lowongan"]; ?>" >
                      <div class="content-inner">
                        <div class="company-desc">
                          <h2><?php echo $lowongan["perusahaan"]; ?></h2>
                          <ul class="desc-list">
                            <li>
                              <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="bdang-perusahaan" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" class="svg replaced-svg">
                                  <path id="Path_95" class="st0" d="M12,11.8l-1.9-5.7l1.2-1.7c0.1-0.2,0.1-0.5,0-0.7l-1.3-2C9.8,1.4,9.6,1.3,9.3,1.3H6.7  c-0.2,0-0.4,0.1-0.6,0.3l-1.3,2c-0.1,0.2-0.1,0.5,0,0.7l1.2,1.7L4,11.8c-0.1,0.3,0,0.6,0.3,0.8l3.3,2c0.2,0.1,0.5,0.1,0.7,0l3.3-2  C11.9,12.4,12.1,12.1,12,11.8L12,11.8z M7,2.7H9L9.9,4L9,5.3H7L6.1,4L7,2.7z M8,13.2l-2.5-1.5l1.7-5h1.7l1.7,5L8,13.2z"></path>
                                </svg>
                              </div>
                              <p><?php echo $lowongan["lowongan"]; ?></p>
                            </li>
                            <li>
                              <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="location" x="0px" y="0px" viewBox="0 0 16 16" xml:space="preserve" class="svg replaced-svg">
                                  <path id="Path_67" class="st0" d="M8,8.7c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S9.1,8.7,8,8.7z M8,6C7.6,6,7.3,6.3,7.3,6.7  S7.6,7.3,8,7.3S8.7,7,8.7,6.7l0,0C8.7,6.3,8.4,6,8,6z"></path>
                                  <path id="Path_68" class="st0" d="M8,14.7c-0.1,0-0.2,0-0.3-0.1c-0.2-0.1-5-2.9-5-7.9c0-2.9,2.4-5.3,5.3-5.3s5.3,2.4,5.3,5.3  c0,5-4.8,7.8-5,7.9C8.2,14.6,8.1,14.7,8,14.7z M8,2.7c-2.2,0-4,1.8-4,4c0,3.5,3,5.9,4,6.5c1-0.7,4-3,4-6.5C12,4.5,10.2,2.7,8,2.7z"></path>
                                </svg>
                              </div>
                              <p><?php echo $lowongan["lokasi"]; ?></p>
                            </li>
                            <li>
                              <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="web" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" class="svg replaced-svg">
                                  <path id="Path_94" class="st0" d="M14.7,8c0-3.7-3-6.7-6.7-6.7S1.3,4.3,1.3,8c0,3.5,2.7,6.4,6.2,6.6h0.8C11.9,14.5,14.7,11.5,14.7,8  z M13.3,7.3h-2c-0.1-1.6-0.8-3.2-1.8-4.5C11.5,3.5,13,5.2,13.3,7.3z M8,12.8c-1.1-1.1-1.8-2.5-2-4.1H10C9.8,10.2,9.1,11.7,8,12.8z   M6,7.3c0.2-1.5,0.8-3,2-4.1c1.1,1.1,1.8,2.5,2,4.1H6z M6.5,2.9C5.5,4.1,4.8,5.7,4.7,7.3h-2C3,5.2,4.5,3.5,6.5,2.9z M2.7,8.7h2  c0.1,1.6,0.8,3.2,1.8,4.5C4.5,12.5,3,10.8,2.7,8.7z M9.5,13.1c1.1-1.3,1.7-2.8,1.8-4.5h2C13,10.8,11.5,12.5,9.5,13.1z"></path>
                                </svg>
                              </div>
                              <a href="" target="blank"><?php echo $lowongan["web"]; ?></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="detail-info">
                    <div class="title">
                      Syarat Kriteria Pelamar
                    </div>
                    <ul class="company-info">
                      <li>
                        <span>Jenis Kelamin</span>
                        <p>:  Laki-laki</p>
                      </li>
                      <li>
                        <span>Tinggi Badan</span>
                        <p>:  165 CM</p>
                      </li>
                      <li>
                        <span>Berat Badan</span>
                        <p>:  55 KG</p>
                      </li>
                      <li>
                        <span>Umur</span>
                        <p>:  20 Tahun</p>
                      </li>
                      <li>
                        <span>Nilai Rata-rata UAN</span>
                        <p>:  8.00</p>
                      </li>
                      <!-- <li>
                        <span>Waktu Bekerja</span>
                        <p>Senin - Sabtu</p>
                      </li> -->
                    </ul>
                  </div>
                  <div class="detail-info">
                    <div class="title">Profil Perusahaan</div>
                    <div class="company-profile">
                      <p>
                          <?php echo $lowongan["deskripsi"]; ?>
                      </p>
                    </div>
                  </div>

                  <a href="pendaftaran.php?id_lowongan=<?= $lowongan["id_lowongan"]; ?>" class="company-share-button">
                  <button class="btn btn-orange btn-share btn-block" style="position: absolute; bottom: 0px;"> Daftar </button>
                  </a>

                  

                </div>
                <div class="pagination-wrapper">
                  <ul class="pagination">  
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- end: .main -->

      <footer class="footer">
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
      </footer>      

</body>
</html>