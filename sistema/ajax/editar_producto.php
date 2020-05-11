<?php

		if (empty($_POST['mod_nombre'])){
			$errors[] = "Nombre del producto vacío";
		}else if (!preg_match("/^([a-zA-Z])/", $_POST['mod_nombre'])){
         	$errors[] = "Ingrese solo letras para el nombre del producto";
        }else if (strlen($_POST['mod_nombre'])>25){
			$errors[] = "El campo nombre ha superado el limite de caracteres permitidos (25)";
		}else if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if ($_POST['mod_tipo']==""){
			$errors[] = "Seleccione el tipo del producto";
		}else if (strlen($_POST['mod_tipo'])>20){
			$errors[] = "El campo tipo ha superado el limite de caracteres permitidos (20)";
		}else if (!preg_match("/^([a-zA-Z])/", $_POST['mod_tipo'])){
         	$errors[] = "Ingrese solo letras para el tipo de producto";
        }else if ($_POST['mod_pesokg']==""){
			$errors[] = "Seleccione el peso en Kilos del producto";
		}else if (strlen($_POST['mod_pesokg'])>7){
			$errors[] = "El campo Peso (Kg) ha superado el limite de caracteres permitidos (7)";
		}else if ($_POST['mod_tag']==""){
			$errors[] = "Seleccione la etiqueta del producto";
		}else if (!preg_match("/^([a-zA-Z])/", $_POST['mod_tag'])){
         	$errors[] = "Ingrese solo letras para la etiqueta de producto";
        }else if (strlen($_POST['mod_tag'])>10){
			$errors[] = "El campo tag ha superado el limite de caracteres permitidos (10)";
		}else if (empty($_POST['mod_pesolbs'])){
			$errors[] = "Por favor ingrese el peso en libras vacío";
		}else if (strlen($_POST['mod_pesolbs'])>8){
			$errors[] = "El campo Peso (Lbs) ha superado el limite de caracteres permitidos (8)";
		}else if (empty($_POST['mod_clasificacion'])){
			$errors[] = "Por favor ingrese la clasificación del producto";
		} 
		 else if (
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_tag']) &&
			!empty($_POST['mod_tipo']) &&
			!empty($_POST['mod_pesokg']) &&
			!empty($_POST['mod_pesolbs']) &&
			!empty($_POST['mod_clasificacion'])
			
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$tag=mysqli_real_escape_string($con,(strip_tags($_POST['mod_tag'],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST['mod_tipo'],ENT_QUOTES)));
		$pesokg=mysqli_real_escape_string($con,(strip_tags($_POST['mod_pesokg'],ENT_QUOTES)));
		$pesolbs=mysqli_real_escape_string($con,(strip_tags($_POST['mod_pesolbs'],ENT_QUOTES)));
		$clasificacion=$_POST['mod_clasificacion'];
		$select_producto=mysqli_query($con, "SELECT * FROM products WHERE nombre_producto='".$nombre."'");
		$row=mysqli_fetch_array($select_producto);
		$id = $_POST['mod_id'];
		
		if($_POST['mod_clasificacion'] == '1'){
			$clasificacion = 'Nacional';
		}elseif($_POST['mod_clasificacion'] == '2'){
			$clasificacion = 'Internacional';
		}
				$sql=mysqli_query($con, "UPDATE products SET nombre_producto='".$nombre."',tipo='".$tipo."',tag='".$tag."', pesokg='".$pesokg."', pesolbs='".$pesolbs."', clasificacion='".$clasificacion."' WHERE id_producto='".$id."'");
				
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";
				echo $id;
				echo $nombre;
			
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>