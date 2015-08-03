<?php use Roots\Sage\Titles; ?>
<?php global $post; ?>
<?php if (has_post_thumbnail( $post->ID ) ){ ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="page-header"  style="background: url('<?php echo $image[0]; ?>')  no-repeat top left; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
<?php } else{ ?>
<div class="page-header">
<?php } ?>
  <h1>
    <?= Titles\title(); ?>
  </h1>
</div>
