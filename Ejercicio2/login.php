<?php 
	include 'conexion.php';
		
	$ci = $_POST["ci"];
	$password = $_POST["password"];

	$sql = "Select * from usuario where ci = '".$ci."'";
	$res = mysqli_query($con,$sql);
	$ans = mysqli_fetch_row($res);
	session_start();
	if($ans and $ans[2]==$password){
		$_SESSION["ci"] = $ci;		
		header("Location: http://localhost/Ejercicio2/pagina.php");	
	}
	else{
		$_SESSION["error"] = "CI o contraseña incorrecto";
		echo $_SESSION["error"];
		header("Location: http://localhost/Ejercicio2/");
	}
			



?>
