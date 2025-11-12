<?php
include '../koneksi.php';

// Pastikan parameter id ada dan valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid!");
}

$id = intval($_GET['id']);

// Ganti nama tabel dari makanan → minuman
$stmt = $conn->prepare("SELECT * FROM minuman WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika data tidak ditemukan
if (!$data) {
    die("Data tidak ditemukan di tabel minuman!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Minuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h3 class="mb-4">Edit Minuman</h3>
        <form method="POST" action="prosesupdate.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control"
                       value="<?= htmlspecialchars($data['nama'], ENT_QUOTES) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control"
                       value="<?= htmlspecialchars($data['harga'], ENT_QUOTES) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control"
                       value="<?= htmlspecialchars($data['stok'], ENT_QUOTES) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Lama</label><br>
                <?php if (!empty($data['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($data['image'], ENT_QUOTES) ?>"
                         width="120" class="rounded mb-2 border"><br>
                <?php else: ?>
                    <p class="text-muted fst-italic">Tidak ada gambar</p>
                <?php endif; ?>
                <input type="file" name="image" class="form-control mt-2">
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

