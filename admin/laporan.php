<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("Location: login.php?pesan=belum_login");
    exit();
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Stok - Abitea Apparel</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .footer { margin-top: 50px; text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <h1>ABITEA APPAREL</h1>
        <p>Laporan Inventaris Stok Produk</p>
        <p>Tanggal: <?php echo date('d-m-Y'); ?></p>
        <hr>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Satuan</th>
                <th>Stok Tersedia</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $ambil = mysqli_query($koneksi, "SELECT * FROM produk");
            $no = 1;
            while($d = mysqli_fetch_array($ambil)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama_produk']; ?></td>
                <td>Rp <?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $d['stok']; ?> pcs</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Tangerang, <?php echo date('d F Y'); ?></p>
        <br><br><br>
        <p>( <strong><?php echo $_SESSION['username']; ?></strong> )</p>
        <p>Admin Gudang</p>
    </div>

    <script>
        window.print();
    </script>

</body>
</html>