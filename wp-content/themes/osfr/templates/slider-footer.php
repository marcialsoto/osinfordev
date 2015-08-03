<?php 
$args = array( 'post_type' => 'banners', 'posiciones' => 'Footer', 'orderby' => 'ID', 'order'   => 'ASC', 'posts_per_page' => -1 );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
<div id="slider__footer" class="owl-carousel">
	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
		$link = get_field('link');
		$target = get_field('target');
	?>
	<div class="item banner owl-lazy" data-src="<?php echo $image[0]; ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php if( $link ) { echo $link; }; ?>" target="<?php if( $target ) { echo $target; }; ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		<?php } ?>
	</div>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->
</div>
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>