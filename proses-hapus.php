<?php

   include 'db.php';
      
   if(isset($_GET['idp'])){
	   $foto1 = mysqli_query($conn, "SELECT * FROM foto1 WHERE fotoid = '".$_GET['idp']."' ");
	   $p = mysqli_fetch_object($foto);
	   
	   unlink('./foto/'.$p->image);
	   
	  $delete = mysqli_query($conn, "DELETE FROM foto1 WHERE fotoid = '".$_GET['idp']."' ");
	  echo "<script>
            alert(' Anda Behasil Menghapus Foto');
            </script>";
	  echo '<script>window.location="data-image.php"</script>';
   }

?>