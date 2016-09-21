<div id="home_administradores"> 
	<div class="container-fluid">
		<div class="well">
			<h4 class="text-center"><strong>Agregar nuevos productos</strong></h4>
			<form class="form-horizontal text-center" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Admin_controller/agregar_producto">
		  		<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="nombre">Nombre producto: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto"></input>
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
			  				<input class="form-control" type="number" id="precio" name="precio" min="0" placeholder="$"></input>
			  			</div>
			  		</div>
			  	</div>
			  	
			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="corta">Descripción corta: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="corta" name="corta" placeholder="Ingrese una pequeña descripción"></input>
			  			</div>
			  		</div>
			  	</div>

			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="descripcion">Descripción: </label>
				  		<div class="col-sm-8 text-left">
			  				<textarea class="form-control" rows="5" id="descripcion" name="descripcion" placeholder="Describa en detalle el producto"></textarea>
			  			</div>
			  		</div>
			  	</div>

			  	<div class="form-group">
		  			<label class="col-sm-12 text-center"><strong>Imágenes: <small>Puede cargar hasta 4 imágenes por producto. <br>Para enviar mas de una seleccione todas a la vez.</small></strong></label>
		  		</div>
		  		<div class="form-group">
		  			<label for="imagen1" class="col-sm-3 control-label">Imagen 1 (principal): </label>
		  			<div class="col-sm-8 text-left">
		  				<input type="file" class="form-control" id="imagen1" name="imagen1">
		  			</div>		  		
		  		</div>
		  		<div class="form-group">
		  			<label for="imagen2" class="col-sm-3 control-label">Imagen 2: </label>
		  			<div class="col-sm-8 text-left">
		  				<input type="file" class="form-control" id="imagen2" name="imagen2">
		  			</div>		  		
		  		</div>
		  		<div class="form-group">
		  			<label for="imagen3" class="col-sm-3 control-label">Imagen 3: </label>
		  			<div class="col-sm-8 text-left">
		  				<input type="file" class="form-control" id="imagen3" name="imagen3">
		  			</div>		  		
		  		</div>
		  		<div class="form-group">
		  			<label for="imagen4" class="col-sm-3 control-label">Imagen 4: </label>
		  			<div class="col-sm-8 text-left">
		  				<input type="file" class="form-control" id="imagen4" name="imagen4">
		  			</div>		  		
		  		</div>

			  	<div class="pager">
			  		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> GUARDAR</button>
			  		<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
			  	</div>
			</form>    			
		</div>
		
	</div>        
</div>

        
       
    		
       