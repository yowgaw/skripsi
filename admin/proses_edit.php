<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id    = $_POST['id_produk'];
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $foto  = $_POST['foto_produk'];

    // Perintah SQL untuk mengubah data yang sudah ada
    $query = "UPDATE produk SET 
              nama_produk='$nama', 
              harga='$harga', 
              stok='$stok', 
              foto_produk='$foto' 
              WHERE id_produk='$id'";

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: index.php?pesan=update_berhasil");
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>