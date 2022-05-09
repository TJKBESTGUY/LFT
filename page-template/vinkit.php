<?php
   /*
   Template Name: Vinkit
   */
   get_header(); ?>

   <div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">





      <div class="U-nav-spacer">

      </div>









          <section class="section--basic U-sec-pad bg--nude">
                    <div class="U_container U_base-pad U_container--article">

                      <?php if ( have_rows( 'header_block' ) ) : ?>
	<?php while ( have_rows( 'header_block' ) ) : the_row(); ?>
      <div class="module--heading_txt heading-txt--page-start">
        <div class="heading-content">
        <div class="heading">
		<h1><?php the_sub_field( 'header' ); ?></h1>
          </div>
              <div class="heading-p">
		<p><?php the_sub_field( 'text_content' ); ?></p>
      </div>
  </div>
</div>
	<?php endwhile; ?>
<?php endif; ?>


<?php if ( have_rows( 'vinkit_block' ) ) : ?>
	<?php while ( have_rows( 'vinkit_block' ) ) : the_row(); ?>
        <div class="module--content-block--vinkit">
            <div class="vinkit__heading">
		<h2><?php the_sub_field( 'heading' ); ?></h2>
          </div>
              <div class="vinkit__txt-content">
		<?php the_sub_field( 'content' ); ?>
          </div>
      </div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


    <div class="module--content-block--vinkit">

        <div class="vinkit__heading">
      <h2>Kuinka pukeudun ja mitä otan mukaan?</h2>
        </div>

    <div class="vinkit__txt-content">

        <p>Pukeudu sään mukaan riittävän lämpimästi. Tarkista sääennuste ennen retkelle lähtöä ja ole valmistautunut nopeisiin ja yllättäviin sään muutoksiin tunturialueilla ja erämaissa liikkuessasi. Ei ole tavatonta, että olosuhteet muuttuu yhtäkkiä aurinkoisesta tuuliseksi ja sateiseksi. Lisäksi nopea lämpötilan viileneminen ja satunnaiset raekuurot ovat osa Lapin kesän sääilmiöitä. Siksi onkin hyvä pakata mukaan tuulelta ja sateelta suojaava vaatekerta. Pyöräilyhanskat ovat myös hyvä pitää matkassa ja pyöräilykypärä ehdoton. Mikäli sinulla ei ole kaikkia tarvittavia varusteita, löydät liikkeestämme mm. laadukkaita pyöräilyhanskoja. Kypärä kuuluu mukaan pyörän vuokraukseen.

Ota lisäksi mukaan kartta, juomapullo, evästä. Liikkeestämme voit ostaa juomapullon sekä eväspatukoita retken aikaiseen tarpeeseen. Myös ensiaputarvikkeet on hyvä olla matkassa.

Lisäksi pysähtyminen paikallisissa kahviloissa ja ravintoloissa on suositeltavaa. Ulkoilu kuluttaa runsaasti energiaa ja paikalliset yritykset palvelevat mielellään pyöräileviä asiakkaita.</p>
    </div>
  </div>

  <div class="module--content-block--vinkit">

      <div class="vinkit__heading">
    <h2>Puhelin mukaan!</h2>
      </div>

  <div class="vinkit__txt-content">
<p>Hätänumero on 112.

Hätätilanteessa 112 Suomi –mobiilisovelluksen avulla sinut voidaan paikantaa nopeammin.
Lataa puhelimen akku täyteen ennen retkeä ja huolehdi, ettei puhelin pääse kastumaan.
Osa reiteistä on puhelimen katvealueella. Puhelimen kuuluvuus on parempi korkeilla paikoilla kuin laaksoissa ja kuruissa.

Jätä pidemmistä reiteistä suunnitelma vuokraamoon.</p>
  </div>
</div>


<div class="module--content-block--vinkit">

    <div class="vinkit__heading">
  <h2>Muista etiketti</h2>
    </div>

<div class="vinkit__txt-content">

<ul>
  <li>
    Ota huomioon muut reiteillä kulkijat. Pyöräilijä nopeampana on valmis väistämään muita reiteillä liikkujia, kuten kävelijöitä ja vaeltajia.
  </li>
  <li>
    Huomioi oikea tilannenopeus etenkin kohtaamisissa, mutta myös pitkissä alamäissä.
  </li>
  <li>
    Ennen kohtaamisia ilmoita tulostasi moikkaamalla ystävällisesti.
  </li>
  <li>
    Oikea ajotapa ei kuluta maastoa tai vahingoita polkua. Pysy aina polulla äläkä hae helpompaa ajoalustaa kiertämällä.
  </li>

</ul>
<p>Hätänumero on 112.

Hätätilanteessa 112 Suomi –mobiilisovelluksen avulla sinut voidaan paikantaa nopeammin.
Lataa puhelimen akku täyteen ennen retkeä ja huolehdi, ettei puhelin pääse kastumaan.
Osa reiteistä on puhelimen katvealueella. Puhelimen kuuluvuus on parempi korkeilla paikoilla kuin laaksoissa ja kuruissa.

Jätä pidemmistä reiteistä suunnitelma vuokraamoon.</p>
</div>
</div>

    </div>
          </section>


          <section class="section--basic U-sec-pad section--bottom-cta bg--dark">
            <div class="U_container U_base-pad">
<div class="module--split-content">
    <div class="flx-container">
              <div class="cell split-content__img">
        <div class="cell_img-content">

          <div class="image-aspect-box -wide-aspect">
            <div class="image-aspect-box_inner ">
            <picture>
              <source media="(min-width:650px)" data-srcset="http://ebikererentalfi.local/wp-content/uploads/2022/04/kuva2b.jpg" srcset="http://ebikererentalfi.local/wp-content/uploads/2022/04/kuva2b.jpg">
                <source media="(min-width:465px)" data-srcset="http://ebikererentalfi.local/wp-content/uploads/2022/04/kuva2b.jpg" srcset="http://ebikererentalfi.local/wp-content/uploads/2022/04/kuva2b.jpg">
                  <img class="lazy-anim ls-is-cached lazyloaded" data-src="http://ebikererentalfi.local/wp-content/uploads/2022/04/kuva2b.jpg" alt="" src="http://ebikererentalfi.local/wp-content/uploads/2022/04/kuva2b.jpg">
              </picture>

          </div>
          </div>
        </div>
      </div>

<div class="cell mosaic-split__txt split-content__txt">
  <div class="cell_txt-content">
                <h2>Varaa nyt!</h2>
                      <div class="capsule-wrap">
          <a class="btn--basic -btn-left" href="/varaus/" target="">Varaa ›</a>

        </div>

</div>
  </div>
</div>
</div>

</div>
</section>

    </main><!-- #main -->
  </div><!-- #primary -->



<?php get_footer();
