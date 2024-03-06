<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:login.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM pelanggan');

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
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data_pelanggan.php">Pelanggan</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Data Pelanggan</h3>
            <div class="box">
                <p><a href="tambah_datapelanggan.php">Tambah Data</a></p>
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
                    while($data_pelanggan = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <th><?php echo $data_pelanggan["nama_pelanggan"] ?></th>
                        <th><?php echo $data_pelanggan["alamat"] ?></th>
                        <th><?php echo $data_pelanggan["no_hp"] ?></th>
                       
                        <td>
                            <a href="./proses/edit_pelanggan.php?id=<?php echo $data_pelanggan['id_pelanggan'] ?>"><button class="btn btn-primary">Edit</button></a>
                            
                            <a href="./proses/hapus_pelanggan.php?id=<?php echo $data_pelanggan['id_pelanggan'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini??')"><button class="btn btn-primary">Hapus</button></a>
                        </td>
                        
                        </tr>
                    <?php endwhile ?>
                    
</tbody>
    
</body>
</html>