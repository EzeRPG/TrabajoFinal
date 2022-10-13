<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/Principal.css">
	<link rel="stylesheet" type="text/css" href="css/Modificaciones.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, intitial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<title>Iniciar sesion</title>
	<link rel="shortcut icon" href="fotos/LogoPestaña.png">


</head>
<body>
	<section id="login">
		<section id="datos">
		<article class="poner">
			<form action="DB/controllogin.php" method="POST">
				<center>
				<label class="texto">Usuario</label>
				<br>
				<input type="text" name="Nombre" class="ingresa" required>

				<br><br><br>

				<label class="texto">Contraseña</label>
				<br>
				<input type="password" name="Contraseña" class="ingresa" required>

				<br><br><br>

				<button type="submit" name="login" class="boton"> Ingresar</button>
				</center>
			</form>
			</article>
		</section>
	</section>
</body>
</html>