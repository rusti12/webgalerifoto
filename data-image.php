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

<body>
    <!-- header -->
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
    <div class="section">
        <div class="container">
            <h3>Data Galeri Foto</h3>
            <div class="box">
                <p><a href="tambah-image.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                           <th width="60px">No</th>
                           <th>Kategori</th>
                           <th>Nama User</th>
                           <th>Nama Foto</th>
                           <th>Deskripsi</th>
                           <th>Gambar</th>
                           <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						    $no = 1;
							$user = $_SESSION['id'];
                            $sel="SELECT album.namaalbum, foto1.namalengkap, foto1.judulfoto, foto1.deskripsifoto, foto1.lokasifile, foto1.fotoid FROM foto1 INNER JOIN album ON foto1.albumid = album.albumid WHERE foto1.userid = '$user'";
                            $foto = mysqli_query($conn,$sel);
							if(mysqli_num_rows($foto) >0 ){
							while($row = mysqli_fetch_array($foto)){
						?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['namaalbum'] ?></td>
                           <td><?php echo $row['namalengkap'] ?></td>
                           <td><?php echo $row['judulfoto'] ?></td>
                           <td><?php echo $row['deskripsifoto']?></td>
                           <td><a href="foto/<?php echo $row['lokasifile']?>" target="_blank"><img src="foto/<?php echo $row['lokasifile']?>" width="50px"></a></td>
                           <td>
                              <a href="edit-image.php?id=<?php echo $row['fotoid'] ?>"><img src="img/edit.png"  width="30x" style="margin-right: 5px;"/></a>
                              <a href="proses-hapus.php?idp=<?php echo $row['fotoid'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')"><img src="img/hapus.png"  width="30x" style="margin-left: 5px;"/></a>
                           </td>
                        </tr>
                        <?php }}else{ ?>
                             <tr>
                                <td colspan="8">Tidak ada data</td>
                             </tr>
                        <?php } ?>
                    </tbody>
                </table>
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