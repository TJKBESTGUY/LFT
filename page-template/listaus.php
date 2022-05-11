<?php
   /*
   Template Name: Listaus
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>


      <section class="section--basic U-sec-pad">
                <div class="U_container U_base-pad U_container--article">
                  <div class="module--basic-article">


      <?php
      if ( have_posts() ):
        while ( have_posts() ) : the_post();
          the_content();
        endwhile; // End of the loop.

      endif;
      ?>

                  </div>
    </div>
          </section>


    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
