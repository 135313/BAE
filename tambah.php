<?php include 'db.php'; ?>
<?php
if ($user['role'] != 'admin') {
    echo "<div class='alert alert-danger'>Hanya admin yang bisa mengakses halaman ini.</div>";
    exit;
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (nama, email) VALUES ('$nama', '$email')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h2>Tambah Pengguna</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
