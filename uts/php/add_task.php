<?php
session_start();
// Periksa apakah pengguna sudah login, jika tidak, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Proses form untuk menambahkan tugas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data tugas dari form
    $task = $_POST['task'];
    
    // Simpan tugas ke dalam database (belum diimplementasikan)
    // Contoh sederhana: simpan ke dalam array
    $new_task = array('id' => uniqid(), 'task' => $task, 'completed' => false);
    // Tambahkan tugas baru ke dalam daftar
    // Misalnya, simpan ke dalam session untuk contoh sederhana ini
    $_SESSION['tasks'][] = $new_task;

    // Redirect kembali ke halaman utama setelah menambahkan tugas
    header("Location: index.php");
    exit();
}
?>
