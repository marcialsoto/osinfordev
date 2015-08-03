<div class="page-header"><h3>Documentación</h3></div>
<p class="page-header--sub">Contamos con un enriquecido catálogo de publicaciones entre: publicaciones, revistas, boletines e intrumentos de gestión</p>

<div class="" role="tabpanel">
	<div class="wrap-tab">
	<div class="wrap__nav-tab">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#publicaciones" aria-controls="publicaciones" role="tab" data-toggle="tab">Publicaciones</a></li>
	    <li role="presentation"><a href="#instrumentos-de-gestion" aria-controls="instrumentos-de-gestion" role="tab" data-toggle="tab">Instrumentos de Gestión</a></li>
	    <li role="presentation"><a href="#revistas" aria-controls="revistas" role="tab" data-toggle="tab">Revistas</a></li>
	    <li role="presentation"><a href="#boletines" aria-controls="boletines" role="tab" data-toggle="tab">Boletines</a></li>
	  </ul>
	</div>
	</div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="publicaciones">
		<?php get_template_part('templates/slider', 'publicaciones'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="instrumentos-de-gestion">
    	<?php get_template_part('templates/slider', 'instrumentos-de-gestion'); ?>
	</div>
    <div role="tabpanel" class="tab-pane" id="revistas">
    	<?php get_template_part('templates/slider', 'revistas'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="boletines">
		<?php get_template_part('templates/slider', 'boletines'); ?>
    </div>
  </div>

</div>
