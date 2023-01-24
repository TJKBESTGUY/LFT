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

            <header class="entry-header layout-center-content">
                <div class="container text-center">
                    <h1 class="entry-title">
						<?php if ( is_front_page() ) {
							echo get_bloginfo( 'name' );
						}

						if( is_post_type_archive()){
						    echo post_type_archive_title();
                        } ?>
                    </h1>
                </div>
            </header>


              <section class="section--blog-app  section-theme--color section-width--normal">
                <div class="U_container U_base-pad section-inner-container">
                  <div class="section-bg-container">





                <div class="module--blog-app -x-pad">
                  <div class="workshop-nav">
                     <button @click="resetTaxFilters"  class="btn--basic btn--basic--small btn--dark" type="button" name="button" data-tax="">Kaikki<span></span> </button>


                       <button @click="runTaxFilters"  class="btn--basic  btn--basic--small btn--outline" type="button" name="button">Asiakastarinat</button>
                          <button @click="runTaxFilters"  class="btn--basic btn--basic--small btn--outline" type="button" name="button">Johtaminen</button>
                            <button @click="runTaxFilters"  class="btn--basic btn--basic--small btn--outline" type="button" name="button">Uutiset</button>
                                            <button @click="runTaxFilters"  class="btn--basic btn--basic--small btn--outline" type="button" name="button">Valmennukset</button>

        </div>
                  <div class="grid-container">
                    <?php
                    if ( have_posts() ):
                      while ( have_posts() ) : the_post();
                          ?>
                          <div class="cell basic-card--on-grid article-card" >
                            <a href="<?php the_permalink(); ?>">
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
                                  <p class=" -title f--bold"> <?php echo get_the_title(); ?> </p>
                                  <p class="-guest"> <span class="">Vieraana: </span>Sami El-Bash</p>
                                </div>

                                <div class="-footer">
                                  <span class="-date">16.7.2022</span>
                                </div>

                              </div>
                          </div>
                          </a>
                                </div>
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
                        </div>
                        </div>
                                </div>
                  </section>
                <section class="archive-cards card-grid">
					<?php
					if ( have_posts() ):
						while ( have_posts() ) : the_post();
							ign_template( 'card' );
						endwhile;
					endif;

					?>
                </section><!-- .entry-content -->

                <div class="container card-pagination text-center">
					<?php
					the_posts_pagination( array(
						'prev_text'          => '<span class="iconify" data-icon="carbon:chevron-left"></span><span class="screen-reader-text">' . __( 'Previous page', 'lifted' ) . '</span>',
						'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'lifted' ) . '</span><span class="iconify" data-icon="carbon:chevron-right"></span>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lifted' ) . ' </span>',
					) );
					?>
                </div>



        </main><!-- #main -->
    </div><!-- #primary -->


<?php
get_footer();
