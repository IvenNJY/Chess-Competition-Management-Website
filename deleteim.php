<?php
require_once('dbconnection.php');

$id=$_GET['id'];

$sql="DELETE FROM sekolah WHERE Kod_Sekolah='$id'";

if($con->query($sql)==true){
    echo "<script> alert('Are you sure');
    window.location.href='import.php';</script>";
}else{
    echo "<script> alert('Error');
    window.location.href='import.php';</script>";
}
?>