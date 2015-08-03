<?php
	// Variables de la convocatoria
	$cnv_proc = get_field('cnv_proc');
	$cnv_proc_url = get_field('cnv_proc_url');
	$cnv_eva_cv = get_field('cnv_eva_cv');
	$cnv_eva_cv_url = get_field('cnv_eva_cv_url');
	$cnv_eva_cv_res = get_field('cnv_eva_cv_res');
	$cnv_eva_con = get_field('cnv_eva_con');
	$cnv_eva_con_url = get_field('cnv_eva_con_url');
	$cnv_eva_con_res = get_field('cnv_eva_con_res');
	$cnv_res_fin = get_field('cnv_res_fin');
	$cnv_res_fin_url = get_field('cnv_res_fin_url');
	$cnv_res_fin_res = get_field('cnv_res_fin_res');

	$bases = get_field('bases');
	$bases_url = get_field('bases_url');
	$cronograma = get_field('cronograma');
	$cronograma_url = get_field('cronograma_url');
	$formatos = get_field('formatos');
	$formatos_url = get_field('formatos_url');
	$ficha = get_field('ficha');
	$ficha_url = get_field('ficha_url');

	$cnv_eva_cv_res_date = DateTime::createFromFormat('Ymd', $cnv_eva_cv_res);
	$cnv_eva_con_res_date = DateTime::createFromFormat('Ymd', $cnv_eva_con_res);
	$cnv_res_fin_res_date = DateTime::createFromFormat('Ymd', $cnv_res_fin_res);

	global $post;
?>
<?php /*$terms = wp_get_post_terms( $post->ID, 'estado');
			foreach($terms as $term) {
			          echo "<p><span class='label label-default'><a href='" . get_term_link($term) . "' title='" . $term->name . "'>" . $term->name . "</a></span></p>";
			} */ 
?>

<?php $estado = ''; ?>

<?php $terms = wp_get_post_terms( $post->ID, 'estado');
	foreach($terms as $term) {
	          $estado = $term->name;
	}  
?>


<article <?php post_class('table'); ?>>
<?php if ( $estado == 'Resueltas' ) {?>
<div class="panel panel-success">
<?php }else{ ?>
<div class="panel panel-default">
<?php } ?>
	<div class="panel-heading">
		
		<?php the_title(); ?> 
		<span class="badge pull-right">
			<?php foreach($terms as $term) {
			          echo "<a href='" . get_term_link($term) . "' title='" . $term->name . "'>" . $term->name . "</a>";
			}?>
		</span>
		
		<?php get_template_part('templates/entry-meta'); ?>
		<ul class="list-inline">
		<li>
    		<?php if ( $cnv_proc ){ ?>
    			<a href="<?php echo $cnv_proc; ?>" target="_blank">Proceso</a>
    		<?php } elseif ( $cnv_proc_url ) { ?>
    			<a href="<?php echo $cnv_proc_url; ?>" target="_blank">Proceso</a>
    		<?php } else{ ?>
    			<span class="text-muted">Proceso</span>
    		<?php } ?>
    	</li>
    	<li>
    		<?php if ( $bases ){ ?>
    			<a href="<?php echo $bases; ?>" target="_blank">Bases</a>
    		<?php } elseif ( $bases_url ) { ?>
    			<a href="<?php echo $bases_url; ?>" target="_blank">Bases</a>
    		<?php } else{ ?>
    			<span class="text-muted">Base</span>
    		<?php } ?>
    	</li>
    	<li>
    		<?php if ( $cronograma ){ ?>
    			<a href="<?php echo $cronograma; ?>" target="_blank">Cronograma</a>
    		<?php } elseif ( $cronograma_url ) { ?>
    			<a href="<?php echo $cronograma_url; ?>" target="_blank">Cronograma</a>
    		<?php } else{ ?>
    			<span class="text-muted">Cronograma</span>
    		<?php } ?>
    	</li>
    	<li>
    		<?php if ( $formatos ){ ?>
    			<a href="<?php echo $formatos; ?>" target="_blank">Formatos</a>
    		<?php } elseif ( $formatos_url ) { ?>
    			<a href="<?php echo $formatos_url; ?>" target="_blank">Formatos</a>
    		<?php } else{ ?>
    			<span class="text-muted">Formatos</span>
    		<?php } ?>
    	</li>
    	<li>
    		<?php if ( $ficha ){ ?>
    			<a href="<?php echo $ficha; ?>" target="_blank">Ficha</a>
    		<?php } elseif ( $ficha_url ) { ?>
    			<a href="<?php echo $ficha_url; ?>" target="_blank">Ficha</a>
    		<?php } else{ ?>
    			<span class="text-muted">Ficha</span>
    		<?php } ?>
    	</li>
    </ul>
	</div>

  <header>
    
  </header>
  <div class="entry-summary">
    <?php the_content(); ?>
  </div>
  <table class="table">
  	<tr>
  		<th>Evaluación Curricular</th>
  		<th>Evaluación de Conocimientos</th>
  		<th>Resultado Final</th>
  	</tr>
  	<tr>
  		<td>
  			<?php if ( $cnv_eva_cv ){ ?>
    			<a href="<?php echo $cnv_eva_cv; ?>" target="_blank">Resultado</a>
    		<?php } elseif ( $cnv_eva_cv_url ) { ?>
    			<a href="<?php echo $cnv_eva_cv_url; ?>" target="_blank">Resultado</a>
    		<?php } else{ ?>
    			<span class="text-muted">
    				<?php if( $cnv_eva_cv_res ){
    					echo 'Publicación: '. $cnv_eva_cv_res_date->format('d-m-Y'); 
    				} ?>
    			</span>
    		<?php } ?>
  		</td>
  		<td>
  			<?php if ( $cnv_eva_con ){ ?>
    			<a href="<?php echo $cnv_eva_con; ?>" target="_blank">Resultado</a>
    		<?php } elseif ( $cnv_eva_con_url ) { ?>
    			<a href="<?php echo $cnv_eva_con_url; ?>" target="_blank">Resultado</a>
    		<?php } else{ ?>
    			<span class="text-muted">
    				<?php if( $cnv_eva_con_res ){
    					echo 'Publicación: '. $cnv_eva_con_res_date->format('d-m-Y');
    				} ?>
    			</span>
    		<?php } ?>
  		</td>
  		<td>
  			<?php if ( $cnv_res_fin ){ ?>
    			<a href="<?php echo $cnv_res_fin; ?>" target="_blank">Resultado</a>
    		<?php } elseif ( $cnv_res_fin_url ) { ?>
    			<a href="<?php echo $cnv_res_fin_url; ?>" target="_blank">Resultado</a>
    		<?php } else{ ?>
    			<span class="text-muted">
    				<?php if( $cnv_res_fin_res ){
    					echo 'Publicación: '. $cnv_res_fin_res_date->format('d-m-Y');
    				} ?>
    			</span>
    		<?php } ?>
  		</td>
  	</tr>
  </table>
</div>
</article>