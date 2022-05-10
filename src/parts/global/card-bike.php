<?php
/**
 * @package ebikerental
 * @since 1.0
 * @version 1.0
 *
 * This shows the very top of the site with logo and navigation.
 * The navigation is using data-moveto to move itself into the left panel when the site hits a max-width of --nav-move, a css variable of 800px by default
 */

?>

<div class="bike-card--on-grid">
      <div class="bike-card__inner">
          <div class="bike-card__header">
        <?php if( get_field('bike_category') == 'lapset'  ) { ?>
   <span class="label--kids f--medium">Lapsille</span>
   <?php } else { ?>
     <span class="label--adults f--medium">aikuisille</span>
      <?php } ?>
        <span class="label--specs f--medium"><?php the_field( 'bike_suspension' ); ?></span>
      </div>
     <?php $bike_image = get_field( 'bike_image' ); ?>
<?php if ( $bike_image ) { ?>
<div class="bike-card__img">
<div class="image-aspect-box">
<div class="image-aspect-box_inner ">
<picture>
  <source media="(min-width:650px)" data-srcset="<?php echo $bike_image['url']; ?>">
    <source media="(min-width:465px)" data-srcset="<?php echo $bike_image['url']; ?>">
      <img class="lazy-anim lazyload" data-src="<?php echo $bike_image['url']; ?>" alt="<?php echo $bike_image['alt']; ?>" src="">
  </picture>

</div>
</div>
</div>
<?php } ?>

<div class="bike-card__content">
  <h4 class="f--bold bike__name"><?php the_field( 'bike_name' ); ?></h4>
  <span class="bike__sub-name"><?php the_field( 'bike_name_sub' ); ?></span>
  <?php if ( have_rows( 'bike_size' ) ) : ?>
    <div class="bike-card__size">

<?php while ( have_rows( 'bike_size' ) ) : the_row(); ?>
<?php
$select_sizes_array = get_sub_field( 'select_sizes' );
if ( $select_sizes_array ):
foreach ( $select_sizes_array as $select_sizes_item ):
?>
<span class="bike-size-span"><?php echo $select_sizes_item; ?></span>
<?php
endforeach;
endif; ?>
<?php if( get_sub_field('text_suomi')  )  { ?>
<span class=""><?php the_sub_field( 'text_suomi' ); ?></span>
<?php } ?>
<?php endwhile; ?>

      </div>
<?php endif; ?>

<p><?php the_field( 'text_content_suomi' ); ?></p>

  </div>


  <?php $link_for_more_information = get_field( 'link_for_more_information' ); ?>
  <?php if ( $link_for_more_information ) { ?>
        <div class="bike-card__footer">
                <div class="-wrap">
            <a class="btn--secondary" href="<?php echo $link_for_more_information['url']; ?>" target="_blank"><?php echo $link_for_more_information['title']; ?></a>
                  </div>
                <span class="f--medium">Tutustu pyörään tarkemmin valmistajan sivuilta</span>
        </div>
  <?php } ?>
</div>
</div>
