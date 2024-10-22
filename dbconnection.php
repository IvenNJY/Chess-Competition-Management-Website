<?php

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="catur_spm";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)

or die ('Haha, oh no'.mysqli_connect_error());
?>