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
                <h3 class="text-center">Tambah Data Layanan</h3>
                <a href="viewdata.php" class="btn btn-primary mb-3">View Data Layanan</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Layanan -->
                        <div class="form-group col-md-4">
                            <label for="IdLayanan">Id Layanan</label>
                            <input type="text" class="form-control" id="IdLayanan" name="IdLayanan" placeholder="Format ID layanan huruf L diikuti 2 angka. Contoh L12">
                        </div>
                        <!-- Nama Layanan -->
                        <div class="form-group col-md-4">
                            <label for="NamaLayanan">Nama Layanan</label>
                            <input type="text" class="form-control" id="NamaLayanan" name="NamaLayanan" placeholder="Nama Layanan">
                        </div>
                        <!-- Harga -->
                        <div class="form-group col-md-4">
                            <label for="Harga">Harga</label>
                            <input type="text" class="form-control" id="Harga" name="Harga" placeholder="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>