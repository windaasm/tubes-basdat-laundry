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
                <h3 class="text-center">Tambah Data Barang</h3>
                <a href="viewdata.php" class="btn btn-primary mb-3">View Data Barang</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Barang -->
                        <div class="form-group col-md-4">
                            <label for="IdBarang">Id Barang</label>
                            <input type="text" class="form-control" id="IdBarang" name="IdBarang" placeholder="Format ID barang huruf B diikuti angka. Contoh B12">
                        </div>
                        <!-- Nama Barang -->
                        <div class="form-group col-md-4">
                            <label for="NamaBarang">Nama Barang</label>
                            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>