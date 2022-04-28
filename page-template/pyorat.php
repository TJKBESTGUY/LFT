<?php
   /*
   Template Name: Pyörät
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>

      <section class="section--bikes-header">
            <div class="U_container U_base-pad">
        <div class="module--bikes-header">
          <div class="flx-container">
          <div class="bikes-header__content">
            <h1 class="h2">Modernit sähköpyörämme mahdollistavat sinulle ja perheellesi pidempiäkin retkiä vaativimmillakin reiteillä</h1>
            <p>
              Pyöriemme akut kestävät, tehostuksesta riippuen, 80km-150km. Sähköpyörä varmistaa sen että ryhmä pysyy kasassa vaikka kunto, voima tai kokemustaso olisi eri tasolla. Enää ei tarvitse odottaa perheen pienimpiä tai vanhimpia.
            </p>
          </div>
          <div class="bikes-header__img">
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/header-bike.jpg">
                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/header-bike.jpg">
                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/header-bike.jpg" alt="" src="">
              </picture>
          </div>


                </div>
        </div>
        </div>
      </section>







          <section class="section--basic U-sec-pad bg--nude -mute-top-pad">
                <div class="U_container U_base-pad">
                  <div class="bikes-speed-nav">
                          <div class="bikes-speed-nav__inner">
                            <a href="#aikuiset">Aikuiset</a>
                              <a href="#lapset">Lapset</a>
                                    <a href="#varusteet">Varusteet</a>
                    </div>
                  </div>
                </div>




                <?php
                	 $posts = get_posts(array(
                		'posts_per_page'	=> -1,
                		'post_type'			=> 'bikes'
                	 ));

                   ?>



            <div class="U_container U_base-pad">
              <div id="aikuiset" class="module--bikes-grid">
                <h2 class="bikes-grid__header">Aikuiset</h2>
                <div class="flx-container">



                  <?php	 if( $posts ): ?>
        <?php foreach( $posts as $post ):
           setup_postdata( $post );?>
           <?php if( get_field('bike_category') == 'aikuiset'  ): ?>
<?php locate_template('src/parts/global/card-bike.php', true, true); ?>
      <?php endif; ?>
         <?php wp_reset_postdata(); ?>
         <?php endforeach; ?>
         <?php endif; ?>




              <div class="bike-card--on-grid">
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
              <div class="bike-card--on-grid">
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
              <div class="bike-card--on-grid">
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

              </div>
              <div  id="lapset" class="module--bikes-grid">
                <h2 class="bikes-grid__header">Lapset</h2>
                <div class="flx-container">

                  <?php	 if( $posts ): ?>
        <?php foreach( $posts as $post ):
           setup_postdata( $post );?>
           <?php if( get_field('bike_category') == 'lapset'  ): ?>
        <!-- USE BIKE-CARD TEMPLATE IF YOU GET IT WORKING -->
      <div class="bike-card--on-grid">
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
      <?php endif; ?>
               <?php wp_reset_postdata(); ?>
         <?php endforeach; ?>
         <?php endif; ?>

              <div class="bike-card--on-grid">
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
              <div class="bike-card--on-grid">
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
              <div class="bike-card--on-grid">
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

              </div>


              <div id="varusteet" class="module--split-content -after-bikes-grid">
                    <div class="flx-container">
                      <div class="cell mosaic-split__img split-content__img">
                        <div class="cell_img-content">
                            <!-- <h3>Hyvät laskut saavat projektit vauhtiin</h3> -->
                          <div class="image-aspect-box -wide-aspect">
                            <div class="image-aspect-box_inner ">
                            <picture>
                              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/bike1.png">
                                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/bike1.png" alt="" src="">
                              </picture>

                          </div>
                          </div>
                        </div>
                      </div>
                <div class="cell mosaic-split__txt split-content__txt">
                  <div class="cell_txt-content">
                    <h2>Varusteet</h2>
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




<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>


    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
