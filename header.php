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


<html <?php if ( get_field( 'lang' ) == 1 ) { ?> lang="en" <?php } else { ?> lang="fi" <?php } ?> class="no-js no-svg dom-loading front-end" @keydown.tab="tab = true" x-data="{ tab: false }"  :class="tab && 'S-detected--tab'">

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
  font-family: "Config-SemiBold";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/Adam-Ladd-Config-SemiBold.woff2') format('woff2');
}
@font-face {
  font-family: "Config-Text";
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/Adam-Ladd-Config-Text.woff2') format('woff2');
}

</style>

	<?php wp_head(); ?>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>




 <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


  <script>


  </script>





<!-- <script src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.6.1/dist/cookieconsent.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.6.1/dist/cookieconsent.css"> -->

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
const home_url = "<?php echo home_url() ?>"; // "A string here"

console.log(home_url);

</script>

</head>




<?php

$page_name = get_the_title();
?>

<body <?php body_class( $page_name ); ?> x-data >






<header class="site-header">
  <div class="site-header_inner U_container U_base-pad">
    <div class="flx-container flx-nav" style="position:relative">



    <div class="header-logo">
        <a href="<?php echo home_url() ?>">
    <svg id="uuid-342f5561-c2e0-4b5c-84ea-fa690d9307ee" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178 178"><path d="M151.86,89.68c-.94-.54-2.1-.32-2.64,.62-1.25,2.17-2.66,4.26-4.28,6.07-.8,.91-1.68,1.74-2.58,2.43-.95,.73-2.3,1.66-3.56,1.55-1.1-.1-.81-2.03-.76-2.78,.1-1.14,.35-2.35,.65-3.56,.3-1.21,.65-2.43,1.05-3.64,1.57-4.87,3.53-9.7,5.54-14.51,2.02-4.81,4.12-9.6,6.23-14.4h0c.45-1.04-.07-2.18-1.14-2.56-1.08-.38-2.15-.12-2.61,.92-2.1,4.8-4.2,9.6-6.23,14.45-1.14,2.74-2.29,5.49-3.35,8.27-.16-.23-.34-.46-.53-.68-1.88-2.11-4.68-2.61-7.32-1.93-1.56,.43-2.92,1.2-4.11,2.11-1.18,.92-2.22,1.99-3.07,3.14-.86,1.15-1.61,2.36-2.22,3.61-.68,1.4-1.32,2.89-1.74,4.42-1.41,2.11-3.22,3.96-5.3,5.28-1.14,.72-2.36,1.27-3.6,1.57-1.27,.29-2.5,.37-3.79,.2-1.25-.17-2.41-.57-3.24-1.23-.3-.25-.56-.53-.78-.83,2.7-.65,5.27-1.77,7.59-3.31,1.38-.93,2.69-2,3.85-3.3,1.14-1.3,2.2-2.8,2.72-4.8,.58-2.27-.17-4.74-2.07-6.15-1.89-1.4-4.32-1.28-6.41-.43-1.75,.72-3.15,1.78-4.4,2.94-1.25,1.17-2.32,2.47-3.24,3.89-.91,1.43-1.68,2.92-2.21,4.59-.52,1.66-.83,3.51-.52,5.46,.08,.5,.21,1,.39,1.49-1.28,.56-2.58,1.04-3.88,1.39-1.46,.39-3.09,.69-4.59,.38-1.5-.31-2.27-1.25-2.49-2.74-.2-1.52,.11-3.39,.56-5.2,.65-2.6,1.59-5.2,2.63-7.79,.53-.12,1.05-.24,1.58-.37,2.25-.54,4.66-1.24,6.88-1.98,1.03-.34,1.34-1.32,1.11-2.36-.24-1.06-1.24-1.62-2.26-1.3-1.73,.54-3.6,1.09-5.42,1.56,1.41-3.21,2.97-6.38,4.46-9.54h0c.49-1.09,0-2.27-1.04-2.7-.99-.4-2.16-.12-2.64,.9-1.71,3.67-3.5,7.29-5.08,11.01-.21,.49-.42,.99-.62,1.48-.96,.21-1.93,.4-2.9,.58-2.21,.41-4.17,.74-6.5,1.09-.33,.05-.83,.12-1.16,.16,1.18-3.2,2.39-6.41,3.71-9.48,1.03-2.38,2.13-4.7,3.51-6.69,1.34-1.92,2.84-3.5,4.93-4.57,1-.51,1.63-1.74,1.12-2.75-.51-1.01-1.58-1.34-2.64-.91-.37,.15-.89,.43-1.38,.74-2.33,1.42-3.79,3.06-5.4,5.18-1.62,2.39-2.81,4.88-3.89,7.37-1.66,3.86-3.09,7.74-4.5,11.61-.38,.04-.75,.07-1.13,.1-.48,.04-.99,.23-1.31,.65-.61,.8-.66,2.05,.15,2.78,.24,.2,.5,.44,.75,.67-1.17,3.15-3.45,6.4-5.36,8.57-1.09,1.24-2.35,2.38-3.61,3.16-.7,.49-2.22,1.23-3.04,.63-.73-.54-.59-2.15-.53-2.91,.12-1.54,.51-3.19,.98-4.82,.96-3.26,2.32-6.58,3.8-9.65,.45-.94,.04-2.21-.99-2.65-1.03-.44-2.18-.17-2.68,.85-.84,1.69-1.56,3.35-2.24,5.07-.68,1.71-1.29,3.45-1.82,5.25-.37,1.29-.7,2.65-.91,4.04-2.67,1.31-5.51,2.55-8.05,3.62-2.95,1.23-7,2.65-8.69,3.05-1.01,.24-3.77,.95-4.67,.19-.96-.81-.36-3.24-.07-4.45,.33-1.34,.76-2.67,1.25-4.11,.97-2.81,2.27-6.16,3.38-8.9,1.22-3.03,2.42-5.84,3.66-8.59,1.28-2.86,2.63-5.7,3.99-8.43,1.59-3.18,3.15-6.13,4.26-8.05,.33-.57,.36-1.26,.21-1.82s-.53-.99-.99-1.23c-.5-.25-1.1-.39-1.66-.24-.56,.15-1,.52-1.29,1.02-1.43,2.47-2.77,5.01-4.46,8.37-1.39,2.79-2.76,5.68-4.07,8.59-1.24,2.75-2.49,5.69-3.72,8.74-1.13,2.81-2.33,5.83-3.4,8.91-.55,1.64-1.03,3.12-1.41,4.7-1.03,3.74-.77,6.54,.75,8.31,1.16,1.35,2.79,1.81,4.59,1.81,1.52,0,3.17-.33,4.73-.73,3.4-.87,6.55-2.12,9.19-3.23,2.14-.91,4.26-1.94,6.41-3.01,.29,1.55,1,2.97,2.45,3.81,2.18,1.27,5.03,.55,7.03-.79,.8-.54,1.53-1.24,2.19-1.99-.13,.36-.26,.72-.38,1.08-1.74,5.05-3.41,10.13-4.67,15.44-.31,1.33-.59,2.67-.8,4.05-.53,3.61-.94,9.57,3.85,10.47,2.16,.41,4.05-1.3,5.38-2.78,1.51-1.67,2.74-3.6,3.83-5.56,1.35-2.42,2.48-4.94,3.42-7.53,.94-2.59,1.7-5.25,2.21-7.97,.51-2.73,.79-5.52,.68-8.36-.11-2.83-.6-5.72-1.73-8.44-.59-1.44-1.38-2.82-2.32-4.08,.98-.12,1.95-.24,2.93-.38,2.29-.32,4.57-.7,6.84-1.13,.16-.03,.31-.07,.47-.1-.69,1.88-1.31,3.81-1.81,5.82-.24,1.03-.46,2.09-.58,3.19-.12,1.11-.17,2.26,0,3.5,.37,2.46,1.7,4.57,4.05,5.55,2.53,1.06,5.4,.7,7.98,0,1.68-.47,3.38-1.2,4.94-2,.18,.17,.36,.33,.55,.47,1.58,1.24,3.43,1.81,5.19,2.04,1.8,.23,3.53,.11,5.28-.31,1.72-.43,3.3-1.19,4.73-2.11,1.07-.7,2.05-1.54,2.95-2.46,.03,.1,.06,.19,.09,.29,.26,.85,.73,1.67,1.33,2.39,1.65,1.87,4.2,2.63,6.62,2.21,2.58-.45,4.74-2.18,6.43-4.09,.21-.25,.42-.5,.61-.76,0,.07,0,.13,.02,.2,.22,2.26,1.51,4.26,3.85,4.69,2.52,.47,4.97-.83,6.91-2.31,1.16-.9,2.2-1.9,3.12-2.96,1.86-2.1,3.36-4.42,4.68-6.81,.53-.96,.22-1.97-.72-2.52Zm-76.29,10.14c.16,5.18-.92,10.03-2.66,14.81-.88,2.39-1.77,4.6-2.88,6.64-.71,1.3-1.58,2.7-2.52,4.03-.83,1.17-2.19,2.56-2.86,2.43-.66-.13-.79-1.02-.84-1.77-.08-1.29,.08-2.58,.28-3.85,.19-1.24,.46-2.49,.75-3.75,1.2-5.03,2.86-10.04,4.57-15.02,.87-2.49,1.76-4.97,2.68-7.45l1.52-4.13c.16,.32,.32,.64,.47,.97,.99,2.24,1.4,4.62,1.48,7.09Zm28.3-10.59c.75-1.14,1.63-2.21,2.62-3.12,.98-.91,2.08-1.69,3.17-2.13,.68-.27,1.62-.55,2.31-.15,.71,.41,.86,1.28,.67,2.02-.23,.97-.92,2.09-1.79,3.06-.88,.99-1.92,1.89-3.06,2.67-1.84,1.26-3.91,2.23-6.05,2.83,.26-1.72,1.08-3.57,2.14-5.18Zm30.41,2.17c-1.14,2.2-2.41,4.31-3.93,6.06-1.25,1.41-2.94,2.91-4.95,2.82-.81-.05-1.53-.42-2-.94-.44-.54-.71-1.31-.72-2.29,0-1.98,.85-4.32,1.89-6.44,1.03-2.13,2.4-4.06,4.1-5.4,.84-.66,1.77-1.18,2.71-1.44,.84-.22,1.69-.3,2.48,.1,.72,.36,1.22,.96,1.53,1.69,.3,.69,.44,1.55,.48,2.46-.5,1.15-1.01,2.28-1.58,3.38Z" style="fill:#04aef2;"/><path d="M64.28,74.57c1.9,.64,3.35-.7,4.02-2.55,.35-.96,.4-1.66,.13-2.39-.28-.74-.91-1.33-1.69-1.55-1.87-.53-3.33,.98-3.9,2.59-.22,.62-.42,1.49-.09,2.35,.27,.71,.81,1.3,1.54,1.55Z" style="fill:#04aef2;"/><path id="logo-border" d="M89,0C39.93,0,0,39.93,0,89s39.93,89,89,89,89-39.93,89-89S138.07,0,89,0Zm0,174.08C42.09,174.08,3.92,135.91,3.92,89S42.09,3.92,89,3.92s85.08,38.17,85.08,85.08-38.17,85.08-85.08,85.08Z" style="fill:#04aef2;"/></svg>
</a>
    </div>


    <?php if ( get_field( 'lang' ) == 1 ) { ?>



      <div class="lang-switch <?php if ( get_field( 'lang' ) == 1 ) { ?>
lang-switch--en-active
<?php } else { ?>
lang-switch--fi-active
<?php } ?>">
        <a class="link-fi" href="<?php echo home_url() ?>">FI</a>
        <div class="lang-separator"></div>
            <a class="link-en" href="<?php echo home_url() ?>/en">EN</a>
      </div>




    <?php } else { ?>

    <nav class="navigation-links -desktop-nav flx-container">


      <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false; $store.dropdown = false">
          <button class="-nav-link Target--palvelut" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true">Mitä teemme</button>
          <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false; $store.dropdown = false">
            <div class="dropdown-nav__content">
            <div class="flx-container">
              <div class="dropdown-nav__cell -left">
                <h3 class="f--bold">Mitä teemme </h3>
                <p>Tarjoamme vaikuttavia hyvinvoinnin ja
Itsensä johtaminen
Etätyö- ja hybridityö
tuottavuuden nostamiseen keskittyviä henkilöstön kehittämisen palveluita tietotyöorganisaatioille.</p>
<div class="-arrow-link">
  <a href="#">Kaikki palvelut</a>
      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg>
</div>

              </div>
              <div class="dropdown-nav__cell -right">
                <ul class="-ul">
                  <li class="-li">
                    <a class="-nav-link Target-- -main-link" href="/palvelu"> <span class="f--bold"> <img src="https://lifted.fi/wp-content/uploads/2021/03/Lifted-ikonit-siniset-25.png" alt=""> Johtaminen</span>
                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
                    <!-- <div class="-sub-links">
                      <a href="#" class="tag-capsule ">Ländäri esimiestyö</a>     <a href="#" class="tag-capsule">Ländäri Tiimityö</a>     <a href="#" class="tag-capsule">Ländäri Tiimityö</a>
                       <a href="#" class="tag-capsule">Ländäri johtaminen</a>

                    </div> -->

                  </li>
                  <li class="-li">
                    <a class="-nav-link Target-- -main-link" href="/palvelu"> <span class="f--bold"> <img src="https://lifted.fi/wp-content/uploads/2021/03/Lifted-ikonit-siniset-23.png" alt=""> Tiimityö</span>
                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>

                  </li>
                  <li class="-li">

                        <a class="-nav-link Target-- -main-link" href="/palvelu"> <span class="f--bold"> <img src="https://lifted.fi/wp-content/uploads/2021/03/Lifted-ikonit-siniset-09.png" alt=""> Itsensä johtaminen</span>
                      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                  </li>
                  <li class="-li">

                        <a class="-nav-link Target-- -main-link" href="/luennot"> <span>Luennot ja Workshopit</span>
                      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                  </li>





                </ul>
                      </div>
              </div>

            </div>
            </div>

          </div>

          <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false">
              <button class="-nav-link Target--palvelut" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true">Sisällöt</button>
              <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false">
                <div class="dropdown-nav__content">
                <div class="flx-container">
                  <div class="dropdown-nav__cell -left">
                    <h3 class="f--bold">Sisällöt</h3>
                    <p>Tarjoamme vaikuttavia hyvinvoinnin ja
    Itsensä johtaminen
    Etätyö- ja hybridityö
    tuottavuuden nostamiseen keskittyviä henkilöstön kehittämisen palveluita tietotyöorganisaatioille.</p>


                  </div>
                  <div class="dropdown-nav__cell -right">
                    <ul class="-ul">
                      <li class="-li">
                        <a class="-nav-link Target-- -main-link" href="/artikkelit"> <span>Artikkelit</span>
                      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                      </li>
                      <li class="-li">
                        <a class="-nav-link Target-- -main-link" href="/artikkelit"> <span>Podcast</span>
                      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>

                      </li>
                      <li class="-li">

                            <a class="-nav-link Target-- -main-link" href="/materiaalit"> <span>Materiaalit</span>
                          <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
                        </div>

                      </li>


                    </ul>

                  </div>

                </div>
                </div>

              </div>

              <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false">
                  <button class="-nav-link Target--palvelut" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true">Meistä</button>
                  <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false">
                    <div class="dropdown-nav__content">
                    <div class="flx-container">
                      <div class="dropdown-nav__cell -left">
                        <h3 class="f--bold">Meistä</h3>
                        <p>Tarjoamme vaikuttavia hyvinvoinnin ja
        Itsensä johtaminen
        Etätyö- ja hybridityö
        tuottavuuden nostamiseen keskittyviä henkilöstön kehittämisen palveluita tietotyöorganisaatioille.</p>


                      </div>
                      <div class="dropdown-nav__cell -right">
                        <ul class="-ul">
                          <li class="-li">
                            <a class="-nav-link Target-- -main-link" href="/"> <span>Lifted</span>
                          <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                          </li>
                          <li class="-li">
                            <a class="-nav-link Target-- -main-link" href="/asiantuntijat"> <span>Asiantuntijat</span>
                          <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>

                          </li>
                          <li class="-li">

                                <a class="-nav-link Target-- -main-link" href="/kokemuksia"> <span>Kokemuksia</span>
                              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
                            </div>

                          </li>


                        </ul>

                      </div>

                    </div>
                    </div>

                  </div>

                  <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false">
                      <button class="-nav-link Target--palvelut" href="/" @mouseenter="">Ajankohtaista</button>
                      <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false">
                        <div class="dropdown-nav__content">
                        <div class="flx-container">
                          <div class="dropdown-nav__cell -left">
                            <h3 class="f--bold">Ajankohtaista</h3>
                            <p>Tarjoamme vaikuttavia hyvinvoinnin ja
            Itsensä johtaminen
            Etätyö- ja hybridityö
            tuottavuuden nostamiseen keskittyviä henkilöstön kehittämisen palveluita tietotyöorganisaatioille.</p>


                          </div>
                          <div class="dropdown-nav__cell -right">
                            <ul class="-ul">
                              <li class="-li">
                                <a class="-nav-link Target-- -main-link" href="/"> <span>Asiantuntijat</span>
                              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                              </li>
                              <li class="-li">
                                <a class="-nav-link Target-- -main-link" href="/"> <span>Asiantuntijat</span>
                              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>

                              </li>
                              <li class="-li">

                                    <a class="-nav-link Target-- -main-link" href="/"> <span>Asiantuntijat</span>
                                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
                                </div>

                              </li>


                            </ul>

                          </div>

                        </div>
                        </div>

                      </div>









    </nav>

    <div class="lang-switch <?php if ( get_field( 'lang' ) == 1 ) { ?>
lang-switch--en-active
<?php } else { ?>
lang-switch--fi-active
<?php } ?>">
      <a class="link-fi" href="<?php echo home_url() ?>">FI</a>
      <div class="lang-separator"></div>
          <a class="link-en" href="<?php echo home_url() ?>/en">EN</a>
    </div>


    <div class="nav-cta">
      <a class="f--medium" href="/varaa" target="_blank">Ota yhteyttä</a>
    </div>


        <?php } ?>




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
<div class="fixed-mobile-navigation_inner U_container U_base-pad" style="display:none">
  <div class="fixed-logo -top">

        <a href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 98"><defs><style>.cls-1{fill:#ff8517;}</style></defs><path d="M120.28,55.73c0-11.73,9-20.88,20.4-20.88,11.73,0,20.06,8.74,20.06,20.64a18.74,18.74,0,0,1-.16,3h-31.4c1.06,6.56,5.59,10.28,11.9,10.28a11.94,11.94,0,0,0,10.68-6.07l7.45,4.21a21.17,21.17,0,0,1-18.13,9.71A20.56,20.56,0,0,1,120.28,55.73Zm9.15-3.8h22.25c-.81-5.42-5-9.31-11.09-9.31C135,42.62,130.72,46.1,129.43,51.93Z"/><path d="M167.63,75.8V20h21.44c9.79,0,16.59,6.32,16.59,15.3a12.93,12.93,0,0,1-6.56,11.49c5.59,2.1,8.82,6.88,8.82,13.11,0,9.38-6.63,15.94-16.75,15.94Zm9.3-32.21H188.1c5.1,0,8.33-3.07,8.33-7.69s-3.23-7.76-8.33-7.76H176.93Zm0,24h12.3c5.67,0,9.39-3.16,9.39-8.1s-3.72-8.09-9.39-8.09h-12.3Z"/><path d="M213.43,24.25a5.18,5.18,0,1,1,10.36,0,5.18,5.18,0,0,1-10.36,0Zm.65,51.55V35.66h9V75.8Z"/><path d="M231.72,75.8V20h9V55.57l17.48-19.91h10.76L254.05,52.74,269.83,75.8h-10.6L248.15,59.45l-7.45,8.09V75.8Z"/><path d="M269.11,55.73c0-11.73,9-20.88,20.39-20.88,11.74,0,20.07,8.74,20.07,20.64a18.74,18.74,0,0,1-.16,3H278c1.05,6.56,5.59,10.28,11.9,10.28a12,12,0,0,0,10.68-6.07L308,66.9a21.15,21.15,0,0,1-18.12,9.71A20.56,20.56,0,0,1,269.11,55.73Zm9.14-3.8h22.26c-.81-5.42-5-9.31-11.09-9.31C283.84,42.62,279.55,46.1,278.25,51.93Z"/><path d="M316.45,75.8V20h21.37c10.68,0,18.28,7.53,18.28,18a17.19,17.19,0,0,1-10.68,16.42l12,21.45H347L335.87,55.89H325.76V75.8Zm9.31-28.73h11c6,0,10-3.56,10-9.14,0-5.75-4-9.15-10-9.15h-11Z"/><path d="M359,55.73c0-11.73,9-20.88,20.4-20.88,11.73,0,20.06,8.74,20.06,20.64a18.74,18.74,0,0,1-.16,3h-31.4c1.06,6.56,5.59,10.28,11.9,10.28a12,12,0,0,0,10.68-6.07L398,66.9a21.17,21.17,0,0,1-18.13,9.71A20.56,20.56,0,0,1,359,55.73Zm9.15-3.8h22.25c-.81-5.42-5-9.31-11.09-9.31C373.75,42.62,369.46,46.1,368.17,51.93Z"/><path d="M406,75.8V35.66h8.58v4.13c2.59-3.08,6.72-4.94,11.81-4.94,9.88,0,16.92,7,16.92,18.13V75.8h-9v-22c0-6.56-3.56-10.44-9.38-10.44-6,0-10,4-10,10.44v22Z"/><path d="M467.87,75.8c-9.14,0-13.51-4-13.51-12.3V43.92h-6.64V35.66h4.61a2,2,0,0,0,2-2.26V25.63h9v10H474v8.26H463.34V62.61c0,3.15,1.54,4.77,5.18,4.77H474V75.8Z"/><path d="M476.77,55.73c0-11.73,8.74-20.88,20.23-20.88A16.54,16.54,0,0,1,510.44,41V35.66H519V75.8h-8.57V70.46c-2.92,3.88-7.77,6.15-13.44,6.15C485.51,76.61,476.77,67.46,476.77,55.73Zm33.34,0c0-7.2-5.09-12.46-12.13-12.46s-12.22,5.26-12.22,12.46S490.94,68.11,498,68.11,510.11,62.93,510.11,55.73Z"/><path d="M527.76,75.8V20h9V75.8Z"/><path d="M543.62,70.78a5.71,5.71,0,1,1,5.66,5.58A5.68,5.68,0,0,1,543.62,70.78Z"/><path d="M563,75.8V43.92h-6.23V35.66H563V33.32C563,25.55,568.63,20,577.69,20h4.61v7.93h-4.21c-4.2,0-6.15,2-6.15,5.75v2h11v8.26h-11V75.8Zm24.68-51.55a5.18,5.18,0,1,1,10.36,0,5.18,5.18,0,0,1-10.36,0Zm.65,51.55V35.66h9V75.8Z"/><circle cx="48.75" cy="49" r="46.75"/><path class="cls-1" d="M49.56,67.43C39.5,67.43,34.94,61.05,35.27,53c2.66.06,5.55,0,8.73-.09C66.29,52,76.19,44.12,76.29,34.32c.08-7.83-6.91-12.94-17.1-12.94-14.57,0-27.47,10-31.62,23.92-9-1.38-13.33-4-13.33-4L11.7,49.18S16,51.39,26.26,52.45c-1,13.26,6.11,24.18,21.75,24.18,13,0,22.77-9,26.91-19.25H64.78A16.21,16.21,0,0,1,49.56,67.43ZM36.42,46.08A21.24,21.24,0,0,1,57,30.17c5.16,0,9.16,1.79,9.26,5.28,0,4.34-3.89,9.92-24,10.63q-3.12.11-5.89,0Z"/></svg>

      </a>
  </div>

<div class="flx-container">
  <div class="cell -text-content">

    <div class="content-wrap U_base-pad--right-only">

    <nav class="fixed-mobile-navigation__links U_base-pad--right-only">


      <?php if ( get_field( 'lang' ) == 1 ) { ?>
        <a class="-nav-link Target--palvelut " href="/en/bikes">Bikes</a>
        <a class="-nav-link Target--" href="/en/">Saariselkä
        </a>
        <a class="-nav-link Target--hinnasto" href="en/pricing">Pricing
        </a>

        <a class="-nav-link Target--yhteystiedot" href="/en/contact">Contact</a>
            <a class="f--medium fixed-order-cta" href="varaa" target="_blank">Book Now</a>

  <?php } else { ?>
    <a class="-nav-link Target--palvelut " href="/">Pyörät</a>
    <a class="-nav-link Target--" href="/">Saariselkä
    </a>
    <a class="-nav-link Target--hinnasto" href="/hinnasto">Hinnasto
    </a>
    <a class="-nav-link Target--yhteystiedot" href="/yhteystiedot">Yhteystiedot</a>
    <a class="f--medium fixed-order-cta" href="varaa" target="_blank">Varaa nyt</a>

  <?php } ?>


    </nav>

      <div class="fixed-mobile-navigation__sub-links">
        <div class="">

          <ul>

            <?php if ( get_field( 'lang' ) == 1 ) { ?>

              <li>
                <a href="/rental-terms/">Rental Terms</a>
              </li>

  <?php } else { ?>
    <li>
      <a href="/vuokrausehdot">Vuokrausehdot</a>
    </li>
    <li class="tietosuoja-link">
      <a href="/Tietosuojaseloste">Tietosuojaseloste</a>
    </li>

  <?php } ?>




          </ul>
        </div>
      </div>




  </div>
      </div>


</div>


</div>

</div>




<div class="site-container <?php if ( get_field( 'lang' ) == 1 ) { ?> en-page <?php } else { ?> fi-page <?php } ?>" id="site-container">

    <div id="page" class="site">

        <div id="site-content" class="site-content">
