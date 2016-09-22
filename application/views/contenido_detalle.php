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

				<?php if(!empty($imagenes)){ foreach ($imagenes as $imagen) { ?>
					<div class="col-sm-12">
						<a class="thumbnail" id="thumbnailCatalogo">
          		<img src="<?php echo base_url()."assets/img/productos/".$imagen; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
          	</a>
					</div>
				<?php } }?>
  			
        </div>
        <div class="col-sm-12">
        
        <?php if(!empty($preguntas)){ 
          foreach ($preguntas as $pregunta) { ?>

          <div class="container-fluid text-left" style="background-color: black">
            <label><?php echo $pregunta->pregunta?></label>
          </div>
          <?php if(!empty($pregunta->respuesta)){ ?>

          <div class="container-fluid text-right" style="background-color: grey">
            <label><?php echo $pregunta->respuesta;?></label>
          </div>
          <br>
          <?php } 
          } 
        } ?>
        </div>

  			<div class="col-sm-12">
          <form role="form" method="post" action="<?php echo base_url();?>Welcome/pregunta_nueva">
            <div class="container-fluid text-left" style="background-color: grey">
              <h4>Deja tus dudas y consultas aquí´. Serán respondidas a la brevedad</h4>
              <input class="form-control" id="idProducto" name="idProducto" value="<?php echo $id?>" hidden="true">
              <div class="form-group col-sm-4">
                <label for="email">Correo: </label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su correo" required>
              </div>
              <div class="form-group col-sm-8">
                <label for="pregunta">Pregunta: </label>
                <input class="form-control" id="pregunta" name="pregunta" placeholder="Ingrese su pregunta" required>
              </div>
              <div class="pager">
                <button type="submit" class="btn btn-default" id="enviar" name="enviar"><span class="glyphicon glyphicon-ok"></span> ENVIAR</button>
              </div>
            </div>
      		</form>
          <br>
  			</div>
      </div>
    </div>
	<?php } ?> 
	</div>   
</div>
    		
       