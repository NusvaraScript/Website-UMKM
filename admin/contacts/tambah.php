<?php
// Sertakan file koneksi
include '../koneksi.php';

// Memastikan data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Membersihkan dan mengambil data dari formulir
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $pesan = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';

    // 2. Validasi sederhana: pastikan field wajib tidak kosong
    if ($nama === '' || $email === '' || $pesan === '') {
        // Redirect kembali ke halaman kontak dengan status error
        header("Location: ../../website/contact.html?status=error&msg=missing_fields");
        exit();
    }

    // 3. Query SQL untuk memasukkan data
    $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    // 4. Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, alihkan kembali ke halaman kontak di website dengan pesan sukses
        header("Location: ../../website/contact.html?status=success");
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