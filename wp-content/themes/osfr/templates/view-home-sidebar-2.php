<?php 
$args = array( 'post_type' => 'banners', 'posiciones' => 'home-sidebar-2', 'posts_per_page' => 4 );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->
<ul class="list-unstyled banner">
	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<li class="banner__item">
			<?php 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
				$link = get_field('link');
				$target = get_field('target');
			?>
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php if( $link ) { echo $link; }; ?>" target="<?php if( $target ) { echo $target; }; ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'full', array( 'class' => "img-responsive" ) ); ?>
				</a>
			<?php } ?>
		</li>
	<?php endwhile; ?>
	<!-- end of the loop -->
</ul>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>