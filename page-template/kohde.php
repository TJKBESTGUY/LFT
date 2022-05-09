<?php
   /*
   Template Name: Kohde
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>

      <?php $header_image = get_field( 'header_image_kohde' ); ?>


      <section class="section--full-header">
        <div class="module--bg-img">
          <picture>
            <source media="(min-width:650px)" data-srcset="<?php echo $header_image['url']; ?>">
              <source media="(min-width:465px)" data-srcset="<?php echo $header_image['url']; ?>">
                <img class="lazy-anim lazyload" data-src="<?php echo $header_image['url']; ?>" alt="<?php echo $header_image['alt']; ?>" src="">
            </picture>
        </div>

        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading">
                <h1><?php the_field( 'header_text_kohde' ); ?></h1>

            </div>


          </div>

        </div>

      </section>






          <section class="section--basic U-sec-pad bg--nude">
                    <div class="U_container U_base-pad">
      <div class="module--heading_txt">
          <div class="heading-content">
          <div class="heading">
        <h2>Avotunturipyöräily eli Open Fell Biking on Saariselän erityisyys, jota varten tänne tullaan kauempaakin. </h2>
          </div>
      </div>
    </div>

    <div class="module--split-content">
          <div class="flx-container">
            <div class="cell mosaic-split__img split-content__img">
              <div class="cell_img-content">

                <div class="image-aspect-box -wide-aspect">
                  <div class="image-aspect-box_inner ">
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg">
                      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg">
                        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg" alt="" src="">
                    </picture>

                </div>
                </div>
              </div>
            </div>
      <div class="cell mosaic-split__txt split-content__txt">
        <div class="cell_txt-content">
  <p>Lähde polkemaan kohti huippua, josta avautuu maisema loputtomaan avotuntureiden ketjuun. Tai suuntaa pyöräsi metsän siimeksessä mutkittelevalle polulle ja anna flown viedä mukanaan. OFB-maastosta löytyy reittejä sekä aloittelijoille, jotka kokeilevat maastopyörää ensimmäistä kertaa, että kokeneille polkijoille, jotka hakevat haasteita ja autenttisia seikkailuita kaukana Napapiirin yläpuolella villissä arktisessa luonnossa.</p>
      </div>
        </div>


    </div>
    </div>







<!-- <div class="module--split-content">
          <div class="flx-container">
            <div class="cell mosaic-split__txt split-content__txt">
              <div class="cell_txt-content">

        <p>Aloittelijoille suosittelemme ympyräreittejä, jotka ovat luokitukseltaan helppoja ja keskivaativia. Kokeneemmille maastopyöräilijöille alueelta löytyy lähes loputtomat mahdollisuudet uusien polkuyhdistelmien löytämiseen.</p>
            </div>
              </div>
            <div class="cell mosaic-split__img split-content__img">
              <div class="cell_img-content">

                <div class="image-aspect-box -wide-aspect">
                  <div class="image-aspect-box_inner ">
                  <picture>
                    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg">
                      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg">
                        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva1b.jpg" alt="" src="">
                    </picture>

                </div>
                </div>
              </div>
            </div>



    </div>
    </div> -->



    </div>
          </section>

              <section class="section--basic U-sec-pad">
                                <div class="U_container U_base-pad">
          <div class="module---manifest-block">
                  <h2>Saariselältä löytyy laaja verkosto erilaisia ja eritasoisia reittejä, kesäisin yhteensä hulppeat 230 kilometriä</h2>
          </div>

        </div>
              </section>



          <section class="section--basic U-sec-pad bg--nude">
                    <div class="U_container U_base-pad">

                      <div class="module--split-heading">
                        <div class="flx-container">
                          <div class="heading">
                            <h2>Alla olevasta ladattavasta Open Fell Biking pdf-kartasta löydät sinulle parhaiten soveltuvat reitit</h2>

                          </div>
                          <div class="txt-content">
                            <p>Aloittelijoille suosittelemme ympyräreittejä, jotka ovat luokitukseltaan helppoja ja keskivaativia. Kokeneemmille maastopyöräilijöille alueelta löytyy lähes loputtomat mahdollisuudet uusien polkuyhdistelmien löytämiseen.</p>
                              <p>Kartassa numeroilla 1-7 merkityt reitit ovat helppoja seurata, koska ne on merkattu maastoon maastopyöräilijäsymbolilla ja reitin numerolla. Lisäksi Moitakurusta vihreänä Kakslauttaseen saakka piirretty niin kutsuttu runkoreitti on helppoa uraa ja se on myös merkitty maastoon maastopyöräilijäsymbolilla.</p>

                          </div>
                        </div>
                      </div>
                      <div class="module--routes">

                      <div class="routes__pdf-box">
                      <?php echo do_shortcode( ' [pdf-embedder url="http://ebikererentalfi.local/wp-content/uploads/2022/05/kartta-www.pdf"] ' ); ?>
                      </div>

                      <div class="capsule-wrap">
              			<a class="btn--basic" href="http://ebikererentalfi.local/pyorat/" target="">Lataa kartta tästä</a>
                  </div>
                    </div>

                    <div class="routes__desc-container">
                      <div class="flx-container">
                        <div class="cell routes__unit">
                          <h3 class="f--bold">Aloittelijoille ja tuoreille maastopyöräilijöille voimme suositella seuraavia reittejä etenkin sähköpyörällä poljettavaksi:</h3>
                          <p><strong>1. Kaunispää OFB</strong>6 km</p>
                              <p><strong>2. Moitakuru</strong>13 km (lyhyt) / 27 km (pitkä)</p>
                                  <p><strong>3. Iisakkipää panoraama</strong>11 km / 13 km (sisältäen Iisakkipään huipun maisemapiston). Huom. Vahtamapään kyljen laskuosuus on kivikkoinen, mutta rauhallisella vauhdilla laskettavissa.</p>
                                                <p><strong>5. Rumakuru Gravel </strong>25 km. Pääasiallisesti helppoa poljettavaa. Luulammelle lasku tai sieltä nousu vaatii jalkautumista. Muuten reitti on aloittelijallekin soveltuvaa ja reitillä on upeita maisemia ja vierailukohteita sekä eväspaikkoja.</p>
                                                                                                <p><strong>7. Sivakkaoja </strong>15 km (lyhyt) / 22 km (pitkä)</p>

                                                                                                        <p><strong>8. Kultareitti</strong> 8,5 km. Reitillä on yksi joen ylitys, jossa kengät kastuu.</p>
                        </div>
                        <div class="cell routes__unit">
                          <h3 class="f--bold">Kokeneille polkijoille löytyy myös runsaasti mukaansatempaavia reittejä:</h3>
                              <p><strong>4. Vellinsärpimä</strong> 31 km</p>
                                  <p><strong>6. Rautulampi </strong> 22 km / 24 km. Huomioi veden ylitys ennen Luulammen kahvilaa</p>
                                      <p><strong>9. Kulmakuru </strong> 30 km</p>
                                      <p>Lisäksi kokeneille löytyy paljon poljettavaa kartalla ruskeaksi merkatuista reiteistä ja yhdistelemällä niitä vapaasti näiden ympyräreittien kanssa. Huomaathan, että osa ruskeista reiteistä on kokonaan merkkaamatta maastoon ja vaatii sinulta tarkkaavaisuutta, että pysyt oikeilla reiteillä sekä kykyä suunnistaa maastossa.</p>
                        </div>
                      </div>
                    </div>

                                      </div>
                          </section>


                          <section class="section--basic U-sec-pad">
                                    <div class="U_container U_base-pad">
                                      <div class="module--split-heading">

                                          <div class="flx-container">
                                            <div class="heading">
                                              <h2>Huomioi Urho Kekkosen kansallispuiston osalta seuraavat säännöt</h2>

                                            </div>
                                            <div class="txt-content">
<p>Urho Kekkosen kansallispuiston alueella pyöräily on sallittu ainoastaan merkityillä reiteillä eli kartassa puiston alueella näkyvillä reiteillä, lukuun ottamatta paria poikkeusta:
1) Kiilopään huipulle vievällä polulla pyöräily on kielletty.
2) Lisäksi pyöräily on erikseen sallittu Kopsusjärven maastouralla ja Niilanpäältä Suomunruoktulle menevällä uralla vaikkei niitä ole merkitty maastoon. Reiteiltä ei saa poiketa! Anterinmukan autiotuvalle saa myös pyöräillä uraa pitkin Luton riippusillalta.
Kansallispuiston ulkopuolisilla alueilla pyöräily on sallittu jokamiehenoikeudella kaikilla reiteillä, urilla ja poluilla lukuun ottamatta suoraan piha-alueille vieviä uria.
Pyöräilyn iloa!</p>

                                            </div>
                                          </div>



                                    </div>



                                        </div>
                                          </section>






<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>







    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
