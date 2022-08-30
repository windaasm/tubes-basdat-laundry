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
            <h3 class="card-text">Tambah Data Barang</h3>
            <?php
            if (isset($_POST["tblTambah"])) {
                $db = dbConnect();
                // BEGIN VALIDASI
                $pesansalah = "";
                //validasi IdBarang
                $IdBarang = $db->escape_string(trim($_POST["IdBarang"]));
                if ((strlen($IdBarang) < 1) || (strlen($IdBarang) > 3) || (strlen($IdBarang) == 0)) {
                    $pesansalah .= "Id Barang tidak sah. Dan tidak boleh kosong!!<br>";
                } else {
                    $res = $db->query("SELECT COUNT(*) banyakData FROM barang WHERE IdBarang = '$IdBarang'");
                    if ($res) {
                        $data = $res->fetch_assoc();
                        if ($data["banyakData"]) {
                            $pesansalah .= "Id Barang sudah ada dalam data.<br>";
                        } elseif (substr($IdBarang, 0, 1) != 'B' || !is_numeric(substr($IdBarang, 1))) {
                            $pesansalah .= "Id Barang harus diawali dengan B kemudian angka!!<br>";
                        }
                    } else {
                        $pesansalah .= "Data tidak ditemukan.<br>";
                    }
                }
                //validasi Nama Barang
                $NamaBarang = $db->escape_string(trim($_POST["NamaBarang"]));
                if (strlen($NamaBarang) == 0 || is_numeric($NamaBarang)) {
                    $pesansalah .= "Nama Barang tidak boleh kosong, dan tidak boleh angka!!<br>";
                }
                //SHOW PESAN SALAH
                if ($pesansalah == "") {
            ?>
                    <p class="card-text">Semua data valid.</p>
                    <?php
                    if ($db->connect_errno == 0) {
                        $sql = "INSERT INTO barang(IdBarang, NamaBarang)
                                    VALUES('$IdBarang', '$NamaBarang')
                                ";
                        $res = $db->query($sql);
                        if ($res) {
                            if ($db->affected_rows > 0) {
                    ?>
                                <p class="card-text">Data berhasil di simpan.</p>
                                <a href="viewdata.php" class="btn btn-primary">View Data Barang</a>
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
                <a href="tambahdata.php" class="btn btn-primary">Tambah Data Barang</a>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>