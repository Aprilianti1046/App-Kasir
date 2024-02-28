<?php
    include "../koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $id = $_GET["id"];
    $result = mysqli_query($conn,"SELECT * FROM pembelian WHERE id_pembelian=$id");
    $data = mysqli_fetch_assoc($result);
    $query2 = mysqli_query($conn, 'SELECT * FROM suplier');
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../dekorasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1><a href="../dashboard.php">Kampuh Jaya</a></h1>
        <ul>
            <li><a href="../dashboard/index.html">Dashboard</a></li>
            <li><a href="../pembelian.php">Pembelian</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Data Pembelian</h3>
            <div class="box">
                <form action="../proses_edit_pembelian.php" method="POST" enctype="multipart/form-data">
                    
                    <h5>ID Toko</h5>
                    <input type="text" name="id_toko" placeholder="ID Toko" class="input-control" value="<?= $data['id_toko'] ?>">

                    <h5>Suplier</h5>
                    <select name='nama_suplier' class='input-control'>
                        <?php while($suplier = mysqli_fetch_assoc($query2)):?>
                            <option value="<?= $suplier['nama_suplier']?>"><?= $suplier['nama_suplier']?></option> 
                        <?php endwhile ?>
                    </select>

                    <h5>No Faktur</h5>
                    <input type="text" name="no_faktur" placeholder="No Faktur" class="input-control" value="<?= $data['no_faktur'] ?>">

                    <h5>Tanggal</h5>
                    <input type="text" name="created_at" placeholder="Tanggal" class="input-control" value="<?= $data['created_at'] ?>">

                    <h5>Total</h5>
                    <input type="text" name="total" placeholder="Total" class="input-control" value="<?= $data['total'] ?>">

                    <h5>Bayar</h5>
                    <input type="text" name="bayar" placeholder="Bayar" class="input-control" value="<?= $data['bayar'] ?>">

                    <h5>Sisa</h5>
                    <input type="text" name="sisa" placeholder="Sisa" class="input-control" value="<?= $data['sisa'] ?>">

                    <h5>Keterangan</h5>
                    <input type="text" name="keterangan" placeholder="Keterangan" class="input-control" value="<?= $data['keterangan'] ?>">

                    <input type="submit" name="submit" value="SIMPAN" class="btn"> 
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>
