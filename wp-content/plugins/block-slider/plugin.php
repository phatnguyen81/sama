<?php

/**
 * Plugin Name: WordPress Slider Plugin - Block Slider
 * Plugin URI: http://www.wpblockslider.com
 * Description: The slider plugin for WordPress Gutenberg editor. Build sliders directly within Gutenberg editor live. Add any WordPress blocks to each slide.
 * Author: munirkamal
 * Author URI: https://munirkamal.wordpress.com/
 * Version: 1.1.2
 * License: GPL
 * License URI: http://www.gnu.org/licenses/gpl-1.0.6.txt
 */
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'cwpbs_fs' ) ) {
    cwpbs_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'cwpbs_fs' ) ) {
        // Create a helper function for easy SDK access.
        function cwpbs_fs()
        {
            global  $cwpbs_fs ;
            
            if ( !isset( $cwpbs_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $cwpbs_fs = fs_dynamic_init( array(
                    'id'             => '4892',
                    'slug'           => 'block-slider',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_7ae0c8f55e8e50153a0296efc09a5',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                    'days'               => 14,
                    'is_require_payment' => false,
                ),
                    'menu'           => array(
                    'slug' => 'block-slider',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $cwpbs_fs;
        }
        
        // Init Freemius.
        cwpbs_fs();
        // Signal that SDK was initiated.
        do_action( 'cwpbs_fs_loaded' );
    }
    
    require_once plugin_dir_path( __FILE__ ) . 'src/init-free.php';
    //Admin Page
    class cwp_block_slider_ap
    {
        public function __construct()
        {
            add_action( 'admin_menu', array( $this, 'cwp_bs_settings' ), 10 );
        }
        
        public function cwp_bs_settings()
        {
            $page_title = 'Block Slider Dashboard';
            $menu_title = 'Block Slider';
            $capability = 'manage_options';
            $slug = 'block-slider';
            $callback = array( $this, 'cwp_bs_content' );
            add_menu_page(
                $page_title,
                $menu_title,
                $capability,
                $slug,
                $callback
            );
        }
        
        public function cwp_bs_content()
        {
            ?>
            <h1>Content Here</h1>

            <p>Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>

<?php 
        }
    
    }
    new cwp_block_slider_ap();
}
