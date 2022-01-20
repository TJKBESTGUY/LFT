<?php
   /*
   Template Name: Etusivu
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">
      <section class="section--home-header U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading">
                <h1>Luotettava määräluettelo, laadukkaan rakentamisen perusta</h1>
            </div>

            <div class="flx-container -left-nudge">
              <div class="cell">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              </div>

            </div>
          </div>

        </div>

      </section>

      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--full-image" data-scroll>
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner ">
              <picture>
                <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1.jpg">
                  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva1.jpg">
                    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva1.jpg" alt="" src="">
                </picture>
                <picture class="">
                  <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva2.png">
                    <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3.png">
                      <img class="lazy-anim lazyload -overlay-image" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva3.png" alt="" src="">
                  </picture>
                  <picture class="">
                    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva3.png">
                      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/kuva2.png">
                        <img class="lazy-anim lazyload -overlay-image -delay" data-src="<?php echo get_template_directory_uri(); ?>/images/kuva2.png" alt="" src="">
                    </picture>

            </div>
          </div>
        </div>
          </div>

      </section>






      <section class="section--home-laskenta-count U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--laskenta-count">
            <div class="flx-container">
              <div class="cell laskenta-count__number">
                  <span class="Anim-item--counter -bold-txt"  data-scroll data-type="counter" data-value="42">32</span>
              </div>
              <div class="cell laskenta-count__label">
                <span class="h3">Laskennassa olevaa kohdetta</span>
              </div>
            </div>


          </div>

        </div>

      </section>




      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading-content">
                <div class="heading">
              <h2>Laskentakohteet</h2>
                </div>
              <p class="ingr">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>

        </div>

      </section>





      <section class="section--laskentakohteet-app -custom-pad">
          <div class="U_container U_base-pad">
            <div class="module--laskentakohteet-app -home-preview">

              <table>
                <div class="fake-header-mask">

                </div>
                <thead class="laskentakohteet-app__header">
                  <tr class="">
                    <th class="tr--kohde">
                      <span>Kohde</span>
                    </th>
                    <th><span>Tyyppi</span></th>
                    <th><span>Bruttoala m<sup>2</sup></span></th>

                      <th><span>Tilavuus m<sup>3</sup></span></th>
                        <th><span>Tarjous pvm</span></th>
                              <th><span>Valmistuu</span></th>

                  </tr>
                </thead>

                <tbody class="laskentakohteet-app__body">
                  <tr class="Anim-item--list">
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

                  <tr class="Anim-item--list">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">&#8203;</span>
                      <span class="td__name">Pisan päiväkoti</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pääkaupunkiseutu</span></span>
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

                  <tr class="Anim-item--list">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pääkaupunkiseutu</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
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


                  <tr class="Anim-item--list">
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

                  <tr class="Anim-item--list">
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

                  <tr class="Anim-item--list">
                    <td class="td--kohde">
                      <div class="flx-container">
                        <span class="td__label">ELO</span>
                      <span class="td__name">As Oy Vantaan Kilterinrinne 3</span>
                      <span class="td__xtra-info"><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/location.svg">Pääkaupunkiseutu</span><span class="-location"><img src="<?php echo get_template_directory_uri(); ?>/svg/info.svg">Asuntoja: 105 kpl</span></span>
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








                </tbody>

              </table>
              <div class="table-mask">

              </div>

            </div>

            <div class="laskentakohteet-app__footer">
              <div class="txt">
                Tällä hetkellä laskennassa <span>42</span> kohdetta. Katso kaikki kohteet laskentakohteet-sivulta.
              </div>
              <div class="capsule-wrap">
                <button class="basic-btn btn--yellow"type="button" name="button"><span class="basic-btn__text">Laskentakohteet</span> <span class="basic-btn__icon">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"/></svg>
                </span> </button>
              </div>
            </div>


          </div>

      </section>



      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">



          <div class="module--split-content -mosaic-split">
                <div class="flx-container">
                  <div class="cell">
                    <div class="cell_img-content">
                        <h3>Laadukasta määrälaskentaa</h3>
                      <div class="image-aspect-box -wide-aspect">
                        <div class="image-aspect-box_inner Anim-item--img" data-scroll>
                        <picture>
                          <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/7.jpg">
                            <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/7.jpg">
                              <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/7.jpg" alt="" src="">
                          </picture>

                      </div>
                      </div>
                    </div>
                  </div>
            <div class="cell">
              <div class="cell_txt-content">

              <p class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <p class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
              <div class="capsule-wrap">
                <button class="basic-btn btn--yellow"type="button" name="button"><span class="basic-btn__text">Lue lisää</span> <span class="basic-btn__icon">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"/></svg>
                </span> </button>
              </div>
            </div>
              </div>


          </div>
          </div>


          <div class="module--split-content">
                <div class="flx-container">



            <div class="cell">
              <div class="cell_txt-content">
              <p class="cell-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
              </div>

              <div class="cell">
                <div class="cell_img-content">
                  <div class="image-aspect-box -wide-aspect">
<div class="image-aspect-box_inner Anim-item--img" data-scroll>
<picture>
<source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="" src="">
</picture>

</div>
</div>
                </div>
              </div>

          </div>
          </div>

        </div>

      </section>


      <section class="section--super-digit U-sec-marg -dark-mode">


        <div class="U_container U_base-pad -padded-container">


                <div class="footer-bg-border">
                      <div class="cell">
                      </div>
                      <div class="cell">
                      </div>
                      <div class="cell">
                      </div>
                      <div class="cell">
                      </div>
                      <div class="cell">
                      </div>
                      <div class="cell">
                      </div>
                    </div>

          <div class="module--super-digit">
            <div class="flx-container">
              <div class="cell super-digit__number">
                <div data-scroll class="super-digits-mask">
                  <span class="Anim-item--split -fake-number -bold-txt">
                      22 412 735
                    </span>
                  <span class="Anim-item--split -real-number -bold-txt">
                    22 412 735
                    </span>

                </div>

                <!-- <span>22 412 735</span> -->
              </div>
              <div class="cell super-digit__label">
                <span class="h3">laskettua neliömetriä yhteensä</span>
              </div>
            </div>


          </div>

        </div>

      </section>


      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading-content">
                <div class="heading">
              <h2>Voit hyödyntää palveluitamme myös projektin aikana</h2>
                </div>
              <p class="ingr">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>

        </div>

      </section>









      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--full-image">
            <div class="image-aspect-box">
              <div class="image-aspect-box_inner -anim" data-animation="transform: {-100vh: translateY(150px) scale(1.2),100vh: translateY(-150px) scale(1)}">
              <picture>
                <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/3.jpg">
                  <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/3.jpg">
                    <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/3.jpg" alt="" src="">
                </picture>

            </div>
          </div>
            <div class="full-image__overlay">
              <p class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              <div class="capsule-wrap">
                <button class="basic-btn btn--bordered"type="button" name="button"><span class="basic-btn__text">Lue lisää</span> <span class="basic-btn__icon">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"/></svg>
                </span> </button>
              </div>
            </div>
        </div>
          </div>

      </section>

      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">

          <div class="module--split-content">
                <div class="flx-container">
            <div class="cell">
              <div class="cell_txt-content">
              <h3>Määrälaskenta palvelut</h3>
              <p class="cell-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              <div class="capsule-wrap">
                <button class="basic-btn btn--yellow"type="button" name="button"><span class="basic-btn__text">Lue lisää</span> <span class="basic-btn__icon">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"/></svg>
                </span> </button>
              </div>
            </div>
              </div>

            <div class="cell">
              <div class="cell_img-content">
                <div class="image-aspect-box">
  <div class="image-aspect-box_inner Anim-item--img" data-scroll>
  <picture>
    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="" src="">
    </picture>

</div>
</div>
              </div>
            </div>
          </div>
          </div>


          <div class="module--split-content">
                <div class="flx-container">
                  <div class="cell">
                    <div class="cell_img-content">
                      <div class="image-aspect-box">
  <div class="image-aspect-box_inner Anim-item--img" data-scroll>
  <picture>
    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="" src="">
    </picture>

</div>
</div>
                    </div>
                  </div>


            <div class="cell">
              <div class="cell_txt-content">
              <h3>Kokemuksella</h3>
              <p class="cell-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
              </div>

          </div>
          </div>

        </div>

      </section>

      <section class="section--super-digit U-sec-marg">
        <div class="U_container U_base-pad">
          <div class="module--super-digit">
            <div class="flx-container">
              <div class="cell super-digit__number">
                <div data-scroll class="super-digits-mask">
                  <span class="Anim-item--split -fake-number -bold-txt">
                      204 500
                    </span>
                  <span class="Anim-item--split -real-number -bold-txt">
                    204 500
                    </span>

                </div>
              </div>
              <div class="cell super-digit__label">
                <span class="h3">suurin laskettu kohde (m2)</span>
              </div>
            </div>


          </div>

        </div>

      </section>

      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--full-image -left-nudge">
            <div class="image-aspect-box Anim-item--img" data-scroll>
  <div class="image-aspect-box_inner">
  <picture>
    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="" src="">
    </picture>

</div>
</div>
        </div>
          </div>

      </section>


      <!-- <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--full-image -right-nudge">
            <div class="image-aspect-box">
  <div class="image-aspect-box_inner Anim-item--img" data-scroll>
  <picture>
    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="" src="">
    </picture>

</div>
</div>
        </div>
          </div>

      </section> -->










      <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--split-content">
            <!-- <div class="heading-content">
            <div class="heading">
                <h2>luotettava määräluettelo, laadukkaan rakentamisen perusta</h2>
            </div>

              <p class="ingr">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div> -->

                <div class="flx-container">
                  <div class="cell">
                    <div class="cell_img-content">
                      <div class="image-aspect-box">
  <div class="image-aspect-box_inner Anim-item--img" data-scroll>
  <picture>
    <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
      <source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/5.jpg">
        <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="" src="">
    </picture>

</div>
</div>
                    </div>
                  </div>


            <div class="cell">
              <div class="cell_txt-content">
              <h3>Voit hyödyntää palveluitamme myös projektin aikana</h3>
              <p class="cell-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
              </div>




          </div>
          </div>

        </div>

      </section>


      <!-- <section class="section--basic U-sec-pad">
        <div class="U_container U_base-pad">
          <div class="module--heading_txt">
            <div class="heading-content">
                <div class="heading">
              <h2>luotettava määräluettelo, laadukkaan rakentamisen perusta</h2>
                </div>
              <p class="ingr">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>

        </div>

      </section> -->



<?php locate_template('src/parts/global/bottom-marquee.php', true, true); ?>

<?php locate_template('src/parts/global/bottom-cta.php', true, true); ?>




    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
