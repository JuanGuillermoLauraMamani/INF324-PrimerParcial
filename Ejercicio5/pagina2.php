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

<p style="font-weight: bold; font-size: 50px;"> Hola <?php echo $nombre?></p>		



<div >
	<form action="reportedoc.php" method="POST">
		<input type="submit" name="reporte" value="reporte">
	</form>
</div>

<div >
	<form acttion = "localhost/Ejercicio5" method="POST">
		<input type="submit" name="logout" value="Log out">
	</form>
</div>
</div>
