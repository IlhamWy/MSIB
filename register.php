<?php 
    require 'functions.php'; // memanggil file functions.php

    if( isset($_POST["register"])) {
        if( registrasi($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'login.php';
                </script>
                ";
        }else {
            echo mysqli_error($conn);
        }
    }

?>

<html>
    <head>
        <title>Sistem Informasi Pendataan Ulang Kip-K</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="belajar_style.css?<?php echo time(); ?>">
    </head>
    <body>
        <div class="container">
            <div class="form-items"><br>
                    <h1>Buat Akun</h1>
                    <h5>Tolong masukkan datamu untuk ber-regristasi</h5><br>
                    <form action="" method="POST">
                        <label for="username">Nama Pengguna</label>
                        <input class="form-control" type="text" name="username" id="username" required>
                                                
                        <label for="password">Kata Sandi</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                                                
                        <label for="password2">Konfirmasi Kata Sandi</label>
                        <input class="form-control" type="password" name="password2" id="password2" required>
                        <br> 
                        <center>
                        <button class="login" type="submit" name="register"><h5>Save</h5></button>
                        </center>
                    </form>
            </div>
        </div>
        <script src="js/jquery.js"></script>
    <!-- Bootsrep -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>