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
    <div class="card shadow-lg bg-light kotak">
        <div class="card-body text-center">
            <h3 class="card-text">Hapus Data Pelanggan</h3>
            <?php
            if (isset($_POST["tblHapus"])) {
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $IdPelanggan = $db->escape_string($_POST["IdPelanggan"]);
                    $sql = "DELETE FROM pelanggan WHERE IdPelanggan = '$IdPelanggan'";
                    $res = $db->query($sql);
                    if ($res) {
                        if ($db->affected_rows > 0) {
            ?>
                            <p class="text-center">Data berhasil di hapus!</p>
                        <?php
                        } else {
                        ?>
                            <p class="text-center">Data tidak ada. Penghapusan gagal!</p>
                        <?php
                        }
                    } else {
                        ?>
                        <p class="text-center">Data gagal di hapus!</p>
                    <?php
                    }
                    ?>
                    <a href="viewdata.php" class="btn btn-primary">View Data Pelanggan</a>
            <?php
                } else {
                    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
                }
            } else {
                ?>
                <p class="card-text">Belum ada data yang dipilih. <br>Hapus data melalui tombol hapus di tampilan list data pelanggan !!!</p>
                <a href="viewdata.php" class="btn btn-primary">View Data Pelanggan</a>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>