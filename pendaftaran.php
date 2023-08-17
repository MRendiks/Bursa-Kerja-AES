<?php
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id_user  = $_SESSION['id_user'];
$username = $_SESSION['username'];

// ambil data id di URL
$id = $_GET["id_lowongan"];

// query data berdasar id
$lowongan = query("SELECT * FROM lowongan WHERE id_lowongan = $id")[0];

$users = query("SELECT * FROM user WHERE id_user = '$id_user'");

//enkripsi beserta dekripsi
if (isset($_POST["submit"]) ) {
            
    
    if ( pendaftaran($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan.');
                document.location.href = 'validasi.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal');
                document.location.href = 'pendaftaran.php';
            </script>
        ";
}   }


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendaftaran</title>
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

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- header -->
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
                            <li  class="active"><a href="#">Pendaftaran</a></li>
                            <li><a href="Validasi.php">Validasi</a></li>
                            <li><a href="#">Alumni</a></li>
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

<!-- ////////////////////////////////////////// -->

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 well">
      <div class="panel panel-info">
        <div class="panel-heading ">
          <h3 class="text-center">Formulir Pendaftaran Lowongan Pekerjaan</h4>
                </div>
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal row">
                            <input type="hidden" name="id" value="<?= $lowongan["id_lowongan"]; ?>" >
                            <div class="form-group">
                                <label for="lowongan" class="control-label col-sm-3">Lowongan di Daftar :</label>
                                
                                <div class="col-sm-6">
                                    <input type="text" name="lowongan" id="lowongan" class="form-control" 
                                    value="<?php echo $lowongan["perusahaan"];?> - <?php echo $lowongan["lowongan"];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namadepan" class="control-label col-sm-3">Nama Depan :</label>
                                <?php foreach  ( $users as $row) : ?>
                                <div class="col-sm-6">
                                    <input type="text" name="namadepan" id="namadepan" class="form-control"
                                    value="<?php echo "$row[namadepan]"; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namabelakang" class="control-label col-sm-3">Nama Belakang :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="namabelakang" id="namabelakang" class="form-control"
                                    value="<?php echo "$row[namabelakang]"; ?>" readonly>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <label for="status_pendaftar" class="control-label col-sm-3">Status :</label>
                                <div class="col-sm-2">
                                    <select name="status_pendaftar" id="status_pendaftar" class="form-control">
                                                <option value="" selected disabled>Pilih</option>
                                                <option value="Siswa">SISWA</option>
                                                <option value="Alumni">ALUMNI</option>
                                            </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jurusan" class="control-label col-sm-3">Jurusan :</label>
                                <div class="col-sm-4">
                                    <select name="jurusan" id="jurusan" class="form-control">
                                                <option value="" selected disabled>Pilih</option>
                                                <option value="TEK. AUDIO VIDEO">Teknik Audio Video</option>
                                                <option value="KENDARAAN RINGAN">Teknik Kendaraan Ringan Otomotif</option>
                                                <option value="ADM. PERKANTORAN">Otomatisasi Dan Tata Kelola Perkantoran</option>
                                            </select>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="tgl_daftar" class="control-label col-sm-3">Tanggal Mendaftar :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="tgl_daftar" id="tgl_daftar" class="form-control">
                                </div>
                            </div> -->

                            <hr>
                            <fieldset>
                                <legend class="text-center">Lengkapi Data Diri Pendaftaran</legend>

                                <div class="panel-body">
                        <form action="" class="form-horizontal row">
                            <div class="form-group">
                                <label for="tempat_lahir" class="control-label col-sm-3">Tempat Lahir :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hari" class="control-label col-sm-3">Tanggal Lahir :</label>
                                <div class="col-sm-2">
                                    <select name="hari" id="hari" class="form-control">
                                                <option selected disabled value="">Hari</option>
                                                <option value="01 -">01</option><option value="02 -">02</option><option value="03 -">03</option><option value="04 -">04</option><option value="05 -">05</option><option value="06 -">06</option><option value="07 -">07</option><option value="08 -">08</option><option value="09 -">09</option><option value="10 -">10</option><option value="11 -">11</option><option value="12 -">12</option><option value="13 -">13</option><option value="14 -">14</option><option value="15 -">15</option><option value="16 -">16</option><option value="17 -">17</option><option value="18 -">18</option><option value="19 -">19</option><option value="20 -">20</option><option value="21 -">21</option><option value="22 -">22</option><option value="23 -">23</option><option value="24 -">24</option><option value="25 -">25</option><option value="26 -">26</option><option value="27 -">27</option><option value="28 -">28</option><option value="29 -">29</option><option value="30 -">30</option><option value="31 -">31</option>
                                            </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="bulan" id="bulan" class="form-control">
                                                <option selected disabled value="">Bulan</option>
                                                <option value=" Januari - ">01 - Januari</option>
                                                <option value=" Februari - ">02 - Februari</option>
                                                <option value=" Maret - ">03 - Maret</option>
                                                <option value=" April - ">04 - April</option>
                                                <option value=" Mei - ">05 - Mei</option>
                                                <option value=" Juni - ">06 - Juni</option>
                                                <option value=" Juli - ">07 - Juli</option>
                                                <option value=" Agustus - ">08 - Agustus</option>
                                                <option value=" September - ">09 - September</option>
                                                <option value=" Oktober - ">10 - Oktober</option>
                                                <option value=" November - ">11 - November</option>
                                                <option value=" Desember - ">12 - Desember</option>
                                            </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="tahun" id="tahun" class="form-control">
                                                <option  disabled selected value="">Tahun</option>
                                                <option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2008</option><option value="2009">2009</option><option value="2010">2010</option>
                                            </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jk"  class="control-label col-sm-3">Jenis Kelamin :</label>
                                <div class="col-sm-6">
                                    <input type="radio" name="jk" id="Laki-laki" value="Laki-laki"> Laki-Laki &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="jk" id="Perempuan" value="Perempuan"> Perempuan
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label for="tb" class="control-label col-sm-3">Tinggi Badan :</label>
                                <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">CM</span>
                                                            <input type="number" class="form-control" name="tb" id="tb" step="1" min="130" max="200" >
                                                        </div>
                                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="bb" class="control-label col-sm-3">Berat Badan :</label>
                                <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">KG</span>
                                                            <input type="number" class="form-control" name="bb" id="bb" step="1" min="30" max="125" >
                                                        </div>
                                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="control-label col-sm-3">Alamat :</label>
                                <div class="col-sm-7">
                                    <textarea name="alamat" rows="3" id="alamat" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="no_telp">No Telepon :</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">+62</span>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" maxlength="11" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_lulus" class="control-label col-sm-3">Tahun Lulus :</label>
                            <div class="col-sm-2">
                                    <select id="tahun_lulus" name="tahun_lulus" class="form-control">
                                                <option  disabled selected value="" >Tahun</option>
                                                <option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option>
                                            </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nilai_ratarata" class="control-label col-sm-3">Nilai rata-rata UAN :</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="nilai_ratarata" id="nilai_ratarata" step="0.01" maxlength="2"  >
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="kode_keamanan" class="control-label col-sm-3">Kode Keamanan :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="kode_keamanan" id="kode_keamanan" class="form-control" maxlength="16" required>
                                </div>
                            </div> -->
                                <!-- ************ End of Masters Level (if any)************** -->
                            </fieldset>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-warning">
                                     <p>Mohon isikan data dengan sebenar-benarnya.</p> 
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 col-lg-offset-5">
                            <button type="submit" name="submit" class="btn btn-color btn-lg btn-block"> Kirim </button>
                        </div>
                    </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>