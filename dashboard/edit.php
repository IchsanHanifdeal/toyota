<?php require 'header.php'; ?>
<?php
$id_mobil = $_GET['id_mobil'];
$sqld = "SELECT * FROM mobil WHERE id_mobil = '$id_mobil'";
$resultd = mysqli_query($conn, $sqld);
$rowd = mysqli_fetch_assoc($resultd);
$idmobil = $rowd['id_mobil'];
$nama = $rowd['nama'];
$tahun = $rowd['tahun'];
$harga = $rowd['harga'];
$tipe = $rowd['tipe'];
$deskripsi = $rowd['deskripsi'];
$gambar = $rowd['gambar'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_mobil = $_POST['id_mobil'];
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $tipe = $_POST['tipe'];
    $deskripsi = $_POST['deskripsi'];

    if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];
        $gambar_temp = $_FILES['gambar']['tmp_name'];
        $gambar_path = 'uploads/cars/' . $gambar;

        move_uploaded_file($gambar_temp, $gambar_path);

        $sql = "UPDATE mobil SET nama='$nama', tahun='$tahun', harga='$harga', tipe='$tipe', deskripsi='$deskripsi', gambar='$gambar' WHERE id_mobil='$id_mobil'";
    } else {
        $sql = "UPDATE mobil SET nama='$nama', tahun='$tahun', harga='$harga', tipe='$tipe', deskripsi='$deskripsi' WHERE id_mobil='$id_mobil'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Mobil berhasil diupdate.',
            }).then((result) => {
                window.location.href = 'mobil.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error: " . mysqli_error($conn) . "',
            });
        </script>";
    }

    mysqli_close($conn);
}
?>

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 mb-4 text-gray-800">Toyota | Edit Mobil</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_mobil" value="<?php echo $idmobil; ?>">
                                <label for="nama">Nama Mobil:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $nama; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun:</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $tahun; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe:</label>
                                <input type="text" class="form-control" id="tipe" name="tipe" value="<?php echo $tipe; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $deskripsi ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <img src="uploads/cars/<?php echo $gambar; ?>" alt="<?php echo $gambar; ?>" style="max-height: 100px; max-width: 150px;">
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Mobil</button>
                            <a href="mobil.php" class="btn btn-secondary">Kembali</a>
                        </form>
                        <!-- End of Form -->
                    </div>
                </div>
                <!-- End of Card -->

            </div>
        </div>

    </div>
</div>

<script>
    function previewImage(input) {
        var preview = document.getElementById('gambar-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
</script>

<?php require 'footer.php'; ?>