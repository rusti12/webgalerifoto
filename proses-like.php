<!-- like -->
<?php
session_start();
include 'db.php';
$fotoid = $_POST['id'];
$userid = $_SESSION['id'];
$ceksuka = mysqli_query($conn, "SELECT * FROM likefoto1 WHERE fotoid='$fotoid' AND userid='$userid'");

if (mysqli_num_rows($ceksuka) == 1) {
    while ($row = mysqli_fetch_array($ceksuka)) {
        $likeid = $row['likeid'];
        $query = mysqli_query($conn, "DELETE FROM likefoto1 WHERE likeid='$likeid'");
        echo '<script>window.location="detail-image.php?id='.$fotoid.'"</script>';
   }
    } else {
    $tanggallike = date('y-m-d');
    $query = mysqli_query($conn, "INSERT INTO likefoto1 VALUES(null,'$fotoid','$userid','1','$tanggallike')");
    echo '<script>window.location="detail-image.php?id='.$fotoid.'"</script>';
}

?>