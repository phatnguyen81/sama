<?php

/**
 * Smartpay
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Smartpay
 * @since Smartpay 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
require get_template_directory() . '/core/init.php';
require get_template_directory() . '/classes/nolist_walker.php';
function smartpay_setup()
{
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary menu', 'twentytwentyone'),
			'footer'  => __('Footer menu', 'twentytwentyone'),
			'social'  => __('Social menu', 'twentytwentyone'),
		)
	);
}

add_action('after_setup_theme', 'smartpay_setup');

function smartpay_post_thumbnails()
{
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'smartpay_post_thumbnails');

function smartpay_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'smartpay'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'smartpay'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'smartpay_widgets_init');

function accordion($attr, $content)
{
	$id = uniqid('accordion_');
	return '<div class="accordion tetcollapse" id="' . $id . '">' . do_shortcode(str_replace('[accordion_card', '[accordion_card parent_id="' . $id . '"', $content)) . '</div>';
}
add_shortcode("accordion", "accordion");

function accordion_card($attr, $content)
{
	$title = $attr['title'];
	$parent_id = $attr['parent_id'];
	$id = uniqid();
	$html = <<<EOF
		<div class="card">
			<div class="card-header" id="heading-$id">
				<h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-$id" aria-expanded="false" aria-controls="collapse-$id"> $title</button>
				</h2>
			</div>
			<div id="collapse-$id" class="collapse" aria-labelledby="heading-$id" data-parent="#$parent_id">
				<div class="card-body">
					$content
				</div>
			</div>
		</div>
	EOF;

	return $html;
}
add_shortcode("accordion_card", "accordion_card");

function smartpay_enqueue_styles()
{
	wp_enqueue_style('sm-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Sansita+Swashed:wght@400;700&display=swap', array(), null);
	
	wp_enqueue_style('main', get_template_directory_uri() . '/style.css', array('elementor-frontend', 'elementor-global', 'elementor-animations'));
	wp_enqueue_style('bootstrap-reboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.css');
	wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('media', get_template_directory_uri() . '/assets/css/media.css');
	wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css');
	wp_enqueue_style('owl.theme.green', get_template_directory_uri() . '/assets/css/owl.theme.green.css');
}

function smartpay_enqueue_scripts()
{
	$dependencies = array('jquery');
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', $dependencies, wp_get_theme()->get('Version'), true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', $dependencies, wp_get_theme()->get('Version'), true);
	wp_enqueue_script('default', get_template_directory_uri() . '/assets/js/default.js', $dependencies, wp_get_theme()->get('Version'), true);
	wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', $dependencies, wp_get_theme()->get('Version'), true);
	wp_register_script('main-functions', get_template_directory_uri() . '/assets/js/functions.js', $dependencies, wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'smartpay_enqueue_styles');
add_action('wp_enqueue_scripts', 'smartpay_enqueue_scripts');

function theme_option_page()
{
?>
	<div class="wrap">
		<h1>Custom Theme Options Page</h1>
		<form method="post" action="options.php">
			<?php
			// display settings field on theme-option page
			settings_fields("theme-options-grp");
			// display all sections for theme-options page
			do_settings_sections("theme-options");
			submit_button();
			?>
		</form>
	</div>
<?php
}
function add_theme_menu_item()
{
	add_theme_page("Theme Customization", "Cấu hình giao diện", "manage_options", "theme-options", "theme_option_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");
function theme_section_description()
{
	echo '<p>Theme Option Section</p>';
}
function options_callback()
{
	$options = get_option('first_field_option');
	echo '<input name="first_field_option" id="first_field_option" type="checkbox" value="1" class="code" ' . checked(1, $options, false) . ' /> Check for enabling custom help text.';
}
function test_theme_settings()
{
	add_option('first_field_option', 1); // add theme option to database
	add_settings_section(
		'first_section',
		'New Theme Options Section',
		'theme_section_description',
		'theme-options'
	);
	add_settings_field(
		'first_field_option',
		'Test Settings Field',
		'options_callback',
		'theme-options',
		'first_section'
	); //add settings field to the “first_section”
	register_setting('theme-options-grp', 'first_field_option');
}
add_action('admin_init', 'test_theme_settings');