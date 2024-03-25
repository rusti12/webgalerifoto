<?php 
include 'db.php';
session_start();

if (isset($_POST['submit'])) {
    $namaalbum  = $_POST['namaalbum'];
    $deskripsi  = $_POST['deskripsi'];
    $tanggalbuat    = date('y-m-d');
    $userid = $_SESSION['a_global']['userid'];

    $sql = mysqli_query($conn, "INSERT INTO album VALUES('','$namaalbum','$deskripsi','$tanggalbuat','$userid')");

    $_SESSION['notifsubmit'] = 'Album berhasil ditambahkan!';
    header('Location:./album.php');
    exit();
}


if (isset($_POST['edit'])) {
    $albumid    = $_POST['albumid'];
    $namaalbum  = $_POST['namaalbum'];
    $deskripsi  = $_POST['deskripsi'];
    $tanggal    = date('y-m-d');
    $userid     = $_SESSION['userid'];

    $sql = mysqli_query($conn, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi', tanggaldibuat='$tanggal' WHERE albumid='$albumid'");

    $_SESSION['notifedit'] = 'Album berhasil diperbarui!';
    header('Location: ./album.php');
    exit();
}

if (isset($_POST['hapus'])) {
    $albumid = $_POST['albumid'];

    $sql = mysqli_query($conn, "DELETE FROM album WHERE albumid='$albumid'");

    $_SESSION['notifhapus'] = 'Album berhasil dihapus!';
    header('Location: album.php');
exit();
}
?>
