<?php 
include 'koneksi.php';

$nama_suplier = $_POST['nama_suplier'];
$tlp_hp = $_POST['tlp_hp'];
$alamat_suplier = $_POST['alamat_suplier'];

$result = mysqli_query($conn,"UPDATE suplier SET nama_suplier='$nama_suplier',tlp_hp='$tlp_hp' WHERE alamat_suplier='$alamat_suplier'");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='data_suplier.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>