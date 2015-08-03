<?php 
	global $post;

	$autores = get_the_terms( $post->ID, 'autores' );
	$temas = get_the_terms( $post->ID, 'temas' );
	$anos = get_the_terms( $post->ID, 'anos' );
	$lenguajes = get_the_terms( $post->ID, 'lenguajes' );

	$upl_pub_archivo = get_field('upl_pub_archivo');
	$link_pub_archivo = get_field('link_pub_archivo');
?>

<article <?php post_class(); ?>>
  <header>
  	<div class="media">
		<div class="media-left">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php if ( has_post_thumbnail() ) {?>
					<?php the_post_thumbnail( 'thumb-publicaciones', array( 'class' => 'media-object' ) ); ?>					
				<?php }else{ ?>
					<img class="media-object" alt="140x170" src="<?php bloginfo('template_directory'); ?>/dist/images/thumb-publicaciones.jpg" />
				<?php } ?>		
			</a>
				<?php if ( $upl_pub_archivo ){ ?>	
					<a href="<?php echo $upl_pub_archivo; ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> Descargar</a>
				<?php }else if ( $link_pub_archivo ){ ?>
					<a href="<?php echo $link_pub_archivo; ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> Descargar</a>
				<?php }else{ ?>	
					<a href="#" class="btn btn-block btn-primary btn-sm" disabled="disabled"><i class="fa fa-download"></i> No Disponible</a>
				<?php } ?>			
		</div>
		<div class="media-body ">
			<div class="panel panel-default">
					<div class="panel-heading"><h4 class="entry-title media-heading"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4></div>
						<table class="table table-condensed">
						<?php if (is_array($autores) || is_object($autores)) { ?>
						<tr>
						<th>Autor(es):</th>
						<td>
						<?php 

						foreach ( $autores as $autor ) { 
						$term_link = get_term_link( $autor );
						if ( is_wp_error( $term_link ) ) {
						continue;
						}
						echo '<a class="hidden-sm" href="' . esc_url( $term_link ) . '">' . $autor->name . '</a>';
						}

						?>
						</td>
						</tr>
						<?php } ?>
						</table>


				</div>

				<?php the_excerpt(); ?>
		</div>
  </div>
</header>
</article>