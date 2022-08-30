<?php 
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Pelanggan";
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
                <h3 class="text-center">Edit Data Pelanggan</h3>
                <?php
                if (isset($_GET["IdPelanggan"])) {
                    $db = dbConnect();
                    $IdPelanggan = $db->escape_string($_GET["IdPelanggan"]);
                    if ($dataPelanggan = getDataPelanggan($IdPelanggan)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Pelanggan</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <div class="form-row">
                                <!-- Id Pelanggan -->
                                <div class="form-group col-md-4">
                                    <label for="IdPelanggan">Id Pelanggan</label>
                                    <input type="text" class="form-control" id="IdPelanggan" name="IdPelanggan" placeholder="Id Pelanggan" value="<?= $dataPelanggan["IdPelanggan"]; ?>" readonly>
                                </div>
                                <!-- Nama Pelanggan -->
                                <div class="form-group col-md-4">
                                    <label for="Nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama Pelanggan" value="<?= $dataPelanggan["Nama"]; ?>">
                                </div>
                                <!-- No Hp -->
                                <div class="form-group col-md-4">
                                    <label for="NoHp">No Handphone [Format : 081234xxxx]</label>
                                    <input type="text" class="form-control" id="NoHp" name="NoHp" placeholder="081234xxxx" value="<?= $dataPelanggan["NoHp"]; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Alamat Lengkap -->
                                <div class="form-group col">
                                    <label for="Alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Lengkap" value="<?= $dataPelanggan["Alamat"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="text-center">Pelanggan dengan Id Pelanggan : <? $IdPelanggan; ?> tidak ditemukan. Edit Batal!</p>
                    <?php
                    }
                } else {
                    ?>
                    <p class="text-center">Id Pelanggan tidak ada. Edit Batal!</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>