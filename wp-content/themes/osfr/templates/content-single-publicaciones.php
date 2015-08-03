<?php while (have_posts()) : the_post(); ?>	  			
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
					<?php if ( has_post_thumbnail() ) {?>
						<?php the_post_thumbnail( 'thumb-publicaciones', array( 'class' => 'media-object' ) ); ?>					
					<?php }else{ ?>
						<img class="media-object" alt="140x170" src="<?php bloginfo('template_directory'); ?>/dist/images/thumb-publicaciones.jpg" />
					<?php } ?>		
					
					<?php if ( $upl_pub_archivo ){ ?>	
						<a href="<?php echo $upl_pub_archivo; ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> Descargar</a>
					<?php }else if ( $link_pub_archivo ){ ?>
						<a href="<?php echo $link_pub_archivo; ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> Descargar</a>
					<?php }else{ ?>	
						<a href="#" class="btn btn-block btn-primary btn-sm" disabled="disabled"><i class="fa fa-download"></i> No Disponible</a>
					<?php } ?>			
			</div>

		<div class="media-body">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="entry-title media-heading"><?php the_title(); ?></h4></div>
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

					<?php if (is_array($temas) || is_object($temas)) { ?>
					<tr>
					<th>Temas:</th>
					<td>
					<?php 
					echo '<ul class="list-inline">';
					foreach ( $temas as $tema ) { $term_link = get_term_link( $tema );
					if ( is_wp_error( $term_link ) ) {
					continue;
					}
					echo '<li><a class="hidden-sm" href="' . esc_url( $term_link ) . '">' . $tema->name . '</a></li>';
					}
					echo '</ul>';
					?>
					</td>
					</tr>
					<?php } ?>

					<?php if (is_array($anos) || is_object($anos)) { ?>
					<tr>
					<th>Año:</th>
					<td>
					<?php 
					echo '<ul class="list-inline">';
					foreach ( $anos as $ano ) { $term_link = get_term_link( $ano );
					if ( is_wp_error( $term_link ) ) {
					continue;
					}
					echo '<li><a class="hidden-sm" href="' . esc_url( $term_link ) . '">' . $ano->name . '</a></li>';
					}
					echo '</ul>';
					?>
					</td>
					</tr>
					<?php } ?>

					<?php if (is_array($lenguajes) || is_object($lenguajes)) { ?>
					<tr>
					<th>Idioma:</th>
					<td>
					<?php 
					echo '<ul class="list-inline">';
					foreach ( $lenguajes as $lenguaje ) { $term_link = get_term_link( $lenguaje );
					if ( is_wp_error( $term_link ) ) {
					continue;
					}
					echo '<li><a class="hidden-sm" href="' . esc_url( $term_link ) . '">' . $lenguaje->name . '</a></li>';
					}
					echo '</ul>';
					?>
					</td>
					</tr>
					<?php } ?>
					</table>
			</div>
		<?php the_content(); ?>	
		</div>
	  	</div>

    </header>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php /*comments_template('/templates/comments.php');*/ ?>
  </article>
<?php endwhile; ?>