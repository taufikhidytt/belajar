<?php 
$conn = mysqli_connect("localhost", "root", "", "market");

function liatdata($liat){
    global $conn;
    $query = mysqli_query($conn, $liat);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahdata($tambah){
    global $conn;
    $kp = htmlspecialchars($tambah["kode_product"]);
    $np = htmlspecialchars($tambah["nama_product"]);
    $hp = htmlspecialchars($tambah["harga_product"]);
    $pd = htmlspecialchars($tambah["photo_default"]);

    $pp = upload();
    
    if (!$pp){
        $pp = $pd;
    }
    $query = "INSERT INTO product
                    VALUES
            ('', '$kp', '$np', '$hp', '$pp')
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["photo_product"]["name"];
    $ukuranFile = $_FILES["photo_product"]["size"];
    $error = $_FILES["photo_product"]["error"];
    $tmpName = $_FILES["photo_product"]["tmp_name"];

    if ($error === 4) {
        ?>
            <script type="text/javascript">
                alert('Anda Belum Memasukan Photo, Photo Default Di Masukan');
            </script>
        <?php
        return false;
    }

    $ekstensionPhotoValid = ['jpg', 'png', 'jpeg'];
    $ekstensionPhoto = explode('.', $namaFile);
    $ekstensionPhoto = strtolower(end($ekstensionPhoto));

    if (!in_array($ekstensionPhoto, $ekstensionPhotoValid)) {
        ?>
            <script type="text/javascript">
                alert('Ekstensi Photo Wajib png, jpg, jpeg, Photo Default Di Masukan');
            </script>
        <?php
        return false;
    }

    if ($ukuranFile > 2000000) {
        ?>
            <script type="text/javascript">
                alert('Ukuran Photo Tidak Lebih Dari 2 Mb, Photo Default Di Masukan');
            </script>
        <?php
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensionPhoto;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function ubahdata($ubah){
    global $conn;
    $id = htmlspecialchars($ubah["id"]);
    $kp = htmlspecialchars($ubah["kode_product"]);
    $np = htmlspecialchars($ubah["nama_product"]);
    $hp = htmlspecialchars($ubah["harga_product"]);
    $pl = htmlspecialchars($ubah["photo_lama"]);

    if ($_FILES["photo_product"]['error'] === 4) {
        $pp = $pl;
    }else{
        $pp = upload();
    }

    $query = "UPDATE product SET
            kode_product = '$kp',
            nama_product = '$np',
            harga_product = '$hp',
            photo_product = '$pp'
            WHERE id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusdata($hapus){
    global $conn;
    mysqli_query($conn, "DELETE FROM product WHERE id = $hapus");
    return mysqli_affected_rows($conn);
}

function caridata($cari){
    $query = "SELECT * FROM product
                    WHERE
            kode_product LIKE '%$cari%' OR
            nama_product LIKE '%$cari%' OR
            harga_product LIKE '%$cari%'
    ";

    return liatdata($query);
}

function registrasi($regist){
    global $conn;
    $username = strtolower(stripslashes($regist["username"]));
    $password = mysqli_escape_string($conn, $regist["password"]);
    $password2 = mysqli_escape_string($conn, $regist["password2"]);

    $query = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($query)) {
        ?>
            <script type="text/javascript">
                alert('Username Sudah Terpakai Silahkan Cari Username Baru');
            </script>
        <?php
        return false;
    }

    if ($password !== $password2) {
        #
    }
}


?>