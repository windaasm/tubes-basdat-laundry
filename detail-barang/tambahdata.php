<?php
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Detail Barang";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../head.php" ?>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once "../navbar.php" ?>
            </div>
            <div class="col">
                <h3 class="text-center">Tambah Data Detail Barang</h3>
                <a href="viewdata.php" class="btn btn-primary mb-3">View Data Detail Barang</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Barang -->
                        <div class="form-group col-md-4">
                            <label for="NoOrder">No Order</label>
                            <select class="form-control" id="NoOrder" name="NoOrder">
                                <option value="">Pilih No Order</option>
                                <?php
                                $dataPemesanan = getListPemesanan();
                                foreach ($dataPemesanan as $data) {
                                    echo "<option value=\"" . $data["NoOrder"] . "\">" . $data["NoOrder"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Nama Barang -->
                        <div class="form-group col-md-4">
                            <label for="IdBarang">Nama Barang</label>
                            <select class="form-control" id="IdBarang" name="IdBarang">
                                <option value="">Pilih Nama Barang</option>
                                <?php
                                $dataBarang = getListBarang();
                                foreach ($dataBarang as $data) {
                                    echo "<option value=\"" . $data["IdBarang"] . "\">" . $data["NamaBarang"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="Jumlah" name="Jumlah" placeholder="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>