<?php
session_start();
if(!isset($_SESSION['peserta'])) {
    header('Location:login.php');
  }

  if(!isset($_SESSION['hakim'])) {
    header('Location:login.php');
    exit();
}
?>