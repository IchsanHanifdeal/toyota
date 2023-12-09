<?php
include 'backend/koneksi.php';
if (isset($_GET['id_mobil'])) {
    $id_mobil = $_GET['id_mobil'];

    $query = "SELECT * FROM mobil WHERE id_mobil = $id_mobil";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_mobil = $row['id_mobil'];
        $nama = $row['nama'];
        $tahun = $row['tahun'];
        $harga = $row['harga'];
        $tipe = $row['tipe'];
        $deskripsi = $row['deskripsi'];
        $gambar = $row['gambar'];
    } else {
        die("Invalid parameter or data not found.");
    }
} else {
    die("Parameter is missing.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="styles/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5 class="card-title">Struk Pembayaran</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="invoice p-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <div style="display: flex; align-items: center;">
                                            <div style="flex: 1;">
                                                <h4>
                                                    <?php echo $nama; ?>
                                                </h4>
                                                <h5>
                                                    <?php echo 'Rp ' . number_format($harga, 0, ',', '.'); ?>
                                                </h5>
                                            </div>
                                            <div>
                                                <span>
                                                    <img src="Logo, Icon/Toyota_Logo.png" style="width: 150px; height: 150px; border-radius: 50%;">
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <img src="dashboard/uploads/cars/<?php echo $gambar; ?>" class="card-img-top" />
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <div class="form-group">
                                            <label for="check-in-date">Tanggal Pembelian</label>
                                            <input type="date" class="form-control" id="check-in-date" name="check-in-date" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive mt-4">
                                        <h4>Data Mobil</h4>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Nama Mobil:</th>
                                                    <td><?php echo $nama; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tahun:</th>
                                                    <td><?php echo $tahun; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tipe:</th>
                                                    <td><?php echo $tipe; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Deskripsi:</th>
                                                    <td><?php echo $deskripsi; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 table-responsive mt-4">
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="dist/img/credit/visa.png" alt="Visa">
                                        <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                                        <img src="dist/img/credit/american-express.png" alt="American Express">
                                        <img src="dist/img/credit/paypal2.png" alt="Paypal">

                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                            plugg
                                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="table-responsive mt-4">
                                            <table class="table">
                                                <tr>
                                                    <th>Tanggal Terkini:</th>
                                                    <td id="currentDate"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Total Tagihan:</th>
                                                    <td><?php echo 'Rp ' . number_format($harga, 0, ',', '.'); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>

    <script>
        const currentDateElement = document.getElementById('currentDate');

        const currentDate = new Date();

        const formattedDate = currentDate.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        currentDateElement.textContent = formattedDate;
    </script>
</body>

</html>