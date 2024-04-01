
<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">

    <title></title>
</head>

<body>

    <?php
    include "koneksi.php";
    $db = new koneksi;
    $id = $_GET['id_muzakki'];
    $query = "select * from muzakki where id_muzakki = '$id'";
    $no = 1;
    foreach ($db->tampilData($query) as $row) {
        ?>
        <form action="" name="edit" method="post">
            <div class="card col-6 mt-2 ms-2">
                <div class="card-header" style="font-size: 25px; text-align: center; font-weight: bold; color: white;">
                    Edit Data Muzakki
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 20px; color : white; padding: 5px;">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" style="width: 524px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 20px; color : white;">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control"
                            value="<?php echo $row['alamat']; ?>" style="width: 524px;">
                    </div>
                    <div class="col-6"><label class="form-label" style="font-size: 20px; color : white;">Jumlah Jiwa</label>
                        <div class="col-6">
                            <select name="jml_jiwa" id="jml_jiwa" style="width: 600px;">
                                <option value="<?php echo $row['jml_jiwa'] ?>"><?php echo $row['jml_jiwa']; ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6"><label class="form-label" style="font-size: 20px; color : white;">Harga Beras</label>
                        <div class="col-6">
                            <select name="id_beras" id="id_beras" style="width: 600px;">
                                <?php
                                $query2 = "select * from muzakki, beras where muzakki.id_beras=beras.id";
                                foreach ($db->tampilData($query2) as $row) {
                                    ?>
                                <option value="<?php echo $row['id_beras'] ?>"><?php echo $row['harga_ltr'] ?></option>
                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['harga_ltr'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="simpan" value="simpan" class="btn btn-info">
                        <input type="reset" name="hapus" value="hapus" class="btn btn-secondary">
                    </div>
                </div>
            </div>
        </form>
    <?php }
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jml_jiwa = $_POST['jml_jiwa'];
        $id_beras = $_POST['id_beras'];
        $db->editmuzakki($nama,$alamat, $jml_jiwa, $id_beras, $id);
        header("location: muzakki.php", true, 301);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>