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



                   <div class="share-buttons-container">
  <span class="meta-label">Share:</span>
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
<a class="tw-h twitter-share-button"  href="https://twitter.com/intent/tweet" target="_blank">
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
                             <h3 class="wp-block-heading" id="">Read also:</h3>
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
            <div class="cell basic-card article-card swiper-slide" >

              <div class="basic-card__inner">
                <div class="basic-card__image">

            <div class="placeholder-img">
            <img class="" data-src='<?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?>' alt="" src='<?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?>'>

            </div>
            <div class="lazy-img">

            <img class="lazyanim lazyload" data-src="<?php echo get_the_post_thumbnail_url($post_id, "content-image" ); ?>" alt="" src="">
                  </div>

                </div>
                <div class="basic-card__content">
                  <div class="-header">
                    <!-- <?php
                    $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            foreach( $categories as $category ) {
            ?>

            <span class="-cat"><?php echo $category->name; ?></span>

            <?php
            }
            }
            ?> -->
            <?php
            $term = get_field('paakategoria');
            if( $term ): ?>

            <span class="-cat"><?php echo esc_html( $term->name ); ?></span>
            <?php endif; ?>
            <?php if( get_field('pod_number') ): ?>
            <span class="-pod-number"> <span class="pod-number__inner"></span><?php the_field('pod_number'); ?></span>

            <?php endif; ?>

                  </div>
                  <div class="-meta">
                    <p class=" -title f--bold"> <?php echo get_the_title(); ?> </p>

                    <?php
                    if ( ! has_excerpt() ) {
                         echo '';
                       } else {
                              ?>

                            <div class="-desc"> <?php echo the_excerpt(); ?></div>
                            <?php
                        }
                     ?>

                     <?php if( get_field('extra_meta') ): ?>


                             <p class="-guest f--bold"><?php the_field('extra_meta'); ?></p>
                     <?php endif; ?>
                     <div class="capsule-wrap " style="">
                       <?php if( get_field('pod_number') ): ?>
                         <a class="btn--basic btn--dark btn--basic--small" style="" href="<?php the_permalink(); ?>">Tutustu ja kuuntele</a>
                       <?php endif; ?>
                       <?php if( ! get_field('pod_number') ): ?>
                         <a class="btn--basic btn--dark btn--basic--small" style="" href="<?php the_permalink(); ?>">Read more</a>
                       <?php endif; ?>
                  </div>


                  </div>

                </div>
            </div>

                  </div>
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

</section>






         </main><!-- #main -->
     </div><!-- #primary -->



 <?php get_footer();
