<?php 
require 'function.php';

$product = liatdata("SELECT * FROM product");

if (isset($_POST["submit"])) {
    $product = caridata($_POST["cari"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h2>Halaman Product</h2>
    <form action="" method="post">
        <input type="text" name="cari" placeholder="cari data anda" autocomplete="off">
        <button type="submit" name="submit">Cari</button>
    </form>
    <a href="tambah-data.php">Tambah Data</a>
    <table border="3px" cellpadding="15px" cellspacing="0" align="center">
        <tr>
            <th>No</th>
            <th>Photo Product</th>
            <th>Kode Product</th>
            <th>Name Product</th>
            <th>Harga Product (Rp)</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($product as $pr): ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <img src="img/<?= $pr["photo_product"]; ?>" alt="" width="50px">
            </td>
            <td><?= $pr["kode_product"];?></td>
            <td><?= $pr["nama_product"];?></td>
            <td><?= $pr["harga_product"];?></td>
            <td>
                <a href="ubah-data.php?id=<?= $pr["id"]; ?>" onclick="return confirm('Apakah Anda Ingin Mengubah Data Ini?')">Update</a>   |
                <a href="hapus-data.php?id=<?= $pr["id"]; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">Delete</a>
            </td>
        </tr>
        <?php $i++;?>
        <?php endforeach ;?>
    </table>
</body>
</html>