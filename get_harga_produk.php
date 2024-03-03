<?php
include "koneksi.php";

if (isset($_POST['nama_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $nama_suplier = $_POST['nama_suplier'];

    $query_produk = mysqli_query($conn, "SELECT * FROM $nama_suplier WHERE nama_barang = '$nama_produk'");
        
    $produk = mysqli_fetch_assoc($query_produk);
        $hargajual = $produk['harga_beli'];
        echo $hargajual;
    
}
?>
