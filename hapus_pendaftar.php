<?php 
require 'functions.php';

$id = $_GET["id_pendaftaran"];

if (hapuspendaftar($id) > 0 ) {
	echo "
            <script>
                alert('data pendaftar berhasil dihapus.');
                document.location.href = 'kelola_validasi.php';
            </script>
        ";
    
} else {
    echo "
            <script>
                alert('data pendaftar gagal dihapus');
                document.location.href = 'kelola_validasi.php';
            </script>
        ";
}


 ?>