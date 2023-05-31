<?php 
require 'function.php';

$id = $_GET["id"];

if (hapusdata($id) > 0) {
    ?>
        <script type="text/javascript">
            alert('Anda Berhasil Menghapus Data Ini');
            document.location.href='index.php';
        </script>
    <?php
}

?>