<?php
include 'db.php'; 

$username = $_POST['Username'];
$password = $_POST['Password'];
$email = $_POST['Email'];
$namalengkap = $_POST['NamaLengkap'];
$alamat = $_POST['Alamat'];


    $user = "SELECT * FROM user WHERE email='$email'";
    $cekuser = mysqli_query($conn,$user);
    $cek=mysqli_num_rows($cekuser);

    if ($cek > 0) {
        echo "<script>
            alert('Username sudah digunakan. Silakan pilih username lain.');
            location.href='register.php';
            </script>";
    } else {
        $ins="INSERT INTO user VALUES (null,'$username','$password','$email','$namalengkap','$alamat')";
        $sql = mysqli_query($conn,$ins);
        if ($sql) {
            echo "<script>
            alert('Pendaftaran Akun Berhasil');
            location.href='dashboard.php';
            </script>";
        } else {
            echo "<script>
            alert('Registrasi Gagal. Silahkan Coba Lagi.');
            location.href='register.php';
            </script>";
}
}
?>