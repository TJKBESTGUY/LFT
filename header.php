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
</head>

<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2" as="font" type="font/woff2" crossorigin>
    <style>
       @font-face {
       font-family: "suisse-regular";
       src: url('<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2') format('woff2'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/suisse-regular.woff2') format('woff');
       font-weight: 400;
       font-style: normal;
       }

    </style>


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
        <a href="#">Areite</a>
    </div>
    <div class="navigation-links -desktop-nav">
      <a href="Palvelut">Palvelut</a>
      <a href="Palvelut">Laskentakohteet
        <div class="laskenta-nav-counter">
          <span>42</span>

        </div>
      </a>
      <a href="Palvelut">Yritys</a>
      <a href="#">Ota Yhteyttä</a>
    </div>
      </div>

  </div>

</header>


<div class="site-container" id="site-container">

    <div id="page" class="site">
	    <a id="site-content-skip" class="screen-reader-skip">-</a>
        <div id="site-content" class="site-content">
