<?php 
include 'koneksi.php';

$id_suplier = $_POST['id_suplier'];
$id_toko = $_POST['id_toko'];
$nama_suplier = $_POST['nama_suplier'];
$tlp_hp = $_POST['tlp_hp'];
$alamat_suplier = $_POST['alamat_suplier'];


$result = mysqli_query($conn,"INSERT INTO suplier (id_suplier,id_toko,nama_suplier,tlp_hp,alamat_suplier) VALUES ('$id_suplier','$id_toko','$nama_suplier','$tlp_hp','$alamat_suplier')");
if($result){
    echo "<script>alert('Data berhasil ditambahkan');window.location.href='data_suplier.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>