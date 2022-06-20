<?php
/**
 * @package ebikerental
 * @since 1.0
 * @version 1.0
 *

 */

?>

<?php if ( get_field( 'lang' ) == 1 ) { ?>
  <?php if ( have_rows( 'content_block_bottomcta', 316 ) ) : ?>

    <section class="section--basic U-sec-pad section--bottom-cta bg--dark">
              <div class="U_container U_base-pad">
  <?php while ( have_rows( 'content_block_bottomcta', 316 ) ) : the_row(); ?>
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
      <?php $cta_button_copy = get_sub_field( 'cta_button_copy' ); ?>
          <?php if ( $cta_button ) { ?>
        <div class="capsule-wrap">
            <a class="btn--basic -btn-left" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?> ›</a>
              <a class="btn--basic -btn-right" href="<?php echo $cta_button_copy['url']; ?>" target="<?php echo $cta_button_copy['target']; ?>"><?php echo $cta_button_copy['title']; ?> ›</a>
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

  <?php } else { ?>
    <?php if ( have_rows( 'content_block_bottomcta', 8 ) ) : ?>

      <section class="section--basic U-sec-pad section--bottom-cta bg--dark">
                <div class="U_container U_base-pad">
    <?php while ( have_rows( 'content_block_bottomcta', 8 ) ) : the_row(); ?>
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
        <?php $cta_button_copy = get_sub_field( 'cta_button_copy' ); ?>
            <?php if ( $cta_button ) { ?>
          <div class="capsule-wrap">
              <a class="btn--basic -btn-left" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?> ›</a>
                <a class="btn--basic -btn-right" href="<?php echo $cta_button_copy['url']; ?>" target="<?php echo $cta_button_copy['target']; ?>"><?php echo $cta_button_copy['title']; ?> ›</a>
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

  <?php } ?>
