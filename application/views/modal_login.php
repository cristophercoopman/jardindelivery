<div class="modal fade" id="modallogin" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-headerLogin" style="padding:35px 50px;" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> ACCESO EXCLUSIVO ADMINISTRADORES</h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;">
        <form role="form" method="post" action="<?php echo base_url() ?>Admin_controller/iniciarSesion">
          <div class="form-group">
            <label for="user"><span class="glyphicon glyphicon-user"></span> Usuario: </label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese su usuario" required>
          </div>
          <div class="form-group">
            <label for="password"><span class="glyphicon glyphicon-lock"></span> Contraseña: </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
          </div>
          <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
        </form>
      </div>
    </div>
  </div>
</div>