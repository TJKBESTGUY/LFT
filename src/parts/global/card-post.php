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
<div class="cell basic-card--on-grid article-card" >
  <a class="article-link" href="<?php the_permalink(); ?>">
  <div class="basic-card__inner">
    <div class="basic-card__image">

<div class="placeholder-img">
<img class="" data-src=" <?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?> " alt="" src="<?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?>">

</div>
<div class="lazy-img">

<img class="lazyanim lazyload" data-src="<?php echo get_the_post_thumbnail_url($post_id, "content-image" ); ?>" alt="" src="">
      </div>

    </div>
    <div class="basic-card__content">
      <div class="-header">
        <?php
        $categories = get_the_category();
if ( ! empty( $categories ) ) {
foreach( $categories as $category ) {
?>

<span class="-cat"><?php echo $category->name; ?></span>

<?php
}
}
?>
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

      </div>

      <div class="-footer">
        <span class="-date"><?php echo the_date(); ?></span>
      </div>

    </div>
</div>
</a>
      </div>
