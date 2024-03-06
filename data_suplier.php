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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th width="150px">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($data_suplier = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <td style="font-weight:600;"><?php echo $data_suplier["nama_suplier"] ?></td>
                        <td style="font-weight:600;"><?php echo $data_suplier["alamat_suplier"] ?></td>
                        <td style="font-weight:600;"><?php echo $data_suplier["tlp_hp"] ?></td>
                        
                        <td>
                        <a href="./proses/edit_suplier.php?id=<?php echo $data_suplier['id_suplier'] ?>"><button class="btn btn-primary">Edit</button></a>

                        <a href="detail_suplier.php?kategori=<?= $data_suplier['kategori']?>&&id_suplier=<?= $data_suplier['id_suplier']?>"><button class="btn btn-success">Detail</button></a>
                            </td>
                        </tr>

                    <?php endwhile ?>
                    
</tbody>
    
</body>
</html>