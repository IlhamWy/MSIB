<?php

    session_start();
    if( isset($_SESSION["index"])) {
        header("Location: index.php");
        exit;
    }

    require 'functions.php';

    if( isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if( mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])) {
                //set session
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Mahasiswa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="belajar_style.css?<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div  class="form-items">
            <?php if(isset($error)) :?>

            <center>
                <p style="color: red; font-style: italic;">Error Gagal Login</p>
            </center>

            <?php endif; ?>

            <center><br>
            <img src="img/YHC.png" width=300px height=127>
                <h2>SISTEM PENGELOLAAN DATA MAHASISWA <br> HASNUR CENTER</h2><br>
            </center>

            <form action="" method="POST">
            <label
                for="username">Nama Pengguna
            </label>
            <input class="form-control" type="text" name="username" id="username" required>                              
            <label
                for="password">Katasandi
            </label>
            <input class="form-control" type="password" name="password" id="password" required><br>

            <center>
                <button class="login" type="submit" name="login"><h5>Masuk<h5></button>    
            </center>
            <br>
            </form>
                <a href="./register.php">
                    <center>
                        <button class="login" name="register"><h5>Belum ada akun ya? Klik untuk daftar</h5></button>
                    </center>
                </a>
            <br><br><br>
        </div>
    </div>
</body>
</html>