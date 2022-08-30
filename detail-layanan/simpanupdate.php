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
            <h3 class="card-text">Edit Data Detail Layanan</h3>
            <?php 
                if (isset($_POST["tblEdit"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    $NoOrder = $db -> escape_string($_POST["NoOrder"]);
                    if ($NoOrder == "") {
                        $pesansalah .= "Harus memilih No Order!!<br>";
                    }

                    //Validasi NamaBarang
                    $IdLayanan = $db -> escape_string($_POST["IdLayanan"]);
                    if ($IdLayanan == "") {
                        $pesansalah .= "Harus memilih Nama Layanan!!<br>";
                    }

                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $NoOrder = $db -> escape_string($_POST["NoOrder"]);
                            $IdLayanan = $db -> escape_string($_POST["IdLayanan"]);
                            $id = $db -> escape_string($_POST["id"]);
                            $sql = "UPDATE detail_Layanan SET
                                    NoOrder = '$NoOrder', IdLayanan = '$IdLayanan'
                                    WHERE id = '$id'
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di update.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="card-text">Data berhasil di update, tanpa perubahan data.</p>
                                    <a href="javascript:history.back()" class="btn btn-primary">Edit Kembali</a>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
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
                    <p class="card-text">Belum ada data yang dipilih. <br>Edit data melalui tombol edit di tampilan list data detail layanan !!!</p>
                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>