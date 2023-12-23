<?php
include "koneksi.php";

// Form untuk menambahkan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    // Masukkan data ke database
    $query = "INSERT INTO pengguna (nama, email) VALUES ('$nama', '$email')";
    $koneksi->query($query);

    // Redirect kembali ke halaman utama
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
</head>
<body>
    <h2>Tambah Pengguna</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama: <input type="text" name="nama"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
