<?php
session_start();
// if(!isset($_SESSION['username'])) {
//     exit;
// }

session_destroy();
$url = "imgbrowser.php";
echo json_encode($url);
