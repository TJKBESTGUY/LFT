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
            <div class="footer-logo">
						    <a class="footer-logo" href="<?php echo home_url() ?>">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 80"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><path class="cls-1" d="M79.78,1H5.1A4.61,4.61,0,0,0,.49,5.6V74.4A4.61,4.61,0,0,0,5.1,79H79.78a4.6,4.6,0,0,0,4.6-4.6V5.6A4.6,4.6,0,0,0,79.78,1ZM39.16,12.74l7.18,10.93L26.42,54.43H12.24ZM61.42,64l-3.17-4.89L41,59.06l3.84-5.93,9.7,0-6.61-9.8L34.81,64H23.53l24.4-37.76L72.64,64Z"/><rect x="293.22" y="22.91" width="9.11" height="34.19"/><polygon points="236.2 57.1 283.56 57.1 283.56 50.36 245.31 50.36 245.31 42.75 279.62 42.75 279.62 36.61 245.31 36.61 245.31 29.05 283.56 29.05 283.56 22.91 236.2 22.91 236.2 57.1"/><polygon points="308.81 30.49 328.53 30.49 328.53 57.1 337.63 57.1 337.63 30.49 357.34 30.49 357.34 22.91 308.81 22.91 308.81 30.49"/><polygon points="411.19 29.05 411.19 22.91 363.83 22.91 363.83 57.1 411.19 57.1 411.19 50.36 372.94 50.36 372.94 42.75 407.25 42.75 407.25 36.61 372.94 36.61 372.94 29.05 411.19 29.05"/><path d="M133.53,22.91,110.65,57.06H121l4.67-7h30l4.67,7h10.31L147.69,22.91Zm-3.75,21,10.83-16.16,10.83,16.16Z"/><path d="M207.17,22.91H176.65V57.1h9.1V46.34h19.76L216.28,57.1h10.49v-.93L216.41,45.82c5.2-.9,10.36-3.36,10.36-10V33.4C226.77,22.11,211.77,22.91,207.17,22.91Zm10.47,12.2c0,3.84-4.6,4.42-7.81,4.49H185.75v-10h24.08c3.21.07,7.81.65,7.81,4.49Z"/></svg>
                </a>
                            </div>
                <div class="flx-container">
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

					<div class="cell footer__nav-links">
						<ul>
              <li>
                <a href="/ajankohtaista">Ajankohtaista</a>
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
              <li>
                <a href="#">Evästeseloste</a>
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
