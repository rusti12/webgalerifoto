<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
	
	$produk = mysqli_query($conn, "SELECT * FROM  foto1 WHERE fotoid = '".$_GET['id']."'");
	if(mysqli_num_rows($produk) == 0){
	    echo '<script>window.location="data-image.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB GALERI FOTO</title>
<link rel="stylesheet" type="text/css" href="scss/style.css">
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
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
        <h1><img src="img/logohh.png" class="logo"></img><a href="index.php" class="text">WEB GALERI FOTO</a></h1>

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
            <h3>Edit Data Foto</h3>
            <div class="box">
    <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="kategori" class="input-control" placeholder="Kategori Foto" value="<?php echo $p->namaalbum ?>" readonly="readonly">
            <input type="text" name="namauser" class="input-control" placeholder="Nama User" value="<?php echo $p->namalengkap ?>" readonly="readonly">
            <input type="text" name="nama" class="input-control" placeholder="Nama Foto" value="<?php echo $p->judulfoto ?>" required>
                   
                   <img src="foto/<?php echo $p->lokasifile ?>" width="100px" />
                   <input type="hidden" name="foto" value="<?php echo $p->lokasifile ?>" />
                   <input type="file" name="gambar" class="input-control" value>
                   <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsifoto ?></textarea><br />
                  
                      
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					
					// data inputan dari form
					$kategori  = $_POST['kategori'];
					$user      = $_POST['namauser'];
					$nama      = $_POST['nama'];
					$deskripsi = $_POST['deskripsi'];
					$foto      = $_POST['foto'];
					
					// data gambar yang baru 
					$filename = $_FILES['gambar']['name'];
					$tmp_name = $_FILES['gambar']['tmp_name'];
					   
					//jika admin ganti gambar
					if($filename != ''){
						
						$type1 = explode('.', $filename);
					    $type2 = $type1[1];

                        $newname = 'foto'.time().'.'.$type2;
					
					    // menampung data format file yang diizinkan
					    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
					
					  // validasi format file
					  if(!in_array($type2, $tipe_diizinkan)){
				        // jika format file tidak ada di dalam tipe diizinkan
				        echo '<script>alert("Format file tidak diizinkan")</script>';
						
					  }else{
						unlink('./foto/'.$foto); 
					    move_uploaded_file($tmp_name, './foto/'.$newname);
						$namagambar = $newname;  
					  }
					
					}else{
					   // jika admin tidak ganti gambar
					   $namagambar = $foto;
					   
					}
					
					//query update data produk
					$update = mysqli_query($koneksi, "UPDATE foto1 SET
					                       namaalbum = '".$kategori."',
										   namalengkap = '".$user."',
										   judulfoto = '".$nama."',
										    deskripsifoto = '".$deskripsi."',
								            lokasifile = '".$namagambar."'
										   WHERE fotoid = '".$p->fotoid."' ");
					 if($update){
						echo '<script>alert("Ubah data berhasil")</script>';
					    echo '<script>window.location="data-image.php"</script>';
					 }else{
					    echo 'gagal'.mysqli_error($koneksi);
							   
						   }
			      }
			   ?>
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
</body>
</html>