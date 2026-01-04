<?php
// Parameter koneksi: (host, user, password, nama_database)
$koneksi = mysqli_connect("localhost", "root", "", "db_abitea");

// Cek apakah koneksi berhasil
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>