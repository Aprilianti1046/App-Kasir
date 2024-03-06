<?php 
include 'koneksi.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$result = mysqli_query($conn,"UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan',alamat='$alamat' WHERE no_hp='$no_hp' ");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='data_pelanggan.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>