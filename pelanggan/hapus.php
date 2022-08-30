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
                <h3 class="text-center">Hapus Data Pelanggan</h3>
                <?php
                if (isset($_GET["IdPelanggan"])) {
                    $db = dbConnect();
                    $IdPelanggan = $db -> escape_string($_GET["IdPelanggan"]);
                    if ($dataPelanggan = getDataPelanggan($IdPelanggan)) {
                        ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Pelanggan</a>
                        <form method="POST" name="form" action="simpanhapus.php">
                            <div class="form-row">
                                <!-- Id Pelanggan -->
                                <div class="form-group col-md-4">
                                    <label for="IdPelanggan">Id Pelanggan</label>
                                    <input type="text" class="form-control" id="IdPelanggan" name="IdPelanggan" value="<?= $dataPelanggan["IdPelanggan"]; ?>" readonly>
                                </div>
                                <!-- Nama Pelanggan -->
                                <div class="form-group col-md-4">
                                    <label for="Nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $dataPelanggan["Nama"]; ?>" readonly>
                                </div>
                                <!-- No Hp -->
                                <div class="form-group col-md-4">
                                    <label for="NoHp">No Handphone [Format : 081234xxxx]</label>
                                    <input type="text" class="form-control" id="NoHp" name="NoHp" value="<?= $dataPelanggan["NoHp"]; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Alamat Lengkap -->
                                <div class="form-group col">
                                    <label for="Alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?= $dataPelanggan["Alamat"]; ?>" readonly>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <p class="text-center">Pelanggan dengan Id Pelanggan : <?$IdPelanggan;?> tidak ditemukan. Hapus Batal!</p>
                        <?php
                    }
                } else {
                    ?>
                    <p class="text-center">Id Pelanggan tidak ada. Hapus Batal!</p>
                    <?php
                }
                ?>
                
            </div>
        </div>  
    </div>    
</body>
</html>