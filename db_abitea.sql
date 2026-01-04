-- 1. Tabel Produk (Untuk Katalog & Stok)
CREATE TABLE IF NOT EXISTS produk (
    id_produk INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL,
    foto_produk VARCHAR(255)
);

-- 2. Tabel Pesanan Custom (Fokus Utama: Jasa Custom & Upload Desain)
CREATE TABLE IF NOT EXISTS pesanan_custom (
    id_custom INT PRIMARY KEY AUTO_INCREMENT,
    nama_pembeli VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20) NOT NULL,
    jenis_layanan ENUM('Kaos Polos', 'Kaos Sablon', 'Jersei') NOT NULL,
    ukuran VARCHAR(10) NOT NULL,
    jumlah INT NOT NULL,
    file_desain VARCHAR(255) NOT NULL,
    catatan TEXT,
    status_pesanan ENUM('Pending', 'Diproses', 'Selesai') DEFAULT 'Pending',
    tanggal_pesan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabel User (Untuk Login Admin - Jika belum ada)
CREATE TABLE IF NOT EXISTS users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);