<?php 
include 'koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];
$id_toko = $_POST['id_toko'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$result = mysqli_query($conn,"INSERT INTO pelanggan (id_pelanggan,id_toko,nama_pelanggan,alamat,no_hp) VALUES ('$id_pelanggan','$id_toko','$nama_pelanggan','$alamat','$no_hp')");
if($result){
    echo "<script>alert('Data berhasil ditambahkan');window.location.href='data_pelanggan.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>