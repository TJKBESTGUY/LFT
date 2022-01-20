<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #page and #content div and any content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Areite
 * @since 1.0
 * @version 1.0
 */

?>

</div><!-- #site-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="U_container U_base-pad">
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
			<div class="module--footer">
				<div class="flx-container">
					<div class="cell footer__left-bar">
						    <a class="footer-logo" href="<?php echo home_url() ?>"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 332 80"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path d="M273.32,27.5l4.32-3.43V17.48H266.93v10h-6.25V34h5.89V54.49c0,7.35,1.79,10,11.41,10h7.83v-6.8h-3.26c-3.8,0-5.27-.76-5.27-4.53V34H286V27.5Z"/><rect x="244.78" y="27.5" width="10.7" height="36.94"/><rect x="244.78" y="14.66" width="10.7" height="8.79"/><path d="M132.76,14.66,111.82,64.45h11.33l3.95-10.1H149l4,10.1h12l-21-49.79Zm-2.48,31.66L138,26.68l7.75,19.64Z"/><path d="M217.39,26.68c-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61h-11C224.22,57,221,58,217.62,58c-5.11,0-9.92-3.09-10.54-9.41h30.79C238.26,35.54,230.27,26.68,217.39,26.68ZM207.23,42.06c.85-6.25,6.05-8.45,10.08-8.45,4.5,0,9.47,2.2,9.7,8.45Z"/><path d="M311.25,58c-5.12,0-9.93-3.09-10.55-9.41h30.79c.39-13-7.6-21.9-20.47-21.9-12.33,0-20.94,8.17-20.94,19.16,0,10.64,7.83,19.5,21.25,19.5,11.4,0,17.45-6.11,19.7-11.61H320C317.84,57,314.59,58,311.25,58Zm-.31-24.38c4.5,0,9.46,2.2,9.7,8.45H300.86C301.71,35.81,306.91,33.61,310.94,33.61Z"/><polygon points="180.31 34.88 180.31 27.5 169.77 27.5 169.77 64.45 180.31 64.45 180.31 36.88 193.65 36.88 193.65 27.5 186.19 27.5 180.31 34.88"/><path class="cls-1" d="M79.78,1H5.1A4.61,4.61,0,0,0,.49,5.6V74.4A4.61,4.61,0,0,0,5.1,79H79.78a4.6,4.6,0,0,0,4.6-4.6V5.6A4.6,4.6,0,0,0,79.78,1ZM39.16,12.74l7.18,10.93L26.42,54.43H12.24ZM61.42,64l-3.17-4.89L41,59.06l3.84-5.93,9.7,0-6.61-9.8L34.81,64H23.53l24.4-37.76L72.64,64Z"/></svg></a>
					</div>

					<div class="cell footer__nav-links">
						<ul>
              <li>
                <a href="#">Uutiset</a>
              </li>
							<li>
								<a href="#">Palvelut</a>
							</li>
							<li>
								<a href="/laskentakohteet">Laskentakohteet</a>
							</li>
              <li>
                <a href="/referenssit">Referenssit</a>
              </li>
							<li>
								<a href="#">Yritys</a>
							</li>
							<li>
								<a href="#">Ota yhteyttä</a>
							</li>
						</ul>
					</div>

					<div class="cell footer__extra-content">
						<ul>
							<li>
								<a href="#">Toimitusehdot</a>
							</li>
							<li>
								<a href="#">Tietosuojaseloste</a>
							</li>

						</ul>
					</div>

				</div>

			</div>


			</div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php
$sidebar_icon = ign_get_config( 'sidebar_icon', 'sidebar-icon' );
if($sidebar_icon == 'sidebar-icon'){
	$sidebar_icon = "<span class='$sidebar_icon'></span>";
}
?>

<!-- <button aria-label="Toggle Right Panel" data-toggle="open" data-target="#panel-right" aria-expanded="false" class="panel-right-toggle"><?php echo $sidebar_icon; ?></button> -->

</div><!-- .site-container -->

<?php wp_footer(); ?>

</body>
</html>
