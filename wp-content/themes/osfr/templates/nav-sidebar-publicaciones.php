<section class="widget">
	<h3>Publicaciones</h3>
    <?php
	if (has_nav_menu('publicaciones_navigation')) :
		wp_nav_menu(['theme_location' => 'publicaciones_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>