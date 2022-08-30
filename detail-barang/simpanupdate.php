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
            <h3 class="card-text">Edit Data Detail Barang</h3>
            <?php 
                if (isset($_POST["tblEdit"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    //validasi NoOrder
                    $NoOrder = $db -> escape_string($_POST["NoOrder"]);
                    if ($NoOrder == "") {
                        $pesansalah .= "Harus memilih No Order!!<br>";
                    }
                    //Validasi NamaBarang
                    $IdBarang = $db -> escape_string($_POST["IdBarang"]);
                    if ($IdBarang == "") {
                        $pesansalah .= "Harus memilih Nama Barang!!<br>";
                    }

                    // validasi Jumlah
                    $Jumlah = $db -> escape_string($_POST["Jumlah"]);
                    if ((!is_numeric($Jumlah)) && ($Jumlah == 0)) {
                        $pesansalah .= "Jumlah harus berupa angka, Dan tidak boleh kosong!!<br>";
                    }

                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $id = $db -> escape_string($_POST["id"]);
                            $sql = "UPDATE detail_barang SET
                                    NoOrder = '$NoOrder', IdBarang = '$IdBarang', Jumlah = '$Jumlah'
                                    WHERE id = '$id'
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di update.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Barang</a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="card-text">Data berhasil di update, tanpa perubahan data.</p>
                                    <a href="javascript:history.back()" class="btn btn-primary">Edit Kembali</a>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Barang</a>
                                    <?php
                                }
                            } else {
                                ?>
                                <p class="card-text">Data gagal di simpan.</p>
                                <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                                <?php
                                echo "Error : " . $db -> error;
                            }
                        } else {
                            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db -> connect_error : "") . "<br>";
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
                    <p class="card-text">Belum ada data yang dipilih. <br>Edit data melalui tombol edit di tampilan list data detail barang !!!</p>
                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Barang</a>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>