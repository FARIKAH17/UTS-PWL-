<?php
include 'koneksi.php';

// Sql to create table
$sql_makanan = "CREATE TABLE makanan (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(100) NOT NULL,
        harga INT(11) NOT NULL,
        image VARCHAR(255) NOT NULL,
        stok INT(11) NOT NULL
        )";

$sql_minuman = "CREATE TABLE minuman (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(100) NOT NULL,
        harga INT(11) NOT NULL,
        image VARCHAR(255) NOT NULL,
        stok INT(11) NOT NULL
        )";

$sql_pesanan = "CREATE TABLE pesanan (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(100) NOT NULL,
        no_hp VARCHAR(20) NOT NULL,
        alamat VARCHAR(255) DEFAULT NULL,
        total_harga INT(11) DEFAULT 0,
        tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

$sql_pesanan_item = "CREATE TABLE pesanan_item (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        pesanan_id INT(11) NOT NULL,
        produk_id INT(11) NOT NULL,
        jumlah INT(11) NOT NULL DEFAULT 1,
        subtotal INT(11) NOT NULL,
        FOREIGN KEY (pesanan_id) REFERENCES pesanan(id) ON DELETE CASCADE,
        FOREIGN KEY (produk_id) REFERENCES makanan(id) ON DELETE CASCADE
        )";


if ($conn->query($sql_pesanan) === TRUE) {
    echo "Table pesanan created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
if ($conn->query($sql_pesanan_item) === TRUE) {
    echo "Table pesanan_item created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sql_makanan) === TRUE) {
    echo "Table makanan created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
if ($conn->query($sql_minuman) === TRUE) {
    echo "Table minuman created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
