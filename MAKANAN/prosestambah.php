<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$target_dir = "uploads/";
if (!is_dir($target_dir)) mkdir($target_dir);
$image = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $image;
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$sql = "INSERT INTO makanan (nama, harga, image, stok) VALUES ('$nama', '$harga', '$image', '$stok')";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>

