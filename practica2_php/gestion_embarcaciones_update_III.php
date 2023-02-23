<?php 
	include("seguridad_2.php");
	include("conexionPDO.php");
	include "eliminar_temporales.php";
?>

<!DOCTYPE html>
<html>

<head>
	<title> Gestion de Embarcaciones Update III</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<header>
		<section class="cabecera">
			<img class="logo" src="img/barco.png">
			<h1> TALLER EMBARCACIONES LAJARA </h1>
			<a class="admin" href="menu_inicial.php"> INICIO </a>
			
		</section>
			
	</header>

	<main>
		<section>
				<h2> 	EDITAR EMBARCACIONES III</h2> <br>
				<nav>
					<ul>
						<li><a href="gestion_embarcaciones.php"> LISTA </a></li>
						<li><a href="gestion_embarcaciones_insert.php"> AÑADIR  </a></li>
						<li><a href="gestion_embarcaciones_delete.php"> ELIMINAR  </a></li>
						<li><a href="gestion_embarcaciones_update.php"> EDITAR  </a></li>
					</ul>
				</nav>
			</section>
		<br>
			
		<section>
		

		<?php
		
			$matricula = $_POST['matricula'];
			$longitud = $_POST['longitud'];
			$potencia = $_POST['potencia'];
			$motor = $_POST['motor'];
			$año = $_POST['año'];
			$color = $_POST['color'];
			$material = $_POST['material'];
			$id_cliente = $_POST['id_cliente'];
			

			if(is_uploaded_file($_FILES['foto']['tmp_name'])){
				$foto = $_FILES['foto']['tmp_name'];
				$fotografia = imagecreatefromjpeg($foto);
				ob_start();
				imagejpeg($fotografia);
				$jpg = ob_get_contents();
				ob_end_clean();
				$intermedio = addslashes((trim($jpg)));
				$jpg = str_replace('##', '\##', $intermedio);
			}		

			$SentenciaSQL = "UPDATE embarcaciones SET Longitud = '$longitud', Potencia = '$potencia', Motor = '$motor', Año = '$año', Color = '$color', Material= '$material', Id_Cliente = '$id_cliente', Fotografia = '$jpg' WHERE Matricula = '$matricula'";

			$result = $conexion->query($SentenciaSQL);

			if(!$result){
				echo "<br/>Error al editar la embarcacion en la DB";
			}
			else{
				echo "<br/>Embarcación editada con éxito";
			}

		?>
	

		</section>

	</main>

	<footer>
		<br><a href="cerrar_sesion.php"> CERRAR SESIÓN  </a>
	</footer>
</body>
</html>