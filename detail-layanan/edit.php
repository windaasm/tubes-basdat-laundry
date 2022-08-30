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
                <h3 class="text-center">Edit Data Detail Layanan</h3>
                <?php
                if (isset($_GET["id"])) {
                    $db = dbConnect();
                    $id = $db->escape_string($_GET["id"]);
                    if ($dataDetailLayanan = getDataDetailLayanan($id)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Detail Layanan</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <input type="hidden" name="id" value="<?= $dataDetailLayanan["id"]; ?>">
                            <div class="form-row">
                                <!-- No Order -->
                                <div class="form-group col-md-4">
                                    <label for="NoOrder">No Order</label>
                                    <input type="text" class="form-control" id="Jumlah" name="Jumlah" placeholder="0" value="<?= $dataDetailLayanan["NoOrder"]; ?>" readonly>
                                </div>
                                <!-- Id Layanan -->
                                <div class="form-group col-md-4">
                                    <label for="IdLayanan">Id Layanan</label>
                                    <select class="form-control" id="IdLayanan" name="IdLayanan">
                                        <?php
                                        $dataLayanan = getListLayanan();
                                        foreach ($dataLayanan as $data) {
                                            echo "<option value=\"" . $data["IdLayanan"] . "\"";
                                            if ($data["IdLayanan"] == $dataDetailLayanan["IdLayanan"]) {
                                                echo " selected";
                                            }
                                            echo ">" . $data["NamaLayanan"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="text-center">Barang dengan Nama Barang : <? $IdBarang; ?> tidak ditemukan. Edit Batal!</p>
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