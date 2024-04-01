<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Muzakki</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
    <?php
    include "koneksi.php";
    $db = new koneksi;
    ?>
    <div class="full_container">
        <div class="inner_container">
            <?php include "navbar.php"; ?>
            <div id="content">
                <?php include "topbar.php"; ?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                                    <div class="row">
                                        <div class="col-9">
                                            <h3 class="text-start">Data Muzakki</h3>
                                        </div>
                                        <div class="col-3">
                                            <p class="text-end"><a href="tambahdata.php" class="btn btn-success">Tambah Data</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Jumlah Jiwa</th>
                                                    <th>Beras Pilihan</th>
                                                    <th>Tagihan</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "select * from muzakkitransaksi, beras WHERE muzakkitransaksi.id_beras = beras.id";
                                                $no = 1;
                                                foreach ($db->tampilData($query) as $row) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date('F j, Y'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['nama']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['alamat']; ?>
                                                        </td>
                                                        <td align="center">
                                                            <?php echo $row['jml_jiwa']; ?>
                                                        </td>
                                                        <td align="center">
                                                            Rp. <?php echo number_format($row['harga_ltr']); ?>/Ltr
                                                        </td>
                                                        <td align="center">
                                                            Rp. <?php echo number_format($row['tagihan']); ?>
                                                        </td>
                                                        <td align="center">
                                                            <?php echo $row['status']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="editdata.php?id=<?php echo $row['id']; ?>"
                                                                class="btn btn-warning">Edit</a>
                                                            <a href="hapus.php?id=<?php echo $row['id']; ?>"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure?')">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/animate.js"></script>
    <!-- select country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="js/chart_custom_style1.js"></script>
</body>

</html>