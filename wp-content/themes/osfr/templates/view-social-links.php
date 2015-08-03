<div class="page-header">
		<h4>Conectémonos</h4>
		<?php
			if (has_nav_menu('social_navigation')) :
				wp_nav_menu(['theme_location' => 'social_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
			endif;
		?>
</div>