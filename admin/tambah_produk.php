<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk | Admin Abitea</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body class="container">
    <nav>
        <ul><li><strong>Admin Dashboard</strong></li></ul>
        <ul><li><a href="../index.php">Lihat Toko</a></li></ul>
    </nav>

    <article>
        <header><h2>Tambah Koleksi Baru</h2></header>
        <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
            <label>Nama Produk
                <input type="text" name="nama" placeholder="Contoh: Kaos Oversize" required>
            </label>
            
            <label>Harga (Rp)
                <input type="number" name="harga" placeholder="80000" required>
            </label>

            <label>Foto Produk
                <input type="file" name="foto" required>
            </label>

            <button type="submit">Simpan Produk</button>
        </form>
    </article>
</body>
</html>