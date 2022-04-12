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
            <source media="(min-width:650px)" data-srcset="<?php echo $header_image['url']; ?>">
              <source media="(min-width:465px)" data-srcset="<?php echo $header_image['url']; ?>">
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
                <script src=https://master.d26e4mzfe8pjk0.amplifyapp.com/embed.js data-groups="ebikerental"></script>
            </div>



        </div>
      </section>




          <!-- <section class="section--basic U-sec-pad">
                    <div class="U_container U_base-pad">
      <div class="module--heading_txt">
          <div class="heading-content">
          <div class="heading">
        <h2>eBikeRental.fi tarjoaa kaikille mahdollisuuden tutustua mukavasti Saariselän tunturien erämaahan laadukkaalla sähköpyörällä</h2>
          </div>
      </div>
    </div>

    <div class="module--split-content">
          <div class="flx-container">
            <div class="cell mosaic-split__img split-content__img">
              <div class="cell_img-content">

                <div class="image-aspect-box -wide-aspect">
                  <div class="image-aspect-box_inner ">
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg">
                      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg">
                        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg" alt="" src="">
                    </picture>

                </div>
                </div>
              </div>
            </div>
      <div class="cell mosaic-split__txt split-content__txt">
        <div class="cell_txt-content">
          <p>Panostamme laadukkaisiin täysjousitettuihin sähköpyöriin joilla kokematonkin luonnossa liikkuja pääsee helposti ja turvallisesti tunturiin.</p>
<p>Sinulla ei tarvitse olla aikaisempaa kokemusta sähköpyöräilystä. Tulit yksin, kaveri porukalla tai perheenä, meidän laajasta pyörälikoimasta löytyy jokaiselle sopiva kulkuväline.</p>
      </div>
        </div>


    </div>
    </div>



    </div>
          </section> -->


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

            <div class="U_container U_base-pad">
              <div class="module--horizontal-row horizontal-row--bikes">
                <div class="flx-container">

              <div class="bike-card">
                <div class="bike-card__inner">
                  <div class="bike-card__header">
                    <span class="label--adults f--medium">Aikuisille</span><span class="label--specs f--medium">Täysjousitettu</span>

                  </div>

                  <div class="bike-card__img">
                    <div class="image-aspect-box">
                      <div class="image-aspect-box_inner ">
                      <picture>
                        <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                          <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                            <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
                        </picture>

                    </div>
                    </div>
                  </div>

                  <div class="bike-card__content">
                    <h4 class="f--bold">Ghost E-Riot</h4>

                    <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
                  </div>

                    <div class="bike-card__footer">
                      <div class="-wrap">
                          <a class="btn--secondary" href="#">ghost-bikes.com</a>
                      </div>
                      <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
                        </div>

                </div>

              </div>
              <div class="bike-card">
                <div class="bike-card__inner">
                  <div class="bike-card__header">
                    <span class="label--adults f--medium">Aikuisille</span><span class="label--specs f--medium">Täysjousitettu</span>

                  </div>

                  <div class="bike-card__img">
                    <div class="image-aspect-box">
                      <div class="image-aspect-box_inner ">
                      <picture>
                        <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                          <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                            <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
                        </picture>

                    </div>
                    </div>
                  </div>

                  <div class="bike-card__content">
                    <h4 class="f--bold">Ghost E-Riot</h4>

                    <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
                  </div>

                    <div class="bike-card__footer">
                      <div class="-wrap">
                          <a class="btn--secondary" href="#">ghost-bikes.com</a>
                      </div>
                      <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
                        </div>

                </div>

              </div>
              <div class="bike-card">
                <div class="bike-card__inner">
                  <div class="bike-card__header">
                    <span class="label--kids f--medium">Lapsille</span><span class="label--specs f--medium">Täysjousitettu</span>

                  </div>

                  <div class="bike-card__img">
                    <div class="image-aspect-box">
                      <div class="image-aspect-box_inner ">
                      <picture>
                        <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                          <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                            <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
                        </picture>

                    </div>
                    </div>
                  </div>

                  <div class="bike-card__content">
                    <h4 class="f--bold">Ghost E-Riot</h4>

                    <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
                  </div>

                    <div class="bike-card__footer">
                      <div class="-wrap">
                          <a class="btn--secondary" href="#">ghost-bikes.com</a>
                      </div>
                      <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
                        </div>

                </div>

              </div>




              </div>

              </div>
                  </div>


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
           <span class="label--kids f--medium">Lapsille</span>
           <?php } else { ?>
             <span class="label--adults f--medium">aikuisille</span>
              <?php } ?>
                <span class="label--specs f--medium"><?php the_field( 'bike_suspension' ); ?></span>
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
        <h4 class="f--bold"><?php the_field( 'bike_name' ); ?></h4>
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

        <p><?php the_field( 'text_content_suomi' ); ?></p>

          </div>


          <?php $link_for_more_information = get_field( 'link_for_more_information' ); ?>
          <?php if ( $link_for_more_information ) { ?>
                <div class="bike-card__footer">
                        <div class="-wrap">
                    <a class="btn--secondary" href="<?php echo $link_for_more_information['url']; ?>" target="_blank"><?php echo $link_for_more_information['title']; ?></a>
                          </div>
                        <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
                </div>
          <?php } ?>
        </div>
        </div>
    	<?php endforeach; ?>
    	<?php wp_reset_postdata(); ?>
    <?php endif; ?>


    <div class="bike-card swiper-slide">
      <div class="bike-card__inner">
        <div class="bike-card__header">
          <span class="label--kids f--medium">Lapsille</span><span class="label--specs f--medium">Täysjousitettu</span>

        </div>

        <div class="bike-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
              </picture>

          </div>
          </div>
        </div>

        <div class="bike-card__content">
          <h4 class="f--bold">Ghost E-Riot</h4>

          <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
        </div>

          <div class="bike-card__footer">
            <div class="-wrap">
                <a class="btn--secondary" href="#">ghost-bikes.com</a>
            </div>
            <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
              </div>

      </div>

    </div>
    <div class="bike-card swiper-slide">
      <div class="bike-card__inner">
        <div class="bike-card__header">
          <span class="label--kids f--medium">Lapsille</span><span class="label--specs f--medium">Täysjousitettu</span>

        </div>

        <div class="bike-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
              </picture>

          </div>
          </div>
        </div>

        <div class="bike-card__content">
          <h4 class="f--bold">Ghost E-Riot</h4>

          <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
        </div>

          <div class="bike-card__footer">
            <div class="-wrap">
                <a class="btn--secondary" href="#">ghost-bikes.com</a>
            </div>
            <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
              </div>

      </div>

    </div>

    <div class="bike-card swiper-slide">
      <div class="bike-card__inner">
        <div class="bike-card__header">
          <span class="label--kids f--medium">Lapsille</span><span class="label--specs f--medium">Täysjousitettu</span>

        </div>

        <div class="bike-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
              </picture>

          </div>
          </div>
        </div>

        <div class="bike-card__content">
          <h4 class="f--bold">Ghost E-Riot</h4>

          <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
        </div>

          <div class="bike-card__footer">
            <div class="-wrap">
                <a class="btn--secondary" href="#">ghost-bikes.com</a>
            </div>
            <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
              </div>

      </div>

    </div>
    <div class="bike-card swiper-slide">
      <div class="bike-card__inner">
        <div class="bike-card__header">
          <span class="label--kids f--medium">Lapsille</span><span class="label--specs f--medium">Täysjousitettu</span>

        </div>

        <div class="bike-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
              </picture>

          </div>
          </div>
        </div>

        <div class="bike-card__content">
          <h4 class="f--bold">Ghost E-Riot</h4>

          <p>Runsaasti moottoritehoa. Paljon joustomatkaa. Ja loputtomasti potentiaalia. E-Riot on sähköenduropyörä, joka luultavasti pystyy enempään kuin mitä ikinä voisit pyytää sähkömaastopyörältä. Kun joustomatka on edessä 170 mm ja takana 160 mm, hurjimmatkin alamäet tasoittuvat.</p>
        </div>

          <div class="bike-card__footer">
            <div class="-wrap">
                <a class="btn--secondary" href="#">ghost-bikes.com</a>
            </div>
            <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
              </div>

      </div>

    </div>


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

        <div class="capsule-wrap">
        <a class="btn--basic" href="#">Kaikki pyörät ›</a>

  </div>

    </div>


          </section>




          <section class="section--basic U-sec-pad">
                    <div class="U_container U_base-pad">


    <div class="module--split-content">
          <div class="flx-container">
            <div class="cell mosaic-split__img split-content__img">
              <div class="cell_img-content">
                  <!-- <h3>Hyvät laskut saavat projektit vauhtiin</h3> -->
                <div class="image-aspect-box -wide-aspect">
                  <div class="image-aspect-box_inner ">
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva2b.jpg">
                      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva2b.jpg">
                        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva2b.jpg" alt="" src="">
                    </picture>

                </div>
                </div>
              </div>
            </div>
      <div class="cell mosaic-split__txt split-content__txt">
        <div class="cell_txt-content">
          <h2>Monipuoliset reitit Saariselän tuntureilla ja metsän siimeksessä</h2>
          <p>Tutustu Saariselän reittivalikoimaan ja katso reittikartat kohteen esittelysivulta.</p>
          <div class="capsule-wrap">
          <a class="btn--basic" href="#">Saariselkä ›</a>
      </div>
      </div>
        </div>


    </div>
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
                      <!-- <h3>Hyvät laskut saavat projektit vauhtiin</h3> -->
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









    <div class="quote-card swiper-slide">
      <div class="quote-card__inner">
        <div class="quote-card__content">
          <p> “Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma lisäkapasiteetti antavat mahdollisuuden nauttia pitkäkestoisesta lumikenttien kutsusta esim. järven jäällä.”</p>
        </div>
        <div class="quote-card__person">
          <div class="quote-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
              </picture>
                        </div>
          </div>
          </div>
            <span class="f--medium">Mikko Rovanperä</span>
        </div>






      </div>

    </div>


    <div class="quote-card swiper-slide">
      <div class="quote-card__inner">
        <div class="quote-card__content">
          <p> “Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma.”</p>
        </div>
        <div class="quote-card__person">
          <div class="quote-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
              </picture>
                        </div>
          </div>
          </div>
            <span class="f--medium">Mikko Rovanperä</span>
        </div>






      </div>

    </div>

    <div class="quote-card swiper-slide">
      <div class="quote-card__inner">
        <div class="quote-card__content">
          <p> “Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma.”</p>
        </div>
        <div class="quote-card__person">
          <div class="quote-card__img">
          <div class="image-aspect-box">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
              </picture>
                        </div>
          </div>
          </div>
            <span class="f--medium">Mikko Rovanperä</span>
        </div>






      </div>

    </div>






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


    <div class="U_container U_base-pad">
      <div class="module--horizontal-row horizontal-row--quotes">
        <div class="flx-container">

      <div class="quote-card">
        <div class="quote-card__inner">
          <div class="quote-card__content">
            <p> “Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma lisäkapasiteetti antavat mahdollisuuden nauttia pitkäkestoisesta lumikenttien kutsusta esim. järven jäällä.”</p>
          </div>
          <div class="quote-card__person">
            <div class="quote-card__img">
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner ">
              <picture>
                <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
                </picture>
                          </div>
            </div>
            </div>
              <span class="f--medium">Mikko Rovanperä</span>
          </div>






        </div>

      </div>
      <div class="quote-card">
        <div class="quote-card__inner">
          <div class="quote-card__content">
            <p> “Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma lisäkapasiteetti antavat mahdollisuuden nauttia pitkäkestoisesta lumikenttien kutsusta esim. järven jäällä.”</p>
          </div>
          <div class="quote-card__person">
            <div class="quote-card__img">
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner ">
              <picture>
                <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
                </picture>
                          </div>
            </div>
            </div>
              <span class="f--medium">Mikko Rovanperä</span>
          </div>






        </div>

      </div>
      <div class="quote-card">
        <div class="quote-card__inner">
          <div class="quote-card__content">
            <p>Vuokrasin syksyllä Saariselälle sähkömaastopyörän ja 3 tunnin ajon jälkeen se olin heti myyty. Hyvin merkittyjä polkuja pitkin oli helppo liikkua. Vaikka tunturien päälle nouseminen olisi itselleni vaikeaa tavallisella pyörällä teki sähköavustus mäkien nousemisen mukavaksi.Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma lisäkapasiteetti antavat mahdollisuuden nauttia pitkäkestoisesta lumikenttien kutsusta esim. järven jäällä.</p>
          </div>
          <div class="quote-card__person">
            <div class="quote-card__img">
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner ">
              <picture>
                <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
                </picture>
                          </div>
            </div>
            </div>
            <span class="f--medium">Mikko Rovanperä</span>
          </div>






        </div>

      </div>

      <div class="quote-card">
        <div class="quote-card__inner">
          <div class="quote-card__content">
            <p>Vuokrasin syksyllä Saariselälle sähkömaastopyörän ja 3 tunnin ajon jälkeen se olin heti myyty. Hyvin merkittyjä polkuja pitkin oli helppo liikkua. Vaikka tunturien päälle nouseminen olisi itselleni vaikeaa tavallisella pyörällä teki sähköavustus mäkien nousemisen mukavaksi.Tasaiset osuudet sujuivat mukavasti hyvän jousituksen ansiosta. Takaisin kotiin päästyäni hankin itselleni oman sähköpyörän. Enkä ole katunut. Pyörän tukeva rakenne, ajo-ominaisuudet, sekä sähköisen avustuksen tuoma lisäkapasiteetti antavat mahdollisuuden nauttia pitkäkestoisesta lumikenttien kutsusta esim. järven jäällä.</p>
          </div>
          <div class="quote-card__person">
            <div class="quote-card__img">
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner ">
              <picture>
                <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
                </picture>
                          </div>
            </div>
            </div>
            <span class="f--medium">Mikko Rovanperä</span>
          </div>






        </div>

      </div>






      </div>

      </div>
          </div>




          </section>




          <!-- <section class="section--basic U-sec-pad bg--dark">
                    <div class="U_container U_base-pad">


    <div class="module--split-content">
          <div class="flx-container">
            <div class="cell mosaic-split__img split-content__img">
              <div class="cell_img-content">

                <div class="image-aspect-box -wide-aspect">
                  <div class="image-aspect-box_inner ">
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg">
                        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3b.jpg" alt="" src="">
                    </picture>

                </div>
                </div>
              </div>
            </div>
      <div class="cell mosaic-split__txt split-content__txt">
        <div class="cell_txt-content">
          <h2>Monipuoliset reitit Saariselän tuntureilla ja metsän siimeksessä</h2>
          <p>Tutustu Saariselän reittivalikoimaan ja katso reittikartat kohteen esittelysivulta.</p>
          <div class="capsule-wrap">
          <a class="btn--basic" href="#">Saariselkä ›</a>
      </div>
      </div>
        </div>


    </div>
    </div>



    </div>
          </section> -->



<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>







    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
