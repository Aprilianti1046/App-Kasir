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
        <h1>Bread ' Masters</h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
            <li><a href="data_barang.php">Barang</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Data Pembelian Barang</h3>
            <div class="box">
                <p><a href="tambah_pembelian.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Tanggal</th>
                            <th>Suplier</th>
                            <th>No Faktur</th> 
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Sisa</th>   
                         
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($pembelian = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <th><?php echo $pembelian["created_at"] ?></th>
                        <td style="font-weight:600;"><?php echo $pembelian["id_suplier"] ?></td>
                        <th><?php echo $pembelian["no_faktur"] ?></th>
                        <td style="font-weight:600;"><?php echo $pembelian["total"] ?></td>
                        <td style="font-weight:600;"><?php echo $pembelian["bayar"] ?></td>
                        <th><?php echo $pembelian["sisa"] ?></th>
                        
                        </tr>
                    <?php endwhile ?>
                    
</tbody>
    
</body>
</html>