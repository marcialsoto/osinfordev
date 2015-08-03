<article <?php post_class(); ?>>
	<div class="thumbnail-wrapper">
		<div class="thumbnail">
			<?php if ( has_post_thumbnail() ) { ?>
				<figure class="video-img">
					<a class="gallery-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( '', array( 'class' => 'img-responsive' ) ); ?>
						<i class="fa fa-play-circle"></i>
					</a>
				</figure>
				<?php } ?>
			<header class="caption">
			<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<?php get_template_part('templates/entry-meta'); ?>
			</header>
		</div>
	</div>
</article>