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
            <h3>Data Album</h3>
            <div class="box">
                <button><p><a href="tambah_album.php">Tambah Data</a></p></button>
                <table border="1" cellspacing="1" class="table">
                    <thead>
                        <tr>
                           <th width="60px">No</th>
                           <th>Nama Album</th>
                           <th>Deskripsi</th>
                           <th>Tanggal</th>
                           <th width="130px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						    $no = 1;
							$user = $_SESSION['a_global']['userid'];
                            $query = mysqli_query($conn, "SELECT * FROM album WHERE userid = '$user' ");
							if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_assoc($query)){
						?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['namaalbum'] ?></td>
                           <td><?php echo $row['deskripsi'] ?></td>
                           <td><?php echo $row['tanggalbuat'] ?></td>
                           
                           <td align="center">
                              <a href="edit-album.php?id=<?php echo $row['albumid'] ?>"><img src="img/edit.png"  width="30x" style="margin-right: 5px;"/></a> 
                              <a href="proses-hpsalbum.php?idp=<?php echo $row['albumid'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')"><img src="img/hapus.png"  width="30x" style="margin-left: 5px;"/></a>
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
            <small>Copyright &copy; 2024 - WEB GALERI FOTO</small>
        </div>
    </footer>
    <script>
    document.querySelector('.box button').addEventListener('click', function() {
        this.style.transform = 'scale(1.1)'; // Mengubah skala saat tombol ditekan
        setTimeout(() => {
            this.style.transform = 'scale(1)'; // Mengembalikan ke ukuran semula setelah beberapa waktu
        }, 300); // Sesuaikan waktu yang diinginkan (dalam milidetik)
    });
</script>

</body>
</html>