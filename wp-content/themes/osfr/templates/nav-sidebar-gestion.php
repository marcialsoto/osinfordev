<section class="widget">
	<h3>Gestión</h3>
    <?php
	if (has_nav_menu('gestion_navigation')) :
		wp_nav_menu(['theme_location' => 'gestion_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>