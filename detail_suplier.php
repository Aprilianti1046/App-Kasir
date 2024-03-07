<?php
    include "koneksi.php";
    session_start();
?>

<!-- Data Supplier -->
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
            <li><a href="data_suplier.php">Suplier</a></li>
        </ul>
        </div>
    </header>
                  <!--content-->
    <div class="section">
        <div class="container">
            <h3>Data Suplier</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                        <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php 
                $resultsuplier = mysqli_query($conn,"SELECT * FROM suplier WHERE id_suplier = '{$_GET['id_suplier']}' ");
                $fetchsuplier = mysqli_fetch_assoc($resultsuplier);
                $namasuplier = $fetchsuplier['nama_suplier'];
                $result=mysqli_query($conn, "SELECT * FROM barang_suplier WHERE nama_suplier = '$namasuplier'");
        $no=1;
        while ($d=mysqli_fetch_assoc($result)) : ?><tr>
                    <td><?=$no++?></td>
                    <td><?=$d['kategori'] ?></td>
                    <td><?=$d['nama_barang'] ?></td>
                    <td>Rp. <?= number_format($d['harga'], 0, ', ', '.') ?></td>  
                </tr><?php endwhile ?>
                
            </table>
        </div>
    </body>

</html>