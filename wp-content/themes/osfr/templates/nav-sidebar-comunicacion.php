<section class="widget">
	<h3>Normatividad</h3>
    <?php
	if (has_nav_menu('comunicacion_navigation')) :
		wp_nav_menu(['theme_location' => 'comunicacion_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>