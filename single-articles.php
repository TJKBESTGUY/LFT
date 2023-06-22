<?php
/**
 * The template for displaying all single posts
 * It does not include a sidebar
 *
 * This is the template that displays all posts by default.
 * New post types can use this and the ign_loop will route it to the right folder in template-parts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ignition
 * @since 1.0
 * @version 1.0
 */
 get_header(); ?>

     <div id="primary" class="content-area">
         <main id="main" class="site-main" role="main">
           <div class="U-nav-spacer">

           </div>

           <section class="section--page-header ">
           <div class="U_container U_base-pad">
           <div class="module--header-block  module--header-block--no-img ">
            <div class="flx-container">
              <div class="cell header-block__meta U-inner-content--x U-inner-content--y">
             <h1 class="base-text">
               <!-- <?php
               $categories = get_the_category();
       if ( ! empty( $categories ) ) {
       foreach( $categories as $category ) {
       ?>

      <?php echo $category->name; ?>

       <?php
       }
       }
       ?> -->
       <?php
       $term = get_field('paakategoria');
       if( $term ): ?>

      <?php echo esc_html( $term->name ); ?>

       <?php endif; ?>
             </h1>

             <div class="">


           <h1 class="h2"><?php echo get_the_title(); ?></h1>
           <?php  if ( has_post_thumbnail() ) {  ?>
            <div class="basic-card__image article-header__image">

        <div class="placeholder-img">
        <img class="" data-src=" <?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?> " alt="" src="<?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?>">

        </div>
        <div class="lazy-img">

        <img class="lazyanim lazyload" data-src="<?php echo get_the_post_thumbnail_url($post_id, "content-image" ); ?>" alt="" src="">
              </div>

            </div>
      <?php     }  ?>
             </div>
             </div>



           </div>
           </div>
           </div></section>

           <article class="single-post single-post--legacy -x-pad">
             <div class="single-post--legacy__inner">


          <?php
          if ( have_posts() ):
            while ( have_posts() ) : the_post();
             locate_template('src/parts/global/main-page-loop.php', true, true);
            endwhile; // End of the loop.

          endif;
          ?>
                   </div>
                 </article>

                 <section id="" class="section--basic U-sec-pad--small section-theme--light section-width--normal ">
  <div class="section-inner-container U_container U_base-pad" style="max-width:;">
    <div class="section-bg-container" style="background:">
      <div class="lazyblock-text-container-ZFTI3r wp-block-lazyblock-text-container">
        <div class="module--basic-content basic-content-flx  basic-content--bottom   -x-pad" data-aos="heading-txt">
          <div class="basic-content__inner" style="max-width:100%;">
            <h3 class="wp-block-heading" id="tutustu-myos-uusimpiin-artikkeleihimme">Uusimmat sisällöt:</h3>
          </div>
        </div>
      </div>
      <div class="module--slider U_container -x-pad"


        x-data="{swiper: null}"
          x-init="swiper = new Swiper($refs.swiper, {
            slidesPerView: 'auto',
                   spaceBetween: 0,
                   grabCursor: true,
                   touchStartPreventDefault: false,
                  cssMode: swiper_css_mode,
                  navigation: {
                     nextEl: $refs.next,
                    prevEl:  $refs.prev,

                    },
            })"
        >

      <!-- //Wrapper starts -->

      <div class="swiper swiper-container swiper--extended" x-ref="swiper">
        <div class="swiper-wrapper">

          <?php $args = array(
                  'post_type' => 'articles',
                  'post_status' => 'publish',
                  'posts_per_page' => 5,


              );

              $loop = new WP_Query( $args );

              while ( $loop->have_posts() ) : $loop->the_post();
                ?>

          <?php locate_template('src/parts/global/slidercard-post.php', true, false); ?>

                  <?php
              endwhile;

              wp_reset_postdata();  ?>
      </div>
      </div>

      <div class="swiper-nav--bottom swiper-nav--right-absolute ">
        <div class="swiper-button-prev" style="" x-ref="prev"></div>
            <div class="swiper-button-next" style="" x-ref="next"></div>

      </div>
        <!-- <div class="capsule-wrap " style="margin-top:0;"> <a class="btn--basic btn--dark " style=" " href="/artikkelit/">Kaikki artikkelit</a> -->
       </div>
      </div>

    </div>
  </div>
</section>





         </main><!-- #main -->
     </div><!-- #primary -->



 <?php get_footer();
