<?php
// Sertakan file koneksi
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

    // 3. Gunakan prepared statement untuk memasukkan data (lebih aman)
    $stmt = mysqli_prepare($koneksi, "INSERT INTO pemesanan (nama, email, telepon, pesan) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $nama, $email, $telepon, $pesan);
        $exec = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($exec) {
            header("Location: ../../website/index.html?status=sukses");
            exit();
        } else {
            // Simpan error ke log di server (opsional) dan redirect dengan pesan error
            error_log('DB insert error: ' . mysqli_error($koneksi));
            header("Location: ../../website/index.html?status=error&msg=db_error");
            exit();
        }
    } else {
        // Gagal menyiapkan statement
        error_log('DB prepare error: ' . mysqli_error($koneksi));
        header("Location: ../../website/index.html?status=error&msg=db_prepare_error");
        exit();
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
?>