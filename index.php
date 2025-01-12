<?php
include 'db.php';
include 'auth.php';

require_login();

$result = $conn->query("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inventaris</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0044cc;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        a.button:hover {
            background-color: #003399;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th {
            background-color: #0044cc;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
        }

        td a {
            color: #0044cc;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
<header>
        <h1>Data Inventaris</h1>
    </header>
    <div class="container">
        <div class="welcome">
            Selamat datang, <?= $_SESSION['username'] ?>! 
        </div>
    <div class="container">
        <div class="actions">
            <a href="logout.php" class="button">Logout</a>
            <a href="add.php" class="button">Tambah Barang</a>
        </div>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th class="center">Aksi</th>
            </tr>
            <?php $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= number_format($row['harga'], 2, ',', '.') ?></td>
                <td><?= $row['tanggal_masuk'] ?></td>
                <td class="center">
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
