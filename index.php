<?php 
include_once("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <form method="POST" action="login.php">
        <div class="container border shadow-lg p-5 kotak">
            <h2 class="text-center">Masuk Aplikasi</h2><br>
            <?php 
            if (isset($_GET["error"])) {
                $error = $_GET["error"];
                if ($error == 1) {
                    ?>
                    <div class="shadow p-2 mb-3 alert alert-danger">Nama Pengguna dan/atau kata sandi tidak sesuai.</div>
                    <?php
                } else if ($error == 2) {
                    ?>
                    <div class="shadow p-2 mb-3 alert alert-danger">Ada kesalahan pada database.</div>
                    <?php
                } else if ($error == 3) {
                    ?>
                    <div class="shadow p-2 mb-3 alert alert-danger">Koneksi database gagal.</div>
                    <?php
                } else if ($error == 4) {
                    ?>
                    <div class="shadow p-2 mb-3 alert alert-danger">Harus login terlebih dahulu, untuk mengakses halaman sebelumnya.</div>
                    <?php
                } else {
                    ?>
                    <div class="shadow p-2 mb-3 alert alert-danger">Kesalahan tidak diketahui.</div>
                    <?php
                }
            }
            ?>
            <div class="form-group">
                <label for="namapengguna">Nama Pengguna</label>
                <input type="text" class="form-control" id="namapengguna" name="username" placeholder="nama pengguna" value="<?= ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "admin" : ""); ?>">
            </div>
            <div class="form-group">
                <label for="katasandi">Kata Sandi</label>
                <input type="password" class="form-control" id="katasandi" name="password" placeholder="kata sandi" value="<?= ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "password_admin_pak_andri" : ""); ?>">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="tblMasuk">Masuk</button>
            </div>
        </div>
    </form>
</body>
</html>