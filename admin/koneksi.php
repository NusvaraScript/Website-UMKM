<?php
// Pengaturan koneksi database
$host = "localhost"; // Biasanya localhost untuk development
$user = "root";      // Ganti sesuai username MySQL Anda
$password = "";      // Ganti sesuai password MySQL Anda (kosong jika pakai XAMPP/Laragon default)
$database = "db_nusantara"; // Nama database yang kita buat

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil dibuat."; // Hapus atau komentari agar tidak mengganggu header/redirect
?>