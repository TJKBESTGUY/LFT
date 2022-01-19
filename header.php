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
<html <?php language_attributes(); ?> class="no-js no-svg dom-loading front-end">

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
        <a href="#"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 222 52"><path d="M162.66,13.5,167,10.07V3.48h-10.7v10H150V20h5.89V40.49c0,7.35,1.78,10,11.4,10h7.83v-6.8h-3.25c-3.8,0-5.28-.76-5.28-4.53V20h8.69V13.5Z"/><rect x="134.11" y="13.5" width="10.7" height="36.94"/><rect x="134.11" y="0.66" width="10.7" height="8.79"/><path d="M22.1.66,1.16,50.45H12.48l4-10.1H38.31l3.95,10.1h12L33.27.66ZM19.62,32.32l7.75-19.64,7.76,19.64Z"/><path d="M106.73,12.68c-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C113.55,43,110.3,44,107,44c-5.12,0-9.93-3.09-10.55-9.41H127.2C127.59,21.54,119.6,12.68,106.73,12.68ZM96.57,28.06c.85-6.25,6.05-8.45,10.08-8.45,4.5,0,9.46,2.2,9.7,8.45Z"/><path d="M200.59,44c-5.12,0-9.93-3.09-10.55-9.41h30.79c.39-13-7.6-21.9-20.48-21.9-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.84,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C207.18,43,203.92,44,200.59,44Zm-.32-24.38c4.5,0,9.47,2.2,9.7,8.45H190.19C191.05,21.81,196.24,19.61,200.27,19.61Z"/><polygon points="69.65 20.88 69.65 13.5 59.1 13.5 59.1 50.45 69.65 50.45 69.65 22.88 82.99 22.88 82.99 13.5 75.52 13.5 69.65 20.88"/></svg></a>
    </div>
    <nav class="navigation-links -desktop-nav flx-container">
        <a href="Palvelut">Uutiset</a>
      <a href="Palvelut">Palvelut</a>
      <a href="Palvelut">Laskentakohteet
        <div class="laskenta-nav-counter">
          <span class="-bold-txt">42</span>
        </div>
      </a>
      <a href="Palvelut">Referenssit</a>
      <a href="Palvelut">Yritys</a>
      <a href="#">Ota Yhteyttä</a>
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
  <div class="fixed-logo">
      <a href="#"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 222 52"><path d="M162.66,13.5,167,10.07V3.48h-10.7v10H150V20h5.89V40.49c0,7.35,1.78,10,11.4,10h7.83v-6.8h-3.25c-3.8,0-5.28-.76-5.28-4.53V20h8.69V13.5Z"/><rect x="134.11" y="13.5" width="10.7" height="36.94"/><rect x="134.11" y="0.66" width="10.7" height="8.79"/><path d="M22.1.66,1.16,50.45H12.48l4-10.1H38.31l3.95,10.1h12L33.27.66ZM19.62,32.32l7.75-19.64,7.76,19.64Z"/><path d="M106.73,12.68c-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C113.55,43,110.3,44,107,44c-5.12,0-9.93-3.09-10.55-9.41H127.2C127.59,21.54,119.6,12.68,106.73,12.68ZM96.57,28.06c.85-6.25,6.05-8.45,10.08-8.45,4.5,0,9.46,2.2,9.7,8.45Z"/><path d="M200.59,44c-5.12,0-9.93-3.09-10.55-9.41h30.79c.39-13-7.6-21.9-20.48-21.9-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.84,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C207.18,43,203.92,44,200.59,44Zm-.32-24.38c4.5,0,9.47,2.2,9.7,8.45H190.19C191.05,21.81,196.24,19.61,200.27,19.61Z"/><polygon points="69.65 20.88 69.65 13.5 59.1 13.5 59.1 50.45 69.65 50.45 69.65 22.88 82.99 22.88 82.99 13.5 75.52 13.5 69.65 20.88"/></svg></a>
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
<source media="(min-width:650px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/4.jpg">
<source media="(min-width:465px)" data-srcset="<?php echo get_template_directory_uri(); ?>/images/4.jpg">
<img class="lazy-anim lazyload" data-src="<?php echo get_template_directory_uri(); ?>/images/4.jpg" alt="" src="">
</picture>

</div>
     </div>
  </div>
  <div class="cell -text-content">
    <div class="content-wrap U_base-pad--right-only">


    <!-- <div class="fixed-mobile-navigation__logo">
      <h2>Areite</h2>
    </div> -->
    <nav class="fixed-mobile-navigation__links U_base-pad--right-only">
      <div class="link-wrap">
        <a class="h3" href="Palvelut">Uutiset</a>
      </div>
      <div class="link-wrap">
        <a  class="h3" href="Palvelut">Palvelut</a>
      </div>
      <div class="link-wrap">
        <a  class="h3" href="Palvelut">Laskentakohteet
          <!-- <div class="laskenta-nav-counter">
            <span>42</span>
          </div> -->
        </a>
      </div>
      <div class="link-wrap">
          <a  class="h3" href="Palvelut">Referenssit</a>
      </div>
      <div class="link-wrap">
          <a  class="h3" href="Palvelut">Yritys</a>
      </div>
      <div class="link-wrap">
            <a  class="h3" href="#">Ota Yhteyttä</a>
      </div>
    </nav>

  </div>
      </div>
      <!-- <div class="cell -footer">

      </div> -->

</div>

</div>

</div>




<div class="site-container" id="site-container">

    <div id="page" class="site">
	    <a id="site-content-skip" class="screen-reader-skip">-</a>
        <div id="site-content" class="site-content">
