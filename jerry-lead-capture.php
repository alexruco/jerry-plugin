<?php
/**
 * Plugin Name: Jerry Lead Capture Plugin
 * Description: Displays a modal popup for newsletter subscription.
 * Version: 1.3
 * Author: Alex Ruco
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

// Add admin menu and submenu items
function nm_add_admin_menu() {
    // Main menu entry
    add_menu_page(
        'Jerry Lead Capture Plugin',  // Page title
        'Lead Capture',               // Menu title
        'manage_options',             // Capability
        'jerry-lead-capture',         // Menu slug
        'nm_settings_page',           // Function to display settings page
        'dashicons-email-alt2',       // Icon URL
        6                             // Position in the menu
    );

    // Submenu: Plugin Setup
    add_submenu_page(
        'jerry-lead-capture',          // Parent slug
        'Setup Plugin',                // Page title
        'Setup Plugin',                // Menu title
        'manage_options',              // Capability
        'jerry-lead-capture',          // Same slug as parent to override the parent page
        'nm_settings_page'             // Function to display settings page
    );

    // Submenu: Subscribers List
    add_submenu_page(
        'jerry-lead-capture',          // Parent slug
        'Subscribers List',            // Page title
        'Subscribers List',            // Menu title
        'manage_options',              // Capability
        'nm-subscribers',              // Menu slug
        'nm_subscribers_page'          // Function to display subscribers page
    );
}
add_action('admin_menu', 'nm_add_admin_menu');


function nm_enqueue_admin_assets($hook) {
    // Check the exact value of $hook
    error_log($hook);  // Log the hook value to the debug.log

    // Replace 'settings_page_jerry-lead-capture' with the actual value of $hook from your error log
    if ($hook !== 'settings_page_jerry-lead-capture') {
        return;
    }

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('nm-admin-styles', NM_PLUGIN_URL . 'assets/css/admin-styles.css'); // Enqueue custom admin styles
    wp_enqueue_script('nm-admin-scripts', NM_PLUGIN_URL . 'assets/js/admin-script.js', array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'nm_enqueue_admin_assets');
