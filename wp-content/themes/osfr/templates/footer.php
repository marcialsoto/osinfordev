<div class="pre__footer">
	<div class="container">
		<?php get_template_part('templates/slider', 'footer'); ?>
	</div>
</div>
<footer class="content-info" role="contentinfo">
    <div class="footer__brand">
		<div class="container">
	    	<div class="footer__logo">
	    		<div class="row">
				<h1 class="logo">
					<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
				</h1>
				</div>
				<div class="row">
					<?php
						if (has_nav_menu('social_navigation')) :
							wp_nav_menu(['theme_location' => 'social_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'social__nav list-inline']);
						endif;
					?>
				</div>
				
	    	</div>
			<div class="footer__sidedar footer-1">
				<?php get_template_part('templates/nav-sidebar','nosotros'); ?>
			</div>
			<div class="footer__sidedar footer-2">
				<?php get_template_part('templates/nav-sidebar','normatividad'); ?>
			</div>
			<div class="footer__sidedar footer-3">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
	    </div>
    </div>
	
	<div class="inst__logo">
		<div class="container">
			<div class="logo">
				<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
			</div>
		</div>
	</div>
</footer>
