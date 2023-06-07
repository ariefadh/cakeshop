<?php session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['userweb'])) {
    header("Location: ..\login\index.php");
    exit();
} ?>

<!-- unauthorized.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Unauthorized Access</title>
</head>
<body>
    <h2>Unauthorized Access</h2>
    <p>Maaf, Anda tidak memiliki akses ke halaman ini.</p>
    <a href="..\login\index.php">Kembali ke Halaman Login</a>
</body>
</html>
