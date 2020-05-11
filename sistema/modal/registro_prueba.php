	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevaPrueba" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nueva prueba</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto" enctype="multipart/form-data" onsubmit="return validar();">
			<div id="resultados_ajax_productos"></div>

			  <div class="form-group">
				<label for="tipo" class="col-sm-3 control-label">Tipo</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de prueba" maxlength="15"/>
				  
				</div>
			  </div>
	  
			  <div class="form-group">
				<label for="clasificacion" class="col-sm-3 control-label">Clasificación</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="clasificacion" name="clasificacion" placeholder="Clasificación" maxlength="25"/>
				  
				</div>
			  </div>



				
			  <div class="form-group">
				<label for="texto" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="texto" name="texto" placeholder="Descripción" maxlength="120"/>
				  
				</div>
			  </div>







				

			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos" onclick="validar();">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>

	<?php
	 }	?>