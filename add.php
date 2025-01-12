<?php
include 'db.php';
include 'auth.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $conn->query("INSERT INTO barang (nama_barang, jumlah, harga, tanggal_masuk) VALUES ('$nama_barang', $jumlah, $harga, '$tanggal_masuk')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="" method="POST">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br>
        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" required><br>
        <label>Harga:</label><br>
        <input type="number" step="0.01" name="harga" required><br>
        <label>Tanggal Masuk:</label><br>
        <input type="date" name="tanggal_masuk" required><br><br>
        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
