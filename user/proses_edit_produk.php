<?php 
include 'koneksi.php';
$id_produk = $_GET["id_produk"];
$id_kategori = $_POST['id_kategori'];
$nama_produk = $_POST['nama_produk'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$result = mysqli_query($conn,"UPDATE produk SET id_kategori='$id_kategori',nama_produk='$nama_produk',satuan='$satuan',harga_beli='$harga_beli',harga_jual='$harga_jual', stok='$stok' WHERE id_produk = $id_produk");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='data_barang.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>