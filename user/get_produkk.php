<?php
include "koneksi.php";

if (isset($_POST['nama_produk'])) {
    $nama_produk = $_POST['nama_produk'];

    $query_produk= mysqli_query($conn, "SELECT * FROM $nama_produk ");
    
    while ($produk = mysqli_fetch_assoc($query_produk)) {
        echo "<option value='{$produk['nama_produk']}'>{$produk['nama_produk']}</option>";
    }
}
?>
