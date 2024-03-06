<?php
    include "../koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $id = $_GET["id"];
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id_user=$id");
    $data = mysqli_fetch_assoc($result);
   
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
        <h1>Bread ' Masters</h1>
        <ul>
            <li><a href="../dashboard.php">Dashboard</a></li>
            <li><a href="./petugas.php">Petugas</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Data Petugas</h3>
            <div class="box">
            <form action="../proses_edit_petugas.php" method="POST" enctype="multipart/form-data">
                       
                    <h5>Nama</h5>
                    <input type="text" name="Nama" placeholder="Nama" class="input-control" value="<?= $data['nama_lengkap'] ?>">

                    <h5>Alamat</h5>
                    <input type="text" name="Alamat" placeholder="Alamat" class="input-control" value="<?= $data['alamat'] ?>">


                    <input type="text" name="Jabatan" placeholder="Alamat" class="input-control" value="<?= $data['access_level'] ?>">

                    <h5>Tlp</h5>
                    <input type="text" name="Email" placeholder="No Hp" class="input-control" value="<?= $data['email'] ?>">

                    <input type="submit" name="submit" value="SIMPAN" class="btn">   
                    </select>
                            
                    </select>
            </div>
</body>
</html>

