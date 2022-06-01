<?php
   /*
   Template Name: Etusivu
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>

      <?php $header_image = get_field( 'header_image' ); ?>


      <section class="section--full-header">
        <div class="module--bg-img">
          <picture>

                <img class="lazy-anim lazyload" data-src="<?php echo $header_image['url']; ?>" alt="<?php echo $header_image['alt']; ?>" src="">
            </picture>
        </div>

        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading">
                <h1><?php the_field( 'header_text' ); ?></h1>

            </div>


          </div>

        </div>

      </section>

            <section class="section--basic U-sec-pad bg--nude">
          <div class="U_container U_base-pad">
            <div class="rental-wrapper">
             <script src="https://master.d1yygpfz5h5tlv.amplifyapp.com/embed-v2.js" data-groups="ebikerental"></script>
            </div>



        </div>
      </section>







          <?php if ( have_rows( 'content_block_esittely' ) ) : ?>
            <section class="section--basic U-sec-pad">
                      <div class="U_container U_base-pad">
	<?php while ( have_rows( 'content_block_esittely' ) ) : the_row(); ?>
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


          <section class="section--basic U-sec-pad bg--nude">
                    <div class="U_container U_base-pad">
      <div class="module--heading_txt">
          <div class="heading-content">
          <div class="heading">
        <h2><?php the_field( 'bikes' ); ?></h2>
          </div>
      </div>
    </div>
      </div>


      <?php if ( get_field( 'lang' ) == 1 ) { ?>
      <?php $lang_kids = "Kids" ?>
        <?php $lang_adults = "Adults" ?>
            <?php $lang_learnmore= "Click the link to learn more" ?>
        <?php } else { ?>
          <?php $lang_kids = "Lapsille" ?>
              <?php $lang_adults = "Aikuisille" ?>
                <?php $lang_learnmore= "Tutustu tarkemmin valmistajan sivuilta" ?>
        <?php } ?>

    <div class="U_container U_base-pad -swiper-padder">
                  <!-- Slider main container -->
<div class="swiper swiper-bikes">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->


    <?php $post_objects = get_field( 'bikes_slider' ); ?>
    <?php if ( $post_objects ): ?>
    	<?php foreach ( $post_objects as $post ):  ?>
    		<?php setup_postdata( $post ); ?>
        <div class="bike-card swiper-slide">
              <div class="bike-card__inner">
                  <div class="bike-card__header">
                <?php if( get_field('bike_category') == 'lapset'  ) { ?>
           <span class="label--kids f--medium">
          <?php echo  $lang_kids ?>
             </span>
           <?php } else { ?>
             <span class="label--adults f--medium"><?php echo  $lang_adults ?></span>
              <?php } ?>
                <span class="label--specs f--medium -lang--fi"><?php the_field( 'bike_suspension' ); ?></span>
                  <span class="label--specs f--medium -lang--en"><?php the_field( 'bike_suspension_en' ); ?></span>

              </div>
             <?php $bike_image = get_field( 'bike_image' ); ?>
        <?php if ( $bike_image ) { ?>
        <div class="bike-card__img">
        <div class="image-aspect-box">
        <div class="image-aspect-box_inner ">
        <picture>
          <source media="(min-width:650px)" data-srcset="<?php echo $bike_image['url']; ?>">
            <source media="(min-width:465px)" data-srcset="<?php echo $bike_image['url']; ?>">
              <img class="lazy-anim lazyload" data-src="<?php echo $bike_image['url']; ?>" alt="<?php echo $bike_image['alt']; ?>" src="">
          </picture>

        </div>
        </div>
        </div>
        <?php } ?>

        <div class="bike-card__content">
        <h4 class="f--bold bike__name"><?php the_field( 'bike_name' ); ?></h4>
        <span class="bike__sub-name"><?php the_field( 'bike_name_sub' ); ?></span>
        <?php if ( have_rows( 'bike_size' ) ) : ?>
          <div class="bike-card__size">

    <?php while ( have_rows( 'bike_size' ) ) : the_row(); ?>
  <?php
  $select_sizes_array = get_sub_field( 'select_sizes' );
  if ( $select_sizes_array ):
    foreach ( $select_sizes_array as $select_sizes_item ):
      ?>
      <span class="bike-size-span"><?php echo $select_sizes_item; ?></span>
      <?php
    endforeach;
  endif; ?>
     <?php if( get_sub_field('text_suomi')  )  { ?>
    <span class=""><?php the_sub_field( 'text_suomi' ); ?></span>
    <?php } ?>

    <?php endwhile; ?>

            </div>
  <?php endif; ?>

        <p class="-lang--fi"><?php the_field( 'text_content_suomi' ); ?></p>
        <p class="-lang--en">  <?php the_field( 'text_content_en' ); ?></p>

          </div>


          <?php $link_for_more_information = get_field( 'link_for_more_information' ); ?>
          <?php if ( $link_for_more_information ) { ?>
                <div class="bike-card__footer">
                        <div class="-wrap">
                    <a class="btn--secondary" href="<?php echo $link_for_more_information['url']; ?>" target="_blank"><?php echo $link_for_more_information['title']; ?></a>
                    <?php $link_for_more_information_2 = get_field( 'link_for_more_information_2' ); ?>
                    <?php if ( $link_for_more_information_2 ) { ?>
	                     <a class="btn--secondary" href="<?php echo $link_for_more_information_2['url']; ?>" target="<?php echo $link_for_more_information_2['target']; ?>"><?php echo $link_for_more_information_2['title']; ?></a>
                     <?php } ?>
                          </div>
                        <span class="f--medium">
                          <?php if ( get_field( 'lang' ) == 1 ) { ?>
                        <?php echo  $lang_learnmore ?>
                            <?php } else { ?>
                          <?php echo  $lang_learnmore ?>
                            <?php } ?>
                          </span>
                </div>
          <?php } ?>
        </div>
        </div>
    	<?php endforeach; ?>
    	<?php wp_reset_postdata(); ?>
    <?php endif; ?>








  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination -bike-swiper"></div>
  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar -bike-swiper"></div>
</div>

<!-- If we need navigation buttons -->
<div class="swiper-button-prev -bike-swiper"></div>
<div class="swiper-button-next -bike-swiper"></div>

  </div>

                  <div class="U_container U_base-pad">

        <div class="capsule-wrap -all-bikes">
          <?php if ( get_field( 'lang' ) == 1 ) { ?>
  <a class="btn--basic" href="/en/bikes">All bikes ›</a>
  <?php } else { ?>

  <a class="btn--basic" href="/pyorat">Kaikki pyörät ›</a>
  <?php } ?>


  </div>

    </div>


          </section>







          <?php if ( have_rows( 'content_block_saari' ) ) : ?>
            <section class="section--basic U-sec-pad">
                      <div class="U_container U_base-pad">
  <?php while ( have_rows( 'content_block_saari' ) ) : the_row(); ?>
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



          <section class="section--basic U-sec-pad  bg--nude">
                    <div class="U_container U_base-pad">


    <div class="module--quote-floater">
      <h2>
<?php the_field( 'main_quote' ); ?>
      </h2>
    </div>
    </div>



    <?php if ( have_rows( 'quote_cards' ) ) : ?>
      <div class="U_container U_base-pad -swiper-padder">
                    <!-- Slider main container -->
  <div class="swiper swiper-quotes">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
	<?php while ( have_rows( 'quote_cards' ) ) : the_row(); ?>
    <div class="quote-card swiper-slide">
      <div class="quote-card__inner">
        <div class="quote-card__content">
          <p><?php the_sub_field( 'quote_text' ); ?></p>
        </div>
        <div class="quote-card__person">
          <?php $person_image = get_sub_field( 'person_image' ); ?>
          <?php if ( $person_image ) { ?>
          <div class="quote-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo $person_image['url']; ?>">
                <source media="(min-width:465px)" data-srcset="<?php echo $person_image['url']; ?>">
                  <img class="lazy-anim lazyload" data-src="<?php echo $person_image['url']; ?>" alt="<?php echo $person_image['alt']; ?>" src="">
              </picture>
                        </div>
          </div>
          </div>
                  <?php } ?>
            <span class="f--medium"><?php the_sub_field( 'person_name' ); ?></span>
        </div>
      </div>
    </div>
	<?php endwhile; ?>









  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination -quote-swiper"></div>
  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar -quote-swiper"></div>
</div>

<!-- If we need navigation buttons -->
<div class="swiper-button-prev -quote-swiper"></div>
<div class="swiper-button-next -quote-swiper"></div>

  </div>

  <?php endif; ?>






          </section>








<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>







    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
