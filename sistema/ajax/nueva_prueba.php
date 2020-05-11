<?php
//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/

        if (empty($_POST['clasificacion'])){
			$errors[] = "Por favor llene el campo con la clasificación";
		}else if(strlen($_POST['clasificacion'])>22){ 
			$errors[] = "El número de caracteres supera al permitido en la clasificación de la prueba (22)";
		}else if(strlen($_POST['texto'])>120){ 
			$errors[] = "El número de caracteres supera al permitido en el texto de la prueba (120)";
		}else if(empty($_POST['tipo'])){ 
			$errors[] = "Por favor llene el campo con el tipo";
		}else if(strlen($_POST['clasificacion'])>12){ 
			$errors[] = "El número de caracteres supera al permitido en el tipo (12) ";
		}else if(empty($_POST['texto'])){ 
			$errors[] = "Por favor llene el campo con la descripción de la prueba";
		}else if (
			!empty($_POST['clasificacion']) &&
			!empty($_POST['tipo']) &&
			!empty($_POST['texto'])
			
			
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code



		$clasificacion=mysqli_real_escape_string($con,(strip_tags($_POST["clasificacion"],ENT_QUOTES)));
		$texto=mysqli_real_escape_string($con,(strip_tags($_POST["texto"],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
		
		$select_prueba=mysqli_query($con, "SELECT * FROM pruebas");
        $select_pr=mysqli_query($con, "SELECT * FROM pruebas WHERE clasificacion='".$clasificacion."'");
       
		
 
		
			if (mysqli_num_rows($select_pr)==0 && mysqli_num_rows($select_prueba)<4){
                $sql=mysqli_query($con, "INSERT INTO pruebas (tipo, clasificacion, texto) VALUES ('$tipo','$clasificacion','$texto')");
				$messages[] = "La prueba ha sido ingresada satisfactoriamente.".mysqli_num_rows($select_prueba);
				
			} else{
				$errors []= "El nombre de la prueba ya ha sido registrada anteriormente o ha alcanzado el límite de registro permitido.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.".mysqli_error($con);
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