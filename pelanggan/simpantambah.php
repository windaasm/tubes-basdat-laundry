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
            <h3 class="card-text">Tambah Data Pelanggan</h3>
            <?php 
                if (isset($_POST["tblTambah"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    //validasi IdPelanggan
                    $IdPelanggan = $db -> escape_string(trim($_POST["IdPelanggan"]));
                    if ((strlen($IdPelanggan) < 3) || (strlen($IdPelanggan) > 5) || (strlen($IdPelanggan) == 0)) {
                        $pesansalah .= "Id Pelanggan tidak sah. Dan tidak boleh kosong!!<br>";
                    } else {
                        $res = $db -> query("SELECT COUNT(*) banyakData FROM pelanggan WHERE IdPelanggan = '$IdPelanggan'");
                        if ($res) {
                            $data = $res -> fetch_assoc();
                            if ($data["banyakData"]) {
                                $pesansalah .= "Id Pelanggan sudah ada dalam data.<br>";
                            } elseif (substr($IdPelanggan, 0, 1) != 'P' || !is_numeric(substr($IdPelanggan, 1))) {
                                $pesansalah .= "Id Pelanggan harus diawali dengan P kemudian angka!!<br>";
                            }
                        } else {
                            $pesansalah .= "Data tidak ditemukan.<br>";
                        }
                    }
                    //validasi Nama dan Alamat
                    $Nama = $db -> escape_string(trim($_POST["Nama"]));
                    $Alamat = $db -> escape_string(trim($_POST["Alamat"]));
                    if (strlen($Nama) == 0 || is_numeric($Nama)) {
                        $pesansalah .= "Nama tidak boleh kosong, dan tidak boleh angka!!<br>";
                    }
                    if (strlen($Alamat) == 0 || is_numeric($Alamat)) {
                        $pesansalah .= "Alamat tidak boleh kosong, dan tidak boleh angka!!<br>";
                    }
                    // validasi No Hp
                    $NoHp = $db -> escape_string(trim($_POST["NoHp"]));
                    $NoHp = str_replace(")", "", $NoHp);
                    $NoHp = str_replace(".", "", $NoHp);
                    $NoHp = str_replace(",", "", $NoHp);
                    $NoHp = str_replace("-", "", $NoHp);
                    $NoHp = str_replace(" ", "", $NoHp);
                    if (is_string($NoHp)) {
                        if (strlen($NoHp) < 10) {
                            $pesansalah .= "Digit No Hp yang dimasukkan, kurang.<br>";
                        } else if (strlen($NoHp) > 13) {
                            $pesansalah .= "Digit No Hp yang dimasukkan, lebih.<br>";
                        }
                    } else {
                        $pesansalah .= "No Hp harus berupa angka!!<br>";
                    }
                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $sql = "INSERT INTO pelanggan(IdPelanggan, Nama, Alamat, NoHp)
                                    VALUES('$IdPelanggan', '$Nama', '$Alamat', '$NoHp')
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di simpan.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Pelanggan</a>
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
                    <p class="card-text">Belum ada data yang dimasukkan. <br>Isi data terlebih dahulu melalui form !!!</p>
                    <a href="tambahdata.php" class="btn btn-primary">Tambah Data Pelanggan</a>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>