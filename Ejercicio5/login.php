<?php 
	include 'conexion.php';

		
	$ci = $_POST["ci"];
	$password = $_POST["password"];

	
	$est = mysqli_query($con,"select u.ci,u.password,r.rol from usuario u, rolsesion r  WHERE  u.ci = '".$ci."' AND u.password = '".$password."' and u.ci=r.ci and r.rol='E'");
	$prof = mysqli_query($con,"select u.ci,u.password,r.rol from usuario u, rolsesion r  WHERE  u.ci = '".$ci."' AND u.password = '".$password."' and u.ci=r.ci and r.rol='D'");
	$ans1 = mysqli_fetch_row($est);
	$ans2 = mysqli_fetch_row($prof);
	
	
	if($ans1[0]==$ci and $ans1[2]=='E' and $ans1[1]==$password) 
	{
		 session_start();
		$_SESSION['ci']=$ci;
		$_SESSION['rol']=$and1[2];
		header("Location: http://localhost/Ejercicio5/pagina.php");	
			
	}
	 
	else if($ans2[0]==$ci and $ans2[2]=='D' and $ans2[1]==$password) 
	{
		session_start();		
		$_SESSION['ci']=$ci;
		$_SESSION['rol']=$and2[2];	
		header("Location: http://localhost/Ejercicio5/pagina2.php");	
		 
	}
	 
	else 
	{
		$_SESSION["error"] = "CI o contraseña incorrecto";
		echo $_SESSION["error"];
		header("Location: http://localhost/Ejercicio5/");
	}


?>
