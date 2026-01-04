<?php
session_start(); // Memulai session
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Mencari user di database
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        // Jika ditemukan, buat session
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $user;
        header("Location: index.php");
    } else {
        header("Location: login.php?pesan=gagal");
    }
}
?>