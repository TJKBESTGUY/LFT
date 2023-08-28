<?php
/**
 * @package Lifted
 * @since 1.0
 * @version 1.0
 *

 */

?>


   <?php

   if ( is_page_template( 'page-template/valmennukset.php' ) ) {
   ?>

   <section class="section--workshop-app U-sec-pad--small section-theme--light section-width--normal">
     <div class="U_container U_base-pad">
     <div class="module--workshop-app -x-pad -y-pad">
       <?php $count_posts = wp_count_posts( 'valmennukset' )->publish; ?>

                         <?php
                       // get all the valmennukset tags from the database
                       $var_valmennukset = get_terms( array(
                               'taxonomy' => 'valmennuskategoriatenglish',
                               'hide_empty' => 1,
                       ) );

                            ?>



                         <div class="workshop-nav">
                            <button @click="resetTaxFilters"  class="btn--basic btn--outline" type="button" name="button" data-tax="">All<span></span> </button>

                       <?php
                       foreach ($var_valmennukset as $terms)
                       {
                              ?>
                              <button @click="runTaxFilters"  class="btn--basic btn--outline" type="button" name="button" data-tax="<?php   echo $terms->name; ?>"><?php   echo $terms->name; ?> <span>(<?php  echo $terms->count; ?>)</span> </button>



                              <?php
                             }
                             ?>
   </div>

   <?php
                       foreach ($var_valmennukset as $valmennukset) {
                           // echo '<h3>' . $valmennukset->name. '</h3>';

                           $args = array(
                           'post_type' => 'lectures',
                           'orderby' => 'title',
                           'order' => 'ASC',
                           'posts_per_page' => -1,
                           'tax_query' => array(
                               'relation' => 'AND', // at the same time meet both conditions
                   array(
                       'taxonomy' => 'valmennuskategoriatenglish', // custom tag taxonomy name
                       'field'    => 'term_id',
                       'terms'    => array( $valmennukset->term_id ),
                   ),
                           ),
                       );

                           ?>
                                   <div class="workshop-group-wrap">
                             <?php
                       $query = new WP_Query( $args );
                           if ($query->have_posts()) :
                             ?>








                             <div id="<?php echo  $valmennukset->slug; ?>" class="workshop-group" x-data="{ tax: '<?php echo $valmennukset->name ?>' }" data-tax="<?php echo $valmennukset->name ?>">



                               <div class="workshop-group__heading aside-heading">



                                   <h3 class="f--bold"><?php echo  $valmennukset->name; ?></h3>
                           <?php   echo '<p class="group-desciption">' . $valmennukset->description. '</p>'; ?>

                                 </div>

                                 <div  class="workshop-group__items aside-content">



                                     <?php
                                   while ($query->have_posts()) : $query->the_post();
                                         ?>

                                         <div class="workshop-item info-card">
                                           <div class="cell">

                                           <span class="-cat" x-text="tax"></span>
                                               <h3 class="card-title f--bold"><?php the_title( '' ); ?>
                                               </h3>

                                               <div class="capsule-wrap ">
                       <a class="btn--basic btn--basic--small btn--outline" @click="runModal" data-modal="<?php echo get_permalink(); ?>" href="#">Read more</a>
                       <a class="btn--basic btn--basic--small btn--dark" style=" " href="#" @click="runModalContact">Book</a>
                     </div>
                                         <div class="-footer">
                                           <?php   $repeater = get_lzb_meta( 'valmennukset-tags' ); ?>
                                           <?php
                                          foreach ( $repeater as $inner_control ) {
                                            ?>
                                             <span class="f--bold"><?php echo $inner_control['tag']; ?></span>

                                            <?php
                                          }
                                          ?>
                                             <!-- <span class="f--bold">+ENGLISH</span>   <span class="f--bold">LIVE</span><span class="f--bold">ETÄ</span> -->
                                         </div>
                                         </div>
                                         <div class="cell">
                                           <div class="-list">
                                             <?php   $repeater = get_lzb_meta( 'valmennukset-features' ); ?>
                                             <?php
                                            foreach ( $repeater as $inner_control ) {
                                              ?>

                                               <div class="-item star-li">
                                                     <p class="star-symbol">&#8203; <span class="star-symbol__inner"></span> </p><p><?php echo $inner_control['tag']; ?></p>
                                               </div>

                                              <?php
                                            }
                                            ?>






                                           </div>
                                       </div>

                                       <template x-teleport=".module--modal-content">
                                               <?php locate_template('src/parts/modal/modal-valmennukset-en.php', true, false); ?>
                                           </template>
                                               </div>

                                       <?php
                                   endwhile;
                                     ?>

                                             </div>
                                         </div>


                                     <?php
                                   wp_reset_postdata();
                           endif;
                              ?>
                            </div>
                             <?php
                       }
                   ?>

             </div>
             </div>
       </section>


       <?php
     } else if (get_the_title() == "Palvelut") {
    ?>


   <?php
 } else {
?>


 <?php
 }
?>
