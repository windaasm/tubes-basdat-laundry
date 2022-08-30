<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "tubes_laundry");
    return $db;
}

function session()
{
    session_start();
    // if (!isset($_SESSION["username"])) {
    //     header("Location: ../index.php?error=4");
    // }
}

function getListPelanggan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM pelanggan ORDER BY Nama");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListPemesanan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM pemesanan ORDER BY NoOrder");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListBarang()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM barang ORDER BY IdBarang");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListLayanan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM layanan ORDER BY IdLayanan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataPemesanan($NoOrder)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT p.NoOrder, p.IdPelanggan, p.TglMasuk, p.TglSelesai, p.Berat, p.TotalHarga, pl.Nama NamaPelanggan
                            FROM pemesanan p JOIN pelanggan pl
                            ON p.IdPelanggan = pl.IdPelanggan
                            WHERE p.NoOrder = '$NoOrder'
                        ");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataPelanggan($IdPelanggan)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM pelanggan WHERE IdPelanggan = '$IdPelanggan'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataLayanan($IdLayanan)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM layanan WHERE IdLayanan = '$IdLayanan'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataBarang($IdBarang)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM barang WHERE IdBarang = '$IdBarang'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataDetailBarang($Id)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM detail_barang WHERE Id = '$Id'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataDetailLayanan($Id)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM detail_layanan WHERE Id = '$Id'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getTotalPenghasilan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT SUM(TotalHarga) AS TotalPenghasilan 
                            FROM pemesanan
                            ");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getStatistikPenghasilan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT MONTHNAME(TglMasuk) AS Bulan, YEAR(TglMasuk) AS Tahun, SUM(TotalHarga) AS TotalPenghasilan
                            FROM pemesanan
                            GROUP BY EXTRACT(MONTH FROM TglMasuk)
                            ");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getCountTotalPemesanan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT COUNT(NoOrder) AS TotalPemesanan FROM pemesanan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getCountTotalBerat()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT SUM(Berat) AS TotalBerat FROM pemesanan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getCountPelanggan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT COUNT(IdPelanggan) AS TotalPelanggan FROM pelanggan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function formatTgl($tgl)
{
    $exp = explode("-", $tgl);
    $bulan = array(
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    $format = $exp[2] . " " . $bulan[(int)$exp[1]] . " " . $exp[0];
    return $format;
}

function tblEdit()
{
?>
    <button class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pen-to-square"></i></button>
<?php
}

function tblHapus()
{
?>
    <button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash-can"></i></button>
<?php
}
