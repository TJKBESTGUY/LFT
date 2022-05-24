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


    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />

<style media="screen">
@font-face {
  font-family: "HDColton-SemiboldItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonSemiboldItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonSemiboldItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-RegularItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonRegularItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonRegularItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-BoldItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBoldItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBoldItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Regular";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonRegular/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonRegular/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Light";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonLight/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonLight/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Semibold";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonSemibold/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonSemibold/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-ExtraboldItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtraboldItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtraboldItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-ExtralightItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtralightItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtralightItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-ThinItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonThinItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonThinItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-LightItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonLightItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonLightItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Extrabold";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtrabold/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtrabold/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Extralight";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtralight/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonExtralight/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Black";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBlack/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBlack/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Thin";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonThin/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonThin/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Bold";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBold/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBold/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-Medium";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonMedium/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonMedium/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-BlackItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBlackItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonBlackItalic/font.woff') format('woff');
}
@font-face {
  font-family: "HDColton-MediumItalic";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonMediumItalic/font.woff2') format('woff2'), url('<?php echo get_template_directory_uri(); ?>/fonts/ebikefonts/webFonts/HDColtonMediumItalic/font.woff') format('woff');
}
</style>

	<?php wp_head(); ?>

<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<style media="screen">
.pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.pace-inactive {
  display: none;
}

.pace .pace-progress {
  background: #ff8517;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 3px;
}
</style>


  <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->

<script type="text/javascript">
const home_url = "<?php echo home_url() ?>"; // "A string here"

console.log(home_url);

</script>

</head>




<?php

$page_name = get_the_title();
?>

<body <?php body_class( $page_name ); ?>>






<header class="site-header">
  <div class="site-header_inner U_container U_base-pad">
    <div class="flx-container flx-nav">



    <div class="header-logo">
        <a href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 98"><defs><style>.cls-1{fill:#ff8517;}</style></defs><path d="M120.28,55.73c0-11.73,9-20.88,20.4-20.88,11.73,0,20.06,8.74,20.06,20.64a18.74,18.74,0,0,1-.16,3h-31.4c1.06,6.56,5.59,10.28,11.9,10.28a11.94,11.94,0,0,0,10.68-6.07l7.45,4.21a21.17,21.17,0,0,1-18.13,9.71A20.56,20.56,0,0,1,120.28,55.73Zm9.15-3.8h22.25c-.81-5.42-5-9.31-11.09-9.31C135,42.62,130.72,46.1,129.43,51.93Z"/><path d="M167.63,75.8V20h21.44c9.79,0,16.59,6.32,16.59,15.3a12.93,12.93,0,0,1-6.56,11.49c5.59,2.1,8.82,6.88,8.82,13.11,0,9.38-6.63,15.94-16.75,15.94Zm9.3-32.21H188.1c5.1,0,8.33-3.07,8.33-7.69s-3.23-7.76-8.33-7.76H176.93Zm0,24h12.3c5.67,0,9.39-3.16,9.39-8.1s-3.72-8.09-9.39-8.09h-12.3Z"/><path d="M213.43,24.25a5.18,5.18,0,1,1,10.36,0,5.18,5.18,0,0,1-10.36,0Zm.65,51.55V35.66h9V75.8Z"/><path d="M231.72,75.8V20h9V55.57l17.48-19.91h10.76L254.05,52.74,269.83,75.8h-10.6L248.15,59.45l-7.45,8.09V75.8Z"/><path d="M269.11,55.73c0-11.73,9-20.88,20.39-20.88,11.74,0,20.07,8.74,20.07,20.64a18.74,18.74,0,0,1-.16,3H278c1.05,6.56,5.59,10.28,11.9,10.28a12,12,0,0,0,10.68-6.07L308,66.9a21.15,21.15,0,0,1-18.12,9.71A20.56,20.56,0,0,1,269.11,55.73Zm9.14-3.8h22.26c-.81-5.42-5-9.31-11.09-9.31C283.84,42.62,279.55,46.1,278.25,51.93Z"/><path d="M316.45,75.8V20h21.37c10.68,0,18.28,7.53,18.28,18a17.19,17.19,0,0,1-10.68,16.42l12,21.45H347L335.87,55.89H325.76V75.8Zm9.31-28.73h11c6,0,10-3.56,10-9.14,0-5.75-4-9.15-10-9.15h-11Z"/><path d="M359,55.73c0-11.73,9-20.88,20.4-20.88,11.73,0,20.06,8.74,20.06,20.64a18.74,18.74,0,0,1-.16,3h-31.4c1.06,6.56,5.59,10.28,11.9,10.28a12,12,0,0,0,10.68-6.07L398,66.9a21.17,21.17,0,0,1-18.13,9.71A20.56,20.56,0,0,1,359,55.73Zm9.15-3.8h22.25c-.81-5.42-5-9.31-11.09-9.31C373.75,42.62,369.46,46.1,368.17,51.93Z"/><path d="M406,75.8V35.66h8.58v4.13c2.59-3.08,6.72-4.94,11.81-4.94,9.88,0,16.92,7,16.92,18.13V75.8h-9v-22c0-6.56-3.56-10.44-9.38-10.44-6,0-10,4-10,10.44v22Z"/><path d="M467.87,75.8c-9.14,0-13.51-4-13.51-12.3V43.92h-6.64V35.66h4.61a2,2,0,0,0,2-2.26V25.63h9v10H474v8.26H463.34V62.61c0,3.15,1.54,4.77,5.18,4.77H474V75.8Z"/><path d="M476.77,55.73c0-11.73,8.74-20.88,20.23-20.88A16.54,16.54,0,0,1,510.44,41V35.66H519V75.8h-8.57V70.46c-2.92,3.88-7.77,6.15-13.44,6.15C485.51,76.61,476.77,67.46,476.77,55.73Zm33.34,0c0-7.2-5.09-12.46-12.13-12.46s-12.22,5.26-12.22,12.46S490.94,68.11,498,68.11,510.11,62.93,510.11,55.73Z"/><path d="M527.76,75.8V20h9V75.8Z"/><path d="M543.62,70.78a5.71,5.71,0,1,1,5.66,5.58A5.68,5.68,0,0,1,543.62,70.78Z"/><path d="M563,75.8V43.92h-6.23V35.66H563V33.32C563,25.55,568.63,20,577.69,20h4.61v7.93h-4.21c-4.2,0-6.15,2-6.15,5.75v2h11v8.26h-11V75.8Zm24.68-51.55a5.18,5.18,0,1,1,10.36,0,5.18,5.18,0,0,1-10.36,0Zm.65,51.55V35.66h9V75.8Z"/><circle cx="48.75" cy="49" r="46.75"/><path class="cls-1" d="M49.56,67.43C39.5,67.43,34.94,61.05,35.27,53c2.66.06,5.55,0,8.73-.09C66.29,52,76.19,44.12,76.29,34.32c.08-7.83-6.91-12.94-17.1-12.94-14.57,0-27.47,10-31.62,23.92-9-1.38-13.33-4-13.33-4L11.7,49.18S16,51.39,26.26,52.45c-1,13.26,6.11,24.18,21.75,24.18,13,0,22.77-9,26.91-19.25H64.78A16.21,16.21,0,0,1,49.56,67.43ZM36.42,46.08A21.24,21.24,0,0,1,57,30.17c5.16,0,9.16,1.79,9.26,5.28,0,4.34-3.89,9.92-24,10.63q-3.12.11-5.89,0Z"/></svg>

</a>
    </div>
    <nav class="navigation-links -desktop-nav flx-container">



      <a class="-nav-link Target--palvelut " href="/pyorat">Pyörät</a>
      <a class="-nav-link Target--" href="/saariselka">Saariselkä
      </a>
      <a class="-nav-link Target--hinnasto" href="/hinnasto">Hinnasto
      </a>

      <a class="-nav-link Target--yhteystiedot" href="/yhteystiedot">Yhteystiedot</a>

    </nav>

    <div class="nav-cta">
      <a class="f--medium" href="/varaa" target="_blank">Varaa nyt</a>
    </div>

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

        <a href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 98"><defs><style>.cls-1{fill:#ff8517;}</style></defs><path d="M120.28,55.73c0-11.73,9-20.88,20.4-20.88,11.73,0,20.06,8.74,20.06,20.64a18.74,18.74,0,0,1-.16,3h-31.4c1.06,6.56,5.59,10.28,11.9,10.28a11.94,11.94,0,0,0,10.68-6.07l7.45,4.21a21.17,21.17,0,0,1-18.13,9.71A20.56,20.56,0,0,1,120.28,55.73Zm9.15-3.8h22.25c-.81-5.42-5-9.31-11.09-9.31C135,42.62,130.72,46.1,129.43,51.93Z"/><path d="M167.63,75.8V20h21.44c9.79,0,16.59,6.32,16.59,15.3a12.93,12.93,0,0,1-6.56,11.49c5.59,2.1,8.82,6.88,8.82,13.11,0,9.38-6.63,15.94-16.75,15.94Zm9.3-32.21H188.1c5.1,0,8.33-3.07,8.33-7.69s-3.23-7.76-8.33-7.76H176.93Zm0,24h12.3c5.67,0,9.39-3.16,9.39-8.1s-3.72-8.09-9.39-8.09h-12.3Z"/><path d="M213.43,24.25a5.18,5.18,0,1,1,10.36,0,5.18,5.18,0,0,1-10.36,0Zm.65,51.55V35.66h9V75.8Z"/><path d="M231.72,75.8V20h9V55.57l17.48-19.91h10.76L254.05,52.74,269.83,75.8h-10.6L248.15,59.45l-7.45,8.09V75.8Z"/><path d="M269.11,55.73c0-11.73,9-20.88,20.39-20.88,11.74,0,20.07,8.74,20.07,20.64a18.74,18.74,0,0,1-.16,3H278c1.05,6.56,5.59,10.28,11.9,10.28a12,12,0,0,0,10.68-6.07L308,66.9a21.15,21.15,0,0,1-18.12,9.71A20.56,20.56,0,0,1,269.11,55.73Zm9.14-3.8h22.26c-.81-5.42-5-9.31-11.09-9.31C283.84,42.62,279.55,46.1,278.25,51.93Z"/><path d="M316.45,75.8V20h21.37c10.68,0,18.28,7.53,18.28,18a17.19,17.19,0,0,1-10.68,16.42l12,21.45H347L335.87,55.89H325.76V75.8Zm9.31-28.73h11c6,0,10-3.56,10-9.14,0-5.75-4-9.15-10-9.15h-11Z"/><path d="M359,55.73c0-11.73,9-20.88,20.4-20.88,11.73,0,20.06,8.74,20.06,20.64a18.74,18.74,0,0,1-.16,3h-31.4c1.06,6.56,5.59,10.28,11.9,10.28a12,12,0,0,0,10.68-6.07L398,66.9a21.17,21.17,0,0,1-18.13,9.71A20.56,20.56,0,0,1,359,55.73Zm9.15-3.8h22.25c-.81-5.42-5-9.31-11.09-9.31C373.75,42.62,369.46,46.1,368.17,51.93Z"/><path d="M406,75.8V35.66h8.58v4.13c2.59-3.08,6.72-4.94,11.81-4.94,9.88,0,16.92,7,16.92,18.13V75.8h-9v-22c0-6.56-3.56-10.44-9.38-10.44-6,0-10,4-10,10.44v22Z"/><path d="M467.87,75.8c-9.14,0-13.51-4-13.51-12.3V43.92h-6.64V35.66h4.61a2,2,0,0,0,2-2.26V25.63h9v10H474v8.26H463.34V62.61c0,3.15,1.54,4.77,5.18,4.77H474V75.8Z"/><path d="M476.77,55.73c0-11.73,8.74-20.88,20.23-20.88A16.54,16.54,0,0,1,510.44,41V35.66H519V75.8h-8.57V70.46c-2.92,3.88-7.77,6.15-13.44,6.15C485.51,76.61,476.77,67.46,476.77,55.73Zm33.34,0c0-7.2-5.09-12.46-12.13-12.46s-12.22,5.26-12.22,12.46S490.94,68.11,498,68.11,510.11,62.93,510.11,55.73Z"/><path d="M527.76,75.8V20h9V75.8Z"/><path d="M543.62,70.78a5.71,5.71,0,1,1,5.66,5.58A5.68,5.68,0,0,1,543.62,70.78Z"/><path d="M563,75.8V43.92h-6.23V35.66H563V33.32C563,25.55,568.63,20,577.69,20h4.61v7.93h-4.21c-4.2,0-6.15,2-6.15,5.75v2h11v8.26h-11V75.8Zm24.68-51.55a5.18,5.18,0,1,1,10.36,0,5.18,5.18,0,0,1-10.36,0Zm.65,51.55V35.66h9V75.8Z"/><circle cx="48.75" cy="49" r="46.75"/><path class="cls-1" d="M49.56,67.43C39.5,67.43,34.94,61.05,35.27,53c2.66.06,5.55,0,8.73-.09C66.29,52,76.19,44.12,76.29,34.32c.08-7.83-6.91-12.94-17.1-12.94-14.57,0-27.47,10-31.62,23.92-9-1.38-13.33-4-13.33-4L11.7,49.18S16,51.39,26.26,52.45c-1,13.26,6.11,24.18,21.75,24.18,13,0,22.77-9,26.91-19.25H64.78A16.21,16.21,0,0,1,49.56,67.43ZM36.42,46.08A21.24,21.24,0,0,1,57,30.17c5.16,0,9.16,1.79,9.26,5.28,0,4.34-3.89,9.92-24,10.63q-3.12.11-5.89,0Z"/></svg>

      </a>
  </div>

<div class="flx-container">
  <div class="cell -text-content">

    <div class="content-wrap U_base-pad--right-only">

    <nav class="fixed-mobile-navigation__links U_base-pad--right-only">
      <a class="-nav-link Target--palvelut " href="/pyorat">Pyörät</a>
      <a class="-nav-link Target--" href="/saariselka">Saariselkä
      </a>
      <a class="-nav-link Target--hinnasto" href="/hinnasto">Hinnasto
      </a>
      <a class="-nav-link Target--yhteystiedot" href="/yhteystiedot">Yhteystiedot</a>
      <a class="f--medium fixed-order-cta" href="varaa" target="_blank">Varaa nyt</a>
    </nav>

      <div class="fixed-mobile-navigation__sub-links">
        <div class="">

          <ul>
            <li>

            </li>
            <li>

            </li>
          </ul>
        </div>
      </div>




  </div>
      </div>


</div>


</div>

</div>




<div class="site-container" id="site-container">

    <div id="page" class="site">

        <div id="site-content" class="site-content">
