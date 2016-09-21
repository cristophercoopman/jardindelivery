<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid" >
    <div class="row" >
      
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="menu1">
        <div class="navbar-header" >
          <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" id="logo"></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-5" id="menu2">
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav" >
            <li id="myNavbar"><a href="#somos" id="liMenu"><span class="glyphicon glyphicon-leaf"></span> ¿Quiénes somos?</a></li>
            <li id="myNavbar"><a href="#contacto" id="liMenu"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
          </ul>
        </div>
      </div>
    
      <div class="col-lg-6 col-md-6 col-sm-5 col-xs-10" id="menu3">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
            <form role="form" method="post" action="<?php echo base_url();?>Welcome/buscar">
              <div class="input-group" id="buscador">
                <span class="input-group-btn">
                  <button class="btn btn-success" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
                <input type="text" id="texto" name="texto" class="form-control"> 
              </div>
            </form>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-2 col-xs-2 text-right" style="margin-top: 10px;">
            <a href="#" style="color: grey;" id="modalloginbtn">admin</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</nav>    