<?php
// Sertakan file koneksi
include '../koneksi.php';

// Memastikan data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Membersihkan dan mengambil data dari formulir
    // Penggunaan mysqli_real_escape_string penting untuk mencegah SQL Injection
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    // 2. Query SQL untuk memasukkan data
    $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    // 3. Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, alihkan kembali ke halaman beranda dengan pesan sukses
        header("Location: index.php?status=sukses");
        exit();
    } else {
        // Jika gagal, tampilkan error
        // Untuk proyek nyata, error ini harus dicatat (logging) bukan ditampilkan ke user
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
?>