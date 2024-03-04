<?php
include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }

    $query = mysqli_query($conn,'SELECT * FROM penjualan');
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
        <h1><a href="index.php">Bread ' Masters</a></h1>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="penjualan.php">Penjualan</a></li>
            <li><a href="kasir.php">Kasir</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Penjualan</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Barang</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                   $no = 1;
                   while($penjualan = mysqli_fetch_assoc($query)):?>
                       <tr>
                       <th><?php echo $no++ ?></th>
                       <th><?php echo $penjualan["nama_barang"] ?></th>
                        <th><?php echo $penjualan["qty"] ?></th>
                       <th><?php echo $penjualan["total"] ?></th>
                       <th><?php echo $penjualan["created_at"] ?></th>
                      
                       </tr>
                   <?php endwhile ?>
    
</body>
</html>