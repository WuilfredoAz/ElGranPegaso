<?php

		if (empty($_POST['mod_clasificacion'])){
			$errors[] = "El campo de clasificación está vacía";
		}else if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_tipo'])) {
           $errors[] = "ID vacío";
        }else if ($_POST['mod_texto']==""){
			$errors[] = "El campo texto está vacío";
		}else if (
			!empty($_POST['mod_clasificacion']) &&
			!empty($_POST['mod_tipo']) &&
			!empty($_POST['mod_texto'])
			
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$clasificacion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_clasificacion"],ENT_QUOTES)));
		$texto=mysqli_real_escape_string($con,(strip_tags($_POST['mod_texto'],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST['mod_tipo'],ENT_QUOTES)));
		$select_producto=mysqli_query($con, "SELECT * FROM pruebas WHERE clasificacion='".$clasificacion."'");
		$row=mysqli_fetch_array($select_producto);
		$id = $_POST['mod_id'];
		

				$sql=mysqli_query($con, "UPDATE pruebas SET tipo='".$tipo."',  clasificacion='".$clasificacion."',texto='".$texto."' WHERE id='".$id."'");
				
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";

			
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