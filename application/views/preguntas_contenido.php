<div id="home_administradores"> 
	<div class="container-fluid">
		
		<div class="well">
			<h4 class="text-center"><strong>Responder preguntas</strong></h4>
			<div class="row">
			<?php if(!empty($preguntas)){ ?>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table text-center">
						    <thead>
						      	<tr>
						        	<th>Correo</th>
						        	<th>Pregunta</th>
						        	<th>Producto</th>
						        	<th>Respuesta</th>
						        	<th>Guardar</th>
						        	<th>Eliminar</th>
						      	</tr>
						    </thead>
						    <tbody>

						    	<?php foreach ($preguntas as $pregunta) { ?>
						    		
						    		<tr>
							        	<td><?php echo $pregunta->email?></td>
							        	<td><?php echo $pregunta->pregunta ?></td>
							        	<td><?php echo $pregunta->nombre ?></td>
							        	<form role="form" method="post" action="<?php echo base_url()?>Admin_controller/responder">
							        		<td>
							        			<input type="text" id="id" name="id" value="<?php echo $pregunta->id?>" hidden="true">
							        			<input type="text" id="respuesta" name="respuesta" value="<?php echo $pregunta->respuesta?>" placeholder="Ingrese respuesta" required>
							        		</td>
							        		<td>
							        			<button type="submit" class="btn btn-primary"> Guardar</button>
							        		</td>
							        	</form>
							        	<form role="form" method="post" action="<?php echo base_url()?>Admin_controller/eliminar_pregunta">
											<td>
												<input type="text" id="id" name="id" value="<?php echo $pregunta->id?>" hidden="true">
												<button type="submit" class="btn btn-danger"> Eliminar</button>
											</td>
							        	</form>
							      	</tr>

						    	<?php } ?>
						     	
						    </tbody>
					  	</table>
					</div>
				</div>		

			<?php }else{ ?>

				<div class="alert alert-info text-center">
					<h3>No hay preguntas actualmente<span class="glyphicon glyphicon-exclamation-sign"></h3>
				</div>

			<?php } ?>
				
			</div>  			
		</div>
	</div>        
</div>

        
       
    		
       