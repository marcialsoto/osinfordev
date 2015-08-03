<?php 
$args = array( 'post_type' => 'post', 'tag__not_in' => array('10'), 'posts_per_page' => 3 );
// the query
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<!-- pagination here -->
<div class="noticias">
	<div class="page-header">
		<h3>Noticias<a class="pull-right" href="<?php echo bloginfo( 'url' ); ?>/category/notas-de-prensa"><small>Ver todas <i class="fa fa-angle-double-right"></i></small></a></h4>
	</div>
	<ul class="media-list">
		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<li class="media" style="margin-bottom:30px;">
				<?php if (has_post_thumbnail( $post->ID ) ){ ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div class="media-left">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo $image[0]; ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
						<span><?php the_title(); ?></span>
					</a>
				</div>
				<?php } ?>
				<div class="media-body">
					<div class="media-info">
						<?php get_template_part('templates/entry-meta'); ?>
					</div>
					<h4 class="media-heading" style="text-align:justify;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_short_title( 170, '...' ); ?>
						</a>
					</h4>
					<div class="entry-summary">
					    <a href="<?php the_permalink(); ?>" class="read-more">Leer más <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>	
			</li>
		<?php endwhile; ?>
		<!-- end of the loop -->
	</ul>
</div>
<!-- pagination here -->
<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>