<?php
require "../1systems.php";
session_start();

if (isset($_POST['save'])) {
    if ( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil di tambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal di tambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } 
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add Product</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body style="height: 100vh; overflow:hidden;">
    <div class="main-container d-flex">
        <div class="sidebar bg-success" id="side_nav" style="height: 100vh; width:250px;";>
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center">
                <img class="mt-4" src="../images/admin.jpg" alt="" style="width: 120px; border-radius:60px; box-shadow: 0px 0px 20px 1px white;">
            </div>
            <div class="header-box px-2 pb-3 d-flex justify-content-center">
                <h1 class="text-white" style="font-size: 20px;"><?= $_SESSION['admin'] ?></i></h1>
            </div>

            <ul class="list-unstyled px-2">
                <li class=""><a href="index.php" class="text-decoration-none px-3 py-2 d-block text-white"><i class="fal fa-list"></i>
                        Dashboard</a></li>
                <li class=""><a href="dashboard.php" class="text-decoration-none px-3 py-2 d-block text-white"><i class="fal fa-list"></i>
                        Products</a></li>
                <li class=""><a href="history.php" class="text-decoration-none text-white px-3 py-2 d-block"><i
                            class="fal fa-envelope-open-text "></i> Transaction History</a></li>
                <li class=""><a href="customer.php" class="text-white text-decoration-none px-3 py-2 d-block" ><i class="fal fa-users"></i>
                        Customers</a></li>
                <li class=""><a href="feedback.php" class="text-white text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                        Feedback</a></li>
            </ul>
            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class=""><a href="tambah.php" class="text-white text-decoration-none px-3 py-2 d-block" style="background-color: green; border-radius: 20px;"><i class="fal fa-bars"></i>
                        Add Product</a></li>
                <li class=""><a href="logout.php" class="text-white text-decoration-none px-3 py-2 d-block"><i class="fal fa-bars"></i>
                        Logout</a></li>
            </ul>

        </div>
        <div class="content" style="background-image: url(../images/islamic.jpg); background-size:cover;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> <i class="bi bi-intersect"></i> Floryne || Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4">
                <h2 class="fs-5"> Add Product </h2>
                <!-- contact -->
            <form action="" method="post" enctype="multipart/form-data">
                <section id="contact" style="position: relative; bottom:100px;">
                    <div class="row justify-content-center text-center" style="width: 1100px; height: 100vh">
                        <div></div>
                        <div class="" style="display: flex; flex-direction: column; align-items: center">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Item Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="..." style="border-radius: 20px; width: 200px;" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                                    <input type="number" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="..." style="border-radius: 20px; width: 200px;" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Stock</label>
                                    <input type="number" name="stock" class="form-control" id="exampleFormControlInput1" placeholder="Stock" style="border-radius: 20px; width:200px;" required />
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="code" class="form-control" id="exampleFormControlInput1" placeholder="..." style="border-radius: 20px;  width:305px;" required value="<?= $randomItemCode ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                    <input class="form-control" name="gambar" type="file" style="width:305px" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 text-center">
                                    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" cols="78" required placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" name="save" class="btn btn-dark" style="border-radius: 20px; width: 610px">SUBMIT</button>
                        </div>
                        </div>
                    </div>
                </section>
            </form>
    <!-- contact -->
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

