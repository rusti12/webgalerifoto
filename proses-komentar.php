<?php
session_start();
include 'db.php';

$fotoid             = $_POST['id'];
$uid             = $_SESSION['id'];
$isikomentar        = $_POST['kom'];
$tanggalkomentar    = date('Y-m-d');

$query  = mysqli_query($conn, "INSERT INTO komentarfoto1 VALUES(null,'$fotoid','$uid','$isikomentar','$tanggalkomentar')");

echo '<script>window.location="detail-image.php?id='.$fotoid.'"</script>';
?>