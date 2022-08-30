<?php
// session_start();
// if (!isset($_SESSION["username"])) {
//     header("Location: index.php?error=4");
// }

include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

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
                <div class="jumbotron text-center bg-grey">
                    <!-- <h1>Selamat Datang <?= ($_SESSION["username"] == "admin") ? "Bu Gentisya" : ucfirst($_SESSION["username"]); ?></h1> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>