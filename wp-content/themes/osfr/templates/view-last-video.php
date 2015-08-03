<?php 
$args = array( 'post_type' => 'galerias', 'formatos' => 'videos', 'posts_per_page' => 1 );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<div class="page-header">
		<h4>Video del Día</h4>
	</div>

		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="video-content">
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="video-img">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'thumb-last-video', array( 'class' => 'img-responsive' ) ); ?>
					</a>
				</div>
				<?php } ?>
				<div class="video-body">
					<?php get_template_part('templates/entry-meta'); ?>
					<h4 class="media-heading">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h4>
					<div class="media-info">
						<p><a href="<?php echo bloginfo('url'); ?>/formatos/videos">Más videos  <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>	
			</div>
		<?php endwhile; ?>
		<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>