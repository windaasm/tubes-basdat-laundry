<?php
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Barang";
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
                <h3 class="text-center">Hapus Data Barang</h3>
                <?php
                if (isset($_GET["IdBarang"])) {
                    $db = dbConnect();
                    $IdBarang = $db->escape_string($_GET["IdBarang"]);
                    if ($dataBarang = getDataBarang($IdBarang)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Barang</a>
                        <form method="POST" name="form" action="simpanhapus.php">
                            <div class="form-row">
                                <!-- Id Barang -->
                                <div class="form-group col-md-4">
                                    <label for="IdBarang">Id Barang</label>
                                    <input type="text" class="form-control" id="IdBarang" name="IdBarang" value="<?= $dataBarang["IdBarang"]; ?>" readonly>
                                </div>
                                <!-- Nama Barang -->
                                <div class="form-group col-md-4">
                                    <label for="NamaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" value="<?= $dataBarang["NamaBarang"]; ?>" readonly>
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