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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Prueba</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>

			   <div class="form-group">
				<label for="mod_tipo" class="col-sm-3 control-label">Tipo</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_tipo" name="mod_tipo" placeholder="Tipo de la prueba" maxlength="15">
				</div>
			  </div>				

			   <div class="form-group">
				<label for="mod_clasificacion" class="col-sm-3 control-label">Clasificación</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_clasificacion" name="mod_clasificacion" placeholder="Clasificación del producto" maxlength="25">
				  <input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>



			   <div class="form-group">
				<label for="mod_texto" class="col-sm-3 control-label">Texto</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_texto" name="mod_texto" placeholder="Texto de la prueba" maxlength="120">
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