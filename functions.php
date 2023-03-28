<?php

/**
 * Ignition functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Lifted
 * @since   1.0
 *
 * The first file to look at is theme.config.json where you can quickly set up some theme settings
 * like google fonts, icons for various areas and logo position
 * you can also set the mobile menu by editing the mobile_menu_type option to open as app-menu or leave blank to open regular
 * default_acf_header_block: add your post types here to force them to have a header block when a new post is made.
 *
 * Then you should set your CSS variables in variables.scss
 *
 * Once those are both edited, you can come here and add image sizes, widgets and anything else
 * Remember it might not be necessary to enqueue js files here as any js file starting with an underscore will be added automatically to the front end js build
 * That will work only if the file is inside the inc or parts folders.
 * This ability also works for any scss file added with an underscore in those folders too.
 * This also works for underscored php files.
 * therefore all php files in the inc folder are already automatically included
 *
 * Besides adding image sizes, you may find you dont have to do much in here.
 */

/**
 * Ignition only works in WordPress 5.5 or later. Here we check before allowing the theme to be used.
 * There is nothing here for you to do.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) ) {
	require get_template_directory() . '/inc/core/back-compat.php';

	return;
}

/*--------------------------------------------------------------
# Check theme.config.json and make changes as needed.
--------------------------------------------------------------*/


/*--------------------------------------------------------------
# Setup
--------------------------------------------------------------*/
/**
 * This sets up theme defaults and registers support for various WordPress features.
 * Runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * Here is where you can start changing settings.
 * you can also add google fonts and a submenu arrow via the ign_config variable below
 */
function lifted_setup() {


	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/ignition
	 * If you're building a theme based on Ignition, and you downloaded this from github, use a find and replace
	 * to change 'lifted' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lifted' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
	add_theme_support( 'post-thumbnails' );

	add_post_type_support( 'page', 'excerpt' );
	/**
	 * default image size for cards and thumbnails and header images
	 * Users should upload twice the size of an image size.
	 * So if the image size is 600 x 600, the user should upload a 1200 by 1200.
	 * Output the image size and WP will automatically include the full size for big display when needed.
	 *
	 * WP is also smart and if you set crop to true it will include the original only if it matches in ratio
	 * Header image size is included for large header images. Users dont have to upload twice that size unless your ok with large files.
	 *
	 * Recommend installing imsanity so users can't upload extremely huge images without them being compressed and resized.
	 */
	set_post_thumbnail_size( 300, 300, true );
	add_image_size( 'header_image', 2000, 9999 );

	add_image_size( 'content-image', 2000, 2000 );
	add_image_size( 'eq-image', 15, 15 );
	add_image_size( 'content-image--medium', 1450, 1450 );
		add_image_size( 'content-image--mobile', 800, 800 );
				add_image_size( 'content-image--avatar', 160, 160 );

	add_filter( 'intermediate_image_sizes_advanced', 'remove_default_images' );


	/*
	 * Add menus here
	 */
	register_nav_menus( array(
		'top-menu' => __( 'Top Menu', 'lifted' ), //main menu at top.
	) );

	/*
    * Enable support for Post Formats.
    * Uncomment if you want to use this feauture
    * See: https://codex.wordpress.org/Post_Formats
    */

//	add_theme_support( 'post-formats', array(
//		'aside',
//		'image',
//		'video',
//		'quote',
//		'link',
//		'gallery',
//		'audio',
//	) );
//	add_post_type_support( 'post', 'post-formats' );


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Adds Gutenberg Support
	add_theme_support( 'align-wide' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 400,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true
	) );

	// Add theme support for selective refresh for widgets in customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-header' );

	/*
	 * tinymce styles
	  */
	add_editor_style( array(
		get_template_directory_uri() . '/dist/frontEnd.css?' . wp_get_theme()->get( 'Version' ),
		ign_google_fonts_url()
	) );


	$GLOBALS['content_width'] = 730;
}

add_action( 'after_setup_theme', 'lifted_setup' );


/*--------------------------------------------------------------
# ADMIN ACCESS AND ADMIN BAR VISIBILITY
--------------------------------------------------------------*/
/**
 * Disable admin bar for everyone but administrators
 * You can change this based on capabilities. By default manage_options is used to check for Administrators
 */


if ( ! function_exists( 'disable_admin_bar' ) ) {
	function disable_admin_bar() {
		if ( ! current_user_can( ign_get_config( 'admin_access_capability', 'manage_options' ) ) ) {
			add_filter( 'show_admin_bar', '__return_false' );
		}
	}
}
add_action( 'after_setup_theme', 'disable_admin_bar' );


/**
 * Redirect back to homepage and not allow access to WP Admin.
 */
if ( ! function_exists( 'redirect_admin' ) ) {

	function redirect_admin() {
		if ( ! current_user_can( ign_get_config( 'admin_access_capability', 'manage_options' ) ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
			wp_redirect( home_url() );
			exit;
		}
	}
}

add_action( 'admin_init', 'redirect_admin' );


/*--------------------------------------------------------------
# Scripts and Styles
--------------------------------------------------------------*/
/**
 * Enqueue all scripts and styles.
 * Add your own scripts and styles below.
 */
function lifted_scripts() {
	global $wp;

	// Add google fonts
	if ( ign_get_config( 'google_fonts' ) ) {
		// wp_enqueue_style( 'lifted-fonts', ign_google_fonts_url(), array(), wp_get_theme()->get( 'Version' ) );
	}


	// Theme stylesheet. Will get this stylesheet or a child themes stylesheet.
	// wp_enqueue_style( 'lifted-style', get_stylesheet_uri(), '', wp_get_theme()->get( 'Version' ) );

	//Sass compiles styles. Will get child's theme version if found instead. Child theme should import with sass.
	wp_enqueue_style( 'lifted-sass-styles', get_theme_file_uri( '/dist/frontEnd.css' ), '', wp_get_theme()->get( 'Version' ) );

	// wp_enqueue_script( 'iconify', 'https://code.iconify.design/1/1.0.6/iconify.min.js' );

	//ie11 js polyfills
	// wp_enqueue_script( 'polyfill', 'https://polyfill.io/v3/polyfill.min.js?flags=gated&features=AbortController%2Cdefault%2CNodeList.prototype.forEach%2CEvent%2Csmoothscroll' );

	//jQuery 3.0 replaces WP jquery
	wp_deregister_script( 'jquery-core' );
	// wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.5.1.min.js", array(), '3.5.1' );
	wp_deregister_script( 'jquery-migrate' );
	// wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.3.0.min.js", array( 'jquery-core' ), '3.3.0' );


	//any javascript file in assets/js that ends with custom.js will be lumped into this file.
	wp_enqueue_script( 'lifted-custom-js', get_template_directory_uri() . '/dist/frontEnd_bundle.js', array(
		// 'jquery',
		// 'polyfill'
	),
		wp_get_theme()->get( 'Version' ), true );

	//AJAX ready for .custom.js files
	wp_localize_script( 'lifted-custom-js', 'frontEndAjax', array(
		'ajaxurl'    => admin_url( 'admin-ajax.php' ),
		'nonce'      => wp_create_nonce( 'ajax_nonce' ),
		'url'        => home_url(),
		'currentUrl' => home_url( $wp->request )
	) );


	//Icons: add icons for use in custom js here
	wp_localize_script( 'lifted-custom-js', 'icons', array(
		'angleRight' => ign_get_svg( array( 'icon' => 'angle-right' ) ),
		'sidebar'    => ign_get_svg( array( 'icon' => 'sidebar' ) )
	) );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//add your styles and scripts here

}

add_action( 'wp_enqueue_scripts', 'lifted_scripts' );


/*
 * Add Stylesheet for Gutenberg
 */
function ign_gutenberg_styles() {
	//load regular versions if script debug is set to true in wp-config file.
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';


	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'ign-gutenberg-style', get_theme_file_uri( '/dist/gutenberg-editor-style' . $suffix . '.css' ), false, wp_get_theme()->get( 'Version' ), 'all' );

	wp_enqueue_script( 'lifted-custom-js', get_template_directory_uri() . '/dist/custom' . $suffix . '.js', array( 'jquery' ),
		wp_get_theme()->get( 'Version' ), true );
}

//add_action( 'enqueue_block_editor_assets', 'ign_gutenberg_styles' ); //todo remove if already adding admin-css?


/**
 * Add login stylehseet
 */
function login_styles() {
	wp_enqueue_style( 'custom-admin', get_stylesheet_directory_uri() . '/dist/login.css', '', wp_get_theme()->get( 'Version' ) );
}

add_action( 'login_enqueue_scripts', 'login_styles' );


/**
 * Add admin stylesheet
 */
function footer_styles() {
	//load regular versions if script debug is set to true in wp-config file.
	//$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'iconify', 'https://code.iconify.design/1/1.0.6/iconify.min.js' );
	wp_enqueue_style( 'lifted-admin-styles', get_theme_file_uri( '/dist/backEnd.css' ), '', wp_get_theme()->get( 'Version' ) );
}

add_action( 'admin_footer', 'footer_styles', 99 );


/**
 * Register widget areas.
 * Change/Remove widget areas here. By default the widget areas are the sidebar and the footer which has 4 widget areas being output in columns.
 * See template-parts/footer/footer-widgets.php
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! function_exists( 'ign_widgets_init' ) ) {
	function ign_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'lifted' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'lifted' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );


//footer widgets and sections. up to 4
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'lifted' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add footer widgets here.', 'pwm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );


		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', 'lifted' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add footer widgets here.', 'pwm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );


		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', 'lifted' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add footer widgets here.', 'pwm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'lifted' ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Add footer widgets here.', 'pwm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}
}
add_action( 'widgets_init', 'ign_widgets_init' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function lifted_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}

add_action( 'wp_head', 'lifted_pingback_header' );


/*--------------------------------------------------------------
# Adding More PHP Files Automatically
--------------------------------------------------------------*/

require_once get_parent_theme_file_path( '/inc/core/dev-helpers.php' );

//no need to include php files, just add them to the inc folder and start them with an underscore. Ignition takes care of the rest!
//Ignition will also search two directories deep for more underscored files within inc, blocks, and post-types folders.
// (ie: inc/acf-extras/_acf-extras.php )







/*--------------------------------------------------------------
# CUSTOM FUNCTIONS
--------------------------------------------------------------*/




///////DISABLE Gutenberg


/**
 * Disable Editor
 *
 * @package      ClientName
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'page-template/etusivu.php',
			'page-template/kohde.php',
					'page-template/vinkit.php',

	);

	$excluded_ids = array(
		// get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

/**
 * Disable Classic Editor by template
 *
 */
function ea_disable_classic_editor() {

	$screen = get_current_screen();
	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
		return;

	if( ea_disable_editor( $_GET['post'] ) ) {
		remove_post_type_support( 'page', 'editor' );
	}

}
add_action( 'admin_head', 'ea_disable_classic_editor' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Navigation',
		'menu_title'	=> 'Navigation',
		'menu_slug' 	=> 'navigation-info',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}





///////LAZYBLOCK/////////

function register_layout_category( $categories ) {

	$categories[] = array(
		'slug'  => 'goodman-blocks',
		'title' => 'Goodman Blocks'
	);

	return $categories;
}

if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
	add_filter( 'block_categories_all', 'register_layout_category' );
} else {
	add_filter( 'block_categories', 'register_layout_category' );
}

/////IMAGE//////
/**
 * Additional lazy blocks Handlebars helper
 */
function myPlugin_lazyblocks_handlebars_helper($handlebars){

  /**
   * wp_get_attachment_image Handlebars helper
   * @link https://github.com/nk-o/lazy-blocks/issues/68
   * @see  https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
   *
   * @example
   * {{{ wp_get_attachment_image control_name 'thumbnail' }}}
   */
  $handlebars->registerHelper('wp_get_attachment_image', function($image, $size=null){
    if ( isset($image['id']) ) {
      return wp_get_attachment_image($image['id'], $size);
    }
  });
}

function myPlugin_lazyblocks_handlebars_helper_custom($handlebars){

  /**
   * wp_get_attachment_image Handlebars helper
   * @link https://github.com/nk-o/lazy-blocks/issues/68
   * @see  https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
   *
   * @example
   * {{{ wp_get_attachment_image control_name 'thumbnail' }}}
   */
  $handlebars->registerHelper('wp_get_attachment_image', function($image, $size=null){
    if ( isset($image['id']) ) {
		$imgurl = wp_get_attachment_image_url( $image['id'], $size ); //use custom set size
      return $imgurl;
    }
  });
}

// lazy block Handlebars helper
add_action('lzb_handlebars_object', 'myPlugin_lazyblocks_handlebars_helper_custom');



add_filter( 'lazyblock/section-block/frontend_allow_wrapper', '__return_false' );
add_filter( 'lazyblock/row-block/frontend_allow_wrapper', '__return_false' );
add_filter( 'lazyblock/material-block/frontend_allow_wrapper', '__return_false' );
add_filter( 'lazyblock/info-card/frontend_allow_wrapper', '__return_false' );
/////IMAGE//////


// filter for Frontend output.
add_filter( 'lazyblock/blog-posts-carousel/frontend_callback', 'my_block_output', 10, 2 );

add_filter( 'lazyblock/blog-posts-carousel/frontend_callback', 'my_block_output', 10, 2 );



if ( ! function_exists( 'my_block_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function my_block_output( $output, $attributes ) {
        ob_start();
        ?>
				      <?php locate_template('src/parts/php_blocks/workshop-loop-block.php', true, false); ?>


        <?php
        return ob_get_clean();
    }
endif;


// PHP BLOCKS /////
add_filter( 'lazyblock/workshop-item-loop/frontend_callback', 'workshop_loop_output', 10, 2 );
add_filter( 'lazyblock/asiantuntijat-item-loop/frontend_callback', 'asiantuntijat_loop_output', 10, 2 );
add_filter( 'lazyblock/blog-item-loop/frontend_callback', 'blog_loop_output', 10, 2 );
add_filter( 'lazyblock/asiakas-item-loop/frontend_callback', 'asiakas_loop_output', 10, 2 );
add_filter( 'lazyblock/select-item-loop/frontend_callback', 'select_loop_output', 10, 2 );
add_filter( 'lazyblock/lifcast-item-loop/frontend_callback', 'liftcast_loop_output', 10, 2 );
add_filter( 'lazyblock/asiantuntijat-filters/frontend_callback', 'asiantuntijat_filters', 10, 2 );




if ( ! function_exists( 'asiantuntijat_filters' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function asiantuntijat_filters( $output, $attributes ) {
        ob_start();
        ?>
				<div class="-x-pad">


				<div class="workshop-nav">

		  <button @click="resetTaxFilters_asiakastarinat"  class="btn--basic btn--basic--small btn--outline   " type="button" name="button" data-tax="Kaikki">Kaikki <span></span> </button>
					 <?php
				 // get all the valmennukset tags from the database
				 $var_aiheet = get_terms( array(
								 'taxonomy' => 'aihealueet',
								 'hide_empty' => 1,
				 ) );

							?>
					 <?php
					 foreach ($var_aiheet as $terms)
					 {
									?>
									<button  @click="runTaxFilters_asiakastarinat" href="/aihealueet/<?php   echo $terms->slug; ?>" class="btn--basic btn--basic--small btn--outline" type="button" name="button" data-tax="<?php   echo $terms->slug; ?>"><?php   echo $terms->name; ?> <span>(<?php  echo $terms->count; ?>)</span>
							</button>


									<?php
								 }
								 ?>

</div>

		</div>


        <?php
        return ob_get_clean();
    }
endif;



if ( ! function_exists( 'liftcast_loop_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function liftcast_loop_output( $output, $attributes ) {
        ob_start();
        ?>

				<section class="section--basic U-sec-pad section-theme--color section-width--normal section--home-lifcast">
				        <div class="section-inner-container U_container U_base-pad" style="">
				            <div class="section-bg-container" style="background:">

				      <div class="wp-block-lazyblock-split-content-flex lazyblock-split-content-flex-Z1yJAvO">
				        <div class="module--split-content  -x-pad module--lifcast-preview">
				        <h1 class="base-text tag " style="">
				              Liftcast
				                </h1>
				            <h3 class="" style="max-width:900px;">Liftcast on podcast, jossa nostamme sinut ja organisaatiosi seuraavalle tasolle.</h3>
				            <div class="content-spacer--small">
				        </div>
				        <div class="flx-container ">







				        <div class="cell split-content__img cat-image-cell">

				             <div class="lazy-img-aspect">

				             <img decoding="async" class="lazyanim  lazyloaded" data-src=" /wp-content/uploads/2022/11/liftcast-1.jpg" alt="" src=" /wp-content/uploads/2022/11/liftcast-1.jpg">
				      </div>
				      </div>





				           <div class="cell mosaic-split__txt split-content__txt cast-preview">
				        <div class="cell_txt-content">

									<?php $args = array(
									        'post_type' => 'post',
									        'post_status' => 'publish',
													  'category_name' => 'podcast',
									        'posts_per_page'   => 4,


									    );

									    $loop = new WP_Query( $args );

									    while ( $loop->have_posts() ) : $loop->the_post();
									      ?>

												<div class="cast-play-cell" style="position:relative">
														<a href="<?php the_permalink(); ?>" style="width:100%;height:100%;position:absolute;z-index:3;">
																			</a>
													<img class="lazyload lazyanim" data-src="https://lifted.fi/wp-content/uploads/2022/11/liftcast_1500x1500-1-768x768.jpg" alt="">
													<div class="content">
														<div class="-header">
																<a href="<?php the_permalink(); ?>">Lue jaksoesittely</a>
														</div>
													<span class="-pod-number"> <span class="pod-number__inner"></span><?php the_field('pod_number'); ?></span>
													<div class="pod-meta">
									<h5 class=""><?php echo get_the_title(); ?>
												<?php if( get_field('extra_meta') ): ?>
													- <?php the_field('extra_meta'); ?>
															<?php endif; ?>
									</h5>

													</div>

													</div>

												</div>

									        <?php
									    endwhile;

									    wp_reset_postdata();  ?>

				      </div>
				      </div>


				      </div>

				      <div class="cast-play-footer">
				        <div class="capsule-wrap " style="">
				    <a class="btn--basic btn--basic--small btn--dark" style="" target="_blank" href="https://open.spotify.com/show/3glCt1KuSbUQa3S8UYPFwD">Spotify</a>
				      <a class="btn--basic btn--basic--small btn--dark" style=""  target="_blank"  href="https://www.podplay.com/fi-fi/podcasts/liftcast-17394">Podplay</a>
				            <a class="btn--basic btn--basic--small btn--dark" style=""  target="_blank"  href="https://open.spotify.com/show/3glCt1KuSbUQa3S8UYPFwD">Apple Podcasts</a>

				        <a class="btn--basic btn--dark" style="background:#04aef2;" href="">Lifcast</a>
				        <a class="btn--basic btn--dark" style="background:#04aef2;" href="/podcast">Kaikki jaksot</a>
				    </div>
				      </div>


				      </div>



				      </div>

				      <div class="content-spacer--small">
				</div>


				      </div>
				      </div>

				      </section>


        <?php
        return ob_get_clean();
    }
endif;

if ( ! function_exists( 'select_loop_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function select_loop_output( $output, $attributes ) {
        ob_start();
        ?>

				<div class="module--blog-app -x-pad">

				  <div class="flx-container">
				<?php foreach( $attributes['post-select'] as $post_id ): ?>
					<?php $args = array(
									'p'         => $post_id,
									'post_type' => 'any',
							);

							$loop = new WP_Query( $args );

							while ( $loop->have_posts() ) : $loop->the_post();
								?>

					<?php locate_template('src/parts/global/button-card-post.php', true, false); ?>

									<?php
							endwhile;

							wp_reset_postdata();  ?>

				<?php endforeach; ?>

			</div>
			</div>


        <?php
        return ob_get_clean();
    }
endif;


if ( ! function_exists( 'asiakas_loop_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function asiakas_loop_output( $output, $attributes ) {
        ob_start();
        ?>


				<?php $num_loop = esc_html( $attributes['maara'] ); ?>

<?php $selected_taxonomy = get_term_by('slug', $attributes['category-select'], 'category'); ?>

<?php

$args = [
  'cat' => $selected_taxonomy->slug,
	'num' => $num_loop,
];

 ?>

				      <?php locate_template('src/parts/php_blocks/asiakas-loop-block.php', true, false, $args); ?>


        <?php
        return ob_get_clean();
    }
endif;



if ( ! function_exists( 'workshop_loop_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function workshop_loop_output( $output, $attributes ) {
        ob_start();
        ?>

				      <?php locate_template('src/parts/php_blocks/workshop-loop-block.php', true, false); ?>


        <?php
        return ob_get_clean();
    }
endif;


if ( ! function_exists( 'blog_loop_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function blog_loop_output( $output, $attributes ) {
        ob_start();
        ?>

				      <?php locate_template('src/parts/php_blocks/blog-loop-block.php', true, false); ?>


        <?php
        return ob_get_clean();
    }
endif;

if ( ! function_exists( 'asiantuntijat_loop_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function asiantuntijat_loop_output( $output, $attributes ) {
        ob_start();
        ?>

				      <?php locate_template('src/parts/php_blocks/asiantuntijat-loop-block.php', true, false); ?>


        <?php
        return ob_get_clean();
    }
endif;
