<?php 

include 'tab.php';
include 'dbconnection.php';
if(isset($_POST['uploadp'])){
       $arrfile = explode('.',$_FILES['file']['name']);
        //comfim
       if($arrfile[1] == 'csv'){
           $filez = fopen($_FILES['file']['tmp_name'],"r");
           while(($data = fgetcsv($filez,1000,","))!== false){

               $item1 = mysqli_real_escape_string($con,$data[0]);
               $item2 = mysqli_real_escape_string($con,$data[1]);
               $sql = "INSERT INTO sekolah(Kod_Sekolah,Nama_Sekolah) values('$item1','$item2')";
               mysqli_query($con,$sql); 
           }

           fclose($filez);
           echo "<script> window.alert('Import Berjaya');
           location.href = 'import.php';</script>";
       }   
   } 
?>


<body>
<div id="whitetext">
<div id="contentbox">


<body>
  <p id="eng-Title" style="color: white;font-size: 35px;text-align:left;padding-bottom:100px;"><b>Import Fail Pertandingan</b></p>

  <p id="eng-desc" style="color: white;font-size: 25px;text-align:left;margin-bottom:20px;"><b>! Guna format csv sahaja !</b></p>
    <!--choose file form-->
  <form 
       method="post"
       enctype="multipart/form-data">
 
  <input type="file"
       name="file">

    <!--upload button-->
  <input type="submit"
       name="uploadp"
       value="Upload">
</form>


</div>
</div>

<!--translation-->
<button class="translate" name="button" id="1" onclick="myFunction()"></button>

<script>
	function myFunction()
	{
		var id=document.getElementsByName("button")[0].id;
		if(id==1)
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='color: white;font-size: 35px;text-align:left;'>Import Fail Pertandingan</p></b>";
      document.getElementById("eng-desc").innerHTML = "<b><p style='color: white;font-size: 25px;text-align:left;'>! Guna format csv sahaja !</p></b>";
		document.getElementsByName("button")[0].id=0;    
	}
		else
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='olor: white;font-size: 35px;text-align:left;'>Import Competition files</p></b>"
      document.getElementById("eng-desc").innerHTML = "<b><p style='color: white;font-size: 25px;text-align:left;'>! Use csv formats only !</p></b>";
		document.getElementsByName("button")[0].id=1;  
	}
}
</script>

<link rel="stylesheet" href="style.css">
</body>
</html> 

<!--<th>Delete</th>  
echo "<td><a href=\"delete.php?id=".$row['id']."\">Delete</a></td>";-->