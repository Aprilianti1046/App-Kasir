<?php
 include '../koneksi.php';

 if(isset ($_GET['id'])){
     $delete = mysqli_query($conn, "DELETE FROM pembelian WHERE id_pembelian='".$_GET['id']."'  ");
     echo '<script>window.location="../pembelian.php"</script>'; 
 }
?>