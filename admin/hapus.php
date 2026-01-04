<?php 
session_start();
// Proteksi: Hanya admin login yang bisa menghapus
if($_SESSION['status'] != "login"){
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$id = $_GET['id'];

// 1. Ambil nama file foto dulu sebelum datanya dihapus
$cari_foto = mysqli_query($koneksi, "SELECT foto_produk FROM produk WHERE id_produk = '$id'");
$data = mysqli_fetch_array($cari_foto);
$nama_file = $data['foto_produk'];

// 2. Hapus file fisik di folder gambar
if ($nama_file != "") {
    unlink("gambar/" . $nama_file);
}

// 3. Baru hapus data di database
$query = "DELETE FROM produk WHERE id_produk = '$id'";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: index.php?pesan=hapus_berhasil");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>