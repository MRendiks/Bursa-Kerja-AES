<?php 
require 'functions.php';

if (isset($_POST["submit"])) {
    if ( input_lowongan($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan.');
                document.location.href = 'kelola_lowongan.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal');
                document.location.href = 'input_lowongan.php';
            </script>
        ";
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kelola Lowongan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link href="css/input_lowongan.css" rel="stylesheet">

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
                                        <!-- <li><a href="logout.php" class="btnn btn-colorr btn-lg btn-block">LOG OUT</a></li> -->
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
    <div class="page-wrapperr bg-dark p-t-100 p-b-50">
        <div class="wrapperr wrapperr--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Tambah Daftar Lowongan</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-roww">
                            <div class="name">Nama Perusahaan</div>
                            <div class="value">
                                <input class="input--style-66" type="text" name="perusahaan">
                            </div>
                        </div>
                        <div class="form-roww">
                            <div class="name">Lowongan Tersedia</div>
                            <div class="value">
                                <input class="input--style-66" type="text" name="lowongan">
                            </div>
                        </div>
                        <div class="form-roww">
                            <div class="name">Lokasi Perusahaan</div>
                            <div class="value">
                                <input class="input--style-66" type="text" name="lokasi">
                            </div>
                        </div>
                        <div class="form-roww">
                            <div class="name">Website</div>
                            <div class="value">
                                <input class="input--style-66" type="text" name="web">
                            </div>
                        </div>
                        
                        <div class="form-roww">
                            <div class="name">Deskripsi</div>
                            <div class="value">
                                <div class="input-groupp">
                                    <textarea class="textarea--style-66" name="deskripsi" placeholder="Deskripsi Perusahaan..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-roww">
                            <div class="name">Logo Perusahaan</div>
                            <div class="value">
                                <div class="input-groupp js-input-file">
                                    <input class="label--file" type="file" name="gambar" id="gambar">
                                </div>
                                <div class="label--desc">Upload Logo Perusahaan</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btnn btnn--radius-2 btnn--blue-2" type="submit" name="submit">Tambah</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>


     
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->