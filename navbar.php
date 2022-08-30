<div id="navbar" class="list-group">
    <span class="pl-3" style="color: #808080;">Navigasi</span>
    <!-- <a href="../welcome.php" class="list-group-item list-group-item-action"><?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></a> -->
    <a href="/tubes-bd/laporan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Laporan") {
                                                                                                echo "active";
                                                                                            } else {
                                                                                                echo "inactive";
                                                                                            } ?>"><i class="fa fa-bar-chart"></i> Laporan</a>
    <a href="/tubes-bd/pemesanan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Pemesanan") {
                                                                                                    echo "active";
                                                                                                } else {
                                                                                                    echo "inactive";
                                                                                                } ?>"><i class="fa fa-shopping-cart"></i> Data Pemesanan</a>
    <a href="/tubes-bd/pelanggan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Pelanggan") {
                                                                                                    echo "active";
                                                                                                } else {
                                                                                                    echo "inactive";
                                                                                                } ?>"><i class="fa fa-users"></i> Data Pelanggan</a>
    <a href="/tubes-bd/layanan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Layanan") {
                                                                                                echo "active";
                                                                                            } else {
                                                                                                echo "inactive";
                                                                                            } ?>"><i class="fa fa-circle-info"></i> Data Layanan</a>
    <a href="/tubes-bd/barang/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Barang") {
                                                                                                echo "active";
                                                                                            } else {
                                                                                                echo "inactive";
                                                                                            } ?>"><i class="fa fa-shirt"></i> Data Barang</a>
    <a href="/tubes-bd/detail-barang/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Detail Barang") {
                                                                                                        echo "active";
                                                                                                    } else {
                                                                                                        echo "inactive";
                                                                                                    } ?>"><i class="fa fa-cart-shopping"></i> Data Detail Barang</a>
    <a href="/tubes-bd/detail-layanan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Detail Layanan") {
                                                                                                        echo "active";
                                                                                                    } else {
                                                                                                        echo "inactive";
                                                                                                    } ?>"><i class="fa fa-cart-shopping"></i> Data Detail Layanan</a>
    <span class="pl-3 mt-4" style="color: #808080;">Fitur</span>
    <a href=" /tubes-bd/viewbackup.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Backup Data") {
                                                                                            echo "active";
                                                                                        } else {
                                                                                            echo "inactive";
                                                                                        } ?>"><i class="fa fa-download"></i> Backup Database</a>
    <a href=" /tubes-bd/logout.php" class="list-group-item list-group-item-action logout"><i class="fa fa-right-from-bracket"></i> Keluar</a>
</div>