<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
                .logo{
                    width:7%;
                }
                .text{

                }
                </style>
<body>
        <!-- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1>
        <ul>
           <li><a href="dashboard.php">Dashboard</a></li>
           <li><a href="profil.php">Profil</a></li>
           <li><a href="album.php">Album</a></li>
           <li><a href="galeri.php">Galeri</a></li>
           <li><a href="data-image.php">Data Foto</a></li>
           <li><a href="Keluar.php">Keluar</a></li>
        </ul>
        </div>
    </header>
    
    
    <!-- content -->
    <div class="section" >
        <div class="container">
            <h3>Tambah Album</h3>
            <div class="box">
             
               <form action="crud_album.php" method="POST" >
                
                   <?php   $result = mysqli_query($conn,"select * from album");   $jsArray = "var prdName = new Array();\n";
                   ?>
                    </select>

                    <input type="hidden" name="userid" class="input-control" >
                    <input type="text" name="namaalbum" class="input-control" placeholder="Nama Album" required>
                   <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br />

                 
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
        
        </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Dypicture.</small>
        </div>
    </footer>
    <script>
            CKEDITOR.replace( 'deskripsi' );
    </script>
    <script type="text/javascript"><?php echo $jsArray; ?></script>
</body>
</html>
