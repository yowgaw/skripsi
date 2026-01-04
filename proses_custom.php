<?php
include 'admin/koneksi.php';

if (isset($_POST['submit_custom'])) {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $wa      = mysqli_real_escape_string($koneksi, $_POST['wa']);
    $jenis   = $_POST['jenis'];
    $ukuran  = $_POST['ukuran'];
    $catatan = mysqli_real_escape_string($koneksi, $_POST['catatan']);

    // Logika Upload File
    $nama_file = $_FILES['desain']['name'];
    $tmp_file  = $_FILES['desain']['tmp_name'];
    
    // Nama file unik agar tidak bentrok
    $nama_file_baru = date('YmdHis') . '_' . $nama_file;
    
    // Pastikan folder 'admin/desain_custom/' sudah Anda buat secara manual
    $path = "admin/desain_custom/" . $nama_file_baru;

    if (move_uploaded_file($tmp_file, $path)) {
        // Simpan ke tabel pesanan_custom yang kita buat di SQL tadi
        $query = "INSERT INTO pesanan_custom (nama_pembeli, whatsapp, jenis_layanan, ukuran, file_desain, catatan) 
                  VALUES ('$nama', '$wa', '$jenis', '$ukuran', '$nama_file_baru', '$catatan')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Pesanan Berhasil!'); window.location='index.php';</script>";
        }
    } else {
        echo "Gagal upload desain. Pastikan folder admin/desain_custom sudah dibuat.";
    }
}
?>