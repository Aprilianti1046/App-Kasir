<?php
 include '../koneksi.php';

 if(isset ($_GET['id'])){
     $delete = mysqli_query($conn, "DELETE FROM petugas WHERE ID_Petugas='".$_GET['id']."'  ");
     echo '<script>window.location="../petugas.php"</script>'; 
 }
?>