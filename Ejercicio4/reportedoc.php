<?php
	include 'cabecera.php';
	if(isset($_POST["logout"])){
		session_destroy();
		header("Location: http://localhost/Ejercicio4/");
	} 
	
	if(isset($_SESSION["ci"])){		
		$ci = $_SESSION["ci"];
		$sql = "Select nombrecompleto from persona where ci = '".$ci."'";
		$res = mysqli_query($con,$sql);
		$ans = mysqli_fetch_row($res);
		$nombre = $ans[0];
	}
	else{
		session_destroy();
		header("Location: http://localhost/Ejercicio4/");
	}

?>
<div>
<p style="font-weight: bold; font-size: 50px;"> Reporte hecho por Lic. <?php echo $nombre?></p>		



<?php 
	mysqli_select_db($con, "mibase");

	$sqldeptos = "Select departamento
	from nota n, persona p 
	where n.ci = p.ci
	group by departamento";

	$sqlmaterias="select sigla
	from nota 
	GROUP by sigla";

	$res = mysqli_query($con,$sqldeptos);

	$res1=mysqli_query($con,$sqlmaterias);

	$labels = array();
	$siglas=array();

	while ($row = mysqli_fetch_array($res))
	{
		$labels[] = $row['departamento'];
		
	}

	while ($row = mysqli_fetch_array($res1))
	{
		$siglas[] = $row['sigla'];
		
	}
	 
	 function obternerCiudad($i){
	 	if($i>0){
		$s = ["Sucre","La Paz","Cochabamba","Oruro","Potosi","Tarija","Santa Cruz","Beni", "Pando"];
	 	return $s[$i-1];	 		
	 	}
	 	return "Otro";
	 }

	 function obternernota($i){
		if($i>0){
	   $s = ["Sucre","La Paz","Cochabamba","Oruro","Potosi","Tarija","Santa Cruz","Beni", "Pando"];
		return $s[$i-1];	 		
		}
		return "Otro";
	}

	
?>
<div >
    <center>
<table border="1px">
	
<?php 
	echo "<tr>";
	echo "<td> </td>";	
	
	for($i = 0; $i < sizeof($labels); $i++){
		
	 	echo "<td>".obternerCiudad($labels[$i])."</td>";
	
		 
	}
	echo "</tr>";
		
	
	for($i = 0; $i < sizeof($siglas); $i++){
		echo "<tr>";
	 	echo "<td>".$siglas[$i]."</td>";
		 for($j = 0; $j < sizeof($labels); $j++){
			$sqlnota= "select AVG(n.notaf) as notaprom
			from nota n, persona p
			where n.ci=p.ci
			and p.departamento='".$labels[$j]."'
			and n.sigla='".$siglas[$i]."'
			GROUP by n.sigla";
			$res2=mysqli_query($con,$sqlnota);
			$ans = mysqli_fetch_row($res2);
			if($ans==null){
				$nota = "0";
			}else{
				
				$nota = $ans[0];
			}
			
			echo "<td>",$nota,"</td>";
	   
			
	   }
		echo "</tr>";
		 
	}
	

?>
</table>
</center>
</div>

<div >
	<form acttion = "localhost/Ejercicio4" method="POST">
		<input type="submit" name="logout" value="Log out">
	</form>
</div></div>