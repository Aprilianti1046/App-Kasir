<?php 
include 'koneksi.php';

$ID_Petugas = $_POST['ID_Petugas'];
$ID_Toko = $_POST['ID_Toko'];
$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$No_Hp = $_POST['No_Hp'];

$result = mysqli_query($conn,"INSERT INTO petugas (ID_Petugas,ID_Toko,Nama,Alamat,No_Hp) VALUES ('$ID_Petugas','$ID_Toko','$Nama','$Alamat','$No_Hp')");
if($result){
    echo "<script>alert('Data berhasil ditambahkan');window.location.href='petugas.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>