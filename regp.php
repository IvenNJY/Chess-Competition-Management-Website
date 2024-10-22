<?php
require_once('dbconnection.php');

$name = $_POST['nama'];
$id = $_POST['id'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$school = $_POST['school'];
$passw = $_POST['password'];
$tele = $_POST['tele'];
    
$sql = "INSERT INTO peserta(Kod_Peserta, Nama_Peserta, Umur, Jantina, Kod_Sekolah, Katalaluan_Peserta, Nombor_Telefon)
VALUES('$id', '$name', '$age' , '$gender' , '$school' , '$passw' , '$tele' )";

if($con->query($sql)) {
    echo "<script> alert('Daftar berjaya!'); 
    window.location.href = 'index.php'; </script>";
}
else{
    echo "<script> alert('Daftar Gagal.');
    window.location.href = 'register.php';</script>";
}


?>