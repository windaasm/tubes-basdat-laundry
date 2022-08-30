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
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once("../navbar.php"); ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Data Pelanggan</h2>
                <?php
                $db = dbConnect();
                if ($db->connect_errno == 0) {

                    $sql = "SELECT * FROM pelanggan";

                    $res = $db->query($sql);
                    if ($res) {
                ?>
                        <a href="tambahdata.php" class="btn btn-primary mb-3">Tambah Data</a>
                        <table id="example" class="table ui celled" style="width:100%">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Id Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No Handphone</th>
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
                                        <td><?php echo $row["IdPelanggan"]; ?></td>
                                        <td><?php echo $row["Nama"]; ?></td>
                                        <td><?php echo $row["Alamat"]; ?></td>
                                        <td class="text-center"><?php echo $row["NoHp"]; ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?IdPelanggan=<?= $row["IdPelanggan"] ?>"><?php tblEdit() ?></a>
                                            <a href="hapus.php?IdPelanggan=<?= $row["IdPelanggan"] ?>"><?php tblHapus() ?></a>
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>