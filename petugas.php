<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:login.php');
    }

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
            <li><a href="petugas.php">Petugas</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Petugas</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Status</th>
                            
                            <th width="150px">Aksi</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $result = mysqli_query($conn,"SELECT * FROM users"); 
                         $no = 0;
                         while($users = mysqli_fetch_assoc($result)):
                            $no++
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $users['nama_lengkap']?></td>
                            <td><?= $users['alamat']?></td>
                            <td><?= $users['email']?></td>
                            <td><?= $users['access_level']?></td>
                            <td>
                                <a href="../proses/edit_petugas.php?id_user=<?php echo $users['id_user'] ?>"><button class="btn btn-primary">Edit</button></a>
                                
                                <a href="../proses/hapus_petugas.php?id_user=<?php echo $users['id_user'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini??')"><button class="btn btn-primary">Hapus</button></a>
                            </td>
                        </tr>
                        <?php endwhile ?>
</tbody>
    
</body>
</html>