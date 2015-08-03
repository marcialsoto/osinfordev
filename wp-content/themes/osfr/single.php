<?php if (in_category('notas-de-prensa')) {
    include(TEMPLATEPATH . '/single-news.php');
} elseif (in_category('noticias')) {
    include(TEMPLATEPATH . '/single-news.php');
} else { 
    include(TEMPLATEPATH . '/single-default.php');
} ?>