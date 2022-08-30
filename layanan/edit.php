<?php
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Layanan";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../head.php"); ?>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once("../navbar.php"); ?>
            </div>
            <div class="col-10">
                <h3 class="text-center">Edit Data Layanan</h3>
                <?php
                if (isset($_GET["IdLayanan"])) {
                    $db = dbConnect();
                    $IdLayanan = $db->escape_string($_GET["IdLayanan"]);
                    if ($dataLayanan = getDataLayanan($IdLayanan)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Layanan</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <div class="form-row">
                                <!-- Id Layanan -->
                                <div class="form-group col-md-4">
                                    <label for="IdLayanan">Id Layanan</label>
                                    <input type="text" class="form-control" id="IdLayanan" name="IdLayanan" placeholder="Id Layanan" value="<?= $dataLayanan["IdLayanan"]; ?>" readonly>
                                </div>
                                <!-- Nama Layanan -->
                                <div class="form-group col-md-4">
                                    <label for="NamaLayanan">Nama Layanan</label>
                                    <input type="text" class="form-control" id="NamaLayanan" name="NamaLayanan" placeholder="Nama Layanan" value="<?= $dataLayanan["NamaLayanan"]; ?>">
                                </div>
                                <!-- Harga -->
                                <div class="form-group col-md-4">
                                    <label for="Harga">Harga</label>
                                    <input type="text" class="form-control" id="Harga" name="Harga" placeholder="0" value="<?= $dataLayanan["Harga"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="text-center">Layanan dengan Id Layanan : <? $IdLayanan; ?> tidak ditemukan. Edit Batal!</p>
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