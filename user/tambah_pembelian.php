<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM pembelian');
    
   
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
            <li><a href="pembelian.php">Pembelian</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Pembelian</h3>
            <div class="box">
                <form action="proses_tambah_pembelian.php" method="POST" enctype="multipart/form-data">
                    
                    <h5>ID Toko</h5>
                    <input type="text" name="id_toko" placeholder="ID Toko" class="input-control" value="">

                    <h5>ID Suplier</h5>
                    <input type="text" name="id_suplier" placeholder="ID Suplier" class="input-control" value="">

                    <h5>No Faktur</h5>
                    <input type="text" name="no_faktur" placeholder="No Faktur" class="input-control" value="">

                    <h5>Tanggal</h5>
                    <input type="text" name="created_at" placeholder="Tanggal" class="input-control" value="">

                    <h5>Total</h5>
                    <input type="text" name="total" placeholder="Total" class="input-control" value="">

                    <h5>Bayar</h5>
                    <input type="text" name="bayar" placeholder="Bayar" class="input-control" value="">

                    <h5>Sisa</h5>
                    <input type="text" name="sisa" placeholder="Sisa" class="input-control" value="">

                    <h5>Keterangan</h5>
                    <input type="text" name="no_faktur" placeholder="No Faktur" class="input-control" value="">

                    <input type="submit" name="submit" value="SIMPAN" class="btn"> 
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>
