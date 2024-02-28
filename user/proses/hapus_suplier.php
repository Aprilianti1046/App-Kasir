<?php
 include '../koneksi.php';
 $id = $_GET["id"];

 if(isset ($_GET['id'])){
     $delete = mysqli_query($conn, "DELETE FROM suplier WHERE id_suplier=$id");
     echo '<script>window.location.href="../data_suplier.php"</script>'; 
 }
?>