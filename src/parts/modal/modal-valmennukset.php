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
  <div class="modal-item__header">

    <div class="-content">
         <?php $terms = get_the_terms( get_the_ID(), 'valmennuskategoriat' ); ?>

      <span class="-cat f--bold"><?php foreach ( $terms as $term ){ if ( $term->parent == 0 ) { echo $term->name; }} ?></span>
  <h1 class="h3 f--bold"><?php the_title( '' ); ?>
  </h1>
  <h5>
<?php echo get_lzb_meta( 'valmennukset-description' ); ?>

<p><?php echo get_lzb_meta( 'valmennukset-text' ); ?></p>

</h5>

</div>
</div>


<div class="modal-item__content">
    <?php the_content(); ?>
</div>





                            <div class="capsule-wrap capsule-wrap--center">
                              <a class="btn--basic btn--dark js-modal-contact-btn" style=" " href=""  @click="runModalContact">Varaa / Kysy luennosta</a>
                            </div>
                            <div class="modal-item__footer">
                            <h5 class="f--bold">Aiheen asiantuntijoitamme:</h5>

                              <div class="modal-item__avatars">
                            <?php
                            $featured_posts = get_field('aiheen_asiantuntijat');
                            if( $featured_posts ): ?>

                                <?php foreach( $featured_posts as $post ):

                                    // Setup this post for WP functions (variable must be named $post).
                                    setup_postdata($post); ?>
                                    <div class="module--contact-avatar -y-pad--small">
                                      <div class="contact-avatar__image">
                                        <div class="placeholder-img">
                                          <?php $image = get_lzb_meta( 'asiantuntijat-image' ); ?>
                                          <?php
                                         if ( isset( $image['url'] ) ) : ?>

                                               <img decoding="async" class="lazy-anim lazyload" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">


                                         <?php endif; ?>


                                        </div>
                                        <div class="lazy-img">
                                          <?php
                                         if ( isset( $image['url'] ) ) : ?>
                                           <img decoding="async" class="lazy-anim lazyload" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                                <?php endif; ?>
                                        </div>
                                      </div>
                                      <div class="contact-avatar__content">
                                        <p class="has-text-align-center"><strong> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </strong></p>
                                      </div>

                                    </div>

                                <?php endforeach; ?>

                                <?php
                                // Reset the global post object so that the rest of the page works correctly.
                                wp_reset_postdata(); ?>
                            <?php endif; ?>




                                                    </div>
                              <div class="capsule-wrap capsule-wrap--center">
                                <button @click="hideModal" class="btn--basic btn--outline" style=" " href="">Sulje ikkuna</button>
                              </div>


                            </div>
                          </div>
