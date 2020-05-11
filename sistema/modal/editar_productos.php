	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>

			   <div class="form-group">
				<label for="mod_tipo" class="col-sm-3 control-label">Tipo</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_tipo" name="mod_tipo" placeholder="Tipo de producto" maxlength='20'>
				</div>
			  </div>					

			   <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" maxlength='25'>
				  <input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>

			   <div class="form-group">
				<label for="mod_tag" class="col-sm-3 control-label">Etiqueta</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_tag" name="mod_tag" placeholder="Etiqueta del producto" maxlength='10'>
				</div>
			  </div>


			   <div class="form-group">
				<label for="mod_pesokg" class="col-sm-3 control-label">Peso (KG)</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_pesokg" name="mod_pesokg" placeholder="Peso en Kilos del producto" maxlength='7'>
				</div>
			  </div>


			   <div class="form-group">
				<label for="mod_pesolbs" class="col-sm-3 control-label">Peso (Lbs)</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_pesolbs" name="mod_pesolbs" placeholder="Peso en Libras del producto" maxlength='8'>
				</div>
			  </div>


			   <div class="form-group">
				<label for="mod_clasificacion" class="col-sm-3 control-label">Clasificación</label>
				<div class="col-sm-8">
				<select class="form-control" name="mod_clasificacion" id="mod_clasificacion">
					<option value="0">Seleccione la Clasificación</option>
					<option value="1">Nacional</option>
					<option value="2">Internacional</option>
				</select>
				</div>
			  </div>
			  
			  
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>