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
                <h3 class="text-center">Hapus Data Detail Barang</h3>
                <?php
                if (isset($_GET["id"])) {
                    $db = dbConnect();
                    $id = $db->escape_string($_GET["id"]);
                    if ($dataDetailBarang = getDataDetailBarang($id)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Detail Barang</a>
                        <form method="POST" name="form" action="simpanhapus.php">
                            <input type="hidden" name="id" value="<?= $dataDetailBarang["id"]; ?>">
                            <div class="form-row">
                                <!-- No Order -->
                                <div class="form-group col-md-4">
                                    <label for="IdBarang">Id Barang</label>
                                    <input type="text" class="form-control" id="NoOrder" name="NoOrder" value="<?= $dataDetailBarang["NoOrder"]; ?>" readonly>
                                </div>
                                <!-- Id Barang -->
                                <div class="form-group col-md-4">
                                    <label for="IdBarang">Id Barang</label>
                                    <input type="text" class="form-control" id="IdBarang" name="IdBarang" value="<?= $dataDetailBarang["IdBarang"]; ?>" readonly>
                                </div>
                                <!-- Jumlah -->
                                <div class="form-group col-md-4">
                                    <label for="Jumlah">Jumlah</label>
                                    <input type="text" class="form-control" id="Jumlah" name="Jumlah" value="<?= $dataDetailBarang["Jumlah"]; ?>" readonly>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="text-center">Barang dengan Id Barang : <? $IdBarang; ?> tidak ditemukan. Hapus Batal!</p>
                    <?php
                    }
                } else {
                    ?>
                    <p class="text-center">IdBarang tidak ada. Hapus Batal!</p>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>