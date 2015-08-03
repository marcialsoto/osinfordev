<article <?php post_class(); ?>>
	<header>
    	<h4 class="entry-title" style='font-size:12px;text-align:justify;'><?php the_title(); ?></h4>
		<time class="updated" datetime="<?= get_the_time('c'); ?>">Fecha de Publicación: <?= get_the_date(); ?></time>
<?php //get_template_part('templates/entry-meta'); ?>
	</header>
	<div class="entry-summary"><?php the_content(); ?></div>
</article>