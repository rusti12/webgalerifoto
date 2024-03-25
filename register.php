<?php
	include 'db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">WEB GALERI FOTO</a></h1>
        <ul>
           <li><a href="galeri.php">Galeri</a></li>
           <li><a href="register.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
               <form action="proses_register.php" method="POST">
                   <input type="text" name="Username" placeholder="Username" class="input-control" required>
                   <input type="password" name="Password" placeholder="password" class="input-control" required>
                   <input type="text" name="NamaLengkap" placeholder="nama lengkap" class="input-control" required>
                   <input type="text" name="Email" placeholder="E-mail" class="input-control" required>
                   <input type="text" name="Alamat" placeholder="Alamat" class="input-control" required>
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               
            </div>
            
            </div>
        </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>