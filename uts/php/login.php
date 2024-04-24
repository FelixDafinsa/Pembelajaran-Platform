<?php
session_start();
// Periksa apakah pengguna sudah login, jika ya, arahkan ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Proses form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa kecocokan username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Validasi username dan password (contoh sederhana, bisa disesuaikan dengan kebutuhan)
    if ($username === 'user' && $password === 'password') {
        // Simpan informasi login ke sesi
        $_SESSION['username'] = $username;
        // Redirect ke halaman utama setelah login berhasil
        header("Location: index.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan kesalahan
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
