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
    <div class="card shadow-lg bg-light kotak">
        <div class="card-body text-center">
            <h3 class="card-text">Edit Data Layanan</h3>
            <?php
            if (isset($_POST["tblEdit"])) {
                $db = dbConnect();
                // BEGIN VALIDASI
                $pesansalah = "";
                //validasi Nama Layanan
                $NamaLayanan = $db->escape_string(trim($_POST["NamaLayanan"]));
                if (strlen($NamaLayanan) == 0 || is_numeric($NamaLayanan)) {
                    $pesansalah .= "Nama Layanan tidak boleh kosong, dan tidak boleh angka!!<br>";
                }
                // validasi Harga
                $Harga = $db->escape_string($_POST["Harga"]);
                if ((!is_numeric($Harga)) && ($Harga == 0)) {
                    $pesansalah .= "Harga harus berupa angka, Dan tidak boleh kosong!!<br>";
                }
                //SHOW PESAN SALAH
                if ($pesansalah == "") {
            ?>
                    <p class="card-text">Semua data valid.</p>
                    <?php
                    if ($db->connect_errno == 0) {
                        $IdLayanan = $db->escape_string($_POST["IdLayanan"]);
                        $sql = "UPDATE layanan SET
                                    IdLayanan = '$IdLayanan', NamaLayanan = '$NamaLayanan', Harga ='$Harga'
                                    WHERE IdLayanan = '$IdLayanan'
                                ";
                        $res = $db->query($sql);
                        if ($res) {
                            if ($db->affected_rows > 0) {
                    ?>
                                <p class="card-text">Data berhasil di update.</p>
                                <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
                            <?php
                            } else {
                            ?>
                                <p class="card-text">Data berhasil di update, tanpa perubahan data.</p>
                                <a href="javascript:history.back()" class="btn btn-primary">Edit Kembali</a>
                                <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
                            <?php
                            }
                        } else {
                            ?>
                            <p class="card-text">Data gagal di simpan.</p>
                            <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                    <?php
                            echo "Error : " . $db->error;
                        }
                    } else {
                        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
                    }
                } else {
                    ?>
                    <p class="card-text">Terjadi kesalah berikut : <br></p>
                    <p class="card-text"><?= $pesansalah; ?></p>
                    <a href="javascript:history.back()" class="btn btn-primary">Kembali Ke Form</a>
                <?php
                }
                // END VALIDASI
            } else {
                ?>
                <p class="card-text">Belum ada data yang dipilih. <br>Edit data melalui tombol edit di tampilan list data layanan !!!</p>
                <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>