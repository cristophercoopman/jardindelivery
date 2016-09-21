<?php include("header.php"); ?> 
	<body>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php if(!empty($nombreCompleto)){
				
				 include("admin_menu.php");
			}else{
				
				include("menu.php");
			} ?>
		</div>
		<?php include("modal_login.php") ?>
		<div class="container">
			<br><br><br>
			<!-- mensaje errores -->
			<?php if (!empty($error)){ ?>
			<br>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger fade in text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<h4><?php echo $error ?><span class="glyphicon glyphicon-exclamation-sign"></h4>
				</div>
			</div>
			<?php }?>

			<!-- mensaje formulario contacto -->
			<?php if (!empty($correo_enviado)){	?>
			<br>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-info fade in text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<h4><?php echo $correo_enviado ?><span class="glyphicon glyphicon-ok"></h4>
				</div>
			</div>
			<?php }?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		        	<?php include("menu_lateral.php") ?>
		        </div>
		        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		        	<?php include("contenido_detalle.php") ?>
				</div>
			</div>
			<div class="box">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php include("somos.php") ?>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php include("contacto.php"); ?>
				</div>
			</div>
		</div>
		<br>
		<?php include("footer.php"); ?>
	</body>
</html>
