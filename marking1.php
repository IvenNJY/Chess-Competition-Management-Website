<?php
include('session.php');
require_once('dbconnection.php');

$idCom = $_POST['competitor'];
$idRef = $_POST['refree'];
//$round = (int)$_POST['round'];
$mark = (int)$_POST['mark'];

//,Pusingan
//,'$round'
$sql = "INSERT INTO pertandingan(Kod_Peserta, Kod_Hakim, Markah) 
VALUES('$idCom', '$idRef', '$mark')";
    
if($con->query($sql)) {
    echo "<script> alert('Daftar berjaya!');
    window.location.href = 'marking.php'; </script>";
}else{
    echo "<script> alert('Daftar Gagal.');
    window.location.href = 'marking.php';</script>";
}
    
$con -> close();
?>
