<?php
    session_start();
	include 'DB.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
	
	$produk = mysqli_query($conn, "SELECT * FROM  album WHERE albumid = '".$_GET['id']."'");
	if(mysqli_num_rows($produk) == 0){
	    echo '<script>window.location="album.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<?php
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT userid, email, alamat FROM user WHERE userid = 2");
	$a = mysqli_fetch_object($kontak);
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
        <h1><a href="index.php" class="text">WEB GALERI FOTO</a></h1>

        <ul>
           <li><a href="dashboard.php">Dashboard</a></li>
           <li><a href="album.php">Album</a></li>
           <li><a href="galeri.php">Gallery</a></li>
           <li><a href="data-image.php">Data Foto</a></li>
		   <li><a href="profil.php">Profil</a></li>
           
        </ul>
        </div>
    </header>
    
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Album Foto</h3>
            <div class="box">
    <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="namaalbum" class="input-control" placeholder="Nama Album" value="<?php echo $p->namaalbum ?>" readonly="readonly">
        	<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi ?></textarea><br />
                  
                      
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					
					// data inputan dari form
					$namaalbum  = $_POST['namaalbum'];
					$deskripsi = $_POST['deskripsi'];

					
					//query update data produk
					$update = mysqli_query($conn, "UPDATE album SET
					                       namaalbum = '".$namaalbum."',
										    deskripsi = '".$deskripsi."'
										   WHERE albumid = '".$p->albumid."' ");
					 if($update){
						echo '<script>alert("Ubah data album berhasil")</script>';
					    echo '<script>window.location="album.php"</script>';
					 }else{
					    echo 'gagal'.mysqli_error($conn);
							   
						   }
			      }
			   ?>
        </div>
        </div>
    </div>
    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - WEB GALERI FOTO</small>
        </div>
    </footer>
    <script>
            CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>