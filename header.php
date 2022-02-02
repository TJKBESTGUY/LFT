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



</head>




<?php
$app_menu = ign_get_config("mobile_menu_type", 'regular_menu'); //accepts svg icon or 'app' which renders the special = to x

?>

<body <?php body_class( $app_menu ); ?>>

<a class="skip-link screen-reader-text" href="#site-content-skip">
	<?php _e( 'Skip to content', 'areite' ); ?>
</a>




<header class="site-header">
  <div class="site-header_inner U_container U_base-pad">
    <div class="flx-container flx-nav">



    <div class="header-logo">
        <a href="<?php echo home_url() ?>"><svg  class="logo__sans" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 222 52"><path d="M162.66,13.5,167,10.07V3.48h-10.7v10H150V20h5.89V40.49c0,7.35,1.78,10,11.4,10h7.83v-6.8h-3.25c-3.8,0-5.28-.76-5.28-4.53V20h8.69V13.5Z"/><rect x="134.11" y="13.5" width="10.7" height="36.94"/><rect x="134.11" y="0.66" width="10.7" height="8.79"/><path d="M22.1.66,1.16,50.45H12.48l4-10.1H38.31l3.95,10.1h12L33.27.66ZM19.62,32.32l7.75-19.64,7.76,19.64Z"/><path d="M106.73,12.68c-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C113.55,43,110.3,44,107,44c-5.12,0-9.93-3.09-10.55-9.41H127.2C127.59,21.54,119.6,12.68,106.73,12.68ZM96.57,28.06c.85-6.25,6.05-8.45,10.08-8.45,4.5,0,9.46,2.2,9.7,8.45Z"/><path d="M200.59,44c-5.12,0-9.93-3.09-10.55-9.41h30.79c.39-13-7.6-21.9-20.48-21.9-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.84,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C207.18,43,203.92,44,200.59,44Zm-.32-24.38c4.5,0,9.47,2.2,9.7,8.45H190.19C191.05,21.81,196.24,19.61,200.27,19.61Z"/><polygon points="69.65 20.88 69.65 13.5 59.1 13.5 59.1 50.45 69.65 50.45 69.65 22.88 82.99 22.88 82.99 13.5 75.52 13.5 69.65 20.88"/></svg></a>


    </div>
    <nav class="navigation-links -desktop-nav flx-container">
        <button class="basic-btn btn--uutiset btn--yellow js--nav-news-trigger">
          <span class="basic-btn__icon"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5ZM9,13.24,5.05,6.4H13Z"/></svg></span>
          <span class="basic-btn__text">Ajankohtaista</span>

      </button>
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
      <a class="-nav-link" href="/palvelut">Palvelut</a>
      <a class="-nav-link" href="/laskentakohteet">Laskentakohteet
        <div  class="laskenta-nav-counter">
          <span class="-bold-txt">42</span>
        </div>
      </a>
      <a class="-nav-link" href="/referenssit">Referenssit</a>
      <a class="-nav-link" href="">Yritys</a>
      <a class="-nav-link" href="">Ota Yhteyttä</a>
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
      <a href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 332 80"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path d="M273.32,27.5l4.32-3.43V17.48H266.93v10h-6.25V34h5.89V54.49c0,7.35,1.79,10,11.41,10h7.83v-6.8h-3.26c-3.8,0-5.27-.76-5.27-4.53V34H286V27.5Z"/><rect x="244.78" y="27.5" width="10.7" height="36.94"/><rect x="244.78" y="14.66" width="10.7" height="8.79"/><path d="M132.76,14.66,111.82,64.45h11.33l3.95-10.1H149l4,10.1h12l-21-49.79Zm-2.48,31.66L138,26.68l7.75,19.64Z"/><path d="M217.39,26.68c-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C224.22,57,221,58,217.62,58c-5.11,0-9.92-3.09-10.54-9.41h30.79C238.26,35.54,230.27,26.68,217.39,26.68ZM207.23,42.06c.85-6.25,6.05-8.45,10.08-8.45,4.5,0,9.47,2.2,9.7,8.45Z"/><path d="M311.25,58c-5.12,0-9.93-3.09-10.55-9.41h30.79c.39-13-7.6-21.9-20.47-21.9-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61H320C317.84,57,314.59,58,311.25,58Zm-.31-24.38c4.5,0,9.46,2.2,9.7,8.45H300.86C301.71,35.81,306.91,33.61,310.94,33.61Z"/><polygon points="180.31 34.88 180.31 27.5 169.77 27.5 169.77 64.45 180.31 64.45 180.31 36.88 193.65 36.88 193.65 27.5 186.19 27.5 180.31 34.88"/><path class="cls-12" d="M79.78,1H5.1A4.61,4.61,0,0,0,.49,5.6V74.4A4.61,4.61,0,0,0,5.1,79H79.78a4.6,4.6,0,0,0,4.6-4.6V5.6A4.6,4.6,0,0,0,79.78,1ZM39.16,12.74l7.18,10.93L26.42,54.43H12.24ZM61.42,64l-3.17-4.89L41,59.06l3.84-5.93,9.7,0-6.61-9.8L34.81,64H23.53l24.4-37.76L72.64,64Z"/></svg></a>
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
        <a  class="h3 -nav-link" href="/palvelut">Palvelut</a>
      </div>
      <div class="link-wrap">
        <a  class="h3 -nav-link" href="/laskentakohteet">Laskentakohteet
          <div class="laskenta-nav-counter">
            <span>42</span>
          </div>
        </a>
      </div>
      <div class="link-wrap">
          <a  class="h3 -nav-link" href="/referenssit">Referenssit</a>
      </div>
      <div class="link-wrap">
          <a  class="h3 -nav-link" href="#">Yritys</a>
      </div>
      <div class="link-wrap">
            <a  class="h3 -nav-link" href="#">Ota Yhteyttä</a>
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
              <a href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 332 80"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path d="M273.32,27.5l4.32-3.43V17.48H266.93v10h-6.25V34h5.89V54.49c0,7.35,1.79,10,11.41,10h7.83v-6.8h-3.26c-3.8,0-5.27-.76-5.27-4.53V34H286V27.5Z"/><rect x="244.78" y="27.5" width="10.7" height="36.94"/><rect x="244.78" y="14.66" width="10.7" height="8.79"/><path d="M132.76,14.66,111.82,64.45h11.33l3.95-10.1H149l4,10.1h12l-21-49.79Zm-2.48,31.66L138,26.68l7.75,19.64Z"/><path d="M217.39,26.68c-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C224.22,57,221,58,217.62,58c-5.11,0-9.92-3.09-10.54-9.41h30.79C238.26,35.54,230.27,26.68,217.39,26.68ZM207.23,42.06c.85-6.25,6.05-8.45,10.08-8.45,4.5,0,9.47,2.2,9.7,8.45Z"/><path d="M311.25,58c-5.12,0-9.93-3.09-10.55-9.41h30.79c.39-13-7.6-21.9-20.47-21.9-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61H320C317.84,57,314.59,58,311.25,58Zm-.31-24.38c4.5,0,9.46,2.2,9.7,8.45H300.86C301.71,35.81,306.91,33.61,310.94,33.61Z"/><polygon points="180.31 34.88 180.31 27.5 169.77 27.5 169.77 64.45 180.31 64.45 180.31 36.88 193.65 36.88 193.65 27.5 186.19 27.5 180.31 34.88"/><path class="cls-12" d="M79.78,1H5.1A4.61,4.61,0,0,0,.49,5.6V74.4A4.61,4.61,0,0,0,5.1,79H79.78a4.6,4.6,0,0,0,4.6-4.6V5.6A4.6,4.6,0,0,0,79.78,1ZM39.16,12.74l7.18,10.93L26.42,54.43H12.24ZM61.42,64l-3.17-4.89L41,59.06l3.84-5.93,9.7,0-6.61-9.8L34.81,64H23.53l24.4-37.76L72.64,64Z"/></svg></a>
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
