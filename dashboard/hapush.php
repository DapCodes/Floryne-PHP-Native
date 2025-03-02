<?php
require '../1systems.php';
$id = $_GET['id'];
$history = new History;
$history -> delete($id);


if( mysqli_affected_rows($history->koneksi)) {
    echo "
            <script>
                alert('data berhasil di hapus!');
                document.location.href = 'dashboard.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('data gagal di hapus!');
                document.location.href = 'dashboard.php';
            </script>
        ";
}

?>