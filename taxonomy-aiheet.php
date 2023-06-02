<?php
/**
 * The main template file
 *
 *
 * It is used to display a page when nothing more specific matches a query.
 *
 * The index page. Default for any archive not created. Duplicate this for new archive pages for post types and rename to archive-{post-type}.php.
 * For the 'post' post type you can duplicate this and rename it home.php
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lifted
 * @since   1.0
 * @version 1.0
 *
 */

get_header();


?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


          <div class="U-nav-spacer">

          </div>

        <?php
          $category = get_category( get_query_var( 'cat' ) );
          $cat_id = $category->cat_ID;
          $cat_name = $category->name;
        // $categories = get_the_category();
        // $current_cat = $categories[0]->cat_ID;
        //  $category_id = $categories[0]->name;



         ?>
         <section class="section--page-header ">
         <div class="U_container U_base-pad">
         <div class="module--header-block  module--header-block--no-img " style="background:#ffffff">
          <div class="flx-container">
            <div class="cell header-block__meta U-inner-content--x U-inner-content--y">
           <h1 class="base-text">
            <!-- <?php  echo  $category_id; ?> -->
            <?php  echo  $cat_name; ?>
           </h1>

           <div class="header-block__txt">


         <h2 id=""><?php echo category_description($cat_id); ?></h2>





           </div>
           </div>



         </div>
         </div>
         </div>
       </section>

              <section class="section--blog-app  section-theme--color section-width--normal">
                <div class="U_container U_base-pad section-inner-container">
                  <div class="section-bg-container">





                <div class="module--blog-app -x-pad">
                  <div class="workshop-nav">
                     <a  href="/artikkelit" class="btn--basic btn--basic--small btn--dark"  data-tax="">Uusimmat Artikkelit</a>
                     <?php
                   // get all the valmennukset tags from the database
                   $var_valmennukset = get_terms( array(
                           'taxonomy' => 'aiheet',
                           'hide_empty' => 0,
                   ) );

                        ?>

                     <?php
                     foreach ($var_valmennukset as $terms)
                     {
                            ?>

                            <a  href="/category/<?php   echo $terms->slug; ?>" class="btn--basic btn--basic--small btn--outline   <?php
                              if ( $terms->name ==  $category_id ) {
                                echo " S-active";
                          }
                               ?>" type="button" name="button" data-tax="<?php   echo $terms->name; ?>"><?php   echo $terms->name; ?> <span>(<?php  echo $terms->count; ?>)</span> </a>


                            <?php
                           }
                           ?>
                           <div class="page-index">
                             Sivu:
                           <?php
                           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                           echo $paged.'/'.$wp_query->max_num_pages;
                           ?>
                              </div>

                </div>
                  <div class="grid-container">
                    <?php
                    if ( have_posts() ):
                      while ( have_posts() ) : the_post();
                          ?>
                                <?php locate_template('src/parts/global/card-post.php', true, false); ?>

                        <?php
                      endwhile;
                    endif;

                    ?>









                  </div>
                  <div class="module--archive-nav">

                    <?php
                    the_posts_pagination( array(
                      'prev_text'          => '<span class="iconify" data-icon="carbon:chevron-left">&#8592;</span><span class="screen-reader-text">' . __( 'Previous page', 'lifted' ) . '</span>',
                      'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'lifted' ) . '</span><span class="iconify" data-icon="carbon:chevron-right">&#8594;</span>',
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lifted' ) . ' </span>',
                    ) );
                    ?>
                  </div>
                        </div>
                        </div>
                                </div>
                  </section>






        </main><!-- #main -->
    </div><!-- #primary -->


<?php
get_footer();
