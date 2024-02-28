<?php
 include '../koneksi.php';

 if(isset ($_GET['id'])){
     $delete = mysqli_query($conn, "DELETE FROM produk WHERE id_produk='".$_GET['id']."'  ");
     echo '<script>window.location="../data_barang.php"</script>'; 
 }
?>