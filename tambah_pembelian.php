<?php
include "koneksi.php";
session_start();
$query = mysqli_query($conn, 'SELECT * FROM suplier');
$selectedproduk = mysqli_query($conn, 'SELECT * FROM produk WHERE id_kategori =1');
$hargaproduk = mysqli_query($conn, 'SELECT * FROM produk WHERE id_produk = 1');
$query1 = mysqli_query($conn, 'SELECT * FROM users');
$query2 = mysqli_query($conn, 'SELECT * FROM ahmad');
$query6 = mysqli_query($conn, 'SELECT * FROM maman');
$query3 = mysqli_query($conn, 'SELECT * FROM toko');
$query4 = mysqli_query($conn, 'SELECT * FROM produk');
$query5 = mysqli_query($conn, 'SELECT * FROM pelanggan');

// koneksi
$conn = new mysqli('localhost', 'root', '', 'kasir');

// Simpan data
if (isset($_POST['submit'])) {
    $sup = $_POST['nama_suplier'];
    $nb = $_POST['nama_barang'];
    $hrg = $_POST['harga'];
    $qty = $_POST['qty'];
    $sisa = $_POST['sisa'];
    $total_bayar = $_POST['total'];
    $totalbayar = $_POST['totalbayar'];
    $total = $hrg * $qty;

    $q = mysqli_query($conn, "INSERT INTO hitung (suplier, nama_barang, harga, bayar, sisa, total, qty) VALUES ('$sup', '$nb', '$hrg','$totalbayar','$sisa','$total', '$qty')");
    $resultstok = mysqli_query($conn, "SELECT stok FROM produk WHERE nama_produk = '$nb'");
    $datastok = mysqli_fetch_assoc($resultstok);
    $stok = $datastok['stok'];
    $hitungstok = $stok + $qty;
    $tambah_jumlah = mysqli_query($conn, "UPDATE produk SET stok='$hitungstok' WHERE nama_produk='$nb'");

    if ($q) {
        header('Location: tambah_pembelian.php');
        exit();
    } else {
        echo "<script>alert('Gagal menambahkan data'); window.location.href = pembelian.php;</script>";
    }
}

if (isset($_POST['SIMPAN'])) {
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $sisa = $_POST['sisa'];
    $nama_barang = $_POST['nama_barang'];
    $suplier = $_POST['suplier'];
    $created_at = $_POST['created_at'];

    $result = mysqli_query($conn, "INSERT INTO hitung (nama_kategori, suplier, nama_barang, harga, qty, created_at) VALUES ('$total', '$suplier', '$nama_barang', '$bayar', '$sisa', '$created_at')");

    if (!$result) {
        die('Error in INSERT query: ' . mysqli_error($conn));
    } else {
        header('Location: pembelian.php');
        exit();
    }
}

// ... Proses Simpan ...

if (isset($_POST['sisa'])) {
   // $qty = $_POST['qty'];
    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    $sisa = $_POST['sisa'];

    $insertdata = mysqli_query($conn, "SELECT * FROM hitung");
    while ($d = mysqli_fetch_assoc($insertdata)) {
        $suplier = $d['suplier'];
        $nama_barang = $d['nama_barang'];
        $total_b = $d['total'];
        $bayar_b = $d['bayar'];
        $sisa_b = $d['sisa'];
        $harga = $d['harga'];
        $qty_b = $d['qty'];
        $id = $d['id'];
        
        $sisa_h = $total_b - $bayar;
        $update_hitung = mysqli_query($conn,"UPDATE hitung SET bayar='$bayar',sisa='$sisa_h' WHERE id='$id'");


        $resultMoveData = mysqli_query($conn, "INSERT INTO pembelian ( id_suplier, total,bayar, sisa, qty, created_at) VALUES('$suplier','$total_b','$bayar','$sisa_h', '$qty_b',now())");
        $hapushitung = mysqli_query($conn, "DELETE FROM hitung");
    }

    if ($resultMoveData) {
        // Data berhasil dipindahkan, lanjutkan dengan menghapus data di tabel hitung jika diperlukan
        // Misalnya: mysqli_query($conn, "DELETE FROM hitung");

        // Redirect to the same page to refresh the content
        header('Location: pembelian.php');
        exit();
    } else {
        var_dump($conn);
        //echo "<script>alert('Gagal memindahkan data ke tabel pembelian');</script>";
    }
}

// ... The rest of your PHP code ...
?>

<!-- ... Your HTML code ... -->

    
 
<!DOCTYPE html>
<html>
<head>
 
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>Bread ' Masters</title>
    <link rel="stylesheet" href="dekorasi.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1>Bread ' Masters</h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="pembelian.php">Penmbelian</a></li>
        </ul>
        </div>
    </header>

<div class="card mt-5">
<div class="card-body mx-auto" style='display:flex;flex-wrap:wrap;gap:3em'>
<form method="POST" action="" class="form-inline mt-3">
<div class='' style='display:flex;flex-wrap:wrap;gap:4em'>

 
                    
                   <!--suplier-->
                   <div>
                    <h6>Suplier</h6>
                    <select name='nama_suplier' class='input-control' id='nama_suplier' style="width:160px; height:39px;">
                    <option value='0'>Pilih Suplier</option>
                    <?php while($suplier = mysqli_fetch_assoc($query)):?>
                    <option value="<?= $suplier['nama_suplier']?>"><?= $suplier['nama_suplier']?></option> 
                    <?php endwhile ?>
                    </select>
                    </div>

                    
                    <!--produk-->
                    <div>
                    <h6>Nama Produk</h6>
                    <select name='nama_barang' id='produk' class='input-control' style="width:160px; height:39px;">
                    <?php while ($ahmad = mysqli_fetch_assoc($query2)):?>
                    <option value="<?= $ahmad['nama_barang'] ?>"><?= $ahmad['nama_barang']?></option>
                    <?php endwhile ?>
                    </select>
                    </div>



                    <!--harga-->               
                    <div>
                    <h6>Harga</h6>
                    <input type="number" id='input_harga' name="harga" id="harga" class="input-control mr-sm-2" style="width:160px; height:39px;">
                    </div>

                    <!--jumlah-->
                    <div>
                    <h6>Jumlah</h6>
                    <input type="number" name="qty" id="qty" class="input-control mr-sm-2" style="width:160px; height:39px;">
                    </div>

                    <!--button-->
                    <button type="submit" style="width:140px; height:37px; margin-right:100px; position:relative; margin-top:28px; margin-bottom:5px" name="submit" class="btn btn-primary">Hitung</button>

                    <!--Total Bayar-->
                    <div>
                    <h6>Total Bayar</h6>
                    <input type="number" name="totalbayar" id="totalbayar" class="input-control mr-sm-2" style="width:160px; height:39px;">
                    </div>

                    <!--button-->
                    </form>
                    <hr/>
                    <button type='button' id='totalbayarbutton' style="width:140px; height:37px;  position:relative; margin-top:28px; margin-left:-50px; margin-bottom:30px"  class="btn btn-primary">Hitung</button>




<!--code menampilkan data-->
<?php
$q = mysqli_query($conn, "SELECT * FROM pembelian");
?>
<table class="table table-bordered mt-5" >
<tr>
<th>No</th>
<th>Suplier</th>
<th>Nama Barang</th>
<th>Harga Satuan</th>
<th>Jumlah</th>
<th>Total</th>

</tr>
 
<?php
// perintah tampil data
$q = mysqli_query($conn, "SELECT * FROM hitung");
 
$total = 0;
$tot_bayar = 0;
$no = 0;
$jumlahdata = mysqli_num_rows($q);
while ($r = $q->fetch_assoc()) {

// total adalah hasil dari harga x qty
$total = $r['harga'] * $r['qty'];

// total bayar adalah penjumlahan dari keseluruhan total
$tot_bayar += $total;
$no++;
?>
 
<tr>
<td><?= $no ?></td>
<td><?= ucwords($r['suplier']) ?></td>
<td><?= ucwords($r['nama_barang']) ?></td>
<td><?= $r['harga'] ?></td>
<td><?= $r['qty'] ?></td>
<td id=''><?= $total ?></td>
</tr>
 
<?php
}
?>
 
 <?php
// perintah tampil data totalbayar
$q = mysqli_query($conn, "SELECT * FROM hitung");
 
$totalbayar = 0;
$total = 0;
$no = 1;
 
?>
 
<?php

?>
<form method='POST' action="">
    <tr>
    <th colspan="5">Total Barang</th>
    <th ><input name='total' id='total_barang'  value='<?= $tot_bayar ?>' /></th>
    </tr>
    <tr >
    <th colspan="5">Total Bayar</th>
    <th ><input name='bayar' id='total_bayar'  value='<?= $totalbayar ?>' /></th>
    </tr>
    <tr >
    <th colspan="5">Sisa</th>
    <th ><input name='sisa' value=''id='sisa'  /></th>
</tr>
    
</table>
<button type="submit" name="sisa"  class="btn">Simpan </button>  
</form>
</style=>
</div>
</div>



<!--menampilkan data-->
<?php $q = mysqli_query($conn, "SELECT * FROM pelanggan"); ?>


<script>
    const resetFormAndReload = () => {
        document.getElementById("myForm").reset();
        location.reload();
    };

    const totalbayarinput = document.getElementById("totalbayar");
    const totalbayar = document.getElementById("total_bayar");
    const totalbayarbutton = document.getElementById("totalbayarbutton");
    const totalbarang = document.getElementById("total_barang");
    const sisa = document.getElementById("sisa");
    let id_kategori = document.getElementById("nama_kategori")
    
    let totalbarangvalue = totalbarang.value;

    function loadProduk() {
        var selectedKategori = $("#nama_suplier").val();
        
        // Menggunakan AJAX untuk mengambil data produk
        $.ajax({
            type: "POST",
            url: "get_produk.php", // Gantilah dengan nama file atau URL yang sesuai
            data: { nama_suplier: selectedKategori },
            success: function(data) {
                // Mengganti isi dropdown produk dengan data yang diterima
                $("#produk").html(data);
            }
        });
    }

    $("#nama_suplier").change(function() {
        loadProduk();
    });


    function loadHarga() {
        var selectedProduk = $("#produk").val();
        var selectedKategori = $("#nama_suplier").val();
        // Menggunakan AJAX untuk mengambil data produk
        $.ajax({
            type: "POST",
            url: "get_harga_produk_suplier.php", // Gantilah dengan nama file atau URL yang sesuai
            data: { nama_produk: selectedProduk,nama_suplier:selectedKategori },
            success: function(data) {
                // Mengganti isi dropdown produk dengan data yang diterima
                $("#input_harga").val(data);
            }
        });
    }

     $("#produk").change(function() {
         loadHarga();
     });

    // Memuat produk saat halaman dimuat
    $(document).ready(function() {
        loadProduk();
        loadHarga();
    });


    totalbayarbutton.addEventListener("click", () => {
        let totalbayarvalue = totalbayar.value;
        totalbayar.value = totalbayarinput.value;
        sisa.value = totalbarangvalue - totalbayar.value;
    });
</script>

<!-- ... Your HTML code ... -->
<form method='POST' action="" id="myForm">
    <!-- ... Your form content ... -->
</form>


 
</body>
</html>