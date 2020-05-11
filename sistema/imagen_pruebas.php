<?php
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$formatos = array('.pdf');
	if(isset($_POST['boton'])){
		$nombreArchivo = $_FILES['archivo']['name'];
		$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
		$tipoArchivo = $_FILES['archivo']['type'];
		$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
		$prueba = $_POST['id_pruebas'];
		if(in_array($ext, $formatos)){
			
			if(move_uploaded_file($nombreTmpArchivo, "img/$nombreArchivo")){
				$messages[] = "La imagen del producto se ha subido correctamente.";
				
				$sql_imagen = mysqli_query($con,"UPDATE pruebas SET pdf = 'img/".$nombreArchivo."' WHERE id = '".$prueba."'");
				
			}else{
				$errors[] = "Ha ocurrido un error subiendo la imagen.";
			}
		}else{
			$errors[] = "Archivo no permitido, por favor ingrese solo los siguientes tipos de archivos: .pdf";
		}
	}

?>
<!DOCTYPE html>
<html>
<?php include("templates/head.php"); ?>
    <body style="overflow: hidden;">
        <header>
            <div class="menu">
                <span class="lnr lnr-menu men"></span>
                <p class="derecha"> <b><p id="hora" class="derecha"></p></b></p>
            </div>
        </header>
<?php include("templates/sidebar.php"); ?>

    <div class="container" style="margin-top:40px;">

	<div class="panel panel-info">
		<div class="panel-heading">

			<h4><i class='glyphicon glyphicon-upload'></i> Subir PDF de la prueba</h4>
		</div>
		<?php
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger text-center" role="alert">
				
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
				<div class="alert alert-success text-center" role="alert">
						
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
	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
		
		<div class="form-group">
		<div class="col-sm-8">
		
		</div>
		</div>


		<div class="form-group">
		<label for="nombre" class="col-sm-3 control-label">PDF</label>
		<div class="col-sm-8">
		<input class="form-control" type="file" name="archivo" />
		</div>
		</div>

		<div class="form-group">
		<label for="nombre" class="col-sm-3 control-label">Seleccionar Producto</label>
		<div class="col-sm-8">
		<select class="form-control" id="id_pruebas"  name="id_pruebas">Seleccionar
			<option placeholder="Seleccionar producto">Seleccionar Prueba</option>
				<?php
					$sql_products=mysqli_query($con,"select * from pruebas order by id");
					while ($rw=mysqli_fetch_array($sql_products)){
						$id_pruebas=$rw["id"];
						$clasificacion=$rw['clasificacion'];
						$texto = $rw['texto'];
				?>
			<option value="<?php echo $id_pruebas?>"> <?php echo $clasificacion ?> </option>
				<?php
					}
				?>
		</select>
		</div>
		</div>
		<div class="form-group pull-right">
		<div class="col-sm-8">
		<input type="submit" class="btn btn-info" name="boton" value="Subir" />
		</div>
		</div>
	</form>

</body>

<script src="../js/abrir.js"></script>
</html>