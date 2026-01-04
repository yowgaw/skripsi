<?php
session_start();

// 1. Kosongkan semua variabel session
$_SESSION = [];

// 2. Hancurkan session yang ada di server
session_destroy();

// 3. Pastikan script berhenti setelah perintah header
header("Location: login.php?pesan=logout");
exit(); // Sangat penting agar kode di bawahnya tidak dieksekusi
?>