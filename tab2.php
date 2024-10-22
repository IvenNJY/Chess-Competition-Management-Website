<!DOCTYPE html>
<?php 
session_start();
?>
<head>
    <link rel="stylesheet" href="tab.css">
    <link rel="icon" href="logo.png" >    
</head>
<body>
    
        <img class="logo">
        <b><p style="padding-top:20px; padding-left:120px; font-size:30px" class="title">Sistem Pengurusan Pertandingan Catur</p></b>
        <nav>   
            <div style="color:white ; text-align:right; padding-right;font-size:20px">
                    <?php 
                    echo $_SESSION['peserta'];
                    ?>
                </div>
            </div>
            </div>
            
            <ul class="tabscollab">
                <div class="tab sp"><li><a href="welcome2.php">Home</a></li></div>
                <div class="tab"><li><a href="leaderboard2.php">Keputusan</a></li></div>
                <div class="tab"><li><a onclick="out()" style="color:red;">Log out</a></li></div>
                <script> function out(){
                    if(window.confirm("Are You Sure?") == true){
                        alert('Terima Kasih')
                        window.location.href = "logout.php"
                    }
                }</script>
            </ul>
        </nav>
    </div>
</body>
