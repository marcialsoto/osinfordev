<?php 
$args = array( 'post_type' => 'galerias', 'formatos' => 'fotos', 'posts_per_page' => 1 );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<div class="page-header">
		<h4>Última Galería de Fotos</h4>
	</div>

		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="photo-content">
				<div class="photo-img">
					<?php

						global $post;

						$args = array(
							'post_type' => 'attachment',
							'numberposts' => 2,
							'orderby' => 'ID',
							'order' => 'ASC',
							'post_status' => null,
							'post_parent' => $post->ID
						);

						$attachments = get_posts( $args );
						
						if ( $attachments ) {
							foreach ( $attachments as $attachment ) {
								echo '<a href="';
								the_permalink();
								echo '">';
								echo wp_get_attachment_image( $attachment->ID, 'full', '' , array('class'=>'img-responsive') );
								echo '</a>';
							}
						}				
					?>
				</div>
				<div class="photo-body">
					<?php get_template_part('templates/entry-meta'); ?>
					<h4 class="media-heading">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h4>
					<div class="media-info">
						<p><a href="<?php echo bloginfo('url'); ?>/formatos/fotos">Más fotos  <i class="fa fa-angle-double-right"></i></a>
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