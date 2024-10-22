<!DOCTYPE html>
<link rel ="stylesheet" href="style.css">
<head>
<?php 
// session_start();
include('tab.php');
?>

</head>
<body>
    <form method="post" action="marking1.php" id="box">
        <div id="contentbox">
		<p id="eng-Title" style="color: white;font-size: 35px; padding-left:20px; padding-bottom:20px;"><b>Pemarkahan</b></p>

		<p id="whitetext" style="float:left;padding-top:20px;margin-left:20px">
			Nama Peserta : 
			</p>

			<div id="input-group" style="width:35%;padding-left:170px">
			
			
					<select name="competitor" id="competitor">
						<option value=""></option>
						<?php
							require_once('dbconnection.php');
							$peserta = "SELECT * from peserta";
               				$result = $con -> query($peserta);
                			if ($result->num_rows>0) {
                    		while($row=$result->fetch_assoc()){ 
                        	$id = $row['Kod_Peserta'];
                        	$nama = $row['Nama_Peserta'];
                        	echo '<option value="'.$id.'">'.$id. ', &nbsp' .$nama. '</option>';
                    		}
						}	
						?>
					</select>
                </div>

				<br>

				<p id="whitetext" style="float:left;padding-top:20px;margin-left:20px">
					Nama Hakim : 
				</p>

				<div id="input-group" style="width:35%;padding-left:170px">
					<select name="refree" id="refree" placeholder="hakim">
						<option value=""></option>
						<?php
							require_once('dbconnection.php');
							$hakim = "SELECT * from hakim";
               				$result = $con -> query($hakim);
                			if ($result->num_rows>0) {
                    	while($row=$result->fetch_assoc()){ 
                        	$id = $row['Kod_Hakim'];
                        	$nama = $row['Nama_Hakim'];
                        	echo '<option value="'.$id.'">'.$id. ', &nbsp' .$nama. '</option>';
                    		}
						}	
						
						?>
					</select>
				</div>

				<br>
				
				<!--<p id="whitetext" style="float:left;padding-top:20px;margin-left:20px">
					Pusingan : 
				</p>

				<div id="input-group" style="width:25%;padding-left:150px">
					<input type="number" name="round" class="form" maxlength="1" placeholder="Pusingan" min="0" max="9" required>
				</div>
					
				<br>-->
				
				<p id="whitetext" style="float:left;padding-top:20px;margin-left:20px">
					Markah : 
				</p>

				<div id="input-group" style="width:25%;padding-left:150px">
					<input type="number" name="mark" class="form" maxlength="3" placeholder="Markah" min="0" max="1" required>
				</div>
				<br>

				<div id="input-group" style="width:20%;margin-left:20px;">
        			<input type="submit" value="Submit" class="btn">
    			</div>
			</div>
		  </div>
		</div>
	</form>

	<button class="translate" name="button" id="1" onclick="myFunction()"></button>

	<script>
	function myFunction()
	{
		var id=document.getElementsByName("button")[0].id;
		if(id==1)
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='color: white;font-size: 35px; padding-left:20px; padding-bottom:20px;'>Pemarkahan</p></b>";
		document.getElementsByName("button")[0].id=0;    
	}
		else
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='color: white;font-size: 35px; padding-left:20px; padding-bottom:20px;;'>Marking</p></b>"
		document.getElementsByName("button")[0].id=1;  
	}
}
</script>

</body>
