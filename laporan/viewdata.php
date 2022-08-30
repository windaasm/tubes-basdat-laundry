<?php
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Laporan";

// Data Chart Penghasilan
$statistikPenghasilan = getStatistikPenghasilan();
foreach ($statistikPenghasilan as $sPenghasilan) {
    $bulanPenghasilan[] = $sPenghasilan["Bulan"];
    $tahunPenghasilan[] = $sPenghasilan["Tahun"];
    $sumPenghasilan[] = $sPenghasilan["TotalPenghasilan"];
}

$totalPenghasilan = getTotalPenghasilan();
foreach ($totalPenghasilan as $tPenghasilan) {
    $totalPenghasilan = $tPenghasilan["TotalPenghasilan"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../head.php"); ?>
    <style>
        .card-body-icon {
            position: absolute;
            z-index: 0;
            top: 50px;
            right: 4px;
            opacity: 0.4;
            font-size: 90px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once("../navbar.php"); ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Laporan Statistik Laundry</h2>
                <?php
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $sql = "SELECT pem.NoOrder, pel.Nama NamaPelanggan, pem.TglMasuk, pem.TglSelesai, pem.Berat, pem.TotalHarga, SUM(dtb.Jumlah) AS Qty, lay.NamaLayanan
                            FROM pemesanan pem
                            JOIN pelanggan pel ON pem.IdPelanggan = pel.IdPelanggan
                            JOIN detail_barang dtb ON pem.NoOrder = dtb.NoOrder
                            JOIN detail_layanan dtl ON pem.NoOrder = dtl.NoOrder
                            JOIN layanan lay ON dtl.IdLayanan = lay.IdLayanan
                            GROUP BY dtb.NoOrder
                            ";
                    $res = $db->query($sql);
                    if ($res) {
                ?>
                        <!-- box-box jumlah -->
                        <div class="row text-white mb-4 mt-4 justify-content-md-center">
                            <!-- box pelanggan -->
                            <div class="card bg-primary shadow" style="width: 18rem; margin-left: 1em;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa-solid fa-users" style="margin-right: 0.2em;"></i>
                                    </div>
                                    <h3 class="card-title fs-5 text-center">Total Pelanggan</h3>
                                    <?php
                                    $jumlahPelanggan = getCountPelanggan();
                                    foreach ($jumlahPelanggan as $jumlah) {
                                        $jumlahPelanggan = $jumlah["TotalPelanggan"];
                                    }
                                    ?>
                                    <div class="display-4 fw-bold">
                                        <?php echo $jumlahPelanggan; ?>
                                    </div>
                                    <a class="text-decoration-none text-info" href="../pelanggan/viewdata.php">
                                        <p class="card-text text-white">Lihat Detail</p>
                                    </a>
                                </div>
                            </div>

                            <!-- box penjualan -->
                            <div class="card bg-success shadow" style="width: 18rem; margin-left: 1em;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa-solid fa-rupiah-sign" style="margin-right: 0.2em;"></i>
                                    </div>
                                    <h3 class="card-title fs-5 text-center">Total Penghasilan</h3>
                                    <div class="display-4 fw-bold">
                                        <?php
                                        echo number_format($totalPenghasilan, 0, ',', '.');
                                        ?>
                                    </div>
                                    <a class="text-decoration-none text-info" href="../pemesanan/viewdata.php">
                                        <p class="card-text text-white">Lihat Detail</p>
                                    </a>
                                </div>
                            </div>

                            <!-- total pemesanan -->
                            <div class="card bg-warning shadow" style="width: 18rem; margin-left: 1em;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-cart-shopping" style="margin-right: 0.2em;"></i>
                                    </div>
                                    <h3 class="card-title fs-5 text-center">Total Pemesanan</h3>
                                    <div class="display-4 fw-bold">
                                        <?php
                                        $totalPemesanan = getCountTotalPemesanan();
                                        foreach ($totalPemesanan as $total) {
                                            $totalPemesanan = $total["TotalPemesanan"];
                                        }
                                        echo $totalPemesanan;
                                        ?>
                                    </div>
                                    <a class="text-decoration-none text-info" href="../pemesanan/viewdata.php">
                                        <p class="card-text text-white">Lihat Detail</p>
                                    </a>
                                </div>
                            </div>

                            <div class="card bg-info shadow" style="width: 18rem; margin-left: 1em;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-scale-balanced" style="margin-right: 0.2em;"></i>
                                    </div>
                                    <h3 class="card-title fs-5 text-center">Total Berat (kg)</h3>
                                    <div class="display-4 fw-bold">
                                        <?php
                                        $totalBerat = getCountTotalBerat();
                                        foreach ($totalBerat as $tBerat) {
                                            $totalBerat = $tBerat["TotalBerat"];
                                        }
                                        echo number_format($totalBerat, 0, ',', '.');
                                        ?>
                                    </div>
                                    <a class="text-decoration-none text-info" href="../pemesanan/viewdata.php">
                                        <p class="card-text text-white">Lihat Detail</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Penghasilan -->
                        <div id="chartPenghasilan" style="height: 300px; width: 100%;" class="mb-4"></div>

                        <table id="example" class="table ui celled" style="width:100%">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Layanan</th>
                                    <th>Qty Barang</th>
                                    <th>Berat</th>
                                    <th>Total Harga</th>
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
                                        <td class="text-center"><?php echo $row["NamaLayanan"]; ?></td>
                                        <td class="text-right"><?php echo $row["Qty"]; ?></td>
                                        <td class="text-right"><?php echo $row["Berat"]; ?> kg</td>
                                        <td class="text-right">Rp <?php echo number_format($row["TotalHarga"], 0, ",", "."); ?></td>
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
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartPenghasilan", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Statistik Penghasilan"
                },
                axisY: {
                    title: "Penghasilan per bulan"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "",
                    legendText: " ",
                    dataPoints: [
                        <?php
                        for ($i = 0; $i < COUNT($bulanPenghasilan); $i++) {
                            echo "{ label: '" . $bulanPenghasilan[$i] . " " . $tahunPenghasilan[$i] . "', y : " . $sumPenghasilan[$i] . " }";
                            echo ($i < COUNT($bulanPenghasilan) - 1) ? ", " : "";
                        }
                        ?>
                    ]
                }]
            });
            chart.render();

        }
    </script>

</body>

</html>