<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">
    <title>Tambah Transaksi</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="" name="tambah" method="post">
                <div class="col-6"><label for="" style="font-size: 20px; color: white;"> Muzakki</label></div>
                <div class="col-6">
                    <select name="id_muzakki" id="id_muzakki" onchange="total()" style="width: 600px;">
                        <option value="">-Pilih-</option>
                        <?php
                        include "koneksi.php";
                        $db = new koneksi;
                        $query = "select * from muzakki, beras WHERE muzakki.id_beras = beras.id";
                        foreach ($db->tampilData($query) as $row) {
                            ?>

                            <option value="<?php echo $row['id_muzakki']; ?>">
                                <?php echo $row['nama'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6"><label for="" style="font-size: 20px; color: white;">Tagihan</label></div>
                <div class="col-6"><input type="text" name="tagihan" id="tagihan" readonly style="width: 600px;"></div>
                <div class="col-6"><label for="" style="font-size: 20px; color: white;">Status</label></div>
                <div class="col-6">
                    <select name="status" id="status" style="width: 600px;">
                        <option value="">-Pilih-</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum">Belum</option>
                    </select>
                </div>

                <div class="col-6 mt-2"><input type="submit" name="simpan" value="simpan"> <input type="reset"
                        value="hapus"></div>
            </form>

        </div>
    </div>
    <script type="text/javascript">
        function total() {
            var total = (<?php echo $row['harga_ltr']; ?> * 3.5) * <?php echo $row['jml_jiwa']; ?>

            document.getElementById('tagihan').value =  total;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <?php
    if (isset($_POST['simpan'])) {
        $id_muzakki = $_POST['id_muzakki'];
        $tagihan = $_POST['tagihan'];
        $status = $_POST['status'];
        $db->tambahtransaksi($id_muzakki, $tagihan, $status);
        header("location: transaksi.php", true, 301);
    }
    ?>
</body>

</html>