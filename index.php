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
        <h1><a href="index.php">WEB GALERI FOTO</a></h1>
        <ul>
           <li><a href="register.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Album</h3>
            <div class="box">
                <?php
                    $album = mysqli_query($conn, "SELECT * FROM album ORDER BY albumid DESC");
					if(mysqli_num_rows($album) > 0){
						while($k = mysqli_fetch_array($album)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['albumid'] ?>">
                        <div class="col-5">
                            <img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['namaalbum'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="md:absolute md:w-[33%]">
                                        <!-- <form action="proses/proses_komentar.php" method="post">
                                            <input type="hidden" name="fotoid" value="<?php echo $data['FotoID']; ?>">
                                            <div class="relative flex justify-between -bottom-3 md:bottom-0 md:w-full">
                                                <input name="isikomentar" class="w-full border p-2 mb-4" placeholder="Tulis komentar">
                                                <button type="submit" class="bg-blue-500 text-white h-[42px] px-2">Kirim</button>
                                            </div>
                                        </form> -->
                                    </div>

    
    <!-- new product -->
    <div class="container">
       <h3>Foto Terbaru</h3>
       <div class="box">
          <?php
              $foto = mysqli_query($conn, "SELECT * FROM foto  ORDER BY fotoid DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['fotoid'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['lokasifile'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['judulfoto'], 0, 30)  ?></p>
              <p class="admin">Nama User : <?php echo $p['namalengkap'] ?></p>
              <p class="nama"><?php echo $p['tanggalunggah']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
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