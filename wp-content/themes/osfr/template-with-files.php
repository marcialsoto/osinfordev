<?php
/**
 * Template Name: Página con files
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page-with-files'); ?>
<?php endwhile; ?>