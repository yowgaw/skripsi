<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("Location: login.php?pesan=belum_login");
}
?>
<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data produk spesifik berdasarkan ID
$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Abitea</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Edit Produk Abitea</h1>
        <a href="index.php" class="secondary">← Batal</a>

        <article>
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="id_produk" value="<?php echo $d['id_produk']; ?>">

                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="<?php echo $d['nama_produk']; ?>" required>

                <div class="grid">
                    <div>
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" value="<?php echo $d['harga']; ?>" required>
                    </div>
                    <div>
                        <label>Stok</label>
                        <input type="number" name="stok" value="<?php echo $d['stok']; ?>" required>
                    </div>
                </div>

                <label>Nama File Foto</label>
                <input type="text" name="foto_produk" value="<?php echo $d['foto_produk']; ?>">

                <button type="submit" name="update">Simpan Perubahan</button>
            </form>
        </article>
    </main>
</body>
</html>