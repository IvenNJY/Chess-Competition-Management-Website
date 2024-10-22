<!DOCTYPE html>

<?php 
require 'dbconnection.php';
include 'header.php';
?>

<head>
    
</head>
<body>   
    <div class="container">
            <p style="color:white; font-size: 36px; font-weight: 800;" id="eng-Title">Pendaftaran</p>
            <div class="login-email">
            <form  name="form" method="post" action="regp.php">
            <div class="list">

                <!--Nama Peserta-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                Nama :
			    </p>

                <div class="input-group" style="width:80%;padding-left:80px">
                <input type="text" required placeholder="Nama" name="nama" style="width: 20em;"><br></br>
                </div>

                <!--Kod Peserta-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                No IC :
			    </p>

                <div class="input-group" style="width:80%;padding-left:80px">
                <input type="number" placeholder="XXXXXXxxXXXX" name="id" style="width:20em;" pattern ="([0-9]{12})" maxlength="12" oninvalid="alert('menggunakan format XXXXXXxxXXXX')" onsubmit="return valid()"><br><br>
                </div>

                <!--Jantina-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                Jantina :
			    </p>

                <div class="input-group" style="width:80%;padding-left:100px">
                <select name="gender" id="gender" style="width: 20.5em;">
                    <option name = "blank" value="Null"></option>
                    <option value="Lelaki">Lelaki</option>
                    <option value="Perempuan">Perempuan</option>
                </select><br></br>
                </div>
                
                <!--Sekolah-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                Sekolah :
			    </p>

                <div class="input-group" style="width:80%;padding-left:100px">
                <select name="school" id="school" style="width: 20.5em;">
                <option name = "nothing" value="Null"></option>
                <?php
                $sekolah = "SELECT * from sekolah";
                $result = $con -> query($sekolah);
                if ($result->num_rows>0){
                    while($row=$result->fetch_assoc()){ 
                        $Kod = $row['Kod_Sekolah'];
                        $namasek = $row['Nama_Sekolah'];
                        echo '<option value="'.$Kod.'">'.$namasek.'</option>';
                    }
                }?>
                </select><br></br>
                </div>

                <!--age-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                Umur :
			    </p>

                <div class="input-group" style="width:80%;padding-left:80px">
                <input type="number" placeholder="Umur" name="age" style="width: 20em;"  maxlength="2" min="13" max="18" require><br></br> 
                </div>

                <!--Telefon-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
               Telefon :
			    </p>

                <div class="input-group" style="width:80%;padding-left:80px">
                    <input type="telephone" placeholder="Telefon" name="tele" style="width: 20em;" pattern ="([0-9]{10})" oninvalid="alert('Tidak menggunakan ( - ) dalam telefon . Contoh: 0123456789')" required>
                </div>

                <!--Katalaluan-->
                <p id="whitetext" style="float:left;font-size:20px;font-style:bold">
                Katalaluan :
			    </p>
                
                <div class="input-group" style="width:70%;padding-left:110px">
                <input type="password" placeholder="katalaluan" name="password" style="width: 20em;" maxlength="5" pattern ="([0-9]{5})" oninvalid="alert('Menggunakan 5 character sahaja')" required>
                </div>

            </div>
        
        <div class="input-group">
            <button type="submit" name="submission" class="btn" id="eng-reg" value="Submit">Daftar</button>
            <p class="login-register-text"> <a href="index.php" id="eng-login">Log Masuk</a></p>
        </div>
        </form>
    </div>

    <?php 
    $con -> close(); 
    ?>

<button class="translate" name="button" id="1" onclick="myFunction()"></button>

<link rel="stylesheet" href="login.css">

<script>
function valid() {
  var x = document.forms["form"]["id"].value;
  if (x == "" || x == null) {
    alert("Enter Kod");
    return false;
  }
}

function myFunction()
{
    var id=document.getElementsByName("button")[0].id;
    if(id==1)
{
    document.getElementById("eng-Title").innerHTML = "<p style='color:white; font-size: 36px; font-weight: 800;'>Pendaftaran</p>";
    document.getElementById("eng-login").innerHTML = "Log masuk";
    document.getElementById("eng-reg").innerHTML = "Daftar";
    document.getElementsByName("button")[0].id=0;    
}
    else
{
    document.getElementById("eng-Title").innerHTML = "<p style='color:white; font-size: 36px; font-weight: 800;'>Sign up</p>"
    document.getElementById("eng-login").innerHTML = "Login now";
    document.getElementById("eng-reg").innerHTML = "Register";
    document.getElementsByName("button")[0].id=1;  
}
}

</script>

</body>