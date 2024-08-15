<?php
/**
 * Plugin Name: Newsletter Modal
 * Description: A plugin to display a modal popup for newsletter subscription.
 * Version: 1.3
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define plugin paths
define('NM_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NM_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include necessary files
include_once NM_PLUGIN_DIR . 'includes/nm-admin-settings.php';
include_once NM_PLUGIN_DIR . 'includes/nm-subscribers-page.php';
include_once NM_PLUGIN_DIR . 'includes/nm-shortcode.php';
include_once NM_PLUGIN_DIR . 'includes/nm-ajax-handler.php';
include_once NM_PLUGIN_DIR . 'includes/nm-database.php';

// Enqueue styles and scripts
function nm_enqueue_assets() {
    wp_enqueue_style('nm-styles', NM_PLUGIN_URL . 'assets/css/styles.css');
    wp_enqueue_script('nm-scripts', NM_PLUGIN_URL . 'assets/js/script.js', array('jquery'), null, true);

    // Localize script to pass AJAX URL to JavaScript
    wp_localize_script('nm-scripts', 'nm_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'nm_enqueue_assets');
