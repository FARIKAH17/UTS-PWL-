<?php
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

if (!empty($_FILES["image"]["name"])) {
    $image = basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
    $conn->query("UPDATE minuman SET nama='$nama', harga='$harga', stok='$stok', image='$image' WHERE id=$id");
} else {
    $conn->query("UPDATE minuman SET nama='$nama', harga='$harga', stok='$stok' WHERE id=$id");
}

header("Location: index.php");
?>

