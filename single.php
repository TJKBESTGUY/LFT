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
        <img class="" data-src=" <?php echo get_the_post_thumbnail_url($post_id, "content-image--mobile" ); ?> " alt="" src="<?php echo get_the_post_thumbnail_url($post_id, "content-image--mobile" ); ?>">

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

                   <div class="share-buttons-container">
  <span class="meta-label">Jaa sisältö</span>
<div class="share-list">

  <!-- LINKEDIN -->
  <a class="li-h" onclick="return lbs_click()"  target="_blank">
  <img src="https://img.icons8.com/material-rounded/96/000000/linkedin.png">
  <span>LinkedIn</span>
  </a>

<!-- FACEBOOK -->
<a class="fb-h" onclick="return fbs_click()" target="_blank">
<img src="https://img.icons8.com/material-rounded/96/000000/facebook-f.png">
<span>Facebook</span>
</a>

<a class="what-h" onclick="return what_click()"  target="_blank">

<img width="96" height="96" src="https://img.icons8.com/material-rounded/96/whatsapp--v1.png" alt="whatsapp--v1"/>
<span>WhatsApp</span>
</a>

<!-- TWITTER -->
<a class="tw-h" onclick="return tbs_click()"  target="_blank">
<img width="96" height="96" src="https://img.icons8.com/material-rounded/96/twitterx--v1.png" alt="twitterx--v1"/>
<span>X</span>
</a>





</div>
</div>

<script type="text/javascript">
var pageLink = window.location.href;
var pageTitle = String(document.title).replace(/\&/g, '%26');

function fbs_click() { window.open(`http://www.facebook.com/sharer.php?u=${pageLink}&quote=${pageTitle}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

function tbs_click() { window.open(`https://twitter.com/intent/tweet?text=${pageTitle}&url=${pageLink}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

function lbs_click() { window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${pageLink}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

function what_click() { window.open(`https://api.whatsapp.com/send?text=${pageTitle}%20${pageLink}`,'whatsappsharer','toolbar=0,status=0,width=626,height=436');return false; }



</script>
                 </article>

                 <section id="" class="section--basic U-sec-pad--small section-theme--light section-width--normal ">
                   <?php
$featured_posts = get_field('related_posts');
if( $featured_posts ): ?>
                   <div class="section-inner-container U_container U_base-pad" style="max-width:;">
                     <div class="section-bg-container" style="background:">
                       <div class="lazyblock-text-container-ZFTI3r wp-block-lazyblock-text-container">
                         <div class="module--basic-content basic-content-flx  basic-content--bottom   -x-pad" data-aos="heading-txt">
                           <div class="basic-content__inner" style="max-width:100%;">
                             <h3 class="wp-block-heading" id="">Lue myös:</h3>
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




        <?php foreach( $featured_posts as $post ):

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
                   <?php locate_template('src/parts/global/slidercard-post.php', true, false); ?>
        <?php endforeach; ?>

        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>

                       </div>


                       </div>

                       <div class=" swiper-nav--bottom swiper-nav--right  ">
                         <div class="swiper-button-prev" style="" x-ref="prev"></div>
                             <div class="swiper-button-next" style="" x-ref="next"></div>

                       </div>

                       </div>

                     </div>
                   </div>
                     <?php endif; ?>
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
                  'post_type' => 'post',
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
        <div class="capsule-wrap " style="margin-top:0;"> <a class="btn--basic btn--dark " style=" " href="/artikkelit/">Kaikki artikkelit</a>
       </div>
      </div>

    </div>
  </div>
</section>





         </main><!-- #main -->
     </div><!-- #primary -->



 <?php get_footer();
