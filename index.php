<?php
require 'backend/koneksi.php';

$sql = "SELECT * FROM mobil";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toyota | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- End SweetAlert -->

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- header -->
    <header id="header">
        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow custom-navbar">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img class="img-responsive custom-logo" src="Logo, Icon/Toyota_Logo.png" alt="TOYOTA LOGO">
                        <span class="custom-highlight">TOYOTA</span>
                    </a>
                    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto custom-ul">
                        <li class="nav-item custom-li">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item custom-li">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item custom-li">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item custom-li">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" method="post" action="" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                    <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> keep me logged-in
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="bottom text-center">
                                            New here ? <a href="#"><b>Join Us</b></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navigation -->

        <!-- cover section -->
        <section id="cover" class="container">
            <br><br><br>
            <div class="row g-2 justify-content-around">
                <div class="col-md-6 d-flex justify-content-center align-items-center order-lg-2">
                    <div class="p-3">
                        <img class="mx-auto d-block w-100 img-fluid" src="Photos/mobil_banner.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center order-2">
                    <div class="p-3">
                        <h1 class="custom-highlight">Toyota</h1>
                        <h1>Marketplace</h1>
                        <p>Temukan Mobil Impian Anda di Marketplace Kami</p>
                        <button type="button" class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> BUY NOW</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- end cover section -->
    </header>
    <!-- end header -->

    <!-- main -->
    <main class="container">
        <!-- MPV section -->
        <section id="MPV" class="mt-5">
            <h2>PRODUK</h2>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_mobil = $row['id_mobil'];
                    $nama = $row['nama'];
                    $gambar = $row['gambar'];
                    $deskripsi = $row['deskripsi'];
                    $harga = $row['harga'];
                ?>
                    <div class="col mb-4">
                        <div class="card h-100 shadow custom-card">
                            <img src="dashboard/uploads/cars/<?php echo $gambar; ?>" class="card-img-top w-100 custom-bg" alt="<?php echo $gambar; ?>">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $nama; ?></h4>
                                <p class="card-text"><?php echo $deskripsi; ?></p>
                            </div>
                            <div class="card-footer custom-footer">
                                <div class="float-start">
                                    <h4 class="custom-highlight"><?php echo 'Rp ' . number_format($harga, 0, ',', '.'); ?></h4>
                                </div>
                                <div class="float-end">
                                    <a href="checkout.php?id_mobil=<?php echo $id_mobil; ?>" type="button" class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> BUY NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>

        <!-- end casual shoes section -->

        <!-- services section -->
        <section id="services" class="mt-5">
            <div class="row g-2 justify-content-around">
                <div class="col-md-6 d-flex justify-content-center align-items-center order-1">
                    <div class="col">
                        <div class="card p-3 mb-3 custom-service-card" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4  gy-3">
                                    <img class="mx-auto d-block custom-img-width" src="Logo, Icon/image 12.png" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body custom-text">
                                        <h5 class="card-title">Find the Perfect Fit</h5>
                                        <p class="card-text">Everybody is different, which is why we offer styles for everybody.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-3 mb-3 custom-service-card" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 gy-3">
                                    <img class="mx-auto d-block custom-img-width" src="Logo, Icon/image 13.png" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Free Exchanges</h5>
                                        <p class="card-text">One of the many reasons you can shop with peace of mind.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-3 mb-3 custom-service-card" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 gy-3">
                                    <img class="mx-auto d-block custom-img-width" src="Logo, Icon/image 14.png" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Contact Our Seller</h5>
                                        <p class="card-text">They are here to help you. That's quite literally what we pay for them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col order-lg-2">
                    <img class="mx-auto d-block w-100" src="Logo, Icon/toyota car.png" alt="">
                </div>
            </div>
        </section>
        <!-- end services section -->


    </main>
    <!-- end main -->

    <!-- footer -->
    <footer id="footer" class="bg-light text-center text-lg-start mt-5">
        <div class="custom-footer-margin">
            <div class="pt-3 container text-center">
                <h6>&copy; 2023 <span class="custom-highlight">Nico Jonathan Haratua</span> | All Rights Reserved</h6>
            </div>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end footer -->

    <!-- end script -->
    <?php
    include 'backend/koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                if ($password == $user['password']) {
                    $_SESSION['id_users'] = $user['id_users'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];

                    if ($user['role'] == 'admin' || $user['role'] == 'user') {
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Berhasil',
                                text: 'Selamat datang " . $user['username'] . "!',
                            }).then(function() {
                                window.location.href = 'dashboard/index.php';
                            });
                          </script>";
                    } else {
                        displayError("Peran tidak valid!");
                    }
                } else {
                    displayError("Email atau password salah!");
                }
            } else {
                displayError("Email atau password salah!");
            }
        } else {
            displayError("Terjadi kesalahan!");
        }

        $stmt->close();
        mysqli_close($conn);
    }

    function displayError($message)
    {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '$message',
        }).then(function() {
            window.location.href = 'index.php';
        });
      </script>";
        exit();
    }
    ?>

</body>

</html>