<?php


	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	
	$query_empresa=mysqli_query($con,"select * from perfil where id_perfil=1");
	$row=mysqli_fetch_array($query_empresa);
?>
<!DOCTYPE html>
<html lang="en">
<?php include("templates/head.php"); ?>
  <body>
 
        <header>
            <div class="menu">
                <span class="lnr lnr-menu men"></span>
                <p class="derecha"> <b><p id="hora" class="derecha"></p></b></p>
            </div>
        </header>

<?php include("templates/sidebar.php"); ?>
          
	  </br>
	 

	<div class="container">
      <div class="row">
      <form method="post" id="perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
				<h3 class="panel-title"><i class='lnr lnr-user'></i><b> Perfil</b></h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
					<img class="img-responsive" src="<?php echo $row['logo_url'];?>" alt="Logo">
					
				</div>
				<br>				
					<div class="row">
  						<div class="col-md-12">
							<div class="form-group">
								<input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
							</div>
						</div>
						
					</div>
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nombre de la empresa:</td>
                        <td><input type="text" class="form-control input-sm" name="nombre_empresa" value="<?php echo $row['nombre_empresa']?>" required maxlength="30"></td>
                      </tr>
                      <tr>
                        <td>Teléfono:</td>
                        <td><input type="text" class="form-control input-sm" name="telefono" value="<?php echo $row['telefono']?>" required maxlength="18"></td>
                      </tr>
                      <tr>
                        <td>Teléfono secundario:</td>
                        <td><input type="text" class="form-control input-sm" name="telefono2" value="<?php echo $row['telefono2']?>" required maxlength="18"></td>
                      </tr>
                      <tr>
                        <td>Correo electrónico:</td>
                        <td><input type="email" class="form-control input-sm" name="email" value="<?php echo $row['email']?>" maxlength="33"></td>
                      </tr>
	

					  <tr>
                        <td>Dirección:</td>
                        <td><input type="text" class="form-control input-sm" name="direccion" value="<?php echo $row["direccion"];?>" required maxlength="120"></td>
                      </tr>



                     
					  <tr>
                        <td>Instagram:</td>
                        <td><input type="text" class="form-control input-sm" name="instagram" value="<?php echo $row["instagram"];?>"maxlength="18"></td>
                      </tr>
					  <tr>
                        <td>Facebook:</td>
                        <td><input type="text" class="form-control input-sm" name="facebook" value="<?php echo $row["facebook"];?>"maxlength="18"></td>
                      </tr>
					  <tr>
                        <td>Twitter:</td>
                        <td><input type="text" class="form-control input-sm" name="twitter" value="<?php echo $row["twitter"];?>" maxlength="18"></td>
                      </tr>
                   
                        
                     
                    </tbody>
                  </table>
                  
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">
                    
                     
                            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Actualizar datos</button>
                       
                       
                    </div>
            
          </div>
        </div>
		</form>
      </div>

	
	<?php
	include("footer.php");
	?>

  </body>
          <script src="../js/abrir.js"></script>
</html>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
<script>
$( "#perfil" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_perfil.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('.guardar_datos').attr("disabled", false);

		  }
	});
  event.preventDefault();
})





		
</script>

<script>
		function upload_image(){
				
				var inputFileImage = document.getElementById("imagefile");
				var file = inputFileImage.files[0];
				if( (typeof file === "object") && (file !== null) )
				{
					$("#load_img").text('Cargando...');	
					var data = new FormData();
					data.append('imagefile',file);
					
					
					$.ajax({
						url: "ajax/imagen_ajax.php",        // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
							$("#load_img").html(data);
							
						}
					});	
				}
				
				
			}
    </script>

