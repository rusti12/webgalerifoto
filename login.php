<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Web Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="bg-login">
     <div class="box-login">
         <h2>Login</h2>
         <form action="proses_login.php" method="POST">
             <input type="text" name="Username" placeholder="Username" class="input-control">
             <input type="password" name="Password" placeholder="Password" class="input-control">
             <input type="submit" name="submit" value="Login" class="btn">
         </form>
         <!-- <?php
		     if(isset($_POST['submit'])){
				 session_start();
				 include 'db.php';

				 $user = mysqli_real_escape_string($conn, $_POST['user']);
				 $password = mysqli_real_escape_string($conn, $_POST['password']);
				 
				 $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$user."'AND password = '".$password."'");
				 if(mysqli_num_rows($cek) > 0){
					 $d = mysqli_fetch_object($cek);
					 $_SESSION['status_login'] = true;
					 $_SESSION['a_global'] = $d;
					 $_SESSION['uid'] = $d->userid;
					 echo '<script>window.location="dashboard.php"</script>';
				 }else{
					 echo '<script>alert("Username atau password anda salah")</script>';
				 }
			 }
	     ?><br /> -->
         <p>Belum punya akun? daftar <a style="color:#00C;" href="register.php">DISINI</a></p>
         <p>atau klik <a style="color:#00C;" href="index.php">Kembali</a></p>
      </div>
      
</body>
</html>