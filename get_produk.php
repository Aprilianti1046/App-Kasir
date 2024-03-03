<?php
include "koneksi.php";

if (isset($_POST['nama_suplier'])) {
    $nama_suplier = $_POST['nama_suplier'];

    $query_suplier = mysqli_query($conn, "SELECT * FROM $nama_suplier ");
    
    while ($suplier = mysqli_fetch_assoc($query_suplier)) {
        echo "<option value='{$suplier['nama_barang']}'>{$suplier['nama_barang']}</option>";
    }
}
?>
