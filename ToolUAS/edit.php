<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil ID dari parameter URL
    $id = $_GET["id"];

    // Ambil data pengguna berdasarkan ID
    $query = "SELECT * FROM pengguna WHERE id = $id";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row["nama"];
        $email = $row["email"];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Ambil data dari formulir
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    // Update data di database
    $query = "UPDATE pengguna SET nama='$nama', email='$email' WHERE id=$id";
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
    <title>Edit Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h2>Edit Pengguna</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>

