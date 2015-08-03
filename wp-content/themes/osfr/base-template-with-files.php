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
        <?php if (Config\display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
          <?php if ( is_page( array( 'Normas Generales del OSINFOR', 'Normas Generales del Sector Forestal y de Fauna Silvestre', 'Normas para Fiscalización a Tí­tulos Habilitantes', 'Autorizaciones para el Manejo y Aprovechamiento de Fauna Silvestre Ex Situ', 'Concesiones y Autorizaciones para Aprovechamiento Forestal No Maderable', 'Concesiones y Permisos para Aprovechamiento Forestal Maderable' ) ) ) { ?>
          	<?php get_template_part('templates/nav-sidebar','normatividad'); ?>  	
          <?php }else if ( is_page( array( 'Material Publicitario' ) ) ){ ?>
          	<?php get_template_part('templates/nav-sidebar','comunicacion'); ?>
          <?php }else if ( is_page( array( 'Política Forestal y Ambiental', 'Documentos de Gestión', 'Fiscalización', 'TLC', 'CITES', 'Cupo Caoba 2008', 'Cupo Caoba 2009', 'Cupo Caoba 2010', 'Cupo Caoba 2011', 'Cupo Caoba 2011', 'Cupo Caoba 2012', 'Cupo Caoba 2013' ) ) ){ ?>
            <?php get_template_part('templates/nav-sidebar','gestion'); ?>
          <?php }else{ ?>
            <?php include Wrapper\sidebar_path(); ?>
          <?php } ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>