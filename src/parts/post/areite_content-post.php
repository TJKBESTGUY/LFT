<?php

/**
 * @package Areite
 * @since   4.0
 *
 * Shows a single post or page
 * ign_header_block only outputs a header block if the_content does not have a header block.
 * a block is considered a header block if its name starts with header-
 */

?>

	<section class="section--single-post">
  <div class="U_container U_base-pad single-post__base-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class("module--single-post"); ?>>

				<!-- HEADER WRITTEN HERE -- USE THE BLOCK IF NEED -->
			<!-- <?php ign_header_block(); ?> -->

			<header>
				<div class="single-post__header-actions">
				<a class="basic-btn btn--go-back" href="/ajankohtaista">
          <span class="basic-btn__icon"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"></path></svg></span>
          <span class="basic-btn__text">Takaisin ajankohtaista sivulle</span>
      	</a>
							</div>
				<!-- THIS IS USED IN THE FEED -- CHECK THE SYTLES FROM THERE -->
				<div class="news-feed-item__content">
        <div class="meta">
      	<span class="tag">Uutinen</span> <span class="date">08.02.2022</span>
        </div>
			</div>
				<h1 class="entry-title h2"><?php the_title(); ?></h1>
				<div class="entry-description"><?php if ( has_excerpt() ) { the_excerpt(); } else { echo ''; } ?></div>
			</header>

		<div class="article-content">
			<?php the_content(); ?>
		</div>

		<div class="single-post__footer">
			<a class="basic-btn btn--go-back" href="/ajankohtaista">
				<span class="basic-btn__icon"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9,.5A8.5,8.5,0,1,0,17.5,9,8.51,8.51,0,0,0,9,.5Zm1.08,12.93-.91-.94L12,9.7H3.83V8.32H12L9.17,5.51l.91-.94L14.48,9Z"></path></svg></span>
				<span class="basic-btn__text">Takaisin ajankohtaista sivulle</span>
			</a>
		</div>

	</article>
	</div>
		</section>


<?php if ( ! is_page() ): ?>
	<section class="after-article container-content">
		<?php
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'areite' ) . '</span><div class="nav-title"><span class="nav-title-icon-wrapper"><span class="iconify" data-icon="carbon:chevron-left"></span></span> <span>%title</span></div>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'areite' ) . '</span><div class="nav-title"><span>%title</span> <span class="nav-title-icon-wrapper"><span class="iconify" data-icon="carbon:chevron-right"></span></span></div>',
		) );
		?>
	</section>
<?php
endif;
