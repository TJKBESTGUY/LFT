<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lifted
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<style media="screen">
	.article-header {
	text-align: center;
	color:black;
	}

	.error404 .site-content {
		margin-top: 200px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
}
.error404 {
    background: #fdfdfd;

}
</style>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<section>
                           <div class="section-inner-container U_container U_base-pad" style="">

                           <div class="article-header article-header--stacked" style="">

                             <h2>404</h2>

                               <h3>Kyseistä sivua ei valitettavasti löydy.</h3>
															  <h4>Olemme uudistaneet sivustoamme, joten kaikki linkit eivät välttämättä vielä ohjaudu oikein.<br><br>
																	Tutustu uudistettuun sivuumme:

																</h4>

																 <div class="capsule-wrap  capsule-wrap--center "> <a class="btn--basic btn--dark " style=" " href="https://lifted.fi">Etusivu</a></div>

                           </div>



                         </div>
                                          </section>



		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
