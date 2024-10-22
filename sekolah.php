<?php 
    $sekolah = "SELECT * from sekolah";
    $result = $con -> query($sekolah);
    if ($result->num_rows>0){
        while($row=$result->fetch_assoc()){ 
            echo "<option value= ". $row["Kod_Sekolah"]. ">" . $row["Nama_Sekolah"]."</option>";
        }
    }
?>