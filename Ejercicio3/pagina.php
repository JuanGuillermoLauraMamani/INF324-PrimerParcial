<?php
	include 'cabecera.php';
	if(isset($_POST["logout"])){
		session_destroy();
		header("Location: http://localhost/Ejercicio3/");
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
		header("Location: http://localhost/Ejercicio3/");
	}

	if(isset($_POST["color"])){
		$color = $_POST["color"];
		$sql = "update colores set color ='$color' where ci = $ci";
		mysqli_query($con,$sql);
		header("Location: http://localhost/Ejercicio3/pagina.php");	
	}


?>

<div >

	<p style="font-weight: bold; font-size: 50px;"> Hola <?php echo $nombre?></p>		


	<form method="POST">
		<div>
		<label style="font-weight: bold; font-size: 25px;">color:</label>
		<select name="color" id="colores">
		<option value="#eb4034">Rojo</option> 
		<option value="#0062ff">Azul</option>   
		<option value="#32a852">Verde</option> 
		<option value="#ff5900">Naranja</option>	
		</select>	
		</div>
		<div>
			<input type="submit" value = "Cambiar"> 	
		</div>

	</form>
	<div >
		<form action="notas.php" method="POST">
			<input type="submit" name="notas" value="notas">
		</form>
	</div>



	<div >
		<form acttion = "localhost/Ejercicio3" method="POST">
			<input type="submit" name="logout" value="Log out">
		</form>
	</div>
</div>