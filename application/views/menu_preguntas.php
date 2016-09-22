<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
	<?php include("preguntas_lateral.php") ?>
</div>
<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
	<!-- mensaje exitosos -->
			<?php if (!empty($exitoso)){ ?>
				<br>
				<div class="alert alert-info fade in text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<h4><?php echo $exitoso ?><span class="glyphicon glyphicon-exclamation-sign"></h4>
				</div>
			<?php }?>
			<!-- mensaje exitosos -->
			<?php if (!empty($error)){	?>
				<br>
				<div class="alert alert-danger fade in text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<h4><?php echo $error ?><span class="glyphicon glyphicon-exclamation-sign"></h4>
				</div>
			<?php }?>
	<div class="alert alert-success text-center banner_admin">
		<h4><strong>PREGUNTAS Y RESPUESTAS</strong></h4>
		<p>Aquí podrás revisar, responder y eliminar las preguntas de tus productos</p>
	</div>
	<?php include("preguntas_contenido.php") ?>
</div>