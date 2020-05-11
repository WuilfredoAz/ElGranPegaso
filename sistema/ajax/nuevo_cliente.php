<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        }else if (strlen($_POST['cedula'])<7 and $_POST['cedula'] > 8){
        	$errors[] = "Número de cédula muy corto o muy grande";
        }else if (!preg_match("/^([a-zA-Z])/", $_POST['nombre']) or !preg_match("/([a-zA-Z])$/", $_POST['nombre']) ){
             $errors[] = "Ingrese solo letras para el nombre del cliente";
             }else if(empty($_POST['apellido'])){
             	$errors[] = "Apellido vacío";
             }else if (!preg_match("/^([a-zA-Z])/", $_POST['apellido']) or !preg_match("/([a-zA-Z])$/", $_POST['apellido']) ){
             $errors[] = "Ingrese solo letras en el campo de apellido";
             } else if(!is_numeric($_POST['cedula'])){
             	$errors[] = "Ingrese solo números en la cédula";
             }else if(empty($_POST['email'])){
             	$errors[] = "Email vacío";
             }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        } else if (empty($_POST['cedula'])){
        	$errors[] = "El campo cédula está vacío";
        }else if(empty($_POST['telefono'])){
        	$errors[] = "El campo de teléfono está vacío";

        }

         else if (!empty($_POST['nombre'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$cedula=mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$date_added=date("Y-m-d H:i:s");
		$sql_select=mysqli_query($con,"SELECT * FROM cliente WHERE cedula='".$_POST['cedula']."'");
		$sql="";
		if(mysqli_num_rows($sql_select)==0){
			$sql=mysqli_query($con,"INSERT INTO cliente (nombre, apellido, telefono, email, cedula, status, fecha) VALUES ('$nombre','$apellido','$telefono','$email','$cedula','$estado','$date_added')");
		}
		
		
			if ($sql){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "El número de cédula ya se encuentra registrado en la base de datos.".mysqli_error($con);
			}
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