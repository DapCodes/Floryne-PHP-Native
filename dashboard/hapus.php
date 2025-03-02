<?php
require '../1systems.php';
$id = $_GET['id'];
$product = new Product;
$product -> delete($id);


if( mysqli_affected_rows($product->koneksi)) {
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