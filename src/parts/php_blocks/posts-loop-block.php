<?php
/**
 * @package Lifted
 * @since 1.0
 * @version 1.0
 *

 */

?>
<?php

$args = array(
'posts_per_page'   => -1,
'post_type'        => 'post',
);
$the_query = new WP_Query( $args );

if($the_query->have_posts()) : ?>
<section class="section--basic U-sec-pad">
          <div class="U_container U_base-pad">

<!-- //Wrapper starts -->
<div  class="module--basic-grid basic-grid--valmennus" x-data>
<div class="grid-container">
<!-- ////OUTPUT STARSTS -->

<?php
while($the_query->have_posts()) :
$the_query->the_post();
?>

<div class=" basic-card--on-grid" >
<div class="basic-card__inner">

  <div class="basic-card__img">

</div>

<div class="basic-card__header">
 <h3><?php the_title() ?></h3>
</div>

    <div class="basic-card__content">

<?php the_content() ?>

  </div>

  <div class="basic-card__footer">
    <div class="btn-wrap">
<a href="<?php echo get_permalink(); ?>" @click="runModal" data-id="<?php the_title() ?>">Lue lisää</a>
  </div>
</div>


</div>
</div>





<?php
endwhile; ?>

<!-- ////OUTPUT ENDS////// -->
</div>
</div>
</div>
</section>
<!-- ////Wrapper ends -->




<?php   else:?>


Oops, there are no posts.

<?php
endif;
?>

<?php wp_reset_query(); ?>
