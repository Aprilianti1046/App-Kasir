<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM kategori_produk');
    $query1 = mysqli_query($conn,'SELECT * FROM produk');
   
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
            <li><a href="data_barang.php">Data Produk</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">

                    <h5>Kategori</h5>
                    <select name='id_kategori' class='input-control'>
                        <?php while($kategori = mysqli_fetch_assoc($query)):?>
                            <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option> 
                        <?php endwhile ?>
                    </select>


                    <h5>Produk</h5>
                    <input type="text" name="nama_produk" placeholder="Nama Produk" class="input-control" value="">

                    <h5>Satuan</h5>
                    <input type="text" name="satuan" placeholder="Satuan" class="input-control" value="">

                    <h5>Harga Beli</h5>
                    <input type="text" name="harga_beli" placeholder="Harga Beli" class="input-control" value="">

                    <h5>Harga Jual</h5>
                    <input type="text" name="harga_jual" placeholder="Harga Jual" class="input-control" value="">

                    <h5>Stok Barang</h5>
                    <input type="text" name="stok" placeholder="Stok Barang" class="input-control" value="">
                    <input type="submit" name="submit" value="SIMPAN" class="btn">   
                   
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>