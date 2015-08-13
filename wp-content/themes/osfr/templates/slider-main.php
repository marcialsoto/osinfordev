<?php 
// argumentos
$post_args = array( 'post_type' => 'post', 'category_name' => 'destacado', 'posts_per_page' => -1 );
$docs_args = array( 'post_type' => 'documentos', 'tipos' => 'Destacado', 'posts_per_page' => -1 );

// the query
$post_query = new WP_Query( $post_args ); 
$docs_query = new WP_Query( $docs_args ); 
$result = new WP_Query();

// start putting the contents in the new object
$result->posts = array_merge( $post_query->posts, $docs_query->posts );
$result->post_count = count( $result->posts );
?>

<?php if ( $result->have_posts() ) : ?>

	<!-- pagination here -->
<div id="slider__main" class="owl-carousel">
	<!-- the loop -->
	<?php while ( $result->have_posts() ) : $result->the_post(); ?>
		<div class="item">
		<?php 
			// ACF de los slides
			$sl_aviso = get_field('sl_aviso');
		?>

		<a href="<?php the_permalink(); ?>">
			<?php if (has_post_thumbnail( $post->ID ) ){ ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img class="owl-lazy" data-merge="2" data-src="<?php echo $image[0]; ?>" alt="">
			<?php } else { ?>
					<img class="owl-lazy" data-merge="2" data-src="<?php echo bloginfo('template_directory'); ?>/dist/images/sl_default_thumb.jpg" alt="">
			<?php } ?>
		</a>
		<?php if ($sl_aviso != 1) {?>

				<article class="animated fadeIn">
					<div class="post-header">
						<h1 property="dc:title" datatype="" class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</div>
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div>
				</article>
		<?php } ?>
			</div>
	<?php endwhile; ?>
	<!-- end of the loop -->
</div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>