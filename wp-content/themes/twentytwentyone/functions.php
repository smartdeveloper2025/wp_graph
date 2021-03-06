<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentytwentyone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/**
 * Enqueue non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );

/*****************Node Change Color Functions Start**************************/
function change_nodes_color_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	//echo "<pre>"; print_r($_POST); die('=========form--------cccccc--');
	if(isset($_POST['action']) && $_POST['action'] == 'change_nodes_color_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$topic_color = trim($_POST['topic_color']);
		$sub_topic_color = trim($_POST['sub_topic_color']);
		$source_color = trim($_POST['source_color']);
		$key_color = trim($_POST['key_color']);
		$they_help_color = trim($_POST['they_help_color']);
		$i_help_color = trim($_POST['i_help_color']);
		$hdn_creation_id = trim($_POST['hdn_creation_id']);
		
		if(!empty($hdn_creation_id) ){
			if($_POST['type'] == 'tpc'){
					$sqlUpdatecreation = "update {$creation_table} set node_color='{$topic_color}' where id={$hdn_creation_id} and user_id={$current_user_id}";
				
					$updResult = $wpdb->query($sqlUpdatecreation);
					
					
					$sqlUpdateSub = "update {$sub_creation_table} set node_color='{$sub_topic_color}' where creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}'";
					
					$wpdb->query($sqlUpdateSub);
					
					$sqlUpdateSubDetail = "update {$detail_sub_creation_table} set lft_node_color='{$source_color}', rt_node_color='{$key_color}' where creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}' ";
					
					$wpdb->query($sqlUpdateSubDetail);
				
					if($updResult === 0 || $updResult > 0)
					{
						
						// check if skill/tools array is not empty
						$response = array('flag'=> 'success', 'msg'=> 'Topic Nodes colors updated successfully');
					}else{
						$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
					}
				} else if($_POST['type'] == 'exp'){
					
					$sqlUpdateSub = "update {$sub_creation_table} set node_color='{$topic_color}' where creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}'";
					
					$wpdb->query($sqlUpdateSub);
					
					$sqlUpdateSubDetail = "update {$detail_sub_creation_table} set lft_node_color='{$sub_topic_color}', rt_node_color='{$source_color}' where creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}' ";
					
					$wpdb->query($sqlUpdateSubDetail);
				
					if($sqlUpdateSub === 0 || $sqlUpdateSub > 0)
					{
						
						// check if skill/tools array is not empty
						$response = array('flag'=> 'success', 'msg'=> 'Experience Nodes colors updated successfully');
					}else{
						$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
					}
				} else if($_POST['type'] == 'net'){
					
					$sqlUpdatecreation = "update {$creation_table} set user_color='{$topic_color}' where id={$hdn_creation_id} and user_id={$current_user_id}";
				
					$updResult = $wpdb->query($sqlUpdatecreation);
					
					
					$sqlUpdateSub = "update {$sub_creation_table} set node_color='{$sub_topic_color}', field_2_color='{$source_color}', field_3_color='{$key_color}' where creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}'";
					
					$wpdb->query($sqlUpdateSub);
					
					$sqlUpdateSubDetail = "update {$detail_sub_creation_table} set lft_node_color='{$they_help_color}', rt_node_color='{$i_help_color}' where creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}' ";
					
					$wpdb->query($sqlUpdateSubDetail);
				
					if($updResult === 0 || $updResult > 0)
					{
						
						// check if skill/tools array is not empty
						$response = array('flag'=> 'success', 'msg'=> 'Topic Nodes colors updated successfully');
					}else{
						$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
					}
				}
				
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
	} // end if
		// Encoding array in JSON format
		echo json_encode($response);
			die();
}
add_action('wp_ajax_change_nodes_color_by_ajax', 'change_nodes_color_ajax');

/*****************Node Change Color Functions End**************************/


/*****************Topic Functions Start**************************/

function create_creation_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	//echo "<pre>"; print_r($_POST); die('=========form--------cccccc--');
	if(isset($_POST['action']) && $_POST['action'] == 'create_creation_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$type = trim($_POST['type']);
		$topic_name = trim($_POST['topic_name']);
		$topic_desc = trim($_POST['topic_desc']);
		$topic_color = trim($_POST['topic_color']);
		//$sub_topic_color = trim($_POST['sub_topic_color']);
		//$source_color = trim($_POST['source_color']);
		//$key_color = trim($_POST['key_color']);
		$hdn_creation_id = trim($_POST['hdn_creation_id']);
		
		if(empty($hdn_creation_id) && !empty($topic_name) ){ 
			$sqlInsert = "INSERT INTO {$creation_table} set user_id='{$current_user_id}', name='{$topic_name}', description='{$topic_desc}', type='{$type}', node_color='{$topic_color}' ";
			
			if($wpdb->query($sqlInsert)) 
    		{
			//die('here localkk');
				$creation_id = $wpdb->insert_id;
				$response = array('flag'=> 'success','creation_id'=>$creation_id, 'msg'=> 'Topic Note inserted successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
			}
		} else if(!empty($hdn_creation_id) && !empty($topic_name) ){
			$sqlUpdate = "update {$creation_table} set name='{$topic_name}', description='{$topic_desc}', node_color='{$topic_color}' where id={$hdn_creation_id} and user_id={$current_user_id}";
			
			$updResult = $wpdb->query($sqlUpdate);
			
			if($updResult === 0 || $updResult > 0)
    		{
				//set updated time for all the tables
				set_updated_at($hdn_creation_id);
				
				// check if skill/tools array is not empty
				$response = array('flag'=> 'success','creation_id'=>$hdn_creation_id, 'msg'=> 'Topic Note Updated successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
			}
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
	} // end if
		// Encoding array in JSON format
		echo json_encode($response);
			die();
}
add_action('wp_ajax_create_creation_by_ajax', 'create_creation_ajax');

function create_sub_creation_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	//$topic_color = trim($_POST['topic_color']);
	$sub_topic_color = trim($_POST['sub_topic_color']);
	$source_color = trim($_POST['source_color']);
	$key_color = trim($_POST['key_color']);
	//==waste
		$sql_log =array();
	//==end-waste
	//echo "<pre>"; print_r($_POST); //die('=========form--------ssss1--');
	if(isset($_POST['action']) && $_POST['action'] == 'create_sub_creation_by_ajax')	{
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$counter = trim($_POST['counter']);
		$hdn_creation_id = trim($_POST['creation_id']);
		$hdn_sub_creation_id = trim($_POST['hdn_sub_creation_id']);
		$sub_topic_name = trim($_POST['sub_topic_name']);
		$topic_notes = trim($_POST['sub_topic_notes']);
		
		//check creation_id not empty and sub_creation_id empty and sub_topic_name not empty
		if(empty($hdn_sub_creation_id) && !empty($hdn_creation_id)){
			
			$sqlInsertSub = "INSERT INTO {$sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', field_1 = '{$sub_topic_name}', field_2 = '', field_3 = '', notes = '{$topic_notes}', node_color='{$sub_topic_color}' ";
			
			//==waste
			$sql_log[] = $sqlInsertSub;
			
			if($wpdb->query($sqlInsertSub)) 
    		{
				$sub_creation_id = $wpdb->insert_id;
				
				// check if skill/tools array is not empty
				if(!empty($_POST['tag_val'])){
					$sqlDeleteOldSubDetail = "DELETE from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and  creation_id = '{$hdn_creation_id}' and sub_creation_id = '{$hdn_sub_creation_id}' ";
				//==waste
				$sql_log[] = $sqlDeleteOldSubDetail;
			
					$wpdb->query($sqlDeleteOldSubDetail);
					
					foreach($_POST['tag_val'] as $key => $tag_val){
						if(!(trim($tag_val["left"]) == '' && trim($tag_val["right"]) == '')){
							$sqlInsertSubDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', sub_creation_id = '{$sub_creation_id}', left_val = '{$tag_val["left"]}', right_val = '{$tag_val["right"]}', lft_node_color='{$source_color}', rt_node_color='{$key_color}' ";
							$wpdb->query($sqlInsertSubDetail);
				//==waste
				$sql_log[] = $sqlInsertSubDetail;
			
						}
					}
				}
				
				$response = array('flag'=> 'success', 'counter'=>$counter, 'sub_creation_id'=>$sub_creation_id, 'msg'=> 'Sub creation created successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong--1');
			}
		} else if(!empty($hdn_sub_creation_id) && !empty($hdn_creation_id)){
			
			$sqlUpdateSub = "update {$sub_creation_table} set field_1 = '{$sub_topic_name}', field_2 = '', field_3 = '', notes = '{$topic_notes}', node_color='{$sub_topic_color}' where id = '{$hdn_sub_creation_id}' and creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}'";
			
			//==waste
			$sql_log[] = $sqlUpdateSub;
			//==end-waste
			
			$updResult = $wpdb->query($sqlUpdateSub);
			
			if($updResult === 0 || $updResult > 0) 
    		{
				// check if skill/tools array is not empty
				if(!empty($_POST['tag_val'])){
					$sqlDeleteOldSubDetail = "DELETE from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and  creation_id = '{$hdn_creation_id}' and sub_creation_id = '{$hdn_sub_creation_id}' ";
					$wpdb->query($sqlDeleteOldSubDetail);
			//==waste
			$sql_log[] = $sqlDeleteOldSubDetail;
			//==end-waste
			
					foreach($_POST['tag_val'] as $key => $tag_val){
						if(!(trim($tag_val["left"]) == '' && trim($tag_val["right"]) == '')){
							$sqlInsertSubDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', sub_creation_id = '{$hdn_sub_creation_id}', left_val = '{$tag_val["left"]}', right_val = '{$tag_val["right"]}', lft_node_color='{$source_color}', rt_node_color='{$key_color}' ";
			//==waste
			$sql_log[] = $sqlInsertSubDetail;
			//==end-waste
			
							$wpdb->query($sqlInsertSubDetail);
						}
					}
				}
				
				$response = array('flag'=> 'success', 'counter'=>$counter, 'sub_creation_id'=>$hdn_sub_creation_id, 'msg'=> 'Sub creation updated successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong---2');
			}
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
		
		//set updated time for all the tables
		set_updated_at($hdn_creation_id);
		
	} // end if
		
		// Encoding array in JSON format
		echo json_encode(array_merge($response, $sql_log));
			die();
}
add_action('wp_ajax_create_sub_creation_by_ajax', 'create_sub_creation_ajax');

function start_creation_graph_by_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	$graph_data = $graph_nodes = $graph_child = $other_nodes = array();

	if(isset($_POST['action']) && $_POST['action'] == 'start_creation_graph_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$current_user_id}' and id = '{$_POST["creation_id"]}' ", ARRAY_A );
		// echo "<br>";
		// echo "<pre>"; print_r($results); die("======rrrrrrr");
		
		if(count($creation_result) >= 0){
			//graph main node
			$graph_nodes = array(
									'name' => $creation_result[0]['name'],
									'value' => 100,
									'color' => $creation_result[0]['node_color'] ? $creation_result[0]['node_color'] : TP_CRE_MAIN
								);
			
			// get sub-topic
			$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$_POST["creation_id"]}' ", ARRAY_A );
			//echo "<pre>"; print_r($sub_creation_result); die('==hello');

	$right_node_collection = array();
			if(count($sub_creation_result) >= 0){
				// loop for all sub-topic
				foreach($sub_creation_result as $sub_key => $sub_data){
					if($sub_data['notes'] != ''){
						$tooltip_text = $sub_data['notes'];
					} else {
						$tooltip_text = $sub_data['field_1'];
					}
					
					// append children to main node
					if($sub_data['field_1'] != ''){
						$graph_child['children'][$sub_key] = array('name' =>$sub_data['field_1'],'value' => 50,'color' => $sub_data['node_color'] ? $sub_data['node_color'] : TP_CRE_SUB ,'tooltip' => $tooltip_text );
					}
					
					// get left-right (Source-Learning) nodes
					$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$_POST["creation_id"]}' and sub_creation_id = '{$sub_data["id"]}' ", ARRAY_A );
					//echo "<pre>"; print_r($detail_sub_creation_result); die('==hello');
					
					if(count($detail_sub_creation_result) >= 0){
						// loop for all left-right (Source-Learning) nodes
						foreach($detail_sub_creation_result as $key => $detail_data){
							$left_node = array();
							// echo '<pre><br/>===';
							// var_dump($detail_data);
							// echo '</pre>';
							// pick all left node and right node
							if(!(trim($detail_data['left_val']) == '' && trim($detail_data['right_val']) == '' )){
								// echo '<br/>he='.$detail_data['left_val'];
								//collect left node
								if($detail_data['left_val'] != ''){
									$left_node = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : TP_CRE_LF );
									
									// create link with sub-topic of left_node
									$graph_child['children'][$sub_key]['link'][] = $detail_data['left_val'];
									$graph_child['children'][$sub_key]['children'][] = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : TP_CRE_LF );
								}
								
								//collect right node if not empty
								if(!empty($detail_data['right_val'])){
									$rightValueArray = explode(',', trim($detail_data['right_val']));
									
									if($detail_data['left_val'] != ''){
										$left_node['link'] = $rightValueArray; //create left node linking with right node 
									}
									
									foreach($rightValueArray as $r_key => $r_val){
										if($r_val != ''){
											// push right node to nodes array, so that it wil create a node
if(!in_array($r_val,$right_node_collection)) {
											
											$right_node_collection[] = $r_val; // add in collection for duplicate check
											
											// $other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : TP_CRE_RT);
											
											if($detail_data['left_val'] != ''){
												//if left (Source) is not empty them mark right node (Keys) as children left
												$graph_child['children'][$sub_key]['children'][$key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : TP_CRE_RT );
											} else {
												//if left (Source) is empty them mark right node (Keys) as children sub topic node
												
												$graph_child['children'][$sub_key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : TP_CRE_RT );
												
											}
											
										}
											
											// create link with sub-topic of right-node
											$graph_child['children'][$sub_key]['link'][] = $r_val;
											$graph_child['children'][$sub_key]['children'][$key]['link'][] = $r_val;
										}
									}
								}
								
								//collect left node with linking
								/*if(count($left_node) > 0){
									$other_nodes[] = $left_node;
								}*/
							}
						}
						
					}
				}
				
				$graph_data[] = array_merge($graph_nodes,$graph_child); //appaned all child to main node
				//$graph_data = array_merge($graph_data,$other_nodes);
				
			/*	$unique_array = [];
				foreach($graph_data as $element) {
					$hash = $element['name'];
					$unique_array[$hash] = $element;
				}
				$unique_result = array_values($unique_array);*/
				
					//echo "<pre>"; print_r($unique_result); //die('==hello');
		 
				echo json_encode($graph_data); die();
			} else {
				$test = array (0 => array ('name' => $creation_result[0]['name'] ,'value' => 100,'color' => '#9ba2a6'));
				echo json_encode($test); die();
			}
			
		 } 
	} 
	
}
add_action('wp_ajax_start_creation_graph_by_ajax', 'start_creation_graph_by_ajax');

/*****************Topic Functions End**************************/

/*****************Experience Functions Start**************************/
function create_experience_creation_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	//echo "<pre>"; print_r($_POST); die('=========form--------cccccc--');
	if(isset($_POST['action']) && $_POST['action'] == 'create_experience_creation_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$type = trim($_POST['type']);
		$exp_name = trim($_POST['exp_name']);
		$exp_desc = trim($_POST['exp_desc']);
		$hdn_creation_id = trim($_POST['hdn_exp_creation_id']);
		
		if(empty($hdn_creation_id) && !empty($exp_name) ){ 
			$sqlInsert = "INSERT INTO {$creation_table} set user_id='{$current_user_id}', name='{$exp_name}', description='{$exp_desc}', type='{$type}'";
			
			if($wpdb->query($sqlInsert)) 
    		{
			//die('here localkk');
				$creation_id = $wpdb->insert_id;
				$response = array('flag'=> 'success','creation_id'=>$creation_id, 'msg'=> 'Experience inserted successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
			}
		} else if(!empty($hdn_creation_id) && !empty($exp_name) ){
			$sqlUpdate = "update {$creation_table} set name='{$exp_name}', description='{$exp_desc}' where id={$hdn_creation_id} and user_id={$current_user_id}";
			
			$updResult = $wpdb->query($sqlUpdate);
			
			if($updResult === 0 || $updResult > 0)
    		{
				//set updated time for all the tables
				set_updated_at($hdn_creation_id);
				
				// check if skill/tools array is not empty
				$response = array('flag'=> 'success','creation_id'=>$hdn_creation_id, 'msg'=> 'Experience Updated successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
			}
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
	} // end if
		// Encoding array in JSON format
		echo json_encode($response);
			die();
}
add_action('wp_ajax_create_experience_creation_by_ajax', 'create_experience_creation_ajax');

function create_experience_sub_creation_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	$topic_color = trim($_POST['topic_color']);
	$sub_topic_color = trim($_POST['sub_topic_color']);
	$source_color = trim($_POST['source_color']);
	//==waste
		$sql_log =array();
	//==end-waste
	//echo "<pre>"; print_r($_POST); //die('=========form--------ssss1--');
	if(isset($_POST['action']) && $_POST['action'] == 'create_experience_sub_creation_by_ajax')	{
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$counter = trim($_POST['counter']);
		$hdn_creation_id = trim($_POST['creation_id']);
		$hdn_sub_creation_id = trim($_POST['hdn_exp_sub_creation_id']);
		$sub_exp_name = trim($_POST['sub_exp_name']);
		$sub_exp_title = trim($_POST['sub_exp_title']);
		$sub_exp_location = trim($_POST['sub_exp_location']);
		$exp_notes = trim($_POST['sub_exp_notes']);
		
		
		//check creation_id not empty and sub_creation_id empty and sub_topic_name not empty
		if(empty($hdn_sub_creation_id) && !empty($hdn_creation_id)){
			
			$sqlInsertSub = "INSERT INTO {$sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', field_1 = '{$sub_exp_name}', field_2 = '{$sub_exp_title}', field_3 = '{$sub_exp_location}', notes = '{$exp_notes}', node_color='{$topic_color}' ";
			
			//==waste
			$sql_log[] = $sqlInsertSub;
			
			if($wpdb->query($sqlInsertSub)) 
    		{
				$sub_creation_id = $wpdb->insert_id;
				
				// check if skill/tools array is not empty
				if(!empty($_POST['tag_val'])){
					$sqlDeleteOldSubDetail = "DELETE from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and  creation_id = '{$hdn_creation_id}' and sub_creation_id = '{$hdn_sub_creation_id}' ";
				//==waste
				$sql_log[] = $sqlDeleteOldSubDetail;
			
					$wpdb->query($sqlDeleteOldSubDetail);
					
					foreach($_POST['tag_val'] as $key => $tag_val){
						if(!(trim($tag_val["left"]) == '' && trim($tag_val["right"]) == '')){
							$sqlInsertSubDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', sub_creation_id = '{$sub_creation_id}', left_val = '{$tag_val["left"]}', right_val = '{$tag_val["right"]}', lft_node_color='{$sub_topic_color}', rt_node_color='{$source_color}' ";
							$wpdb->query($sqlInsertSubDetail);
				//==waste
				$sql_log[] = $sqlInsertSubDetail;
			
						}
					}
				}
				
				$response = array('flag'=> 'success', 'counter'=>$counter, 'sub_creation_id'=>$sub_creation_id, 'msg'=> 'Sub creation created successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong--1');
			}
		} else if(!empty($hdn_sub_creation_id) && !empty($hdn_creation_id)){
			
			$sqlUpdateSub = "update {$sub_creation_table} set field_1 = '{$sub_exp_name}', field_2 = '{$sub_exp_title}', field_3 = '{$sub_exp_location}', notes = '{$exp_notes}', node_color='{$topic_color}' where id = '{$hdn_sub_creation_id}' and creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}'";
			
			//==waste
			$sql_log[] = $sqlUpdateSub;
			//==end-waste
			
			$updResult = $wpdb->query($sqlUpdateSub);
			
			if($updResult === 0 || $updResult > 0) 
    		{
				// check if skill/tools array is not empty
				if(!empty($_POST['tag_val'])){
					$sqlDeleteOldSubDetail = "DELETE from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and  creation_id = '{$hdn_creation_id}' and sub_creation_id = '{$hdn_sub_creation_id}' ";
					$wpdb->query($sqlDeleteOldSubDetail);
			//==waste
			$sql_log[] = $sqlDeleteOldSubDetail;
			//==end-waste
			
					foreach($_POST['tag_val'] as $key => $tag_val){
						if(!(trim($tag_val["left"]) == '' && trim($tag_val["right"]) == '')){
							$sqlInsertSubDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', sub_creation_id = '{$hdn_sub_creation_id}', left_val = '{$tag_val["left"]}', right_val = '{$tag_val["right"]}', lft_node_color='{$sub_topic_color}', rt_node_color='{$source_color}' ";
			//==waste
			$sql_log[] = $sqlInsertSubDetail;
			//==end-waste
			
							$wpdb->query($sqlInsertSubDetail);
						}
					}
				}
				
				$response = array('flag'=> 'success', 'counter'=>$counter, 'sub_creation_id'=>$hdn_sub_creation_id, 'msg'=> 'Sub creation updated successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong---2');
			}
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
		
		//set updated time for all the tables
		set_updated_at($hdn_creation_id);
	} // end if
		
		// Encoding array in JSON format
		echo json_encode(array_merge($response, $sql_log));
			die();
}
add_action('wp_ajax_create_experience_sub_creation_by_ajax', 'create_experience_sub_creation_ajax');

function start_experience_creation_graph_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	$graph_data = $graph_nodes = $graph_child = $other_nodes = array();

	if(isset($_POST['action']) && $_POST['action'] == 'start_experience_creation_graph_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$current_user_id}' and id = '{$_POST["creation_id"]}' ", ARRAY_A );
		// echo "<br>";
		 //echo "<pre>"; print_r($creation_result); die("======rrrrrrr");
		
		if(count($creation_result) >= 0){
			//graph main node
			/*$graph_nodes = array(
									'name' => $creation_result[0]['name'],
									'value' => 100,
									'color' => '#9ba2a6'
								);*/
			
			// get sub-topic
			$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$_POST["creation_id"]}' ", ARRAY_A );
			//echo "<pre>"; print_r($sub_creation_result); die('==hello');
			
			$right_node_collection = array();

			if(count($sub_creation_result) >= 0){
				// loop for all sub-topic
				foreach($sub_creation_result as $sub_key => $sub_data){
					if($sub_data['notes'] != ''){
						$tooltip_text = $sub_data['notes'];
					} else {
						$tooltip_text = $sub_data['field_1'];
					}
					
					// append children to main node
					if($sub_data['field_1'] != ''){
						$graph_child[] = array('name' =>$sub_data['field_1'],'value' => 50,'color' => $sub_data['node_color'] ? $sub_data['node_color'] : EX_CRE_SUB ,'tooltip' => $tooltip_text );
					}
					
					// get left-right (Source-Learning) nodes
					$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$_POST["creation_id"]}' and sub_creation_id = '{$sub_data["id"]}' ", ARRAY_A );
					//echo "<pre>"; print_r($detail_sub_creation_result); die('==hello');
					
					if(count($detail_sub_creation_result) >= 0){
						// loop for all left-right (Source-Learning) nodes
						foreach($detail_sub_creation_result as $key => $detail_data){
							$left_node = array();
							// echo '<pre><br/>===';
							// var_dump($detail_data);
							// echo '</pre>';
							// pick all left node and right node
							if(!(trim($detail_data['left_val']) == '' && trim($detail_data['right_val']) == '' )){
								// echo '<br/>he='.$detail_data['left_val'];
								//collect left node
								if($detail_data['left_val'] != ''){
									//$left_node = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : EX_CRE_LF );
									
									// create link with sub-topic of left_node
									$graph_child[$sub_key]['link'][] = $detail_data['left_val'];
									
									
									//collect exp left node as first children
									$graph_child[$sub_key]['children'][] = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : EX_CRE_LF );
									
								}
								
								//collect right node if not empty
								if(!empty($detail_data['right_val'])){
									$rightValueArray = explode(',', trim($detail_data['right_val']));
									
									// if($detail_data['left_val'] != ''){
										// $left_node['link'] = $rightValueArray; //create left node linking with right node 
									// }
									
									foreach($rightValueArray as $r_key => $r_val){
										if($r_val != ''){
											if(!in_array($r_val,$right_node_collection)) {
												$right_node_collection[] = $r_val; // add in collection for duplicate check
												
												// push right node to nodes array, so that it wil create a node
												//$other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : EX_CRE_RT );
												// $other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => '#b4bcfc', 'link' => $rightValueArray);
												
												
												if($detail_data['left_val'] != ''){
													$graph_child[$sub_key]['children'][$key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : EX_CRE_RT );

													// $graph_child[$sub_key]['children'][$key]['link'][] = $r_val;
												} else {
													$graph_child[$sub_key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : EX_CRE_RT );
												}
											} 
											
											if($detail_data['left_val'] != '')
												$graph_child[$sub_key]['children'][$key]['link'][] = $r_val;
											
											// create link with sub-topic of right-node
											$graph_child[$sub_key]['link'][] = $r_val;
										}
									}
								}
								
								//collect left node with linking
								// if(count($left_node) > 0){
									// $other_nodes[] = $left_node;
								// }
							}
						}
						
					}
				}
				//$graph_data[] = array_merge($graph_nodes,$graph_child); //appaned all child to main node
				$graph_data = $graph_child; //appaned all child to main node
				//$graph_data = array_merge($graph_data,$other_nodes);
				//echo "---hello";
				
					//echo "<pre>"; print_r($graph_data); //die('==hello');
				echo json_encode($graph_data); die();
			} else {
				$test = array (0 => array ('name' => $creation_result[0]['name'] ,'value' => 100,'color' => '#9ba2a6'));
				echo json_encode($test); die();
			}
			
		 } 
	} 
	
	
}
add_action('wp_ajax_start_experience_creation_graph_by_ajax', 'start_experience_creation_graph_ajax');

/*****************Experience Functions End**************************/

/*****************Network Functions Start**************************/
function create_network_creation_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$response =array();
	$topic_color = trim($_POST['topic_color']);
	
	//echo "<pre>"; print_r($_POST); die('=========form--------cccccc--');
	if(isset($_POST['action']) && $_POST['action'] == 'create_network_creation_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$type = trim($_POST['type']);
		$net_name = trim($_POST['net_name']);
		$net_desc = trim($_POST['net_desc']);
		$hdn_creation_id = trim($_POST['hdn_net_creation_id']);
		
		if(empty($hdn_creation_id) && !empty($net_name) ){ 
			$sqlInsert = "INSERT INTO {$creation_table} set user_id='{$current_user_id}', name='{$net_name}', description='{$net_desc}', type='{$type}', user_color='{$topic_color}'";
			
			if($wpdb->query($sqlInsert)) 
    		{
			//die('here localkk');
				$creation_id = $wpdb->insert_id;
				$response = array('flag'=> 'success','creation_id'=>$creation_id, 'msg'=> 'Network inserted successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
			}
		} else if(!empty($hdn_creation_id) && !empty($net_name) ){
			$sqlUpdate = "update {$creation_table} set name='{$net_name}', description='{$net_desc}', user_color='{$topic_color}' where id={$hdn_creation_id} and user_id={$current_user_id}";
			
			$updResult = $wpdb->query($sqlUpdate);
			
			if($updResult === 0 || $updResult > 0)
    		{
				//set updated time for all the tables
				set_updated_at($hdn_creation_id);
				// check if skill/tools array is not empty
				$response = array('flag'=> 'success','creation_id'=>$hdn_creation_id, 'msg'=> 'Network Updated successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong');
			}
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
	} // end if
		// Encoding array in JSON format
		echo json_encode($response);
			die();
}
add_action('wp_ajax_create_network_creation_by_ajax', 'create_network_creation_ajax');

function create_network_sub_creation_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$sub_topic_color = trim($_POST['sub_topic_color']);
	$source_color = trim($_POST['source_color']);
	$key_color = trim($_POST['key_color']);
	$they_help_color = trim($_POST['they_help_color']);
	$i_help_color = trim($_POST['i_help_color']);
	$response =array();
	//==waste
		$sql_log =array();
	//==end-waste
	//echo "<pre>"; print_r($_POST); //die('=========form--------ssss1--');
	if(isset($_POST['action']) && $_POST['action'] == 'create_network_sub_creation_by_ajax')	{
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$counter = trim($_POST['counter']);
		$hdn_creation_id = trim($_POST['creation_id']);
		$hdn_sub_creation_id = trim($_POST['hdn_net_sub_creation_id']);
		$sub_net_name = trim($_POST['sub_net_name']);
		$sub_net_title = trim($_POST['sub_net_title']);
		$sub_net_location = trim($_POST['sub_net_location']);
		$net_notes = trim($_POST['sub_net_notes']);
		
		//check creation_id not empty and sub_creation_id empty and sub_topic_name not empty
		if(empty($hdn_sub_creation_id) && !empty($hdn_creation_id)){
			
			$sqlInsertSub = "INSERT INTO {$sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', field_1 = '{$sub_net_name}', field_2 = '{$sub_net_title}', field_3 = '{$sub_net_location}', notes = '{$net_notes}', node_color = '{$sub_topic_color}', field_2_color = '{$source_color}', field_3_color = '{$key_color}' ";
			
			//==waste
			$sql_log[] = $sqlInsertSub;
			
			if($wpdb->query($sqlInsertSub)) 
    		{
				$sub_creation_id = $wpdb->insert_id;
				
				// check if skill/tools array is not empty
				if(!empty($_POST['tag_val'])){
					$sqlDeleteOldSubDetail = "DELETE from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and  creation_id = '{$hdn_creation_id}' and sub_creation_id = '{$hdn_sub_creation_id}' ";
				//==waste
				$sql_log[] = $sqlDeleteOldSubDetail;
			
					$wpdb->query($sqlDeleteOldSubDetail);
					
					foreach($_POST['tag_val'] as $key => $tag_val){
						if(!(trim($tag_val["left"]) == '' && trim($tag_val["right"]) == '')){
							$sqlInsertSubDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', sub_creation_id = '{$sub_creation_id}', left_val = '{$tag_val["left"]}', right_val = '{$tag_val["right"]}', lft_node_color='{$they_help_color}', rt_node_color='{$i_help_color}' ";
							$wpdb->query($sqlInsertSubDetail);
				//==waste
				$sql_log[] = $sqlInsertSubDetail;
			
						}
					}
				}
				
				$response = array('flag'=> 'success', 'counter'=>$counter, 'sub_creation_id'=>$sub_creation_id, 'msg'=> 'Sub creation created successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong--1');
			}
		} else if(!empty($hdn_sub_creation_id) && !empty($hdn_creation_id)){
			
			$sqlUpdateSub = "update {$sub_creation_table} set field_1 = '{$sub_net_name}', field_2 = '{$sub_net_title}', field_3 = '{$sub_net_location}', notes = '{$net_notes}', node_color = '{$sub_topic_color}', field_2_color = '{$source_color}', field_3_color = '{$key_color}' where id = '{$hdn_sub_creation_id}' and creation_id = '{$hdn_creation_id}' and user_id = '{$current_user_id}'";
			
			//==waste
			$sql_log[] = $sqlUpdateSub;
			//==end-waste
			
			$updResult = $wpdb->query($sqlUpdateSub);
			
			if($updResult === 0 || $updResult > 0) 
    		{
				// check if skill/tools array is not empty
				if(!empty($_POST['tag_val'])){
					$sqlDeleteOldSubDetail = "DELETE from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and  creation_id = '{$hdn_creation_id}' and sub_creation_id = '{$hdn_sub_creation_id}' ";
					$wpdb->query($sqlDeleteOldSubDetail);
			//==waste
			$sql_log[] = $sqlDeleteOldSubDetail;
			//==end-waste
			
					foreach($_POST['tag_val'] as $key => $tag_val){
						if(!(trim($tag_val["left"]) == '' && trim($tag_val["right"]) == '')){
							$sqlInsertSubDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$hdn_creation_id}', sub_creation_id = '{$hdn_sub_creation_id}', left_val = '{$tag_val["left"]}', right_val = '{$tag_val["right"]}', lft_node_color='{$they_help_color}', rt_node_color='{$i_help_color}' ";
			//==waste
			$sql_log[] = $sqlInsertSubDetail;
			//==end-waste
			
							$wpdb->query($sqlInsertSubDetail);
						}
					}
				}
				
				$response = array('flag'=> 'success', 'counter'=>$counter, 'sub_creation_id'=>$hdn_sub_creation_id, 'msg'=> 'Sub creation updated successfully');
			}else{
				$response = array('flag'=> 'failure', 'msg'=> 'Opps! Something went wrong---2');
			}
		} else {
			$response = array('flag'=> 'failure', 'msg'=> 'Invalid Empty Field');
		}
		//set updated time for all the tables
		set_updated_at($hdn_creation_id);
	} // end if
		// Encoding array in JSON format
		echo json_encode(array_merge($response, $sql_log));
			die();
}
add_action('wp_ajax_create_network_sub_creation_by_ajax', 'create_network_sub_creation_ajax');

function start_network_creation_graph_ajax() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$current_user = wp_get_current_user();
		// echo "<pre>"; print_r($current_user); die("======yyyyyy");
	
	$response =array();
	$graph_data = $graph_nodes = $graph_child = $other_nodes = $other_sub_nodes = array();

	if(isset($_POST['action']) && $_POST['action'] == 'start_network_creation_graph_by_ajax')	{
		$creation_table = $wpdb->prefix."tbl_creation";
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$current_user_id}' and id = '{$_POST["creation_id"]}' ", ARRAY_A );
		// echo "<br>";
		// echo "<pre>"; print_r($results); die("======rrrrrrr");
		
		
		if(count($creation_result) >= 0){
			//graph main node
			$graph_nodes = array(
									'name' => $current_user->display_name,
									'value' => 100,
									'color' => $creation_result[0]['user_color'] ? $creation_result[0]['user_color'] : NT_CRE_USER
								);
			
			// get sub-topic
			$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$_POST["creation_id"]}' ", ARRAY_A );
			//echo "<pre>"; print_r($sub_creation_result); die('==hello');
			
			$right_node_collection = array();

			if(count($sub_creation_result) >= 0){
				// loop for all sub-topic
				foreach($sub_creation_result as $sub_key => $sub_data){
					if($sub_data['notes'] != ''){
						$tooltip_text = $sub_data['notes'];
					} else {
						$tooltip_text = $sub_data['field_1'];
					}
					
					// append children to main node
					if($sub_data['field_1'] != ''){
						$graph_child['children'][$sub_key] = array('name' =>$sub_data['field_1'],'value' => 50,'color' => $sub_data['node_color'] ? $sub_data['node_color'] : NT_CRE_SUB ,'tooltip' => $tooltip_text, 'link'=>[$sub_data['field_2']] );
					}
					
					
					if($sub_data['field_2'] != ''){
						//$other_nodes[] = array('name' =>$sub_data['field_2'],'value' => 50,'color' => $sub_data['field_2_color'] ? $sub_data['field_2_color'] : NT_CRE_ORG , 'link'=>[$sub_data['field_3']] );
						
						$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_2'],'value' => 50,'color' => $sub_data['field_2_color'] ? $sub_data['field_2_color'] : NT_CRE_ORG  );
						
						$graph_child['children'][$sub_key]['link'][] = $sub_data['field_2'];
					}
					
					if($sub_data['field_3'] != ''){
						//$other_nodes[] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS ,'link'=>[$sub_data['field_1']] );
						
						if($sub_data['field_2'] != ''){
							$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS , 'link' => [$sub_data['field_2']] );
						} else {
							$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS );
						}	
						
						$graph_child['children'][$sub_key]['children'][$sub_key]['link'][] = $sub_data['field_3'];
					}
					
					$graph_child['children'][$sub_key]['link'][] = $sub_data['field_1'];
					// get left-right (Source-Learning) nodes
					$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$_POST["creation_id"]}' and sub_creation_id = '{$sub_data["id"]}' ", ARRAY_A );
					//echo "<pre>"; print_r($detail_sub_creation_result); die('==hello');
					
					if(count($detail_sub_creation_result) >= 0){
						// loop for all left-right (Source-Learning) nodes
						foreach($detail_sub_creation_result as $key => $detail_data){
							$left_node = array();
							// echo '<pre><br/>===';
							// var_dump($detail_data);
							// echo '</pre>';
							// pick all left node and right node
							if(!(trim($detail_data['left_val']) == '' && trim($detail_data['right_val']) == '' )){
								// echo '<br/>he='.$detail_data['left_val'];
								//collect left node
								if($detail_data['left_val'] != ''){
									$left_node = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : NT_CRE_LF );
									
									// create link with sub-topic of left_node
									$graph_child['children'][$sub_key]['link'][] = $detail_data['left_val'];
								}
								
								//collect right node if not empty
								if(!empty($detail_data['right_val'])){
									$rightValueArray = explode(',', trim($detail_data['right_val']));
									
									if($detail_data['left_val'] != ''){
										//$left_node['link'] = $rightValueArray; //create left node linking with right node 
									}
									
									foreach($rightValueArray as $r_key => $r_val){
										if($r_val != ''){
											if(!in_array($r_val,$right_node_collection)) {
											
												$right_node_collection[] = $r_val; // add in collection for duplicate check
											
												// push right node to nodes array, so that it wil create a node
												//$other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : NT_CRE_RT);
												// $other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => '#b4bcfc', 'link' => $rightValueArray);
												
												$graph_child['children'][$sub_key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : NT_CRE_RT);
												
												// create link with sub-topic of right-node
											}
												$graph_child['children'][$sub_key]['link'][] = $r_val;
										}
									}
								}
								
								//collect left node with linking
								if(count($left_node) > 0){
									$graph_child['children'][$sub_key]['children'][] = $left_node;
									//$other_nodes[] = $left_node;
								}
							}
						}
						
					}
				}
				
				$graph_data[] = array_merge($graph_nodes,$graph_child); //appaned all child to main node
				//$graph_data = array_merge($graph_data,$other_nodes);
				
					//echo "<pre>"; print_r($graph_data); //die('==hello');
				echo json_encode($graph_data); die();
			} else {
				$test = array (0 => array ('name' => $creation_result[0]['name'] ,'value' => 100,'color' => '#9ba2a6'));
				echo json_encode($test); die();
			}
			
		 } 
	} 
	
	
}
add_action('wp_ajax_start_network_creation_graph_by_ajax', 'start_network_creation_graph_ajax');

/*****************Network Functions End**************************/

function my_wp_nav_menu_args( $args = '' ) {
 
if( is_user_logged_in() ) { 
    $args['menu'] = 'after-login-menu';
} else { 
    $args['menu'] = 'before-login-menu';
} 
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

/*add_filter('wp_nav_menu_items', 'my_custom_menu_item');

function my_custom_menu_item($items)
{
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $name = $user->display_name; // or user_login , user_firstname, user_lastname
        $items .= '<li><a href=""> Hey'.ucfirst($name).'</a></li>';
    }

    return $items;
}*/

function get_topic_graph_data($user_id,$creation_id){
	global $wpdb;
	$response =array();
	$graph_data = $graph_nodes = $graph_child = $other_nodes = array();
	$creation_table = $wpdb->prefix."tbl_creation";
	$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
	$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
	$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$user_id}' and id = '{$creation_id}' ", ARRAY_A );
	
	if(count($creation_result) >= 0){
		//graph main node
		$graph_nodes = array('name' => $creation_result[0]['name'],	'value' => 100,'color' => $creation_result[0]['node_color'] ? $creation_result[0]['node_color'] : TP_CRE_MAIN );
		
		// get sub-topic
		$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$user_id}' and creation_id = '{$creation_id}' ", ARRAY_A );
		//echo "<pre>"; print_r($sub_creation_result); die('==hello');
		
		$right_node_collection = array();
		
		if(count($sub_creation_result) >= 0){
			// loop for all sub-topic
			foreach($sub_creation_result as $sub_key => $sub_data){
				if($sub_data['notes'] != ''){
					$tooltip_text = $sub_data['notes'];
				} else {
					$tooltip_text = $sub_data['field_1'];
				}
				
				// append children to main node
				if($sub_data['field_1'] != ''){
					$graph_child['children'][$sub_key] = array('name' =>$sub_data['field_1'],'value' => 50,'color' => $sub_data['node_color'] ? $sub_data['node_color'] : TP_CRE_SUB ,'tooltip' => $tooltip_text );
				}
				
				// get left-right (Source-Learning) nodes
				$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$user_id}' and creation_id = '{$creation_id}' and sub_creation_id = '{$sub_data["id"]}' ", ARRAY_A );
				//echo "<pre>"; print_r($detail_sub_creation_result); die('==hello');
				
				if(count($detail_sub_creation_result) >= 0){
					// loop for all left-right (Source-Learning) nodes
					foreach($detail_sub_creation_result as $key => $detail_data){
						$left_node = array();
						// pick all left node and right node
						if(!(trim($detail_data['left_val']) == '' && trim($detail_data['right_val']) == '' )){
							//collect left node
							if($detail_data['left_val'] != ''){
								$left_node = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : TP_CRE_LF );
								
								// create link with sub-topic of left_node
								$graph_child['children'][$sub_key]['link'][] = $detail_data['left_val'];
								
								$graph_child['children'][$sub_key]['children'][] = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : TP_CRE_LF );
								
							}
							
							//collect right node if not empty
							if(!empty($detail_data['right_val'])){
								$rightValueArray = explode(',', trim($detail_data['right_val']));
								
								if($detail_data['left_val'] != ''){
									$left_node['link'] = $rightValueArray; //create left node linking with right node 
								}
								
								foreach($rightValueArray as $r_key => $r_val){
									if($r_val != ''){
										// push right node to nodes array, so that it wil create a node
										if(!in_array($r_val,$right_node_collection)) {
											
											$right_node_collection[] = $r_val; // add in collection for duplicate check
											
											// $other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : TP_CRE_RT);
											
											if($detail_data['left_val'] != ''){
												//if left (Source) is not empty them mark right node (Keys) as children left
												$graph_child['children'][$sub_key]['children'][$key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : TP_CRE_RT );
											} else {
												//if left (Source) is empty them mark right node (Keys) as children sub topic node
												
												$graph_child['children'][$sub_key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : TP_CRE_RT );
												
											}
											
										}
										
										// create link with sub-topic of right-node
										$graph_child['children'][$sub_key]['link'][] = $r_val;
										
										$graph_child['children'][$sub_key]['children'][$key]['link'][] = $r_val;
									}
								}
							}
							
							//collect left node with linking
							// if(count($left_node) > 0){
								// $other_nodes[] = $left_node;
							// }
						}
					}
					
				}
			}
			
			$graph_data[] = array_merge($graph_nodes,$graph_child); //appaned all child to main node
			//$graph_data = array_merge($graph_data,$other_nodes);
				//echo "if";
				//echo "<pre>"; print_r($graph_data); //die('==hello');
			
			$graph_data = json_encode($graph_data);  
			//echo json_encode($graph_data); die();
			return $graph_data;
		} else {
				//echo "else";
			$test = array (0 => array ('name' => $creation_result[0]['name'] ,'value' => 100,'color' => '#9ba2a6'));
			$graph_data = json_encode($test);
			//echo json_encode($test); die();
			return $graph_data;
			
		}
	}
}

function get_net_graph_data($user_id,$creation_id){
	global $wpdb;
	$current_user = get_user_by( 'id', $user_id );
	//$current_user = wp_get_current_user();
		 //echo "<pre>"; print_r($current_user->data); die("======rrrrrrr");
	
	$response =array();
	$graph_data = $graph_nodes = $graph_child = $other_nodes = $other_sub_nodes = array();

		$creation_table = $wpdb->prefix."tbl_creation";
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$user_id}' and id = '{$creation_id}' ", ARRAY_A );
		// echo "<br>";
		// echo "<pre>"; print_r($results); die("======rrrrrrr");
		
		
		if(count($creation_result) >= 0){
			//graph main node
			$graph_nodes = array(
									'name' => $current_user->data->display_name,
									'value' => 100,
									'color' => $creation_result[0]['user_color'] ? $creation_result[0]['user_color'] : NT_CRE_USER
								);
			
			// get sub-topic
			$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$user_id}' and creation_id = '{$creation_id}' ", ARRAY_A );
			//echo "<pre>"; print_r($sub_creation_result); die('==hello');
			
			$right_node_collection = array();

			if(count($sub_creation_result) >= 0){
				// loop for all sub-topic
				foreach($sub_creation_result as $sub_key => $sub_data){
					if($sub_data['notes'] != ''){
						$tooltip_text = $sub_data['notes'];
					} else {
						$tooltip_text = $sub_data['field_1'];
					}
					
					// append children to main node
					if($sub_data['field_1'] != ''){
						$graph_child['children'][$sub_key] = array('name' =>$sub_data['field_1'],'value' => 50,'color' => $sub_data['node_color'] ? $sub_data['node_color'] : NT_CRE_SUB ,'tooltip' => $tooltip_text);
					}
					
					
					if($sub_data['field_2'] != ''){
						//$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_2'],'value' => 50,'color' => $sub_data['field_2_color'] ? $sub_data['field_2_color'] : NT_CRE_ORG , 'link'=>[$sub_data['field_3']] );
						
						$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_2'],'value' => 50,'color' => $sub_data['field_2_color'] ? $sub_data['field_2_color'] : NT_CRE_ORG  );
						
						//$other_nodes[] = array('name' =>$sub_data['field_2'],'value' => 50,'color' => $sub_data['field_2_color'] ? $sub_data['field_2_color'] : NT_CRE_ORG , 'link'=>[$sub_data['field_3']] );
						
						// $graph_child['children'][$sub_key]['children'][$sub_key]['link=='][] = $sub_data['field_3'];
						$graph_child['children'][$sub_key]['link'][] = $sub_data['field_2'];
					}
					
					if($sub_data['field_3'] != ''){
						//$graph_child['children'][$sub_key]['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS ,'link'=>[$sub_data['field_1']] );
						
					if($sub_data['field_2'] != ''){
						$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS , 'link' => [$sub_data['field_2']] );
					} else {
						$graph_child['children'][$sub_key]['children'][] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS );
					}	
						
						//$other_nodes[] = array('name' =>$sub_data['field_3'],'value' => 50,'color' => $sub_data['field_3_color'] ? $sub_data['field_3_color'] : NT_CRE_POS ,'link'=>[$sub_data['field_1']] );
						

						$graph_child['children'][$sub_key]['children'][$sub_key]['link'][] = $sub_data['field_3'];
					}
					
					// get left-right (Source-Learning) nodes
					$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$user_id}' and creation_id = '{$creation_id}' and sub_creation_id = '{$sub_data["id"]}' ", ARRAY_A );
					//echo "<pre>"; print_r($detail_sub_creation_result); die('==hello');
					
					if(count($detail_sub_creation_result) >= 0){
						// loop for all left-right (Source-Learning) nodes
						foreach($detail_sub_creation_result as $key => $detail_data){
							$left_node = array();
							// echo '<pre><br/>===';
							// var_dump($detail_data);
							// echo '</pre>';
							// pick all left node and right node
							if(!(trim($detail_data['left_val']) == '' && trim($detail_data['right_val']) == '' )){
								// echo '<br/>he='.$detail_data['left_val'];
								//collect left node
								if($detail_data['left_val'] != ''){
									$left_node = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : NT_CRE_LF);
									
									// create link with sub-topic of left_node
									$graph_child['children'][$sub_key]['link'][] = $detail_data['left_val'];
								}
								
								//collect right node if not empty
								if(!empty($detail_data['right_val'])){
									$rightValueArray = explode(',', trim($detail_data['right_val']));
									
									if($detail_data['left_val'] != ''){
										//$left_node['link'] = $rightValueArray; //create left node linking with right node 
									}
									
									foreach($rightValueArray as $r_key => $r_val){
										if($r_val != ''){
											
											if(!in_array($r_val,$right_node_collection)) {
											
												$right_node_collection[] = $r_val; // add in collection for duplicate check
											
												// push right node to nodes array, so that it wil create a node
												//$other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : NT_CRE_RT);
												// $other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => '#b4bcfc', 'link' => $rightValueArray);
												
												$graph_child['children'][$sub_key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : NT_CRE_RT);
												
												// create link with sub-topic of right-node
											}
												$graph_child['children'][$sub_key]['link'][] = $r_val;
										}
									}
								}
								
								//collect left node with linking
								if(count($left_node) > 0){
									$graph_child['children'][$sub_key]['children'][] = $left_node;
									//$other_nodes[] = $left_node;
								}
							}
						}
						
					}
				}
				
				$graph_data[] = array_merge($graph_nodes,$graph_child); //appaned all child to main node
				//$graph_data = array_merge($graph_data,$other_nodes);
					//echo "<pre>"; print_r($graph_data); //die('==hello');
				$graph_data = json_encode($graph_data); //die();
			} else {
				$test = array (0 => array ('name' => $current_user->data->display_name,
									'value' => 100,
									'color' => '#000000'));
				$graph_data = json_encode($test); //die();
			}
			return $graph_data;
			
		 } 
}

function get_exp_graph_data($user_id,$creation_id){
	global $wpdb;
	$response =array();
	$graph_data = $graph_nodes = $graph_child = $other_nodes = array();

		$creation_table = $wpdb->prefix."tbl_creation";
		$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
		$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
		$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$user_id}' and id = '{$creation_id}' ", ARRAY_A );
		// echo "<br>";
		// echo "<pre>"; print_r($results); die("======rrrrrrr");
		
		if(count($creation_result) >= 0){
			//graph main node
			/*$graph_nodes = array(
									'name' => $creation_result[0]['name'],
									'value' => 100,
									'color' => '#9ba2a6'
								);*/
			
			// get sub-topic
			$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$user_id}' and creation_id = '{$creation_id}' ", ARRAY_A );
			//echo "<pre>"; print_r($sub_creation_result); die('==hello');
	
			$right_node_collection = array();
			
			if(count($sub_creation_result) >= 0){
				// loop for all sub-topic
				foreach($sub_creation_result as $sub_key => $sub_data){
					if($sub_data['notes'] != ''){
						$tooltip_text = $sub_data['notes'];
					} else {
						$tooltip_text = $sub_data['field_1'];
					}
					
					// append children to main node
					$graph_child[] = array('name' =>$sub_data['field_1'],'value' => 50,'color' => $sub_data['node_color'] ? $sub_data['node_color'] : EX_CRE_SUB ,'tooltip' => $tooltip_text );
					
					// get left-right (Source-Learning) nodes
					$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$user_id}' and creation_id = '{$creation_id}' and sub_creation_id = '{$sub_data["id"]}' ", ARRAY_A );
					//echo "<pre>"; print_r($detail_sub_creation_result); die('==hello');
					
					if(count($detail_sub_creation_result) >= 0){
						// loop for all left-right (Source-Learning) nodes
						foreach($detail_sub_creation_result as $key => $detail_data){
							$left_node = array();

							// pick all left node and right node
							if(!(trim($detail_data['left_val']) == '' && trim($detail_data['right_val']) == '' )){
								//collect left node
								if($detail_data['left_val'] != ''){
									//$left_node = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : EX_CRE_LF );
									
									// create link with sub-topic of left_node
									$graph_child[$sub_key]['link'][] = $detail_data['left_val'];
									
									
									//collect exp left node as first children
									$graph_child[$sub_key]['children'][] = array('name' =>$detail_data['left_val'],'value' => 30,'color' => $detail_data['lft_node_color'] ? $detail_data['lft_node_color'] : EX_CRE_LF );
								}
								
								//collect right node if not empty
								if(!empty($detail_data['right_val'])){
									$rightValueArray = explode(',', trim($detail_data['right_val']));
									
									//if($detail_data['left_val'] != ''){
										//$left_node['link'] = $rightValueArray; //create left node linking with right node 
										//$graph_child[$sub_key]['children'][$key]['link'] = $rightValueArray; //create left node linking with right node 
									//}
									
									foreach($rightValueArray as $r_key => $r_val){
										if($r_val != ''){
											// push right node to nodes array, so that it wil create a node
											if(!in_array($r_val,$right_node_collection)) {
												$right_node_collection[] = $r_val; // add in collection for duplicate check
												
												// push right node to nodes array, so that it wil create a node
												//$other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : EX_CRE_RT );
												// $other_nodes[] = array('name' =>$r_val,'value' => 20,'color' => '#b4bcfc', 'link' => $rightValueArray);
												
												
												if($detail_data['left_val'] != ''){
													$graph_child[$sub_key]['children'][$key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : EX_CRE_RT );

													// $graph_child[$sub_key]['children'][$key]['link'][] = $r_val;
												} else {
													$graph_child[$sub_key]['children'][] = array('name' =>$r_val,'value' => 20,'color' => $detail_data['rt_node_color'] ? $detail_data['rt_node_color'] : EX_CRE_RT );
												}
											} 
											
											if($detail_data['left_val'] != '')
												$graph_child[$sub_key]['children'][$key]['link'][] = $r_val;
											
											
											// create link with sub-topic of right-node
											$graph_child[$sub_key]['link'][] = $r_val;
												
										}
									}
								}
								
								//collect left node with linking
								// if(count($left_node) > 0){
									// $other_nodes[] = $left_node;
								// }
							}
						}
						
					}
				}
				
				//$graph_data[] = array_merge($graph_nodes,$graph_child); //appaned all child to main node
				$graph_data = $graph_child; //appaned all child to main node
				//$graph_data = array_merge($graph_data,$other_nodes);
				
					//echo "<pre>"; print_r($graph_data); //die('==hello');
				$graph_data = json_encode($graph_data); //die();
			} else {
				$test = array (0 => array ('name' => $creation_result[0]['name'] ,'value' => 100,'color' => '#9ba2a6'));
				$graph_data = json_encode($test); //die();
			}
			return $graph_data;
		 } 
}

/*****************Network Functions Start**************************/
function set_updated_at($creation_id) {
	global $wpdb;
	$creation_table = $wpdb->prefix."tbl_creation";
	$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
	$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
	$updated_at = date('Y-m-d H:i:s');
	//$sqlUpdate = "update {$creation_table} set updated_at='{$updated_at}' where id={$creation_id} ";
			
	
	$all_sql_update = "UPDATE {$creation_table} as table_1, {$sub_creation_table} as table_2 , {$detail_sub_creation_table} as table_3 
SET ". 
    "table_1.updated_at= '{$updated_at}', ".
    "table_2.updated_at = '{$updated_at}', ".
    "table_3.updated_at = '{$updated_at}' ".
"WHERE  ".
    "table_1.id = '{$creation_id}' AND table_2.creation_id = '{$creation_id}' AND table_3.creation_id = '{$creation_id}' ".
"and table_1.id= table_2.creation_id ".
"and table_1.id= table_3.creation_id";
	
	$wpdb->query($all_sql_update);
	
	return true;
}

function duplicate_creation($creation_id){
	global $wpdb;
	$current_user_id = get_current_user_id();
	$creation_table = $wpdb->prefix."tbl_creation";
	$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
	$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
	$response = array();
	if(isset($_POST['creation_id']) && $_POST['creation_id'] != '' && isset($_POST['action']) && $_POST['action'] == 'duplicate_creation_by_ajax')	{
		
		$creation_id = $_POST['creation_id'];
		
		$sql_duplicate_creation = "INSERT INTO {$creation_table} (user_id, name, description, type, user_color) ".
		"SELECT ". 
			"user_id, CONCAT('Copy of ', name), description, type, user_color ". 
		"FROM {$creation_table} ". 
		"WHERE id = {$creation_id}" ;
		
		$wpdb->query($sql_duplicate_creation);
		$last_inserted_creation_id = $wpdb->insert_id;
		
		if($last_inserted_creation_id){
			$get_sub_data = "SELECT sc.* from {$sub_creation_table} as sc where sc.creation_id = {$creation_id}";
			$resData = $wpdb->get_results($get_sub_data, ARRAY_A);
			
			// echo '<pre>';
			// print_r($resData);
			// echo '</pre>';

			foreach($resData as $key => $rec) {
				$f1 = $rec['field_1'];		
				$f2 = $rec['field_2'];		
				$f3 = $rec['field_3'];		
				$cp_notes = $rec['notes'];		
				$cp_node_color = $rec['node_color'];		
				$cp_field_2_color = $rec['field_2_color'];		
				$cp_field_3_color = $rec['field_3_color'];	
				
				$sqlSubCreation = "INSERT INTO {$sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$last_inserted_creation_id}', field_1 = '{$f1}', field_2 = '{$f2}', field_3 = '{$f3}', notes = '{$cp_notes}', node_color='{$cp_node_color}', field_2_color='{$cp_field_2_color}', field_3_color='{$cp_field_3_color}' ";
				
				$wpdb->query($sqlSubCreation);
				$last_inserted_sub_creID = $wpdb->insert_id;
				
				if($last_inserted_sub_creID) {
					$recSubCreationID = $rec['id'];
					
					$get_sub_crt_detail = "SELECT * from {$detail_sub_creation_table} where creation_id = {$creation_id} and sub_creation_id={$recSubCreationID}";
					
					$resDetailData = $wpdb->get_results($get_sub_crt_detail, ARRAY_A);
					foreach($resDetailData as $key_d => $rec_d) {
						$cp_left_val = $rec_d['left_val'];	
						$cp_right_val = $rec_d['right_val'];	
						$cp_lft_node_color = $rec_d['lft_node_color'];	
						$cp_rt_node_color = $rec_d['rt_node_color'];	
					
						$sqlSubCreationDetail = "INSERT INTO {$detail_sub_creation_table} set user_id = '{$current_user_id}', creation_id = '{$last_inserted_creation_id}', sub_creation_id = '{$last_inserted_sub_creID}', left_val = '{$cp_left_val}', right_val = '{$cp_right_val}', lft_node_color='{$cp_lft_node_color}', rt_node_color='{$cp_rt_node_color}' ";
						$wpdb->query($sqlSubCreationDetail);
					}
				}
				
			}	
			$response = array('flag'=>'success', 'msg' => 'Creation duplicate successfully.');
		}
		
	}
	echo json_encode($response); die();
}
add_action('wp_ajax_duplicate_creation_by_ajax', 'duplicate_creation');

/*add_action('wp_logout','auto_redirect_after_logout');


function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}*/

/*add_filter( 'wp_nav_menu_items', 'themeprefix_login_logout_link', 10, 2 );

	
function themeprefix_login_logout_link( $items, $args  ) {
    
    if( is_user_logged_in()  ) {
            $loginoutlink = wp_loginout( 'index.php', false );
            //$items .= '<li class="menu-item login-but">'. $loginoutlink .'</li>';
			$items .= '<li class="menu-item login-but"><a href='. wp_logout_url( home_url() ) .'>Logout</a></li>';
            return $items;
    }
    else {
            $loginoutlink = wp_loginout( 'members', false );
            $items .= '<li class="menu-item login-but test">'. $loginoutlink .'</li>';
            return $items;
    
    }
}*/
