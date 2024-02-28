<?php 
include 'koneksi.php';

$id_produk = $_POST['id_produk'];
$id_kategori = $_POST['id_kategori'];
$nama_produk = $_POST['nama_produk'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];

$result = mysqli_query($conn,"INSERT INTO produk (nama_produk,id_kategori,harga_beli,harga_jual,satuan) VALUES ('$nama_produk','$id_kategori','$harga_beli','$harga_jual','$satuan')");
if($result){
    echo "<script>alert('Data berhasil ditambahkan');window.location.href='data_barang.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>