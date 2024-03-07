<?php
 include "koneksi.php";
 session_start();
 $query = mysqli_query($conn,'SELECT * FROM kategori_produk');
 $selectedproduk = mysqli_query($conn,'SELECT * FROM produk WHERE id_kategori =1');
 $hargaproduk = mysqli_query($conn,'SELECT * FROM produk WHERE id_produk = 1');
 $query1 = mysqli_query($conn, 'SELECT * FROM users');
 $query2 = mysqli_query($conn, 'SELECT * FROM produk');
 $query3 = mysqli_query($conn, 'SELECT * FROM toko');
 $query4 = mysqli_query($conn, 'SELECT * FROM produk');
 $query5 = mysqli_query($conn, 'SELECT * FROM pelanggan');

// koneksi
$conn = new mysqli('localhost', 'root', '', 'kasir');



// simpan data
if (isset($_POST['submit'])) {
$kt = $_POST['nama_kategori'];
$nb = $_POST['nama_produk'];
$hrg = $_POST['harga'];
$qty = $_POST['qty'];
$total_bayar = $_POST['total'];
$totalbayar = $_POST['totalbayar'];
 
$q = mysqli_query($conn, "INSERT INTO hitung (nama_kategori, nama_barang, harga, qty) VALUES ('$kt', '$nb', '$hrg', '$qty')");
$resultstok = mysqlI_query($conn,"SELECT stok FROM produk WHERE nama_produk = '$nb'");
$datastok = mysqli_fetch_assoc($resultstok);
$stok = $datastok['stok'];
$hitungstok = $stok - $qty;
$kurang_jumlah = mysqli_query($conn,"UPDATE produk SET stok='$hitungstok' WHERE nama_produk='$nb'");
 
if($q) {
header('Location: kasir.php');
} else {
echo "<script>alert('Gagal menambahkan data'); window.location.href = kasir.php;</script>";
}
}

if(isset($_POST['SIMPAN'])){
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $sisa = $_POST['sisa'];
    $nama_barang = $_POST['nama_barang'];
    $created_at = $_POST['created_at'];
    
    $result = mysqli_query($conn,"INSERT INTO hitung ('nama_kategori', 'nama_barang', 'harga', 'qty', 'created_at') VALUES ('$total','$bayar','$sisa','$nama_barang','$created_at')");
    
    if ($q) {
            header('Location: penjualan.php');
            exit();
        } 
    } else {
        
    }

    
    // ... Proses Simpan ...
    
    if(isset($_POST['sisa'])){
        $qty = $_POST['qty'];
        $bayar = $_POST['bayar'];
        $total = $_POST['total'];
        $insertdata = mysqli_query($conn,"SELECT * FROM hitung");
        while($d = mysqli_fetch_assoc($insertdata)){
            $pelanggan = $d['pelanggan'];
            $nama_kategori = $d['nama_kategori'];
            $nama_barang = $d['nama_barang'];
            $harga = $d['harga'];
            $qty = $d['qty']; 
            
            $resultMoveData = mysqli_query($conn, "INSERT INTO penjualan ( nama_barang, qty, total, created_at) VALUES('$nama_barang','$qty','$total',now())");
            $hapushitung = mysqli_query($conn,"DELETE FROM hitung");
        }
        
        if ($resultMoveData) {
            // Data berhasil dipindahkan, lanjutkan dengan menghapus data di tabel hitung jika diperlukan
            // Misalnya: mysqli_query($conn, "DELETE FROM hitung");
    
            // Redirect to the same page to refresh the content
            header('Location: penjualan.php');
            exit();
        } else {
            var_dump($conn);
            //echo "<script>alert('Gagal memindahkan data ke tabel penjualan');</script>";
        }
    }
    
    // ... The rest of your PHP code ...
    ?>
    
 
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
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="penjualan.php">Penjualan</a></li>
            <li><a href="data_barang.php">Barang</a></li>

        </ul>
        </div>
    </header>

<div class="card mt-5">
<div class="card-body mx-auto" style='display:flex;flex-wrap:wrap;gap:3em'>
<form method="POST" action="" class="form-inline mt-3">


 <div class='' style='display:flex;flex-wrap:wrap;gap:4em'>

                   
                    
                    <!--kategori-->
                    <div>
                    <h6>Kategori Produk</h6>
                    <select name='nama_kategori' class='input-control' id='nama_kategori' style="width:160px; height:39px;">
                    <option value='0'>Pilih Kategori</option>
                    <?php while($kategori = mysqli_fetch_assoc($query)):?>
                    <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option> 
                    <?php endwhile ?>
                    </select>
                    </div>

                    
                    <!--produk-->
                    <div>
                    <h6>Nama Produk</h6>
                    <select name='nama_produk' id='produk' class='input-control' style="width:160px; height:39px;">
                    <?php while($produk = mysqli_fetch_assoc($query2)):?>
                    <option value="<?= $produk['nama_produk']?>"><?= $produk['nama_produk']?></option> 
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
                    <h6>Qty</h6>
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
$q = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<table class="table table-bordered mt-5" >
<tr>
<th>No</th>
<th>Kategori</th>
<th>Nama Barang</th>
<th>Harga Satuan</th>
<th>Qty</th>
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
<td><?= ucwords($r['nama_kategori']) ?></td>
<td><?= ucwords($r['nama_barang']) ?></td>
<td><?= number_format($r['harga'], 0, ', ', '.') ?></td>
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
        var selectedKategori = $("#nama_kategori").val();
        
        // Menggunakan AJAX untuk mengambil data produk
        $.ajax({
            type: "POST",
            url: "get_produkk.php", // Gantilah dengan nama file atau URL yang sesuai
            data: { id_kategori: selectedKategori },
            success: function(data) {
                // Mengganti isi dropdown produk dengan data yang diterima
                $("#produk").html(data);
            }
        });
    }

    $("#nama_kategori").change(function() {
        loadProduk();
    });


    function loadHarga() {
        var selectedProduk = $("#produk").val();
        console.log("LOl");
        // Menggunakan AJAX untuk mengambil data produk
        $.ajax({
            type: "POST",
            url: "get_harga_produk_penjualan.php", // Gantilah dengan nama file atau URL yang sesuai
            data: { nama_produk: selectedProduk },
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
        // loadHarga();
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