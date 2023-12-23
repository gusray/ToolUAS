<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil ID dari parameter URL
    $id = $_GET["id"];

    // Hapus data pengguna dari database
    $query = "DELETE FROM pengguna WHERE id = $id";
    $koneksi->query($query);

    // Redirect kembali ke halaman utama
    header("Location: index.php");
} else {
    echo "Akses tidak sah.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            margin-top: 20px;
            color: #333;
        }

        .confirm-btn {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .confirm-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h2>Hapus Pengguna</h2>
    <p>Apakah Anda yakin ingin menghapus data?</p>
    <a href="index.php" class="confirm-btn">Ya, Hapus</a>
    <a href="index.php">Batal</a>
</body>
</html>
