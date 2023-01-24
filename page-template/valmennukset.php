<?php
   /*
   Template Name: Luennot
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">







      <?php $header_image = get_field( 'header_image' ); ?>





      <?php locate_template('src/parts/global/main-page-loop.php', true, true); ?>














    </main><!-- #main -->
  </div><!-- #primary -->





<?php get_footer();
