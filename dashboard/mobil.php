<?php
require 'header.php';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

        </nav>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-4 text-gray-800">Guru | Daftar Paket</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a class="btn btn-primary" href="tambah.php">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <!-- Center-align the table -->
        <div class="table-responsive mx-auto">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Mobil</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sqld = "SELECT * FROM mobil";
                    $resultd = mysqli_query($conn, $sqld);

                    if ($resultd) {
                        while ($rowd = mysqli_fetch_assoc($resultd)) {
                            $id_mobil = $rowd['id_mobil'];
                            $gambar = $rowd['gambar'];
                            $nama = $rowd['nama'];
                            $tahun = $rowd['tahun'];
                            $harga = $rowd['harga'];
                            $tipe = $rowd['tipe'];
                            $deskripsi = $rowd['deskripsi'];
                    ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td style="text-align: center;">
                                    <img src="uploads/cars/<?php echo $gambar; ?>" alt="<?php echo $gambar; ?>" style="max-height: 100px; max-width: 150px;" class="mx-auto d-block">
                                </td>
                                <td>
                                    <?php echo $nama; ?>
                                </td>
                                <td>
                                    <?php echo $tahun; ?>
                                </td>
                                <td>
                                    <?php echo 'Rp ' . number_format($harga, 0, ',', '.'); ?>
                                </td>
                                <td>
                                    <?php echo $tipe; ?>
                                </td>
                                <td>
                                    <?php echo $deskripsi; ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="edit.php?id_paket=<?php echo $id_mobil ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#" onclick="confirmDelete(<?php echo $id_mobil; ?>)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan ='8'>Tidak ada data!</td></tr>";
                    }
                        ?>
                            </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Scroll to Top Button-->

    <?php
    require 'footer.php';
    ?>