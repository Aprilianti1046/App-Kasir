<?php 
include 'koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$access_level = $_POST['access_level'];

$result = mysqli_query($conn,"UPDATE users SET nama_lengkap='$nama_lengkap',alamat='$alamat',email='$email' WHERE access_level='$access_level'");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='petugas.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>