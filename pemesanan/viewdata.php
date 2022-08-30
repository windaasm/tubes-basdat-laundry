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
                <h2 class="text-center">Data Pemesanan</h2>
                <?php
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $sql = "SELECT pem.NoOrder, pel.Nama NamaPelanggan, pem.TglMasuk, pem.TglSelesai, pem.Berat, pem.TotalHarga
                            FROM pemesanan pem JOIN pelanggan pel
                            ON pem.IdPelanggan = pel.IdPelanggan
                            ORDER BY pem.TglMasuk DESC
                            ";

                    $res = $db->query($sql);
                    if ($res) {
                ?>
                        <a href="tambahdata.php" class="btn btn-primary mb-3">Tambah Data</a>
                        <table id="example" class="table ui celled" style="width:100%">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Berat</th>
                                    <th>Total Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = $res->fetch_all(MYSQLI_ASSOC);
                                foreach ($data as $row) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?>.</td>
                                        <td class="text-center"><?php echo $row["NoOrder"]; ?></td>
                                        <td><?php echo $row["NamaPelanggan"]; ?></td>
                                        <td class="text-center"><?php echo formatTgl($row["TglMasuk"]); ?></td>
                                        <td class="text-center"><?php echo formatTgl($row["TglSelesai"]); ?></td>
                                        <td class="text-right"><?php echo $row["Berat"]; ?> kg</td>
                                        <td class="text-right">Rp <?php echo number_format($row["TotalHarga"], 0, ",", "."); ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?NoOrder=<?= $row["NoOrder"] ?>"><?php tblEdit() ?></a>
                                            <a href="hapus.php?NoOrder=<?= $row["NoOrder"] ?>"><?php tblHapus() ?></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                <?php
                        $res->free();
                    } else {
                        echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
                    }
                } else {
                    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>