<?php
/**
 * @package Lifted
 * @since 1.0
 * @version 1.0
 *

 */

?>





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
  <div class="capsule-wrap " style="margin-top:0;"> <a class="btn--basic btn--dark " style=" " href="/artikkelit">Kaikki artikkelit</a></div>

</div>
