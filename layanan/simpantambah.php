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
            <h3 class="card-text">Tambah Data Layanan</h3>
            <?php
            if (isset($_POST["tblTambah"])) {
                $db = dbConnect();
                // BEGIN VALIDASI
                $pesansalah = "";
                //validasi IdLayanan
                $IdLayanan = $db->escape_string(trim($_POST["IdLayanan"]));
                if ((strlen($IdLayanan) < 1) || (strlen($IdLayanan) > 3) || (strlen($IdLayanan) == 0)) {
                    $pesansalah .= "Id Layanan tidak sah. Dan tidak boleh kosong!!<br>";
                } else {
                    $res = $db->query("SELECT COUNT(*) banyakData FROM layanan WHERE IdLayanan = '$IdLayanan'");
                    if ($res) {
                        $data = $res->fetch_assoc();
                        if ($data["banyakData"]) {
                            $pesansalah .= "Id Layanan sudah ada dalam data.<br>";
                        } elseif (substr($IdLayanan, 0, 1) != 'L' || !is_numeric(substr($IdLayanan, 1))) {
                            $pesansalah .= "Id Layanan harus diawali dengan L kemduian angka!!<br>";
                        }
                    } else {
                        $pesansalah .= "Data tidak ditemukan.<br>";
                    }
                }
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
                        $sql = "INSERT INTO layanan(IdLayanan, NamaLayanan, Harga)
                                    VALUES('$IdLayanan', '$NamaLayanan', '$Harga')
                                ";
                        $res = $db->query($sql);
                        if ($res) {
                            if ($db->affected_rows > 0) {
                    ?>
                                <p class="card-text">Data berhasil di simpan.</p>
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
                <p class="card-text">Belum ada data yang dimasukkan. <br>Isi data terlebih dahulu melalui form !!!</p>
                <a href="tambahdata.php" class="btn btn-primary">Tambah Data Layanan</a>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>