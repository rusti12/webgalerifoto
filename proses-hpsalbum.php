<?php

   include 'db.php';
      
   if(isset($_GET['idp'])){
	   $sql = mysqli_query($conn, "SELECT * FROM album WHERE albumid = '".$_GET['idp']."' ");
	   
	   unlink('./album/'.$p->album);
	   
	  $delete = mysqli_query($conn, "DELETE FROM album WHERE albumid = '".$_GET['idp']."' ");
      echo '<script>alert("anda berhasil menghapus album")</script>';
	  echo '<script>window.location="album.php"</script>';
   }

?>