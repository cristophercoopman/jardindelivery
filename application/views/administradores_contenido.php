<div id="home_administradores"> 
	<div class="container-fluid">
		<div class="well">
			<h4 class="text-center"><strong>Agregar nuevos administradores</strong></h4>
			<form class="form-horizontal text-center" role="form" method="post" action="<?php echo base_url() ?>Admin_controller/agregar_admin">
		  		<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="nombre">Nombre Completo: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre completo"></input>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="user">Usuario: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="user" name="user" placeholder="Ingrese nuevo usuario"></input>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="password">Contraseña: </label>
				  		<div class="col-sm-3 text-left">
			  				<input class="form-control" type="password" id="password" name="password" placeholder="Ingrese nueva contraseña"></input>
			  			</div>
			  			<label class="control-label col-sm-2" for="repassword">Reingrese contraseña: </label>
				  		<div class="col-sm-3 text-left">
			  				<input class="form-control" type="password" id="repassword" name="repassword" placeholder="Reingrese contraseña"></input>
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
			<h4 class="text-center"><strong>Modificar / Eliminar administradores</strong></h4>
			
			<form class="form-horizontal text-center" role="form" method="post" action="<?php echo base_url() ?>Admin_controller/modificar_admin">
		  		<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="user">Administrador: </label>
				  		<div class="col-sm-8 text-left">
							<select class="form-control input-sm" id="user" name="user">
					        	<option>Seleccione un administrador</option>
		  				<?php if(!empty($administradores)){ 
		  					foreach ($administradores as $admin) { ?>
		  						<option value="<?= $admin->id ?>"><?php echo $admin->user  ?></option>	
			  				<?php } 
			  			} ?>
							</select>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="nombre">Nombre completo: </label>
				  		<div class="col-sm-8 text-left">
			  				<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese nuevo nombre"></input>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="form-group">
				  	<div class="row">
			  			<label class="control-label col-sm-3" for="password">Contraseña: </label>
				  		<div class="col-sm-3 text-left">
			  				<input class="form-control" type="password" id="password" name="password" placeholder="Ingrese nueva contraseña"></input>
			  			</div>
			  			<label class="control-label col-sm-2" for="repassword">Reingrese contraseña: </label>
				  		<div class="col-sm-3 text-left">
			  				<input class="form-control" type="password" id="repassword" name="repassword" placeholder="Reingrese contraseña"></input>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="pager">
			  		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> MODIFICAR</button>
			  		<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
			  	</div>
			</form>    			
		</div>
	</div>        
</div>

        
       
    		
       