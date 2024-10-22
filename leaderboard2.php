<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<?php 
include('tab2.php');
include('dbconnection.php');
?>

<body>
    <div id="contentbox">
    <p id="eng-Title" style="color: white;font-size: 35px; padding-left:20px; padding-bottom:20px;"><b>Keputusan</b></p>
        <section class="top">

        <!-- semak button and input  -->
        <form method="post" action="leaderboard.php">
        <p>
            <div id="whitetext">
            <div id="input-group-kept">
            Sekolah : <select name="school" id="school" style="padding-left:40px; margin-bottom:20px;">  
            <option name = "schoolblank" value="Null"></option>
                <?php
                $sekolah = "SELECT * from sekolah";
                $result = $con -> query($sekolah);
                if ($result->num_rows>0){
                    while($row=$result->fetch_assoc()){ 
                        $namasek = $row['Nama_Sekolah'];
                        echo '<option value="'.$namasek.'">'.$namasek.'</option>';
                    }
                }?>
                </select>  
            
        <input type="submit" name="runS" class="btn" value="Semak">
        
        </div>
        </p>
        
        <br>

        <label>
        <div id="input-group-kept">
            Nama: 
            <input type="text"  name="locate" style="padding-left: 30px; margin-bottom:20px;" placeholder="Nama Peserta">
            
        </label>
        <input type="submit" name="runN" class="btn" value="Semak">
        </div>
        <br>
        </form>
        </section>
        <p id="eng-Title" style="color: white;font-size: 35px; padding-left:20px; padding-bottom:20px;"><b>Ranking</b></p>
    <!-- RANK  -->
        <section>
        <div id=printtable>
        <table id="rank">
            <tr>
                <th id="eng-rank">Peringkat</th>
                <th id="eng-name">Nama</th>
                <th id="eng-school">Sekolah</th>
                <th id="eng-scoretotal">Jumlah Markah</th>
            </tr>
            
            <?php
            $rank = 0;
            $search = 0;
            $last_score = false;


            $sql = "SELECT peserta.Nama_Peserta,sekolah.Nama_Sekolah,Markah, SUM(Markah) as TotalScore FROM `pertandingan`
            INNER JOIN peserta ON peserta.Kod_Peserta = pertandingan.Kod_Peserta
            INNER JOIN sekolah ON sekolah.Kod_Sekolah = peserta.Kod_Sekolah
            GROUP BY Nama_Peserta
            ORDER BY TotalScore DESC;";

            $result = $con->query($sql);

            if(isset($_POST['runN'])){
                $runN = $_POST['runN'];
                $locate = $_POST['locate'];
                $search = 1;
            }else if(isset($_POST['runS'])){
                $runS = $_POST['runS'];
                $school = $_POST['school'];
                $search = 2;
            }
            if($search == 0){
                if ($result->num_rows >0){
                    while($row = $result -> fetch_assoc()){
                        $name = $row['Nama_Peserta'];
                        $skol = $row['Nama_Sekolah'];
                        $score = $row['TotalScore'];

                        
                        if( $last_score!= $row['TotalScore'] ){
                            $last_score= $row['TotalScore'];
                            $rank++;
                        } else {
                            $rank = $rank;
                        }
                        
                        echo "<tr>";
                        echo "<td>" .$rank."</td>";
                        echo "<td>" .$name."</td>";
                        echo "<td>" .$skol."</td>";
                        echo "<td>" .$score."</td>";
                        echo "</tr>";
                    }
                }
            } else if($search == 1){
                if ($result->num_rows >0){
                    while($row = $result -> fetch_assoc()){
                        $name = $row['Nama_Peserta'];
                        $skol = $row['Nama_Sekolah'];
                        $score = $row['TotalScore'];

                        if($locate == $name){
                            if( $last_score!= $row['TotalScore'] ){
                                $last_score= $row['TotalScore'];
                                $rank++;
                            } else {
                                $rank = $rank;
                            }
                            
                            echo "<tr>";
                            echo "<td>" .$rank."</td>";
                            echo "<td>" .$name."</td>";
                            echo "<td>" .$skol."</td>";
                            echo "<td>" .$score."</td>";
                            echo "</tr>";
                            
                        } else{
                            $rank++;
                        }
                        
                    }
                }
            } else{
                if ($result->num_rows >0){
                    while($row = $result -> fetch_assoc()){
                        $name = $row['Nama_Peserta'];
                        $skol = $row['Nama_Sekolah'];
                        $score = $row['TotalScore'];

                        if($school == $skol){
                            if( $last_score!= $row['TotalScore'] ){
                                $last_score= $row['TotalScore'];
                                $rank++;
                            } else {
                                $rank = $rank;
                            }
                            
                            echo "<tr>";
                            echo "<td>" .$rank."</td>";
                            echo "<td>" .$name."</td>";
                            echo "<td>" .$skol."</td>";
                            echo "<td>" .$score."</td>";
                            echo "</tr>";
                            
                        } else{
                            $rank++;
                        }
                        
                    }
                }
            }
            
            ?>
            </tr>
        </table>
        </section>
        
        <div id="input-group-kept" style="margin-top:20px;">
        <button onclick="printing()" class="btn">Print</button>
        </div>

        </div>
    </div>

    <button class="translate" name="button" id="1" onclick="translater()"></button>

</body>

<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("rank");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function printing() {
        var divContents = document.getElementById("printtable").innerHTML;
            var a = window.open('height=500, width=500');
            a.document.write('<link rel="stylesheet" href="style.css">');
            a.document.write('<html>');
            a.document.write('<body > <h1>Keputusan </h1><br>');
            a.document.write(divContents);
            a.document.write('<div id="input-group-kept" style="margin-top:20px;">');
            a.document.write('<button onclick="print()" class="btn">Print</button>');
            a.document.write('</div>');
            a.document.write('</body></html>');
            a.document.close();
        }

        function print() {
            window.print();
        }

        function translater()
	{
		var id=document.getElementsByName("button")[0].id;
		if(id==1)
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='color: white;font-size: 35px; padding-left:20px; padding-bottom:20px;'>Keputusan</p></b>";
        document.getElementById("eng-rank").innerHTML = "Peringkat";
        document.getElementById("eng-name").innerHTML = "Nama";
        document.getElementById("eng-school").innerHTML = "Sekolah";
        document.getElementById("eng-scoretotal").innerHTML = "Jumlah Markah";
		document.getElementsByName("button")[0].id=0;    
	}
		else
	{
		document.getElementById("eng-Title").innerHTML = "<b><p style='color: white;font-size: 35px;text-align:left;'>Import Competition files</p></b>"
        document.getElementById("eng-rank").innerHTML = "Rank";
        document.getElementById("eng-name").innerHTML = "Name";
        document.getElementById("eng-school").innerHTML = "School";
        document.getElementById("eng-scoretotal").innerHTML = "Total Score";
		document.getElementsByName("button")[0].id=1;  
	}
}
</script>