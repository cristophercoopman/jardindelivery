<div id="home_administradores"> 
	<div class="container-fluid">
		<div class="well">
			<h4 class="text-center"><strong>Modificar Producto</strong></h4>
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<a class="thumbnail" id="thumbnailCatalogo">
	            	<img src="<?php echo base_url()."assets/img/productos/".$img_principal->nombre; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%, heigth:100%" alt="Image">
	          	</a>	
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-12">

			<?php if(!empty($imagenes)){
				foreach ($imagenes as $key) { ?>

				<div class="col-sm-4">
					<a class="thumbnail" id="thumbnailCatalogo">
		            	<img src="<?php echo base_url()."assets/img/productos/".$key->nombre; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
		          	</a>
		          	<div class="pager">
			          	<form role="form" method="post" action="<?php echo base_url();?>Admin_controller/modificar_imagen_principal">
			          		<input type="text" id="id" name="id" value="<?php echo $key->id?>" hidden>
			          		<input type="text" id="producto" name="producto" value="<?php echo $key->producto?>" hidden>
			          		<button type="submit" id="btn_imagen" name="btn_imagen" class="btn btn-primary">Elegir como principal</button>
			          	</form>
		          	</div>	
				</div>
				<?php }
			} ?>
			</div>	

			<form class="form-horizontal text-center" role="form" method="post" action="<?php echo base_url() ?>Admin_controller/modificar_producto">
		  		<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="nombre">Nombre producto: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" value="<?php echo $producto->nombre?>">
			  			</div>
			  		</div>
			  	</div>

				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-3" for="categoria">Categoría: </label>
						<div class="col-sm-4">
							<select class="form-control" id="categoria" name="categoria">
					        	<option>Seleccione una categoría</option>
				  				<?php if(!empty($categorias)){ 
				  					foreach ($categorias as $categ) { ?>
		  						<option value="<?php echo $categ->id ?>"><?php echo $categ->nombre ?></option>	
					  				<?php } 
					  			} ?>
							</select>
						</div>
						<label class="control-label col-sm-2" for="precio">Precio: $</label>					
				  		<div class="col-sm-2 text-left">
			  				<input class="form-control" type="number" id="precio" name="precio" min="0" value="<?php echo $producto->precio?>" placeholder="$">
			  			</div>
			  		</div>
			  	</div>
		  	
			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="corta">Descripción corta: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="corta" name="corta" value="<?php echo $producto->descripcion_corta?>" placeholder="Ingrese una pequeña descripción">
			  			</div>
			  		</div>
			  	</div>

			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="descripcion">Descripción: </label>
				  		<div class="col-sm-8 text-left">
			  				<textarea class="form-control" rows="5" id="descripcion" name="descripcion" ><?php echo $producto->descripcion?></textarea>
			  			</div>
			  		</div>
			  	</div>

			  	<div class="pager">
			  		<input class="form-control" type="text" id="id" name="id" value="<?php echo $producto->id?>" style="display:none">
			  		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> GUARDAR CAMBIOS</button>
			  		<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
			  	</div>
			</form>  			
		</div>
	</div>        
</div>

        
       
    		
       