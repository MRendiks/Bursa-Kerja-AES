<?php 
require 'functions.php';

$id = $_GET["id_lowongan"];

if (hapus($id) > 0 ) {
	echo "
            <script>
                alert('data berhasil dihapus.');
                document.location.href = 'kelola_lowongan.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('gagal dihapus');
                document.location.href = 'kelola_lowongan.php';
            </script>
        ";
}


 ?>