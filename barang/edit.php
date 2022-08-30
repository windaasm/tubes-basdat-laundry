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
            <div class="col-10">
                <h3 class="text-center">Edit Data Barang</h3>
                <?php
                if (isset($_GET["IdBarang"])) {
                    $db = dbConnect();
                    $IdBarang = $db->escape_string($_GET["IdBarang"]);
                    if ($dataBarang = getDataBarang($IdBarang)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Barang</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <div class="form-row">
                                <!-- Id Barang -->
                                <div class="form-group col-md-4">
                                    <label for="IdBarang">Id Barang</label>
                                    <input type="text" class="form-control" id="IdBarang" name="IdBarang" placeholder="Id Barang" value="<?= $dataBarang["IdBarang"]; ?>" readonly>
                                </div>
                                <!-- Nama Barang -->
                                <div class="form-group col-md-4">
                                    <label for="NamaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang" value="<?= $dataBarang["NamaBarang"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="text-center">Barang dengan Id Barang : <? $IdBarang; ?> tidak ditemukan. Edit Batal!</p>
                    <?php
                    }
                } else {
                    ?>
                    <p class="text-center">Id Layanan tidak ada. Edit Batal!</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>