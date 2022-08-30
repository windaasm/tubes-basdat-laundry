<?php
include_once("functions.php");
session();
$_SESSION["current_page"] = "Backup Data";
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once("head.php"); ?>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once("navbar.php"); ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Backup / Export Database</h2>
                <div>
                    <p>Silahkan klik tombol backup untuk mengunduh file .sql hasil backup dari database Laundry</p>
                    <p><a href="backup-db/backup-data.php" class="btn btn-primary mb-3">Backup Database
                            <span class="glyphicon glyphicon-save"></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>