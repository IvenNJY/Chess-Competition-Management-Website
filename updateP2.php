<?php
require_once('dbconnection.php');

$NoID = $_GET['kod'];
$Name = $_GET['nama'];
$age = $_GET['age'];

$sql = "UPDATE peserta SET Kod_Peserta='$NoID', Nama_Peserta='$Name', Umur='$age' 
WHERE Kod_Peserta = '$NoID'";

if($con->query($sql)==True){
    echo "<script> alert('Edit Berjaya');
    window.location.href='util.php';</script>";
}else{
    echo "<script> alert('Edit Gagal');
    window.location.href='util.php';</script>";
}

?>