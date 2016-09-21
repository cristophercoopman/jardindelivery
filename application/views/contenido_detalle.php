<div class="contenido_home"> 
	<div class="row">

	<?php if(!empty($id)){ ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="well">
      			<h4 id="tituloCatalogo">
        			<strong><?php echo $nombre?></strong>
      			</h4>
      			
      			<div class="col-sm-6">
      				<a class="thumbnail" id="thumbnailCatalogo">
		          		<img src="<?php echo base_url()."assets/img/productos/".$principal; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
		          	</a>
      			</div>
      			<div class="col-sm-6">
  				<?php if(!empty($imagenes)){ foreach ($imagenes as $row) { ?>
  					<div class="col-sm-12">
  						<a class="thumbnail" id="thumbnailCatalogo">
			          		<img src="<?php echo base_url()."assets/img/productos/".$row; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
			          	</a>
  					</div>
  				<?php } }?>
      			</div>
      			<div class="col-sm-12">
      				<div class="container-fluid text-left" style="background-color: black">
			  			<label> pregunta 1</label>
      				</div>
				  	<div class="container-fluid text-right" style="background-color: grey">
				  		<label> respuesta 1</label>
      				</div>
      				<br>
      			</div>
      			<div class="col-sm-12">
      				<div class="container-fluid text-left" style="background-color: black">
				  		
	      					<label> pregunta 1</label>
	      				
				  	</div>
				  	<div class="container-fluid text-right" style="background-color: grey">
				  		
	      					<label> respuesta 1</label>
	      				
				  	</div>
      			</div>
      			<div class="col-sm-12">
      				<form role="form" method="post" action="<?php echo base_url();?>Welcome/pregunta_nueva">
      				</form>
      					<div class="form-group">
      						<label for="email">Correo: </label>
      						<input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su correo">
      					</div>
      					<div class="form-group">
      						<label for="pregunta">Pregunta: </label>
      						<textarea class="form-control" id="pregunta" name="pregunta" placeholder="Ingrese su pregunta"></textarea>
      					</div>
      			</div>
	        </div>
        </div>
	<?php } ?> 
	</div>   
</div>
    		
       