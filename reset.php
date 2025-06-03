<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $_POST['email'];
    $new_pass = $_POST['password'];

    $cek = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($cek->num_rows === 0) {
        $error = "Email tidak ditemukan!";
    } else {
        $conn->query("UPDATE users SET password='$new_pass' WHERE email='$email'");
        $success = "Password berhasil direset. Silakan login kembali.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
<div class="container col-md-4">
    <h3>Reset Password</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-warning">Reset</button>
        <a href="login.php" class="btn btn-link">Login</a>
    </form>
</div>
</body>
</html>
