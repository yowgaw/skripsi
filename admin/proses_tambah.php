<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    // Logika Upload Foto
    $filename = $_FILES['foto_produk']['name'];
    $tmp_name = $_FILES['foto_produk']['tmp_name'];

    // Pindahkan file dari memori sementara ke folder 'gambar'
    move_uploaded_file($tmp_name, 'gambar/' . $filename);

    // Simpan nama filenya saja ke database
    $query = "INSERT INTO produk (nama_produk, harga, stok, foto_produk) 
              VALUES ('$nama', '$harga', '$stok', '$filename')";
    
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: index.php?pesan=berhasil");
    }
}
?>