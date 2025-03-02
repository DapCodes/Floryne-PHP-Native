<?php
// koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'pas');



// function untuk menambah data "value" pada sebuah table
function tambah($data) {
    global $conn;
    $name = htmlspecialchars($data['name']);
    $price = htmlspecialchars($data['harga']);
    $stock = htmlspecialchars($data['stock']);
    $itemCode = htmlspecialchars($data['code']);
    $description = htmlspecialchars($data['desc']);

    // upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }
    
    // masukan data ke database
    $query = "INSERT INTO product
                VALUES
                ('', '$name', '$price', '$stock', '$itemCode', '$gambar', '$description')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//upload gambar 
function upload() {
    $namaFILE = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek gambar di up atau tdk
    if ($error === 4) {
        echo "<script> 
                alert('pilih gambar terlebih dahulu');
            </script>";

        return false;
    }

    // cek yg di up tipe gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFILE);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> 
                alert('yang anda upload bukan gambar');
            </script>";
    }

    
    // cek ukuran
    if ($ukuran > 5000000) {
        echo "<script> 
                alert('Ukuran gambar terlalu besar, Maksimal 2MB');
            </script>";
    }



    // lolos cek
    // buat nama file baru
    $namaFILEbaru = uniqid();
    $namaFILEbaru .= '.';
    $namaFILEbaru .= $ekstensiGambar;


    // menyimpan file yg di upload ke folder asset
    move_uploaded_file($tmpName, "../asset/" . $namaFILEbaru);

    return $namaFILEbaru;
}




class Database
{
    public $host = "localhost", $user = "root", $pass = "", $db = "pas";
    public $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );
        if ($this->koneksi) {
            // echo "berhasil";
        } else {
            echo "Koneksi Database Gagal";
        }
    }
}

// koneksi DB
$db = new Database();




class Cart extends Database {
    
    // menampilkan semua
    public function showAll() {
        $cart = mysqli_query($this->koneksi,
                        "SELECT * FROM cart WHERE qty > 0 ORDER BY id DESC");
        mysqli_query($this->koneksi, "DELETE FROM cart WHERE qty = 0");

        // var_dump($cart);
        return $cart;
    }


    // menampilkan 1
    public function show1($id) {
        $cart = mysqli_query($this->koneksi,
                        "SELECT * FROM cart WHERE id = $id");
        mysqli_query($this->koneksi, "DELETE FROM cart WHERE qty = 0");

        // var_dump($cart);
        return $cart;
    }


    // menambah data
    public function create($name, $price, $qty, $itemCode, $gambar) {
        mysqli_query($this->koneksi,
                 "INSERT INTO cart VALUES
                 ('', '$name', '$price', '$qty', '$itemCode', '$gambar')");
    }


    // hapus data
    public function delete($id) {
        mysqli_query($this->koneksi,
                    "DELETE FROM cart WHERE id = $id" );
    }


    // hapus semua data
    public function deleteAll() {
        mysqli_query($this->koneksi, "DELETE FROM cart");
    }


    // menhgitung jumlah tabel
    public function count() {
        $count = mysqli_query($this->koneksi, "SELECT COUNT(*) as total FROM cart");

        return $count;
    }


}




class History extends Database {

    public function showAll() {
        $history = mysqli_query($this->koneksi, "SELECT * FROM history ORDER BY id DESC");
        return $history;
    }

    public function Create($name, $address, $email, $phone, $product, $total, $message, $method, $card) {
        mysqli_query($this->koneksi, 
                "INSERT INTO history 
                VALUES ('', '$name', '$address', '$email', '$phone', '$product', '$total', '$message', '$method', '$card')");
    }

    public function delete($id)
    {
        mysqli_query($this->koneksi, "DELETE FROM history WHERE id = $id");
    }


}



class Product extends Database
{
    // Menampilkan Semua Data
    public function showAll()
    {
        $product = mysqli_query($this->koneksi, "SELECT * FROM product ORDER BY id DESC");
        // var_dump($product);
        return $product;
    }


    // Menampilkan 3 Data
    public function show3()
    {
        $product = mysqli_query($this->koneksi, "SELECT * FROM product WHERE id > 9 AND id < 13");
        // var_dump($product);
        return $product;
    }


    // Menampilkan 1 data
    public function show1($id)
    {
        $product = mysqli_query($this->koneksi, "SELECT * FROM product WHERE id = '$id'");
        // var_dump($product);
        return $product;
    }

    
    // menghapus data berdasarkan id
    public function delete($id)
    {
        mysqli_query($this->koneksi, "DELETE FROM product WHERE id = '$id'");
    }


    // update
    public function update($id, $name, $price, $stock, $itemCode, $description)
    {
        mysqli_query($this->koneksi, "UPDATE product SET
                                        name = '$name',
                                        price = '$price',
                                        stock = '$stock',
                                        itemCode = '$itemCode',
                                        description = '$description'

                                    WHERE id = $id;
                                        
                                        ");
    }


}




class Users extends Database 
{
    
    public function showAll() 
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM users WHERE id > 1 ORDER BY id DESC");
        return $data;
    }


    public function regist($username, $password) 
    {
        
        // cek username tersedia atau tidak
        $cek = mysqli_query($this->koneksi, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($cek)) {
            echo "
            <script> alert('Username tidak tersedia'); </script>
            ";
            return false;
        }

        // encrypt password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $add = mysqli_query($this->koneksi, "INSERT INTO users VALUES ('', '$username', '$hash', 0)");
        if (isset($add)) {
            header("location: index.php");
        }
    }


    public function show1($username)
    {

        $data = mysqli_query($this->koneksi, "SELECT * FROM users WHERE username = '$username'");

        if (isset($data)) {
            return $data;
        } else {
            return false;
        }
    }


    public function admin($id)
    {
        $admin = mysqli_query($this->koneksi, "SELECT * FROM users WHERE id = $id");
        return $admin;
    }

    public function delete($id)
    {
        mysqli_query($this->koneksi, "DELETE FROM users WHERE id = $id");
    }

}



class Feedback extends Database
{

    public function create($name, $lname, $email, $message)
    {
        mysqli_query($this->koneksi, "INSERT INTO message VALUES ('', '$name', '$lname', '$email', '$message')");
    }



    public function delete($id)
    {
        mysqli_query($this->koneksi, "DELETE FROM message WHERE id = $id");
    }



    public function showAll() {
        $data = mysqli_query($this->koneksi, "SELECT * FROM message ORDER BY id DESC");
        return $data;
    }



}


?>