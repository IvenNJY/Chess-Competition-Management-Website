<?php
require_once('dbconnection.php');

$id=$_GET['id'];

$sql="DELETE FROM peserta WHERE Kod_Peserta='$id'";

if($con->query($sql)==true){
    echo "<script> alert('Are you sure');
    window.location.href='util.php';</script>";
}else{
    echo "<script> alert('Error');
    window.location.href='util.php';</script>";
}
?>