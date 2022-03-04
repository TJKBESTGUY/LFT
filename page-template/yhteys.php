<?php
   /*
   Template Name: Ota Yhteyttä
   */
   get_header(); ?>




   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">






      <div class="contact-header-wrap">


      <section class="section--home-header U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--heading_txt contact-header -left-nudge">
            <div class="heading">
                <h1>Ota yhteyttä</h1>
            </div>

            <!-- <div class="flx-container">
              <div class="cell">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              </div>

            </div> -->
          </div>

        </div>

      </section>

      <!-- <div class="contact-sticky-nav">
              <div class="U_container U_base-pad">
                <div class="contact-links -left-nudge">
        <a href="#myynti">Myynti</a>
          <a href="#asiakaspalvelu">Asiakaspalvelu</a>
            <a href="#toimistot">Toimistot</a>
              <a href="#hallinto">Hallinto</a>
              </div>
              </div>
            </div> -->

      <?php if ( have_rows( 'yhteystietojen_lohkot' ) ): ?>
        <div class="contact-sticky-nav">
                <div class="U_container U_base-pad">
                  <div class="contact-links -left-nudge">
                          <a href="#myynti">Myynti</a>
	<?php while ( have_rows( 'yhteystietojen_lohkot' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'henkilosto' ) : ?>

	       <a href="#<?php the_sub_field( 'navigaation_teksti' ); ?>"><?php the_sub_field( 'lohkon_otsikko' ); ?></a>


		<?php elseif ( get_row_layout() == 'toimistot' ) : ?>
	   <a href="#<?php the_sub_field( 'navigaation_teksti' ); ?>"><?php the_sub_field( 'lohkon_otsikko' ); ?></a>


		<?php elseif ( get_row_layout() == 'asiakaspalvelu' ) : ?>
	   <a href="#<?php the_sub_field( 'navigaation_teksti' ); ?>"><?php the_sub_field( 'lohkon_otsikko' ); ?></a>


		<?php endif; ?>
	<?php endwhile; ?>
</div>
</div>
</div>
<?php endif; ?>

          </div>



          <section class="section--basic U-sec-pad__small">
            <div class="U_container U_base-pad">
                <div id="myynti" class="module--contact-sales -border-section" data-scroll>
                  <div class="flx-container">
                    <div class="cell aside-heading">
                      <h4>
                        Myynti
                      </h4>


                    </div>
                    <div class="cell aside-friend contact-sales__persons">
                      <?php if ( have_rows( 'myynti_lohko' ) ) : ?>
	<?php while ( have_rows( 'myynti_lohko' ) ) : the_row(); ?>
    <?php if (get_sub_field('lohkon_selvenne')) { ?>
      <p class="contact-desc"><?php the_sub_field( 'lohkon_selvenne' ); ?></p>
      <?php } ?>
	<?php endwhile; ?>
<?php endif; ?>



                          <?php if ( have_rows( 'henkilo', 'option' ) ) : ?>
        <?php while ( have_rows( 'henkilo', 'option' ) ) : the_row(); ?>
          <div class="area-contact-person <?php the_sub_field( 'kartan_moniarvo' ); ?>" data-areacode="<?php $alue_terms = get_sub_field( 'alue' ); ?><?php if ( $alue_terms ): ?><?php foreach ( $alue_terms as $alue_term ): ?><?php echo $alue_term->slug; ?> <?php endforeach; ?><?php endif; ?>">
              <div class="">
          <?php $kuva = get_sub_field( 'kuva' ); ?>
          <?php if ( $kuva ) { ?>
            <div class="cell area-contact-person__image">
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                <picture>
                  <source media="(min-width:650px)" data-srcset="<?php echo $kuva['url']; ?>">
                    <source media="(min-width:465px)" data-srcset="<?php echo $kuva['url']; ?>">
                      <img class="lazy-anim lazyload" data-src="<?php echo $kuva['url']; ?>" alt="" src="">
                    </picture>

                  </div>
                </div>
          </div>
          <?php } ?>
          <div class="cell area-contact-person__content">
            <h5 class="content__top"><?php the_sub_field( 'alueiden_otsikko' ); ?>
            <span style=""><?php the_sub_field( 'maakunnat' ); ?></span></h5>
            <div class="content__bottom">
              <p class="strong"><?php the_sub_field( 'nimi' ); ?></p>
              <p><?php the_sub_field( 'titteli' ); ?></p>
              <p> <a href="tel:<?php the_sub_field( 'puhelinnumero_maakoodilla' ); ?>"><?php the_sub_field( 'puhelinnumero_tekstimuoto' ); ?></a></p>
                <p> <a href="mailto:<?php the_sub_field( 'sahkoposti' ); ?>"><?php the_sub_field( 'sahkoposti' ); ?></a></p>
            </div>
          </div>


          </div>
              </div>
        <?php endwhile; ?>

      <?php endif; ?>



                    </div>
                  </div>
              </div>
            </div>

          </section>


          <?php if ( have_rows( 'yhteystietojen_lohkot' ) ): ?>
	<?php while ( have_rows( 'yhteystietojen_lohkot' ) ) : the_row(); ?>
<!-- ///LOHKOT ALKAA///// -->

<!-- //HENKIKÖLÖT ALKAA -->

		<?php if ( get_row_layout() == 'henkilosto' ) : ?>
      <section class="section--basic U-sec-pad__small">
        <div class="U_container U_base-pad">
            <div id="<?php the_sub_field( 'navigaation_teksti' ); ?>" class="module--contact-sales -border-section" data-scroll>
              <div class="flx-container">
                <div class="cell aside-heading">
                  <h4>
                  <?php the_sub_field( 'lohkon_otsikko' ); ?>
                  </h4>


                </div>
                <div class="cell aside-friend contact-sales__persons">
                  <?php if (get_sub_field('lohkon_selvenne')) { ?>
                    <p class="contact-desc"><?php the_sub_field( 'lohkon_selvenne' ); ?></p>
                    <?php } ?>
                      <?php if ( have_rows( 'henkilo' ) ) : ?>
                        <?php while ( have_rows( 'henkilo' ) ) : the_row(); ?>
      <div class="area-contact-person " data-areacode="">
          <div class="">
      <?php $kuva = get_sub_field( 'kuva' ); ?>
      <?php if ( $kuva ) { ?>
        <div class="cell area-contact-person__image">
        <div class="image-aspect-box">
          <div class="image-aspect-box_inner Anim-item--img" data-scroll>
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo $kuva['url']; ?>">
                <source media="(min-width:465px)" data-srcset="<?php echo $kuva['url']; ?>">
                  <img class="lazy-anim lazyload" data-src="<?php echo $kuva['url']; ?>" alt="" src="">
                </picture>

              </div>
            </div>
      </div>
      <?php } ?>
      <div class="cell area-contact-person__content">
        <div class="content__bottom -marq-added">
          <p class="strong"><?php the_sub_field( 'nimi' ); ?></p>
          <p><?php the_sub_field( 'titteli' ); ?></p>
          <p> <a href="tel:<?php the_sub_field( 'puhelinnumero_maakoodilla' ); ?>"><?php the_sub_field( 'puhelinnumero_tekstimuoto' ); ?></a></p>
            <p> <a href="mailto:<?php the_sub_field( 'sahkoposti' ); ?>"><?php the_sub_field( 'sahkoposti' ); ?></a></p>
        </div>
      </div>
      </div>
          </div>
    <?php endwhile; ?>

  <?php endif; ?>
                </div>
              </div>
          </div>
        </div>

      </section>

<!-- //HENKIKÖLÖT LOPPUUU -->

<!-- //TOIMISTOT ALKAA -->

		<?php elseif ( get_row_layout() == 'toimistot' ) : ?>



      <section class="section--basic U-sec-pad__small">
        <div class="U_container U_base-pad">
            <div  id="<?php the_sub_field( 'navigaation_teksti' ); ?>" class="module--contact-offices -border-section" data-scroll>
              <div class="flx-container">
                <div class="cell aside-heading">
                  <h4>
                	<?php the_sub_field( 'lohkon_otsikko' ); ?>
                  </h4>
                </div>
                <div class="cell aside-friend contact-offices-wrapper">
                  <?php if (get_sub_field('lohkon_selvenne')) { ?>
                    <p class="contact-desc"><?php the_sub_field( 'lohkon_selvenne' ); ?></p>
                    <?php } ?>
                  <div class="map-box">
                    <div class="map-box-inner">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.100505269999!2d24.926335316372512!3d60.19561958197036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46920bccd23400dd%3A0x86c198bac66fa98b!2sAreite%20Oy!5e0!3m2!1sen!2sfi!4v1645627455699!5m2!1sen!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                  </div>
                  <?php if ( have_rows( 'yksittainen_toimisto' ) ) : ?>
                      <div class="contact-offices__locations">
                          <div class="flx-container">
                    <?php while ( have_rows( 'yksittainen_toimisto' ) ) : the_row(); ?>
                          <div class="cell areite-office">
                      <h5><?php the_sub_field( 'nimi' ); ?></h5>
                      <?php the_sub_field( 'tiedot' ); ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                      </div>
                <?php endif; ?>




                </div>
              </div>
          </div>
        </div>

      </section>

<!-- //TOIMISTOT LOPPUUU -->

<!-- //ASIAKASPALVELU ALKAA-->

		<?php elseif ( get_row_layout() == 'asiakaspalvelu' ) : ?>

      <section class="section--basic U-sec-pad__small">
        <div class="U_container U_base-pad">
            <div id="<?php the_sub_field( 'navigaation_teksti' ); ?>" class="module--contact-customer-service -border-section" data-scroll>
              <div class="flx-container">
                <div class="cell aside-heading">
                  <h4>
                	<?php the_sub_field( 'lohkon_otsikko' ); ?>
                  </h4>
                </div>
                <div class="cell aside-friend ">
                  <?php if (get_sub_field('lohkon_selvenne')) { ?>
                    <p class="contact-desc"><?php the_sub_field( 'lohkon_selvenne' ); ?></p>
                    <?php } ?>

                    <?php if ( have_rows( 'yhteystiedot' ) ) : ?>
                        <div class="contact-offices__content">
                            <div class="flx-container">
                      <?php while ( have_rows( 'yhteystiedot' ) ) : the_row(); ?>
                            <div class="cell">
                      <h5><?php the_sub_field( 'nimi' ); ?></h5>
                        <?php $linkki = get_sub_field( 'linkki' ); ?>
                        <?php if ( $linkki ) { ?>
                        <p><a href="<?php echo $linkki['url']; ?>" target="<?php echo $linkki['target']; ?>"><?php echo $linkki['title']; ?></a></p>
                        <?php } ?>
                            </div>
                      <?php endwhile; ?>
                      </div>
                          </div>
                    <?php endif; ?>


                        <div class="contact-offices__content">
                          <div class="flx-container">
                            <div class="cell">
                                  <h5>Puhelin</h5>
                                  <p>09 586 0030</p>
                            </div>
                            <div class="cell">
                              <h5>Sähköposti</h5>
                              <p>areite@areite.fi</p>
                            </div>


                          </div>
                            </div>

                </div>


                </div>
              </div>
          </div>


      </section>

<!-- //ASIAKASPALVELU LOPPUU-->

		<?php endif; ?>
	<?php endwhile; ?>

<?php endif; ?>

      <section class="section--basic U-sec-pad__small">
        <div class="U_container U_base-pad">
            <div id="" class="module--contact-sales -border-section" data-scroll>
              <div class="flx-container">
                <div class="cell aside-heading">
                  <h4>
                    Myynti
                  </h4>


                </div>
                <div class="cell aside-friend contact-sales__persons">
                      <p class="contact-desc">Ota yhteyttä myyntihenkilöstöön, jos sinulla on kysymyksiä laskentakohteistamme. Laskennassa olevat kohteet voit nähdä laskentakohteet-sivuilta.</p>


                      <?php if ( have_rows( 'henkilo', 'option' ) ) : ?>
  	<?php while ( have_rows( 'henkilo', 'option' ) ) : the_row(); ?>
      <div class="area-contact-person <?php the_sub_field( 'kartan_moniarvo' ); ?>" data-areacode="<?php $alue_terms = get_sub_field( 'alue' ); ?><?php if ( $alue_terms ): ?><?php foreach ( $alue_terms as $alue_term ): ?><?php echo $alue_term->slug; ?> <?php endforeach; ?><?php endif; ?>">
          <div class="">
      <?php $kuva = get_sub_field( 'kuva' ); ?>
      <?php if ( $kuva ) { ?>
        <div class="cell area-contact-person__image">
        <div class="image-aspect-box">
          <div class="image-aspect-box_inner Anim-item--img" data-scroll>
            <picture>
              <source media="(min-width:650px)" data-srcset="<?php echo $kuva['url']; ?>">
                <source media="(min-width:465px)" data-srcset="<?php echo $kuva['url']; ?>">
                  <img class="lazy-anim lazyload" data-src="<?php echo $kuva['url']; ?>" alt="" src="">
                </picture>

              </div>
            </div>
      </div>
      <?php } ?>
      <div class="cell area-contact-person__content">
        <h5 class="content__top"><?php the_sub_field( 'alueiden_otsikko' ); ?>
        <span style=""><?php the_sub_field( 'maakunnat' ); ?></span></h5>
        <div class="content__bottom">
          <p class="strong"><?php the_sub_field( 'nimi' ); ?></p>
          <p><?php the_sub_field( 'titteli' ); ?></p>
          <p> <a href="tel:<?php the_sub_field( 'puhelinnumero_maakoodilla' ); ?>"><?php the_sub_field( 'puhelinnumero_tekstimuoto' ); ?></a></p>
            <p> <a href="mailto:<?php the_sub_field( 'sahkoposti' ); ?>"><?php the_sub_field( 'sahkoposti' ); ?></a></p>
        </div>
      </div>


      </div>
          </div>
  	<?php endwhile; ?>

  <?php endif; ?>



                </div>
              </div>
          </div>
        </div>

      </section>

      <section class="section--basic U-sec-pad__small">
        <div class="U_container U_base-pad">
            <div id="asiakaspalvelu" class="module--contact-customer-service -border-section" data-scroll>
              <div class="flx-container">
                <div class="cell aside-heading">
                  <h4>
                  Asiakaspalvelu
                  </h4>
                </div>
                <div class="cell aside-friend ">
                    <p class="contact-desc">Haluatko kuulla lisää tuotteistamme? Autamme mielellämme! Ota yhteyttä asiakaspalveluumme puhelimitse tai sähköpostitse.</p>
                        <div class="contact-offices__content">
                          <div class="flx-container">
                            <div class="cell">
                                  <h5>Puhelin</h5>
                                  <p>09 586 0030</p>
                            </div>
                            <div class="cell">
                              <h5>Sähköposti</h5>
                              <p>areite@areite.fi</p>
                            </div>


                          </div>
                            </div>

                </div>


                </div>
              </div>
          </div>


      </section>




            <section class="section--basic U-sec-pad__small">
              <div class="U_container U_base-pad">
                  <div  id="toimistot" class="module--contact-offices -border-section" data-scroll>
                    <div class="flx-container">
                      <div class="cell aside-heading">
                        <h4>
                        Toimistot
                        </h4>
                      </div>
                      <div class="cell aside-friend contact-offices-wrapper">
                        <div class="map-box">
                          <div class="map-box-inner">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.100505269999!2d24.926335316372512!3d60.19561958197036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46920bccd23400dd%3A0x86c198bac66fa98b!2sAreite%20Oy!5e0!3m2!1sen!2sfi!4v1645627455699!5m2!1sen!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                          </div>

                        </div>
                        <div class="contact-offices__locations">
                          <div class="flx-container">
                            <div class="cell areite-office">
                              <h5>Helsinki</h5>
                              <p>Esterinportti 2C,</p>
                              <p>00240 Helsinki</p>
                            </div>
                            <div class="cell areite-office">
                              <h5>Joensuu</h5>
                              <p>Jokikatu 7 LT2,,</p>
                              <p>80220 Joensuu</p>
                            </div>
                            <div class="cell areite-office">
                              <h5>Kuopio</h5>
                              <p>Puutarhakatu 9 B1,</p>
                              <p>70300 Kuopio</p>
                            </div>
                            <div class="cell areite-office">
                              <h5>Lappeenranta</h5>
                              <p>Ainonkatu 7,</p>
                              <p>53100 Lappeenranta</p>
                            </div>
                            <div class="cell areite-office">
                              <h5>Oulu</h5>
                              <p>Kasarmintie 23,</p>
                              <p>90130 Oulu</p>
                            </div>
                            <div class="cell areite-office">
                              <h5>Rovaniemi</h5>
                              <p>Rovakatu 29,</p>
                              <p>96200 Rovaniemi</p>
                            </div>
                            <div class="cell areite-office">
                              <h5>Seinäjoki</h5>
                              <p>Tiedekatu 2,</p>
                              <p>60320 Seinäjoki</p>
                            </div>


                          </div>

                        </div>
                      </div>
                    </div>
                </div>
              </div>

            </section>




            <section class="section--basic U-sec-pad__small">
              <div class="U_container U_base-pad">
                  <div  id="hallinto"  class="module--contact-customer-service -border-section" data-scroll>
                    <div class="flx-container">
                      <div class="cell aside-heading">
                        <h4>
                        Hallinto
                        </h4>
                      </div>
                      <div class="cell aside-friend ">
                          <p class="contact-desc">Haluatko kuulla lisää tuotteistamme? Autamme mielellämme! Ota yhteyttä asiakaspalveluumme puhelimitse tai sähköpostitse.</p>
                              <div class="contact-offices__content">
                                <div class="flx-container">
                                  <div class="cell">
                                        <h5>Puhelin</h5>
                                        <p>09 586 0030</p>
                                  </div>
                                  <div class="cell">
                                    <h5>Sähköposti</h5>
                                    <p>areite@areite.fi</p>
                                  </div>


                                </div>
                                  </div>

                      </div>


                      </div>
                    </div>
                </div>


            </section>


              <section class="section--basic U-sec-pad"></section>
                <section class="section--basic U-sec-pad"></section>






    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
