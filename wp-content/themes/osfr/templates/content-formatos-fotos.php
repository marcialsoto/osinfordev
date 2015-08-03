<article <?php post_class(); ?>>
	<div class="thumbnail-wrapper">
		<div class="thumbnail">
			<figure class="gallery-image">
			<?php

				global $post;

				$args = array(
					'post_type' => 'attachment',
					'numberposts' => 1,
					'orderby' => 'ID',
					'order' => 'ASC',
					'post_status' => null,
					'post_parent' => $post->ID
				);

				$attachments = get_posts( $args );
				
				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						echo '<a class="gallery-thumbnail" href="';
						the_permalink();
						echo '">';
						echo wp_get_attachment_image( $attachment->ID, 'full', '' , array('class'=>'img-responsive') );
						echo '<i class="fa fa-file-image-o"></i></a>';
					}
				}				
			?>
			</figure>
			<header class="caption">
			<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<?php get_template_part('templates/entry-meta'); ?>
			</header>
		</div>
	</div>
</article>