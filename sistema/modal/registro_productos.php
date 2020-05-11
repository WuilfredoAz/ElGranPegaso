	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto" enctype="multipart/form-data" onsubmit="return validar();">
			<div id="resultados_ajax_productos"></div>

				<div class="form-group">
				<label for="tipo" class="col-sm-3 control-label">Tipo</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de producto" maxlength="20"/>
				  
				</div>
			  </div>
				
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" maxlength="25"/>
				  
				</div>
			  </div>


			  
			  <div class="form-group">
				<label for="etiqueta" class="col-sm-3 control-label">Etiqueta</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="etiqueta" name="etiqueta" placeholder="Etiqueta" maxlength="10"/>
				  
				</div>
			  </div>



				
			  <div class="form-group">
				<label for="peso" class="col-sm-3 control-label">Peso (KG)</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="pesokg" name="pesokg" placeholder="Peso en Kilos" maxlength="5"/>
				  
				</div>
			  </div>

			  <div class="form-group">
				<label for="peso" class="col-sm-3 control-label">Peso (Lbs)</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="pesolbs" name="pesolbs" placeholder="Peso en Libras" maxlength="5"/>
				  
				</div>
			  </div>

				<div class="form-group">
				<label for="clasificacion" class="col-sm-3 control-label">Clasificación</label>
				<div class="col-sm-8">
				<select class="form-control" name="clasificacion" id="clasificacion">
					<option value="0">Seleccione la Clasificación</option>
					<option value="1">Nacional</option>
					<option value="2">Internacional</option>
				</select>
					
				  
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