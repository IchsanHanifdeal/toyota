<?php require 'header.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $tipe = $_POST['tipe'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $gambar_temp = $_FILES['gambar']['tmp_name'];
    $gambar_path = 'uploads/cars/' . $gambar;


    if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'File upload failed. Please try again.',
            });
        </script>";
        exit;
    }
    move_uploaded_file($gambar_temp, $gambar_path);

    $sql = "INSERT INTO mobil (nama, tahun, harga, tipe, deskripsi, gambar) VALUES ('$nama', '$tahun', '$harga', '$tipe', '$deskripsi', '$gambar')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Mobil berhasil ditambahkan.',
            }).then((result) => {
                window.location.href = 'tambah.php';
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
                        <h1 class="h3 mb-4 text-gray-800">Toyota | Tambah Mobil</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Mobil:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun:</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe:</label>
                                <input type="text" class="form-control" id="tipe" name="tipe" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" required onchange="previewImage(this)">
                                <img id="gambar-preview" src="#" alt="Preview" style="max-height: 100px; max-width: 150px; display: none;">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Mobil</button>
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