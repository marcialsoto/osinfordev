<section class="widget">
	<h3>Nosotros</h3>
    <?php
	if (has_nav_menu('nosotros_navigation')) :
		wp_nav_menu(['theme_location' => 'nosotros_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>