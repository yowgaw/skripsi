<?php include 'admin/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Abitea Apparel | Toko Online Fashion</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>

    <nav class="container">
      <ul>
        <li><strong>ABITEA APPAREL</strong></li>
      </ul>
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#katalog">Katalog</a></li>
        <li><a href="admin/login.php" class="outline" role="button">Login Admin</a></li>
      </ul>
    </nav>

    <header class="container">
        <div style="text-align: center; padding: 50px 0;">
            <h1>Temukan Gaya Terbaikmu di Abitea</h1>
            <p>Koleksi pakaian berkualitas dengan desain eksklusif.</p>
            <a href="#katalog" role="button">Lihat Koleksi</a>
        </div>
    </header>

    <main class="container" id="katalog">
        <hr>
        <h2 style="text-align: center;">Koleksi Terbaru</h2>
        <div class="grid">
            <?php 
            $data = mysqli_query($koneksi, "SELECT * FROM produk");
            while($d = mysqli_fetch_array($data)){
            ?>
            <article>
                <img src="admin/gambar/<?php echo $d['foto_produk']; ?>" style="width: 100%; height: 300px; object-fit: cover;">
                <header>
                    <h5><?php echo $d['nama_produk']; ?></h5>
                    <p><strong>Rp <?php echo number_format($d['harga'], 0, ',', '.'); ?></strong></p>
                </header>
                <footer>
                    <a href="https://wa.me/628123456789?text=Saya mau pesan <?php echo $d['nama_produk']; ?>" target="_blank" role="button" class="contrast">Pesan via WhatsApp</a>
                </footer>
            </article>
            <?php } ?>
        </div>
    </main>

    <footer class="container">
        <small>&copy; 2025 Abitea Apparel - Tangerang</small>
    </footer>

</body>
</html>