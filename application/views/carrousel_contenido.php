<div id="home_administradores"> 
	<div class="container-fluid">
		<div class="well">
			<h4 class="text-center"><strong>Agregar imágenes</strong></h4>
			<form class="form-horizontal text-center" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url() ?>Admin_controller/agregar_carrousel">
		  		<div class="form-group">
		  			<label for="imagen" class="col-sm-3 control-label">Imágen: </label>
		  			<div class="col-sm-8 text-left">
		  				<input type="file" multiple="true" class="form-control" id="imagen" name="imagen">
		  			</div>		  		
		  		</div>

		  		<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="titulo">Título: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="titulo" name="titulo" placeholder="Ingrese el título"></input>
			  			</div>
			  		</div>
			  	</div>

			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="texto">Texto: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="texto" name="texto" placeholder="Ingrese el texto"></input>
			  			</div>
			  		</div>
			  	</div>

			  	<div class="pager">
			  		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> GUARDAR</button>
			  		<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
			  	</div>
			</form>    			
		</div>

		<div class="well">
			<h4 class="text-center"><strong>Imágenes actuales</strong></h4>
			<div class="row">
			<?php if(!empty($carrousel)){
				foreach ($carrousel as $row) { ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="well">
						<form class="text-center" 	role="form" method="post" action="<?php echo base_url() ?>Admin_controller/modificar_carrousel">
							<a class="thumbnail" id="thumbnailCatalogo">
				            	<img src="<?php echo base_url()."assets/img/carrousel/".$row->imagen	 ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
				          	</a>
							<div class="form-group">
								<label for="titulo" class="col-sm-12">Título: </label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo  $row->titulo ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="texto" class="control-label">Texto: </label>
								<div class="col-sm-12">
									<textarea class="form-control" row="5"  id="texto" name="texto"><?php echo  $row->texto ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="hidden" class="form-control" id="id" name="id" value="<?php echo  $row->id ?>" hidden>
								</div>
							</div>
								          	
				          	<div class="text-center">
				          		<button type="submit" class="btn btn-primary">Guardar cambios</button>
				          	</div>
			          	</form>
			          	<form class="text-center" 	role="form" method="post" action="<?php echo base_url() ?>Admin_controller/eliminar_carrousel">
							<input type="hidden" class="form-control" id="id" name="id" value="<?php echo  $row->id ?>" hidden>
							<div class="text-center" style="margin-top:2px;">
				          		<button type="submit" class="btn btn-danger">Eliminar</button>
				          	</div>
			          	</form>	
					</div>
				</div>		
					<?php }					
			}else{ ?>
				<div class="alert alert-info text-center">
					<h3>No hay imágenes en el slider actualmente<span class="glyphicon glyphicon-exclamation-sign"></h3>
				</div>
			<?php } ?>
			</div>  			
		</div>
	</div>        
</div>

        
       
    		
       