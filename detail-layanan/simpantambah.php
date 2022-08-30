<?php
include_once("../functions.php");
session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../head.php" ?>
</head>

<body class="bg-light">
    <div class="card shadow-lg bg-light kotak">
        <div class="card-body text-center">
            <h3 class="card-text">Tambah Data Detail Layanan</h3>
            <?php
            if (isset($_POST["tblTambah"])) {
                $db = dbConnect();
                // BEGIN VALIDASI
                $pesansalah = "";
                //validasi NoOrder
                $NoOrder = $db->escape_string($_POST["NoOrder"]);
                if ($NoOrder == "") {
                    $pesansalah .= "Harus memilih No Order!!<br>";
                }

                //Validasi NamaBarang
                $IdLayanan = $db->escape_string($_POST["IdLayanan"]);
                if ($IdLayanan == "") {
                    $pesansalah .= "Harus memilih Nama Layanan!!<br>";
                }

                //SHOW PESAN SALAH
                if ($pesansalah == "") {
            ?>
                    <p class="card-text">Semua data valid.</p>
                    <?php
                    if ($db->connect_errno == 0) {
                        $NoOrder = $db->escape_string($_POST["NoOrder"]);
                        $IdLayanan = $db->escape_string($_POST["IdLayanan"]);
                        $sql = "INSERT INTO detail_Layanan(NoOrder, IdLayanan)
                                    VALUES('$NoOrder', '$IdLayanan')
                                ";
                        $res = $db->query($sql);
                        if ($res) {
                            if ($db->affected_rows > 0) {
                    ?>
                                <p class="card-text">Data berhasil di simpan.</p>
                                <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
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
                    <p class="card-text">Terjadi kesalahan berikut : <br></p>
                    <p class="card-text"><?= $pesansalah; ?></p>
                    <a href="javascript:history.back()" class="btn btn-primary">Kembali Ke Form</a>
                <?php
                }
                // END VALIDASI
            } else {
                ?>
                <p class="card-text">Belum ada data yang dimasukkan. <br>Isi data terlebih dahulu melalui form !!!</p>
                <a href="tambahdata.php" class="btn btn-primary">Tambah Data Detail Layanan</a>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>