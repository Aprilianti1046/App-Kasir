<?php 
session_start();
include "koneksi.php";

$total_bayar = $_POST['total'];
$sisa = $_POST['sisa'];
$jumlah_bayar = $_POST['bayar'];

$result_tambah_pembelian= mysqli_query($koneksi,"SELECT hitung FROM hitung INNER JOIN suplier ON hitung.nama_produk = suplier.nama_barang");
$datenow = date("Y-m-d");

while($row = mysqli_fetch_assoc($result_tambah_pembelian)){
    $nama_barang = $row['nama_barang'];
    $bayar = $row['bayar'];
    $sisa = $row['sisa'];
    $qty = $row['qty'];
    $harga = $row['harga'];
    $total = $row['total'];

    $insertdata = mysqli_query($koneksi,"INSERT INTO pembelian (qty,bayar,sisa,total,harga,suplier) VALUES ('$qty','$total_bayar','$sisa','$created_at','$jumlah_bayar','$suplier')");
    
    $insertdatabarang = mysqli_query($koneksi,"INSERT INTO produk (nama_produk,stok,harga_beli,created_at) VALUES ('$nama_barang','$qty','$harga','$datenow')");
}

$deleteproduk = mysqli_query($koneksi,"DELETE FROM tambah_pembelian");
header("Location:pembelian.php");

?>