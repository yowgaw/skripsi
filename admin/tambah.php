<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("Location: login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - Abitea</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container">
        <header>
            <h1>Tambah Produk Baru</h1>
            <a href="index.php" class="secondary">← Kembali ke Katalog</a>
        </header>

        <article>
            <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
    <label>Nama Produk</label>
    <input type="text" name="nama_produk" required>

    <div class="grid">
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="stok" placeholder="Stok" required>
    </div>

    <label>Pilih Foto Produk</label>
    <input type="file" name="foto_produk" accept="image/*" required>

    <button type="submit" name="simpan">Simpan Produk</button>
</form>
            </form>
        </article>
    </main>
</body>
</html>