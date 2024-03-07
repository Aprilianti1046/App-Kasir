<?php
    include "../koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $id_barang_suplier = $_GET["id_barang_suplier"];
    $query = mysqli_query($conn,'SELECT * FROM barang_suplier');
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
            <li><a href="../data_suplier.php">Suplier</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Produk</h3>
            <div class="box">
                <form action="../proses_edit_detailsuplier.php?id_barang_suplier=<?php echo $_GET["id_barang_suplier"] ?>" method="POST" enctype="multipart/form-data">

                    <h5>Harga Jual</h5>
                    <input type="text" name="harga" placeholder="Harga Jual" class="input-control" value="<?php echo $data["harga"] ?>">

                    <input type="submit" name="submit" value="SIMPAN" class="btn"> 
                    
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>