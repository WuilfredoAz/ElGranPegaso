<?php
//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/

        if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		}else if (strlen($_POST['nombre'])>25){
			$errors[] = "El campo nombre ha superado el límite de caracteres permitidos (25)";
		}else if (empty($_POST['tipo'])){
			$errors[] = "El campo Tipo está vacío";
		}else if (strlen($_POST['tipo'])>20){
			$errors[] = "El campo tipo ha superado el límite de caracteres permitidos (20)";
		}else if (!preg_match("/^([a-zA-Z])/", $_POST['tipo'])){
         	$errors[] = "Ingrese solo letras para el tipo de producto";
        }else if (!preg_match("/^([a-zA-Z])/", $_POST['nombre'])){
         	$errors[] = "Ingrese solo letras para el nombre del producto";
        }else if (empty($_POST['etiqueta'])){
			$errors[] = "El campo Etiqueta está vacío";
		}else if (strlen($_POST['etiqueta'])>10){
			$errors[] = "El campo etiqueta ha superado el límite de caracteres permitidos (10)";
		}else if (!preg_match("/^([a-zA-Z])/", $_POST['etiqueta'])){
         	$errors[] = "Ingrese solo letras para la etiqueta del producto";
        }else if (empty($_POST['pesokg'])){
			$errors[] = "El campo Peso está vacío";
		}else if (strlen($_POST['pesokg'])>5){
			$errors[] = "El campo peso (Kg) ha superado el límite de caracteres permitidos (5)";
		}else if (empty($_POST['pesolbs'])){
			$errors[] = "El campo Peso está vacío";
		}else if (strlen($_POST['pesolbs'])>5){
			$errors[] = "El campo Peso (Lbs) ha superado el límite de caracteres permitidos (5)";
		}else if (!is_numeric($_POST['pesokg'])){
			$errors[] = "Por favor solo ingrese números en el campo del peso en Kilos";
		}else if (!is_numeric($_POST['pesolbs'])){
			$errors[] = "Por favor solo ingrese números en el campo del peso en Libras";
		}else if (empty($_POST['clasificacion'])){
			$errors[] = "El campo Clasificación está vacío";
		}else if (
			!empty($_POST['nombre']) &&
			!empty($_POST['tipo']) &&
			!empty($_POST['etiqueta']) &&
			!empty($_POST['pesokg']) &&
			!empty($_POST['pesolbs']) &&
			!empty($_POST['clasificacion'])
			
			
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code


		if($_POST['clasificacion'] == '1'){
			$clasificacion = 'Nacional';
		}elseif($_POST['clasificacion'] == '2'){
			$clasificacion = 'Internacional';
		}
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
		$pesokg=mysqli_real_escape_string($con,(strip_tags($_POST["pesokg"],ENT_QUOTES)));
		$pesolbs=mysqli_real_escape_string($con,(strip_tags($_POST["pesolbs"],ENT_QUOTES)));
		$tag=mysqli_real_escape_string($con,(strip_tags($_POST["etiqueta"],ENT_QUOTES)));
		$date_added=date("Y-m-d H:i:s");
		
		$pesok = $pesokg."KG";
		$pesol = $pesolbs."LBS";
		
        $select_pr=mysqli_query($con, "SELECT * FROM products WHERE nombre_producto='".$nombre."'");
       
		
 
		
			if (mysqli_num_rows($select_pr)==0){
                $sql=mysqli_query($con, "INSERT INTO products (nombre_producto, tipo, clasificacion, date_added, tag, pesokg, pesolbs) VALUES ('$nombre','$tipo','$clasificacion','$date_added','$tag','$pesok','$pesol')");
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
				
			} else{
				$errors []= "El nombre del producto ya ha sido registrado, revise e intente de nuevo.".mysqli_error($con);
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