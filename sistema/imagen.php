<?php
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$formatos = array('.png', '.jpg', '.jpeg', '.pdf');
	if(isset($_POST['boton'])){
		$nombreArchivo = $_FILES['archivo']['name'];
		$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
		$tipoArchivo = $_FILES['archivo']['type'];
		$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
		$producto = $_POST['id_producto'];
		if(in_array($ext, $formatos)){
			
			if(move_uploaded_file($nombreTmpArchivo, "img/$nombreArchivo")){
				$messages[] = "La imagen del producto se ha subido correctamente.";
				if($_FILES['archivo']['type'] != 'application/pdf')
				{
				$sql_imagen = mysqli_query($con,"UPDATE products SET imagen = 'img/".$nombreArchivo."' WHERE id_producto = '".$producto."'");
				}else{
					$sql_imagen = mysqli_query($con,"UPDATE products SET pdf = 'img/".$nombreArchivo."' WHERE id_producto = '".$producto."'");
				}
			}else{
				$errors[] = "Ha ocurrido un error subiendo la imagen.";
			}
		}else{
			$errors[] = "Archivo no permitido, por favor ingrese solo los siguientes tipos de archivos: .png, .jpg, .jpeg";
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

			<h4><i class='glyphicon glyphicon-upload'></i> Subir imagen o PDF del producto</h4>
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
		<label for="nombre" class="col-sm-3 control-label">Imagen</label>
		<div class="col-sm-8">
		<input class="form-control" type="file" name="archivo" />
		</div>
		</div>

		<div class="form-group">
		<label for="nombre" class="col-sm-3 control-label">Seleccionar Producto</label>
		<div class="col-sm-8">
		<select class="form-control" id="id_producto"  name="id_producto">Seleccionar
			<option placeholder="Seleccionar producto">Seleccionar Producto</option>
				<?php
					$sql_products=mysqli_query($con,"select * from products order by id_producto");
					while ($rw=mysqli_fetch_array($sql_products)){
						$id_producto=$rw["id_producto"];
						$nombre_producto=$rw['nombre_producto'];
						$tipo = $rw['tipo'];
						$peso = $rw['peso'];
						$pesou = $rw['pesoU'];
				?>
			<option value="<?php echo $id_producto?>"> <?php echo $nombre_producto.' - '.$peso.' - '.$pesou.' - '.$tipo?> </option>
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