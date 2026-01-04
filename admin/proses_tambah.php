<?php
session_start(); // Tambahkan ini agar sinkron dengan sistem login
include 'koneksi.php';

// Proteksi tambahan: Jika bukan admin, jangan izinkan simpan data
if($_SESSION['status'] != "login"){
    header("Location: login.php?pesan=belum_login");
    exit();
}

if (isset($_POST['simpan'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama_produk']); // Lebih aman dari SQL Injection
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $filename = $_FILES['foto_produk']['name'];
    $tmp_name = $_FILES['foto_produk']['tmp_name'];

    move_uploaded_file($tmp_name, 'gambar/' . $filename);

    $query = "INSERT INTO produk (nama_produk, harga, stok, foto_produk) 
              VALUES ('$nama', '$harga', '$stok', '$filename')";
    
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: index.php?pesan=berhasil");
    } else {
        echo "Gagal simpan: " . mysqli_error($koneksi);
    }
}
?>