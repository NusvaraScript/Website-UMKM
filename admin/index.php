<?php
// 1. Sertakan file koneksi database
include 'koneksi.php';

// 2. Query untuk mengambil semua data pemesanan
$sql_select = "SELECT id, nama, email, telepon, pesan FROM pemesanan ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin | Data Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #29384D; /* Warna Primary Anda */
            color: white;
        }
        .sidebar a {
            color: #ccc;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #1c2533;
            color: white;
        }
        .sidebar .active {
            background-color: #0d6efd; /* Warna Info/Aksen */
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
            <div class="position-sticky pt-3">
                <h3 class="text-white text-center mb-4">Nusantara Admin</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <i class="bi bi-person-lines-fill me-2"></i> Data Pemesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_kontak.php">
                            <i class="bi bi-person-lines-fill me-2"></i> Data Kontak
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../website/index.html">
                            <i class="bi bi-box-arrow-left me-2"></i> Kembali ke Website
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Admin</h1>
            </div>

            <h2>Data Permintaan Project</h2>
            <?php 
            // Cek apakah ada parameter status dari form pemesanan
            if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sukses!</strong> Data pemesanan baru telah berhasil ditambahkan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nama"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["telepon"] . "</td>";
                                // Batasi panjang pesan yang ditampilkan di tabel
                                echo "<td>" . (strlen($row["pesan"]) > 50 ? substr($row["pesan"], 0, 50) . "..." : $row["pesan"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data pemesanan yang ditemukan.</td></tr>";
                        }
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>