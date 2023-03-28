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

      <?php $aihe = get_the_terms( $post_id, 'aihealueet' ) ?>

<div class="basic-card article-card"
<?php
  if ( ! empty( $aihe ) ) {
      ?>
        data-tax="
     <?php
  foreach( $aihe as $category ) {
  ?>
<?php echo $category->slug; ?>
  <?php
  }
  ?>
  "
  <?php
  }
  ?>
  <?php
    if ( empty( $aihe ) ) {
        ?>
          data-tax="no-tax"
    <?php
    }
    ?>


  >

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
                ?>
            <div class="-desc"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></div>
                 <?php
           } else {

                  ?>

                <div class="-desc"><?php echo the_excerpt(); ?></div>
                <?php
            }
         ?>

         <?php if( get_field('extra_meta') ): ?>


                 <p class="-guest f--bold"><?php the_field('extra_meta'); ?></p>
         <?php endif; ?>
         <div class="capsule-wrap " style="">
      <a class="btn--basic btn--dark btn--basic--small" style="" href="<?php the_permalink(); ?>">Lue</a>
      </div>


      </div>

      <div class="-footer">

      <?php
      if ( ! empty( $aihe ) ) {
      foreach( $aihe as $category ) {
      ?>

      <span class="-cat"><?php echo $category->name; ?></span>

      <?php
      }
      }
      ?>
      </div>

    </div>
</div>

      </div>
