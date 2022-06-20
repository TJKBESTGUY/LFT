<?php
   /*
   Template Name: Vinkit
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>









          <section class="section--basic U-sec-pad bg--nude">
                    <div class="U_container U_base-pad U_container--article">

                      <?php if ( have_rows( 'header_block' ) ) : ?>
	<?php while ( have_rows( 'header_block' ) ) : the_row(); ?>
      <div class="module--heading_txt heading-txt--page-start">
        <div class="heading-content">
        <div class="heading">
		<h1><?php the_sub_field( 'header' ); ?></h1>
          </div>
              <div class="heading-p">
		<p><?php the_sub_field( 'text_content' ); ?></p>
      </div>
  </div>
</div>
	<?php endwhile; ?>
<?php endif; ?>


<?php if ( have_rows( 'vinkit_block' ) ) : ?>
	<?php while ( have_rows( 'vinkit_block' ) ) : the_row(); ?>
        <div class="module--content-block--vinkit">
            <div class="vinkit__heading">
		<h2><?php the_sub_field( 'heading' ); ?></h2>
          </div>
              <div class="vinkit__txt-content">
		<?php the_sub_field( 'content' ); ?>
          </div>
      </div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>






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
