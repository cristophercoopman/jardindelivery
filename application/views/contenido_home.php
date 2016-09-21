<div class="contenido_home"> 
	<div class="row">

	<?php if(!empty($productos)){ foreach ($productos as $row) { ?>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="well">
      			<h4 id="tituloCatalogo">
        			<strong><?php echo $row->nombreProducto ?></strong>
      			</h4>
      			<form role="form" method="post" action="<?php echo base_url();?>Welcome/detalle_producto">
					<input type="text" id="id" name="id" value="<?php echo $row->idProducto?>">
      				<button type="submit" class="btn btn-home">
						<a class="thumbnail" id="thumbnailCatalogo">
			          		<img src="<?php echo base_url()."assets/img/productos/".$row->nombreImagen; ?>" id="imgCatalogo" class="img-responsive margin" style="width:100%" alt="Image">
			          	</a>
		          	</button>
		          	
      			</form>
      			
	          	
	          	<h5><?php echo  $row->corta; ?></h5>
	        	<h4><strong>$ <?php echo  $row->precio; ?></strong></h4>
	        </div>
        </div>
	<?php } } ?> 
	</div>   
</div>
    		
       