<?php
include "koneksi.php";

if (isset($_POST['nama_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    

    $query_produk = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk = '$nama_produk'");
        
    $produk = mysqli_fetch_assoc($query_produk);
        $hargajual = $produk['harga_jual'];
        echo $hargajual;
    
}
?>
