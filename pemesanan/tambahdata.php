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
                <h3 class="text-center">Tambah Data Pemesanan</h3>
                <a href="viewdata.php" class="btn btn-primary mb-3">View Data Pemesanan</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- No Order -->
                        <div class="form-group col-md-6">
                            <label for="NoOrder">No Order</label>
                            <input type="text" class="form-control" id="NoOrder" name="NoOrder" placeholder="Format no order harus berupa angka">
                        </div>
                        <!-- Nama Pelanggan -->
                        <div class="form-group col-md-6">
                            <label for="IdPelanggan">Nama Pelanggan</label>
                            <select class="form-control" id="IdPelanggan" name="IdPelanggan">
                                <option value="">Pilih Nama Pelanggan</option>
                                <?php
                                $dataPelanggan = getListPelanggan();
                                foreach ($dataPelanggan as $data) {
                                    echo "<option value=\"" . $data["IdPelanggan"] . "\">" . $data["Nama"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- TANGGAL MASUK -->
                        <div class="form-group col-md-2">
                            <label for="tglMasuk">Tanggal Masuk</label>
                            <select id="tglMasuk" class="form-control" name="tglMasuk">
                                <option value="">--</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++)
                                    echo "<option value=\"$i\">$i</option>\n";
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="blnMasuk">Bulan Masuk</label>
                            <select id="blnMasuk" class="form-control" name="blnMasuk">
                                <option value="">--</option>
                                <?php
                                $arBulan = array(
                                    1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                );
                                foreach ($arBulan as $no => $nama)
                                    echo "<option value=\"$no\">$nama</option>\n";
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="thnMasuk">Tahun Masuk</label>
                            <select id="thnMasuk" class="form-control" name="thnMasuk">
                                <option value="">--</option>
                                <?php
                                for ($i = 2022; $i >= 2015; $i--)
                                    echo "<option value=\"$i\">$i</option>\n";
                                ?>
                            </select>
                        </div>
                        <!-- TANGGAL KELUAR -->
                        <div class="form-group col-md-2">
                            <label for="tglSelesai">Tanggal Selesai</label>
                            <select id="tglSelesai" class="form-control" name="tglSelesai">
                                <option value="">--</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++)
                                    echo "<option value=\"$i\">$i</option>\n";
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="blnSelesai">Bulan Selesai</label>
                            <select id="blnSelesai" class="form-control" name="blnSelesai">
                                <option value="">--</option>
                                <?php
                                $arBulan = array(
                                    1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                );
                                foreach ($arBulan as $no => $nama)
                                    echo "<option value=\"$no\">$nama</option>\n";
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="thnSelesai">Tahun Selesai</label>
                            <select id="thnSelesai" class="form-control" name="thnSelesai">
                                <option value="">--</option>
                                <?php
                                for ($i = 2022; $i >= 2015; $i--)
                                    echo "<option value=\"$i\">$i</option>\n";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Berat -->
                        <div class="form-group col-md-6">
                            <label for="Berat">Berat (kg)</label>
                            <input type="text" class="form-control" id="Berat" name="Berat" placeholder="0" maxlength="7">
                        </div>
                        <!-- Total Harga -->
                        <div class="form-group col-md-6">
                            <label for="TotalHarga">Total Harga</label>
                            <input type="text" class="form-control" id="TotalHarga" name="TotalHarga" placeholder="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>