<article <?php post_class(); ?>>
	<div class="media">
<?php if (has_post_thumbnail( $post->ID ) ){ ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<header class="media-left">
			<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $image[0]; ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
				<span><?php the_title(); ?></span>
			</a>
		</header>
<?php } ?>
		<div class="media-body ">
            <h4 class="media-heading entry-title" style='font-size:14px;height:14px;'>
            <a href="<?php the_permalink(); ?>" target="_blank"><b><?php the_excerpt(); ?></b></a></h4>
            <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
			<div style='height:96px;overflow:hidden;padding-top:4px;margin-top:4px;margin-bottom:4px;text-align:justify;' class="entry-summary"><?php the_short_title( 220, '...' ); ?></div>
            <a href="<?php the_permalink(); ?>" class="read-more" target="_blank">Leer más <i class="fa fa-angle-double-right"></i></a>
		</div>
	</div>
</article>