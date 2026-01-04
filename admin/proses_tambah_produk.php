<?php
include 'koneksi.php';

$nama  = $_POST['nama'];
$harga = $_POST['harga'];

// Logika Upload Gambar
$foto_nama = $_FILES['foto']['name'];
$tmp_name  = $_FILES['foto']['tmp_name'];

// Pindahkan file ke folder gambar
move_uploaded_file($tmp_name, "gambar/".$foto_nama);

// Simpan data ke database
$query = "INSERT INTO produk (nama_produk, harga, foto_produk) VALUES ('$nama', '$harga', '$foto_nama')";
$hasil = mysqli_query($koneksi, $query);

if($hasil){
    echo "<script>alert('Produk Berhasil Ditambahkan!'); window.location='../index.php';</script>";
} else {
    echo "Gagal menyimpan: " . mysqli_error($koneksi);
}
?>