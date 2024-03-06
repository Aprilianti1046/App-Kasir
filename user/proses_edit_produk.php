<?php 
include 'koneksi.php';

$satuan = $_POST['satuan'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$result = mysqli_query($conn,"UPDATE produk SET satuan='$satuan',harga_jual='$harga_jual', stok='$stok' WHERE id_produk = $id_produk");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='data_barang.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>