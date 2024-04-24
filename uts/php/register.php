<?php
session_start();
// Jika pengguna sudah login, arahkan ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Proses form registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses registrasi pengguna
    // Misalnya, menyimpan informasi pengguna ke dalam database
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Simpan informasi registrasi pengguna ke dalam database (belum diimplementasikan)
    // Redirect ke halaman login setelah registrasi berhasil
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
