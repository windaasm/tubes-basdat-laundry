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
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once("../navbar.php"); ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Data Layanan</h2>
                <?php
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    if (isset($_POST["tblCari"])) {
                        $dicari = $_POST["keyword"];
                    } else {
                        $dicari = "";
                    }

                    $sql = "SELECT * FROM layanan";
                    $res = $db->query($sql);
                    if ($res) {
                ?>
                        <a href="tambahdata.php" class="btn btn-primary mb-3">Tambah Data</a>
                        <table id="example" class="ui celled table" style="width:100%">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Id Layanan</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
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
                                        <td><?php echo $row["IdLayanan"]; ?></td>
                                        <td><?php echo $row["NamaLayanan"]; ?></td>
                                        <td class="text-right">Rp <?php echo number_format($row["Harga"], 0, ",", "."); ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?IdLayanan=<?= $row["IdLayanan"] ?>"><?php tblEdit() ?></a>
                                            <a href="hapus.php?IdLayanan=<?= $row["IdLayanan"] ?>"><?php tblHapus() ?></a>
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