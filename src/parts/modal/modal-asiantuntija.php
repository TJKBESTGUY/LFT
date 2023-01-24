<?php
/**
 * @package Lifted
 * @since 1.0
 * @version 1.0
 *
 * This shows the very top of the site with logo and navigation.
 * The navigation is using data-moveto to move itself into the left panel when the site hits a max-width of --nav-move, a css variable of 800px by default
 */

?>
<div class="modal-item" data-modal="<?php echo get_permalink(); ?>">
  <div class="modal-item__header  modal-item__header--has-image">

<?php $image = get_lzb_meta( 'asiantuntijat-image' ); ?>

<?php
if ( isset( $image['url'] ) ) : ?>
<div class="-image">
<img decoding="async" class="lazy-anim lazyload" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
</div>

<?php endif; ?>
    <div class="-content">

<h1 class="h3 f--bold"><?php the_title( '' ); ?>
  </h1>
  <ul>
    <?php   $repeater = get_lzb_meta( 'asiantuntijat-credentials' ); ?>
    <?php
   foreach ( $repeater as $inner_control ) {
     ?>
      <li><?php echo $inner_control['tag']; ?></li>

     <?php
   }
   ?>

  </ul>
  <h5>

    <div class="modal-contact-info--top">
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

<p><?php echo get_lzb_meta( 'asiantuntijat-text' ); ?></p>




</div>
  </div>



<div class="modal-item__content">
    <?php the_content(); ?>
</div>





<?php if ( get_lzb_meta( 'links' ) ) { ?>
<div class="modal-contact-info--bottom">
    <h4>Ota yhteyttä:</h4>
      <div class="capsule-wrap capsule-wrap--center">
  <?php   $repeater = get_lzb_meta( 'links' ); ?>
  <?php
 foreach ( $repeater as $inner_control ) {
   ?>
  <a class="btn--basic btn--basic--small btn--dark " style=" " href="<?php echo $inner_control['link-format']; ?><?php echo $inner_control['link-url']; ?>"><?php echo $inner_control['link-text']; ?></a>

   <?php
 }
 ?>
   </div>
          </div>
          <?php    }
             ?>



                            <div class="modal-item__footer">

                              <div class="capsule-wrap capsule-wrap--center">
                                <button @click="hideModal" class="btn--basic btn--outline" style=" " href="">Sulje ikkuna</button>
                              </div>


                            </div>
                          </div>
