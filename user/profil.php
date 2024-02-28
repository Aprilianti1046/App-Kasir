<?php
include "koneksi.php";
session_start();

$id = $_SESSION['id'];
$sql = mysqli_query($conn,"SELECT * FROM users WHERE id_user = $id");
$d = mysqli_fetch_assoc($sql);
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
            <li><a href="profil.php">Profil</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="kasir" method="POST">
                <h5>Nama Lengkap</h5>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d['nama_lengkap']?>" required>

                    <h5>Username</h5>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d['username'] ?>"required>

                    <h5>Email</h5>
                    <input type="email" name="email" placeholder="Email" class="input-control"value="<?php echo $d['email']?>" required>

                    <h5>Alamat</h5>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"value="<?php echo $d['alamat']?>" required>

                    <h5>Status</h5>
                    <input type="text" name="access_level" placeholder="Status" class="input-control"value="<?php echo $d['access_level']?>" required>
                </form>
               
            </div>
        </div>
    </div>
</body>
</html>  