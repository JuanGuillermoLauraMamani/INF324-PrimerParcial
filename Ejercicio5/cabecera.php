<?php 
include 'conexion.php';
	
	session_start();
	if(isset($_SESSION["ci"])){
		$ci = $_SESSION["ci"];
		$sql = "Select c.color , u.usuario, p.nombrecompleto from usuario u, persona p, colores c where u.ci = '".$ci."' and u.ci=p.ci and u.ci=c.ci";
		$res = mysqli_query($con,$sql);
		$ans = mysqli_fetch_row($res);
		$color = $ans[0];
		$user = $ans[1];		
		echo "<h5><center>".$user."</center></h5>";
	}

	else{
        $color = "white";
		
	}
				
?>


<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="/Ejercicio5/hojadeestilos.css">
</head>
<body <?php echo "style='background-color:$color';font-family: Arial, Helvetica, sans-serif; color: #ffffff;";?> >

	<div style="font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
                color: #ffffff; 
                font-size: 18px; 
                font-weight: 400; 
                text-align: center; 
                background: #51e070; 
                margin: 0 0 25px; 
                overflow: hidden; 
                padding: 20px;  
                border: 2px solid #5878ca;
                height: 10%;
                width: 100%;
                float: left;">
        FCPN
    </div>
	<!-- 
	<form action = "login.php" method="POST"> 
	<div>
		<h1>CI: <input type="ci" name="ci" placeholder="1111"></h1>
	</div>	
	<div>
		<h1>Contraseña: <input type="password" name="password" placeholder=""></h1>
	</div>
	<center>
	<input type="submit" value ="Enviar">	
	</center>
	</form>
    -->
    <div style="font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
            color: #ffffff; 
            font-size: 18px; 
            font-weight: 400; 
            text-align: center; 
            background: #cf4284; 
            margin: 0 0 25px; 
            overflow: hidden; 
            padding: 20px;  
            border: 2px solid #5878ca;
            height: 100%;
            width:20%;
            float: left;
            ">
			<h1>
			Menu
			</h1>
			Visite alguna carrera:<br>
            <a href='/Ejercicio5'>INICIO</a><br>
			<a href='/Ejercicio5/informatica/'>informatica</a><br>
			<a href='/Ejercicio5/matematica'>matematica</a><br>
			<a href='/Ejercicio5/fisica/'>fisica</a><br>
	</div>
    <div style="font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
            color: #ffffff; 
            font-size: 18px; 
            font-weight: 400; 
            text-align: center; 
            background: #a960ee; 
            margin: 0 0 25px; 
            overflow: hidden; 
            padding: 20px;  
            border: 2px solid #5878ca;
            height: 100%;
            width: 70%;
            float: right;">   
            
           

           
    