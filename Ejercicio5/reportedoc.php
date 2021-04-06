<?php
	include 'cabecera.php';
	if(isset($_POST["logout"])){
		session_destroy();
		header("Location: http://localhost/Ejercicio5/");
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
		header("Location: http://localhost/Ejercicio5/");
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

	$res = mysqli_query($con,$sqldeptos);

	$labels = array();
	

	while ($row = mysqli_fetch_array($res))
	{
		$labels[] = $row['departamento'];
		
	}
 
	function obternerCiudad($i){
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
	echo "<td>Materias </td>";	
	 $sql1="select n.sigla as Materia,";
	for($i = 0; $i < sizeof($labels); $i++)
	{
		echo "<td>".obternerCiudad($labels[$i])."</td>";
		if($i!=sizeof($labels)-1){
		$sqlcasewhens="(sum(case when p.departamento ='".$labels[$i]."' then n.notaf end ))/(sum(case when p.departamento ='".$labels[$i]."' then 1 end )) as '".obternerCiudad($labels[$i])."',";	
		}else{
		$sqlcasewhens="(sum(case when p.departamento ='".$labels[$i]."' then n.notaf end ))/(sum(case when p.departamento ='".$labels[$i]."' then 1 end )) as '".obternerCiudad($labels[$i])."'";	
		
		}
	 	$sql1=$sql1.$sqlcasewhens;
			 
	}
	$sql1=$sql1."FROM persona p 
	INNER JOIN nota n ON p.ci=n.ci 
	GROUP BY n.sigla";
	echo "</tr>";
	$res1 = mysqli_query($con,$sql1);
	while($ans1=mysqli_fetch_array($res1)){
		echo "<tr>";
		for($i = 0; $i < sizeof($labels)+1; $i++)
		{
		echo "<td>";
		echo $ans1[$i];
		echo "</td>";
		}
		echo "</tr>";
	}
	
?>
</table>
</center>
</div>

<div >
	<form acttion = "localhost/Ejercicio5" method="POST">
		<input type="submit" name="logout" value="Log out">
	</form>
</div></div>