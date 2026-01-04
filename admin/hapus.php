<?php
// 1. Hubungkan ke database
include 'koneksi.php';

// 2. Ambil ID yang dikirim melalui URL
$id = $_GET['id'];

// 3. Perintah SQL untuk menghapus data berdasarkan ID
$query = "DELETE FROM produk WHERE id_produk = '$id'";
$hasil = mysqli_query($koneksi, $query);

// 4. Cek apakah berhasil
if ($hasil) {
    // Jika berhasil, kembali ke halaman utama
    header("Location: index.php?pesan=hapus_berhasil");
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>