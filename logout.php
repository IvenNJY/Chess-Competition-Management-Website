<?php
    unset($_SESSION['peserta']);
    unset($_SESSION['hakim']);
    session_destroy();
    header("location:index.php");
?>
