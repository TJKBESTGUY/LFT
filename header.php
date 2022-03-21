<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="site-content">
 *
 * Some stuff are added to the head via wp_head() from functions.php including title tag, fonts, style.css, scripts and more
 *
 * @package ignition
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html lang="fi" class="no-js no-svg dom-loading front-end">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/suisse-medium.woff2" as="font" type="font/woff2" crossorigin>
      <style>
         @font-face {
         font-family: "suisse-regular";
         src: url('<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2') format('woff2'),
          url('<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2') format('woff');
         font-weight: 400;
         font-style: normal;
         }

      </style>
      <style>
         @font-face {
         font-family: "suisse-regular";
         src: url('<?php echo get_template_directory_uri(); ?>/fonts/suisse-medium.woff2') format('woff2'),
          url('<?php echo get_template_directory_uri(); ?>/fonts/suisse-medium.woff2') format('woff');
         font-weight: 500;
         font-style: normal;
         }

      </style>

<script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>
<script src="https://unpkg.com/split-type"></script>
<script src="https://cdn.jsdelivr.net/npm/countup.js@2.0.8/dist/countUp.umd.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
const home_url = "<?php echo home_url() ?>"; // "A string here"
const dir_url = "<?php echo get_template_directory_uri(); ?>/xml/test.xml"
console.log(home_url);
console.log(dir_url);
</script>

</head>




<?php
$app_menu = ign_get_config("mobile_menu_type", 'regular_menu'); //accepts svg icon or 'app' which renders the special = to x
$page_name = get_the_title();
?>

<body <?php body_class( $page_name ); ?>>

<a class="skip-link screen-reader-text" href="#site-content-skip">
	<?php _e( 'Skip to content', 'areite' ); ?>
</a>




<header class="site-header">
  <div class="site-header_inner U_container U_base-pad">
    <div class="flx-container flx-nav">



    <div class="header-logo">
        <a href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 302 36"><rect x="183.3" y="0.91" width="9.11" height="34.19"/><polygon points="126.28 35.1 173.64 35.1 173.64 28.36 135.39 28.36 135.39 20.75 169.7 20.75 169.7 14.61 135.39 14.61 135.39 7.05 173.64 7.05 173.64 0.91 126.28 0.91 126.28 35.1"/><polygon points="198.89 8.49 218.6 8.49 218.6 35.1 227.71 35.1 227.71 8.49 247.42 8.49 247.42 0.91 198.89 0.91 198.89 8.49"/><polygon points="301.27 7.05 301.27 0.91 253.91 0.91 253.91 35.1 301.27 35.1 301.27 28.36 263.02 28.36 263.02 20.75 297.33 20.75 297.33 14.61 263.02 14.61 263.02 7.05 301.27 7.05"/><path d="M23.6.91.73,35.06H11l4.68-7h30l4.67,7H60.65L37.77.91Zm-3.74,21L30.69,5.72,41.52,21.88Z"/><path d="M97.25.91H66.72V35.1h9.11V24.34H95.59L106.36,35.1h10.49v-.93L106.49,23.82c5.2-.9,10.36-3.36,10.36-10V11.4C116.85.11,101.85.91,97.25.91Zm10.47,12.2c0,3.84-4.6,4.42-7.81,4.49H75.83v-10H99.91c3.21.07,7.81.65,7.81,4.49Z"/></svg>
</a>


    </div>
    <nav class="navigation-links -desktop-nav flx-container">
        <button class="basic-btn btn--uutiset btn--yellow js--nav-news-trigger">
          <span class="basic-btn__icon"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5ZM9,13.24,5.05,6.4H13Z"/></svg></span>
          <span class="basic-btn__text">Ajankohtaista</span>

      </button>
      <div class="nav-separator">
        <div class="nav-separator__inner">

        </div>
      </div>
        <div class="nav__news-feed -desktop">
          <div class="inner">
          <ul>
            <li>
              <span class="tag">Uutinen</span>
              <p>Uudet verkkosivut julkaistu</p>

            </li>

                  <li>
              <span class="tag">Artikkeli</span>
              <p>Uutiskirje: Helmikuu 2022</p>
            </li>
            <li>
              <span class="tag">Uutinen</span>
              <p>Hyvää pääsiästä toimistolta</p>
            </li>
            <li>
              <span class="tag">Artikkeli</span>
              <p>Toimiston esittely</p>
            </li>
            <li>
              <span class="tag">Uutinen</span>
              <p>Uudet verkkosivut julkaistu</p>

            </li>

                  <li>
              <span class="tag">Uutiskirje</span>
              <p>Uutiskirje: Helmikuu 2022</p>
            </li>
            <li>
              <span class="tag">Uutinen</span>
              <p>Hyvää pääsiästä toimistolta</p>
            </li>
            <li>
              <span class="tag">Artikkeli</span>
              <p>Toimiston esittely</p>
            </li>


          </ul>
            </div>
          <div class="news-feed-footer">
              <a class="basic-btn btn--uutiset btn--yellow" href="/ajankohtaista">Katso kaikki</a>
          </div>
        </div>

      <a class="-nav-link Target--palvelut" href="/palvelut">Palvelut</a>
      <a class="-nav-link Target--laskentakohteet" href="/laskentakohteet">Laskentakohteet
        <div  class="laskenta-nav-counter">
          <span class="-bold-txt">42</span>
        </div>
      </a>
      <a class="-nav-link Target--referenssit" href="/referenssit">Referenssit</a>
      <a class="-nav-link Target--yritys" href="">Yritys</a>
      <a class="-nav-link Target--yhteystiedot" href="/yhteystiedot">Ota Yhteyttä</a>
      <!-- <button class="basic-btn btn--uutiset btn--yellow js--nav-news-trigger">
        <span class="basic-btn__icon"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5ZM9,13.24,5.05,6.4H13Z"/></svg></span>
        <span class="basic-btn__text">Ajankohtaista</span>

    </button> -->
    </nav>

      </div>



  </div>

</header>




<div class="mobile-nav-trigger-box">
  <div class="mobile-nav-trigger-box_inner U_container U_base-pad">
    <div class="flx-container">
      <button class="mobile-nav-trigger" type="button" name="button">
        <svg width="24" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 8h22M1 1h22M1 15h22" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"></path></svg>
        <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.222 17.778L17.778 2.222M2.222 2.222l15.556 15.556" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"></path></svg>
      </button>
    </div>

  </div>
</div>

<div class="fixed-mobile-navigation">
<div class="fixed-mobile-navigation_inner U_container U_base-pad">
  <div class="fixed-logo -top">
      <a href="<?php echo home_url() ?>">
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 80"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path class="cls-1" d="M79.78,1H5.1A4.61,4.61,0,0,0,.49,5.6V74.4A4.61,4.61,0,0,0,5.1,79H79.78a4.6,4.6,0,0,0,4.6-4.6V5.6A4.6,4.6,0,0,0,79.78,1ZM39.16,12.74l7.18,10.93L26.42,54.43H12.24ZM61.42,64l-3.17-4.89L41,59.06l3.84-5.93,9.7,0-6.61-9.8L34.81,64H23.53l24.4-37.76L72.64,64Z"/><rect x="293.22" y="22.91" width="9.11" height="34.19"/><polygon points="236.2 57.1 283.56 57.1 283.56 50.36 245.31 50.36 245.31 42.75 279.62 42.75 279.62 36.61 245.31 36.61 245.31 29.05 283.56 29.05 283.56 22.91 236.2 22.91 236.2 57.1"/><polygon points="308.81 30.49 328.53 30.49 328.53 57.1 337.63 57.1 337.63 30.49 357.34 30.49 357.34 22.91 308.81 22.91 308.81 30.49"/><polygon points="411.19 29.05 411.19 22.91 363.83 22.91 363.83 57.1 411.19 57.1 411.19 50.36 372.94 50.36 372.94 42.75 407.25 42.75 407.25 36.61 372.94 36.61 372.94 29.05 411.19 29.05"/><path d="M133.53,22.91,110.65,57.06H121l4.67-7h30l4.67,7h10.31L147.69,22.91Zm-3.75,21,10.83-16.16,10.83,16.16Z"/><path d="M207.17,22.91H176.65V57.1h9.1V46.34h19.76L216.28,57.1h10.49v-.93L216.41,45.82c5.2-.9,10.36-3.36,10.36-10V33.4C226.77,22.11,211.77,22.91,207.17,22.91Zm10.47,12.2c0,3.84-4.6,4.42-7.81,4.49H185.75v-10h24.08c3.21.07,7.81.65,7.81,4.49Z"/></svg>

      </a>
  </div>
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
<div class="flx-container">
  <div class="cell -img-content">
    <div class="image-aspect-box">
<div class="image-aspect-box_inner">
<picture>
<!-- <source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/4.jpg">
<source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/4.jpg"> -->
<!-- <img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/kuvitukset/kuvitus3-a.png" alt="" src=""> -->
</picture>

</div>
     </div>
     <div class="nav__news-feed -mobile -on__horizontal">
       <h3>&#8203; <span class="h4">Ajankohtaista</span> </h3>

       <div class="inner">
       <ul>
         <li>
           <span class="tag">Uutinen</span>
           <p>Uudet verkkosivut julkaistu</p>

         </li>

               <li>
           <span class="tag">Artikkeli</span>
           <p>Uutiskirje: Helmikuu 2022</p>
         </li>
         <li>
           <span class="tag">Uutinen</span>
           <p>Hyvää pääsiästä toimistolta</p>
         </li>
         <li>
           <span class="tag">Artikkeli</span>
           <p>Toimiston esittely</p>
         </li>


       </ul>
         </div>
       <div class="news-feed-footer">
           <a class="basic-btn btn--uutiset btn--yellow" href="/ajankohtaista">Katso kaikki</a>
       </div>
     </div>
  </div>
  <div class="cell -text-content">

    <div class="content-wrap U_base-pad--right-only">

    <nav class="fixed-mobile-navigation__links U_base-pad--right-only">
        <!-- <div class="link-wrap">
          <button class="basic-btn btn--uutiset btn--yellow js--nav-news-trigger-mobile" href="#">Ajankohtaista</button>
              </div> -->
      <div class="link-wrap">
        <a  class="h3 -nav-link Target--palvelut" href="/palvelut">Palvelut</a>
      </div>
      <div class="link-wrap">
        <a  class="h3 -nav-link Target--laskentakohteet" href="/laskentakohteet">Laskentakohteet
          <div class="laskenta-nav-counter">
            <span>42</span>
          </div>
        </a>
      </div>
      <div class="link-wrap">
          <a  class="h3 -nav-link Target--referenssit" href="/referenssit">Referenssit</a>
      </div>
      <div class="link-wrap">
          <a  class="h3 -nav-link" href="#">Yritys</a>
      </div>
      <div class="link-wrap">
            <a  class="h3 -nav-link Target--yhteystiedot" href="/yhteystiedot">Ota Yhteyttä</a>
      </div>
    </nav>
    <div class="nav__news-feed -mobile -on__vertical">
      <div class="news-feed-footer">
          <a class="basic-btn btn--uutiset btn--yellow" href="/ajankohtaista">Ajankohtaista</a>
      </div>
    </div>
      <div class="fixed-mobile-navigation__sub-links">
        <div class="">
          <div class="fixed-logo -bottom">
              <a href="<?php echo home_url() ?>">  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 80"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path class="cls-1" d="M79.78,1H5.1A4.61,4.61,0,0,0,.49,5.6V74.4A4.61,4.61,0,0,0,5.1,79H79.78a4.6,4.6,0,0,0,4.6-4.6V5.6A4.6,4.6,0,0,0,79.78,1ZM39.16,12.74l7.18,10.93L26.42,54.43H12.24ZM61.42,64l-3.17-4.89L41,59.06l3.84-5.93,9.7,0-6.61-9.8L34.81,64H23.53l24.4-37.76L72.64,64Z"/><rect x="293.22" y="22.91" width="9.11" height="34.19"/><polygon points="236.2 57.1 283.56 57.1 283.56 50.36 245.31 50.36 245.31 42.75 279.62 42.75 279.62 36.61 245.31 36.61 245.31 29.05 283.56 29.05 283.56 22.91 236.2 22.91 236.2 57.1"/><polygon points="308.81 30.49 328.53 30.49 328.53 57.1 337.63 57.1 337.63 30.49 357.34 30.49 357.34 22.91 308.81 22.91 308.81 30.49"/><polygon points="411.19 29.05 411.19 22.91 363.83 22.91 363.83 57.1 411.19 57.1 411.19 50.36 372.94 50.36 372.94 42.75 407.25 42.75 407.25 36.61 372.94 36.61 372.94 29.05 411.19 29.05"/><path d="M133.53,22.91,110.65,57.06H121l4.67-7h30l4.67,7h10.31L147.69,22.91Zm-3.75,21,10.83-16.16,10.83,16.16Z"/><path d="M207.17,22.91H176.65V57.1h9.1V46.34h19.76L216.28,57.1h10.49v-.93L216.41,45.82c5.2-.9,10.36-3.36,10.36-10V33.4C226.77,22.11,211.77,22.91,207.17,22.91Zm10.47,12.2c0,3.84-4.6,4.42-7.81,4.49H185.75v-10h24.08c3.21.07,7.81.65,7.81,4.49Z"/></svg>
              </a>
          </div>
          <ul>
            <li>
              <a href="#">09 586 0030</a>
            </li>
            <li>
              <a href="#">areite@areite.fi</a>
            </li>
          </ul>
        </div>
      </div>




  </div>
      </div>


</div>

<div class="fixed-mobile-navigation__bottom-graphics" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/kuvitukset/kuvitus4-transparent-2600px.png);">

</div>

</div>

</div>




<div class="site-container" id="site-container">

    <div id="page" class="site">
	    <a id="site-content-skip" class="screen-reader-skip">-</a>
        <div id="site-content" class="site-content">
