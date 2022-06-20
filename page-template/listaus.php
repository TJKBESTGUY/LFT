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


          <section class="section--basic U-sec-pad section--bottom-cta bg--dark">
            <div class="U_container U_base-pad">
<div class="module--split-content">
    <div class="flx-container">


<div class="cell mosaic-split__txt split-content__txt -single-cell">
  <div class="cell_txt-content">

    <?php if ( get_field( 'lang' ) == 1 ) { ?>
      <h2>Book now</h2>
            <div class="capsule-wrap">
    <a class="btn--basic -btn-left" href="/varaa/" target="_blank">Book now ›</a>
            </div>
<?php } else { ?>
  <h2>Varaa nyt!</h2>
        <div class="capsule-wrap">
<a class="btn--basic -btn-left" href="/varaa/" target="_blank">Varaa ›</a>
        </div>
<?php } ?>




</div>
  </div>
</div>
</div>

</div>
</section>


    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
