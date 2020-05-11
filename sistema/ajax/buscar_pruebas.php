<?php


	
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_prueba=intval($_GET['id']);
		
	
		
			if ($delete1=mysqli_query($con,"DELETE FROM pruebas WHERE id='".$id_prueba."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			

		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('clasificacion', 'texto',);//Columnas de busqueda
		 $sTable = "pruebas";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './pruebas.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info" style="font-size:15px;">
					<th>ID</th>
					<th>Tipo</th>
					<th>Clasificación</th>
					<th>Texto</th>
					<th>Imagen PDF</th>
					<th>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_prueba=$row['id'];
						$tipo = $row['tipo'];
						$clasificacion=$row['clasificacion'];
						$texto = $row['texto'];
						$pdf = $row['pdf'];
					?>
					
					<input type="hidden" value="<?php echo $id_prueba;?>" id="id_prueba<?php echo $id_prueba;?>">
					<input type="hidden" value="<?php echo $tipo;?>" id="tipo<?php echo $id_prueba;?>">
					<input type="hidden" value="<?php echo $clasificacion;?>" id="clasificacion<?php echo $id_prueba;?>">
					<input type="hidden" value="<?php echo $texto;?>" id="texto<?php echo $id_prueba;?>">

					<tr>
						
					</tr>
					<?php
					 ?>	
						<td><?php echo $id_prueba; ?></td>
						<td><?php echo $tipo; ?></td>
						<td><?php echo $clasificacion; ?></td>
						<td><?php echo $texto; ?></td>
						<td><?php echo $pdf; ?></td>
						
						
					<td ><span>
					

					
					<a href="#" class='btn btn-default' title='Editar producto' onclick="obtener_datos('<?php echo $id_prueba; ?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar producto' onclick="eliminar('<?php echo $id_prueba; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
					
				}
				?>
				<tr>
					<td colspan=11><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>