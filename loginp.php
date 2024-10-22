<?php
require_once('dbconnection.php');
session_start();

if(isset($_POST['kod']) and isset($_POST['password'])){
$id = $_POST['kod'];
$passw = $_POST['password'];

$sqlHakim= "SELECT * from hakim where Kod_Hakim = '$id' AND Katalaluan_hakim = '$passw'";
$sqlPeserta = "SELECT * from peserta where Kod_Peserta = '$id' AND Katalaluan_Peserta = '$passw'";
$resulthakim = $con -> query($sqlHakim);
$resultPeserta = $con -> query($sqlPeserta);

if ($resulthakim->num_rows>0){
    //filter for hakim login
    if ($row = $resulthakim -> fetch_assoc()) {
        $_SESSION['hakim'] = $row['Nama_Hakim'];        
    }

        echo "<script>alert('Log masuk berjaya');
        window.location.href = 'welcome.php';</script>";

}else if($resultPeserta->num_rows>0){
    //filter for peserta login
    if ($row = $resultPeserta -> fetch_assoc()) {
        $_SESSION['peserta'] = $row['Nama_Peserta'];        
    }

    echo "<script>alert('Log masuk berjaya');
        window.location.href = 'welcome2.php';</script>";    

}else{
    echo "<script>alert('Salah Kod atau Password');
    window.location.href = 'index.php'</script>";
}
}

$con -> close();
?>