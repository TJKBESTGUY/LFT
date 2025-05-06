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


	<?php wp_head(); ?>

  <style media="screen">
  @font-face {
    font-family: "Config-SemiBold";
    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Adam-Ladd-Config-SemiBold.woff2') format('woff2');
     font-display: swap;
  }
  @font-face {
    font-family: "Config-Text";
    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Adam-Ladd-Config-Text.woff2') format('woff2');
     font-display: swap;
  }

  </style>

  <!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> -->

  <!-- <script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script> -->


  <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/swiper@8.4.7/swiper-bundle.min.js"></script>
 <script defer src="https://unpkg.com/alpinejs@3.11.1/dist/cdn.min.js"></script>



  <!-- <script  src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js?r=5426"></script>
   <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js"></script> -->

  <script>


  </script>





<!-- <script src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.6.1/dist/cookieconsent.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.6.1/dist/cookieconsent.css"> -->


  <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->

<script type="text/javascript">
const home_url = "<?php echo home_url() ?>"; // "A string here"
const page_url = "<?php echo get_permalink(); ?>"; // "A string here"
console.log(home_url);

</script>

</head>




<?php

$page_name = get_the_title();
?>

<body <?php body_class(  ); ?> x-data >






<header class="site-header">
  <div class="site-header_inner U_container U_base-pad">
    <div class="flx-container flx-nav" style="position:relative">



    <div class="header-logo">
      <?php if ( get_field( 'lang' ) == 1 ) { ?>
                <a href="<?php echo home_url() ?>/en/">
    <?php } else { ?>
          <a href="<?php echo home_url() ?>">
    <?php } ?>

    <svg id="uuid-342f5561-c2e0-4b5c-84ea-fa690d9307ee" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178 178"><path d="M151.86,89.68c-.94-.54-2.1-.32-2.64,.62-1.25,2.17-2.66,4.26-4.28,6.07-.8,.91-1.68,1.74-2.58,2.43-.95,.73-2.3,1.66-3.56,1.55-1.1-.1-.81-2.03-.76-2.78,.1-1.14,.35-2.35,.65-3.56,.3-1.21,.65-2.43,1.05-3.64,1.57-4.87,3.53-9.7,5.54-14.51,2.02-4.81,4.12-9.6,6.23-14.4h0c.45-1.04-.07-2.18-1.14-2.56-1.08-.38-2.15-.12-2.61,.92-2.1,4.8-4.2,9.6-6.23,14.45-1.14,2.74-2.29,5.49-3.35,8.27-.16-.23-.34-.46-.53-.68-1.88-2.11-4.68-2.61-7.32-1.93-1.56,.43-2.92,1.2-4.11,2.11-1.18,.92-2.22,1.99-3.07,3.14-.86,1.15-1.61,2.36-2.22,3.61-.68,1.4-1.32,2.89-1.74,4.42-1.41,2.11-3.22,3.96-5.3,5.28-1.14,.72-2.36,1.27-3.6,1.57-1.27,.29-2.5,.37-3.79,.2-1.25-.17-2.41-.57-3.24-1.23-.3-.25-.56-.53-.78-.83,2.7-.65,5.27-1.77,7.59-3.31,1.38-.93,2.69-2,3.85-3.3,1.14-1.3,2.2-2.8,2.72-4.8,.58-2.27-.17-4.74-2.07-6.15-1.89-1.4-4.32-1.28-6.41-.43-1.75,.72-3.15,1.78-4.4,2.94-1.25,1.17-2.32,2.47-3.24,3.89-.91,1.43-1.68,2.92-2.21,4.59-.52,1.66-.83,3.51-.52,5.46,.08,.5,.21,1,.39,1.49-1.28,.56-2.58,1.04-3.88,1.39-1.46,.39-3.09,.69-4.59,.38-1.5-.31-2.27-1.25-2.49-2.74-.2-1.52,.11-3.39,.56-5.2,.65-2.6,1.59-5.2,2.63-7.79,.53-.12,1.05-.24,1.58-.37,2.25-.54,4.66-1.24,6.88-1.98,1.03-.34,1.34-1.32,1.11-2.36-.24-1.06-1.24-1.62-2.26-1.3-1.73,.54-3.6,1.09-5.42,1.56,1.41-3.21,2.97-6.38,4.46-9.54h0c.49-1.09,0-2.27-1.04-2.7-.99-.4-2.16-.12-2.64,.9-1.71,3.67-3.5,7.29-5.08,11.01-.21,.49-.42,.99-.62,1.48-.96,.21-1.93,.4-2.9,.58-2.21,.41-4.17,.74-6.5,1.09-.33,.05-.83,.12-1.16,.16,1.18-3.2,2.39-6.41,3.71-9.48,1.03-2.38,2.13-4.7,3.51-6.69,1.34-1.92,2.84-3.5,4.93-4.57,1-.51,1.63-1.74,1.12-2.75-.51-1.01-1.58-1.34-2.64-.91-.37,.15-.89,.43-1.38,.74-2.33,1.42-3.79,3.06-5.4,5.18-1.62,2.39-2.81,4.88-3.89,7.37-1.66,3.86-3.09,7.74-4.5,11.61-.38,.04-.75,.07-1.13,.1-.48,.04-.99,.23-1.31,.65-.61,.8-.66,2.05,.15,2.78,.24,.2,.5,.44,.75,.67-1.17,3.15-3.45,6.4-5.36,8.57-1.09,1.24-2.35,2.38-3.61,3.16-.7,.49-2.22,1.23-3.04,.63-.73-.54-.59-2.15-.53-2.91,.12-1.54,.51-3.19,.98-4.82,.96-3.26,2.32-6.58,3.8-9.65,.45-.94,.04-2.21-.99-2.65-1.03-.44-2.18-.17-2.68,.85-.84,1.69-1.56,3.35-2.24,5.07-.68,1.71-1.29,3.45-1.82,5.25-.37,1.29-.7,2.65-.91,4.04-2.67,1.31-5.51,2.55-8.05,3.62-2.95,1.23-7,2.65-8.69,3.05-1.01,.24-3.77,.95-4.67,.19-.96-.81-.36-3.24-.07-4.45,.33-1.34,.76-2.67,1.25-4.11,.97-2.81,2.27-6.16,3.38-8.9,1.22-3.03,2.42-5.84,3.66-8.59,1.28-2.86,2.63-5.7,3.99-8.43,1.59-3.18,3.15-6.13,4.26-8.05,.33-.57,.36-1.26,.21-1.82s-.53-.99-.99-1.23c-.5-.25-1.1-.39-1.66-.24-.56,.15-1,.52-1.29,1.02-1.43,2.47-2.77,5.01-4.46,8.37-1.39,2.79-2.76,5.68-4.07,8.59-1.24,2.75-2.49,5.69-3.72,8.74-1.13,2.81-2.33,5.83-3.4,8.91-.55,1.64-1.03,3.12-1.41,4.7-1.03,3.74-.77,6.54,.75,8.31,1.16,1.35,2.79,1.81,4.59,1.81,1.52,0,3.17-.33,4.73-.73,3.4-.87,6.55-2.12,9.19-3.23,2.14-.91,4.26-1.94,6.41-3.01,.29,1.55,1,2.97,2.45,3.81,2.18,1.27,5.03,.55,7.03-.79,.8-.54,1.53-1.24,2.19-1.99-.13,.36-.26,.72-.38,1.08-1.74,5.05-3.41,10.13-4.67,15.44-.31,1.33-.59,2.67-.8,4.05-.53,3.61-.94,9.57,3.85,10.47,2.16,.41,4.05-1.3,5.38-2.78,1.51-1.67,2.74-3.6,3.83-5.56,1.35-2.42,2.48-4.94,3.42-7.53,.94-2.59,1.7-5.25,2.21-7.97,.51-2.73,.79-5.52,.68-8.36-.11-2.83-.6-5.72-1.73-8.44-.59-1.44-1.38-2.82-2.32-4.08,.98-.12,1.95-.24,2.93-.38,2.29-.32,4.57-.7,6.84-1.13,.16-.03,.31-.07,.47-.1-.69,1.88-1.31,3.81-1.81,5.82-.24,1.03-.46,2.09-.58,3.19-.12,1.11-.17,2.26,0,3.5,.37,2.46,1.7,4.57,4.05,5.55,2.53,1.06,5.4,.7,7.98,0,1.68-.47,3.38-1.2,4.94-2,.18,.17,.36,.33,.55,.47,1.58,1.24,3.43,1.81,5.19,2.04,1.8,.23,3.53,.11,5.28-.31,1.72-.43,3.3-1.19,4.73-2.11,1.07-.7,2.05-1.54,2.95-2.46,.03,.1,.06,.19,.09,.29,.26,.85,.73,1.67,1.33,2.39,1.65,1.87,4.2,2.63,6.62,2.21,2.58-.45,4.74-2.18,6.43-4.09,.21-.25,.42-.5,.61-.76,0,.07,0,.13,.02,.2,.22,2.26,1.51,4.26,3.85,4.69,2.52,.47,4.97-.83,6.91-2.31,1.16-.9,2.2-1.9,3.12-2.96,1.86-2.1,3.36-4.42,4.68-6.81,.53-.96,.22-1.97-.72-2.52Zm-76.29,10.14c.16,5.18-.92,10.03-2.66,14.81-.88,2.39-1.77,4.6-2.88,6.64-.71,1.3-1.58,2.7-2.52,4.03-.83,1.17-2.19,2.56-2.86,2.43-.66-.13-.79-1.02-.84-1.77-.08-1.29,.08-2.58,.28-3.85,.19-1.24,.46-2.49,.75-3.75,1.2-5.03,2.86-10.04,4.57-15.02,.87-2.49,1.76-4.97,2.68-7.45l1.52-4.13c.16,.32,.32,.64,.47,.97,.99,2.24,1.4,4.62,1.48,7.09Zm28.3-10.59c.75-1.14,1.63-2.21,2.62-3.12,.98-.91,2.08-1.69,3.17-2.13,.68-.27,1.62-.55,2.31-.15,.71,.41,.86,1.28,.67,2.02-.23,.97-.92,2.09-1.79,3.06-.88,.99-1.92,1.89-3.06,2.67-1.84,1.26-3.91,2.23-6.05,2.83,.26-1.72,1.08-3.57,2.14-5.18Zm30.41,2.17c-1.14,2.2-2.41,4.31-3.93,6.06-1.25,1.41-2.94,2.91-4.95,2.82-.81-.05-1.53-.42-2-.94-.44-.54-.71-1.31-.72-2.29,0-1.98,.85-4.32,1.89-6.44,1.03-2.13,2.4-4.06,4.1-5.4,.84-.66,1.77-1.18,2.71-1.44,.84-.22,1.69-.3,2.48,.1,.72,.36,1.22,.96,1.53,1.69,.3,.69,.44,1.55,.48,2.46-.5,1.15-1.01,2.28-1.58,3.38Z" style="fill:#04aef2;"/><path d="M64.28,74.57c1.9,.64,3.35-.7,4.02-2.55,.35-.96,.4-1.66,.13-2.39-.28-.74-.91-1.33-1.69-1.55-1.87-.53-3.33,.98-3.9,2.59-.22,.62-.42,1.49-.09,2.35,.27,.71,.81,1.3,1.54,1.55Z" style="fill:#04aef2;"/><path id="logo-border" d="M89,0C39.93,0,0,39.93,0,89s39.93,89,89,89,89-39.93,89-89S138.07,0,89,0Zm0,174.08C42.09,174.08,3.92,135.91,3.92,89S42.09,3.92,89,3.92s85.08,38.17,85.08,85.08-38.17,85.08-85.08,85.08Z" style="fill:#04aef2;"/></svg>
</a>
    </div>


    <?php if ( get_field( 'lang' ) == 1 ) { ?>


      <nav class="navigation-links -desktop-nav flx-container">







        <?php if( have_rows('navigation_en', 'option') ): ?>



            <?php while( have_rows('navigation_en', 'option') ) : the_row(); ?>



        <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false; $store.dropdown = false" x-trap="dropdown_open">
            <button class="-nav-link Target--palvelut" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true" @keydown.enter="dropdown_open = ! dropdown_open; $store.dropdown = true"><?php the_sub_field('group_name'); ?>
              <svg viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="12px" height="12px" class="NavDropdown-module--icon--84991"><path fill-rule="evenodd" clip-rule="evenodd" d="M.293.293a1 1 0 0 1 1.414 0L7 5.586 12.293.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414Z" fill="currentColor"></path></svg>
            </button>
            <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false; $store.dropdown = false">
              <div class="dropdown-nav__content">
              <div class="flx-container">
                <div class="dropdown-nav__cell -left">
                  <h3 class="f--bold"><?php the_sub_field('group_name'); ?></h3>
                  <p>
  <?php the_sub_field('group_info_text'); ?>



                  </p>

        <?php $link_m = get_sub_field('group_main_link'); ?>
        <?php
        if( $link_m ):


      $link_m_url = $link_m['url'];
      $link_m_title = $link_m['title'];

      ?>
      <div class="-arrow-link">

        <a href="<?php echo $link_m_url; ?>"><?php echo   $link_m_title; ?></a>
            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg>
      </div>


  <?php endif; ?>




                </div>
                <div class="dropdown-nav__cell -right">
                  <ul class="-ul">
                      <?php while( have_rows('links', 'option') ) : the_row(); ?>
                        <?php $link = get_sub_field('nav_link'); ?>
                        <?php $link_url = $link['url'];
                        $link_title = $link['title']; ?>

                        <?php
                        $image = get_sub_field('nav_link_icon');
  if( !empty( $image ) ): ?>
  <li class="-li">

        <a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span class="f--bold" >  <img class="lazyload" width="30" height="30" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> <?php echo $link_title; ?></span>
      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
  </li>

  <?php endif; ?>
  <?php
  if( empty( $image ) ): ?>
  <li class="-li">

        <a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span><?php echo $link_title; ?></span>
      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
  </li>



  <?php endif; ?>

                          <?php endwhile; ?>
                  </ul>
                  </div>
                </div>

              </div>
              </div>

            </div>
                  <?php endwhile; ?>

                <?php endif; ?>








                      <a class="-nav-link Target-- -main-link" href="/en/references/"> <span>Customer stories</span></a>











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
        <a class="f--medium" href="/en/contact-us/">Contact us</a>
      </div>





    <?php } else { ?>

    <nav class="navigation-links -desktop-nav flx-container">


      <?php if( have_rows('navigation_group', 'option') ): ?>

<style media="screen">
 .dd-nav--services {
  display: block !important;
}
</style>

        <?php while( have_rows('services_navigation_g', 'option') ) : the_row(); ?>
          <div class="dropdown-nav dd-nav--services" x-data="{ dropdown_open: false }" :class="dropdown_open &amp;&amp; 'S-active--dropdown'" @mouseleave="dropdown_open = false; $store.dropdown = false" x-trap="dropdown_open">
                    <button class="-nav-link Target--palvelut" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true" @keydown.enter="dropdown_open = ! dropdown_open; $store.dropdown = true"><?php the_sub_field('group_name'); ?> <svg viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="12px" height="12px" class="NavDropdown-module--icon--84991">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M.293.293a1 1 0 0 1 1.414 0L7 5.586 12.293.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414Z" fill="currentColor"></path>
                      </svg>
                    </button>
                    <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false; $store.dropdown = false" style="
                width: 1100px;
                max-width: 95vw;
            ">
                                <div class="dropdown-nav__content">
                                  <div class="flx-container" style="
                                /* flex-direction: column; */
                            ">

                                    <div class="dropdown-nav__cell -right" style="
                                width: 100%;
                                display: flex;
                            ">
                                      <ul class="-ul services-main-dd" style="flex-direction: row;flex-wrap: wrap;    width: 100%;">

                                        <?php while( have_rows('links', 'option') ) : the_row(); ?>
                                          <?php $link = get_sub_field('nav_link'); ?>
                                          <?php $link_url = $link['url'];
                                          $link_title = $link['title']; ?>

                                          <?php
                                          $image = get_sub_field('nav_link_icon');
                    if( !empty( $image ) ): ?>
                    <li class="-li" style="padding-top: 0;border-bottom: 0;">

                          <a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span class="f--bold" >  <img class="lazyload" width="30" height="30" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> <?php echo $link_title; ?></span>
                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
                        <?php if( have_rows('sub_links') ): ?>
      <div class="main-nav__sublinks">
        <?php while( have_rows('sub_links') ): the_row();
          $sublink = get_sub_field('sub_link'); // This is a link field
        ?>
          <a href="<?php echo esc_url($sublink['url']); ?>">
            <?php echo esc_html($sublink['title']); ?>
          </a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
                    </li>

                    <?php endif; ?>
                    <?php
                    if( empty( $image ) ): ?>
                    <li class="-li" style="padding-top: 0;border-bottom: 0;">

                          <a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span><?php echo $link_title; ?></span>
                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
                        <?php if( have_rows('sub_links') ): ?>
      <div class="main-nav__sublinks">
        <?php while( have_rows('sub_links') ): the_row();
          $sublink = get_sub_field('sub_link'); // This is a link field
        ?>
          <a href="<?php echo esc_url($sublink['url']); ?>">
            <?php echo esc_html($sublink['title']); ?>
          </a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

                    </li>



                    <?php endif; ?>

                                            <?php endwhile; ?>

                                            <div class="services-main-dd__bottom">


                                              <a class="-nav-link Target-- -main-link" href="/luennot/">
                                                <span style="
                    font-family: &quot;Config-SemiBold&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif;
                ">Luennot ja workshopit</span>
                                                <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path>
                                                </svg>
                                              </a>

                                                  <a class="x-btn" href="/palvelut/">Kaikki palvelut
                                                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path>
                                                  </svg>
                                                  </a>







                                            </div>

                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                      </div>

        <?php endwhile; ?>







        <style media="screen">
      .services-main-dd {
        justify-content: space-between !important;
      }
.services-main-dd .-li {
  width: calc(50% - 20px) !important;
}

          .main-nav__sublinks {
            display: flex
;
flex-direction: column;

    margin-top: 10px;
          }
          .main-nav__sublinks a {
            padding: 8px 0;
                line-height: 1;
                border-top: solid 1px #d7d7d7;
                font-size: 1.6rem;
                color: #4e4e4e;
                transition: all 0.3s;
}

.main-nav__sublinks a::after {
  content: "";
  display: block;
  width: 10px;
  height: 6px;
  background: currentColor;
  -webkit-mask: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 10"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg>') no-repeat center;
  mask: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 10"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg>') no-repeat center;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%) rotate(90deg);
}

.services-main-dd__bottom {
  width: 100% !important;
  padding-top: 20px;
  border-top: solid 1px #d9d9d9;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.services-main-dd__bottom svg {
  transform: rotate(90deg);
      transition: all 0.3s;
      /* height: 12px; */
      height: 8px;
      margin-top: 1px;
        margin-left: 10px;
}

.services-main-dd__bottom a {
  display: flex;
  align-items: center;
  padding: 0;

}



.services-main-dd__bottom .x-btn{
background: #06aef2;
    color: white !important;
    padding: 14px 16px;
    border-radius: 999px;
    font-size: 1.6rem;
    }
        </style>



          <?php while( have_rows('navigation_group', 'option') ) : the_row(); ?>



      <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false; $store.dropdown = false" x-trap="dropdown_open">
          <button class="-nav-link Target--palvelut" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true" @keydown.enter="dropdown_open = ! dropdown_open; $store.dropdown = true"><?php the_sub_field('group_name'); ?>
            <svg viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="12px" height="12px" class="NavDropdown-module--icon--84991"><path fill-rule="evenodd" clip-rule="evenodd" d="M.293.293a1 1 0 0 1 1.414 0L7 5.586 12.293.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414Z" fill="currentColor"></path></svg>
          </button>
          <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false; $store.dropdown = false">
            <div class="dropdown-nav__content">
            <div class="flx-container">
              <div class="dropdown-nav__cell -left">
                <h3 class="f--bold"><?php the_sub_field('group_name'); ?></h3>
                <p>
<?php the_sub_field('group_info_text'); ?>



                </p>

      <?php $link_m = get_sub_field('group_main_link'); ?>
      <?php
      if( $link_m ):


    $link_m_url = $link_m['url'];
    $link_m_title = $link_m['title'];

    ?>
    <div class="-arrow-link">

      <a href="<?php echo $link_m_url; ?>"><?php echo   $link_m_title; ?></a>
          <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg>
    </div>


<?php endif; ?>




              </div>
              <div class="dropdown-nav__cell -right">
                <ul class="-ul">
                    <?php while( have_rows('links', 'option') ) : the_row(); ?>
                      <?php $link = get_sub_field('nav_link'); ?>
                      <?php $link_url = $link['url'];
                      $link_title = $link['title']; ?>

                      <?php
                      $image = get_sub_field('nav_link_icon');
if( !empty( $image ) ): ?>
<li class="-li">

      <a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span class="f--bold" >  <img class="lazyload" width="30" height="30" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> <?php echo $link_title; ?></span>
    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>

<?php endif; ?>
<?php
if( empty( $image ) ): ?>
<li class="-li">

      <a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span><?php echo $link_title; ?></span>
    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>



<?php endif; ?>

                        <?php endwhile; ?>
                </ul>
                </div>
              </div>

            </div>
            </div>

          </div>
                <?php endwhile; ?>

              <?php endif; ?>






                    <a class="-nav-link Target-- -main-link" href="https://lifted.fi/referenssit"> <span>Referenssit</span></a>

                  <div class="dropdown-nav" x-data="{ dropdown_open: false }" :class="dropdown_open && 'S-active--dropdown'"  @mouseleave="dropdown_open = false">
                      <button class="-nav-link" href="/" @mouseenter="dropdown_open = true; $store.dropdown = true" @keydown.enter="dropdown_open = ! dropdown_open; $store.dropdown = true">Ajankohtaista</button>
                      <div class="dropdown-nav__wrap" @mouseleave="dropdown_open = false">
                        <div class="dropdown-nav__content">
                        <div class="flx-container">
                          <div class="dropdown-nav__cell -left">
                            <h3 class="f--bold">Ajankohtaista</h3>
                            <p>
          Tästä osiosta löydät aina ajankohtaisimpia materiaalejamme ja valmennuksiamme</p>


                          </div>
                          <div class="dropdown-nav__cell -right">
                            <ul class="-ul">

                              <?php $args = array(
                                      'post_type' => 'post',
                                      'post_status' => 'publish',
                                        'category_name' => 'podcast',
                                      'posts_per_page'   => 1,


                                  );

                                  $loop = new WP_Query( $args );

                                  while ( $loop->have_posts() ) : $loop->the_post();
                                    ?>

                                    <li class="-li">
                                        <span class="editor-tag f--bold" style="font-size: 1.4rem;color:">Liftcast</span>
                                      <a class="-nav-link Target-- -main-link" href="<?php the_permalink(); ?>"> <span><?php echo get_the_title(); ?>	<?php if( get_field('extra_meta') ): ?>
                													- <?php the_field('extra_meta'); ?><?php endif; ?></span>
                                  </a>
                                  </li>

                                      <?php
                                  endwhile;

                                  wp_reset_postdata();  ?>

                                  <?php $args = array(
                                          'post_type' => 'post',
                                          'post_status' => 'publish',
                                            'category_name' => 'asiakastarinat',
                                          'posts_per_page'   => 1,


                                      );

                                      $loop = new WP_Query( $args );

                                      while ( $loop->have_posts() ) : $loop->the_post();
                                        ?>

                                        <li class="-li">
                                            <span class="editor-tag f--bold" style="font-size: 1.4rem;color:">Asiakastarinat</span>
                                          <a class="-nav-link Target-- -main-link" href="<?php the_permalink(); ?>"> <span><?php if( get_field('extra_meta') ): ?>
                                           <?php the_field('extra_meta'); ?> - <?php endif; ?><?php echo get_the_title(); ?></span>
                                      </a>
                                        </li>
                                          <?php
                                      endwhile;

                                      wp_reset_postdata();  ?>


                                          <?php $args = array(
                                                  'post_type' => 'post',
                                                  'post_status' => 'publish',

                                                  'posts_per_page'   => 1,
                                                  'tax_query' => array(
                                                      'relation' => 'AND',
                                                      array(
                                                          'taxonomy' => 'category',
                                                          'field'    => 'term_id',
                                                          'terms'    => array( 11, 210, 10 ),
                                                          'operator' => 'NOT IN',
                                                      ),
                                                  ),


                                              );

                                              $loop = new WP_Query( $args );

                                              while ( $loop->have_posts() ) : $loop->the_post();
                                                ?>

                                                <li class="-li">
                                                    <span class="editor-tag f--bold" style="font-size: 1.4rem;color:">Artikkelit</span>
                                                  <a class="-nav-link Target-- -main-link" href="<?php the_permalink(); ?>"> <span><?php if( get_field('extra_meta') ): ?>
                                                   <?php the_field('extra_meta'); ?> - <?php endif; ?><?php echo get_the_title(); ?></span>
                                              </a>
                                                </li>

                                                  <?php
                                              endwhile;

                                              wp_reset_postdata();  ?>


                                                <?php $link = get_field('linkki_ajankoht', 'option'); ?>
                                                <?php
                                                if( $link ):

                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                              <li class="-li">
                                                  <span class="editor-tag f--bold" style="font-size: 1.4rem;color:"><?php the_field('tunniste_ajankoht', 'option'); ?></span>
                                                <a class="-nav-link Target-- -main-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                  </li>
                                        <?php endif; ?>




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
      <a class="f--medium" href="/yhteystiedot/">Ota yhteyttä</a>
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


<div class="fixed-mobile-navigation" style="display: block;">
<!-- <div class="fixed-mobile-navigation" style="display:none"> -->
<div class="fixed-mobile-navigation_inner U_container U_base-pad" style="">


  <?php if ( get_field( 'lang' ) == 1 ) { ?>

    <nav class="fixed-mobile-navigation__links">
      <div class="capsule-wrap ">
<a class="btn--basic btn--dark " style="color:white" href="/en/contact-us/">Contact us</a>
</div>


<?php if( have_rows('navigation_en', 'option') ): ?>



    <?php while( have_rows('navigation_en', 'option') ) : the_row(); ?>





      <div class="mobile-nav-unit">
      <div class="">
        <div class="">
          <h3 class="f--bold"><?php the_sub_field('group_name'); ?></h3>
          <p>
<?php the_sub_field('group_info_text'); ?>



          </p>






        </div>
        <div class="dropdown-nav__cell -right">
          <ul class="-ul">
              <?php while( have_rows('links', 'option') ) : the_row(); ?>
                <?php $link = get_sub_field('nav_link'); ?>
                <?php $link_url = $link['url'];
                $link_title = $link['title']; ?>

                <?php
                $image = get_sub_field('nav_link_icon');
if( !empty( $image ) ): ?>
<li class="-li">

<a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span class="f--bold" >  <img class="lazyload"  width="30" height="30" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> <?php echo $link_title; ?></span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>

<?php endif; ?>
<?php
if( empty( $image ) ): ?>
<li class="-li">

<a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span><?php echo $link_title; ?></span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>


<img class="lazyload"  data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>

                  <?php endwhile; ?>


                  <?php $link_m = get_sub_field('group_main_link'); ?>
                  <?php
                  if( $link_m ):


                  $link_m_url = $link_m['url'];
                  $link_m_title = $link_m['title'];

                  ?>

                  <li class="-li">

                        <a class="-nav-link Target-- -main-link" href="<?php echo $link_m_url; ?>"> <span><?php echo   $link_m_title; ?></span>
                      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                  </li>
                  <?php endif; ?>




          </ul>
          </div>
        </div>
      </div>

          <?php endwhile; ?>

        <?php endif; ?>



    </nav>




  <?php } else { ?>





    <nav class="fixed-mobile-navigation__links">
      <div class="capsule-wrap ">
<a class="btn--basic btn--dark " style="color:white" href="/yhteystiedot">Ota yhteyttä</a>
</div>






<?php if( have_rows('navigation_group', 'option') ): ?>




    <?php while( have_rows('services_navigation_g', 'option') ) : the_row(); ?>
  <div class="mobile-nav-unit dd-nav--services" >
    <div class="">
      <div class="">
        <h3 class="f--bold"><?php the_sub_field('group_name'); ?></h3>
        <p>
    <?php the_sub_field('group_info_text'); ?>



        </p>
      </div>
      <div class="dropdown-nav__cell -right">
        <ul class="-ul module--nav-accordions">


          <?php while( have_rows('links', 'option') ) : the_row(); ?>
            <?php $link = get_sub_field('nav_link'); ?>
            <?php $link_url = $link['url'];
            $link_title = $link['title']; ?>

            <?php
            $image = get_sub_field('nav_link_icon');
if( !empty( $image ) ): ?>
<li class="-li  mobile-nav-accordion">

<div class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>">


<button class="btn--accordion-trigger">
  <span class="f--bold" >  <img class="lazyload"  width="30" height="30" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> <?php echo $link_title; ?></span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path>
</svg>
</button>


<?php if( have_rows('sub_links') ): ?>
  <div class="mobile-nav-accordion__links">
    <div class="x-inner">
      <?php while( have_rows('sub_links') ): the_row();
        $sublink = get_sub_field('sub_link');
        if( $sublink ):
      ?>
        <a href="<?php echo esc_url($sublink['url']); ?>">
          <?php echo esc_html($sublink['title']); ?>
          <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path>
          </svg>
        </a>
      <?php endif; endwhile; ?>
    </div>
  </div>
<?php endif; ?>
</div>
</li>

<?php endif; ?>
<?php
if( empty( $image ) ): ?>
<li class="-li  mobile-nav-accordion">

<a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span><?php echo $link_title; ?></span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>


<img class="lazyload"  data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>

              <?php endwhile; ?>



          <li class="-li">
            <a class="-nav-link Target-- -main-link" href="/luennot/">
              <span>Luennot ja workshopit</span>
              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path>
              </svg>
            </a>
          </li>
          <img class=" lazyloaded" data-src="" alt="">
          <li class="-li">
            <a class="-nav-link Target-- -main-link" href="/palvelut/">
              <span>Kaikki palvelut</span>
              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <?php endwhile; ?>

  <script type="text/javascript">
  document.querySelectorAll('.btn--accordion-trigger').forEach((btn) => {
    btn.addEventListener('click', () => {
      const accordion = btn.closest('.mobile-nav-accordion');
      const parent = accordion.closest('.module--nav-accordions');

      parent.querySelectorAll('.mobile-nav-accordion').forEach((item) => {
        const links = item.querySelector('.mobile-nav-accordion__links');

        if (item !== accordion) {
          item.classList.remove('open');
          links.style.height = links.scrollHeight + 'px'; // Set current height
          requestAnimationFrame(() => {
            links.style.height = '0px';
          });
        }
      });

      const links = accordion.querySelector('.mobile-nav-accordion__links');
      const isOpen = accordion.classList.toggle('open');

       btn.style.pointerEvents = 'none';

       const restoreBtn = () => {
  btn.style.pointerEvents = '';

  // Delay scroll check just a bit to ensure layout has fully updated
  setTimeout(() => {
    const rect = btn.getBoundingClientRect();
    const isInView =
      rect.top >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight);

    if (!isInView) {
      btn.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }, 50); // slight delay helps with layout shift
};

      if (isOpen) {
        links.style.height = links.scrollHeight + 'px';
        links.addEventListener('transitionend', function handler() {
          links.style.height = 'auto'; // Reset to auto after open transition
             btn.style.pointerEvents = ''; // Re-enable button after transition
                  restoreBtn();
          links.removeEventListener('transitionend', handler);
        });
      } else {
        links.style.height = links.scrollHeight + 'px';
    requestAnimationFrame(() => {
      links.style.height = '0px';
    });
    links.addEventListener('transitionend', function handler() {
      btn.style.pointerEvents = ''; // Also re-enable after closing
      links.removeEventListener('transitionend', handler);
    });
      }
    });
  });

  </script>

  <style media="screen">
  .dropdown-nav__cell.-right li.mobile-nav-accordion {
      display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
    }

  .dropdown-nav__cell.-right li.mobile-nav-accordion  .-main-link {
      width: 100%;
      position: relative;
      display: block;
      }

        .dropdown-nav__cell.-right li.mobile-nav-accordion .f--bold {
            color: black;
            text-align: left;
        }

      .mobile-nav-accordion__links {
        width: 100%;
            position: relative;
      }

      .mobile-nav-accordion__links {
        overflow: hidden;
        height: 0;
        transition: height 0.3s ease;

      }

      .btn--accordion-trigger {
        outline: none;
      border: none;
      padding: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    width: 100%;


      }

      .btn--accordion-trigger svg {
            color: #06aef2;
      }

      .mobile-nav-accordion__links .x-inner {
        padding: 12px 0;
        padding-top: 8px;
      }

      .mobile-nav-accordion__links a {
        margin-top: 12px;
      padding-top: 12px;
      /* padding: 12px 0; */
      border-top: solid 1px #d9d9d9;
      width: 100%;
      display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.6rem;
      color: #4e4e4e !important;

      }


        .mobile-nav-accordion__links a svg {
              transform: rotate(90deg) !important;
              width: 12px;
                  color: #4e4e4e !important;
                      margin-left: 20px;

        }


       .mobile-nav-accordion  .mobile-nav-accordion__links .x-inner {
      opacity: 0;

       transition: all 0.3s 0.1s ease;

      }
       .mobile-nav-accordion.open     .mobile-nav-accordion__links .x-inner {
         opacity: 1;

          transition: all 0.3s 0.4s ease;
       }

    .mobile-nav-accordion .btn--accordion-trigger svg{
      transform: rotate(-180deg) !important;
      transition: 0.5s;
      }
      .mobile-nav-accordion.open .btn--accordion-trigger svg{
        transform: rotate(0deg) !important;
      }







  </style>


    <?php while( have_rows('navigation_group', 'option') ) : the_row(); ?>





      <div class="mobile-nav-unit">
      <div class="">
        <div class="">
          <h3 class="f--bold"><?php the_sub_field('group_name'); ?></h3>
          <p>
<?php the_sub_field('group_info_text'); ?>



          </p>






        </div>
        <div class="dropdown-nav__cell -right">
          <ul class="-ul">
              <?php while( have_rows('links', 'option') ) : the_row(); ?>
                <?php $link = get_sub_field('nav_link'); ?>
                <?php $link_url = $link['url'];
                $link_title = $link['title']; ?>

                <?php
                $image = get_sub_field('nav_link_icon');
if( !empty( $image ) ): ?>
<li class="-li">

<a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span class="f--bold" >  <img class="lazyload"  width="30" height="30" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> <?php echo $link_title; ?></span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>

<?php endif; ?>
<?php
if( empty( $image ) ): ?>
<li class="-li">

<a class="-nav-link Target-- -main-link" href="<?php echo $link_url; ?>"> <span><?php echo $link_title; ?></span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>
</li>


<img class="lazyload"  data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>

                  <?php endwhile; ?>


                  <?php $link_m = get_sub_field('group_main_link'); ?>
                  <?php
                  if( $link_m ):


                  $link_m_url = $link_m['url'];
                  $link_m_title = $link_m['title'];

                  ?>

                  <li class="-li">

                        <a class="-nav-link Target-- -main-link" href="<?php echo $link_m_url; ?>"> <span><?php echo   $link_m_title; ?></span>
                      <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.425782 8.8789C0.238282 8.66797 0.238282 8.46875 0.425782 8.28125L7.80859 0.898437C7.99609 0.710937 8.18359 0.710937 8.37109 0.898437L15.7539 8.28125C15.9414 8.46875 15.9414 8.66797 15.7539 8.87891L15.0508 9.54687C14.8633 9.75781 14.6641 9.75781 14.4531 9.54687L8.08984 3.21875L1.72656 9.54687C1.51563 9.75781 1.31641 9.75781 1.12891 9.54687L0.425782 8.8789Z" fill="currentColor"></path></svg></a>


                  </li>
                  <?php endif; ?>




          </ul>
          </div>
        </div>
      </div>

          <?php endwhile; ?>

        <?php endif; ?>



    </nav>


      <?php } ?>



      <!-- <div class="fixed-mobile-navigation__sub-links">


            <?php if ( get_field( 'lang' ) == 1 ) { ?>



  <?php } else { ?>


  <?php } ?>


      </div> -->

</div>

</div>

<?php if ( get_field( 'lang' ) == 1 ) { ?>



  <!-- <script>
    window.pipedriveLeadboosterConfig = {base: 'leadbooster-chat.pipedrive.com',companyId: 7397014,playbookUuid: 'eddbeeeb-5d0b-4f16-b04b-2732c1e442f3',version: 2};(function () {var w = window;if (w.LeadBooster) {console.warn('LeadBooster already exists');} else {w.LeadBooster = {q: [],on: function (n, h) {this.q.push({ t: 'o', n: n, h: h });},trigger: function (n) {this.q.push({ t: 't', n: n });},};}})();
    </script> -->

<?php } else { ?>
  <!-- <script>
  window.pipedriveLeadboosterConfig = {base: 'leadbooster-chat.pipedrive.com',companyId: 7397014,playbookUuid: '6f3bbc27-d69c-4fd5-9977-f6ab012c7d6f',version: 2};(function () {var w = window;if (w.LeadBooster) {console.warn('LeadBooster already exists');} else {w.LeadBooster = {q: [],on: function (n, h) {this.q.push({ t: 'o', n: n, h: h });},trigger: function (n) {this.q.push({ t: 't', n: n });},};}})();
  </script> -->

<?php } ?>

<!-- <script>
       // Wait for 3 seconds after page load
       setTimeout(function() {
           // Create a new script element
           var script = document.createElement('script');
           script.src = 'https://leadbooster-chat.pipedrive.com/assets/loader.js';
           script.async = true;

           // Append the script to the document's body
           document.body.appendChild(script);
       }, 3000);
   </script> -->



<div class="site-container <?php if ( get_field( 'lang' ) == 1 ) { ?> en-page <?php } else { ?> fi-page <?php } ?>" id="site-container">

    <div id="page" class="site">

        <div id="site-content" class="site-content">
