<?php 
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Pemesanan";
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
                <h3 class="text-center">Hapus Data Pemesanan</h3>
                <?php
                if (isset($_GET["NoOrder"])) {
                    $db = dbConnect();
                    $NoOrder = $db -> escape_string($_GET["NoOrder"]);
                    if ($dataPemesanan = getDataPemesanan($NoOrder)) {
                        ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Pemesanan</a>
                        <form method="POST" name="form" action="simpanhapus.php">
                            <div class="form-row">
                                <!-- No Order -->
                                <div class="form-group col-md-6">
                                    <label for="NoOrder">No Order</label>
                                    <input type="text" class="form-control" id="NoOrder" name="NoOrder"
                                    value="<?= $dataPemesanan["NoOrder"]; ?>" readonly>
                                </div>
                                <!-- Nama Pelanggan -->
                                <div class="form-group col-md-6">
                                    <label for="IdPelanggan">Nama Pelanggan</label>
                                    <select class="form-control" id="IdPelanggan" name="IdPelanggan" disabled>
                                        <option>Pilih Nama Pelanggan</option>
                                        <?php
                                            $dataPelanggan = getListPelanggan();
                                            foreach ($dataPelanggan as $data) {
                                                echo "<option value=\"" . $data["IdPelanggan"] . "\"";
                                                if ($data["IdPelanggan"] == $dataPemesanan["IdPelanggan"]) {
                                                    echo " selected";
                                                }
                                                echo ">" . $data["Nama"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- TANGGAL MASUK -->
                                <div class="form-group col-md-2">
                                    <label for="tglMasuk">Tanggal Masuk</label>
                                    <select id="tglMasuk" class="form-control" name="tglMasuk" disabled>
                                        <option>--</option>
                                        <?php
                                            for($i = 1;$i <= 31;$i++) {
                                                echo "<option value=\"$i\"";
                                                if ($i == substr($dataPemesanan["TglMasuk"], 8)) {
                                                    echo " selected";
                                                }
                                                echo ">$i</option>\n";
                                            }
                                        ?>
                                    </select> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="blnMasuk">Bulan Masuk</label>
                                    <select id="blnMasuk" class="form-control" name="blnMasuk" disabled>
                                        <option>--</option>
                                        <?php
                                            $arBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                                                "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                            foreach($arBulan as $no => $nama) {
                                                echo "<option value=\"$no\"";
                                                if ($no == intval(substr($dataPemesanan["TglMasuk"], 5, 2))) {
                                                    echo " selected";
                                                }
                                                echo ">$nama</option>\n";
                                            }
                                        ?>	
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="thnMasuk">Tahun Masuk</label>
                                    <select id="thnMasuk" class="form-control" name="thnMasuk" disabled>
                                        <option>--</option>
                                        <?php
                                            for($i = 2022; $i >= 2015; $i--) {
                                                echo "<option value=\"$i\"";
                                                if ($i == substr($dataPemesanan["TglMasuk"], -10, -6)) {
                                                    echo " selected";
                                                }
                                                echo ">$i</option>\n";
                                            }
                                        ?>	
                                    </select>
                                </div>
                                <!-- TANGGAL KELUAR -->
                                <div class="form-group col-md-2">
                                    <label for="tglSelesai">Tanggal Selesai</label>
                                    <select id="tglSelesai" class="form-control" name="tglSelesai" disabled>
                                        <option>--</option>
                                        <?php
                                            for($i = 1;$i <= 31;$i++) {
                                                echo "<option value=\"$i\"";
                                                if ($i == substr($dataPemesanan["TglSelesai"], 8)) {
                                                    echo " selected";
                                                }
                                                echo ">$i</option>\n";
                                            }
                                        ?>
                                    </select> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="blnSelesai">Bulan Selesai</label>
                                    <select id="blnSelesai" class="form-control" name="blnSelesai" disabled>
                                        <option>--</option>
                                        <?php
                                            $arBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                                                "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                            foreach($arBulan as $no => $nama) {
                                                echo "<option value=\"$no\"";
                                                if ($no == intval(substr($dataPemesanan["TglSelesai"], 5, 2))) {
                                                    echo " selected";
                                                }
                                                echo ">$nama</option>\n";
                                            }
                                        ?>	
                                    </select> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="thnSelesai">Tahun Selesai</label>
                                    <select id="thnSelesai" class="form-control" name="thnSelesai" disabled>
                                        <option>--</option>
                                        <?php
                                            for($i = 2022;$i >= 2015;$i--) {
                                                echo "<option value=\"$i\"";
                                                if ($i == substr($dataPemesanan["TglSelesai"], -10, -6)) {
                                                    echo " selected";
                                                }
                                                echo ">$i</option>\n";
                                            }
                                        ?>	
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Berat -->
                                <div class="form-group col-md-6">
                                    <label for="Berat">Berat (kg)</label>
                                    <input type="text" class="form-control" id="Berat" name="Berat" value="<?= $dataPemesanan["Berat"]; ?>" readonly>
                                </div>
                                <!-- Total Harga -->
                                <div class="form-group col-md-6">
                                    <label for="TotalHarga">Total Harga</label>
                                    <input type="text" class="form-control" id="TotalHarga" name="TotalHarga" value="<?= $dataPemesanan["TotalHarga"]; ?>" readonly>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <p class="text-center">Pemesanan dengan No Order : <?$NoOrder;?> tidak ditemukan. Hapus Batal!</p>
                        <?php
                    }
                } else {
                    ?>
                    <p class="text-center">No Order tidak ada. Hapus Batal!</p>
                    <?php
                }
                ?>
                
            </div>
        </div>  
    </div>    
</body>
</html>