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
    <li><a href="index.php">Beranda</a></li>
    <li><a href="custom.php">Jasa Custom</a></li> 
    <li><a href="#katalog">Katalog</a></li>
    <li><a href="admin/login.php" class="outline" role="button">Login Admin</a></li>
  </ul>
</nav>

    <header class="container">
    <div style="text-align: center; padding: 60px 0; background-color: var(--card-background-color); border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h1>Wujudkan Desain Impianmu di Abitea</h1>
        <p>Spesialis Jasa Custom Kaos & Jersei. Punya desain sendiri? Kami siap cetak dengan kualitas premium!</p>
        
        <div class="grid" style="max-width: 600px; margin: 0 auto;">
            <a href="custom.php" role="button">Mulai Custom (Upload Desain)</a>
            
            <a href="#katalog" role="button" class="outline">Lihat Koleksi Ready</a>
        </div>
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