<?php 
// 1. Memulai session untuk keamanan sistem
session_start();

// 2. Proteksi Halaman: Jika belum login, dialihkan ke halaman login.php
if($_SESSION['status'] != "login"){
    header("Location: login.php?pesan=belum_login");
    exit();
}

// 3. Menghubungkan ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Abitea Apparel</title>
    
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    
    <style>
        .img-produk {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <main class="container">
        <header>
            <nav class="nav-flex">
                <hgroup>
                    <h1>Abitea Apparel</h1>
                    <h2>Sistem Informasi Inventaris & Penjualan</h2>
                </hgroup>
                <ul>
                    <li>Halo, <strong><?php echo $_SESSION['username']; ?></strong></li>
                    <li><a href="logout.php" role="button" class="outline" style="color: #e74c3c; border-color: #e74c3c;">Logout</a></li>
                </ul>
            </nav>
        </header>

        <hr>

        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "berhasil"){
                echo "<div class='alert' style='background-color: #2ecc71; color: white;'>✔️ Produk Berhasil Ditambahkan!</div>";
            } else if($_GET['pesan'] == "hapus_berhasil"){
                echo "<div class='alert' style='background-color: #e67e22; color: white;'>🗑️ Produk Berhasil Dihapus!</div>";
            } else if($_GET['pesan'] == "update_berhasil"){
                echo "<div class='alert' style='background-color: #3498db; color: white;'>🔄 Data Berhasil Diperbarui!</div>";
            }
        }
        ?>

        <section>
            <div class="nav-flex" style="margin-bottom: 20px;">
                <h3>Data Inventaris Produk</h3>
                <div class="btn-group">
                    <a href="laporan.php" target="_blank" role="button" class="secondary">🖨️ Cetak Laporan</a>
                    <a href="tambah.php" role="button" class="contrast">+ Tambah Produk</a>
                </div>
            </div>

            

            <figure>
                <table role="grid">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Stok</th>
                            <th style="text-align: center;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Mengambil data dari tabel produk
                        $query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC");
                        $no = 1;

                        while($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <?php if($row['foto_produk'] != ""): ?>
                                    <img src="gambar/<?php echo $row['foto_produk']; ?>" class="img-produk">
                                <?php else: ?>
                                    <small>Tanpa Foto</small>
                                <?php endif; ?>
                            </td>
                            <td><strong><?php echo $row['nama_produk']; ?></strong></td>
                            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['stok']; ?> pcs</td>
                            <td style="text-align: center;">
                                <a href="edit.php?id=<?php echo $row['id_produk']; ?>" style="text-decoration:none; color: #3498db; font-weight: bold;">[ Edit ]</a>
                                &nbsp; | &nbsp;
                                <a href="hapus.php?id=<?php echo $row['id_produk']; ?>" 
                                   style="text-decoration:none; color: #e74c3c; font-weight: bold;"
                                   onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                   [ Hapus ]
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </figure>
        </section>

        <footer>
            <small>
                Aplikasi Skripsi: <strong>Rancang Bangun Sistem Penjualan Web Abitea Apparel</strong>
            </small>
        </footer>
    </main>

</body>
</html>