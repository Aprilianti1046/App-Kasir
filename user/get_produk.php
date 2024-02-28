<?php
include "koneksi.php";

if (isset($_POST['id_kategori'])) {
    $id_kategori = $_POST['id_kategori'];

    $query_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_kategori = $id_kategori");
    
    while ($produk = mysqli_fetch_assoc($query_produk)) {
        echo "<option value='{$produk['nama_produk']}'>{$produk['nama_produk']}</option>";
    }
}
?>
