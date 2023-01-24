<?php
   /*
   Template Name: var_valmennukset has extra sliders
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">







      <?php $header_image = get_field( 'header_image' ); ?>





      <?php locate_template('src/parts/global/main-page-loop.php', true, true); ?>










      <?php

      $args = array(
      'posts_per_page'   => -1,
      'post_type'        => 'post',
      );
      $the_query = new WP_Query( $args );

      if($the_query->have_posts()) : ?>
      <section class="section--basic U-sec-pad">
      <div class="U_container U_base-pad"


      x-data="{swiper: null}"
        x-init="swiper = new Swiper($refs.swiper, {
          slidesPerView: 'auto',
                 spaceBetween: 0,
                 grabCursor: true,
                cssMode: swiper_css_mode,
                pagination: true,
                speed: 1000,
                watchSlidesProgress: true,
                navigation: {
              		 nextEl: $refs.next,
                  prevEl:  $refs.prev,

              	  },

                  on: {
   slideChangeTransitionStart: function () {
     console.log(swiper.activeIndex);
     document.querySelector('.swiper').dataset.index = swiper.activeIndex;
   },
 },



          })"







      >

      <!-- //Wrapper starts -->

        <div class="swiper swiper-container swiper-bikes" x-ref="swiper" data-index="0">
          <div class="swiper-backdrop-content">
            <span>
                    Lue Uutiset
            </span>

          </div>
          <div class="swiper-wrapper">

            <div class="swiper-slide">

            </div>

      <!-- ////OUTPUT STARSTS -->

      <?php
      while($the_query->have_posts()) :
      $the_query->the_post();
      ?>



      <div class=" basic-card swiper-slide" >
      <div class="basic-card__inner">

        <div class="basic-card__img">
          <!-- <div class="image-aspect-box"><div class="image-aspect-box_inner ">
          <picture> <source media="(min-width:650px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg"> <source media="(min-width:465px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
            <img class="lazy-anim lazyloaded" data-src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" alt="" src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
          </picture>
        </div>
      </div> -->
      </div>

      <div class="basic-card__header">
       <h3><?php the_title() ?></h3>
      </div>

          <div class="basic-card__content">

      <?php the_content() ?>

        </div>

        <div class="basic-card__footer">
          <div class="btn-wrap">
      <a href="<?php echo get_permalink(); ?>" @click="runModal" data-id="<?php the_title() ?>">Lue lisää</a>
        </div>
      </div>


      </div>
      </div>

      <div class=" basic-card swiper-slide" >
      <div class="basic-card__inner">

        <div class="basic-card__img">
          <!-- <div class="image-aspect-box"><div class="image-aspect-box_inner ">
          <picture> <source media="(min-width:650px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg"> <source media="(min-width:465px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
            <img class="lazy-anim lazyloaded" data-src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" alt="" src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
          </picture>
        </div>
      </div> -->
      </div>

      <div class="basic-card__header">
       <h3><?php the_title() ?></h3>
      </div>

          <div class="basic-card__content">

      <?php the_content() ?>

        </div>

        <div class="basic-card__footer">
          <div class="btn-wrap">
      <a href="<?php echo get_permalink(); ?>" @click="runModal" data-id="<?php the_title() ?>">Lue lisää</a>
        </div>
      </div>


      </div>
      </div>





      <?php
      endwhile; ?>

      <!-- ////OUTPUT ENDS////// -->
      </div>
      </div>
      <div class="swiper-button-prev" x-ref="prev"></div>
          <div class="swiper-button-next" x-ref="next"></div>
      </div>
      </section>
      <!-- ////Wrapper ends -->
      <?php
      endif;
      ?>

      <?php wp_reset_query(); ?>


      <?php

      $args = array(
      'posts_per_page'   => -1,
      'post_type'        => 'post',
      );
      $the_query = new WP_Query( $args );

      if($the_query->have_posts()) : ?>
      <section class="section--basic U-sec-pad">
      <div class="U_container U_base-pad"


      x-data="{swiper: null}"
        x-init="swiper = new Swiper($refs.swiper, {
          slidesPerView: 'auto',
                 spaceBetween: 0,
                 grabCursor: true,
                cssMode: swiper_css_mode,
                navigation: {
                   nextEl: $refs.next,
                  prevEl:  $refs.prev,

                  },
          })"







      >

      <!-- //Wrapper starts -->

        <div class="swiper swiper-container swiper-bikes" x-ref="swiper">
          <div class="swiper-wrapper">

      <!-- ////OUTPUT STARSTS -->

      <?php
      while($the_query->have_posts()) :
      $the_query->the_post();
      ?>

      <div class=" basic-card swiper-slide" >
      <div class="basic-card__inner">

        <div class="basic-card__img">
          <!-- <div class="image-aspect-box"><div class="image-aspect-box_inner ">
          <picture> <source media="(min-width:650px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg"> <source media="(min-width:465px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
            <img class="lazy-anim lazyloaded" data-src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" alt="" src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
          </picture>
        </div>
      </div> -->
      </div>

      <div class="basic-card__header">
       <h3><?php the_title() ?></h3>
      </div>

          <div class="basic-card__content">

      <?php the_content() ?>

        </div>

        <div class="basic-card__footer">
          <div class="btn-wrap">
      <a href="<?php echo get_permalink(); ?>" @click="runModal" data-id="<?php the_title() ?>">Lue lisää</a>
        </div>
      </div>


      </div>
      </div>

      <div class=" basic-card swiper-slide" >
      <div class="basic-card__inner">

        <div class="basic-card__img">
          <!-- <div class="image-aspect-box"><div class="image-aspect-box_inner ">
          <picture> <source media="(min-width:650px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg"> <source media="(min-width:465px)" data-srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" srcset="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
            <img class="lazy-anim lazyloaded" data-src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg" alt="" src="https://ebikerental.fi/wp-content/uploads/2022/04/3.jpg">
          </picture>
        </div>
      </div> -->
      </div>

      <div class="basic-card__header">
       <h3><?php the_title() ?></h3>
      </div>

          <div class="basic-card__content">

      <?php the_content() ?>

        </div>

        <div class="basic-card__footer">
          <div class="btn-wrap">
      <a href="<?php echo get_permalink(); ?>" @click="runModal" data-id="<?php the_title() ?>">Lue lisää</a>
        </div>
      </div>


      </div>
      </div>





      <?php
      endwhile; ?>

      <!-- ////OUTPUT ENDS////// -->
      </div>
      </div>
      <div class="swiper-button-prev" x-ref="prev"></div>
          <div class="swiper-button-next" x-ref="next"></div>
      </div>
      </section>
      <!-- ////Wrapper ends -->
      <?php
      endif;
      ?>

      <?php wp_reset_query(); ?>





    </main><!-- #main -->
  </div><!-- #primary -->





<?php get_footer();
