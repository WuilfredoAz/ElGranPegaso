<?php
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
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
    
    <div class="container" style="margin-top:40px;">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevaPrueba"><span class="glyphicon glyphicon-plus" ></span> Nueva Prueba</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Pruebas</h4>
		</div>
		<div class="panel-body">
		
			
		<?php
			include("modal/registro_prueba.php");
			include("modal/editar_pruebas.php");
			?>

			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Tipo o nombre</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Tipo o nombre de la prueba" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
							
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	
	<?php
	include("footer.php");
	?>
    <script src="../js/abrir.js"></script>
	<script type="text/javascript" src="js/pruebas.js"></script>
  </body>
</html>
<script>

function validar(){
	var  nombre, tag, imagen;
	nombre = document.getElementById("nombre").value;
	tag = document.getElementById("etiqueta").value;
	
	imagen = document.getElementByName("imagen").value;

	if(tag === ""){
		alert("El campo está vacío");
	}

}
 
$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nueva_prueba.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_productos").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_prueba.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
		
			var clasificacion = $("#clasificacion"+id).val();
			var texto = $("#texto"+id).val();
			var tipo = $("#tipo"+id).val();
			$("#mod_id").val(id);
			$("#mod_tipo").val(tipo);
			$("#mod_clasificacion").val(clasificacion);
			$("#mod_texto").val(texto);

		}
</script>

