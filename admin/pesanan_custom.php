<?php 
session_start();
// Proteksi: Hanya admin login yang bisa masuk
if($_SESSION['status'] != "login") header("location:login.php");
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Custom | Admin Abitea</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body class="container">
    <nav>
        <ul><li><strong>Data Pesanan Custom</strong></li></ul>
        <ul>
            <li><a href="index.php">Dashboard Utama</a></li>
            <li><a href="logout.php" class="secondary">Logout</a></li>
        </ul>
    </nav>

    <main>
        <figure>
            <table role="grid">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemesan</th>
                        <th>WhatsApp</th>
                        <th>Layanan</th>
                        <th>Ukuran</th>
                        <th>Desain</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM pesanan_custom ORDER BY id_custom DESC");
                    while($d = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><strong><?php echo $d['nama_pembeli']; ?></strong></td>
                        <td>
                            <a href="https://wa.me/<?php echo $d['whatsapp']; ?>" target="_blank" role="button" class="outline">Hubungi</a>
                        </td>
                        <td><?php echo $d['jenis_layanan']; ?></td>
                        <td><?php echo $d['ukuran']; ?></td>
                        <td>
                            <a href="desain_custom/<?php echo $d['file_desain']; ?>" target="_blank">
                                <img src="desain_custom/<?php echo $d['file_desain']; ?>" width="80" style="border-radius:5px;">
                            </a>
                        </td>
                        <td><small><?php echo $d['catatan']; ?></small></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </figure>
    </main>
</body>
</html>