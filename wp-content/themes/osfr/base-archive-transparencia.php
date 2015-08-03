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
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main" role="main">
          <div class="inner">
            <?php include Wrapper\template_path(); ?>
          </div>
        </main><!-- /.main -->
          <aside class="sidebar" role="complementary">
          	<section class="widget">
          	<h3>Documentos</h3>
	            <?php
				if (has_nav_menu('transparencia_navigation')) :
					wp_nav_menu(['theme_location' => 'transparencia_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
				endif;
				?>
			</section>
          </aside><!-- /.sidebar -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>