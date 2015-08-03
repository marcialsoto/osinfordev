<?php 
	$pcf_term = get_field('pcf_term');
?>

<?php 
$args = array( 
	'post_type' => 'Documentos', 
	'tax_query' => array ( array( 'taxonomy' => 'tipos', 'field' => 'slug', 'terms' => $pcf_term ) ),
	'posts_per_page' => -1 
);

// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->
<div class="panel panel-default">
  <!-- Default panel contents -->
	<div class="panel-heading">Documentos</div>
		 <table class="table table-hover table-condensed">
		 	<thead>
          <tr>
            <th>Archivo</th>
            <th>Fecha</th>
            <th>Link</th>
          </tr>
        </thead>
		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php $nrm_compl = get_field('nrm_compl'); $doc_type = get_field('doc_type'); ?>
			<tr>
			<td>
				<?php if( $nrm_compl ) { ?>
					<span class="label label-default">Norma Complementaria</span>
				<?php } ?>
				<h5><i class="fa fa-file-<?php echo $doc_type; ?>-o"></i> <?php the_title(); ?></h5>
			</td>
			<td><?php get_template_part('templates/entry-meta'); ?></td>
			<td><?php the_content(); ?></td>
			</tr>
		<?php endwhile; ?>
		<!-- end of the loop -->
		</table>
	</div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php /* Silence is Golden */ ?></p>
<?php endif; ?>