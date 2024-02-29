<?php 
include 'koneksi.php';

$id_toko = $_POST['id_toko'];
$id_suplier = $_POST['id_suplier'];
$no_faktur = $_POST['no_faktur'];
$tanggal_pembelian = $_POST['tanggal_pembelian'];
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$sisa = $_POST['sisa'];
$keterangan = $_POST['keterangan'];

$result = mysqli_query($conn,"INSERT INTO pembelian (id_toko,id_suplier,no_faktur,tanggal_pembelian,total,bayar,sisa,keterangan) VALUES ('$id_toko','$id_suplier','$no_faktur','$tanggal_pembelian','$total','$bayar','$sisa','$keterangan')");
if($result){
    echo "<script>alert('Data berhasil ditambahkan');window.location.href='pembelian.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>