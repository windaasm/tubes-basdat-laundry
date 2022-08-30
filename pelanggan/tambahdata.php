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
                <h3 class="text-center">Tambah Data Pelanggan</h3>
                <a href="viewdata.php" class="btn btn-primary mb-3">View Data Pelanggan</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Pelanggan -->
                        <div class="form-group col-md-4">
                            <label for="IdPelanggan">Id Pelanggan</label>
                            <input type="text" class="form-control" id="IdPelanggan" name="IdPelanggan" placeholder="Diisi huruf P diikuti 4 angka. Contoh P1234">
                        </div>
                        <!-- Nama Pelanggan -->
                        <div class="form-group col-md-4">
                            <label for="Nama">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama Pelanggan">
                        </div>
                        <!-- No Hp -->
                        <div class="form-group col-md-4">
                            <label for="NoHp">No Handphone [Format : 081234xxxx]</label>
                            <input type="text" class="form-control" id="NoHp" name="NoHp" placeholder="081234xxxx">
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Alamat Lengkap -->
                        <div class="form-group col">
                            <label for="Alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Lengkap">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>