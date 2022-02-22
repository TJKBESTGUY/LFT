<?php
   /*
   Template Name: Laskentakohteet
   */
   get_header(); ?>


<!-- BACEND QUERY  -->


<?php

$posts_laskenta = get_posts(array(
 'posts_per_page'	=> 200,
 'post_type'			=> 'laskentakohteet',
 'orderby'=> 'title',
 'order' => 'ASC',
));
?>

<!-- Current date -->
<?php $today = date('Ymd'); ?>





   <!-- BACKEND QUERY END -->

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">


    <section class="section--laskentakohteet-header U-sec-pad">
      <div class="U_container U_base-pad">
        <div class="module--laskenta-count--on-page">
          <div class="flx-container">
            <div class="cell laskenta-count__number">
                <span class="Anim-item--counter -bold-txt"  data-scroll data-type="counter" data-value="42">32</span>
            </div>
            <div class="cell laskenta-count__label">
              <span class="h2">Määrälaskennassa<br>olevaa kohdetta</span>
            </div>
          </div>


        </div>
      </div>

    </section>


      <section class="section--laskentakohteet-app U-sec-pad">
          <div class="U_container U_base-pad">

            <div class="module--laskentakohteet-navigation">
                  <div class="flx-container">
              <nav class="laskentakohteet-navigation__filters">
                <ul>
                <li class="S-active__area">
                  <button class="filter-buttton__all-results js--area-filter S-active__area" type="button" name="button" data-area="all">Kaikki</button>
                </li>
                <li>
                    <button class="filter-buttton__area js--area-filter" type="button" name="button" data-area="paakaupunkiseutu">Pääkaupunkiseutu</button>
                </li>
                <li>
                    <button class="filter-buttton__area js--area-filter" type="button" name="button" data-area="etela-suomi">Etelä-Suomi</button>
                </li>
                <li>
                  <button class="filter-buttton__area js--area-filter" type="button" name="button" data-area="ita-suomi">Itä-Suomi</button>
                </li>
                <li>
                <button class="filter-buttton__area js--area-filter" type="button" name="button" data-area="pohjois-suomi">Pohjois-Suomi</button>
                </li>
                    </ul>
                      </nav>


              <div class="laskentakohteet-navigation__cta">
                <button class="basic-btn btn--black js--show-form-modal" type="button" name="button">Pyydä tarjous</button>
              </div>



            </div>
                </div>

                <div class="module--laskentakohteet-area-personel S-disabled">
                  <div class="label">
                    Alueen yhteyshenkilö:
                  </div>

                  <?php if ( have_rows( 'henkilo', 'option' ) ) : ?>
	<?php while ( have_rows( 'henkilo', 'option' ) ) : the_row(); ?>
    <?php $kuva = get_sub_field( 'kuva' ); ?>

    <div class="contact-person 	<?php $alue_terms = get_sub_field( 'alue' ); ?><?php if ( $alue_terms ): ?><?php foreach ( $alue_terms as $alue_term ): ?> <?php echo $alue_term->slug; ?><?php endforeach; ?><?php endif; ?>" data-area="">
          <div class="flx-container">
            <?php if ( $kuva ) { ?>
            <div class="contact-person__img">
              <div class="image-aspect-box">
                <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo $kuva['url']; ?>">
                      <source media="(min-width:465px)" data-srcset="<?php echo $kuva['url']; ?>">
                        <img class="lazy-anim lazyload" data-src="<?php echo $kuva['url']; ?>" alt="" src="<?php echo $kuva['url']; ?>">
                      </picture>

                    </div>
                  </div>
            </div>

                  <?php } ?>
                    <div class="contact-person__info">
	<?php the_sub_field( 'nimi' ); ?>  |	<?php the_sub_field( 'sahkoposti' ); ?>  |	<?php the_sub_field( 'puhelinnumero_tekstimuoto' ); ?> 	| 	<?php the_sub_field( 'puhelinnumero_maakoodilla' ); ?>
                            </div>


      </div>
        </div>
	<?php endwhile; ?>

<?php endif; ?>


                  <div class="contact-person" data-area="pohjois">
                    <div class="flx-container">
                      <div class="contact-person__img">
                        <div class="image-aspect-box">
                          <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                            <picture>
                              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
                                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
                                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/6.jpg" alt="" src="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
                                </picture>

                              </div>
                            </div>
                      </div>
                      <div class="contact-person__info">
                        Pohjois-Suomi | 050 467 0910 | henkilö@areite.fi
                      </div>
                    </div>
                  </div>

                    </div>


            <div class="module--laskentakohteet-app -full-app">

              <table class="sortable">
                <thead class="laskentakohteet-app__header">
                  <tr class="">
                    <th class="sticky--th tr--kohde no-sort">
                      <span>Kohde</span>
                    </th>
                    <th class="sticky--th js--main-sort"><span>Tyyppi</span></th>
                    <th class="sticky--th"><span>Bruttoala m<sup>2</sup></span></th>

                      <th class="sticky--th"><span>Tilavuus m<sup>3</sup></span></th>
                        <th class="sticky--th"><span>Tarjous pvm</span></th>
                              <th class="sticky--th"><span>Valmistuu</span></th>

                  </tr>
                </thead>

                <tbody class="laskentakohteet-app__body">

                  <?php	if( $posts_laskenta ): ?>
                    <?php foreach( $posts_laskenta as $post ):
                      setup_postdata( $post ); ?>

                      <?php $alue_term = get_field( 'alue' ); ?>
                      <?php $id = get_the_ID(); ?>

                    <tr id="<?php echo $id; ?>" class="Anim-item--list js--show-form-modal" data-area="<?php if ( $alue_term ): ?><?php echo $alue_term->slug; ?><?php endif; ?>">

                       <?php if ( have_rows( 'kohde' ) ) : ?>
                  	<?php while ( have_rows( 'kohde' ) ) : the_row(); ?>
                      <td class="td--kohde">
                        <div class="flx-container">
                          <?php if( get_sub_field('rakennuttaja') ): ?>
                                <span class="td__label"><?php the_sub_field( 'rakennuttaja' ); ?></span>
                           <?php endif; ?>
                           <?php if(!get_sub_field('rakennuttaja') ): ?>
                                   <span class="td__label">&#8203;</span>
                            <?php endif; ?>

                        <span class="td__name"><?php the_sub_field( 'kohteen_osoite' ); ?></span>
                        <span class="td__xtra-info">
                          <span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg"><?php echo $alue_term->name; ?></span>
                        <?php if( get_sub_field('lisatiedot') ): ?>
                          <span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg"><?php the_sub_field( 'lisatiedot' ); ?></span>
                         <?php endif; ?>
                      </span>
                        </div>
                      </td>
                  	<?php endwhile; ?>
                  <?php endif; ?>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name"><?php the_field( 'kohteen_tyyppi' ); ?></span>
                      <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name"><?php the_field( 'bruttoala_m2' ); ?></span>
                      <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name"><?php the_field( 'tilavuus_m3' ); ?></span>
                      <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name"><?php the_field( 'tarjous_pvm' ); ?></span>
                      <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                        <?php if ( have_rows( 'valmistuu' ) ) : ?>
  	<?php while ( have_rows( 'valmistuu' ) ) : the_row(); ?>
  		<?php $date = get_sub_field( 'valmistumisaika', false, false ); ?>

      <?php if ($date < $today and ($date )) { ?>
            <span class="td__name -yellow">Valmis</span>
        <?php } else { ?>
              <span class="td__name"><?php the_sub_field( 'viikko' ); ?></span>

          <?php } ?>

  	<?php endwhile; ?>
  <?php endif; ?>


  <?php if( get_sub_field('valmistumisen_lisatiedot') ): ?>
        <span class="td__xtra-info"><?php the_sub_field( 'valmistumisen_lisatiedot' ); ?></span>
   <?php endif; ?>
   <?php if(!get_sub_field('valmistumisen_lisatiedot') ): ?>
             <span class="td__xtra-info">&#8203;</span>
    <?php endif; ?>
                      </div>
                    </div>
    <div class="tr__hover-action-indicator">Pyydä tarjous</div>
                  </td>

                        </tr>
                     <?php endforeach; ?>
                     <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">Pisan päiväkoti</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Saneeraus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">1087</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">24899</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">16.02.2022</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 50</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>


                  </tr>

                  <tr class="Anim-item--list" data-area="ita">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Itä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>


                  </tr>


                  <tr class="Anim-item--list" data-area="paakaupunki">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">Heka</span>
                      <span class="td__name">Maunula Töyrytie 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pääkaupunkiseutu</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 92 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Laajennus,<br>Saneeraus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">8187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">24499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.12.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name -yellow">Valmis</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>


                  </tr>

                  <tr class="Anim-item--list" data-area="pohjois">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">Heka</span>
                      <span class="td__name">Maunula Töyrytie 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pohjois-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 92 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Laajennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">8187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">24499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.12.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name -yellow">Valmis</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>


                  </tr>

                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">Viimeistään 15.06.2020</span>
                      </div>
                    </td>


                  </tr>
                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">Viimeistään 15.06.2020</span>
                      </div>
                    </td>


                  </tr>
                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">Viimeistään 15.06.2020</span>
                      </div>
                    </td>


                  </tr>
                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">Viimeistään 15.06.2020</span>
                      </div>
                    </td>


                  </tr>
                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">Viimeistään 15.06.2020</span>
                      </div>
                    </td>


                  </tr>
                  <tr class="Anim-item--list" data-area="etela">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Etelä-Suomi</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
                      </div>


                    </td>

                    <td class="td--basic-cell">
                      <div class="">
                        <div class="flx-container">
                          <span class="td__label">&#8203;</span>
                        <span class="td__name">Uudisrakennus</span>
                        <span class="td__xtra-info">&#8203;</span>
                        </div>
                      </div>

                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">19187</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">120499</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>

                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">15.09.2021</span>
                        <span class="td__xtra-info">&#8203;</span>
                      </div>
                    </td>
                    <td class="td--basic-cell">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">vko 49</span>
                        <span class="td__xtra-info">Viimeistään 15.06.2020</span>
                      </div>
                    </td>


                  </tr>






                </tbody>

              </table>

            </div>
          </div>

      </section>

<div class="laskentakohteet-bottom-wrapper">



      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading-content">
                <div class="heading">
              <h3>Kiinnostuitko jostain kohteesta?<br>Pyydä tarjous lomakkeen kautta tai ottamalla yhteyttä alueen yhteyshenkilöön.</h3>
                </div>
                <div class="capsule-wrap">
                <button class="basic-btn btn--black" type="button" name="button"><span class="basic-btn__text">Pyydä tarjous</span> <span class="basic-btn__icon">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"></path></svg>
                </span> </button>
                <button class="basic-btn btn--yellow" type="button" name="button"><span class="basic-btn__text">Näytä yhteyshenkilöt</span> <span class="basic-btn__icon">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"></path></svg>
                </span> </button>
              </div>
            </div>
          </div>

        </div>

      </section>

      <section class="section--area-contact U-sec-pad">
            <div class="U_container U_base-pad">
              <div class="module--area-contact">
                <div class="heading-content">
                <div class="heading">
                    <h3>Alueiden yhteyshenkilöt</h3>
                </div>
                <div class="flx-container -hover-parent">
                  <div class="cell area-contact__map">
                    <div class="sticky-map">

                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 780"><defs><style>.cls-1{fill:#333;}.cls-2{fill:#545454;}</style></defs><rect class="cls-1" width="596" height="780"/><path class="cls-2 js--area-hover-item  -hc-filter__target" data-areacode="pohjois-suomi " d="M149.06,533.27l1.06.79.2,1.33-2,3.29-.45,3.79.94,1-1.21,4.86,1.31,2,4.42.22-.14,1.44-2.07,2.77v2.29l3,1.19.32,1.64-2.42,2.59.09,2.29-1.57,2.57-1.47,5.58,1.17,1.95,3.09-2.81,7.19-.85,2.88,2.64,5.85,1,7.74-6.58h2.18l4.19-6.44,3.07-.11,2.94-6,4.6,2.28,7.54,0,5.82-3.17,3.28-5.79,5.49,2.15.69-1.76,4.69.67,5.52-4.55,3.61,2.3.58,4.8.81.33,4-4.59,5.17.75,1.17-2.15,4.18-.06.93-6.32-1.76-2.4,1.28-1.83-.87-2.65-3.81-10,1.61-1.26-2.15-2.89-1.06-8.59,2.53-3.52,1.64-1,5.7-2.1,3.56.78.48-13.13,5.5-5.86,2.91-.5,2.8-.31,1.28-8,4.27-1.77,9.75,6.69H286l2.49,2.08,1.6,3.37,4.61,0,3.14-8.9,1.4-.83-1.51-15.24,10.79-10,7.69-2.59,9,3.43,10.55.8,13,8.31,7,8.08,5-11.63,14.48,2.68,21.21-3.79,3.88,9.88,1.82-2,6.43.58,5.42-3.86L421,444.61l-2.15-10-11-7.56-3.14-8.47,0-4.63,2.24-2,.13-4.08-2.15-2.7.9-3.25-10.27-2.11-3-11.63,1.09-4.09,3.92-1.3,1.55-3.21-1.42-1.89,1.73-3.56-1.65-1.92-5.33-.49,2.23-7.53.44-6.61.67-2.25h0l1.13-3.82-2.17-3.6,5.75-3.83,3.91-.37-1.78-12.47-6-17.16-5.05-7.43-3.81-10.27-2.44-6.53-13.14-22.18,1.52-5,20-37.49.76-9.18-9.4-7-9.64-19.67-14.73-6-5-20.79,5.87-10.57,1.32-9.47-1.66-2.81-6.68,0,11-9.24-2.09-7.36.71-6.87,10.56-13.73-6-15.22L350.92,78.5l-.41-3.87-5.44-3.42-5.64-7.86-3.18,2-3.14-1-2.18,3.16-8.71,6.91-10.06-2.62-5.78,2-3.53,8.4-6,5.29L294,92.21l1.13,3.25L293.18,99l-3.73,21.33.76,12.67-2,7.13L284,139l-3.76,2.26-5.12,7.53.57,7.29-3.51,0L271,158.65,266,152.59l-8.89-3.89-8.4-6.22-4.25,2.23-2.24,4-5.62,2-5.94,2.68-1.41-2.93-6.54-.68-6.25-4.52-3.61,1.52.42-7L199,110.79l-8.43-2.93-5.25,2.58-3.52,4.21,2.06,5.46-1.06,3.69-6.65-5.15-4.71,4.61,6,7.82.36,5.36,4.63,1.25,6.64,13.78L194,153l1.77,4.47,4.53,2.21,1.83,5.31,6.63,1.51,8.83,4.05,9.58,8.83,0,5.89,1.26,3.46,2.93-.41,1.22,5.81,5.38,5.61-2.24,2.66-1.77,3-.08,3.76.24,11.56L231,228.57l2.37,4.27,5.62,1L237.59,237l1.09,3.72-4.83,2.51-.23,6.41,9.68,22.37L239.74,276l-.7,11.45-3.6,3.12-1,3.16-1.22,3.77.85,3.41-.94,2.44,1.6,7.93,4.11,4,.22,4.2,3.42,5.58.3,4,2.07,5.57.05,4.48,2.26-.26,1.58-2.51,2,2.36,4.26,1.58,1.33,2-1.5,3.14,1.08,1.24,2.07-1.35.8,2.59,1.68-.17,1.42-1.16,2.84.42,1.69,2.19,1.8-.17,1.71,1.75.12,2.66h1.42l1-.87,3.8,6.77-.21,2.53-1.66,1.77v3l-1.28,1.56,1.11,2.05,0,6.34-1.77,2.37.9,1.95,2.53,1.46,1.07,2,.64,4.23,1.92,2-.16,1.15-1.3-.06L275,389.2l-2.73-.24-.48,1.36.24,1.74,4,4,.8,2.39-1.05.95-1.83-.16-.35-2.13-4-2.32-3.73,0-1.93,1.5-4.36,0-1.46,1.3-.86,1.56-2.52.3-1,5.4-3.9,2.7-2.07,8.77-2.58,2-.18,1.42-3.54,2.35-4.12,4.42-.62,1.46-1.56,2.57-.05,3-1.25.67-1.53-1L230.49,436l-1.5,1.22-1.52,2.3-2,3-.25,4.79-1.93.33-2.41-2.3-1.63,1.17-.21,9.32-9.74.44L208.1,458l-1.34,0-1.22-1.47h-2.66c-.06.1-.08,0-.14.11l0,.07-1.85,2.78-2,1.33.56,3.28-.31,2.4-2.46,1.57-.37,1.77-1.36.59-2,1.68-.2,1L191,474.48l-.77,3.36-1.33-1.75-1.39.76-1,4.37-1.55.09-.8,1.07.48,1.58,1.12,1.12,2.46,5.53-.9,2.18-2.25,0L183.37,496l-2.64.62-7-2.52-5,2.11-2.33.05-1-3-1.63,1.66-.16,4.42-1.71,2.12.25,1.6,2,1.76.63,1.58-1,.4-1.86-.49-1.29.42-2-1.35-.94,1.54,2.13,1.62.91,2-.22,2.39-2.13,2,.26,2.11-.87.89-2.29.26-.14-1.12-2.24.77-.6,3.68-1.17,1.25-2.29-.12-.25,1,1.37,1.55-.2,1.77-1.3,1.18-1,1.17-.66,4.19.78.94Z"/><polygon class="cls-2 js--area-hover-item" data-areacode="paakaupunkiseutu " points="264.44 689.37 263.21 689.37 260.47 686.95 261.07 685.13 259.56 684.69 259.07 686.38 255.37 687 252.99 683.58 250.72 686.51 247.35 685 246.86 685 246.11 686.91 243.91 688.02 243.16 687.65 243.16 688.88 243.75 690.79 243.25 693.03 244.44 694.8 246.29 696.79 247.53 698.33 251.91 696.79 253.95 698.19 256.83 698.23 257.8 696.69 258.23 699.06 260.43 697.2 260.09 694.64 262.29 695.33 263.87 693.18 264.2 692.15 264.44 689.37"/><polygon class="cls-2 js--area-hover-item" data-areacode="etela-suomi " points="348.02 664.95 346.52 661.25 343.27 660.76 341.85 657.88 337.91 657.98 333.4 655.58 332.07 653.24 326.87 651.72 324.43 647.56 325.88 646.69 323.44 643.71 324.84 638.97 327.42 638.01 326.36 635.59 323.64 636.52 316.79 633.12 316.78 628.12 315.16 628.09 315.11 630.75 310.36 633.2 307.03 627.92 304.21 629.06 303.92 625.19 302.76 625.02 299.17 621.66 299.04 619.19 296.99 617.74 297.85 610.2 299.46 605.89 294.27 603.77 290.01 597.21 287.67 596.03 284.36 601.74 281.32 600.29 277.61 602 274.36 613.69 256.38 615.38 256.66 609.8 253.04 606.81 252.46 603.37 253.63 600.79 253.86 600.63 251.23 599.05 251.51 596.06 250.33 592.06 252.04 592.6 245.31 584.18 249.7 577.82 250.53 579.27 252.05 576.84 250.82 572.34 247.03 568.32 244.87 569.09 239.64 568.06 238.19 563.91 236.5 564.23 231.13 561.02 231.11 555.41 228.93 554.5 228.31 549.42 227.23 548.73 222.26 552.83 218.43 552.28 217.55 554.52 211.75 552.26 209.19 556.78 202.19 560.6 193.41 560.56 190.55 559.14 188.06 564.22 184.79 564.33 180.57 570.82 177.95 570.83 170.02 577.57 162.29 576.2 159.72 573.85 154.46 574.47 151.3 577.34 151.12 577.14 151.26 577.64 153.07 578.75 153.83 583.56 155.06 584.51 154.95 585.47 153.35 585.63 152.8 586.84 155.53 590.38 155.53 595.74 158.16 601.64 156.8 601.59 155 599.53 153.86 599.45 153.25 600.6 154.69 603.53 156.03 604.61 156.1 605.52 153.67 604.81 152.13 604.75 152.31 606.36 154.6 607.57 155.34 609.38 154.24 609.58 152.81 609.02 151.85 609.33 151.45 609.95 153.55 614.85 152.58 619.82 152.75 621.16 151.97 622.15 150.43 621.13 148.94 629.67 147.54 632.47 147.52 632.44 146.6 631.09 144.91 632.03 145.8 636.88 148.02 639.19 147.56 640.76 146.17 639.66 144.86 637.02 143.37 637.12 142.59 637.93 143.91 639.34 143.82 640.94 141.11 641.48 141.28 642.63 144.38 644.51 144.06 645.54 143.4 645.99 143.03 647.09 143.52 648.95 143.63 651.63 144.67 653.27 144.6 656.93 146.84 662.8 149.75 665.36 150.63 669.16 152.91 668.96 153.92 664.58 158.02 662.37 159.4 662.99 158 666.62 156.39 666.46 154.91 668.54 154.76 670.16 158.14 669.34 162.47 669.2 164.11 670.78 164.03 672.39 162.51 672.32 161.86 673.13 164.08 675.15 165.88 674 166.59 674.55 166.25 678.83 167.88 678.93 169.9 680.85 177.58 679.37 178.72 678.38 180.54 679.77 177.54 684.56 177.55 686.52 180.75 686.45 182.75 688.26 187.42 686.88 194.64 681.3 195.78 683.2 194.05 685.3 189.8 690.49 190.61 694.79 191.97 695.61 193.84 696.74 192.88 704.88 191.04 703.93 188.75 704.03 188.26 706.42 190.24 709.04 193.85 709.67 194.82 708.73 194.9 705.5 196.04 704.58 197.01 706.08 196.49 710.01 195.35 711.39 189.71 713.38 188.39 714.86 189.8 716.64 194.03 714.89 199.13 714.93 201.77 712.68 201.77 711.21 203.79 708.97 206.25 709.29 207.84 710.42 211.09 709.73 213.65 710.28 214.96 709.28 214.44 707.38 218.13 707.04 225.6 703.84 231.76 703.7 236.26 701.22 236.07 705.12 237.04 705.13 238.45 703.9 239.68 704.61 237.04 708.07 238.98 708.22 244.96 700.7 244.95 699.11 244.41 698.42 242.42 696.28 240.57 693.53 241.17 690.89 240.66 689.26 240.66 683.63 243.9 685.23 244.13 685.11 245.16 682.5 247.89 682.5 249.95 683.42 253.1 679.36 256.51 684.28 257.1 684.18 257.85 681.58 264.25 683.46 263.36 686.16 264.16 686.87 267.15 686.87 266.8 691.08 268.26 690.68 273.2 690.55 274.45 689.01 274.52 686.31 277.76 685.94 278.57 688.93 281.14 692.12 282.16 692.32 283.67 690.69 285.35 691.73 286.21 690.61 285.26 687.57 286.11 686.88 287.81 690.38 288.86 689.96 288.67 687.41 289.67 687.06 291.22 687.83 292.36 687.33 290.45 683.96 289.92 681.82 287.98 679.2 288.25 677.54 291.42 680.57 293.63 682.85 294.68 685.18 295.91 685.08 295.13 682.44 297.89 682.51 299.69 684.75 299.83 682.55 301.35 682.61 304.07 680.17 307.5 679.38 308.86 678.44 310.13 679.79 312.17 679.72 313.76 678.26 316.49 680.99 318.87 681.06 319.72 679.54 319.65 675.76 322 673.4 327.79 675.29 332.58 675.86 334.42 678.59 335.86 677.24 337.05 676.44 338.35 677.15 340.33 676.87 341.97 676.82 343.05 675.05 343.81 671.62 344.79 670.87 347.25 672.47 349.36 671.08 349.45 669.02 351.72 666.84 348.02 664.95"/><polygon class="cls-2 js--area-hover-item -hc-filter__target" data-areacode="ita-suomi " points="452.42 511.19 445.29 505.39 442.93 497.27 437.85 493.76 431.38 488.67 422.26 484.52 418.58 479.33 408.62 468.7 408.59 469.12 403.23 468.64 399.55 472.67 394.95 460.97 375.31 464.48 362.34 462.08 356.5 475.53 347.14 464.72 334.99 456.94 324.72 456.16 316.17 452.92 309.83 455.06 300.35 463.82 301.89 479.4 299.91 480.59 296.48 490.29 288.52 490.35 286.48 486.04 285.11 484.89 280.36 484.88 271.1 478.52 269.37 479.24 268 487.69 263.39 488.21 261.38 488.55 257.1 493.12 256.54 508.3 250.77 507.04 245.89 508.84 245.01 509.42 243.32 511.76 244.18 518.73 247.39 523.04 245.31 524.67 248.49 533 249.76 536.9 248.79 538.28 250.1 540.06 248.72 549.49 243.87 549.57 242.57 551.97 237.02 551.16 233.61 555.09 233.63 559.6 236.97 561.59 239.84 561.05 241.53 565.88 244.68 566.51 247.73 565.41 253.07 571.08 254.75 577.24 250.41 584.17 249.49 582.53 248.42 584.07 254.49 591.65 256.5 592.01 256.46 595.53 254 595.68 254.04 595.81 253.87 597.72 254.1 597.86 254.59 597.59 258.9 600.15 255.63 602.44 255.05 603.71 255.35 605.48 259.22 608.67 259.02 612.62 272.42 611.36 275.51 600.21 281.34 597.53 283.35 598.49 286.68 592.73 291.74 595.28 295.94 601.75 302.65 604.5 300.25 610.93 299.63 616.55 301.46 617.85 301.61 620.52 303.9 622.66 306.26 623 306.45 625.46 308.03 624.83 311.25 629.93 312.64 629.21 312.7 625.54 319.28 625.67 319.29 631.57 323.82 633.82 327.71 632.5 328.19 633.54 330.78 639.43 326.89 640.88 326.21 643.15 329.65 647.35 327.84 648.43 328.52 649.6 333.74 651.12 335.22 653.71 338.5 655.46 343.38 655.34 344.93 658.48 348.3 658.98 349.99 663.14 353.63 665 360.42 658.47 361.91 654.47 369.71 647.65 373.87 646.72 374.35 642.38 378.22 635.76 381.44 634.45 390.44 628.21 398.13 615.24 399.3 611.62 404.48 607.95 408.59 599.32 414.71 593.69 417.14 586.8 421.45 582.26 429.58 568.02 435.43 559.05 439.29 557.54 446.43 544.25 454.89 517.42 452.42 511.19"/></svg>
                  </div>
                              </div>

                  <div class="cell area-contact__persons">

                    <?php if ( have_rows( 'henkilo', 'option' ) ) : ?>
	<?php while ( have_rows( 'henkilo', 'option' ) ) : the_row(); ?>
    <div class="area-contact-person js--area-hover-item <?php the_sub_field( 'kartan_moniarvo' ); ?>" data-areacode="<?php $alue_terms = get_sub_field( 'alue' ); ?><?php if ( $alue_terms ): ?><?php foreach ( $alue_terms as $alue_term ): ?><?php echo $alue_term->slug; ?> <?php endforeach; ?><?php endif; ?>">
        <div class="flx-container -anim">
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
      <h5 class="content__top"><?php the_sub_field( 'alueiden_otsikko' ); ?></h5>
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


<!-- <div class="area-contact-person js--area-hover-item" data-areacode="paakaupunkiseutu">
  <div class="flx-container -anim">

    <div class="cell area-contact-person__image">
    <div class="image-aspect-box">
      <div class="image-aspect-box_inner Anim-item--img" data-scroll>
        <picture>
          <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
            <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
              <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/6.jpg" alt="" src="">
            </picture>

          </div>
        </div>
  </div>
  <div class="cell area-contact-person__content">
    <h5 class="content__top">Pääkaupunkiseutu</h5>
    <div class="content__bottom">
      <p class="strong">Etunimi Sukunimi</p>
      <p>Aluepäällikkö</p>
      <p> <a href="#">040 123 123</a> </p>
        <p> <a href="#">henkilö@areite.fi</a> </p>
    </div>
  </div>
        </div>
</div> -->



                    <!-- <div class="area-contact-person js--area-hover-item" data-areacode="paakaupunkiseutu">
                      <div class="flx-container -anim">

                        <div class="cell area-contact-person__image">
                        <div class="image-aspect-box">
                          <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                            <picture>
                              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
                                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/6.jpg">
                                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/6.jpg" alt="" src="">
                                </picture>

                              </div>
                            </div>
                      </div>
                      <div class="cell area-contact-person__content">
                        <h5 class="content__top">Pääkaupunkiseutu</h5>
                        <div class="content__bottom">
                          <p class="strong">Etunimi Sukunimi</p>
                          <p>Aluepäällikkö</p>
                          <p> <a href="#">040 123 123</a> </p>
                            <p> <a href="#">henkilö@areite.fi</a> </p>
                        </div>
                      </div>
                            </div>
                    </div> -->


                    <!-- <div class="area-contact-person js--area-hover-item" data-areacode="'etela-suomi', ">
                      <div class="flx-container -anim">
                        <div class="cell area-contact-person__image">

                        <div class="image-aspect-box">
                          <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                            <picture>
                              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/9.jpg">
                                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/9.jpg">
                                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/9.jpg" alt="" src="">
                                </picture>

                              </div>
                            </div>
                      </div>
                      <div class="cell area-contact-person__content">
                        <h5 class="content__top">Etelä-Suomi</h5>
                        <div class="content__bottom">
                          <p class="strong">Etunimi Sukunimi</p>
                          <p>Aluepäällikkö</p>
                          <p> <a href="#">040 123 123</a> </p>
                            <p> <a href="#">henkilö@areite.fi</a> </p>
                        </div>
                      </div>
                            </div>
                    </div> -->
                    <!-- <div class="">

                    <div class="area-contact-person js--area-hover-item -hc-filter__trigger" data-areacode="14">
                      <div class="flx-container -anim">
                        <div class="cell area-contact-person__image">

                        <div class="image-aspect-box">
                          <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                            <picture>
                              <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/3.jpg">
                                <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/3.jpg">
                                  <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/3.jpg" alt="" src="">
                                </picture>

                              </div>
                            </div>
                      </div>
                      <div class="cell area-contact-person__content">
                        <h5 class="content__top">Itä- ja Pohjois-Suomi</h5>
                        <div class="content__bottom">
                          <p class="strong">Etunimi Sukunimi</p>
                          <p>Aluepäällikkö</p>
                          <p> <a href="#">040 123 123</a> </p>
                            <p> <a href="#">henkilö@areite.fi</a> </p>
                        </div>
                      </div>
                            </div>
                    </div>


                  </div> -->

                </div>
                </div>
            </div>
      </section>


      </div>


<?php locate_template('src/parts/global/bottom-marquee.php', true, true); ?>

<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>





<div class="mobile-nav-trigger-box -scroll-top">
  <div class="mobile-nav-trigger-box_inner U_container U_base-pad">
    <div class="flx-container">
      <button class="scroll-top-trigger js--scroll-top" type="button" name="button">
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"/></svg>
      </button>
    </div>

  </div>
</div>
    </main><!-- #main -->
  </div><!-- #primary -->


      <div class="modal-smoke S-hidden"></div>

  <div class="form-modal S-hidden js--hide-modal">
  <section class="section--form-laskenta js--hide-modal">

        <div class="U_container U_base-pad js--hide-modal">
          <div class="module--form-laskenta">
            <button class=" btn--hide-modal js--hide-modal__btn" type="button" name="button">

        <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.222 17.778L17.778 2.222M2.222 2.222l15.556 15.556" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"></path></svg>
      </button>
            <h4>Pyydä tarjous alla olevan lomakkeen kautta</h4>
    <form action="https://getform.io/f/d21d3adc-721c-40fa-8b28-18ac4036b976" method="POST">
      <!-- select field handle -->
        <label for="kohde">Pääomainen kohde:</label>
      <select name="kohde" id="select-options">
        <?php	if( $posts_laskenta ): ?>
          <option label="">Valitse kohde</option>
          <optgroup label="pääkaupunkiseutu">
          <?php foreach( $posts_laskenta as $post ):
            setup_postdata( $post ); ?>

            <?php $alue_term = get_field( 'alue' ); ?>
            <?php $id = get_the_ID(); ?>


              <option  id="option-<?php echo $id; ?>" class="<?php echo $id; ?>" data-id="<?php echo $id; ?>" value="<?php the_title(); ?> - <?php echo $alue_term->name; ?>"><?php the_title(); ?></option>
           <?php endforeach; ?>
                         </optgroup>
                         <optgroup label="pääkaupunkiseutu">
                         <?php foreach( $posts_laskenta as $post ):
                           setup_postdata( $post ); ?>
                             <option value=" <?php the_title(); ?>"><?php the_title(); ?></option>
                          <?php endforeach; ?>
                                        </optgroup>
           <?php wp_reset_postdata(); ?>
          <?php endif; ?>


      </select>
        <div class="form-info">
          <p>Jos olet kiinnostunut myös muista kohteista samaan aikaan, paina alla olevaa painiketta, jonka jälkeen voit valita lisää kohteita.</p>
          <button class="basic-btn btn--black btn--small js--from-show-more" type="button" name="button"><span class="basic-btn__text">Näytä kohteet</span> <span class="basic-btn__icon">
          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"></path></svg>
          </span> </button>
        </div>
     <?php	if( $posts_laskenta ): ?>
       <div class="form-laskenta__checkboxes flx-container" style="display:none">

       <?php foreach( $posts_laskenta as $post ):
         setup_postdata( $post ); ?>
         <?php $alue_term = get_field( 'alue' ); ?>
         <div class="cell checkbox-cell">
           <label  class="form-control" for="kohteet[]">
             <input  type="checkbox" name="kohteet[]" value="<?php the_title(); ?> - <?php echo $alue_term->name; ?>" checked></input>
            <span><?php the_title(); ?></span>
           </label>

         </div>
        <?php endforeach; ?>

        </div>
        <?php wp_reset_postdata(); ?>
       <?php endif; ?>
  <label for="nimi">Nimi:</label>
  <input type="text" name="nimi" required>
    <label for="yritys">Yritys:</label>
  <input type="text" name="yritys" required>
  <label for="email">Sähköpostiosoite</label>
  <input type="email" name="email" required>
  <label for="viesti">Viesti</label>
  <textarea name="viesti" rows="4" cols="50">

  </textarea>
  <div class="capsule-wrap">
  <button class="basic-btn btn--yellow" type="submit" name="button"><span class="basic-btn__text">Lähetä</span> <span class="basic-btn__icon">
  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"></path></svg>
  </span> </button>
  </div>

  </form>
  </div>
  </div>
  </section>
  </div>

<?php get_footer();
