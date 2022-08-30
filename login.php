<?php 
// include_once("functions.php");
// $db = dbConnect();
// if ($db -> connect_errno == 0) {
//     if (isset($_POST["tblMasuk"])) {
//         $username = $db -> escape_string($_POST["username"]);
//         $password = $db -> escape_string($_POST["password"]);
//         $sql = "SELECT * FROM users WHERE username = '$username' AND pass = password('$password')";
//         $res = $db -> query($sql);
//         if ($res) {
//             if ($res -> num_rows == 1) {
//                 $data = $res -> fetch_assoc();
//                 session_start();
//                 $_SESSION["username"] = $data["username"];
//                 header("Location: welcome.php");
//             } else {
//                 header("Location: index.php?error=1");
//             }
//         } else {
//             header("Location: index.php?error=2");
//         }
//     }
// } else {
//     header("Location: index.php?error=3");
// }
?>