<?php
include '../koneksi.php';

// Memastikan data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Membersihkan dan mengambil data dari formulir
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telepon = isset($_POST['telepon']) ? trim($_POST['telepon']) : '';
    $pesan = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';

    // 2. Validasi sederhana: pastikan field wajib tidak kosong
    if ($nama === '' || $email === '' || $telepon === '' || $pesan === '') {
        // Redirect kembali dengan status error (jangan kirim header jika output sudah dikirim sebelumnya)
        header("Location: ../../website/index.html?status=error&msg=missing_fields");
        exit();
    }

    // 2. Query SQL untuk memasukkan data
    $sql = "INSERT INTO pemesanan (nama, email, telepon, pesan) VALUES ('$nama', '$email', '$telepon', '$pesan')";

    // 3. Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, alihkan kembali ke halaman website beranda dengan pesan sukses
        header("Location: ../../website/index.html?status=success");
        exit();
    } else {
        // Jika gagal, tampilkan error
        // Untuk proyek nyata, error ini harus dicatat (logging) bukan ditampilkan ke user
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);
?>