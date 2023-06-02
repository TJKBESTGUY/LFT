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

          <?php $content = get_the_content(false, false, 954);
          $myblocks = parse_blocks($content);
          foreach($myblocks as $block){

          	if($block['blockName'] == 'lazyblock/page-header-block-flex'){
          		echo render_block($block);
          	}
          } ?>


              <section class="section--blog-app  section-theme--color section-width--normal">
                <div class="U_container U_base-pad section-inner-container">
                  <div class="section-bg-container">





                <div class="module--blog-app -x-pad">
                  <div class="workshop-nav">

                     <a  href="/artikkelit" class="btn--basic btn--basic--small btn--dark"  data-tax="">Uusimmat Artikkelit</a>
                     <?php
                   // get all the valmennukset tags from the database
                   $var_cat = get_terms( array(
                           'taxonomy' => 'aiheet',
                           'hide_empty' => 0,
                             'parent' => 0,
                   ) );

                        ?>
                     <?php
                     foreach ($var_cat as $terms)
                     {
                            ?>
                            <a  href="/aiheet/<?php   echo $terms->slug; ?>" class="btn--basic btn--basic--small btn--outline" type="button" name="button" data-tax="<?php   echo $terms->name; ?>"><?php   echo $terms->name; ?> <span>(<?php  echo $terms->count; ?>)</span> </a>


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
        <!-- <div class="workshop-nav">
          <h4>Aihealueet:</h4>
           <?php
         // get all the valmennukset tags from the database
         $var_aiheet = get_terms( array(
                 'taxonomy' => 'aihealueet',
                 'hide_empty' => 1,
         ) );

              ?>
           <?php
           foreach ($var_aiheet as $terms)
           {
                  ?>
                  <a  href="/aihealueet/<?php   echo $terms->slug; ?>" class="btn--basic btn--basic--small btn--outline" type="button" name="button" data-tax="<?php   echo $terms->name; ?>"><?php   echo $terms->name; ?> <span>(<?php  echo $terms->count; ?>)</span> </a>


                  <?php
                 }
                 ?>

</div> -->


                  <div class="grid-container">

                      <?php


                       ?>


                       <?php
//                        $args = array(
//     'post_type' => 'post',
//     'orderby' => 'date',
//     'order' => 'DESC',
//     'tax_query' => array(
//         'relation' => 'AND',
//         array(
//             'taxonomy' => 'category',
//             'field'    => 'term_id',
//             'terms'    => array( 11, 20 ),
//             'operator' => 'NOT IN',
//         ),
//     ),
//       'paged' => $_POST['paged'],
// );

$ajaxposts = new WP_Query([
  'post_type' => 'post',
  'orderby' => 'date',
  'order' => 'DESC',
    'posts_per_page' => 12,
  'tax_query' => array(
      'relation' => 'AND',
      array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => array( 11 ),
          'operator' => 'NOT IN',
      ),
  ),
    'paged' => $_POST['paged'],
]);


 ?>

 <?php if($ajaxposts->have_posts()): ?>

 <?php
   while ($ajaxposts ->have_posts()): $ajaxposts->the_post();
       locate_template('src/parts/global/card-post.php', true, false);
   endwhile;
 ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

                  </div>

                  <div class="posts-more-container grid-container" style="margin-top:20px">

                                </div>


                                <div class="article-loading">


                            <div class="capsule-wrap">
              <button  class="btn--basic btn--outline" id="load-more">Lataa lisää</button>

              </div>
              <div class="article-loading-done f--sans" style="display:none">
              Kaikki artikkelit on ladattuna
              </div>
              </div>



                  <div class="module--archive-nav">


                  </div>
                        </div>
                        </div>
                                </div>
                  </section>






        </main><!-- #main -->
    </div><!-- #primary -->



    <script type="text/javascript">

function loadMore(paged) {
  $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'json',
    data: {
      action: 'weichie_load_more',
      paged,
    },
    success: function (res) {
      console.log(paged);
      console.log(res.max);
      if(paged >= res.max) {
        $('#load-more').hide();
        console.log("nomore pages");
          $('.article-loading-done').show();

      }
      $('.posts-more-container').append(res.html);
    }
  });
}


let newPage = 1;
$('#load-more').on('click', function(){
  loadMore(newPage + 1);
  newPage++;
});
</script>


<?php
get_footer();
