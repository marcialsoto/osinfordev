<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'publicaciones'); ?>
<?php endwhile; ?>

<?php if ( function_exists ( 'pagination_bar' ) ) {?>
<nav>
    <?php pagination_bar(); ?>
</nav>
<?php } ?>