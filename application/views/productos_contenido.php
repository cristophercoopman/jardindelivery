<div class="col-sm-12 text-center">
	<a href="<?php echo base_url() ?>Admin_controller/nuevo_producto">
		<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar un nuevo producto</button>
	</a>
</div>
<div class="contenido_home">
<br> 
	<div class="row">


		<?php if(!empty($productos)){
				foreach ($productos as $row) { ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="well">
		      			<h4 id="tituloCatalogo">
		        			<strong><?php echo $row->nombreProducto ?></strong>
		      			</h4>
			          	<a class="thumbnail" id="thumbnailCatalogo">
			            	<img src="<?php echo base_url()."assets/img/productos/".$row->nombreImagen; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
			          	</a>
			          	<h5><?php echo  $row->corta; ?></h5>
			        	<h4><strong>$ <?php echo  $row->precio; ?></strong></h4>
						
						<?php if($row->estado == "A"){ ?> 
						<label class="label label-success">activo</label>
						<div class="pager">	
							<form role="form" method="post" action="<?php echo  base_url(); ?>Admin_controller/desactivar_producto">
								<input type="text" id="id" name="id" value="<?php echo  $row->idProducto?>" hidden="true">
								<div class="text-center">
									<button type="button" class="btn btn-default" disabled>Activar</button>
					        		<button type="submit" class="btn btn-danger">Desactivar</button>
								</div>
							</form>
						</div>
						<?php }else{ ?> 
						<label class="label label-danger">inactivo</label>
						<div class="pager">
							<form role="form" method="post" action="<?php echo  base_url(); ?>Admin_controller/activar_producto">
								<input type="text" id="id" name="id" value="<?php echo  $row->idProducto?>" hidden="true">
								<div class="text-center">
									<button type="submit" class="btn btn-success">Activar</button>
					        		<button type="button" class="btn btn-default" disabled>Desactivar</button>
								</div>
							</form>
						</div>
						<?php }?>
						<div class="pager">
							<div class="col-sm-6">
								<form role="form" method="post" action="<?php echo  base_url(); ?>Admin_controller/ventana_modificar_producto">
									<input type="text" id="id" name="id" value="<?php echo  $row->idProducto?>" hidden="true">
									<button type="submit" class="btn btn-primary">Modificar</button>
				        		</form>	
							</div>
							<div class="col-sm-6">
								<form role="form" method="post" action="<?php echo  base_url(); ?>Admin_controller/eliminar_producto">
				        			<input type="text" id="id" name="id" value="<?php echo  $row->idProducto?>" hidden="true">
				        			<button type="submit" class="btn btn-danger">Eliminar</button>
								</form>	
							</div>
			        		
						</div>
			        </div>
				</div>
					<?php }					
			}else{ ?>
				<div class="alert alert-info text-center">
					<h3>No hay productos creados actualmente<span class="glyphicon glyphicon-exclamation-sign"></h3>
				</div>
			<?php } ?>


		
	</div> 	    
</div>