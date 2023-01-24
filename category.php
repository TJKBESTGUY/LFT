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

        $categories = get_the_category();
        $current_cat = $categories[0]->cat_ID;
         $category_id = $categories[0]->name;



         ?>
         <section class="section--page-header ">
         <div class="U_container U_base-pad">
         <div class="module--header-block  module--header-block--no-img " style="background:#ffffff">
          <div class="flx-container">
            <div class="cell header-block__meta U-inner-content--x U-inner-content--y">
           <h1 class="base-text">
            <?php  echo  $category_id; ?>
           </h1>

           <div class="header-block__txt">


         <h2 id=""><?php echo category_description(); ?></h2>





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
                           'taxonomy' => 'category',
                           'hide_empty' => 1,
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
                                <?php locate_template('src/parts/global/card-post.php', true, true); ?>

                        <?php
                      endwhile;
                    endif;

                    ?>
                    <div class="cell basic-card--on-grid article-card" >
                      <div class="basic-card__inner">
                        <div class="basic-card__image">

                          <img src="https://lifted.fi/wp-content/uploads/2022/12/onnistu-muutosjohtamisessa.png" alt="">
                        </div>
                        <div class="basic-card__content">
                          <div class="-header">
                            <span class="-cat">Lifcast</span>
                              <span class="-pod-number"> <span class="pod-number__inner"></span> #004</span>
                          </div>
                          <div class="-meta">
                            <p class=" -title f--bold">Onnistu muutosjohtamisessa </p>
                            <p class="-guest"> <span class="">Vieraana: </span>Sami El-Bash</p>
                          </div>

                          <div class="-footer">
                            <span class="-date">16.7.2022</span>
                          </div>

                        </div>
                    </div>
                          </div>

                                <div class="cell basic-card--on-grid article-card" >
                                  <div class="basic-card__inner">
                                    <div class="basic-card__image">

                                      <img src="https://lifted.fi/wp-content/uploads/2022/11/001-intro.png" alt="">
                                    </div>
                                    <div class="basic-card__content">
                                      <div class="-header">
                                        <span class="-cat">Lifcast</span>
                                          <span class="-pod-number"> <span class="pod-number__inner"></span> #001</span>
                                      </div>
                                      <div class="-meta">
                                        <p class=" -title f--bold">Liftcast on uuden alku!</p>
                                        <p class="-guest"> <span class="">Tätä julkaisua olemme odottaneet. On aika ottaa tärkeä askel ja uudistaa podcastimme ilmettä, soundia ja sisältöä vastaamaan entistä paremmin teidän kuuntelijoiden (ja meidän tekijöiden) tarpeita sekä mielenkiinnon kohteita</p>
                                      </div>

                                      <div class="-footer">
                                        <span class="-date">16.7.2022</span>
                                      </div>

                                    </div>
                                </div>
                                      </div>
                                      <div class="cell basic-card--on-grid article-card">
                                                <div class="basic-card__inner">
                                                  <div class="basic-card__image">

                                                    <img src="https://lifted.fi/wp-content/uploads/2022/11/Tampere-artikkelikuva-2-e1669715903536.jpg" alt="">
                                                  </div>
                                                  <div class="basic-card__content">
                                                    <div class="-header">
                                                      <span class="-cat" style="
                                color: #1ada7b;
                            ">Asiakastarinat</span>
                                                        <span class="-pod-number" style="visibility: hidden"> <span class="pod-number__inner"></span> #001</span>
                                                    </div>
                                                    <div class="-meta">
                                                      <p class=" -title f--bold">Oman työn johtamisen tärkeys tekemisen kaupungissa</p>
                                                      <p class="-guest"> <span class="">Case: </span>Tampere</p>
                                                    </div>

                                                    <div class="-footer">
                                                      <span class="-date">16.7.2022</span>
                                                    </div>

                                                  </div>
                                              </div>
                                                    </div>



                                      <div class="cell basic-card--on-grid article-card" >
                                        <div class="basic-card__inner">
                                          <div class="basic-card__image">

                                            <img src="https://lifted.fi/wp-content/uploads/2022/11/003-Veta%CC%88va%CC%88mpi-tyo%CC%88nantajamielikuva.png" alt="">
                                          </div>
                                          <div class="basic-card__content">
                                            <div class="-header">
                                              <span class="-cat">Lifcast</span>
                                                <span class="-pod-number"> <span class="pod-number__inner"></span> #001</span>
                                            </div>
                                            <div class="-meta">
                                              <p class=" -title f--bold">Vetävämpi työnantajamielikuva</p>
                                              <p class="-guest"> <span class="">Vieraana: </span>Camilla Kylander</p>
                                            </div>

                                            <div class="-footer">
                                              <span class="-date">16.7.2022</span>
                                            </div>

                                          </div>
                                      </div>
                                            </div>
                                            <div class="cell basic-card--on-grid article-card">
                                                      <div class="basic-card__inner">
                                                        <div class="basic-card__image">

                                                          <img src="https://863432.smushcdn.com/1901925/wp-content/uploads/2022/06/2m-it-ja-lifted-e1655369787761.png?lossy=1&amp;strip=1&amp;webp=1" alt="">
                                                        </div>
                                                        <div class="basic-card__content">
                                                          <div class="-header">
                                                            <span class="-cat" style="
                                      color: #1ada7b;
                                  ">Asiakastarinat</span>
                                                              <span class="-pod-number" style="visibility: hidden"> <span class="pod-number__inner"></span> #001</span>
                                                          </div>
                                                          <div class="-meta">
                                                            <p class=" -title f--bold">Paremmilla palaverikäytännöillä tuottavuutta ja hyvinvointia</p>
                                                            <p class="-guest"> <span class="">Case: </span>2M-IT</p>
                                                          </div>

                                                          <div class="-footer">
                                                            <span class="-date">16.7.2022</span>
                                                          </div>

                                                        </div>
                                                    </div>
                                                          </div>








                  </div>
                  <div class="module--archive-nav">

            <?php
            the_posts_pagination( array(
              'prev_text'          => '<span class="iconify" data-icon="carbon:chevron-left"></span><span class="screen-reader-text">' . __( 'Previous page', 'lifted' ) . '</span>',
              'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'lifted' ) . '</span><span class="iconify" data-icon="carbon:chevron-right"></span>',
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
