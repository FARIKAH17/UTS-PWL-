<?php
include '../koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM makanan WHERE id=$id");
header("Location: index.php");
?>

