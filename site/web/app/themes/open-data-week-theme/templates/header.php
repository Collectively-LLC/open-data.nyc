<?php 
$custom_logo_id = get_theme_mod( 'custom_logo' );
if (wp_get_attachment_image_src( $custom_logo_id , 'full' )) {
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  $logo_bg = $image[0];
}
?>

<header class="banner">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?=$logo_bg?>" alt="<?=get_bloginfo('name');?>" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar-collapse" aria-controls="main-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <nav class="navbar navbar-expand-lg navbar-light nav-primary align-self-end">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'nav navbar-nav', 
            'container' => 'div', 
            'container_id' => 'main-navbar-collapse', 
            'container_class' => 'collapse navbar-collapse navbar-toggleable-lg  align-items-right',
            'echo'              => true,
            'fallback_cb'       => 'wp_page_menu',
            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'             => 1,
            'walker'            => new wp_bootstrap_navwalker()
            /* http://josephfitzsimmons.com/making-wp_nav_menu-work-with-bootstrap-3s-navbar */
            ]);
        endif;
        ?>
      </nav>
    </div>
  </div>
</header>

<?
$intro = get_option('intro_details');
?>
<div id="intro" class="section-intro row align-items-center">
      <div class="row">
        <h3 class="line hashtag">&nbsp;</h3>
      </div>
  <div class="container-fluid circles-above circles-white circles-hig">
    <div class="container">
      <div class="row">
        <h3 class="line one"><?= $intro[cmb_pre().'line_one']; ?></h3>
        <h3 class="line two"><?= $intro[cmb_pre().'line_two']; ?></h3>
        <h3 class="line three"><?= $intro[cmb_pre().'line_three']; ?></h3>
      </div>
    </div>
  </div>
      <div class="row">
        <h3 class="line hashtag"><?= $intro[cmb_pre().'line_hashtag']; ?></h3>
      </div>
</div>


