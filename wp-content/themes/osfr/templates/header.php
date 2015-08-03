<?php
  // Incluye el nav walker de BT: https://gist.github.com/retlehs/1b49f6c00d5140962d56
?>
<header class="super__nav banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="super__nav__btn navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse__super">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="header__logo">
        <h1 class="logo">
          <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
        </h1>
      </div>
      
    </div>
 
    <nav class="collapse navbar-collapse collapse__super" role="navigation">
      <div class="navbar-form navbar-search navbar-left">
            <?php $echo = true; get_search_form( $echo ); ?>
            <?php
            if (has_nav_menu('social_navigation')) :
              wp_nav_menu(['theme_location' => 'social_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'social__nav list-inline']);
            endif;
            ?>
      </div>
      <div class="navbar-right">
      <?php
      if (has_nav_menu('super_navigation')) :
        wp_nav_menu(['theme_location' => 'super_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </div>
    </nav>
  </div>
</header>

<header class="main__nav banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse__main">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <nav class="collapse navbar-collapse collapse__main" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
  </div>
</header>