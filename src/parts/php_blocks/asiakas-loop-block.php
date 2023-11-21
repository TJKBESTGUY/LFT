<?php
/**
 * @package Lifted
 * @since 1.0
 * @version 1.0
 *

 */

?>







<div class="module--blog-app -x-pad">

  <div class="flx-container">

    <?php $args = array(
            'post_type' => 'any',
            'post_status' => 'publish',
            'category_name' => $args['cat'],
            'posts_per_page' => $args['num'],


        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
          ?>

    <?php locate_template('src/parts/global/button-card-post.php', true, false); ?>

            <?php
        endwhile;

        wp_reset_postdata();  ?>
</div>
</div>
