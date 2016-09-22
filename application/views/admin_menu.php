<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid" >
    <div class="row" >
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <div class="navbar-header" >
          <a class="navbar-brand" href="home"><img src="<?php echo base_url() ?>assets/img/logo.png" id="logo"></a>
        </div>
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-8 col-xs-8 text-center">
            <label class="nombre_menu_admin">Bienvenido Sr. <strong><?php echo $nombreCompleto ?></strong> - </label>
            <label class="nombre_menu_admin"><p>[Usuario: <strong><?php echo $user?></strong>]</p></label>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-4 col-xs-4" style="margin-top: 10px;">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="panel">
                  <button type="button" class="btn btn-primary" id="cerrar_sesion1"><span class="glyphicon glyphicon-list-alt"></span> Administración</button>
                  <button type="button" class="btn btn-primary" id="cerrar_sesion2"><span class="glyphicon glyphicon-list-alt"></span></button>
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="<?php echo base_url() ?>Admin_controller/cerrarSesion">
                  <button type="button" class="btn btn-danger" id="cerrar_sesion1"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</button>
                  <button type="button" class="btn btn-danger" id="cerrar_sesion2"><span class="glyphicon glyphicon-off"></span></button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>    