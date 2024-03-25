<?php
	 session_start();
     include 'db.php';

     $username = mysqli_real_escape_string($conn, $_POST['Username']);
     $password = mysqli_real_escape_string($conn, $_POST['Password']);
     $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."'AND password = '".$password."'");
     if(mysqli_num_rows($cek) > 0){
         $d = mysqli_fetch_assoc($cek);
         $_SESSION['status_login'] = true;
         $_SESSION['a_global'] = $d;
         $_SESSION['id'] = $d['userid'];
         var_dump($_SESSION);
         echo '<script>window.location="dashboard.php"</script>';
     }else{
         echo '<script>alert("Email atau Password anda salah");   location.href="index.php";</script>';
     }


?>