<?php
/**
 * The template for displaying all single posts
 * It does not include a sidebar
 *
 * This is the template that displays all posts by default.
 * New post types can use this and the ign_loop will route it to the right folder in template-parts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ignition
 * @since 1.0
 * @version 1.0
 */
 get_header(); ?>

     <div id="primary" class="content-area">
         <main id="main" class="site-main" role="main">
           <div class="U-nav-spacer">

           </div>

           <section class="section--page-header ">
           <div class="U_container U_base-pad">
           <div class="module--header-block  module--header-block--no-img ">
            <div class="flx-container">
              <div class="cell header-block__meta U-inner-content--x U-inner-content--y">
             <h1 class="base-text">
               <!-- <?php
               $categories = get_the_category();
       if ( ! empty( $categories ) ) {
       foreach( $categories as $category ) {
       ?>

      <?php echo $category->name; ?>

       <?php
       }
       }
       ?> -->
       <?php
       $term = get_field('paakategoria');
       if( $term ): ?>

      <?php echo esc_html( $term->name ); ?>

       <?php endif; ?>
             </h1>

             <div class="">


           <h1 class="h2"><?php echo get_the_title(); ?></h1>
           <?php  if ( has_post_thumbnail() ) {  ?>
            <div class="basic-card__image article-header__image">

        <div class="placeholder-img">
        <img class="" data-src=" <?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?> " alt="" src="<?php echo get_the_post_thumbnail_url($post_id, "eq-image" ); ?>">

        </div>
        <div class="lazy-img">

        <img class="lazyanim lazyload" data-src="<?php echo get_the_post_thumbnail_url($post_id, "content-image" ); ?>" alt="" src="">
              </div>

            </div>
      <?php     }  ?>
             </div>
             </div>



           </div>
           </div>
           </div></section>

           <article class="single-post single-post--legacy -x-pad">
             <div class="single-post--legacy__inner">


          <?php
          if ( have_posts() ):
            while ( have_posts() ) : the_post();
             locate_template('src/parts/global/main-page-loop.php', true, true);
            endwhile; // End of the loop.

          endif;
          ?>
                   </div>
                 </article>


         </main><!-- #main -->
     </div><!-- #primary -->



 <?php get_footer();
