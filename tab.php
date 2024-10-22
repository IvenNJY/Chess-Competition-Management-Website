<!DOCTYPE html>
<?php 
session_start();
?>
<head>
    <link rel="stylesheet" href="tab.css">
    <link rel="icon" href="logo.png" >    
</head>
<body>
    
        <img src="logo.png" class="logo">
        <b><p class="title">Sistem Pengurusan Pertandingan Catur</p></b>
        <nav>   
            <div style="color:white ; text-align:right; padding-right;font-size:20px">
                    <?php 
                    echo $_SESSION['hakim'];
                    ?>
                </div>
            </div>

            <ul class="tabscollab">
                <div class= "tab sp"><li><a href="welcome.php">Home</a></li></div>
                <div class= "tab"><li><a href="util.php">Kemas Kini</a></li></div>
                <div class= "tab"><li><a href="marking.php">Pemarkahan</a></li></div>
                <div class= "tab"><li><a href="import.php">Import</a></li></div>
                <div class= "tab"><li><a href="leaderboard.php">Keputusan</a></li></div>
                <div class= "tab"><li><a href="login.php" style="color:red;" onclick="out()">Log out</a></li></div>

                <script> function out(){
                    if(window.confirm('Are You Sure?') == true){
                        alert('Terima kasih');
                        window.location.href = 'logout.php';
                    }
                }    
                </script>
            </ul>
        </nav>
    </div>
</body>
