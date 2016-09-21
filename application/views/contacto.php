<div class="col-sm-12" id="contacto">
	<br>
	<div class="col-sm-12" style="background-color: #0B4607"></div>
	<br>
	<div class="text-center">
		<h3><strong>Contacto</strong></h3>
	</div>
	<br><br>
	<div class="row text-center">
		<form role="form" action="<?php echo base_url(); ?>Email/send_mail" method="post">
			<div class="row">
				<div class="form-group">
		    		<label for="nombre">Nombre: </label>
		    		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre y apellido">	
			    </div>		
				<div class="form-group">
					<label for="email">Correo: </label>
	      			<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico.">
		    	</div>
			</div>
			<br>
			<div class="row">
				<div class="form-group">
		      		<label for="mensaje">Mensaje: </label>
		      		<textarea class="form-control" rows="5" id="mensaje" name="mensaje"></textarea>
		    	</div>
			</div>
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span><strong> ENVIAR</strong></button>		
	  	</form>
	</div>
</div>