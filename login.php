
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="dekorasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login Admin</h2>
        <form  action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php
        
        if(isset($_POST['submit'])){
            session_start();
            include 'koneksi.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");

            if(mysqli_num_rows($cek) > 0){
                $d=mysqli_fetch_assoc($cek);
                if(password_verify($pass,$d['password'])){
                    $_SESSION['status_login']=true;
                    $_SESSION['kasir']=$d['username'];
                    $_SESSION['id'] = $d['id_user'];
                    echo '<script>window.location="dashboard.php"</script>';

                }
                else{
                    echo '<script>alert("Username atau Password yang anda masukan salah!!")</script>';
                }
            }else{
                echo '<script>alert("akun tidak dtemukan!!")</script>';
              // var_dump($conn);
              echo "error";
            }
        }

        ?>
    </div>
</body>
</html>