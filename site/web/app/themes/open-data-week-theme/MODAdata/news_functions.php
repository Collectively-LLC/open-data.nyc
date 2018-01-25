<?php
function moda_display_news( $type='news' ) {

$slides = moda_get_items($type);
if(count($slides)>0) {
?>
	
<div id="carousel<?=$type?>" class="carousel slide carousel-showmany">
  <div class="carousel-inner row">

<?php 
$n=0;
$active = 'active';
foreach ($slides as $id => $slide) { 
  $slidemeta = allmeta($id);
?>

    <div class="carousel-item col-md-4 <?=$active?>"><div>
      <div class="image" style="background-image: url(<?=get_the_post_thumbnail_url( $id )?>);"></div>
      <h6 class="font-weight-bold black text-uppercase"><?=get_the_title($id);?></h6>
      <p><?=$slidemeta[cmb_pre().'description'] ?></p>
      <?php if(array_key_exists(cmb_pre().'url',$slidemeta)) { ?>
        <a href="<?=$slidemeta[cmb_pre().'url']?>" class="button rounded white"><?=$slidemeta[cmb_pre().'button']?></a> 
      <?php } ?>
    </div></div>

<?php
  $active='';
} // end foreach $slides
?>

  </div>
  <a class="carousel-control carousel-control-prev" href="#carousel<?=$type?>" role="button" data-slide="prev">
    <span class="carousel-control-icon carousel-control-prev-icon" aria-hidden="true">&#9664;</span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control carousel-control-next" href="#carousel<?=$type?>" role="button" data-slide="next">
    <span class="carousel-control-icon carousel-control-next-icon" aria-hidden="true">&#9654;</span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php 
} // end if slides

} // end function 
?>
