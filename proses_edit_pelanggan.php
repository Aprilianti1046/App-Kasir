<?php 
include 'koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];
$id_toko = $_POST['id_toko'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$result = mysqli_query($conn,"UPDATE pelanggan SET no_hp=$no_hp,id_toko='$id_toko',nama_pelanggan='$nama_pelanggan',alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='data_pelanggan.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>