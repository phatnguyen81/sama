<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function block_slider_cwp_block_assets() { 
	wp_register_style(
		'block_slider-cwp-style-css', 
		plugins_url( 'dist-free/blocks.style.build.css', dirname( __FILE__ ) ),
		array( 'wp-editor' ), 
		null
	);

	wp_register_script(
		'block_slider-cwp-block-js', 
		plugins_url( '/dist-free/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist-free/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register script for slick frontend.
	wp_register_script(
		'block_slider-custom-js', // Handle.
		plugins_url( '/dist-free/custom_frontend.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array('jquery'), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist-free/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'block_slider-cwp-block-editor-css', // Handle.
		plugins_url( 'dist-free/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist-free/blocks.editor.build.css' ) // Version: File modification time.
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cwpGlobal` object.
	wp_localize_script(
		'block_slider-cwp-block-js',
		'cwpGlobal', // Array containing dynamic data for a JS Global.
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
			// Add more data here that you want to access from `cwpGlobal` object.
		]
	);

	/**
	 * Register Gutenberg block on server-side.
	 * 
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	register_block_type(
		'cwp/block-block-slider', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'block_slider-cwp-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'block_slider-cwp-block-js',
			'script'		=> 'block_slider-custom-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'block_slider-cwp-block-editor-css',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'block_slider_cwp_block_assets' );
