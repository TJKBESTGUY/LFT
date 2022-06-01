<?php
   /*
   Template Name: Pyörät
   */
   get_header(); ?>


   <?php if ( get_field( 'lang' ) == 1 ) { ?>
   <?php $lang_kids = "Kids" ?>
     <?php $lang_adults = "Adults" ?>
          <?php $lang_gear = "Gear" ?>
         <?php $lang_learnmore= "Click the link to learn more" ?>
     <?php } else { ?>
       <?php $lang_kids = "Lapsille" ?>
           <?php $lang_adults = "Aikuisille" ?>
             <?php $lang_learnmore= "Tutustu tarkemmin valmistajan sivuilta" ?>
                   <?php $lang_gear = "Varusteet" ?>
     <?php } ?>

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
            <p>Vuokraamollamme on laaja valikoima erilaisia pyöriä monessa eri koossa. Henkilökuntamme auttaa sinua valitsemaan juuri sinulle sopivan vaihtoehdon. Oikean kokoisen pyörän valinta on tärkeää jotta saat mukavan ja turvallisen pyöräilykokemuksen.
Tervetuloa kokeilemaan ennen päätöstä!</p>
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
                            <a href="#aikuiset"> <?php echo $lang_adults ?> </a>
                              <a href="#lapset"> <?php echo $lang_kids ?> </a>
                                    <a href="#varusteet"><?php echo $lang_gear ?> </a>
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
                <h2 class="bikes-grid__header">
                <?php if ( get_field( 'lang' ) == 1 ) { ?>
                  Adults
                <?php } else { ?>
                  Aikuiset
                <?php } ?>
                </h2>
                <div class="flx-container">



                  <?php	 if( $posts ): ?>
        <?php foreach( $posts as $post ):
           setup_postdata( $post );?>
           <?php if( get_field('bike_category') == 'aikuiset'  ): ?>
             <div class="bike-card--on-grid">
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
      <?php endif; ?>
         <?php wp_reset_postdata(); ?>
         <?php endforeach; ?>
         <?php endif; ?>


              </div>

              </div>







              <div  id="lapset" class="module--bikes-grid">
                <h2 class="bikes-grid__header">
                  <?php if ( get_field( 'lang' ) == 1 ) { ?>
                    Kids
                  <?php } else { ?>
                    Lapset
                  <?php } ?>
                </h2>
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
      <?php endif; ?>
               <?php wp_reset_postdata(); ?>
         <?php endforeach; ?>
         <?php endif; ?>







              </div>

              </div>


              <div id="varusteet" class="module--split-content -after-bikes-grid">
                    <div class="flx-container">
                      <div class="cell mosaic-split__img split-content__img">
                        <div class="cell_img-content">
                
                          <div class="image-aspect-box -wide-aspect">
                            <div class="image-aspect-box_inner ">
                            <picture>

                                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/varusteet1.jpg" alt="" src="">
                              </picture>

                          </div>
                          </div>
                        </div>
                      </div>
                <div class="cell mosaic-split__txt split-content__txt">
                  <div class="cell_txt-content">
                    <h2>Varusteet</h2>
                    <p>
                      Vuokraamme pyörien vuokraajille lisäksi laadukkaita POC:n kypäriä, kevyitä lukkoja sekä pyörään kiinnitettäviä puhelinpidikkeitä.
                    </p>
                    <p>
                      Myymälästämme voit ostaa juomapulloja, ajovarusteita ja pientä purtavaa retkien iloksi.
                    </p>

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
