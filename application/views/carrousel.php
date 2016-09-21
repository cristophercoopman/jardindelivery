<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
 
  <div class="carousel-inner" role="listbox" >
    <?php if(!empty($carrousel)){ $cont=0; foreach ($carrousel as $key) { 
      if($cont == 0){ ?>
    <div class="item active">
      <?php }else{ ?>
    <div class="item">
    <?php } ?>
      <img src="<?php echo base_url() ?>assets/img/carrousel/<?php echo $key->imagen?>" alt="Chania" id="imgCarrousel" >
      <div class="carousel-caption" style="font-size: 20px;">
        <h3><?php echo $key->titulo?></h3>
        <p><?php echo $key->texto?></p>
      </div>
    </div>

    <?php $cont++;} } ?>
    
    
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>