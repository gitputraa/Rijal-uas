<?php
include 'db.php';
include 'auth.php';

require_login();

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM barang WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $conn->query("UPDATE barang SET nama_barang = '$nama_barang', jumlah = $jumlah, harga = $harga, tanggal_masuk = '$tanggal_masuk' WHERE id = $id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Barang</h1>
    <form action="" method="POST">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required><br>
        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required><br>
        <label>Harga:</label><br>
        <input type="number" step="0.01" name="harga" value="<?= $data['harga'] ?>" required><br>
        <label>Tanggal Masuk:</label><br>
        <input type="date" name="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
