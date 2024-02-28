<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM suplier');
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread ' Masters</title>
    <link rel="stylesheet" href="dekorasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Bread ' Masters</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="data_suplier.php">Suplier</a></li>
        </ul>
        </div>
    </header>

     <!--content-->
     <div class="section">
        <div class="container">
            <h3>Tambah Data Suplier</h3>
            <div class="box">
            <form action="proses_tambah_datasuplier.php" method="POST" enctype="multipart/form-data">
                        
                    <h5>ID Suplier</h5>
                    <input type="text" name="id_suplier" placeholder="ID" class="input-control" value="">

                    <h5>ID Toko</h5>
                    <input type="text" name="id_toko" placeholder="ID Toko" class="input-control" value="">

                    <h5>Nama</h5>
                    <input type="text" name="nama_suplier" placeholder="Nama" class="input-control" value="">

                    <h5>Tlp</h5>
                    <input type="text" name="tlp_hp" placeholder="No Hp" class="input-control" value="">

                    <h5>Alamat</h5>
                    <input type="text" name="alamat_suplier" placeholder="Alamat" class="input-control" value="">
                    <input type="submit" name="submit" value="SIMPAN" class="btn">
                    </select>
                            
                    </select>
            </div>
</body>
</html>

  