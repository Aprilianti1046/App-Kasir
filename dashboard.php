<?php
include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread ' Masters</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Bread ' Masters</a></h1>
        <ul>
            
            <li><a href="profil.php">Profil</a></li>
            <li><a href="logout.php">Keluar</a></li>
        </ul>
        </div>
    </header>

     <!-- search -->
     <div class="search">
        <div class="container">
            <form action="produk.php">
                <h3>SELAMAT DATANG DI TOKO KAMI</h3>
            </form>
        </div>
    </div>

     <!-- Kategori -->
     <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box" style='display:flex; justify-content:center; gap:2em;'>
            <div class="col-5 " style='display:flex; justify-content:center; gap:6em;'>
                
                <!--barang-->
                <div style="margin-bottom:5px; display:flex; flex-direction:column;align-items:center ">
                <a href="data_barang.php"><img src="img/icon.png" width="40px" >
                <h5>Barang</h5>
                </a></div>
 
                 <!--suplier-->
                <div style="margin-bottom:5px;display:flex; flex-direction:column;align-items:center">
                <a href="data_suplier.php"><img src="img/icon.png" width="40px">
                <h5>Suplier</h5>
                </a></div>

                 <!--pelanggan-->
                <div style="margin-bottom:5px;display:flex; flex-direction:column;align-items:center">
                <a href="data_pelanggan.php"><img src="img/icon.png" width="40px">
                <h5>Pelanggan</h5>
                </a></div>
               
                 <!--petugas-->
                <div style="margin-bottom:5px;display:flex; flex-direction:column;align-items:center">
                <a href="petugas.php"><img src="img/icon.png" width="40px">
                <h5>Petugas</h5>
                </a></div>

                 <!--penjualan-->
                <div style="margin-bottom:5px;display:flex; flex-direction:column;align-items:center">
                <a href="penjualan.php"><img src="img/icon.png" width="40px">
                <h5>Penjualan</h5>
                </a></div>

                <!--detail penjualan-->
                <div style="margin-bottom:5px; display:flex; flex-direction:column;align-items:center ">
                <a href="data_barang.php"><img src="img/icon.png" width="40px" >
                <h5>Detail Penjualan</h5>
                </a></div>

                 <!--pembelian-->
                <div style="margin-bottom:5px;display:flex; flex-direction:column;align-items:center">
                <a href="pembelian.php"><img src="img/icon.png" width="40px">
                <h5>Pembelian</h5>
                </a></div>

            </div>
        </div>
    </div>
    

     <!--footer-->
     <footer>
        <div class="container">
            <small>KampuhJaya &copy; 2024-Kota Banjar</small>
        </div>
    </footer>
</body>
</html>