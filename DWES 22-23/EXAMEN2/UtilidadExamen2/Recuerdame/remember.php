<?php

/*
	// Verificar si el usuario y la contraseña existen
	if (isset($_POST["usuario"]) && isset($_POST["password"])) {
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Iniciar sesión
			session_start();
			$_SESSION["usuario"] = $usuario;

			// Recordar usuario
			if (isset($_POST["recuerdame"])) {
				setcookie("usuario", $usuario, time() + (86400 * 30), "/"); // 86400 = 1 día
			}

			// Redirigir al usuario a la página protegida
			header("Location: pagina_protegida.php");
		}
	}
	*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de inicio de sesión con estilos y "Recuérdame"</title>
		<style>
			body{
				background-color: aliceblue;
			}
			form {
				background-color:  white;
				width: 100%;
				max-width: 400px;
				margin: 250px auto;
				padding: 20px;
				border: 1px solid #ddd;
				border-radius: 10px;
				box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
				text-align: center;
			}
			label {
				display: block;
				margin-bottom: 10px;
				font-weight: bold;
			}
			input[type="text"],
			input[type="password"] {
				width: 100%;
				padding: 10px;
				margin-bottom: 20px;
				border: 1px solid #ddd;
				border-radius: 5px;
				box-sizing: border-box;
			}
			input[type="submit"] {
				width: 100%;
				padding: 10px;
				background-color: #4CAF50;
				color: white;
				border: none;
				border-radius: 5px;
				cursor: pointer;
			}
			input[type="checkbox"] {
				margin-bottom: 20px;
			}
			@media (min-width: 500px) {
				form {
					text-align: left;
				}
				label {
					display: inline-block;
					width: 120px;
					text-align: right;
					margin-right: 20px;
				}
				input[type="text"],
				input[type="password"] {
					width: calc(100% - 5px);
				}
			}
		</style>
	</head>
	<body>
		<form action="validar_login.php" method="post">
			<label for="usuario">Usuario:</label>
			<input type="text" id="usuario" name="usuario" placeholder="Introduzca su nombre de usuario" required>
			
			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" placeholder="Introduzca su contraseña" required>
			<br>
			<label for="recuerdame">Recuérdame:</label>
			<input type="checkbox" id="recuerdame" name="recuerdame">
			
			<input type="submit" value="Iniciar sesión">
		</form>
	</body>
</html>
