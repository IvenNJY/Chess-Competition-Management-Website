<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php 

include('tab.php');
require_once('dbconnection.php');
?>
<body>
    
    <section id="contentbox">
    <b><p id="eng-Title" style="color: white;font-size: 35px; padding-left:20px;">Kemas Kini</p></b>
        <form method="POST" action="util.php">
        
        <!--filter lol-->
        <p style="padding-top:20px; padding-left:20px; color:white;font-size: 20px">Nama Peserta: <input name="locate" style="margin-left: 10px;" type="text" placeholder="Nama Peserta">
        <input type="submit" name="semak" id="run" value="Semak"></p>
        </form>
        <!--peserta infotable-->
        <table>
            <tr>
                <th id="eng-kod">Kod Peserta</th>
                <th id="eng-name">Nama</th>
                <th id="eng-age">Nombor Telefon</th>
                <th id="eng-age">Umur</th>
                <th id="eng-age">Jantina</th>
                <th id="eng-pw">Kata Laluan</th>
                <th id="eng-school">Nama Sekolah</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        <?php             
            $sql = "SELECT Kod_Peserta, Nama_Peserta, Nombor_Telefon, Umur, Jantina ,sekolah.Nama_Sekolah , Katalaluan_Peserta  FROM peserta
            INNER JOIN sekolah ON peserta.Kod_Sekolah = sekolah.Kod_Sekolah
            ORDER BY Nama_Sekolah";

            $result = $con->query($sql);

            if(isset($_POST['semak'])){
                $locate = $_POST['locate'];

                $sqlp = "SELECT * FROM `peserta`
                INNER JOIN sekolah ON peserta.Kod_Sekolah = sekolah.Kod_Sekolah
                WHERE CONCAT(`Kod_Peserta`, `Nama_Peserta`, `Nombor_Telefon` , `Umur`, `Jantina` ,`Katalaluan_Peserta`) LIKE '%$locate%';";

                $result = mysqli_query($con,$sqlp);
            }

            if ($result->num_rows >0){
                while($row = $result -> fetch_assoc()){
                    
                    echo "<tr>";
                    echo "<td>" .$row['Kod_Peserta']."</td>";
                    echo "<td>" .$row['Nama_Peserta']."</td>";
                    echo "<td>" .$row['Nombor_Telefon']."</td>";
                    echo "<td>" .$row['Umur']."</td>";
                    echo "<td>" .$row['Jantina']."</td>";
                    echo "<td>" .$row['Katalaluan_Peserta']."</td>";
                    echo "<td>" .$row['Nama_Sekolah']."</td>";
                    echo "<td><a class='changes' href='update.php?id=".$row['Kod_Peserta']."'>Edit</a></td>";
                    echo "<td><a class='changes' href='delete.php?id=".$row['Kod_Peserta']."'onclick='del()''>Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </section>

    <button class="translate" name="button" id="1" onclick="myFunction()"></button>

    <script> 
        function del(){
            if(window.confirm("Are You Sure?") == true){
                    window.location.href = "delete.php";
                }
        }

        function myFunction()
	{
		var id=document.getElementsByName("button")[0].id;
		if(id==1)
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='font-size: 35px; padding-left:20px;'>Kemas Kini</p></b>";
        document.getElementById("eng-kod").innerHTML = "Kod Peserta";
        document.getElementById("eng-name").innerHTML = "Nama Peserta";
        document.getElementById("eng-age").innerHTML = "Umur";
        document.getElementById("eng-pw").innerHTML = "Kata Laluan";
        document.getElementById("eng-school").innerHTML = "Nama Sekolah";
		document.getElementsByName("button")[0].id=0;    
	}
		else
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='font-size: 35px; padding-left:20px;'>Update</p></b>"
        document.getElementById("eng-kod").innerHTML = "Participant Code";
        document.getElementById("eng-name").innerHTML = "Participant Name";
        document.getElementById("eng-age").innerHTML = "Age";
        document.getElementById("eng-pw").innerHTML = "Password";
        document.getElementById("eng-school").innerHTML = "School";
		document.getElementsByName("button")[0].id=1;  
	}
}
        </script>
    