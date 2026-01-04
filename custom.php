<?php include 'admin/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Order Custom | Abitea Apparel</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body class="container">
    <nav>
        <ul><li><strong>ABITEA APPAREL</strong></li></ul>
        <ul><li><a href="index.php">Kembali ke Katalog</a></li></ul>
    </nav>

    <header>
        <h2 style="text-align: center;">Form Pemesanan Custom</h2>
        <p style="text-align: center;">Unggah desainmu dan biarkan kami mewujudkannya.</p>
    </header>

    <article>
        <form action="proses_custom.php" method="POST" enctype="multipart/form-data">
            <div class="grid">
                <label>Nama Lengkap
                    <input type="text" name="nama" placeholder="Nama Anda" required>
                </label>
                <label>Nomor WhatsApp
                    <input type="number" name="wa" placeholder="0812..." required>
                </label>
            </div>

            <div class="grid">
                <label>Jenis Layanan
                    <select name="jenis" required>
                        <option value="Kaos Sablon">Custom Kaos Sablon</option>
                        <option value="Jersei">Custom Jersei (Full Print)</option>
                    </select>
                </label>
                <label>Ukuran
                    <select name="ukuran" required>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </label>
            </div>

            <label>Upload Desain (PNG/JPG/PDF)
                <input type="file" name="desain" required>
            </label>

            <label>Catatan Tambahan
                <textarea name="catatan" placeholder="Contoh: Sablon di depan dada..."></textarea>
            </label>

            <button type="submit" name="submit_custom">Kirim Pesanan Custom</button>
        </form>
    </article>
</body>
</html>