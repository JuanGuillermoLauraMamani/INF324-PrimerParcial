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

<p style="font-weight: bold; font-size: 50px;"> Notas de <?php echo $nombre?></p>		

<?php
include "conexion.php";
$ci=$_SESSION["ci"];
$sql = "Select n.sigla, n.nota1,n.nota2,n.nota3,n.notaf from nota n where n.ci = '".$ci."'";
$resultado = mysqli_query($con, $sql);
?>
<div>
<h3>Notas</h3>
<center>
<table border="2" style="font-family: Lucida Sans Unicode;,ucida Grande, Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse;">
<tr style="background: #d0dafd;">
    <td>sigla</td>
	<td>nota1</td>
	<td>nota2</td>
	<td>nota3</td>
	<td>notaf</td>
</tr>
<?php
while ($fila = mysqli_fetch_array($resultado))
{
echo "<tr style=background:white;>";
echo "<td>".$fila['sigla']."</td>";
echo "<td>".$fila['nota1']."</td>";
echo "<td>".$fila['nota2']."</td>";
echo "<td>".$fila['nota3']."</td>";
echo "<td>".$fila['notaf']."</td>";
echo "</tr>";
}
?>
</table>
</center>	
<br>
</div>
<div >
	<form acttion = "localhost/Ejercicio4" method="POST">
		<input type="submit" name="logout" value="Log out">
	</form>
</div>
</div>