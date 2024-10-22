<!DOCTYPE html>
<html>
<link rel = "stylesheet" href = "style.css">
<?php 
// session_start();
include 'tab2.php';
?>
<head>
    <link rel="icon" href="logo.png">
</head>

<body>

<section>
    <div class="content">
        <div>
        <div id="contentbox">
            <p id="eng-Title" style="color: white;font-size: 35px; padding-left:20px;"><b>Pertandingan Catur Pulau Pinang</b></p>
          <br>
          <img style="width:300; height:300px;float:right;" src="https://t4.ftcdn.net/jpg/03/46/77/57/360_F_346775711_wgofOdl8Z4DKi0FR9mBFRo1FK3kmMtC9.jpg" id="hp">
          <p id="eng-time" style="color: white;font-size: 25px;margin-top:30px; padding-left:20px;"><b>Masa : 10:00 pagi - 02:00 petang</b></p>
          <br>
          <p id="eng-judges" style="color: white;font-size: 20px;margin-top:30px ;margin-bottom:20px; padding-left:20px;"><b>Hakim</b></p>
          <li style="color: white; padding-left:20px;">Aisyah Humaira</li>
          <li style="color: white; padding-top:10px; padding-left:20px;">Siti Nurhaliza</li>
          <li style="color: white; padding-top:10px; padding-left:20px;">Kok Leong Seng</li>
          <button class="translate" name="button" id="1" onclick="myFunction()"></button>
            </div>
        </div>
    </div>
</section>

<script>
	function myFunction()
	{
		var id=document.getElementsByName("button")[0].id;
		if(id==1)
	{
		document.getElementById("eng-Title").innerHTML = "Sistem Pengurusan Pertandingan Catur";
        document.getElementById("eng-time").innerHTML = "Masa : 10:00 pagi - 02:00 petang";
        document.getElementById("eng-judges").innerHTML = "Hakim";
		document.getElementsByName("button")[0].id=0;    
	}
		else
	{
		document.getElementById("eng-Title").innerHTML = "Chess management system";
        document.getElementById("eng-time").innerHTML = "Time : 10:00 AM - 02:00 PM";
        document.getElementById("eng-judges").innerHTML = "Judges";
		document.getElementsByName("button")[0].id=1;  
	}
}
</script>

</body>
</html>
