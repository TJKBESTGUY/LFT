<?php
   /*
   Template Name: podcast
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <!-- <div class="U-nav-spacer">

      </div> -->

      <?php $header_image = get_field( 'header_image' ); ?>





      <?php locate_template('src/parts/global/main-page-loop.php', true, true); ?>




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


          <section class="section--basic U-sec-pad section-theme--color section-width--normal slider-section">
            <div class="module--slider U_container -x-pad">
          <div class="U_container U_base-pad"



          x-data="{swiper: null}"
            x-init="swiper = new Swiper($refs.swiper, {
              slidesPerView: 'auto',
                     spaceBetween: 0,
                     grabCursor: true,
                    cssMode: swiper_css_mode,
                    pagination: true,
                    speed: 1000,
                    watchSlidesProgress: true,
                    navigation: {
                       nextEl: $refs.next,
                      prevEl:  $refs.prev,

                      },

                      on: {
       slideChangeTransitionStart: function () {
         console.log(swiper.activeIndex);
         document.querySelector('.swiper').dataset.index = swiper.activeIndex;
       },
     },



              })"







          >

          <!-- //Wrapper starts -->




                  <div class="module--basic-content basic-content-flx  basic-content--middle  ">
      <div class="basic-content__inner" style="max-width:1000px;">

        <h1 class="base-text tag ">
                  Blogi
                    </h1>
    <h3 id="raataloimme-palvelumme-aina-teidan-organisaation-tarpeiden-mukaisesti">Nappaa talteen parhaat vinkit työyhteisösi voimavarojen kehittämiseen.</h3>



    <p>Blogiamme lukee kuukausittain yli 20 000 henkilöä. Liity heidän joukkoonsa!</p>


      </div>
    </div>

            <div class="swiper swiper-container  swiper--extended " x-ref="swiper" data-index="0">
              <!-- <div class="swiper-backdrop-content">
                <span>
                      <h3>Nappaa talteen parhaat vinkit työyhteisösi voimavarojen kehittämiseen!</h3>
                </span>

              </div> -->
              <div class="swiper-wrapper">

                <!-- <div class="swiper-slide swiper-fake-slide">

                </div> -->

                <div class="cell basic-card article-card swiper-slide">
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
                        <p class="-guest"> <span class="">Tätä julkaisua olemme odottaneet. On aika ottaa tärkeä askel ja uudistaa podcastimme ilmettä, soundia ja sisältöä vastaamaan entistä paremmin teidän kuuntelijoiden (ja meidän tekijöiden) tarpeita sekä mielenkiinnon kohteita</span></p>
                      </div>

                      <div class="-footer">
                        <span class="-date">16.7.2022</span>
                      </div>

                    </div>
                </div>
                      </div>

                      <div class="cell basic-card article-card swiper-slide">
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
                              <p class="-guest"> <span class="">Tätä julkaisua olemme odottaneet. On aika ottaa tärkeä askel ja uudistaa podcastimme ilmettä, soundia ja sisältöä vastaamaan entistä paremmin teidän kuuntelijoiden (ja meidän tekijöiden) tarpeita sekä mielenkiinnon kohteita</span></p>
                            </div>

                            <div class="-footer">
                              <span class="-date">16.7.2022</span>
                            </div>

                          </div>
                      </div>
                            </div>

                            <div class="cell basic-card article-card swiper-slide">
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
                                    <p class="-guest"> <span class="">Tätä julkaisua olemme odottaneet. On aika ottaa tärkeä askel ja uudistaa podcastimme ilmettä, soundia ja sisältöä vastaamaan entistä paremmin teidän kuuntelijoiden (ja meidän tekijöiden) tarpeita sekä mielenkiinnon kohteita</span></p>
                                  </div>

                                  <div class="-footer">
                                    <span class="-date">16.7.2022</span>
                                  </div>

                                </div>
                            </div>
                                  </div>


                                  <div class="cell basic-card article-card swiper-slide">
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
                                          <p class="-guest"> <span class="">Tätä julkaisua olemme odottaneet. On aika ottaa tärkeä askel ja uudistaa podcastimme ilmettä, soundia ja sisältöä vastaamaan entistä paremmin teidän kuuntelijoiden (ja meidän tekijöiden) tarpeita sekä mielenkiinnon kohteita</span></p>
                                        </div>

                                        <div class="-footer">
                                          <span class="-date">16.7.2022</span>
                                        </div>

                                      </div>
                                  </div>
                                        </div>

                            <div class="cell basic-card article-card swiper-slide">
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
                                    <p class="-guest"> <span class="">Tätä julkaisua olemme odottaneet. On aika ottaa tärkeä askel ja uudistaa podcastimme ilmettä, soundia ja sisältöä vastaamaan entistä paremmin teidän kuuntelijoiden (ja meidän tekijöiden) tarpeita sekä mielenkiinnon kohteita</span></p>
                                  </div>

                                  <div class="-footer">
                                    <span class="-date">16.7.2022</span>
                                  </div>

                                </div>
                            </div>
                                  </div>


          <!-- ////OUTPUT ENDS////// -->
          </div>
          </div>
          <div class="capsule-wrap " style="margin-top:0">
          <a class="btn--basic btn--dark" style="" href="">Kaikki blogiartikkelit</a>
          </div>
          <!-- <div class="swiper-button-prev" x-ref="prev"></div>
              <div class="swiper-button-next" x-ref="next"></div> -->
          </div>

              </div>

          </section>


          <section class="section--basic U-sec-pad section-theme--dark section-width--normal section--home-lifcast">
            <div class="section-inner-container U_container U_base-pad" style="max-width:;">
                <div class="section-bg-container" style="background:">

          <div class="wp-block-lazyblock-split-content-flex lazyblock-split-content-flex-Z1yJAvO"><div class="module--split-content  -x-pad ">
            <h1 class="base-text tag " style="    color: #00d084;">
                  Liftcast
                    </h1>
                <h3 class="" style="max-width:800px;">Liftcast on podcast, jossa nostamme sinut ja organisaatiosi seuraavalle tasolle.</h3>
                <div class="content-spacer--small">
            </div>
            <div class="flx-container">







            <div class="cell split-content__img cat-image-cell">

                 <div class="lazy-img-aspect">

                 <img decoding="async" class="lazyanim  lazyload" data-src=" /wp-content/uploads/2022/11/liftcast-1.jpg" alt="" src="">
          </div>
          </div>





               <div class="cell mosaic-split__txt split-content__txt cast-preview">
            <div class="cell_txt-content">

              <div class="cast-play-cell">
                <img src="https://lifted.fi/wp-content/uploads/2022/11/liftcast_1500x1500-1-768x768.jpg" alt="">
                <div class="content">
                  <div class="-header">
                      <a href="">Lue jaksoesittely</a>
                  </div>
                <span class="-pod-number"> <span class="pod-number__inner"></span> #001</span>
        <h5 class="f--bold">DEI tai heihei!  - Nasim Selmani</h5>

                </div>
              </div>
              <div class="cast-play-cell">
                <img src="https://lifted.fi/wp-content/uploads/2022/11/liftcast_1500x1500-1-768x768.jpg" alt="">
                <div class="content">
                  <div class="-header">

                        <a href="">Lue jaksoesittely</a>
                  </div>
                            <span class="-pod-number"> <span class="pod-number__inner"></span> #002</span>
        <h5 class="f--bold">Onnistu muutosjohtamisessa - Sami El-Bash</h5>

                </div>
              </div>
              <div class="cast-play-cell">
                <img src="https://lifted.fi/wp-content/uploads/2022/11/liftcast_1500x1500-1-768x768.jpg" alt="">
                <div class="content">
                  <div class="-header">

                        <a href="">Lue jaksoesittely</a>
                  </div>
                          <span class="-pod-number"> <span class="pod-number__inner"></span> #003</span>
        <h5 class="f--bold">Vetävämpi työnantajamielikuva  - Camilla Kylander</h5>

                </div>
              </div>
              <div class="cast-play-cell">
                <img src="https://lifted.fi/wp-content/uploads/2022/11/liftcast_1500x1500-1-768x768.jpg" alt="">
                <div class="content">
                  <div class="-header">
                        <a href="">Lue jaksoesittely</a>
                  </div>
                          <span class="-pod-number"> <span class="pod-number__inner"></span> #004</span>
        <h5 class="f--bold">Inhimillisempää liiketoimintaa - Nasim Selmani</h5>

                </div>
              </div>







          </div>
          </div>


          </div>

          <div class="cast-play-footer">
            <div class="capsule-wrap " style="">
        <a class="btn--basic btn--basic--small btn--dark" style="" href="">Spotify</a>
          <a class="btn--basic btn--basic--small btn--dark" style="" href="">Podplay</a>
                <a class="btn--basic btn--basic--small btn--dark" style="" href="">Apple Podcasts</a>


            <a class="btn--basic btn--dark" style="background:#04aef2;" href="">Kaikki jaksoesittelyt</a>
        </div>
          </div>


          </div>



          </div>

          <div class="content-spacer--small">
    </div>
    <div class="content-spacer--small">
    </div>

          </div>
          </div>

          </section>




    </main><!-- #main -->
  </div><!-- #primary -->





<?php get_footer();
