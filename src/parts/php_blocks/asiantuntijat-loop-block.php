<?php
/**
 * @package Lifted
 * @since 1.0
 * @version 1.0
 *

 */

?>

<?php if ( get_field( 'lang' ) == 1 ) { ?>
<?php  $lang = "en"; ?>
<?php } else {
?>
<?php $lang = 2; ?>
<?php } ?>
<div class="module--asiantuntijat-app -x-pad">
  <div class="grid-container">

<?php $args = array(
        'post_type' => 'asiantuntijat',
        'post_status' => 'publish',
        'posts_per_page'   => -1,


    );

    $loop = new WP_Query( $args );


    while ( $loop->have_posts() ) : $loop->the_post();
      ?>

	 <?php if ($lang == en ) { ?>
   <div class="cell basic-card--on-grid person-card person-card--en">
        <div class="basic-card__inner">

            <?php $image = get_lzb_meta( 'asiantuntijat-image' ); ?>

             <?php
            if ( isset( $image['url'] ) ) : ?>
              <div class="person-card__image">
                <picture>

                  <source media="(min-width:450px)" data-srcset="<?php echo wp_get_attachment_image_url( $image['id'], 'content-image--mobile'); ?>" srcset="">
                   <source media="(min-width:0px)" data-srcset="<?php echo wp_get_attachment_image_url( $image['id'], 'content-image--avatar'); ?>" srcset="">
                     <img class="lazy-anim lazyload" data-src='<?php echo wp_get_attachment_image_url( $image['id'], 'content-image--mobile'); ?>' src='<?php echo wp_get_attachment_image_url( $image['id'], 'eq-image'); ?> '>
                   </picture>
                        </div>
            <?php endif; ?>




          <div class="person-card__content">
            <p class="f--bold -name"> <?php the_title( '' ); ?></p>
			   <?php $text = get_lzb_meta( 'asiantuntijat-text-english' ); ?>
			  <?php echo $text; ?>
            <div class="capsule-wrap ">
              <a class="btn--basic btn--basic--small btn--dark" style=" " href="<?php echo get_permalink(); ?>" @click="runModal" data-modal="<?php echo get_permalink(); ?>">Read more in Finnish</a>
            </div>
            <div class="modal-contact-info--card">

              <?php if ( get_lzb_meta( 'links' ) ) { ?>
              <div class="">
                <?php   $repeater = get_lzb_meta( 'links' ); ?>
                <?php
               foreach ( $repeater as $inner_control ) {
                 ?>
                <a class="f--bold" style=" " href="<?php echo $inner_control['link-format']; ?><?php echo $inner_control['link-url']; ?>"><?php echo $inner_control['link-text']; ?></a>

                 <?php
               }
               ?>
             </div>
             <?php    }
                ?>
            </div>
          </div>





      </div>
                <template x-teleport=".module--modal-content">
                        <?php locate_template('src/parts/modal/modal-asiantuntija.php', true, false); ?>
                    </template>

            </div>
<?php } else {
?>



      <div class="cell basic-card--on-grid person-card">
        <div class="basic-card__inner">

            <?php $image = get_lzb_meta( 'asiantuntijat-image' ); ?>

             <?php
            if ( isset( $image['url'] ) ) : ?>
              <div class="person-card__image">
                <picture>

                  <source media="(min-width:450px)" data-srcset="<?php echo wp_get_attachment_image_url( $image['id'], 'content-image--mobile'); ?>" srcset="">
                   <source media="(min-width:0px)" data-srcset="<?php echo wp_get_attachment_image_url( $image['id'], 'content-image--avatar'); ?>" srcset="">
                     <img class="lazy-anim lazyload" data-src='<?php echo wp_get_attachment_image_url( $image['id'], 'content-image--mobile'); ?>' src='<?php echo wp_get_attachment_image_url( $image['id'], 'eq-image'); ?> '>
                   </picture>
                        </div>
            <?php endif; ?>




          <div class="person-card__content">
            <p class="f--bold -name"> <?php the_title( '' ); ?></p>
            <p class="-cv">
              <?php   $repeater = get_lzb_meta( 'asiantuntijat-credentials' ); ?>
              <?php
             foreach ( $repeater as $inner_control ) {
               ?>
                <span><?php echo $inner_control['tag']; ?></span>

               <?php
             }
             ?>

            </p>
            <div class="-areas">
              <?php   $repeater = get_lzb_meta( 'asiantuntijat-areas' ); ?>
              <?php
             foreach ( $repeater as $inner_control ) {
               ?>
                <span><?php echo $inner_control['area']; ?></span>

               <?php
             }
             ?>
            </div>
            <div class="capsule-wrap ">
              <a class="btn--basic btn--basic--small btn--dark" style=" " href="<?php echo get_permalink(); ?>" @click="runModal" data-modal="<?php echo get_permalink(); ?>">Tutustu</a>
            </div>
            <div class="modal-contact-info--card">

              <?php if ( get_lzb_meta( 'links' ) ) { ?>
              <div class="">
                <?php   $repeater = get_lzb_meta( 'links' ); ?>
                <?php
               foreach ( $repeater as $inner_control ) {
                 ?>
                <a class="f--bold" style=" " href="<?php echo $inner_control['link-format']; ?><?php echo $inner_control['link-url']; ?>"><?php echo $inner_control['link-text']; ?></a>

                 <?php
               }
               ?>
             </div>
             <?php    }
                ?>
            </div>
          </div>





      </div>
                <template x-teleport=".module--modal-content">
                        <?php locate_template('src/parts/modal/modal-asiantuntija.php', true, false); ?>
                    </template>

            </div>

	  <?php } ?>

        <?php
    endwhile;

    wp_reset_postdata();  ?>




  </div>
        </div>
