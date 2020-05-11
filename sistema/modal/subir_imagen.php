	<!-- Modal -->
	<div class="modal fade" id="subirImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" action="subir.php" enctype="multipart/form-data">
			<div id="resultados_ajax_productos"></div>

			  



			  <div class="form-group">
				<label for="imagen" class="col-sm-3 control-label">Imagen</label>
				<div class="col-sm-8">
					<input class="form-control" type="file" name="imagen" />
					<select class="form-control" id="id_producto" name="id_producto">
						<option placeholder="Seleccionar el pedido" value="0">Seleccionar Producto</option>
							<?php
								$sql_products=mysqli_query($con,"select * from products order by id_producto");
								while ($rw=mysqli_fetch_array($sql_products)){
									$id_producto=$rw["id_producto"];
									$nombre_producto=$rw['nombre_producto'];
							?>
						<option value="<?php echo $id_producto?>"> <?php echo $nombre_producto?> </option>
							<?php
								}
							?>	
					</select>
				  
				</div>
			  </div>
			 </div>
		  </form>
		</div>
	  </div>
	</div>