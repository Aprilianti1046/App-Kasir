<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:login.php');
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
            <h3>Data Suplier</h3>
            <div class="box">
                <p><a href="tambah_datasuplier.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                        <th width="60px">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th width="100px">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($data_suplier = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <th><?php echo $data_suplier["nama_suplier"] ?></th>
                        <th><?php echo $data_suplier["alamat_suplier"] ?></th>
                        <th><?php echo $data_suplier["tlp_hp"] ?></th>
                        
                        <td>
                                <a href="ahmad.php?id=<?php echo $ahmad['id_barang']?>">Detail</a> <a href="./proses/edit_suplier.php?id=<?php echo $data_suplier['id_suplier'] ?>">Edit</a>
                            </td>
                        
                        </tr>
                        
                    <?php endwhile ?>
                    
</tbody>
    
</body>
</html>