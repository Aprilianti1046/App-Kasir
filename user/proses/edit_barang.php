<?php
    include "../koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $id_produk = $_GET["id_produk"];
    $query = mysqli_query($conn,'SELECT * FROM kategori_produk');
    $query2 = mysqli_query($conn, 'SELECT * FROM toko');
    $result = mysqli_query($conn,"SELECT * FROM produk  WHERE id_produk = $id_produk");
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
            <li><a href="../index.php">Dashboard</a></li>
            <li><a href="../data_barang.php">Data Produk</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Produk</h3>
            <div class="box">
                <form action="../proses_edit_produk.php?id_produk=<?php echo $_GET["id_produk"] ?>" method="POST" enctype="multipart/form-data">

                    

                    <h5>Satuan</h5>
                    <input type="text" name="satuan" placeholder="Satuan" class="input-control" value="<?php echo $data["satuan"] ?>">

                    <h5>Harga Jual</h5>
                    <input type="text" name="harga_jual" placeholder="Harga Jual" class="input-control" value="<?php echo $data["harga_jual"] ?>">

                    <h5>Stok Barang</h5>
                    <input type="text" name="stok" placeholder="Stok Barang" class="input-control" value="<?php echo $data["stok"] ?>">
                    <input type="submit" name="submit" value="SIMPAN" class="btn">   
                    
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>