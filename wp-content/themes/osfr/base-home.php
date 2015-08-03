<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap slider" role="document">
		  <?php get_template_part('templates/slider', 'main'); ?>
    </div>
    <div class="wrap nav__gestion">
      <div class="gestion__nav container">
        <div class="nav-header">
          <button type="button" class="nav__gestion__btn navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse__gestion">
            <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <nav class="collapse navbar-collapse collapse__gestion">
          <?php
              if (has_nav_menu('gestion_navigation')) :
                wp_nav_menu(['theme_location' => 'gestion_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-justified']);
              endif;
              ?>
        </nav> 
      </div>
    </div>
    <div class="wrap section feeds" role="document">
      <div class="container">
        <div class="content row">
          <main class="main" role="main">
          <?php get_template_part('templates/view', 'noticias'); ?>
          </main><!-- /.main -->

          <aside class="sidebar sidebar-1" role="complementary">
          <?php dynamic_sidebar('sidebar-eventos'); ?>
          <?php get_template_part('templates/section', 'home-sidebar'); ?>
          </aside><!-- /.sidebar -->
          
          <aside class="sidebar sidebar-2" role="complementary">
          <?php get_template_part('templates/section', 'home-sidebar-2'); ?>
          </aside><!-- /.sidebar -->

        </div><!-- /.content -->
      </div>
    </div><!-- /.wrap -->

    <div class="wrap section publicaciones">
      <div class="container">
        <?php get_template_part('templates/section', 'publicaciones'); ?>
      </div>
    </div>

    <div class="wrap section multimedia" role="document">
      <div class="container">
        <?php get_template_part('templates/section', 'multimedia'); ?>
	<?php get_template_part('templates/section', 'iconos'); ?>
      </div>
    </div>
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>