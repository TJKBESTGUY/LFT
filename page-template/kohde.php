<?php
   /*
   Template Name: Kohde
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>

      <?php $header_image = get_field( 'header_image_kohde' ); ?>


      <section class="section--full-header">
        <div class="module--bg-img">
          <picture>
            <source media="(min-width:650px)" data-srcset="<?php echo $header_image['url']; ?>">
              <source media="(min-width:465px)" data-srcset="<?php echo $header_image['url']; ?>">
                <img class="lazy-anim lazyload" data-src="<?php echo $header_image['url']; ?>" alt="<?php echo $header_image['alt']; ?>" src="">
            </picture>
        </div>

        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading">
                <h1><?php the_field( 'header_text_kohde' ); ?></h1>

            </div>


          </div>

        </div>

      </section>


      <?php if ( have_rows( 'content_block_kohde' ) ) : ?>
        <section class="section--basic U-sec-pad bg--nude">
                  <div class="U_container U_base-pad">
<?php while ( have_rows( 'content_block_kohde' ) ) : the_row(); ?>
<?php if( get_sub_field('header') ): ?>
<div class="module--heading_txt">
    <div class="heading-content">
    <div class="heading">
  <h2><?php the_sub_field( 'header' ); ?></h2>
    </div>
</div>
</div>
<?php endif; ?>
<?php if ( have_rows( 'content_rows' ) ) : ?>
  <?php while ( have_rows( 'content_rows' ) ) : the_row(); ?>
      <?php $image = get_sub_field( 'image' ); ?>
    <div class="module--split-content">
          <div class="flx-container">
              <?php if ( $image ) { ?>
            <div class="cell split-content__img">
              <div class="cell_img-content">

                <div class="image-aspect-box -wide-aspect">
                  <div class="image-aspect-box_inner ">
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo $image['url']; ?>">
                      <source media="(min-width:465px)" data-srcset="<?php echo $image['url']; ?>">
                        <img class="lazy-anim lazyload" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" src="">
                    </picture>

                </div>
                </div>
              </div>
            </div>
            <?php } ?>

      <div class="cell mosaic-split__txt split-content__txt">
        <div class="cell_txt-content">
            <?php if( get_sub_field('heading') ): ?>
                <h2><?php the_sub_field( 'heading' ); ?></h2>
                 <?php endif; ?>
          <p><?php the_sub_field( 'text_content' ); ?></p>
          <?php $cta_button = get_sub_field( 'cta_button' ); ?>
              <?php if ( $cta_button ) { ?>
            <div class="capsule-wrap">
                <a class="btn--basic" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?> ›</a>
              </div>
              <?php } ?>
      </div>
        </div>
    </div>
    </div>

  <?php endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
</div>
</section>
<?php endif; ?>





          <?php if( get_field('manifest') ): ?>
              <section class="section--basic U-sec-pad">
                                <div class="U_container U_base-pad">
          <div class="module---manifest-block">
                  <h2><?php the_field( 'manifest' ); ?></h2>
          </div>

        </div>
              </section>
<?php endif; ?>


          <section class="section--basic U-sec-pad bg--nude">
                    <div class="U_container U_base-pad">

                      <?php if ( have_rows( 'pre_map_content' ) ) : ?>
                                  <div class="module--split-heading">
                            <div class="flx-container">

	<?php while ( have_rows( 'pre_map_content' ) ) : the_row(); ?>

    <div class="heading">
      <h2><?php the_sub_field( 'header' ); ?></h2>

    </div>
    <div class="txt-content">
      <p><?php the_sub_field( 'text' ); ?></p>

    </div>

	<?php endwhile; ?>
        </div>
            </div>
<?php endif; ?>


                      <div class="module--routes">

                      <div class="routes__pdf-box">
                      <?php echo do_shortcode( ' [pdf-embedder url="/wp-content/uploads/2022/05/kartta-www.pdf"] ' ); ?>
                      </div>

                      <div class="capsule-wrap">
              			<a class="btn--basic" href="https://ebikerental.fi/wp-content/uploads/2022/05/kartta-www.pdf" target="_blank">Lataa kartta tästä</a>
                  </div>
                    </div>

                    <div class="routes__desc-container">
                      <div class="flx-container">

                        <?php if ( have_rows( 'routes_beginner' ) ) : ?>
                              <div class="cell routes__unit">
	<?php while ( have_rows( 'routes_beginner' ) ) : the_row(); ?>
		<h3 class="f--bold"><?php the_sub_field( 'heading' ); ?></h3>
		<?php the_sub_field( 'content' ); ?>
	<?php endwhile; ?>
      </div>
<?php endif; ?>

<?php if ( have_rows( 'routes_advanced' ) ) : ?>
      <div class="cell routes__unit">
<?php while ( have_rows( 'routes_advanced' ) ) : the_row(); ?>
<h3 class="f--bold"><?php the_sub_field( 'heading' ); ?></h3>
<?php the_sub_field( 'content' ); ?>
<?php endwhile; ?>
</div>
<?php endif; ?>




                      </div>
                    </div>

                                      </div>
                          </section>



                          <?php if ( have_rows( 'content_block__bottom' ) ) : ?>
                            <section class="section--basic U-sec-pad">
                                      <div class="U_container U_base-pad">
                                      <div class="module--split-heading">
                                <div class="flx-container">

      <?php while ( have_rows( 'content_block__bottom' ) ) : the_row(); ?>

        <div class="heading">
          <h2><?php the_sub_field( 'header' ); ?></h2>

        </div>
        <div class="txt-content">
          <p><?php the_sub_field( 'text' ); ?></p>

        </div>

      <?php endwhile; ?>
            </div>
                </div>
              </div>
                </section>

    <?php endif; ?>









<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>







    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
