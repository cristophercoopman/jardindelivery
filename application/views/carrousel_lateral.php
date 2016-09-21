<ul class="nav nav-pills nav-stacked" id="menuLateral">
  <li>
    <div class="alert text-center menu_titulo"> 
      <strong><span class="glyphicon glyphicon-list-alt"></span> MENÚ</strong>
    </div>
  </li>
  <li>
    <a href="<?php echo base_url() ?>Admin_controller/panel" class="menu_admin">
      <button type="button" class="btn btn-default btnMenu">
        <div class="alert"> 
          <strong><span class="glyphicon glyphicon-user"></span> ADMINISTRADORES</strong>
        </div>
      </button>
    </a>
  </li>
  <li>
    <a href="<?php echo base_url() ?>Admin_controller/productos" class="menu_admin">
      <button type="button" class="btn btn-default btnMenu">
        <div class="alert"> 
          <strong><span class="glyphicon glyphicon-tree-deciduous"></span> PRODUCTOS</strong>
        </div>
      </button>
    </a>
  </li>
  <li>
    <a href="<?php echo base_url() ?>Admin_controller/carrousel" class="menu_admin">
      <button type="button" class="btn btn-default" id="active">
        <div class="alert"> 
          <strong><span class="glyphicon glyphicon-picture"></span> SLIDER</strong>
        </div>
      </button>
    </a>
  </li>
</ul>


    
             
          