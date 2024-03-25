<?php
    session_start();
    include 'db.php';
	//$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	//$a = mysqli_fetch_object($kontak);
	
	$produk = mysqli_query($conn, "SELECT * FROM foto1 INNER JOIN album ON foto1.albumid = album.albumid WHERE foto1.fotoid = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
    $k = mysqli_query($conn, "SELECT * FROM komentarfoto1 WHERE fotoid = '".$_GET['id']."' ");
	$kid = mysqli_fetch_object($k);
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
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->lokasifile ?>" width="100%" /> 
                </div>
                <div class="col-2">
                   <h3><?php echo $p->judulfoto ?><br />Album : <?php echo $p->namaalbum  ?></h3>
                   <h4>Nama User : <?php echo $p->namalengkap ?><br />
                   Upload Pada Tanggal : <?php echo $p->tanggalunggah  ?></h4>
                   <p>Deskripsi :<br />
                        <?php echo $p->deskripsifoto ?>
                   </p>
                   <div class="col-7">
                    <!--suka-->
                    <form method="POST" action="proses-like.php">
                    <?php
                    $qt = mysqli_query($conn, "SELECT SUM(suka) AS jm FROM likefoto1 WHERE fotoid = '".$_GET['id']."' ");
                    if(mysqli_num_rows($qt) > 0){
                        while($q = mysqli_fetch_array($qt)){
                            ?>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <button name="suka" class="like"><img src="img/like.png"  width="30x" style="margin-left: 5px;"/><?php echo $q['jm'] ?> </button><br/>
                            <?php }}else{ ?>
                                <p> tidak ada like</p>
                            <?php } ?>
                            </form>

                            <?php
                            if(isset($_POST['suka'])){
                                echo '<script>window.location=login.php"</script>';
                            } ?><br/>

                            <div class="content">
                                <form action="proses_komentar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                                    <textarea type="text" name="kom" class="input-control" maxlength="300" placeholder="Tulis Komentar..." required></textarea>
                                    <input type="submit" nama="submit" value="kirim" class="btn">
                        </form>
                        </div>
                        <div class="komentar">
        <div class="card">
            <h3 class="text-komentar">Komentar</h3>
            
            <?php
                $fotoid = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * FROM komentarfoto1 INNER JOIN user ON komentarfoto1.userid=user.userid WHERE komentarfoto1.fotoid='$fotoid'");
                if(mysqli_num_rows($query)){
                while($data = mysqli_fetch_array($query)){ ?>
                    <div class="">
                        <h4><?php echo $data['username'] ?></h4>
                        <h5><?php echo $data['isikomentar'] ?></h5>
                        <h6><?php echo $data['tanggalkomentar'] ?></h6>
            <!-- Tambahkan link untuk menghapus komentar -->
            <button><a href="hapus-komen.php?KomentarID=<?=$data['komentarid']?>&Fotoid=<?=$fotoid?>">Hapus</a></button>
        </div>
           <?php }} ?>
        </div>
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