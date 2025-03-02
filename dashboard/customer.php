<?php
require "../1systems.php";

session_start();
if ( !isset($_SESSION['admin']) ) {
    header("location: login.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Customers</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body >
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
                <li class=""><a href="customer.php" class="text-white text-decoration-none px-3 py-2 d-block"  style="background-color: green; border-radius: 20px;"><i class="fal fa-users"></i>
                        Customers</a></li>
                <li class=""><a href="feedback.php" class="text-white text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                        Feedback</a></li>
            </ul>
            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class=""><a href="tambah.php" class="text-white text-decoration-none px-3 py-2 d-block"><i class="fal fa-bars"></i>
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
                <h2 class="fs-5"> Customers </h2>
                               
                <div class="container d-flex justify-content-center" style="width: 1075px;"  >
                <div></div>
                    <div class="w-75 mt-5 overflow-auto" style="max-height: 400px; height: 400px;">
                        <table class="table w-100 text-center">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Number of Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = new Users;
                                $no = 1;
                                foreach ($user->showAll() as $tampil) {
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $tampil['username'] ?></td>
                                    <td><?= $tampil['transaction'] ?></td>
                                    <td class="text-center">
                                        <a href="hapusUser.php?id=<?= $tampil['id'] ?>"><button onclick="return confirm('Apakah anda yakin ingin menghapus? jika anda menghapus user tidak akan bisa login dengan username berikut.');" class="btn btn-danger">Dellete</button></a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <div></div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>