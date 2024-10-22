<!DOCTYPE html>    

<?php 
include 'header.php';
session_start();
?>

<body>
    <div class = "container">
        <form method = "post" action = "loginp.php">
              <div class="login-email">
                <p id="eng-Title" style="color:white; font-size: 36px; font-weight: 800;">Log Masuk</p>

                <!-- label -->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                No IC :
			    </p>

                <!-- input for Kod peserta -->
                <div class="input-group" style="width:80%;padding-left:70px">
                    <input type="text" placeholder = "Kod" name = "kod" required>
                </div>

                
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                Kata Laluan :
			    </p>

                <!--input for pw-->
                <div class="input-group" style="width:65%;padding-left:130px">
                    <input type ="password" placeholder = "Password" name = "password" required></label>
                </div>
        
                <!--btn log masuk-->
                <div class="input-group">
                    <button type ="submit" name ="login_user" style = "font-size: 16px;" class="btn" id="eng-login">Masuk</button>
                    <p class="login-register-text"> <a href="register.php" id="eng-reg">Daftar Sekarang</a></p>
                </div>
              </div> 
        </form>
    </div>

    <!--translate button-->
    <button class="translate" name="button" id="1" onclick="myFunction()"></button>

    <link rel = "stylesheet" href = "login.css">

    <!--tranlate function-->
    <script>
	function myFunction()
	{
		var id=document.getElementsByName("button")[0].id;
		if(id==1)
	{
		document.getElementById("eng-Title").innerHTML = "<p style='color:white; font-size: 36px; font-weight: 800;'>Log Masuk</p>";
        document.getElementById("eng-login").innerHTML = "Masuk";
        document.getElementById("eng-reg").innerHTML = "Daftar Sekarang";
		document.getElementsByName("button")[0].id=0;    
	}
		else
	{
		document.getElementById("eng-Title").innerHTML = "<p style='color:white; font-size: 36px; font-weight: 800;'>Login</p>"
        document.getElementById("eng-login").innerHTML = "Login";
        document.getElementById("eng-reg").innerHTML = "Register Now";
		document.getElementsByName("button")[0].id=1;  
	}
}
</script>

</body>

