<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
		<?php if ( has_post_thumbnail() ) { 
      echo '<figure>';
			 the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); 
      echo '</figure>';
		} ?>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php get_template_part('templates/entry-meta', 'news'); ?>
      <?php get_template_part('templates/sharing', 'single'); ?>
    </footer>
  </article>
<?php endwhile; ?>
