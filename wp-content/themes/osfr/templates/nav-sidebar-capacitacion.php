<section class="widget">
	<h3>Capacitación</h3>
    <?php
	if (has_nav_menu('capacitacion_navigation')) :
		wp_nav_menu(['theme_location' => 'capacitacion_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>