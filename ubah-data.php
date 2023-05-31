<?php 
require 'function.php';

$id = $_GET["id"];

$product = liatdata("SELECT * FROM product WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if (ubahdata($_POST) > 0) {
        ?>
            <script type="text/javascript">
                alert('Anda Berhasil Mengupdate Data Ini!');
                document.location.href='index.php';
            </script>
        <?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/tambahdata.css">
</head>
<body>
    <h2>Update Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product["id"]; ?>">
        <input type="hidden" name="photo_lama" value="<?= $product["photo_product"]; ?>">
        <label for="nama_product">Nama Product : </label>
        <input type="text" name="nama_product" id="nama_product" value="<?= $product["nama_product"]; ?>" placeholder="contoh:Ice Cream" autocomplete="off" required>
        <br><br>
        <label for="kode_product">Kode Product : </label>
        <input type="text" name="kode_product" id="kode_product" value="<?= $product["kode_product"]; ?>" placeholder="contoh:Kp001" autocomplete="off" required>
        <br><br>
        <label for="harga_product">Harga Product : </label>
        <input type="number" name="harga_product" id="harga_product" value="<?= $product["harga_product"]; ?>" placeholder="contoh:50000" autocomplete="off" required>
        <br><br>
        <label for="photo_product">Photo Product : </label>
        <input type="file" name="photo_product" id="photo_product" autocomplete="off">
        <br><br>
        <button type="submit" name="submit">Update Data</button>
    </form><br>
    <a href="index.php">Kembali</a>
</body>
</html>