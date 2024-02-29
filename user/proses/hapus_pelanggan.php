<?php
 include '../koneksi.php';

 if(isset ($_GET['id'])){
     $delete = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='".$_GET['id']."'  ");
     echo '<script>window.location="../data_pelanggan.php"</script>'; 
 }
?>