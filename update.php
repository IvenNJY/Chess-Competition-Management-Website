<?php

require_once('dbconnection.php');
$NoId=$_GET["id"];
   
$sql = "SELECT Kod_Peserta, Nama_Peserta, Umur FROM peserta
        WHERE Kod_Peserta = '$NoId'";

$result= $con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $NoId = $row['Kod_Peserta'];
        $nama = $row['Nama_Peserta'];
        $age = $row['Umur'];
    }
}
$con->close();
?>


<link rel="stylesheet" href="style.css">
<div id="contentbox" style="width:97%">
<p style="color:white; font-size: 36px; font-weight: 800; padding-left:40px">Edit</p>

<form action="updateP2.php" method="GET">
    <table>
    <tr>
        <td>Kod Peserta: </td>
        <td><input type="text" name="kod" <?php echo "value = '$NoId'"?> readonly></td>
    </tr>
    <tr>
        <td>Nama Peserta: </td>
        <td><input type="text" name= "nama" <?php echo "value = '$nama'"?>></td>
    </tr> 
    <tr>
        <td>Umur </td>
        <td><input type="number" name= "age" pattern ="([0-9]{2})" min="13" max="18" oninvalid="alert('Umur 13 hingga 18 sahaja')" <?php echo "value = '$age'"?>></td>
    </tr>
    </table>
        <br>
        <div id="input-group-kept">
        <input style="float:left " type="submit" id="update" value="Edit" class="btn">
        <br>
        <input style="float:left ; margin-left:20px" type="button" id="update" onclick="back()" value="Back" class="btn">
    </div>
</form>

</div>

<script>
    function back(){
        window.location.href="util.php";
    }
</script>