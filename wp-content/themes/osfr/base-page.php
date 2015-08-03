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
          <?php if ( is_page( array( 'Contacto', 'Libro de Reclamaciones' ) ) ) { ?>
            <?php dynamic_sidebar('sidebar-contacto'); ?>
          <?php } elseif ( is_page( array( 'Quienes Somos', 'Visión y Misión', 'Funciones', 'Organigrama', 'Directorio' ) ) ) { ?>
            <?php get_template_part('templates/nav-sidebar','nosotros'); ?>
          <?php } elseif ( is_page( array( 'Capacitación' ) ) ) { ?>
            <?php get_template_part('templates/nav-sidebar','capacitacion'); ?>
          <?php } elseif ( is_page( array( 'Normatividad', 'Normas para Supervisión a Tí­tulos Habilitantes' ))) { ?>
            <?php get_template_part('templates/nav-sidebar','normatividad'); ?>
          <?php } elseif ( is_page( array( 'Comunicación', 'Campañas Propagandísticas', 'Audiovisual/Radio/TV' ))) { ?>
            <?php get_template_part('templates/nav-sidebar','comunicacion'); ?>
          <?php } elseif ( is_page( array( 'Concesiones Forestales', 'Permisos y Autorizaciones', 'Servicios Ambientales', 'Biodiversidad', 'Tala Ilegal', 'Aportes al desarrollo', 'Ecosistemas de Aguajales', 'Supervisión', 'Fiscalización', 'Glosario de Términos', 'Resolución Directoral', 'Acuerdos', 'Articulación de la CITES en el Perú', 'Gestión CITES', 'Supervisiones ejecutadas por el OSINFOR', 662 ))) { ?>
            <?php get_template_part('templates/nav-sidebar','gestion'); ?>
          <?php } else { ?>
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