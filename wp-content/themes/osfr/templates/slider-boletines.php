<?php 
$args = array( 
	'post_type' => 'publicaciones', 
	'tax_query' => array ( array( 'taxonomy' => 'fuentes', 'field' => 'slug', 'terms' => 'boletines' ) ),
	'posts_per_page' => -1 
);
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->
	<div id="slider__boletines" class="owl-carousel slider__publicaciones">	
	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="media">
			<div class="media-left">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php if ( has_post_thumbnail() ) {?>
						<?php the_post_thumbnail( 'thumb-publicaciones', array( 'class' => 'media-object' ) ); ?>					
					<?php }else{ ?>
						<img class="media-object" alt="140x170" src="<?php bloginfo('template_directory'); ?>/dist/images/thumb-publicaciones.jpg" />
					<?php } ?>					
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading" id="media-heading"><a href="<?php the_permalink(); ?>" tile="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<?php 
					$terms = get_terms( 'autores' );


					foreach ( $terms as $term ) {

					    // The $term is an object, so we don't need to specify the $taxonomy.
					    $term_link = get_term_link( $term );
					   
					    // If there was an error, continue to the next term.
					    if ( is_wp_error( $term_link ) ) {
					        continue;
					    }

					    // We successfully got a link. Print it out.
					    echo '<a class="hidden-sm" href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
					}

				?>
				<p id="cta">
					<?php 
						$upl_pub_archivo = get_field('upl_pub_archivo');
						$link_pub_archivo = get_field('link_pub_archivo');

						if ( $upl_pub_archivo ) {
						  echo '<a href="'.$upl_pub_archivo.'" class="btn btn-primary btn-sm" target="_blank">Descargar</a>';
						} elseif ( $link_pub_archivo ) {
						  echo '<a href="'.$link_pub_archivo.'" class="btn btn-primary btn-sm" target="_blank">Descargar</a>';
						} else {
						  /* Silence is Golden */
						}
					?>
				</p>
			</div>
		</div>
	<?php endwhile; ?>
	<!-- end of the loop -->
	</div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>