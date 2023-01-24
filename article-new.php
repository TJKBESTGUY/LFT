<?php
/**
 * Template Name: Article new
 * Template Post Type: post
 *

 *
 * @package Lifted
 * @since 1.0
 * @version 1.0
 */

 get_header(); ?>

     <div id="primary" class="content-area">
         <main id="main" class="site-main" role="main">
           <!-- <div class="U-nav-spacer">

           </div> -->
           <article class="single-post">

 	        <?php
 	        if ( have_posts() ):
 		        while ( have_posts() ) : the_post();
 	           locate_template('src/parts/global/main-page-loop.php', true, true);
 		        endwhile; // End of the loop.

 	        endif;
 	        ?>
                 </article>


         </main><!-- #main -->
     </div><!-- #primary -->



 <?php get_footer();
