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
						Areite
					</div>

					<div class="cell footer__nav-links">
						<ul>
							<li>
								<a href="#">Palvelut</a>
							</li>
							<li>
								<a href="#">Laskentakohteet</a>
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
								<a href="#">Palvelut</a>
							</li>
							<li>
								<a href="#">Palvelut</a>
							</li>
							<li>
								<a href="#">Palvelut</a>
							</li>
							<li>
								<a href="#">Palvelut</a>
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

<button aria-label="Toggle Right Panel" data-toggle="open" data-target="#panel-right" aria-expanded="false" class="panel-right-toggle"><?php echo $sidebar_icon; ?></button>

</div><!-- .site-container -->

<?php wp_footer(); ?>

</body>
</html>
