<?php
	$temp = $wp_query;
	$wp_query = null;
	$args = array('tax-query'=>array('taxonomy'=>'category','field'=>'slug','terms'=>'Notas de Prensa'));
	$wp_query = new WP_Query();
	$wp_query->query('orderby=post_date&order=DESC&post_type=post&category_name=Notas de Prensa'.'&paged='.$paged);
?>
<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
	<div class="alert alert-warning"><?php _e('Lo sentimos, No se han encontrado resultados de su búsqueda.', 'sage'); ?></div>
<?php get_search_form(); ?>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/content', 'category-notas-de-prensa'); ?>
<?php endwhile; ?>
<?php if ( function_exists ( 'pagination_bar' ) ) {?>
	<nav><?php pagination_bar(); ?></nav>
<?php } ?>