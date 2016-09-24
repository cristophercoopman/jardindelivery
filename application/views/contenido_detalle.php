<div class="contenido_home"> 
	
	<?php if(!empty($id)){ ?>

		<div class="col-md-12 col-sm-12 col-xs-12">
      
      <div class="well">
  			<h4 id="tituloCatalogo">
    			<strong><?php echo $nombre?></strong>
  			</h4>
      </div>

      <div class="col-sm-6">
        <a class="thumbnail" id="thumbnailCatalogo">
          <img src="<?php echo base_url()."assets/img/productos/".$principal; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
        </a>
      </div>

      <div class="col-sm-6">
        <div class="well detalle">
          <div class="row">
            <div class="col-sm-12">
              <h4 id="tituloCatalogo">Precio: <small>$ <?php echo $precio?></small></h4> 
            </div>
            <div class="col-sm-12">
              <label><?php echo $corta?></label>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-sm-12">

			<?php if(!empty($imagenes)){ foreach ($imagenes as $imagen) { ?>
				<div class="col-sm-4">
					<a class="thumbnail" id="thumbnailCatalogo">
        		<img src="<?php echo base_url()."assets/img/productos/".$imagen; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
        	</a>
				</div>
			<?php } }?>
			
      </div>

      <div class="col-sm-12">
        <div class="well detalle">
          <?php echo $descrip ?>
        </div>
        
        <div class="well detalle">
        <?php if(!empty($preguntas)){ ?>
          <div class="col-sm-12">
            <h4 id="tituloCatalogo">Preguntas </h4>
          </div>
        <?php  foreach ($preguntas as $pregunta) { ?>
          
          <div class="container-fluid text-left">
            <label><?php echo $pregunta->pregunta?></label>
          </div>
        <?php if(!empty($pregunta->respuesta)){ ?>

          <div class="container-fluid text-right">
            <label><?php echo $pregunta->respuesta;?></label>
          </div>
          
        <?php } ?>
          <div class="col-sm-12" style="background-color: rgba(32, 31, 32, 0.2);"></div><br>
        <?php } 
      } ?>
        </div>
      </div>

			<div class="col-sm-12">
        <div class="well detalle">
          <form role="form" method="post" action="<?php echo base_url();?>Welcome/pregunta_nueva">
            <div class="container-fluid text-left">
              <h4>Deja tus dudas y consultas aquí, serán respondidas a la brevedad</h4>
              <input class="form-control" id="idProducto" name="idProducto" value="<?php echo $id?>" type="text" style="display:none;">
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
        </div>
        
        <br>
			</div>
    </div>
	<?php } ?> 
	
</div>
    		
       