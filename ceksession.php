<?php
session_start();
if (!isset($_SESSION['id_user'])) { 
    $error_message = "Anda harus login terlebih dahulu";
    echo "<script>alert('$error_message'); window.location.href='home.php';</script>";
    exit();
}
?>
