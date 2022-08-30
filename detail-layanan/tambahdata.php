<?php
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Detail Layanan";
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
                <h3 class="text-center">Tambah Data Detail Layanan</h3>
                <a href="viewdata.php" class="btn btn-primary mb-3">View Data Detail Layanan</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Layanan -->
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
                        <!-- Nama Layanan -->
                        <div class="form-group col-md-4">
                            <label for="IdLayanan">Nama Layanan</label>
                            <select class="form-control" id="IdLayanan" name="IdLayanan">
                                <option value="">Pilih Nama Layanan</option>
                                <?php
                                $dataLayanan = getListLayanan();
                                foreach ($dataLayanan as $data) {
                                    echo "<option value=\"" . $data["IdLayanan"] . "\">" . $data["NamaLayanan"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>