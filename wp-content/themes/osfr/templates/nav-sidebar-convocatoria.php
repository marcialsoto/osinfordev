<section class="widget">
	<h3>En estados</h3>
    <?php
	if (has_nav_menu('convocatoria_navigation')) :
		wp_nav_menu(['theme_location' => 'convocatoria_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>